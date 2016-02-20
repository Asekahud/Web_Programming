<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class UserController extends Controller
{
    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getForm()
    {
        return $this->showUserForm();
    }
    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserForm()
    {
       return view('welcome');
    }
     /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
       public function index()
    {
        return $this->getForm();
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'student_id' => 'required|max:8|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {        
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'student_id' => $data['student_id'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
     /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->errors());          
        }
        else {
             $this->create($request->all());             
             return redirect('/signup');
        }  
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email'],['password'])) {
            
        }
    }
}
