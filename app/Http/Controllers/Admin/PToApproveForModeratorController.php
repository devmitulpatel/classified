<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogForModerators;
use App\Models\ProductForVendor;
use App\Traits\ControllerTrait;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PToApproveForModeratorController extends Controller
{

    use ControllerTrait;
    public function index()
    {
        abort_if(Gate::denies('p_to_approve_for_moderator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productForVendors = ProductForVendor::with(['category', 'sub_category', 'tags', 'approved_by', 'created_by', 'media'])->whereNull('approved_by_id')->orWhere('approved_by_id',auth()->id())->get();


     //   dd($productForVendors);

        return view('admin.pToApproveForModerators.index' , compact('productForVendors') );


    }

    public function approve(Request  $r){

        $input=$r->only(['pid','a']);

        if(array_key_exists('pid',$input) && array_key_exists('a',$input) ){

            if($input['a']=='1'){
                ProductForVendor::find($input['pid'])->update(['approved_by_id'=>auth()->id(),'rejected'=>0]);
                $msg="Product has been approved by you.";
            }else{
                ProductForVendor::find($input['pid'])->update(['approved_by_id'=>auth()->id(),'rejected'=>1]);
                $msg="Product has been rejected by you.";
            }

            $dForLog=[
                'action_taken_by_id'=>auth()->id(),
                'action_taken_on_id'=>$input['pid'],
                'type'=>'product',
                'action_type'=>($input['a']=="1")?"approved":"rejected",

            ];
            LogForModerators::create($dForLog);

            return $this->json($msg);
        }

        return $this->jsonError('Sorry we not able to perform task given by you.');


    }

}
