<?php

namespace App\Http\Controllers;

use App\LevelSection;
use Illuminate\Http\Request;

class LevelSectionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = LevelSection::latest('updated_at')->get();
        if (request()->has('export')) {
            $this->export($items);
        }
        return view('admin.levelSections.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levelSections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, LevelSection::rules());
        
        LevelSection::create($request->all());

        return redirect()->route('admin.levelSections.index')->withSuccess(trans('app.success_store'));
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
        $item = LevelSection::findOrFail($id);

        return view('admin.levelSections.edit', compact('item'));
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
        $this->validate($request, LevelSection::rules(true, $id));

        $item = LevelSection::findOrFail($id);

        $item->update($request->all());

        return redirect()->route('admin.levelSections.edit', $id)->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = LevelSection::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.levelSections.index')->withSuccess(trans('app.success_destroy'));
    }
    public function export($items)
    {
        foreach ($items as $item) {
 
          $data[] = [
                '#' => $item->id,
                'اسم المستوى' =>$item->name,
                'نبذة' =>$item->description,
            ];
        }

        Excel::create('المستويات', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}
