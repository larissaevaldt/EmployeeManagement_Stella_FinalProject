<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *Makes sure only logged in users can have access to this page
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * Whatever gets displayed straight after login in
     * It redirects to the route in the index method of ProjectController 
     * which is the view dashboard_projects inside resources/views/projects
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('project.index');
    }
}
