<?php

namespace App\Http\Controllers;

// bring in the models
use App\Company;
use App\Company_address;

use Illuminate\Http\Request;
use Session;

class CompanyController extends Controller
{   
    /*
    *validate register user
    *authenticate register use
    **go through the Auth middleware to ensure that these pages can be viewed only by users who have logged into the system
    */
    public function __construct(){
      
         $this->middleware('auth');
        
    }
    
    /**
     * Display a listing of all the clients.
     * redirects the view template located in resources/views/client/index
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all is a method that comes with the class Model that we are extending
        $clients = Company::all();
        return view('client.index' , compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     * redirects view template in resources/client/add
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.add');
    }

    /**
     * Store a newly created resource in the database
     * The form in the add template will submit to this function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a new Company and Company Address
        $company = new Company();
        $companyAddress = new Company_address();
        //validate the data the user entered in the form
        $validateData = $request->validate([
            'name'               => 'required|min:5',
            'phonNo'             => 'required',
            'email'              => 'required|email',
            'fname'              => 'required',
            'lname'              => 'required',
            'country'            => 'required',
            'addressOne'         => 'required',
            'addressTwo'         => 'required',
            'city'               => 'required'   
        ]);
        
        //assign the data entered by the user in the respective columns in the database
        $company->contact_fname = $request->fname;
        $company->contact_lname = $request->lname;
        $company->phone_number = $request->phonNo;
        $company->email_address = $request->email;
        $company->name = $request->name;
        
        //company address       
        
        $companyAddress->address_line1 = $request->addressOne;
        $companyAddress->address_line2 = $request->addressTwo;
        $companyAddress->town_city = $request->city;
        $companyAddress->country = $request->country;

        //save the variable holding the user inputs into the database
        $company->save();
        $company->companyAddress()->save($companyAddress);
        //Displays a message if everything went right
        Session::flash('success','Client Record Save successfully');
        // redirects to the list of all clients
        return redirect('/client');
    }

    /**
     * Display the specified resource.
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $client = Company::find($id);
       return view('client.single', compact('client')); 
    }

    public function edit($id)
    {
        $client = Company::findOrFail($id);
        return view('client.edit',compact('client'));
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        //very similar to the store method, but instead of creating a new Company
        //it looks for one with the id given, make alterations and save
        //This is Eloquent sintax for similar SELECT * FROM Company WHERE id = $id
        $company = Company::find($id);
        $companyAddress = Company_address::where('company_address_id', $id)->first();

        $validateData = $request->validate([
            'name'               => 'required|min:5',
            'phonNo'             => 'required',
            'email'              => 'required|email',
            'fname'              => 'required',
            'lname'              => 'required',
            'country'            => 'required',
            'addressOne'         => 'required',
            'addressTwo'         => 'required',
            'city'               => 'required'   
        ]);
        $company->contact_fname = $request->fname;
        $company->contact_lname = $request->lname;
        $company->phone_number = $request->phonNo;
        $company->email_address = $request->email;
        $company->name = $request->name;
        
        //company address       
        
        $companyAddress->address_line1 = $request->addressOne;
        $companyAddress->address_line2 = $request->addressTwo;
        $companyAddress->town_city = $request->city;
        $companyAddress->country = $request->country;

      
        $company->save();
        $company->companyAddress()->save($companyAddress);
        Session::flash('success','Client Record Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * looks for a company in the database with the given id and deletes it
     * redirects back to the list of clients
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Company::findOrFail($id);
        $client->delete();
        
        return redirect('/client')->with('completed', 'Client Deleted Successfully');
    }


    /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->ajax()){
            $query = $request->get('query');
            if($query==''){
                $data = ['fail'=>'Please Enter a valid ID'];
                echo json_encode($data);
            }
            else{
                $data = array();
                $data['client'] = Company::find($query);
                $data['address'] = Company_address::where('company_address_id', $query)->first();
                if($data['client']!=null){
                echo json_encode($data);
                }
                else{
                    $data = ['fail'=>'Please Enter a valid ID'];
                    echo json_encode($data);
                }
            }
        }
    }
}
