<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductForVendor;
use App\Models\ServiceForVendor;
use App\Traits\ControllerTrait;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SToApproveForModeratorController extends Controller
{

    use ControllerTrait;
    public function index()
    {
        abort_if(\Illuminate\Support\Facades\Gate::denies('s_to_approve_for_moderator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productForVendors = ServiceForVendor::with(['category', 'sub_category', 'tags', 'approved_by', 'created_by', 'media'])->whereNull('approved_by_id')->orWhere('approved_by_id',auth()->id())->get();


        //   dd($productForVendors);

        return view('admin.sToApproveForModerators.index' , compact('productForVendors') );


    }

    public function approve(Request  $r){

        $input=$r->only(['pid','a']);

        if(array_key_exists('pid',$input) && array_key_exists('a',$input) ){

            if($input['a']=='1'){
                ServiceForVendor::find($input['pid'])->update(['approved_by_id'=>auth()->id(),'rejected'=>0]);
                $msg="Product has been approved by you.";
            }else{
                ServiceForVendor::find($input['pid'])->update(['approved_by_id'=>auth()->id(),'rejected'=>1]);
                $msg="Product has been rejected by you.";
            }

            return $this->json($msg);
        }

        return $this->jsonError('Sorry we not able to perform task given by you.');


    }


}
