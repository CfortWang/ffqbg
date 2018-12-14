@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>任务管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">任务管理</a>
            </li>
            <li class="active">
                <strong>任务列表</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>任务列表</h5>
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
                                   <th class="text-center">ID</th>
                                   <th class="text-center">标题</th>
                                   <th class="text-center">发布者</th>
                                   <th class="text-center">类型</th>
                                   <th class="text-center">创建时间</th>
                                   <th class="text-center">状态</th>
                                   <th class="text-center">总金额</th>
                                   <th class="text-center">单价</th>
                                   <th class="text-center">人数限制</th>
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

    <!-- 任务详细信息 -->
    <div class="modal fade" id="task_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">任务详情</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="task_title" class="control-label">标题：</label>
                            <input type="text" class="form-control" id="task_title">
                        </div>
                        <div class="form-group">
                            <label for="task_onwer" class="control-label">发布者：</label>
                            <input type="text" class="form-control" id="task_onwer">
                        </div>
                        <div class="form-group">
                            <label for="task_type" class="control-label">类型：</label>
                            <input type="text" class="form-control" id="task_type">
                        </div>
                        <div class="form-group">
                            <label for="created_at" class="control-label">创建时间：</label>
                            <input type="text" class="form-control" id="created_at">
                        </div> 
                        <div class="form-group">
                            <label for="task_desc" class="control-label">详情描述</label>
                            <input type="text" class="form-control" id="task_desc">
                        </div>
                        <div class="form-group">
                            <label for="total_amount" class="control-label">总金额：</label>
                            <input type="text" class="form-control" id="total_amount">
                        </div>
                        <div class="form-group">
                            <label for="task_price" class="control-label">每份赏金：</label>
                            <input type="text" class="form-control" id="task_price">
                        </div>
                        <div class="form-group">
                            <label for="task_count" class="control-label">限制人数：</label>
                            <input type="text" class="form-control" id="task_count">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 删除任务提示 -->
    <div class="modal fade bs-example-modal-sm" id="systemTips" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">系统提示</h4>
            </div>
            <div class="modal-body">
                任务删除之后不可恢复，请谨慎操作！
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-danger" id="sure-delete">确定删除</button>
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
            url: "{{ url('/api/task/list')}}",
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
                data:"title",
                className:"text-center"
            },
            {
                data:"user_id",
                className:"text-center",
                render: function (data, type, row) {
                    if (row.user_id == 0) {
                        row.user_id = "SYSTEM"
                    }
                    return row.user_id
                }
            },
            {
                data:"user_level",
                className:"text-center",
                render: function (data, type, row) {
                    if (row.user_level == 0) {
                        row.user_level = "普通"
                    } else if (row.user_level == 1) {
                        row.user_level = "会员"
                    } else if (row.user_level == 2) {
                        row.user_level = "中级"
                    } else {
                        row.user_level = "高级"
                    }
                    return row.user_level
                }
            },
            {
                data:"created_at",
                className:"text-center"
            },
            {
                data:"status",
                className:"text-center",
                render: function (data, type, row) {
                    if (row.status == 0) {
                        row.status = "有效"
                    } else {
                        row.status = "未支付"
                    }
                    return row.status
                }
            },
            {
                data: null,
                className:"text-center",
                render: function (data, type, row) {
                    return "￥" + row.price * row.task_limit
                }
            },
            {
                data:"price",
                className:"text-center",
                render: function (data, type, row) {
                    return "￥" + row.price
                }
            },
            {
                data:"task_limit",
                className:"text-center",
                render: function (data, type, row) {
                    return row.task_limit + "人"
                }
            },
            
            {
                data: null,
                className:"text-center",
                render: function (data, type, row) {
                    return '<div class="btn-group-vertical" role="group" aria-label="" data-id="' + row.id + '"><button type="button" class="btn btn-info btn-sm detail-btn" data-toggle="modal" data-target="#task_details">详细信息</button><button type="button" class="btn btn-success btn-sm join-btn" data-toggle="" data-target="">参与信息</button></div><div class="btn-group-vertical" role="group" aria-label="" data-id="' + row.id + '"><button type="button" class="btn btn-primary btn-sm edit-btn" data-toggle="modal" data-target="#editUser">编辑任务</button><button type="button" class="btn btn-danger btn-sm delete-btn" data-toggle="modal" data-target=".bs-example-modal-sm">删除任务</button></div>'
                }
            },
        ],
    });

    // $('.ibox-content').on("click", ".btn-group-vertical .detail-btn", function () {
        $('.detail-btn').on("click", function () {
        // var id = $(this).parent().attr("data-id")
        $.ajax({
            url: '/api/task/detail',
            type: 'get',
            data: {
                id: "1"
            },
            dataType: 'json',
            success: function (res) {
                console.log(res)
                $("#task_title").val(res.data.title)
                $("#task_owner").val(res.data.title)
                $("#task_type").val(res.data.user_level)
                $("#created_at").val(res.data.user_level)
                $("#total_amount").val(res.data.price * res.data.task_limit + "元")
                $("#task_price").val(res.data.price)
                $("#task_count").val(res.data.task_limit)
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })
    $("#sure-modify").on("click", function () {
        var id = $(this).attr("data-id")
        var phoneNumber = $("#phone_number").val()
        var nickname = $("#nickname").val()
        var userLevel = $("#user_level").val()
        var superiorID = $("#superior_id").val()
        var totalAmount = $("#total_amount").val()
        $.ajax({
            url: '/api/user/update',
            type: 'post',
            data: {
                id: id,
                name: nickname,
                phone_number: phoneNumber,
                user_level_id: userLevel,
                total_amount: totalAmount,
                recommder_id: superiorID
            },
            dataType: 'json',
            success: function (res) {
                alert(res.message)
                $('#editUser').hide()
                $('.modal-backdrop').hide()
                table.ajax.reload()
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })
    // $('.ibox-content').on("click", ".btn-group-vertical .join-btn", function () {
        $('.join-btn').on("click", function () {
        var id = $(this).parent().attr("data-id")
        window.location.href = '/task/list/join?id=' + id
    })
    $('.ibox-content').on("click", ".btn-group-vertical .delete-btn", function () {
        var id = $(this).parent().attr("data-id")
        $("#sure-delete").attr("data-id", id)
    })

    $('#sure-delete').on("click", function () {
        var id = $(this).attr("data-id")
        $.ajax({
            url: '/api/user/delete',
            type: 'delete',
            data: {
                id: id
            },
            dataType: 'json',
            success: function (res) {
                alert(res.message)
                $('#systemTips').hide()
                $('.modal-backdrop').hide()
                table.ajax.reload()
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })
});
</script>
@endsection
