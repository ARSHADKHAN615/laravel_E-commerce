<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $result = Product::all();
        return view("admin.product")->with('data', $result);
    }

    public function manage_product($id = '')
    {
        $arr = Product::where(['id' => $id])->get();
        if ($id > 0) {
            $result['id'] =  $arr[0]->id;
            $result['category_id'] = $arr[0]->category_id;
            $result['name'] = $arr[0]->name;
            $result['image'] = $arr[0]->image;
            $result['slug'] = $arr[0]->slug;
            $result['brand'] = $arr[0]->brand;
            $result['model'] = $arr[0]->model;
            $result['short_desc'] = $arr[0]->short_desc;
            $result['desc'] = $arr[0]->desc;
            $result['keyword'] = $arr[0]->keywords;
            $result['technical_spec'] = $arr[0]->technical_spec;
            $result['uses'] = $arr[0]->uses;
            $result['warranty'] = $arr[0]->warranty;
        } else {
            $result['id'] =  0;
            $result['category_id'] = '';
            $result['name'] = '';
            $result['slug'] = '';
            $result['image'] = '';
            $result['brand'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keyword'] = '';
            $result['technical_spec'] = '';
            $result['uses'] = '';
            $result['warranty'] = '';
        }

        $result['category'] = DB::table("categories")->where("status", 1)->get();
        return view("admin.manage_product", $result);
    }

    public function manage_product_process(Request $request)
    {
        $request->validate([
            "name" => "required",
            "slug" => "required|unique:products,slug," . $request->post("u-id"),
        ]);

        if ($request->post("u-id") > 0) {
            $model = Product::find($request->post("u-id"));
            $message = "Product Update Successfully";
        } else {
            $model = new Product();
            $message = "Product Insert Successfully";
        }
        $model->category_id = $request->post("category_id");
        $model->name = $request->post("name");
        $model->slug = $request->post("slug");
        $model->brand = $request->post("brand");
        $model->model = $request->post("model");
        $model->short_desc = $request->post("short_desc");
        $model->image = "a";
        $model->desc = $request->post("desc");
        $model->keywords = $request->post("keyword");
        $model->technical_spec = $request->post("technical_spec");
        $model->uses = $request->post("uses");
        $model->warranty = $request->post("warranty");
        $model->status = 1;
        $model->save();
        $request->session()->flash("mess", $message);
        return redirect("admin/product");
    }
    public function delete_product(Request $request, $id)
    {
        $model = Product::find($id);
        $model->delete();
        $request->session()->flash("mess", "Product Delete Successfully");
        return redirect("admin/product");
    }

    public function status(Request $request, $status, $id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash("mess", "Status Change Successfully");
        return redirect("admin/product");
    }
}
