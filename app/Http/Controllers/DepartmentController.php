<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Classroom;
use App\Setting;
use Excel;
use App\Mail\Email;
use App\General;

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
 if (auth()->user()->isSupervisor) { // is supervisor
         $items = Department::with('supervisor','sections')->where('supervisor_id',auth()->user()->id)->latest('updated_at')->get();
                }
        if (request()->has('export')) {
            $this->export($items);
        }

        return view('admin.departments.index', compact('items'));
    }

    public function list()
    {
        $items = Department::with('supervisor','sections')->latest('updated_at')->paginate(6);
        if (request()->has('export')) {
            $this->export($items);
        }

        return view('site.departments', compact('items'));
    }
 public function completeMark($id)
    {

        $item = Setting::find(5);
        
            $department = Department::findOrFail($id);
if($department->supervisor_id==auth()->user()->id)
{
         $subject='إكتمال رصد درجات'.' '.$department->name;
                $content='قام المشرف:  '.auth()->user()->name.'<br>';
     $content.='بإستكمال رصد درجات القسم الخاص به: '.$department->name;
      General::sendEmail2($item->content,$content,$subject);

    return redirect()->route(ADMIN . '.departments.index')->withSuccess('تم ارسال الإيميل بنجاح');
}else
{
     return redirect()->route(ADMIN . '.departments.index')->withSuccess('غير مصرح   ');
}
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
        
        $department=Department::create($request->except('section_id') + [
            'created_by' => auth()->id(),
        ]);
       
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
      
        $item = Department::findOrFail($id);
        $item->sections()->detach();
        $item->sections()->attach($request->section_id);
        $item->update($request->except('section_id') + [
            'created_by' => auth()->id(),
        ]);

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
                $sectionName.='<br>'.$section->name;
            }
            $data[] = [
                "#"          => $item->id,
                "إسم القسم" => $item->name,
                "المسارات"     => $sectionName,
                "المشرفة"    => $item->supervisor->name,
            ];
        }
       
        Excel::create('الاقسام', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->getStyle()->getAlignment()->setWrapText(true);
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
     public function report($id)
    {
$department = Department::findOrFail($id);
$levelCount=0;
$teacherCount=0;
$classroomName='';
$teacherName='';
$levelName='';
$sectionName='';
if (auth()->user()->isSupervisor) {
if($department->supervisor_id!=auth()->user()->id)
{ return redirect()->route(ADMIN . '.departments.index')->withSuccess('غير مصرح   ');}}
   foreach( $department->classrooms as $classroom)
            {
                // $classroomName.='<br>'.$classroom->name;
                // $teacherName.='<br>'.$classroom->teacher->name;
                if($classroom->teacher){
                    $teacherCount+=1;
                }
            }

       foreach( $department->sections as $section)
            {
                // $sectionName.='<br>'.$section->name;
                $levelCount+=count($section->levels);
                foreach( $section->levels as $level)
            {
                // $levelName.='<br>'.$level->name;  
            }
            }
            
            $classroomCount=count($department->classrooms).'  ';
         $sectionCount=count($department->sections).'  ';
    
     $data[] = [
                "#"          => $department->id,
                "إسم القسم" => $department->name,
                "الحلقات"     =>$classroomCount.''.$classroomName,
                "المسارات"     =>$sectionCount.$sectionName,
                "المستويات"     =>$levelCount.''.$levelName,
                "المعلمات"     =>$teacherCount.$teacherName,
                "الطلاب"=>count($department->registrations),
                "المشرفة"    => $department->supervisor->name,
            ];
        
       
        Excel::create($department->name, function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    } 
}

