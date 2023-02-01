<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $product=Product::all();
       $product=Product::latest()->paginate(5);

        return view('product.index',compact('product'));
    }
    public function trashedProducts()
    {
       // $product=Product::all();
       $product=Product::onlyTrashed()-> latest()->paginate(5);

        return view('product.trash',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
           // 'detail'=>'required',
        ]);
        $product=Product::create($request->all()) ;
        $user=User::get();
        $pro=Product::latest()->first();
        $user->notify (new product($pro));

        return redirect()->route('product.index')
        ->with('success','product added successflly'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.index')
        ->with('success','product update successflly'); 
    }
 
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
        ->with('success','product delete successflly'); 
    }
    public function softDelete($id)
    {
        $product=Product::find($id)->delete() ;
        
        return redirect()->route('product.index')
        ->with('success','product delete successflly'); 
    }
    
    public function backforEver($id)
    {
        //$product=Product::find($id) ;
        $product=Product::onlyTrashed()->where('id',$id)->forceDelete();
        
        return redirect()->route('product.trash')
        ->with('success','product delete successflly'); 
    }

public function backDelete($id)
    {
        //$product=Product::find($id) ;
        $product=Product::onlyTrashed()->where('id',$id)->first()->restore();
        
        return redirect()->route('product.trash')
        ->with('success','product back successflly'); 
    }
    public function search_ajax (Request $request)  {
        if($request->ajax()){
      $search_ajax=$request->input_search;
      $data=Product::where('name','like','%'.$search_ajax.'%')->orderby("id","ASC")->paginate(1); 
    return view('search_ajax',['data'=>$data]) ;
    }

    } 
}
