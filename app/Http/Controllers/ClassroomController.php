<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classroom;
use App\Section;
use App\Department;
use Excel;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Classroom::with('teacher')->latest('updated_at')->get();
if (auth()->user()->isSupervisor) { // is supervisor
 $items = Classroom::with('teacher')->whereHas('department', function ($q) {
                $q->where('supervisor_id', auth()->id());
            })->latest('updated_at')->get();
        }
        if (request()->has('export')) {
            $this->export($items);
        }

        return view('admin.classrooms.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $departments=Department::where('supervisor_id',auth()->user()->id)->pluck('id')->toArray();
     
        return view('admin.classrooms.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Classroom::rules());
        
      $classroom=  Classroom::create($request->all()+ [
            'created_by' => auth()->id(),
        ]);
        return back()->withSuccess(trans('app.success_store'));
    }
public function sectionClassroom(Request $request)
    {
        $department=Department::find($request->department_id);
       
          if($department){ 
       if(count($department->sections)==0){ 
            echo '<option value="">لا توجد مسارات</option>'; 
       }
       echo '<option value=""></option>';
        foreach($department->sections as $section){  
      
            echo '<option value="'.$section->id.'">'.$section->name.'</option>'; 

        } 
    }else{ 
        echo '<option value="">لا توجد مسارات</option>'; 
    }  
    }
    public function sectionLevel(Request $request)
    {
        $section=Section::find($request->section_id);
       
          if($section){ 
       if(count($section->levels)==0){ 
            echo '<option value="">لا توجد مستويات</option>'; 
       }
       echo '<option value=""></option>';
        foreach($section->levels as $level){  
        
            echo '<option value="'.$level->id.'">'.$level->name.'</option>'; 
        
        } 
    }else{ 
        echo '<option value="">لا توجد مستويات</option>'; 
    }  
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
        $item = Classroom::findOrFail($id);
        $item->load('registrations.section', 'registrations.telecom', 'registrations.period', 'registrations.student');
  $departments=Department::where('supervisor_id',auth()->user()->id)->pluck('id')->toArray();
     
        return view('admin.classrooms.edit', compact('item','departments'));
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
        $this->validate($request, Classroom::rules(true, $id));

        $item = Classroom::findOrFail($id);

        $item->update($request->all()+ ['updated_by' => auth()->id()]);

        return redirect()->route(ADMIN . '.classrooms.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classroom::destroy($id);

        return redirect()->route(ADMIN . '.classrooms.index')->withSuccess(trans('app.success_destroy'));
    }

    /**
     * Export certifications
     */
    public function export($items)
    {
        foreach ($items as $item) {
            $data[] = [
                "#"          => $item->id,
                "إسم الحلقة" => $item->name,
                "المسار"     => $item->section->name,
                "المعلمة"    => $item->teacher->name,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('الحلقات والقاعات', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}
