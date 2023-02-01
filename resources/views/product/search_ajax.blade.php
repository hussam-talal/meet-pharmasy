@extends('product.layout')
@section('content')
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
    @foreach ($data as $item)
    <tr>
      <td >{{++$i}}</td>
      <td >{{$item->name}}</td>
      <td >{{$item->price}}R</td>
      <td >
        <div class="row">
          <div class="col-sm">
            <a class="btn btn-success" href="{{route('product.edit',$item->id)}}">Edit</a>
          </div>
          <div class="col-sm">
            <a class="btn btn-primary" href="{{route('product.show',$item->id)}}">Show</a>
          </div>
          <div class="col-sm">
            <a class="btn btn-success" href="{{route('soft.delete',$item->id)}}">softDelete</a>
          </div>
          <div class="col-sm">
            <form action="{{route('product.destroy',$item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
             </form>
          </div>
        </div>
        

        
      </td>
    </tr>
        
    @endforeach
  </tbody>
</table>
   
@endsection
