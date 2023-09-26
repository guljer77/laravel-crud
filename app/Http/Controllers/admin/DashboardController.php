<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->get();
        return view('admin.modules.index',compact('products'));
    }
    public function add(){
        return view('admin.modules.productAdd');
    }
    public function store(Request $request){
        $request->validate([
            'product_title' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        Product::newProduct($request);
        return redirect('/dashboard')->with('message','Product Added Successfully');
    }
    public function change($id){
        $product = Product::find($id);
        if($product->status == 0){
            $product->status = 1;
            $message = "Product Published Successfully";
        }else{
            $product->status = 0;
            $message = "Product Unpublished Successfully";
        }
        $product->save();
        return redirect('/dashboard')->with('message',$message);
    }
    public function detail($id){
        $product = Product::find($id);
        return view('admin.modules.details',compact('product'));
    }
    public function edit($id){
        $product = Product::find($id);
        return view('admin.modules.edit',compact('product'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'product_title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        Product::updateProduct($request, $id);
        return redirect('/dashboard')->with('message','Product Update Successfully');
    }
    public function delete($id){
        Product::find($id)->delete();
        return redirect('/dashboard')->with('message','Product Delete Successfully');
    }
}
