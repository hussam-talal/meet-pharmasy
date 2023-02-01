
@extends('product.layout')
@section('navbar')
    

    <nav class="navbar navbar-dark bg-dark">
    
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
           
      
    </nav>
  @endsection

@section('content')
  <div class="jumbotron">
    <h1 class="display-4">system supermarket</h1>
    <p class="lead"></p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{route('product.create')}}"> Create</a>
    <a class="btn btn-primary btn-lg" href="{{route('product.trash')}}"> Trash</a>
  </div>

  <div class="container"> 
    @if ($message=Session::get('success'))
    <div class="alert alert-primary " role="alert">
      {{$message}}
    </div>
        
    @endif
    
  </div>
<div class="container m-10 p-10">
 search name: <input type="text" name="input_search"  id="input_search" placeholder="search" method="GET">
</div>
<div id="jaxa_search_result">
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
                <a class="btn btn-success" href="{{route('product.edit',$item->id)}}">Edit</a>
              </div>
              <div class="col-sm">
                <a class="btn btn-primary" href="{{route('product.show',$item->id)}}">Show</a>
              </div>
              <div class="col-sm">
                <a class="btn btn-success" href="{{route('soft.delete',$item->id)}}">softDelete</a>
              </div>
              <div class="col-sm">
                <form action="{{route('product.destroy',$item->id) }}" <table class="table">
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
                </table>>
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
    {!! $product->links() !!}
  </div>
</div>
  
@endsection
@section('search')
<script>
 $(document).ready(function(){
   

    $(document).on("input","#input_search",function(e){
      e.preventDefault();
      
      var input_search=$(this).val();
      $.ajax ({
        url:"{{url('search_ajax')}}",
        method:"GET",
        datatype:"html",
        cache:false,
        data:{input_search:input_search,"_token":"{{csrf_token()}}"},
        sussess:function(data){
        $("#jaxa_search_result").html(data);

      },
      error:function(){

      },

    });
      
      

    });
  });
</script>
    
@endsection