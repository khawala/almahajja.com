<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JobRequest;
use Excel;

class JobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = JobRequest::latest('updated_at')->get();

        if (request()->has('export')) {
            $this->export($items);
        }

        return view('admin.job-requests.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, JobRequest::rules());
        
        JobRequest::create($request->all());

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
        $item = JobRequest::findOrFail($id);

        return view('admin.job-requests.edit', compact('item'));
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
        $this->validate($request, JobRequest::rules(true, $id));

        $item = JobRequest::findOrFail($id);

        $item->update($request->all());

        return redirect()->route(ADMIN . '.job-requests.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobRequest::destroy($id);

        return redirect()->route(ADMIN . '.job-requests.index')->withSuccess(trans('app.success_destroy'));
    }

    /**
     * Export certifications
     */
    public function export($items)
    {
        foreach ($items as $item) {
            $data[] = [
                '#'             => $item->id,
                'الوظيفة'       => $item->job->name,
                'الاسم الرباعي' => $item->name,
                'الجوال'        => $item->mobile,
                'الحالة'        => $item->statusName,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('طلبات التوظيف', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}
