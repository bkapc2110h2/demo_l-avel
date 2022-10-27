<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Helper\Cart;
use Auth;
use Str;

class HomeController extends Controller
{
    public function index()
    {
        $newProduct = Product::isNew(8)->get();
        $saleProduct = Product::sale(8)->get();
        $ramdomProduct = Product::inRandomOrder()->limit(8)->get();

        return view('home', compact('newProduct','saleProduct','ramdomProduct'));
    }

    public function about()
    {
        return view('about');
    }

    public function productDetail(Product $product, $slug)
    {
        return view('product-detail', compact('product'));
    }

    public function category (Category $category)
    {
        $products = $category->products()->paginate();
        return view('category', compact('category', 'products'));
    }

    public function login()
    {
        return view('login');
    }

    public function check_login(Request $req)
    {
        $form_data = $req->only('email','password');
        
        if (auth('cus')->attempt($form_data)) {
            return redirect()->route('home.index')->with('yes', 'Đăng nhập thành công');
        }

        return redirect()->back()->with('no', 'Đăng nhập không thành công, vui lòng thử lại');

    }

    public function register()
    {
        return view('register');
    }

    public function check_register(Request $req)
    {
        $form_data = $req->only('email','password','name','phone','address');
        $form_data['password'] = bcrypt($req->password);

        if (Customer::create($form_data)) {
            return redirect()->route('home.login')->with('yes', 'Đăng ký thành công, bạn có thể đăng nhập');
        }

        return redirect()->back()->with('no', 'Đăng ký không thành công, vui lòng thử lại');
    }


    public function checkout()
    {
        $auth = auth('cus')->user();
        return view('checkout', compact('auth'));
    }

    public function post_checkout(Request $req, Cart $cart)
    {
        $form_data = $req->only('email','name','phone','address');
        $form_data['customer_id'] = auth('cus')->id();

        if ($order = Order::create($form_data)) {

            foreach($cart->items as $item) {
                $detail_data = [
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'price' => $item->price
                ];

                OrderDetail::create($detail_data);
            }

            session(['cart' => null]);
        }

        return redirect()->route('order.order_history')->with('yes', 'Đặt hàng thành công, bạn có thể xem lại đơn hàng');
    }

    public function order_history()
    {
        // dd (auth('cus')->user()->orders123());
        $orders = auth('cus')->user()->orders123();
        return view('order-history', compact('orders'));
    }



}
