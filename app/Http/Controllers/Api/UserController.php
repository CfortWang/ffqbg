<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use App\Models\User;
use App\Models\UserCashout;
use App\Models\UserWalletRecord;
use App\Models\UserSetting;
use App\Models\Setting;

use App\Models\UserLevel;
use App\Models\UserBrokerages;
use App\Models\UserLevelUp;

class UserController extends Controller
{

    public function list(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('id','phone_number','user_register_time','user_register_ip','user_level_id','total_amount');

        $items = User::where('id','>','0');

        if($request->status){
            // $items =  $items->where('Q35SalesItem.shipping_status', $request->status);
        }
        
        $recordsTotal = $items->count();
        
        if (!empty($request->search['value'])) {
            if(mb_strlen($searchValue)==11){
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('phone_number', $searchValue);
                });
            }else{
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('id', $searchValue);
                });
            }
        }
        $recordsFiltered = $items->count();
        $items = $items->select('id','phone_number','name','user_register_time','user_register_ip','user_level_id','total_amount')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
            foreach ($items as $key => $value) {
                $items[$key]['user_register_time'] = date('Y-m-d h:i:s');
            }
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function brokerages(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('id','phone_number','user_register_time','user_register_ip','user_level_id','total_amount');

        $items = UserBrokerages::where('brokerage_id','>','0');
            

        if($request->status){
            // $items =  $items->where('Q35SalesItem.shipping_status', $request->status);
        }
        
        $recordsTotal = $items->count();
        
        if (!empty($request->search['value'])) {
            if(mb_strlen($searchValue)==11){
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('phone_number', $searchValue);
                });
            }else{
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('id', $searchValue);
                });
            }
        }
        $recordsFiltered = $items->count();
        $items = $items->select('brokerage_id','user_id','from_user_id','amount','source_amount','remarks','type')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
            foreach ($items as $key => $value) {
                $from = User::where('id',$value['from_user_id'])->select('name','phone_number')->first();
                $user = User::where('id',$value['user_id'])->select('name','phone_number')->first();
                $items[$key]['from_user_name'] = $from['name'];
                $items[$key]['from_phone_number'] = $from['phone_number'];
                $items[$key]['user_name'] = $user['name'];
                $items[$key]['phone_number'] = $user['phone_number'];
            }
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function pay(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('phone_number','amount','p_amount','type');

        $items = UserLevelUp::where('u.id','>','0')
            ->leftjoin('user as u','u.id','=','user_levelup.user_id');

        if($request->status){
            // $items =  $items->where('Q35SalesItem.shipping_status', $request->status);
        }
        
        $recordsTotal = $items->count();
        
        if (!empty($request->search['value'])) {
            if(mb_strlen($searchValue)==11){
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('phone_number', $searchValue);
                });
            }else{
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('user_id', $searchValue);
                });
            }
        }
        $recordsFiltered = $items->count();
        $items = $items->select('u.id as user_id','u.name','payment','user_levelup.id','status','amount','user_levelup.created_at','user_levelup.updated_at','remarks')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
           
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function wallet(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('phone_number','amount','p_amount','type');

        $items = UserWalletRecord::where('u.id','>','0')
            ->leftjoin('user as u','u.id','=','users_wallet_record.user_id');

        if($request->status){
            // $items =  $items->where('Q35SalesItem.shipping_status', $request->status);
        }
        
        $recordsTotal = $items->count();
        
        if (!empty($request->search['value'])) {
            if(mb_strlen($searchValue)==11){
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('phone_number', $searchValue);
                });
            }else{
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('user_id', $searchValue);
                });
            }
        }
        $recordsFiltered = $items->count();
        $items = $items->select('u.name','u.phone_number','amount','p_amount','n_amount','remarks','type')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
           
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function cashout(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('phone_number','amount','p_amount','type');

        $items = UserCashout::where('u.id','>','0')
            ->leftjoin('user as u','u.id','=','users_cashout.user_id');

        if($request->status){
            // $items =  $items->where('Q35SalesItem.shipping_status', $request->status);
        }
        
        $recordsTotal = $items->count();
        
        if (!empty($request->search['value'])) {
            if(mb_strlen($searchValue)==11){
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('phone_number', $searchValue);
                });
            }else{
                $items = $items->where(function ($query) use ($searchValue) {
                    $query
                    ->where('user_id', $searchValue);
                });
            }
        }
        $recordsFiltered = $items->count();
        $items = $items->select('users_cashout.id','u.name','u.phone_number','withdraw_type','withdraw_amount','withdraw_alipay_account','withdraw_alipay_realname','withdraw_status','withdraw_apply_time','withdraw_confirm_time','withdraw_complete_time','withdraw_reason')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
           
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function data()
    {
        $data['callout_factorage'] = UserCashout::where('withdraw_status',1)->sum('withdraw_factorage');
        $data['callout'] = UserCashout::where('withdraw_status',1)->sum('withdraw_amount');
        $data['callout_pending'] = UserCashout::where('withdraw_status',0)->sum('withdraw_amount');
        $data['first'] =  $data['first_total'] = UserLevelUp::where('status','PAIED')->where('fid',1)->count('id');
        $data['middle'] =  $data['middle_total'] = UserLevelUp::where('status','PAIED')->where('fid',2)->count('id');
        $data['top'] =  $data['top_total'] = UserLevelUp::where('status','PAIED')->where('fid',3)->count('id');
        $data['amount'] = UserWalletRecord::sum('amount');
        return $this->responseOK('', $data);
    }

    public function detail (Request $request,$id)
    {
        $data = User::where('id',$id)->select('id','name','phone_number','user_level_id','total_amount')->first();
        $up = UserLevel::where('uid',$id)->where('layer',1)->first();
        if(!$data){
            return $this->responseBadRequest('用户不存在');

        }
        if($up){
            $data['recommder_id'] = $up['from_uid'];
        }else{
            $data['recommder_id'] = 0;
        }
        return $this->responseOK('', $data);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $data = User::where('id',$id)->first();
        $data->name = $request->input('name');
        $data->phone_number = $request->input('phone_number');
        $data->user_level_id = $request->input('user_level_id');
        $data->total_amount = $request->input('total_amount');
        $data->save();
        $recommder_id = $request->input('recommder_id');
        if($recommder_id){
            $recommder = UserLevel::where('uid',$id)->first();
            if($recommder){
                return $this->responseBadRequest('已有推荐人');
            }
            $this->updateRecommder($id,$recommder_id);
        }
        return $this->responseOK('更新成功', []);
    }
    protected function updateRecommder($id,$recommder_id)
    {
        $ids = UserLevel::where('uid',$recommder_id)->get();
        if($ids){
            foreach ($ids as $key => $value) {
                unset($new_arr);
                $new_arr['uid'] = $id;
                $new_arr['from_uid'] = $value['from_uid'];
                $new_arr['layer'] = $value['layer'] + 1;
                $new_arr['time'] = time();
                UserLevel::create($new_arr);
            }
        }
        $new_arr['uid'] = $id;
        $new_arr['from_uid'] = $recommder_id;
        $new_arr['layer'] = 1;
        $new_arr['time'] = time();
        UserLevel::create($new_arr);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $user = User::where('id',$id)->first();
        if($user){
            $user->delete();
        }
        return $this->responseOK('删除成功', []);
    }

    public function deal(Request $request)
    {
        $type = $request->input('type');
        $id = $request->input('id');
        $data = UserCashout::where('id',$id)->where('withdraw_status',0)->first();
        $data->withdraw_confirm_time = time();
        if($type =='refuse'){
            $data->refuse_msg = $request->input('withdraw_reason');
            $data->status = 2;
        }else{
            $this->callAlipay($id);
        }
        $data->save();
        return $this->responseOK('操作成功', []);
    }

    protected function callAlipay($id)
    {
        // $
    }
}
