<?php

namespace App\Http\Controllers;

// import the models
use App\Project;
use App\Shift;
use App\Employee;
use App\Company;
use App\Employee_working_time;
use App\Problem;
use App\Problem_for_project;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Session;

class ProjectController extends Controller
{

    /**
    *authenticate register user
    *makes sure only logged in users can see this
    */
    public function __construct(){
        $this->middleware('auth');   
    }
    
    /**
     * Display a listing of active projects.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $projects = Project::where('status','=','Active')->get();
        return view('project.dashboard_projects',compact('projects'));
    }

    /**
     * Show the form to create a new project.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jobRole = Employee::select('job_role','id')->distinct()->get()->toArray();
        $jobRole = Employee::select('job_role')->distinct()->get();
        // $companies = Company::select('id')->get();
        $companies = Company::all();
        // echo $companies;
        return view('project.add',compact('jobRole','companies'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project;
        $shift = new Shift;

        $validateData = $request->validate([
            // 'project_requirement'=> 'required|in:Extra Order,Roster Changes',
            'company_id'         => 'required',
            'job_role'           => 'required',
            'entered_by'         => 'required|min:3',   
            'project_description'=> 'required',
            'number_of_staff'    => 'required|min:1',
            'rate_of_pay'        => 'required|min:1',
            'workingStart'       => 'required',
            'workingFinish'      => 'required',
            'date'               => 'required',
            'location'           => 'required|min:5'   
        ]);
        $date = date('d/m/Y \a\t g:ia');
        
        $project->entered_by = $request->entered_by;
        // $project->project_requirement = $request->project_requirement;
        $project->company_id = $request->company_id;
        $project->job_role = $request->job_role;
        $project->project_description = $request->project_description;
        $project->number_of_staff = $request->number_of_staff;
        $project->rate_of_pay = $request->rate_of_pay;
        $project->date = $request->date;
        $project->start_time = $request->workingStart;
        $project->end_time = $request->workingFinish;
        $project->location = $request->location;
        $project->status = "Active";

        $shift->start_time = $request->workingStart;
        $shift->end_time= $request->workingFinish;
        $shift->role_id = $request->job_role;
        

        
        $employee = Employee::where('status','=', 'Active')->take($request->number_of_staff)->pluck('id')->toArray();


        $project->save();
        $project->shifts()->save($shift);
        $shift->employee()->sync($employee,false);
        Session::flash('success','Project Added Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('project.ongoing_detail',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function findProject(Request $request)
    {
        $project = Project::where('id','=',$request->project_id)->where('status','=','Active')->first();
        
        if($project != ""){
            //selects active employess with manual handling and visa expiry date greater than the project date,
            //with the job_role equals to the project and also with the min.pay rate smaller than what the project pays
            $employees= Employee::where([
                ['manual_exp', '>', $project->date],
                ['visa_expire', '>', $project->date ],
                ['min_pay', '<', $project->rate_of_pay ],
                ['job_role', '=', $project->job_role],
                ['status', '=', 'Active']
            ])->get();
    
            Session::flash('success','Active Project Found!');
            return view('message.create',compact('project', 'employees'));
        }else{
            Session::flash('success','No Active Project Found!');   
            return view('message.create');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * View single resorce.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function finsh($id)
    { 
        $project = Project::find($id); 
        return view('project.finish',compact('project'));
    }
    /**
     * View single resorce.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function singleFinsh($id)
    { 
        $project = Project::find($id); 
        return view('project.detail_finsh',compact('project'));
    }
    

      /**
     * View all resorce on specefic condition
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function allFinished()
    { 
        $projects = Project::where('status','=','InActive')->get(); 
        return view('project.index',compact('projects'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function finalize(Request $request, $id)
    { 
        
        $projectProblem = new Problem_for_project;
        $project = Project::find($id);
        $project->status = "InActive";
        $project->save();
        
        if($request->project_problem != ""){
            
            $projectProblem->prob_message = $request->project_problem;
            $project->projectProblem()->save($projectProblem);
        }
        Session::flash('success','Project Markeed as Finsh');
            return redirect()->route('project.allFinsh');
    }


    /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function problemSave(Request $request)
    {
        if($request->ajax()){
            $employee_id = $request->get('employee_id');
            $cancelled = $request->get('cancelled');
            $show_up = $request->get('show_up');
            $arrived = $request->get('arrived');;
            $bad_performace = $request->get('bad_performace');
            $project_id = $request->get('project_id');
            
            if($project_id!=""){
            $project = Project::find($project_id);
            $company = Company::find($project->company_id);
            
            $finalprob_message = $cancelled.",".$show_up.",".$arrived.",".$bad_performace;

            $company->employeeProblem()->attach($employee_id, ['prob_message'=> $finalprob_message, 'code_id'=>  $project->company_id]);
            $pivot_id = Problem::max('id');
            $project->problem()->attach($pivot_id,['code' => $project->company_id]);
                      
                $data = array();
                $data['success'] = 'Successfully Save Profile';
                echo json_encode($data);
            }
            else{
                $data = array();
                $data['fail'] = 'Please Provide Valid Detail';
                echo json_encode($data);   
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function problemSaveCompany(Request $request)
    {
        if($request->ajax()){
            $employee_id = $request->get('client_id');
            $transport_problem = $request->get('transport_problem');
            $pay_rate = $request->get('pay_rate');
            $manager_problem = $request->get('manager_problem');
            $traning = $request->get('traning');
            $project_id = $request->get('project_id');
            
            if($project_id!=""){
            $project = Project::find($project_id);
            $company = Company::find($project->company_id);
            
            $finalprob_message = $transport_problem.",".$pay_rate.",".$manager_problem.",".$traning;

            $company->employeeProblem()->attach($employee_id, ['prob_message'=> $finalprob_message, 'code_id'=>  $employee_id]);
            $pivot_id = Problem::max('id');

            $project->problem()->attach($pivot_id,['code' => $employee_id]);
                      
                $data = array();
                $data['success'] = 'Successfully Save Profile';
                echo json_encode($data);
            }
            else{
                $data = array();
                $data['fail'] = 'Please Provide Valid Detail';
                echo json_encode($data);   
            }
         
        }
    }
}
