<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Employee_bank_record;
use App\Employee_address;
use App\Employee_working_time;
use App\Company;
use Session;

class EmployeeController extends Controller
{    


    /**
    *validate register user
    *authenticate register user
    *
    */
    public function __construct(){
        $this->middleware('auth');
        
    }

    /**
     * Display a list of all the employees.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetches the database for all the employees and passes to the view so we can display to the user
        $employees = Employee::all();
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $companies = Company::all();
        return view('employee.add',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $employee = new Employee;
        $employeeAddress = new Employee_address;
        // $employeeBankRecord = new Employee_bank_record;
        $employeeTiming = new Employee_working_time;

        $validateData = $request->validate([
            'first_name'         => 'required|min:3|max:45',
            'last_name'          => 'required|min:5|max:45',
            'email_address'      => 'required|email',
            'phone_number'       => 'required',
            'date_of_birth'      => 'required',
            'country'            => 'required',
            'address_line1'      => 'required',
            'address_line2'      => 'required',
            'visa_status'        => 'required',
            'visa_expire'        => 'required',
            'work_hour'          => 'required',
            'pps_number'         => 'required',
            'passport_number'    => 'required',
            'manual_hand'        => 'required|in:yes,no',
            'manual_exp'         => 'required',
            'banned'             => 'required|in:yes,no',
            'job_role'           => 'required',
            'min_pay'            => 'required',
            'full_available'     => 'required|in:yes,no',
            'nationality'        => 'required',
            'status'             => 'required'  
        ]);
        // $bannedValue = Input::has('banned') ? Input::get('banned') : null;
        // @if ($bannedValue == "yes")
        //     {{ 
        //         $count = 1;
        //         $bannedSite = $request->get("banned_site_".$count);
        //     }}
        //     @foreach ($bannedSite as $key => $bannedSiteDynamic)
        //         $validateData = $request->validate([
        //             $bannedSiteDynamic => 'required'
        //         ]);
        //         {{count++;}}
        //     @endforeach
        // @endif

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->phone_number= $request->phone_number;
        $employee->email_address = $request->email_address;
        $employee->date_of_birth= $request->date_of_birth;
        $employee->nationality = $request->nationality;
        $employee->pps_number= $request->pps_number;
        $employee->passport_number = $request->passport_number;
        $employee->visa_status= $request->visa_status;
        $employee->visa_expire = $request->visa_expire;
        $employee->manual_hand= $request->manual_hand;
        $employee->manual_exp = $request->manual_exp;
        $employee->banned = $request->banned;
        $employee->full_available= $request->full_available;
        $employee->job_role = $request->job_role;
        $employee->min_pay = $request->min_pay;
        $employee->work_hour = $request->work_hour;
        $employee->status = $request->status;
        
        //address
        $employeeAddress->address_line1= $request->address_line1;
        $employeeAddress->address_line2 = $request->address_line2;
        $employeeAddress->town_city= $request->town_city;
        $employeeAddress->country = $request->country;

        $employee->save();
        if($request->bannedArr != null){
            $employee->company()->sync($request->bannedArr,false);
        }
        $employee->employeeAddress()->save($employeeAddress);        

        if($request->full_available=="no"){

        $employeeTiming->mondayStart = $request->mondayStart;
        $employeeTiming->tuesdayStart = $request->tuesdayStart;
        $employeeTiming->wednesdayStart = $request->wednesdayStart;
        $employeeTiming->thursdayStart = $request->thursdayStart;
        $employeeTiming->FridayStart = $request->FridayStart;
        $employeeTiming->saturdayStart = $request->saturdayStart;
        $employeeTiming->sundayStart = $request->sundayStart;
        $employeeTiming->mondayLast = $request->mondayLast;
        $employeeTiming->tuesdayLast = $request->tuesdayLast;
        $employeeTiming->wednesdayLast = $request->wednesdayLast;
        $employeeTiming->thursdayLast = $request->thursdayStart;
        $employeeTiming->FridayLast = $request->FridayStart;
        $employeeTiming->saturdayLast = $request->saturdayStart;
        $employeeTiming->sundayLast = $request->sundayLast;
        $employee->employeeWorkingTime()->save($employeeTiming);

        }
        Session::flash('success', 'Employee Record Saved Successfully!');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $employee = Employee::find($id);
        // dd($employee);
        return view('employee.single',compact('employee'));

    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        // $employee = Employee::find($id);
        return view('employee.edit',compact('employee'),compact('companies'));
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'first_name'         => 'required|min:3|max:45',
            'last_name'          => 'required|min:5|max:45',
            'email_address'      => 'required|email',
            'phone_number'       => 'required',
            'date_of_birth'      => 'required',
            'country'            => 'required',
            'address_line1'      => 'required',
            'address_line2'      => 'required',
            'visa_status'        => 'required',
            'visa_expire'        => 'required',
            'work_hour'          => 'required',
            'pps_number'         => 'required',
            'passport_number'    => 'required',
            'manual_hand'        => 'required|in:yes,no',
            'manual_exp'         => 'required',
            'banned'             => 'required|in:yes,no',
            'job_role'           => 'required',
            'min_pay'            => 'required',
            'full_available'     => 'required|in:yes,no',
            'nationality'        => 'required',
            'status'             => 'required'  
        ]);
        // $bannedValue = Input::has('banned') ? Input::get('banned') : null;
        // @if ($bannedValue == "yes")
        //     {{ 
        //         $count = 1;
        //         $bannedSite = $request->get("banned_site_".$count);
        //     }}
        //     @foreach ($bannedSite as $key => $bannedSiteDynamic)
        //         $validateData = $request->validate([
        //             $bannedSiteDynamic => 'required'
        //         ]);
        //         {{count++;}}
        //     @endforeach
        // @endif
        
        $employee = Employee::find($id);
        $employeeAddress = Employee_address::where('employee_address_id', $id)->first();
        $employeeTiming = Employee_working_time::where('employee_id', $id)->first();


        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->phone_number= $request->phone_number;
        $employee->email_address = $request->email_address;
        $employee->date_of_birth= $request->date_of_birth;
        $employee->nationality = $request->nationality;
        $employee->pps_number= $request->pps_number;
        $employee->passport_number = $request->passport_number;
        $employee->visa_status= $request->visa_status;
        $employee->visa_expire = $request->visa_expire;
        $employee->manual_hand= $request->manual_hand;
        $employee->manual_exp = $request->manual_exp;
        $employee->banned = $request->banned;
        $employee->full_available= $request->full_available;
        $employee->job_role = $request->job_role;
        $employee->min_pay = $request->min_pay;
        $employee->work_hour = $request->work_hour;
        $employee->status = $request->status;
        
        $employee->save();
        //address
        $employeeAddress->address_line1= $request->address_line1;
        $employeeAddress->address_line2 = $request->address_line2;
        $employeeAddress->town_city= $request->town_city;
        $employeeAddress->country = $request->country;   
        
        $employee->employeeAddress()->save($employeeAddress);  
        
        if($request->bannedArr != null){
            $employee->company()->sync($request->bannedArr,false);
        }else{
            $employee->company()->sync(array());
        }
        
        //timing 
        if($request->full_available=="no"){
            $employeeTiming->mondayStart = $request->mondayStart;
            $employeeTiming->tuesdayStart = $request->tuesdayStart;
            $employeeTiming->wednesdayStart = $request->wednesdayStart;
            $employeeTiming->thursdayStart = $request->thursdayStart;
            $employeeTiming->FridayStart = $request->FridayStart;
            $employeeTiming->saturdayStart = $request->saturdayStart;
            $employeeTiming->sundayStart = $request->sundayStart;
            $employeeTiming->mondayLast = $request->mondayLast;
            $employeeTiming->tuesdayLast = $request->tuesdayLast;
            $employeeTiming->wednesdayLast = $request->wednesdayLast;
            $employeeTiming->thursdayLast = $request->thursdayStart;
            $employeeTiming->FridayLast = $request->FridayStart;
            $employeeTiming->saturdayLast = $request->saturdayStart;
            $employeeTiming->sundayLast = $request->sundayLast;
            $employee->employeeWorkingTime()->save($employeeTiming);
        }

        // Session::flash('success', 'Employee Record Updated Successfully!');
        return redirect('/employee')->with('success', 'Employee Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function alter()
    {
        $companies = Company::all();
        return view('employee.update',compact('companies'));
    }

    /*
    public function edit($id) {
        $employee = Employee::find($id);
        return view('employee.update')->with('employee', $employee);
    }
    */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function setActiveUpdate(Request $request)
    {
        for($i = 1; $i<= $request->totalEmployee; $i++){
            if($request->input('employee'.$i)!= null){
            $employeeStatus = Employee::find($request->input('employee'.$i));
            $employeeStatus->status = 'InActive';
            $employeeStatus->save();
            }
        }
        Session::flash('success','List updated Successfully');
        return redirect()->back();
    }

