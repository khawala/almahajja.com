<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Registration;
use App\Section;
use App\User;
use Excel;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Registration::search()->with('student', 'section', 'period', 'classroom', 'telecom')->latest('updated_at')->paginate(20);

        if (request()->has('export')) {
            $this->export($items);
        }

        return view('admin.registrations.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Section::ListGroup());
        return view('admin.registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Registration::rules());
        
        // check if student's
        $divisions_id = Registration::with('section.division')->where('user_id', request('user_id'))->get()->pluck('section.division.id')->toArray(); // Get divisions aleady  registerer
        $division_id = Section::findOrFail(request('section_id'))->division_id; // get current division
        // dd($division_id);
        
        if (in_array($division_id, $divisions_id)) {
            return back()->withErrors('الطالبة مسجلة في نفس الدورة');
        }

        Registration::create($request->all() + [
            'created_by' => auth()->id(),
        ]);

        return back()->withSuccess(trans('app.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Registration::findOrFail($id);

        return view('admin.registrations.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, Registration::rules(true, $id));

        $item = Registration::findOrFail($id);
        
        $item->update($request->all() + ['updated_by' => auth()->id()]);

        return back()->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Registration::destroy($id);

        return redirect()->route(ADMIN . '.registrations.index')->withSuccess(trans('app.success_destroy'));
    }

    /**
     * classrooms page
     */
    public function classrooms()
    {
        $items = Registration::search()->with('student', 'section', 'period', 'classroom', 'telecom')->latest('updated_at')->paginate(20);

        return view('admin.registrations.classrooms', compact('items'));
    }

    /**
     * Search
     */
    public function search()
    {
        $registration = Registration::findOrFail(request('q'));

        return redirect()->route(ADMIN . '.registrations.edit', $registration);
    }


    /**
     * Show marks of students
     */
    public function marks()
    {
        $registration = Registration::findOrFail(request('id'));

        //Check access
        if (auth()->user()->isStudent && auth()->id() != $registration->user_id) {
            abort(403);
        }
        
        $registration->load('student');

        $registration->load(['marks' => function ($q) {
            return $q->where('level', request('level'))
                    ->orderBy('semester')
                    ->orderBy('month');
        }]);
        // return $registration;

        if (request('print')) {
            return view('admin.registrations.print-marks', compact('registration'));
        }
        
        return view('admin.registrations.marks', compact('registration'));
    }

    /**
     * Export certifications
     */
    public function export($items)
    {
        foreach ($items as $item) {
            $data[] = [
                'رقم التسجيل' => $item->id,
                'الطالبة' => $item->student->name,
                'المسار' => $item->section->name,
                'شريحة الجوال' => $item->telecom->name,
                'وقت التسميع' => $item->period->name,
                'تاريخ التسجيل' => $item->created_at,
                'المدفوع' => $item->paid,
                'المستوى' => $item->level->name,
                'الحلقة' => $item->classroom->name,
                'الحالة' => $item->statusName,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('التسجيل', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }

    /**
     * Stats pages
     */
    public function stats()
    {
        $registrationsBySection     = Registration::stats('section_id')->with('section')->get();
        $registrationsByClassroom   = Registration::stats('classroom_id')->with('classroom')->get();
        $registrationsByStatus      = Registration::stats('status')->get();
        $registrationsByNationality = Registration::statsByNAtionality()->get();

        // return $registrationsByNationality;
        
        return view('admin.registrations.stats', compact('registrationsBySection', 'registrationsByClassroom', 'registrationsByStatus', 'registrationsByNationality'));
    }
}
