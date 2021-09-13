<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DivisionTime;
use Excel;
use App\Division;

class DivisionTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DivisionTime::latest('updated_at')->get();

        return view('admin.division-times.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.division-times.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, DivisionTime::rules());
        
        $item = DivisionTime::create($request->all());

        return redirect()->route('admin.divisions.edit', $item->section->division_id)->withSuccess(trans('app.success_store'));
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
        $item = DivisionTime::findOrFail($id);
        // return $item->section->division->sections->pluck('id');

        return view('admin.division-times.edit', compact('item'));
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
        $this->validate($request, DivisionTime::rules(true, $id));

        $item = DivisionTime::findOrFail($id);

        $item->update($request->all());

        return redirect()->route('admin.divisions.edit', $item->section->division_id)->withSuccess(trans('app.success_store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DivisionTime::findOrFail($id);
        $division = $item->section->division;
        $item->delete();

        return redirect()->route(ADMIN.'.divisions.edit', $division)->withSuccess(trans('app.success_store'));
    }

    /**
     * Export certifications
     */
    public function export($id)
    {
        $items = Division::findOrFail($id)->divistionTimes;

        foreach ($items as $item) {
            $data[] = [
                '#' => $item->id,
                'المسار' =>$item->section->name,
                'المنهج (النصاب)' =>$item->description,
                'من تاريخ' =>$item->start_date,
                'الى تاريخ' =>$item->end_date,
                'الفصل الدراسي' =>$item->semesterName,
                'المستوى' =>$item->levelName,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('المنهج', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}
