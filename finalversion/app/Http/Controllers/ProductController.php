<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use Validator;
use Storage;
use Auth;
use File;
use Response;

class ProductController extends Controller
{
    public function showall()
    {
        $products = DB::table('products')->paginate(10);       
        return view('product.allproducts', ['products' => $products]);
    }
    
   public function showDetails($id)
    {
      $contents=$this->getImage($id);
      $product = DB::table('products')
            ->join('categories', 'products.category_id','=','categories.category_id')
            ->join('users', 'products.user_id','=','users.id')
            ->where('product_id',$id)->first();      
       return view('product.product-detail',['product' => $product, 'photo' => $contents]);  
    }
    
    public function getMyProducts()
    {
        $id=Auth::user()->id;        
        $products = DB::table('products')
            ->join('categories', 'products.category_id','=','categories.category_id')
            ->join('users', 'products.user_id','=','users.id')
            ->where('user_id',$id)->paginate(10);
        
        return view('product.myproducts', ['products' => $products]);
    }
    public function updateForm($id)
    {
        $product = DB::table('products')->where('product_id',$id)->first();       
        return view('product.update_form',['product' => $product]);      
    }
     public function update(Request $request) {
        $validator = $this->validator($request::all());
        if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages());          
        }
        else {
         $product = Request::input();
         $data = array(
            'product_id' =>  $product['id'],
            'name' =>  $product['name'],
            'category_id' =>  $product['category'],
            'price' =>  $product['price'],
            'school' =>  $product['school'],
            'excerpt' =>  $product['excerpt'],            
            'description' =>  $product['description'],
            'user_id' => Auth::user()->id,
            'image' => 'url(/images/business1.jpg)',
            );
             $update = DB::table('products')->where('product_id',$data['product_id'])->update($data);
             return redirect('myproducts');
        }
     }
     public function delete($id)
    {
        $delete = DB::table('products')->where('product_id',$id)->delete();
        if ($delete > 0)
        {
            \Session::flash('message','Post have been deleted succesfully');
            return redirect('myproducts');
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
            'name' => 'required|min:5|max:50',
            'price' => 'required|min:2|max:4',
            'excerpt' => 'required|min:15|max:40',
            'description' => 'required|min:40|max:255',
            'image' => 'required',
        ],$messages);
    }
    public function create(array $data)
    {        
        return Product::create([
            'name' => $data['name'],
            'category_id' => $data['category'],
            'price' => $data['price'],
            'school' => $data['school'],
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
             
             $file = $request::file('image');
             $id = DB::table('products')->orderBy('product_id','desc')->value('product_id');
             $filename = 'Image-    '.$id.'.jpg';
             if ($file) {
               Storage::disk('local')->put($filename,File::get($file));
             }
             
             return redirect('/products');
        }  
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function search(Request $request) {      
              
       $searchterm = Request::input('searchterm');      
       $products = DB::table('products')->where('name','LIKE', '%'.$searchterm.'%')->paginate(5);
       return view('product.search_result',['products' => $products]);         
    }
    public function getImage($filename) {
        
        $path = storage_path() . '/app/product/Image-' . $filename.'.jpg';
        
        $file = File::get($path); 
        $type = File::mimeType($path);
        
        $response = Response::make($file, 200); 
        $response->header("Content-Type", $type);        
        return $response;
    }
    public function autocomplete() {
           
            $searchterm = Input::get('term');
            $results=array();
            $queries=DB::table('products')->where('name','LIKE', '%'.$searchterm.'%')->get();
            foreach ($queries as $query)
            {
                $results[] = ['id' => $query->product_id, 'value' => $query->name];
            }
            return Response::json($results);
    }
}
