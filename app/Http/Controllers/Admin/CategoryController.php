<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $category = Category::latest()->get();

        return view('admin.category.all_category', compact('category'));
    }

    public function addCategory()
    {
        return view('admin.category.add_category');
    }

    public function categoryStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        $toastr = array(
            'success' => 'Customer Data Inserted.'
        );
        return redirect()->route('all.category')->with($toastr);
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit_category', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name' => $request->name,
        ]);

        $toastr = array(
            'success' => 'Category Updated Successfully.'
        );
        return redirect()->route('all.category')->with($toastr);
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();

        $toastr = array(
            'success' => 'Category Deleted.'
        );
        return redirect()->route('all.category')->with($toastr);
    }
}
