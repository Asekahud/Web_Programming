<?php

namespace App\Http\Controllers;

use Request;
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
        $messages = [
            'required' => 'The :attribute field is required',
            'size' => 'The field must be :size chars',
            'min' => 'The field is too short',
            'max' => 'The field is too long.',
            'unique' => 'This :attribute already exists.',
            'email' => 'You should provide valid email address',
            'confirmed' => 'Passwords does not match!',
        ];
               
        return Validator::make($data, [
            'firstname' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'student_id' => 'required|size:8|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',        
        ],$messages);
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
        $validator = $this->validator($request::all());
        if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages());          
        }
        else {
             $this->create($request::all());             
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
        $email = Request::input('email');
        $password = Request::input('password');
        if (Auth::attempt(['email' => $email,'password' =>$password])) {
            return redirect('/signin');
        }
        else {
            return redirect()->back();
        }
    }
}