    /**
     * Get the all relevant resources.
     *
     * @return list of all active employee
     */
    public function allActiveEmployee()
    {
        $employees = Employee::where('status', '=', 'active')->get();
        return view('employee.activeemployee',compact('employees'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $student = Student::findOrFail($id);
        // $student->delete();

        // return redirect('/students')->with('completed', 'Student has been deleted');

        $employee = Employee::findOrFail($id);
        $employee->delete();
        
        // Session::flash('success', 'Employee Deleted Successfully');
        return redirect('/employee')->with('completed', 'Employee Deleted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
        if($request->ajax()){
            //get the query passed in the request
            $query = $request->get('query');
            
            if($query==''){
                $data = ['fail'=>'There is no employee with the ID entered'];
                echo json_encode($data);
            }
            else{
                $data = array();
                $data['employee'] = Employee::find($query);
                $data['bankRecord'] = Employee_bank_record::where('employee_id', $query)->get();

                $data['address'] = Employee_address::where('employee_address_id', $query)->get();
                $data['timing'] = Employee_working_time::where('employee_id', $query)->get();
                if($data['employee']!=null){
                echo json_encode($data);
                }
                else{
                    $data = ['fail'=>'There is no employee with the ID entered. Try another ID'];
                    echo json_encode($data);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function weeklyUpdate(Request $request)
    {
        if($request->ajax()){
            $gnib = $request->get('gnib');
            $manual = $request->get('manual');
            if($gnib == '' || $manual == ''){
                $data = ['fail'=>'Please Enter Valid Dates!'];
                echo json_encode($data);
            }
            else{
                $data = array();

                $data['employee'] = Employee::where([
                    ['visa_expire', '<=' ,$gnib],
                    ['manual_exp', '<=' ,$manual],
                    ['status', '=' ,'Active']
                ])->get();
                if($data['employee']!=null){
                echo json_encode($data);
                }
                else{
                    $data = ['fail'=>'Please Enter Valid Dates!'];
                    echo json_encode($data);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function weeklyUpdateSearch(Request $request)
    {
        if($request->ajax()){
            $gnib = $request->get('gnib');
            $manual = $request->get('manual');
            $employeeName = $request->get('finalName');
            
            if($gnib == '' || $manual == ''){
                $data = ['fail'=>'Please Enter Valid Dates!'];
                echo json_encode($data);
            }
            else{
                $data = array();

                $data['employee'] = Employee::where([
                    ['visa_expire', '<=' ,$gnib],
                    ['manual_exp', '<=' ,$manual],
                    ['status', '=' ,'Active']

                ])->WhereRaw("concat(first_name, ' ', last_name) like '%$employeeName%' ")->get();
                if($data['employee']!=null){
                echo json_encode($data);
                }
                else{
                    $data = ['fail'=>'Please Enter Valid Dates!'];
                    echo json_encode($data);
                }
            }
        }
    }

}
