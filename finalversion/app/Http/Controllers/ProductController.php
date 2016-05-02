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
        $products = DB::table('products')->paginate(5);       
        return view('product.allproducts', ['products' => $products]);
    }
    
    public function createForm()
    {
        return view('product.form');
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
            ->where('user_id',$id)->paginate(5);
        
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
              \Session::flash('message','You failed validation. Try Again!');
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
            );
             
             $update = DB::table('products')->where('product_id',$data['product_id'])->update($data);
             
             \Session::flash('message','Product have been successfully updated ');          
             return redirect('myproducts');
        }
     }
     public function delete($id)
    {
        $delete = DB::table('products')->where('product_id',$id)->delete();
        if ($delete > 0)
        {
            \Session::flash('message','Product have been succesfully deleted');
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
            'required' => 'The :attribute is required',            
            'min' => 'The :attribute is too short',
            'max' => 'The :attribute is too long.',                   
        ];
               
        return Validator::make($data, [
            'name' => 'required',
            'price' => 'required',
            'excerpt' => 'required|min:6',
            'description' => 'required|min:10',           
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
             
             $file = $request::file('image');
             $id = DB::table('products')->orderBy('product_id','desc')->value('product_id');
             $filename = 'Image-    '.$id.'.jpg';
             if ($file) {
               Storage::disk('local')->put($filename,File::get($file));
             }
             \Session::flash('message','Product have been successfully added ');
             return redirect('/myproducts');
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
