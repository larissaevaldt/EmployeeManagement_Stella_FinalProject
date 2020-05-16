<?php

namespace App\Http\Controllers;

use App\Message;
use App\Employee;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageToEmployee;
use vendor\autoload;
use Session;

class MessageController extends Controller
{

    /**
    *validate register user
    *
    *authenticate register user
    *
    */
    public function __construct(){
      
         $this->middleware('auth');
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $banned= $request->banned;
        $not_job= $request->not_job;
        $pay_rat= $request->pay_rat;
        $projectAttach = Project::find($request->project_id);

        if($banned != "" || $not_job != "" || $pay_rat != ""){
        $employeeList = array();
        if($banned != ""){
            $employeeList['banned'] = Employee::with(['company' => function($company) use ($banned) { 
                $company->where('company_id','!=', $banned);
                }])->get();
        }
        if($pay_rat != "" ){
             $employeeList['pay'] = Employee::where([
            ['job_role','!=',''],
            ['min_pay','<=',$pay_rat],
            
        ])->get();
        }
            // $asdf;
         $items[]="";
         $items2[]="";
         if($employeeList['banned'] != null){
         
         foreach($employeeList['banned'] as $emp){
           
                $items[] =  $emp->id;    
         }
        }
         if($employeeList['pay'] != null){
         
         foreach($employeeList['pay'] as $emp){
           
                $items2[] =  $emp->id;
         }
        }
        $result = array_intersect($items,$items2);

        foreach ($result as $finalEmployee) {
                if($finalEmployee!= ""){
                $employeeAll = Employee::find($finalEmployee);
                // dd($employeeAll->email_address);
                Mail::to($employee->email_address)->send(new MessageToEmployee($request->project_id));
                $createNew = new Message;
                 $createNew->prob_message = $request->project_id;
                $projectAttach->messages()->save($createNew);
                }
            }
        }else{

            $employeeAll = Employee::all();
            foreach ($employeeAll as $employee) {
                // dd($employee->email_address);
                Mail::to($employee->email_address)->send(new MessageToEmployee($request->project_id));
                $createNew = new Message;
                $createNew->prob_message  = $request->project_id;
                // dd($request->project_id);
                $projectAttach->messages()->save($createNew);
            }
        }    
         Session::flash('success', 'Mail send successfully');
         return redirect()->route('project.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
