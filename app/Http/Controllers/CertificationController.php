<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Excel;

class CertificationController extends Controller
{
    public function index()
    {
        $items = Registration::whereIn('status', [1, 3])
                                ->search()
                                ->with('student', 'section', 'period', 'classroom', 'telecom')
                                ->latest('updated_at');

        if (auth()->user()->isTeacher) {
            $items->whereHas('classroom', function ($q) {
                $q->where('teacher_id', auth()->id());
            });
        }
        
        $items = $items->paginate(50);
        
        if (request()->has('export')) {
            $this->export($items);
        }
                                
        return view('admin.certifications.index', compact('items'));
    }

    /**
     * Print a given certification
     */
    public function print($id)
    {
        $item = Registration::findOrFail($id);

        if (auth()->user()->isStudent && auth()->id() != $item->user_id) {
            abort(403);
        }

        $item->load('classroom.teacher', 'student', 'section.division', 'section.supervisor');
        // return $item;
        
        return view('admin.certifications.print', compact('item'));
    }

    /**
     * Export certifications
     */
    public function export($items)
    {
        foreach ($items as $item) {
            $data[] = [
                "رقم التسجيل"   => $item->id,
                "الطالبة"       => $item->student->name,
                "المسار"        => $item->section->name,
                "تاريخ التسجيل" => $item->created_at_formated,
                "الحلقة"        => $item->classroom->name,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('الشهادات', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}
