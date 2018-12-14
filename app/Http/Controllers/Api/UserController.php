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
use Yansongda\Pay\Pay;
class UserController extends Controller
{

    protected $config = [
        'alipay'=>[
            'app_id' => '2018061760401553',
            'notify_url' => 'https://api.gxwhkj.cn/notify/alipay',
            'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApU4RLt13Pj9BI9u4X6QiUIiJ7SVs25ol4e2A+FDffsfNLjUTp9X++gIunW/vRQ/cdsVLx1jDSFKsZ/B/R0jdqGQfjkgDDrLbkXToXZUTI8VEl82BND22Jj+6ioOb2fBSfSbLO4yspNXSLYHowHW25O1wvl8V4O7JyiymMRsxwjsA8A1XlFE13LihJE3G8yo9dGN6McD2XeXEyyhr4OmNGrCie0Y7WeEkyO3++7Sf1TrVXLjjrB9JUjz3IRwmnDqHJOnDT4vuz7CJp86KHT7edIKHd48HJMmMLrUSVeH2B8NIBoR6rVVng/K31uZ+3upVyzsMcPELixBIKWiaqcJazwIDAQAB',
            'private_key' => 'MIIEowIBAAKCAQEAnj/JejehRCPoRkwOGdIMPWiktZrrcgDJUUZDzAeOd0VKG0d9NmeJ3smhqRPujKQqTg+AQcmrYb+aADC3y3q8uPOo6UugEiUwMyUghkwhL3HK4mIo5DAZ3OJfS83ZKomj4pKerTL4DGFreg/FE7t1rhIao/PmxeAuVgbpJ34jB3PAWIXA7MXsto+Lo3jUWf/+SpnrePfoZIrFzEqVYJoCBr5mRN4HpaOcmqXbBN+ktPiaZCJJ3q28CLVINz8i0s1TkWm/zd4pf2cPmyb+0sGfqvYWidqvRkRCZfJNVFAw/VXGP6QjgufqQJOOXmRFRT3FohzD0PnDX8EIztbWKL4slQIDAQABAoIBAQCWdQM0Rkv3o0QmAg2uEv08LY/ccozEeWbu9SVkiRK055YL1a6A2XRF8+LWBHNcGIF4clh5NCrT5v2ejLNSrUFdf5zrItHwLpdjKTuBNESg/Unub3F9cxZD4p7ETdTaEr9Unh5rgfhAnSc4iGHR3vuGIwRdOXoCTKEBfdSTjeP0ImTJofpYf/85K9Suu2du7uKu22TrX5sQ4hvdm1cQXiqsAgQLOBko7fO5kkRlJzwdgofPmWKmRKmXW3zMT0kb8Gi5KoWDz2jHhpvDM356YylaxY57ZyK4j3PxQxZb0Ab+b3kii4mL1crwc70PCnqsdaeQCmxlmnynvTAOi9ERq6pJAoGBAMw60vP39pyeVE/lp1s5HJfM7496xx5ryijfSqgg52EhcAEvSVLfNqG0TxZdxJWMXXGjriDpOdHoLzdN5D3XlsXArfCQ+DJGADaFQHsImVxGOekul9f8e1B/6V2MZNnn6potkSGK+eP07rllrOsXeOeKx+yMVkWpPY7OMxWtE5YzAoGBAMZdH0XmaYna78Tr8JcWELGk+aVZ2U0MBDHPdoLuNpBz7O7cjfEoT10HZVhhR4IDMyKQWL0pYw3L/9lqNqCJe96jqqZQ4uxKs3UzYtKVMS4DYGWGGQhP3WL+gDdD1GtxhVY3JYD0zUS+V4dRYRum5OfL8NBVN4TWDQ3mqHhS25oXAoGANjg7vyeKomPqcFfBCZfs/mQbCZWH/YySXC2DzYUGyKOu77GVHtpBz8Zl5MM6KJXeTQgud3BTuGWS+3TDbqOo1JFl3GMwcXBiKBdSWhebV4MRZtXG3EGcn2+GDh7yu2M1xn7oc+ZIl3t0UWYr9TIDGD2g/Cz5zn6y6BHYQB32AD8CgYBioSbNkLVlMBEL7uyfkv8V9RuUFcqwPotPYQJiM6O5y4pBcjS5dfuQG/9OJIBzqregNfmJhKyVzZsXNXKX/AQ1PVe6fnl2V+ZHHhfC8R+U62Tg1f5YXa2MbVK/J+DU04sixSTGq/Hsfl/zDomkQCWNA6BnVhfW2r9+6/NUcI50XQKBgBGgFVN5UkSTw7Fv2itvcbcCnR1wcb7k9thW1iwooLMPSS4RLHyGVlSq/7iJcXSFl/iern7SSmm6nMm3GxkPHBJ0HzAo+PJvjPr6lwfXCsO/5QYCoI3AW4yHIB4NjvyOMYIvCWpARq5krjkBZtqcOcH41VCRLW754UroLkR50EGl'
        ],
    ];
    public function list(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('id','phone_number','user_register_time','user_register_ip','user_level_id','total_amount');
        $where['user_delete'] = 0;
        $id = $request->input('id');
        $phone_number = $request->input('phone_number');
        $user_level_id = $request->input('user_level_id');
        $start_at = $request->input('start_at');
        $end_at = $request->input('end_at');
        if($id){
            $where['id'] = $id;
        }
        if($phone_number){
            $where['phone_number'] = $phone_number;
        }
        if($user_level_id){
            $where['user_level_id'] = $user_level_id;
        }
        $items = User::where($where);
        if($start_at && $end_at){
            $start_at = strtotime($start_at);
            $end_at = strtotime($end_at);
            $items = User::where($where)->where('user_register_time','>',$start_at)->where('user_register_time','<',$end_at);
        }
        $recordsTotal = $items->count();
      
        $recordsFiltered = $items->count();
        $items = $items->select('id','phone_number','name','user_register_time','user_register_ip','user_level_id','total_amount')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
            foreach ($items as $key => $value) {
                $items[$key]['user_register_time'] = date('Y-m-d h:i:s',$value['user_register_time']);
                $items[$key]['direct'] = UserLevel::where('from_uid',$value['id'])->where('layer',1)->count();
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

        $columnArray = array('brokerage_id','user_id','from_user_id','amount','source_amount','remarks','type');

        $items = UserBrokerages::where('brokerage_id','>','0');
            
        $id = $request->input('id');
        if($id){
            $items = UserBrokerages::where('brokerage_id','>','0')->where('id',$id);
        }
        
        $recordsTotal = $items->count();
        
        $recordsFiltered = $items->count();
        $items = $items->select('brokerage_id','user_id','from_user_id','amount','source_amount','remarks','type')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
            foreach ($items as $key => $value) {
                $from = User::where('id',$value['from_user_id'])->select('name','phone_number','user_level_id')->first();
                $user = User::where('id',$value['user_id'])->select('name','phone_number','user_level_id')->first();
                $items[$key]['from_user_name'] = $from['name'];
                $items[$key]['from_phone_number'] = $from['phone_number'];
                $items[$key]['from_user_level_id'] = $from['user_level_id'];
                $items[$key]['user_name'] = $user['name'];
                $items[$key]['phone_number'] = $user['phone_number'];
                $items[$key]['user_level_id'] = $user['user_level_id'];
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
        $type = $request->input('type');
        $inout = $request->input('inout');
        $items = UserWalletRecord::where('u.id','>','0')
            ->leftjoin('user as u','u.id','=','users_wallet_record.user_id');
        $where['type'] = $type;
        if($inout){
            if($inout=='in'){
                $items = UserWalletRecord::where('u.id','>','0')->where('users_wallet_record','>',0)
                    ->leftjoin('user as u','u.id','=','users_wallet_record.user_id');
            }else{
                $items = UserWalletRecord::where('u.id','>','0')->where('users_wallet_record','<',0)
                    ->leftjoin('user as u','u.id','=','users_wallet_record.user_id');
            }

        }
        if($type){
            $items->where($where);
        }

        
        $recordsTotal = $items->count();
       
        $recordsFiltered = $items->count();
        $items = $items->select('u.name','u.phone_number','u.id','u.user_level_id','amount','p_amount','n_amount','remarks','type','users_wallet_record.time')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
        foreach ($items as $key => $value) {
            $items[$key]['time'] = date('Y-m-d h:i:s',$value['time']);
        }
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

        $withdraw_status = $request->input('withdraw_status');
        $id = $request->input('id');
        $where['withdraw_status'] = $withdraw_status;
        $where['user_id'] = $id;
        if($start_at&&$end_at){
            $items = UserCashout::where('u.id','>','0')
                ->where('withdraw_apply_time','>',$start_at)->where('withdraw_apply_time','<',$end_at)
                ->leftjoin('user as u','u.id','=','users_cashout.user_id');
        }
        if($where){
            $items-where($where);
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
        $items = $items->select('users_cashout.id','u.id as user_id','u.user_level_id','u.name','u.phone_number','withdraw_type','withdraw_amount','withdraw_alipay_account','withdraw_alipay_realname','withdraw_status','withdraw_apply_time','withdraw_confirm_time','withdraw_complete_time','withdraw_reason','withdraw_wallet')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
        foreach ($items as $key => $value) {
            $items[$key]['withdraw_apply_time'] = date('Y-m-d H:i:s',$value['withdraw_apply_time']);
            $items[$key]['withdraw_confirm_time'] = $value['withdraw_confirm_time']?date('Y-m-d H:i:s',$value['withdraw_confirm_time']):'';
            $items[$key]['withdraw_complete_time'] = $value['withdraw_complete_time']?date('Y-m-d H:i:s',$value['withdraw_complete_time']):'';
        }
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
        $recommder = UserLevel::where('uid',$id)->where('layer',1)->first();
        if(!$recommder){
            if($recommder_id){
                $this->updateRecommder($id,$recommder_id);
            }
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

    public function callAlipay()
    {
        $config = $this->config['alipay'];
        // if($return_url&&$mobileOs=='web'){
        $alipay = Pay::alipay($config);
        $order = [
            'out_biz_no' => time(),
            'payee_type' => 'ALIPAY_LOGONID',
            'payee_account' => '18202777477',
            'amount' => '1',
        ];
        // "code" => "10000"
        // "msg" => "Success"
        // "order_id" => "20181213110070001502460072184860"
        // "out_biz_no" => "1544710615"
        // "pay_date" => "2018-12-13 22:16:51"
        $result = $alipay->transfer($order);
        dd($result);
        exit;
    }

    public function levelList(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('phone_number','amount','p_amount','type');

        $items = UserLevel::where('id','>','0');

        $recordsTotal = $items->count();
        
        
        $recordsFiltered = $items->count();
        $items = $items->select('id','uid','from_uid','layer','time')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
        foreach ($items as $key => $value) {
            $from = User::where('id',$value['from_user_id'])->select('name','phone_number','user_level_id')->first();
            $user = User::where('id',$value['user_id'])->select('name','phone_number','user_level_id','user_register_time','user_register_ip')->first();
            $user['user_register_time'] = date('Y-m-d',$user['user_register_time']);
            $items[$key]['from'] = $from;
            $items[$key]['user'] = $user;
            $items['time'] = date('Y-m-d',$value['time']);
        }
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }
}
