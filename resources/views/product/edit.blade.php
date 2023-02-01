@extends('product.layout')

@section('content')
<div class="card container" >
  
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text"> product name: {{$product->name}}</p>
    
      
    </div>
  </div>


<div class="container" style="padding-top: 12%"> 
    <form action="{{route('product.update',$product->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" value="{{$product->name}}" class="form-control"  placeholder="product name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">price</label>
            <input type="text" name="price" value="{{$product->price}}" class="form-control"  placeholder="product price">
          </div>
       
        
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Details</label>
          <textarea class="form-control" name="detail" rows="3">
            {!! $product->detail !!}
          </textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>
        </div>
      </form>
    
</div>
    
@endsection