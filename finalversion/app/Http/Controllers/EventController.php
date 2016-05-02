<?php

namespace App\Http\Controllers;
use Request;
use App\Models\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Validator;
use Auth;
use Storage;
use File;
use Response;

class EventController extends Controller
{
    public function showall()
    {
        $events = DB::table('events')->paginate(10);       
        return view('event.allevents', ['events' => $events]);
    }
    public function createForm()
    {
        return view('event.form');
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
              \Session::flash('message','You failed validation. Try Again!');
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
            );
             $update = DB::table('events')->where('event_id',$data['event_id'])->update($data);             
             \Session::flash('message','Event have been successfully updated ');  
             return redirect('myevents');
        }
     }
     public function delete($id)
    {
        $delete = DB::table('events')->where('event_id',$id)->delete();
        if ($delete > 0)
        {
            \Session::flash('message','Event have been succesfully deleted');
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
            'required' => 'The :attribute is required',            
            'min' => 'The :attribute  is too short',
            'max' => 'The :attribute  is too long.',
            'numeric' => 'The :attribute  must be numeric type',
        ];
               
        return Validator::make($data, [
            'title' => 'required|min:5',
            'place' => 'required|min:6',
            'space_remained' => 'required|numeric',
            'excerpt' => 'required|min:6',
            'description' => 'required|min:10',                  
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
              \Session::flash('message','You failed validation. Try Again!');
              return redirect()->back()->withErrors($validator->messages());          
        }
        else {
             $this->create($request::all());             
             \Session::flash('message','Event have been successfully added '); 
             return redirect('/myevents');
        }  
    }
    public function book(Request $request)
    {      
        $event = $request::input('event_id');
        $user = $request::input('user_id');
        $owner = $request::input('owner_id');
        
        if ($event == $owner) {
            \Session::flash('error','You cannot book place to your own event!!!');            
            return redirect()->back();
        }
        else {
          $space = DB::table('events')->where('event_id',$event)->value('space_remained');
          if ($space == 0 )
           {
             \Session::flash('error','There is no space left in this event!!!');            
             return redirect()->back();
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
              DB::table('events')->where('event_id',$event)->decrement('space_remained'); 
               \Session::flash('confirmation','You succesfully booked place to the event');      
              return redirect()->back();
             }
           else
            {
             \Session::flash('error','You already booked place to that event!');
             return redirect()->back();          
            }
           }
        }
    }
    public function guestlist($id)
    {      
     
     $guests = DB::table('event_user')->where('event_user.event_id',$id)
         ->join('events', 'event_user.event_id','=','events.event_id')
         ->join('users', 'event_user.user_id','=','users.id')
         ->paginate(10);     
      return view('event.guest_list',['guests'=>$guests]);    
    }
    public function getImage($filename) {
        
        $path = storage_path() . '/app/product/Event-' . $filename.'.jpg';
        
        $file = File::get($path); 
        $type = File::mimeType($path);
        
        $response = Response::make($file, 200); 
        $response->header("Content-Type", $type);        
        return $response;
    }
}
