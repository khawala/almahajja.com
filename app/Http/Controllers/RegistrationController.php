<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Registration;
use App\Section;
use App\User;
use App\Configuration;
use App\Setting;
use Excel;
use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Tags\InvoiceDate;
use Salla\ZATCA\Tags\InvoiceTaxAmount;
use Salla\ZATCA\Tags\InvoiceTotalAmount;
use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;
use Illuminate\Support\Carbon;
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Registration::search()->with('student', 'section', 'period', 'classroom', 'telecom')->latest('updated_at')->paginate(20);

        if (request()->has('export')) {
            $this->export($items);
        }

        return view('admin.registrations.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Section::ListGroup());
        return view('admin.registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Registration::rules());
        
        // check if student's
        // $divisions_id = Registration::with('section.division')->where('user_id', request('user_id'))->get()->pluck('section.division.id')->toArray(); // Get divisions aleady  registerer
        // $division_id = Section::findOrFail(request('section_id'))->division_id; // get current division
        // // dd($division_id);
        
        // if (in_array($division_id, $divisions_id)) {
        //     return back()->withErrors('الطالبة مسجلة في نفس الدورة');
        // }

        Registration::create($request->all() + [
            'created_by' => auth()->id(),
        ]);

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

  public function invoice($id)
    {
        $registration = Registration::where('id', '=', $id)->first();
        
        if($registration->status==0)
        {
          return back()->withSuccess('لا يمكن اصدار فاتورة بسبب عدم تاكيد حالة التسجيل');  
        }
        if($registration->department->price==null || $registration->department->price==0)
        {
             return back()->withSuccess('القسم مجاني لا يمكن اصدار فاتورة');
        }
        else{
            if($registration->department!=null){
            $tax1=Setting::where('id',6)->pluck('content')->first();
            $commercial_register=Setting::where('id',7)->pluck('content')->first();
             $instituteName=Setting::where('id',8)->pluck('content')->first();
                                            $tax= '1.'.$tax1;
                      $total=$registration->department->price;
                      if($registration->paid!=0 && $registration->paid!=null)
                      {
                       $total= $registration->paid;  
                      }
            $taxamount=$total-($total/(double)$tax);
        
               $taxamount= round($taxamount, 2);
                 
                 
       $institute=Configuration::where('id',1)->first();
        
$displayQRCodeAsBase64 = GenerateQrCode::fromArray([
    new Seller($instituteName), // seller name        
    new TaxNumber($commercial_register), // seller tax number
    new InvoiceDate(date(DATE_ISO8601, strtotime($registration->created_at))), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
    new InvoiceTotalAmount($total), // invoice total amount
    new InvoiceTaxAmount($taxamount) // invoice tax amount
    // TODO :: Support others tags
])->render();
$trainee=$registration->student;
if($trainee==null)
{
    return back()->withSuccess('لم يتم ايجاد الطالب التابع له التسجيل'); 
}
$logo=Setting::where('id',9)->first();
$SQL = Array(
        "registration"         => $registration,
        'displayQRCodeAsBase64'=>$displayQRCodeAsBase64,
        "department"       => $registration->department,
        "total"=>$total,
        "tax"=>$tax1,
        "instituteName"=>$instituteName,
        "trainee" =>$trainee,
        "commercial_register"=>$commercial_register,
        "institute"=>$institute,
        "logo"=>$logo,
        "taxamount"=>$taxamount,
      );
    return view('admin.registrations.invoice', $SQL);  
}
else
{
    return back()->withSuccess('لم يتم ايجاد القسم التابع له التسجيل');
}
    }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Registration::findOrFail($id);

        return view('admin.registrations.edit', compact('item'));
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
        // $this->validate($request, Registration::rules(true, $id));

        $item = Registration::findOrFail($id);
        
        $item->update($request->all() + ['updated_by' => auth()->id()]);

        return back()->withSuccess(trans('app.success_update'));
    }
public function invoiceReport()
{
  return view('admin.registrations.invoiceReport');  
}
 public function invoiceReportPost(Request $request)
    {
        // dd($request);
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        // dd(Carbon::parse($request->start_date));
        $items = Registration::whereDate('created_at', '>=', Carbon::parse($request->start_date))->whereDate('created_at', '<=', Carbon::parse($request->end_date))->where('status','!=',0)->get();
        // dd($items);
         $commercial_register=Setting::where('id',7)->pluck('content')->first();
             $instituteName=Setting::where('id',8)->pluck('content')->first();
                 $institute=Configuration::where('id',1)->first();
                 $logo=Setting::where('id',9)->first();
    //     $SQL = Array(

    //     "instituteName"=>$instituteName,
       
    //     "commercial_register"=>$commercial_register,
    //     "institute"=>$institute,
    //     "logo"=>$logo,
   
    //   );
          return view('admin.registrations.invoiceReportPdf', compact('items','start_date','end_date','logo','instituteName','commercial_register','institute'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Registration::destroy($id);

        return redirect()->route(ADMIN . '.registrations.index')->withSuccess(trans('app.success_destroy'));
    }

    /**
     * classrooms page
     */
    public function classrooms()
    {
        $items = Registration::search()->with('student', 'section', 'period', 'classroom', 'telecom')->latest('updated_at')->paginate(20);

        return view('admin.registrations.classrooms', compact('items'));
    }

    /**
     * Search
     */
    public function search()
    {
        $registration = Registration::findOrFail(request('q'));

        return redirect()->route(ADMIN . '.registrations.edit', $registration);
    }


    /**
     * Show marks of students
     */
    public function marks()
    {
        $registration = Registration::findOrFail(request('id'));

        //Check access
        // if (auth()->user()->isStudent && auth()->id() != $registration->user_id) {
        //     abort(403);
        // }
        
        $registration->load('student');

        $registration->load(['marks' => function ($q) {
            return $q->where('level', request('level'))
                    ->orderBy('semester')
                    ->orderBy('month');
        }]);
        // return $registration;
        if (request('print')) {
            return view('admin.registrations.print-marks', compact('registration'));
        }
        
        return view('admin.registrations.marks', compact('registration'));
    }

    /**
     * Export certifications
     */
    public function export($items)
    {
        foreach ($items as $item) {
            $data[] = [
                'رقم التسجيل' => $item->id,
                'الطالبة' => $item->student->name,
                'المسار' => $item->section->name,
                'شريحة الجوال' => $item->telecom->name,
                'وقت التسميع' => $item->period->name,
                'تاريخ التسجيل' => $item->created_at,
                'المدفوع' => $item->paid,
                'المستوى' => $item->level->name,
                'الحلقة' => $item->classroom->name,
                'الحالة' => $item->statusName,
            ];
        }
        // return $data;
        // dd($data);

        Excel::create('التسجيل', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }

    /**
     * Stats pages
     */
    public function stats()
    {
        $registrationsBySection     = Registration::stats('section_id')->with('section')->get();
        $registrationsByClassroom   = Registration::stats('classroom_id')->with('classroom')->get();
        $registrationsByDepartment   = Registration::stats('department_id')->with('department')->get();
        $registrationsByStatus      = Registration::stats('status')->get();
        $registrationsByNationality = Registration::statsByNAtionality()->get();

        // return $registrationsByNationality;
        
        return view('admin.registrations.stats', compact('registrationsBySection', 'registrationsByClassroom', 'registrationsByStatus', 'registrationsByNationality','registrationsByDepartment'));
    }
}
