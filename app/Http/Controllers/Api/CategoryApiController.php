<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('name', 'ASC')->get();

        return $this->ApiRessponse($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // $validator = $request->validate(
        //     [
        //         'name' => 'required|min:3|max:100|unique:categories'
        //     ]
        // );
        // return $this->ApiRessponse(null, '', false, $_POST);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:100|unique:categories',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = [];
            $Allerrors = $validator->errors()->toArray();

            foreach($Allerrors as $key => $er) {
                $errors[$key] = $er[0];
            }

            return $this->ApiRessponse(null, '', false, $errors);
        }

        $form_data = $request->only('name','status');
  
        if ($data = Category::create($form_data)) {
            $this->ApiRessponse($data, 'Thêm mới danh mục thành công');
        }

        return $this->ApiRessponse(null, 'Thêm mới danh mục không thành công', false);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category_api)
    {
        return $this->ApiRessponse($category_api);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category_api)
    {
        $form_data = $request->only('name','status');
  
        if ($category_api->update($form_data)) {
            return $this->ApiRessponse($category_api, 'Cập nhật danh mục thành công');
        }

        return $this->ApiRessponse($category_api, 'Cập nhật danh mục không thành công', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category_api)
    {
        $prods = Product::where('category_id', $category_api->id)->count();
   
        if ($prods == 0) {
            $category_api->delete();
            return $this->ApiRessponse($category_api, 'Xóa danh mục thành công');
        }

        return $this->ApiRessponse($category_api, 'Xóa danh mục không thành công, dnah mục này đang có sản phẩm', false);
    }
}
