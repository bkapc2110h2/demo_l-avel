<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::paginate();

        return view('category.index', compact('cats'));
    }
    public function edit(Category $cat)
    {
        // dd ($cat);
        return view('category.edit', compact('cat'));
    }

    public function store(CategoryCreateRequest $req)
    {
        $form_data = $req->only('name','status');
        Category::create($form_data); //ORM
        return redirect()->route('category.index');
    }
    
    public function update(Category $cat, Request $req)
    {
        $req->validate([
            'name' => 'required|min:6|max:100|unique:categories,name,'.$cat->id
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.min' => 'Tên danh mục tối thiểu 6 ký tự',
            'name.max' => 'Tên danh mục tối đa 100 ký tự',
            'name.unique' => 'Tên danh mục <b>'.$req->name.'</b> đã được sử dụng'
        ]);

        $form_data = $req->only('name','status');
        $cat->update($form_data); //ORM
        return redirect()->route('category.index')->with('yes', 'Cập nhật danh mục thành công');
    }

    public function delete(Category $cat)
    {
        $prods = Product::where('category_id', $cat->id)->count();
   
        if ($prods == 0) {
           $cat->delete();
           return redirect()->route('category.index')->with('yes', 'Xóa danh mục thành công');
        }

        return redirect()->route('category.index')->with('no', 'Không thể xóa danh mục, vì có sản phẩm');
    }
}

