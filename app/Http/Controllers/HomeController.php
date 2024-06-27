<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe;

class HomeController extends Controller
{
    
    public function index()
    {
        $user = User::where('user_type','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $deliver = Order::where('status','Deliverd')->get()->count();
        return view('Admin.index',compact('user','product','order','deliver'));
    }

    public function home()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = 0;
        }
        
        $category = Product::select('category', DB::raw('MAX(image) as image'))->groupby('category')->take(3)->get();
        $featured = Product::select('id','title','description','image','price')->orderby('updated_at')->take(3)->get();
        $categorys = Category::all();
        return view('home.index',compact('category','featured','count','categorys'));    
    }

    public function about_us()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = 0;
        }
        $categorys = Category::all();
        return view('home.about_us',compact('count','categorys'));    
    }

    public function shop()
    {   
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = 0;
        }
        $products = Product::paginate(6);
        $category = Category::all();
        $categorys = Category::all();
        return view('home.shop', compact('products','category','count','categorys'));
    }

    public function product($id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = 0;
        }
        $product = Product::find($id);
        $categorys = Category::all();
        return view('home.product',compact('product','count','categorys'));    
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $product = product::find($id);
        if($product)
        {
            $qty = $product->quantity;
            if($qty == 0)
            {
                toastr()->error('Sorry, Product Is Out Of Stock');
                return redirect()->back();
            }
            else
            {
                $user = Auth::user();
                $user_id = $user->id;
                $data = new cart;
                $data->user_id = $user_id;
                $data->product_id = $product_id;
                $data->save();
                toastr()->success('Product Added In The Cart Succesfully');
                return redirect()->back();
            }
        }
    }

    public function my_cart()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
            $cart = cart::where('user_id',$userid)->get();
            $user_name = $user->name;
        }
        else
        {
            $count = 0;
        }
        $user = Auth::user();
        $user_id = $user->id;
        $categorys = Category::all();
        $cart_order = cart::where('user_id',$user_id)->count();
        return view('home.my_cart',compact('count','cart','user','categorys','cart_order'));    
    }

    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        toastr()->success('Product Removed Succesfully From Cart');
        return redirect()->back();   
    }

    public function order(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $name = $request->name;
        $adress = $request->address;
        $phone = $request->phone;

        $user_id = Auth::user()->id;
        $cart = cart::where('user_id',$user_id)->get();

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->address = $adress;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->save();
        }

        $cart_remove = cart::where('user_id',$user_id)->get();

        foreach($cart_remove as $remove)
        {
            $data = cart::find($remove->id);
            $data->delete();

            $product = Product::find($remove->product_id);
            if ($product) {
                $product->quantity -= 1;
                $product->save();
            }
        }

        toastr()->success('Order Placed Succesfully');
        return redirect()->back();
    }

    public function my_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = 0;
        }
        $user = Auth::user();
        $user_name = $user->name;
        $user_id = $user->id;
        $order = Order::where('user_id',$user_id)->orderBy('updated_at','DESC')->get();
        $user_order = Order::where('user_id',$user_id)->count();
        $categorys = Category::all();
        return view('home.my_order',compact('count','user_name','order','categorys','user_order',));    
    }

    public function stripe($total)
    {
        return view('home.stripe',compact('total'));
    }

    public function stripePost(Request $request,$total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        $name = Auth::user()->name;
        $adress = Auth::user()->address;
        $phone = Auth::user()->phone;

        $user_id = Auth::user()->id;
        $cart = cart::where('user_id',$user_id)->get();

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->address = $adress;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->payment_status = 'Paid';
            $order->save();
        }

        $cart_remove = cart::where('user_id',$user_id)->get();

        foreach($cart_remove as $remove)
        {
            $data = cart::find($remove->id);
            $data->delete();
        }
        toastr()->success('Payment Succesfully Done');
        toastr()->success('Order Placed Succesfully');
        return view('home.my_cart');
    }

    public function serach_product(Request $request)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = 0;
        }
        $category = Category::all();
        $search = $request->search;
        $products = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(6);
        $categorys = Category::all();
        return view('home.shop',compact('products','count','category','categorys'));
    }

    public function contact()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = 0;
        }
        $categorys = Category::all();
        return view('home.contact',compact('count','categorys'));
    }

}