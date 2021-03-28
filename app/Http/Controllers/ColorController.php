<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index()
    {
        $result = Color::all();
        return view("admin.color")->with('data', $result);
    }

    public function manage_color($id = '')
    {
        $arr = Color::where(['id' => $id])->get();
        if ($id > 0) {
            $result['id'] = $arr[0]->id;
            $result['color'] = $arr[0]->color;
        } else {
            $result['id'] =  0;
            $result['color'] = '';
        }


        return view("admin.manage_color", $result);
    }

    public function manage_color_process(Request $request)
    {
        $request->validate([
            "color" => "required|unique:colors,color," . $request->post("u-id"),
        ]);


        if ($request->post("u-id") > 0) {
            $model = Color::find($request->post("u-id"));
            $message = "Color Update Successfully";
        } else {
            $model = new Color();
            $message = "Color Insert Successfully";
        }

        $model->color = $request->post("color");
        $model->status = 1;
        $model->save();
        $request->session()->flash("mess", $message);
        return redirect("admin/color");
    }
    public function delete_color(Request $request, $id)
    {
        $model = Color::find($id);
        $model->delete();
        $request->session()->flash("mess", "Color Delete Successfully");
        return redirect("admin/color");
    }

    public function status(Request $request, $status, $id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash("mess", "Status Change Successfully");
        return redirect("admin/color");
    }
}
