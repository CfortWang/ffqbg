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
                <strong>提现列表</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>提现列表</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                   <th class="text-center">提现编号</th>
                                   <th class="text-center">会员资料</th>
                                   <th class="text-center">支付类型</th>
                                   <th class="text-center">钱包</th>
                                   <th class="text-center">账号</th>
                                   <!-- 支付宝姓名和账号 -->
                                   <th class="text-center">提现金额/状态/th>
                                   <th class="text-center">时间</th>
                                   <!-- 申请时间 -->
                                   <!-- 审核时间 -->
                                   <!-- 到账时间 -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    $('.user-list-table').DataTable({
        pageLength: 10,
        responsive: true,
        dom: 'f<"row"t>p',
        order: [[ 0, "desc" ]],
        language: {
            "zeroRecords": "@lang('user/list.table.no_data')",
            "info": "_PAGE_ / _PAGES_ ",
            "search": "@lang('user/list.table.search') :",
            "paginate": {
                "next":       "@lang('user/list.table.pagination.next')",
                "previous":   "@lang('user/list.table.pagination.prev')"
            },
        },
        deferRender: true,
        processing:true,
        serverSide:true,
        ajax: {
            url: "{{ url('/api/user/cashout')}}",
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"seq",
                className:"text-center",
            },
            {
                data:"phone_num",
                className:"text-center",
                render:function(data,type,row) {
                    var details = '<a href="/user/detail/' + row.seq + '">' + row.phone_num + '</a>';
                    return details;
                }
            },
            {
                data:"point",
                className:"text-center",
            },
            {
                data:"ticket_cnt",
                className:"text-center",
            },
            {
                data:"is_cert_email",
                className:"text-center",
                render:function(data,type,row) {
                    var details;
                    if(row.is_cert_email){
                        details = "<span class='label label-success'>@lang('user/list.table.contents.is_cert_yes')</span>";
                    }else{
                        details = "<span class='label label-danger'>@lang('user/list.table.contents.is_cert_no')</span>";
                    }
                    return details;
                }
            },
            {
                data:"last_login_at",
                className:"text-center",
            },
            {
                data:"created_at",
                className:"text-center",
            },
        ],
    });
});
</script>
@endsection
