<?php

namespace App\Http\Controllers;

use Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;
use DB;
use Response;

class UserController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        return view('welcome');
    }
     public function add_form()
    {
        return view('create');
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
            'required' => 'This field is required',
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
             return redirect('/');
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
        $errors = new MessageBag;
    
        $email = Request::input('email_in');
        $password = Request::input('password_in');
        
        if (Auth::attempt(['email' => $email,'password' =>$password])) {
            return redirect('/');
        }
        else {
            $errors = new MessageBag(['email_in' => ['Email and/or password invalid.']]);
            return redirect()->back()->withErrors($errors);
        }
    }
    /**
     * Handle a logout request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout() {
      Auth::logout();
      Session:flush();
      return redirect('/');
    }
    public function openChat(Request $request) {
        
         $sender_id = $request::input('from_id');
         $receiver_id = $request::input('to_id');
         $sender_name = DB::table('users')->select('firstname')->where('id','=',$sender_id)->value('firstname');
         $receiver_name = DB::table('users')->select('firstname')->where('id','=',$receiver_id)->value('firstname');
                  
         if ($sender_id == $receiver_id) {
           return view('auth.error');
         }
         {
            $data = array (
                'sender_id' => $sender_id,
                'receiver_id' => $receiver_id,
                'sender_name' => $sender_name,
                'receiver_name' => $receiver_name,                
            );
            
            $messages = $this->getChatHistory($sender_id,$receiver_id);
            return view('auth.chatroom',['chat'=>$data,'messages'=>$messages]);
         }
    }
    
    public function sendMessage() {
         if (Request::ajax()) {
           $message=Request::input();
           $data = array(
            'from_id' =>  $message['sender_id'],
            'to_id' =>    $message['receiver_id'],
            'content' => $message['content'],         
            );
           DB::table('messages')->insert($data);
         }
    }
    public function getChatHistory($from_id, $to_id) {
        
        $messages=DB::table('messages')
            ->where(function ($query) use($from_id,$to_id) {
                $query->where('from_id',$from_id)
                      ->where('to_id',$to_id);
            })
            ->orWhere(function ($query) use($from_id,$to_id) {
                $query->where('from_id', $to_id)
                      ->where('to_id', $from_id);
            })->get();
       
         foreach ($messages as $message) {
            DB::table('messages')
               ->where('from_id',$message->from_id)
               ->update(['sender_read'=>true]);
            DB::table('messages')
               ->where('to_id',$message->from_id)
               ->update(['receiver_read'=>true]);
         }
        
        return $messages;        
    }
    public function getUnreadMessages() {
      
        if (Request::ajax()) {
            
         $data=Request::input();
         $from_id = $data['sender_id'];
         $to_id = $data['receiver_id'];
         
          $messages=DB::table('messages')
            ->where(function ($query) use($from_id,$to_id) {
                $query->where('from_id',$from_id)
                      ->where('to_id',$to_id)
                      ->where('sender_read',false);
            })
            ->orWhere(function ($query) use($from_id,$to_id) {
                $query->where('from_id', $to_id)
                      ->where('to_id', $from_id)
                      ->where('receiver_read',false);
            })->get();           
           $results=array();
           foreach ($messages as $message) {                   
               
               DB::table('messages')
                 ->where('from_id',$message->from_id)
                 ->update(['sender_read'=>true]);
               DB::table('messages')
                 ->where('to_id',$message->from_id)
                 ->update(['receiver_read'=>true]);
                $results[] = ['from_id' => $message->from_id, 'to_id' => $message->to_id, 'content' => $message->content];
             }
             
            return Response::json($results);
        }
    }
}
    
    

