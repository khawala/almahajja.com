<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Classroom;
use Excel;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Department::with('supervisor','sections')->latest('updated_at')->get();

        if (request()->has('export')) {
            $this->export($items);
        }

        return view('admin.departments.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Department::rules());
        
        $department=Department::create($request->except('section_id'));
       
        $department->sections()->attach($request->section_id);
         return redirect()->route(ADMIN . '.departments.index')->withSuccess(trans('app.success_store'));
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
        $item = Department::findOrFail($id);

        return view('admin.departments.edit', compact('item'));
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
        $this->validate($request, Department::rules(true, $id));

        $item = Department::findOrFail($id);
        $item->sections()->detach();
        $item->sections()->attach($request->section_id);
        $item->update($request->except('section_id'));

        return redirect()->route(ADMIN . '.departments.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);

        return redirect()->route(ADMIN . '.departments.index')->withSuccess(trans('app.success_destroy'));
    }

    /**
     * Export certifications
     */
    public function export($items)
    {
        foreach ($items as $item) {
            $sectionName='';
            foreach( $item->sections as $section)
            {
                $sectionName.=$section->name. PHP_EOL ;
            }
            $data[] = [
                "#"          => $item->id,
                "إسم القسم" => $item->name,
                "المسارات"     => $sectionName,
                "المشرفة"    => $item->supervisor->name,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('الاقسام', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}

