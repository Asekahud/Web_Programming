@extends('layouts.app')
@section('content')
    @if(Session::has('message'))
     <div class="confirmation">
        {{ Session::get('message') }}
     </div>    
    @endif
    <div class="create-div">
        {!! Form::open(array('url'=>'product/createForm', 'method'=>'GET')) !!}           
        {!! Form::submit('Add New Product', array('class'=>'create-button')) !!} 
        {!! Form::close() !!}
    </div>
    @if(count($products)>0)   
    <table><caption id="table-header">Your Products</caption>
         <thead>
            <th>Product ID</th>
            <th>Name</th>
            <th>Excerpt</th>
            <th>Price</th>
            <th>Change</th>
         </thead>
         <tbody>
 @foreach($products as $product)
            <tr>
            <td>{!! $product->product_id !!}</td>
            <td>{!! $product->name !!}</td>
            <td id="table-excerpt">{!!$product->excerpt!!}</td>
            <td id="table-excerpt">{!!$product->price !!}</td> 
              <td>
                  {!! link_to_route('product.updateForm','Edit',$product->product_id) !!} |
                  {!! link_to_route('product.delete','Delete',$product->product_id)  !!}
              </td>
            </tr>
 @endforeach  
     </tbody>          
</table>
 @else
   <div class="message-div">
    <p>You don't have any products!</p>
   </div>
 @endif
@endsection