<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Flasher\Toastr\Prime\Toastr;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrInterface;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('Admin.category',compact('categories'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->success('Category Added Succesfully');
        return redirect()->back();
    }

    public function category_delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->success('Category Deleted Succesfully');
        return redirect()->back();
    }

    public function category_edit($id)
    {
        $data = Category::find($id);
        return view('Admin.category_edit',compact('data'));
    }

    public function category_update(Request $request,$id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->success('Category Updated Succesfully');
        return redirect('admin/category');
    }

    public function add_product()
    {
        $categories = Category::all();
        return view('Admin.add_product',compact('categories'));    
    }

    public function upload_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->product_title;
        $product->description = $request->product_desc;

        $image = $request->product_img;
        if($image)
        {
            $img_name = time() . '.' . $image->getClientOriginalExtension();
            $request->product_img->move('product',$img_name);
            $product->image = $img_name;
        }

        $product->price = $request->product_price;
        $product->category = $request->product_category;
        $product->quantity = $request->product_quantity;
        $product->save();
        toastr()->success('Product Added Succesfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $products = Product::paginate(4);
        return view('Admin.view_product',compact('products'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        $img_path = public_path('product/' . $product->image);
        if(file_exists($img_path))
        {
            unlink($img_path);
        }
        toastr()->success('Product Deleted Succesfully');
        return redirect()->back();   
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        return view('Admin.edit_product',compact('product'));
    }

    public function update_product(Request $request,$id)
    {
        $product = Product::find($id);
        $product->title = $request->product_title;
        $product->description = $request->product_desc;

        $image = $request->product_img;
        if($image)
        {
            $img_name = time() . '.' . $image->getClientOriginalExtension();
            $request->product_img->move('product',$img_name);
            $product->image = $img_name;
        }

        $product->price = $request->product_price;
        $product->category = $request->product_category;
        $product->quantity = $request->product_quantity;
        $product->save();
        toastr()->success('Product Updated Succesfully');
        return redirect('admin/view_product');
    }

    public function serach_product(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(4);
        return view('Admin.view_product',compact('products'));
    }

    public function view_order()
    {
        $order = Order::orderBy('updated_at','DESC')->Paginate(4);
        return view('Admin.orders',compact('order'));
    }

    public function on_way($id)
    {
        $order = Order::find($id);
        $order->status = "On The Way";
        $order->save();
        return redirect()->back();
    }

    public function deliverd($id)
    {
        $order = Order::find($id);
        $order->status = "Deliverd";
        $order->save();
        return redirect()->back();
    }

    public function bill($id)
    {
        $order = Order::find($id);
        $pdf = Pdf::loadView('Admin.bill',compact('order'));
        return $pdf->download('invoice.pdf');
    }

}