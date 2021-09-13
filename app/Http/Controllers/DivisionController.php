<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Division;
use Excel;
use App\Advertisement;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Division::latest('updated_at')->get();

        if (request()->has('export')) {
            $this->export($items);
        }

        return view('admin.divisions.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Division::rules());
        
        $division = Division::create($request->all() + [
            'created_by' => auth()->id(),
        ]);

        return redirect()->route(ADMIN . '.divisions.edit', $division)->withSuccess(trans('app.success_store'));
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
        $item = Division::findOrFail($id);

        return view('admin.divisions.edit', compact('item'));
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
        $this->validate($request, Division::rules(true, $id));

        $item = Division::findOrFail($id);

        $item->update($request->all() + ['updated_by' => auth()->id()]);

        return redirect()->route(ADMIN . '.divisions.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Division::destroy($id);

        return redirect()->route(ADMIN . '.divisions.index')->withSuccess(trans('app.success_destroy'));
    }

    /**
     * Export certifications
     */
    public function export($items)
    {
        foreach ($items as $item) {
            $data[] = [
                '#' => $item->id,
                'اسم الدورة' => $item->name,
                'متاح لـ' => $item->genderName,
                'نوع الدورة' => $item->typeName,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('الدورات', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }

    /**
     * Stats
     */
    public function stats()
    {
        $divisionsByStatus = Division::stats('status')->get();
        $divisionsByType = Division::stats('type')->get();
        $divisionsByGender = Division::stats('gender')->get();
        $AdvertisementByStatus = Advertisement::stats('status')->get();

        // return $AdvertisementByStatus;
        return view('admin.divisions.stats', compact('divisionsByStatus', 'divisionsByType', 'divisionsByGender', 'AdvertisementByStatus'));
    }
}
