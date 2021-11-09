<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use App\User;
use Validator;
use App\Department;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $items = User::where('role',5)->get();
        if (auth()->user()->isSupervisor) { // is supervisor
 $items = User::where('role',5)->whereHas('classrooms', function ($q) {
                $q->whereHas('department', function ($q) {
                $q->where('supervisor_id', auth()->id());
            });
            })->get();
        }
        $stats = User::notStudent()->stats('status');
        // return $stats;

        return view('admin.teachers.index', compact('items', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, User::rules());
        
        $item = User::create($request->all()+['role'=>5]);

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
        $item = User::findOrFail($id);

        return view('admin.teachers.edit', compact('item'));
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
        $this->validate($request, User::rules(true, $id));

        $item = User::findOrFail($id);

        $item->update($request->all());

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
        User::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }

    /**
     * Export
     */
    public function export()
    {
        $items = User::notStudent()->with('nationality')->get();

        foreach ($items as $item) {
            $data[] = [
                '#' => $item->id,
                'الاسم الرباعي' => $item->name,
                'رقم الهوية' => $item->national_id,
                'الجنسية' => $item->nationality->name,
                'الجنس' => $item->genderName,
                'الجوال' => $item->mobile1,
                'الصلاحيات' => $item->roleName,
                'الحالة' => $item->statusName,
            ];
        }
        // return $data;

        Excel::create('المستخدمين', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}