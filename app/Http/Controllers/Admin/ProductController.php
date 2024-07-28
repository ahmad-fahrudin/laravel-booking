<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    public function allProduct()
    {
        $product = Product::latest()->get();

        return view('admin.product.all_product', compact('product'));
    }

    public function addProduct()
    {
        $category = Category::latest()->get();

        return view('admin.product.add_product', compact('category'));
    }

    public function storeProduct(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //65784365873.jpg
        Image::read($image)->resize(300, 300)->save('upload/product/' . $name_gen);
        $save_url = 'upload/product/' . $name_gen;

        Product::insert([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $toastr = array(
            'success' => 'Product Data Inserted.'
        );

        return redirect()->route('all.product')->with($toastr);
    }
    public function editProduct($id)
    {
        $category = Category::latest()->get();
        $product = Product::findOrFail($id);

        return view('admin.product.edit_product', compact('category', 'product'));
    }

    public function updateProduct(Request $request)
    {
        $product_id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //65784365873.jpg
            Image::read($image)->resize(300, 300)->save('upload/product/' . $name_gen);
            $save_url = 'upload/product/' . $name_gen;

            $product_img = Product::findOrFail($product_id);
            $img = $product_img->image;
            unlink($img);

            Product::findOrFail($product_id)->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'stock' => $request->stock,
                'harga' => $request->harga,
                'image' => $save_url,
            ]);
            $toastr = array(
                'success' => 'Product Data Updated.'
            );

            return redirect()->route('all.product')->with($toastr);
        } else {
            Product::findOrFail($product_id)->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'stock' => $request->stock,
                'harga' => $request->harga,
            ]);
            $toastr = array(
                'success' => 'Product Data Updated.'
            );

            return redirect()->route('all.product')->with($toastr);
        }
    }

    public function deleteProduct($id)
    {
        $product_img = Product::findOrFail($id);
        $img = $product_img->image;
        unlink($img);

        Product::findOrFail($id)->delete();
        $toastr = array(
            'success' => 'Product Data Deleted.'
        );

        return redirect()->route('all.product')->with($toastr);
    }
}
