<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function index()
    {
        $result = Coupon::all();
        return view("admin.coupon")->with('data', $result);
    }

    public function manage_coupon($id = '')
    {
        $arr = Coupon::where(['id' => $id])->get();
        if ($id > 0) {
            $result['id'] = $arr[0]->id;
            $result['title'] = $arr[0]->title;
            $result['code'] = $arr[0]->code;
            $result['value'] = $arr[0]->value;
        } else {
            $result['id'] =  0;
            $result['title'] = '';
            $result['code'] = '';
            $result['value'] = '';
        }


        return view("admin.manage_coupon", $result);
    }

    public function manage_coupon_process(Request $request)
    {
        $request->validate([
            "title" => "required",
            "value" => "required",
            "code" => "required|unique:coupons,code," . $request->post("u-id"),
        ]);


        if ($request->post("u-id") > 0) {
            $model = Coupon::find($request->post("u-id"));
            $message = "Coupon Update Successfully";
        } else {
            $model = new Coupon();
            $message = "Coupon Insert Successfully";
        }

        $model->title = $request->post("title");
        $model->code = $request->post("code");
        $model->value = $request->post("value");
        $model->status = 1;
        $model->save();
        $request->session()->flash("mess", $message);
        return redirect("admin/coupon");
    }
    public function delete_coupon(Request $request, $id)
    {
        $model = Coupon::find($id);
        $model->delete();
        $request->session()->flash("mess", "Coupon Delete Successfully");
        return redirect("admin/coupon");
    }

    public function status(Request $request, $status, $id)
    {
        $model = Coupon::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash("mess", "Status Change Successfully");
        return redirect("admin/coupon");
    }
}
