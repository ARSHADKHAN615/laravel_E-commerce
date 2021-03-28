<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function index()
    {
        $result = Size::all();
        return view("admin.size")->with('data', $result);
    }

    public function manage_size($id = '')
    {
        $arr = Size::where(['id' => $id])->get();
        if ($id > 0) {
            $result['id'] = $arr[0]->id;
            $result['size'] = $arr[0]->size;
        } else {
            $result['id'] =  0;
            $result['size'] = '';
        }


        return view("admin.manage_size", $result);
    }

    public function manage_size_process(Request $request)
    {
        $request->validate([
            "size" => "required|unique:sizes,size," . $request->post("u-id"),
        ]);


        if ($request->post("u-id") > 0) {
            $model = Size::find($request->post("u-id"));
            $message = "Size Update Successfully";
        } else {
            $model = new Size();
            $message = "Size Insert Successfully";
        }

        $model->size = $request->post("size");
        $model->status = 1;
        $model->save();
        $request->session()->flash("mess", $message);
        return redirect("admin/size");
    }
    public function delete_size(Request $request, $id)
    {
        $model = Size::find($id);
        $model->delete();
        $request->session()->flash("mess", "Size Delete Successfully");
        return redirect("admin/size");
    }

    public function status(Request $request, $status, $id)
    {
        $model = Size::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash("mess", "Status Change Successfully");
        return redirect("admin/size");
    }
}
