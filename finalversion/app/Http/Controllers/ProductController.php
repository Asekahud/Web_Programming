<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Validator;

class ProductController extends Controller
{
   public function index()
   {
     return view('product.product-detail'); 
   }
   public function showAll()
    {
        $products = DB::table('products')->paginate(10);       
        return view('product.myproducts', ['products' => $products]);
    }
   public function showDetails($id)
    {
      $product = DB::table('products')
            ->join('categories', 'products.category_id','=','categories.category_id')
            ->join('users', 'products.user_id','=','users.id')
            ->where('product_id',$id)->first();      
       return view('product.product-detail',['product' => $product]);  
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
            'price' => 'required|min:4|max:20',
            'excerpt' => 'required|min:15|max:40',
            'description' => 'required|min:40|max:255',                  
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
            'user_id' => 2,
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
             return redirect('/products');
        }  
    }
}
