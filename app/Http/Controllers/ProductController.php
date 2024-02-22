<?php

namespace App\Http\Controllers;

use App\Models\Producr;
use Illuminate\Http\Request;
use App\Http\Controllers\Blueprint;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       return view('products.index',[
        'products'=>Product::get()
       ]);
     
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'

        ]);

        // dd($request->all());
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('product'), $imageName);
        $product =new Product();
        $product->image=$imageName;
        $product->name=$request->name;
       $product->description=$request->description;

        $product->save();
        return back()->withSuccess('Product Create!!!');                                                                                  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd($id);
        $product= Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000'

        ]);

        $product=Product::where('id', $id)->first();

        if(isset($request->image)){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('product'), $imageName);
            $product->image=$imageName;
        }
        $product->name=$request->name;
       $product->description=$request->description;

        $product->save();
        return back()->withSuccess('Product Update!!!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Delete!!!'); 

    }
   
}
