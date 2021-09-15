<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use Excel;
use App\Division;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Section::with('division')->latest('updated_at')->get();

        return view('admin.sections.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Section::rules());
        
        $section = Section::create($request->all());

        return redirect()->route('admin.sections.index')->withSuccess(trans('app.success_store'));
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
        $item = Section::findOrFail($id);

        return view('admin.sections.edit', compact('item'));
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
        $this->validate($request, Section::rules(true, $id));

        $item = Section::findOrFail($id);

        $item->update($request->all());

        return redirect()->route('admin.sections.edit', $id)->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Section::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.sections.index')->withSuccess(trans('app.success_destroy'));
    }

    /**
     * Export certifications
     */
    public function export($id)
    {
        $items = Section::where('division_id', $id)->get();
        
        foreach ($items as $item) {
            $data[] = [
                '#' => $item->id,
                'اسم المسار' =>$item->name,
                // 'القسم' =>$item->category,
                // 'الفرع' =>$item->track,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('المسارات', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}
