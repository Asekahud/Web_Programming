<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Request;
use App\Models\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Validator;
use Auth;

class EventController extends Controller
{
    public function showall()
    {
        $events = DB::table('events')->paginate(10);       
        return view('event.allevents', ['events' => $events]);
    }
    
   public function showDetails($id)
    {
      $event = DB::table('events')            
            ->join('users', 'events.user_id','=','users.id')
            ->where('event_id',$id)->first();      
       return view('event.event-detail',['event' => $event]);  
    }
    
    public function getMyEvents()
    {
        $id=Auth::user()->id;        
        $events = DB::table('events')            
            ->join('users', 'events.user_id','=','users.id')
            ->where('user_id',$id)->paginate(10);
        
        return view('event.myevents', ['events' => $events]);
    }
    public function updateForm($id)
    {
        $event = DB::table('events')->where('event_id',$id)->first();       
        return view('event.update_form',['event' => $event]);      
    }
     public function update(Request $request) {
        $validator = $this->validator($request::all());
        if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages());          
        }
        else {
         $event = Request::input();
         $data = array(
            'event_id' =>  $event['id'],
            'title' =>  $event['title'],
            'place' =>  $event['place'],
            'space_remained' =>  $event['space_remained'],
            'excerpt' =>  $event['excerpt'],            
            'description' =>  $event['description'],
            'user_id' => Auth::user()->id,
            'image' => 'url(/images/business1.jpg)',
            );
             $update = DB::table('events')->where('event_id',$data['event_id'])->update($data);             
             return redirect('myevents');
        }
     }
     public function delete($id)
    {
        $delete = DB::table('events')->where('event_id',$id)->delete();
        if ($delete > 0)
        {
            \Session::flash('message','Post have been deleted succesfully');
            return redirect('myevents');
        }
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
        ];
               
        return Validator::make($data, [
            'title' => 'required|min:5|max:50',
            'place' => 'required|min:2|max:20',
            'space_remained' => 'required|numeric',
            'excerpt' => 'required|min:15|max:40',
            'description' => 'required|min:40|max:255',                  
        ],$messages);
    }
    public function create(array $data)
    {        
        return Event::create([
            'title' => $data['title'],         
            'place' => $data['place'],
            'space_remained' => $data['space_remained'],
            'excerpt' => $data['excerpt'],            
            'description' => $data['description'],
            'user_id' => Auth::user()->id,
            'image' => 'url(/images/business1.jpg)',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function addToCatalogue(Request $request) {      
              
        $validator = $this->validator($request::all());
        if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages());          
        }
        else {
             $this->create($request::all());             
             return redirect('/events');
        }  
    }
    public function book(Request $request) {      
        $event = $request::input('event_id');
        $user = $request::input('user_id');
        $owner = $request::input('owner_id');
        
        if ($event == $owner) {
            $message="You cannot book place to your own event!!!";
            return view('event.confirmation', ['message' => $message]);
        }
        else {
         $exist = DB::table('event_user')
              ->where('event_id','=',$event)
              ->where('user_id','=',$user)
              ->first();
         
         if (is_null($exist))
         {
              $booking = array(
               'event_id' => $event,
               'user_id' => $user,
              );
              DB::table('event_user')->insert($booking);
              $message="You successfully registered to the event";
              return view('event.confirmation', ['message' => $message]);
         }
         else
         {
             $message="You already booked place to that event!!!";
             return view('event.confirmation', ['message' => $message]);            
         }
        }
    }
    public function guestlist($id) {      
     
    $guests = DB::table('event_user')->where('event_user.event_id',$id)
        ->join('events', 'event_user.event_id','=','events.event_id')
        ->join('users', 'event_user.user_id','=','users.id')
        ->paginate(10);     
     return view('event.guest_list',['guests'=>$guests]);
    
    }
}
