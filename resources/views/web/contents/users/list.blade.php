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
                        <div id="" class="dataTables_filter">
                            <div class="search-box">
                                <label>搜索 :</label>
                                <input type="search" id="search_id" class="form-control input-md" placeholder="" aria-controls="">
                            </div>
                            <div class="filter-box">
                                <label>用户等级 :</label>
                                <select class="form-control" id="list-select">
                                    <option value="">全部</option>
                                    <option value="0">游客</option>
                                    <option value="1">会员</option>
                                    <option value="2">中级会员</option>
                                    <option value="3">高级会员</option>
                                </select>
                            </div>
                            <div class="interval-box">
                                <label>注册时间 :</label>
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
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="" data-target="">查找</button>
                            </div>
                        </div>
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
    <div class="btn-group-vertical" role="group" aria-label="">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUser">编辑用户</button>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#memberLevel">会员层级</button>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#memberLevel">删除用户</button>
    </div>
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">用户资料</h4>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="phone_number" class="control-label">手机号:</label>
                    <input type="text" class="form-control" id="phone_number">
                </div>
                <div class="form-group">
                    <label for="nickname" class="control-label">昵称:</label>
                    <input type="text" class="form-control" id="nickname">
                </div>
                <div class="form-group">
                    <label for="superior_id" class="control-label">上级ID:</label>
                    <input type="text" class="form-control" id="superior_id">
                </div>
                <div class="form-group">
                    <label for="nickname" class="control-label">用户等级:</label>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">游客<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">游客</a></li>
                            <li><a href="#">会员</a></li>
                            <li><a href="#">中级会员</a></li>
                            <li><a href="#">高级会员</a></li>
                        </ul>
                    </div>
                </div>
                <label for="nickname" class="control-label">操作账户余额</label><span>当前余额35</span>
                <div class="input-group" style="margin-bottom: 15px;">
                    <input type="text" class="form-control" aria-label="...">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">增加<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">增加</a></li>
                            <li><a href="#">减少</a></li>
                        </ul>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">保存修改</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="memberLevel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">会员层级</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">保存修改</button>
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
        dom: '<"row"t>p',
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
            url: "{{ url('/api/user/list')}}",
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"id",
                className:"text-center",
            },
            {
                data:"phone_number",
                className:"text-center",
                render:function(data,type,row) {
                    var details = '<p>' + row.phone_number + '</p>'+ '<p>' + row.name + '</p>';
                    return details;
                }
            },
            {
                data:"user_register_time",
                className:"text-center",
            },
            {
                data:"user_register_ip",
                className:"text-center",
            },
            {
                data:"user_level_id",
                className:"text-center",
            },
            {
                data:"total_amount",
                className:"text-center",
            },
            {
                data:null,
                className:"text-center",
                // render:function(data,type,row) {
                //     return '<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#memberLevel">删除用户</button>';
                //     // var details = '<a href="/user/detail/' + row.id + '">' + row.phone_number + '</a><br>'+row.name;
                //     // return details;
                // }
                render:function(data,type,row) {
                    return '<div class="btn-group-vertical" role="group" aria-label="" data-id="' + row.id + '"><button type="button" class="btn btn-primary btn-sm edit-btn" data-toggle="modal" data-target="#editUser">编辑用户</button><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#memberLevel">会员层级</button><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#memberLevel">删除用户</button></div>'
                }
            },
        ],
    });

    $('.ibox-content').on("click", ".btn-group-vertical .edit-btn", function () {
        var id = $(this).parent().attr("data-id")
        $.ajax({
            url: '/user/' + id + '/detail',
            type: 'get',
            dataType: 'json',
            success: function (res) {
                console.log(res)
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })
});
</script>
@endsection
