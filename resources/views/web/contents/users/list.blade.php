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
                <a href="{{ url('/user/list') }}">@lang('user/list.header.depth2')</a>
            </li>
            <li class="active">
                <strong>@lang('user/list.header.depth3')</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>@lang('user/list.contents.title')</h5>
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
                                   <th class="text-center">用户ID</th>
                                   <th class="text-center">用户资料</th>
                                   <th class="text-center">注册时间</th>
                                   <th class="text-center">注册IP</th>
                                   <th class="text-center">等级</th>
                                   <th class="text-center">钱包余额</th>
                                   <th class="text-center">操作</th>
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
            url: "{{ url('/datatable/user/list')}}",
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
