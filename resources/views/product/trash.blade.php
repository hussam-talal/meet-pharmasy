@extends('product.layout')

@section('content')
  <div class="jumbotron">
    <h1 class="display-4">system supermarket</h1>
    <p class="lead"></p>
    <hr class="my-4">
    <p>trashed product</p>
    <a class="btn btn-primary btn-lg" href="{{route('product.index')}}"> Home</a>
  </div>

  
    
    
  </div>

  <div class="container">
    <table class="table">
      <thead style="background: black ;color:white">
        <tr>
          <th scope="col">#</th>
          <th scope="col">product name</th>
          <th scope="col">product price</th>
          <th scope="col">actions</th>
        </tr>
      </thead>
      <tbody>
        @php
            $i=0;
        @endphp
        @foreach ($product as $item)
        <tr>
          <td >{{++$i}}</td>
          <td >{{$item->name}}</td>
          <td >{{$item->price}}R</td>
          <td >
            <div class="row">
              
                <div class="col-sm">
                    <a class="btn btn-success" href="{{route('back.trash',$item->id)}}">Back</a>
                  </div>
                  <div class="col-sm">
                    <a class="btn btn-danger" href="{{route('back.trash.databass',$item->id)}}">Delete</a>
                  </div>
             
            </div>
            
  
            
          </td>
        </tr>
            
        @endforeach
      </tbody>
    </table>
    {!! $product->links() !!}
  </div>
    
@endsection