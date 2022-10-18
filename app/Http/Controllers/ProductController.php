<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate();

        return view('product.index', compact('products'));
    }
    
    public function create ()
    {
        $cats = Category::orderBy('name','ASC')->get();
        return view('product.create', compact('cats'));
    }

    public function form_upload(Request $req)
    {
       return view('product.upload');
    }

    public function store (Request $req)
    {
        $req->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price',
            'upload' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        $form_data = $req->only('name','price','sale_price','category_id','content');
        $f_name = $req->upload->getClientOriginalName();
        $req->upload->move(public_path('uploads'), $f_name);
        $form_data['image'] = $f_name;

        if (Product::create($form_data)) {
            return redirect()->route('product.index')->with('yes', 'Thêm mới sản phẩm thành công');
        }

        return redirect()->back()->with('no', 'Thêm sản phẩm thất bại');
       
    }

    public function update (Product $product, Request $req)
    {
        $req->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price',
            'upload' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $form_data = $req->only('name','price','sale_price','category_id','content');

        // Nếu có chọn file
        if ($req->has('upload')) {
            $f_name = $req->upload->getClientOriginalName();
            $req->upload->move(public_path('uploads'), $f_name);
            $form_data['image'] = $f_name;
        }
       
        if ($product->update($form_data)) {
            return redirect()->route('product.index')->with('yes', 'Cập nhật sản phẩm thành công');
        }

        return redirect()->back()->with('no', 'Cập nhậtsản phẩm thất bại');
       
    }

    public function edit (Product $product)
    {
        $cats = Category::orderBy('name','ASC')->get();
        return view('product.edit', compact('cats','product'));
    }

    public function destroy(Product $product){
        
        try {
            $product->delete();
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