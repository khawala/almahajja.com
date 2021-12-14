<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use App\User;
use Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role < 20) {
            abort(403);
        }
        if(request('role')=='supervisor')
        {
        $items = User::notStudent()->with('nationality')->where('role',10)->get();
        }
        else{
            $items = User::notStudent()->with('nationality')->where('role',20)->get(); 
        }
        $stats = User::notStudent()->stats('status');
      
        return view('admin.users.index', compact('items', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        
        $item = User::create($request->all());

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

        return view('admin.users.edit', compact('item'));
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
     if(request('role')=='supervisor')
        {
        $items = User::notStudent()->with('nationality')->where('role',10)->get();
        }
        else{
            $items = User::notStudent()->with('nationality')->where('role',20)->get(); 
        }
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
