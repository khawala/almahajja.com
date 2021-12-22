<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Excel;
class SettingController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Setting::latest('updated_at')->get();
        if (request()->has('export')) {
            $this->export($items);
        }
        return view('admin.settings.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Setting::rules());
        
        $level = Setting::create($request->all());

        return redirect()->route('admin.settings.index')->withSuccess(trans('app.success_store'));
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
        $item = Setting::findOrFail($id);

        return view('admin.settings.edit', compact('item'));
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
        $this->validate($request, Setting::rules(true, $id));

        $item = Setting::findOrFail($id);

        $item->update($request->all());

        return redirect()->route('admin.settings.edit', $id)->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Setting::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.settings.index')->withSuccess(trans('app.success_destroy'));
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
