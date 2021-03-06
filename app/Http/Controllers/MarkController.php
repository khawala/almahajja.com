<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Registration;
use Carbon\Carbon;
use DB;
use Excel;

class MarkController extends Controller
{
    /**
     * Index page
     */
    public function index()
    {
        $classrooms = Classroom::forMarks()->paginate(10);
        // return $classrooms; 
        return view('admin.marks.index', compact('classrooms'));
    }

    public function create()
    {
        $classroom = Classroom::findOrFail(request('classroom')); // load teacher,
        $classroom->load('teacher', 'section.division');

        $students = Registration::StudentsForMark(request('month'), request('semester'), request('level'))->get();
       

        if (request()->has('export')) {
            $this->export($students);
        }

        return view('admin.marks.create', compact('classroom', 'students'));
    }

    /**
     * Store marks
     */
    public function store()
    {
        DB::transaction(function () {
            $marks = request('marks');
            $data = [];
            foreach ($marks as $register_id => $mark) {
                $data[] = [
                    'registration_id' => $register_id,
                    'section_id'      => $mark['section_id'],
                    'department_id'      => $mark['department_id'],
                    'month'           => $mark['month'],
                    'semester'        => $mark['semester'],
                    'level'           => $mark['level'],
                    // 'mark1'           => $mark['mark1'],
                    // 'mark2'           => $mark['mark2'],
                    // 'mark3'           => $mark['mark3'],
                    //   'separate_section_from'           => $mark['separate_section_from'],
                    // 'separate_section_to'           => $mark['separate_section_to'],
                    'total'           => $mark['total'],
                    'created_at'      => Carbon::now(),
                ];

                DB::table('marks')
                        ->where('registration_id', $register_id)
                        ->where('section_id', $mark['section_id'])
                        ->where('month', $mark['month'])
                        ->where('semester', $mark['semester'])
                        ->where('level', $mark['level'])
                        ->delete();
            }
            DB::table('marks')->insert($data);
        });

        return back()->withSuccess(trans('app.success_store'));
    }

    /**
     * Export to Excel
     */
    public function export($items)
    {
        $data = [];
        foreach ($items as $item) {
            $data[] = [
                '?????? ??????????????'          => $item->id,
                '??????????????'              => $item->name,
                '?????????? ??????????????'        => $item->level->name,
                
                // '???????????? (30)'          => $item->mark1,
                // '?????????????? (30)'         => $item->mark2,
                // '???????????????? ???????????? (40)' => $item->mark3,
                // '??????????????'              => $item->mark1 + $item->mark2 + $item->mark3,
                      '??????????????'              => $item->total,
                                '????'           =>  $item->separate_section_from,
                    '??????'           => $item->separate_section_to,
                 
            ];
        }
Excel::create('Filename', function($excel) use($data) {

    $excel->sheet('Sheetname', function($sheet) use($data) {

        $sheet->with($data);

    });

})->export('xls');
      
    }
}
