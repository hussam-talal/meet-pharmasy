@extends('product.layout')

@section('content')
<div class="card container" >
  
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text"> product name: {{$product->name}}</p>
    
      
    </div>
  </div>


<div class="container" style="padding-top: 8%"> 
    
        <div class="form-group">
          <label for="exampleFormControlInput1">{{$product->name}}</label>
         
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">{{$product->price}}</label>
           
          </div>
       
        
        <div class="form-group">
          
          
            {!! $product->detail !!}
         
        </div>
        
      
    
</div>
    
@endsection