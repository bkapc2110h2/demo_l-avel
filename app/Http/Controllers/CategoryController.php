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
        
        $cats = Category::search()->paginate();

        return view('category.index', compact('cats'));
    }
    
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function store(CategoryCreateRequest $req)
    {
        $form_data = $req->only('name','status');
        Category::create($form_data); //ORM
        return redirect()->route('category.index');
    }

    public function update(Category $category, CategoryUpdateRequest $req)
    {
        $form_data = $req->only('name','status');
        $category->update($form_data); //ORM
        return redirect()->route('category.index')->with('yes', 'Cập nhật danh mục thành công');
    }

    public function destroy (Category $category)
    {
        $prods = Product::where('category_id', $category->id)->count();
   
        if ($prods == 0) {
           $category->delete();
        //    Category::destroy([1,2,3,4,5,6]);
           return redirect()->route('category.index')->with('yes', 'Xóa danh mục thành công');
        }

        return redirect()->route('category.index')->with('no', 'Không thể xóa danh mục, vì có sản phẩm');
    }
}

