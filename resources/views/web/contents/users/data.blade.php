@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>用户管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">用户管理</a>
            </li>
            <li class="active">
                <strong>数据统计</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div id="" class="dataTables_filter">
                    <div class="interval-box">
                        <label>时间 :</label>
                        <div>
                            <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="form-control" id="start-date" name="start-date" readonly="">
                            </div>
                        </div>
                        <div>
                            <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="form-control" id="end-date" name="end-date" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="search-btn">
                        <button type="button" class="btn btn-primary btn-sm search-btn" data-toggle="" data-target="">查找</button>
                    </div>
                </div>
                <div class="ibox-title">
                    <h5>数据统计</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-success"><span>已成功提现手续费金额</span><span id="cashout_fee" class="user-data">123132</span></li>
                                <li class="list-group-item list-group-item-info"><span>已成功提现金额</span><span id="cashout_amount" class="user-data">123132</span></li>
                                <li class="list-group-item list-group-item-success"><span>待提现金额</span><span id="not_cashout_amount" class="user-data">123132</span></li>
                                <li class="list-group-item list-group-item-info"><span>购买会员销量</span><span id="member_sale1" class="user-data">123132</span></li>
                                <li class="list-group-item list-group-item-success"><span>购买中级会员销量</span><span id="member_sale2" class="user-data">123132</span></li>
                                <li class="list-group-item list-group-item-info"><span>购买高级会员销量</span><span id="member_sale3" class="user-data">123132</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <h4>该列数据不受时间影响</h4>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-success"><span>用户钱包总额</span><span id="wallet_amount" class="user-data">123132</span></li>
                                <li class="list-group-item list-group-item-info"><span>会员数量</span><span id="member_count1" class="user-data">123132</span></li>
                                <li class="list-group-item list-group-item-success"><span>中级会员数量</span><span id="member_count2" class="user-data">123132</span></li>
                                <li class="list-group-item list-group-item-info"><span>高级会员数量</span><span id="member_count3" class="user-data">123132</span></li>
                            </ul>
                        </div>
                    </div>
                    
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    getData()
    function getData () {
        $.ajax({
            url: '/api/user/data',
            type: 'get',
            dataType: 'json',
            success: function (res) {
                console.log(res)
                $("#cashout_fee").text(res.data.callout_factorage)
                $("#cashout_amount").text(res.data.callout)
                $("#not_cashout_amount").text(res.data.callout_pending)
                $("#member_sale1").text(res.data.first)
                $("#member_sale2").text(res.data.middle)
                $("#member_sale3").text(res.data.top)
                $("#wallet_amount").text(res.data.amount)
                $("#member_count1").text(res.data.first_total)
                $("#member_count2").text(res.data.middle_total)
                $("#member_count3").text(res.data.top_total)
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    }
})
</script>
@endsection
