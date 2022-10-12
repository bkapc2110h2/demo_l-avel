<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate();

        return view('product.index', compact('products'));
    }
    
    public function form_upload(Request $req)
    {
       return view('product.upload');
    }

    public function upload(Request $req)
    {
        $f_name = $req->image->getClientOriginalName();
        $req->image->move(public_path('uploads'), $f_name);
       
    }

    public function delete($id){
        
       
        try {
            Product::find($id)->delete();
            return redirect()->back()->with('yes', 'Xóa sản phẩm thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Xóa sản phẩm thất bại');
        }
        
    }

    public function trashed()
    {   
        $products = Product::onlyTrashed()->paginate();

        return view('product.trashed',compact('products'));
    }

    public function restore($id)
    {
        
        $products = Product::withTrashed()->find($id);
        try {
            $products->restore();
            return redirect()->route('product.index')->with('yes', 'Khôi phục thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'thất bại');
        }
    }
}