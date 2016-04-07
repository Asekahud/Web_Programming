@extends('layouts.app')
@section('content')
    <table class="table table-bordered table-hover"><caption id="table-header">List of All Products</caption>
         <thead>
            <th>Product ID</th>
            <th>Name</th>
            <th>Excerpt</th>
            <th>Price</th>            
         </thead>
         <tbody>
 @foreach($products as $product)
            <tr>
              <td>{!! $product->product_id !!}</td>
              <td>{!! link_to_route('product.details',$product->name,$product->product_id) !!}</td>
              <td id="table-excerpt">{!!$product->excerpt!!}</td>
              <td id="table-excerpt">{!!$product->price !!}</td>              
            </tr>
 @endforeach
     
     </tbody>
          {!!$products->render()!!}
</table>
@endsection