<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $result = Category::all();
        return view("admin.category")->with('data', $result);
    }

    public function manage_category($id = '')
    {
        if ($id > 0) {
            $arr = Category::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['category_name'] = $arr[0]->category_name;
            $result['category_slug'] = $arr[0]->category_slug;
        } else {
            $result['id'] = 0;
            $result['category_name'] = '';
            $result['category_slug'] = '';
        }


        return view("admin.manage_category", $result);
    }

    public function manage_category_process(Request $request)
    {
        $request->validate([
            "Category" => "required",
            "Category_slug" => "required|unique:categories,Category_slug," . $request->post("u-id"),
        ]);


        if ($request->post("u-id") > 0) {
            $model = Category::find($request->post("u-id"));
            $message = "Category Update Successfully";
        } else {
            $model = new Category();
            $message = "Category Insert Successfully";
        }

        $model->category_name = $request->post("Category");
        $model->category_slug = $request->post("Category_slug");
        $model->status = 1;
        $model->save();
        $request->session()->flash("mess", $message);
        return redirect("admin/category");
    }

    public function delete_category(Request $request, $id)
    {
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash("mess", "Category Delete Successfully");
        return redirect("admin/category");
    }

    public function status(Request $request, $status, $id)
    {
        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash("mess", "Status Change Successfully");
        return redirect("admin/category");
    }
}
