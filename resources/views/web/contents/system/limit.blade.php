@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>用户限制</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/system/parameter') }}">系统设置</a>
            </li>
            <li class="active">
                <strong>用户限制</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>用户限制</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <div id="" class="dataTables_filter">
                            <div class="interval-box">
                                <label>时间范围 :</label>
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
                            <div class="interval-box">
                                <label>钱包余额范围 :</label>
                                <input type="number" id="min_amount" class="form-control input-md" placeholder="" aria-controls="">
                                <input type="number" id="max_amount" class="form-control input-md" placeholder="" aria-controls="">
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                            <div class="limit-switch">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 编辑用户信息 -->
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
                    <label for="user_level" class="control-label">用户等级:</label>
                    <select class="form-control" id="user_level">
                        <option value="0">游客</option>
                        <option value="1">会员</option>
                        <option value="2">中级会员</option>
                        <option value="3">高级会员</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="total_amount" class="control-label">操作账户余额:</label>
                    <input type="text" class="form-control" id="total_amount">
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="sure-modify">保存修改</button>
            </div>
            </div>
        </div>
    </div>

    <!-- 添加用户下级 -->
    <div class="modal fade" id="addSubordinate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加下级</h4>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="user_id" class="control-label">用户ID:</label>
                    <input type="text" class="form-control" id="user_id" placeholder="当前用户ID" disabled>
                </div>
                <div class="form-group">
                    <label for="user_level" class="control-label">用户等级:</label>
                    <select class="form-control" id="fake_user_level">
                        <option value="0">游客</option>
                        <option value="1">会员</option>
                        <option value="2">中级会员</option>
                        <option value="3">高级会员</option>
                    </select>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="sure-add">确定添加</button>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

$(document).ready(function(){

    $('.search-btn').on("click", function () {
        table.ajax.reload()
    })

    $('.ibox-content').on("click", ".btn-group-vertical .edit-btn", function () {
        var id = $(this).parent().attr("data-id")
        $("#sure-modify").attr("data-id", id)
        $.ajax({
            url: '/api/user/' + id + '/detail',
            type: 'get',
            dataType: 'json',
            success: function (res) {
                console.log(res)
                $("#phone_number").val(res.data.phone_number)
                $("#nickname").val(res.data.name)
                $("#superior_id").val(res.data.recommder_id)
                $("#user_level").val(res.data.user_level_id)
                $("#total_amount").val(res.data.total_amount)
                $("#total_amount").attr("placeholder", "当前余额：" + res.data.total_amount)
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
        if (totalAmount == '' || totalAmount == null) {
            toastr.error("账户余额不能为空！")
            return false
        }
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
                toastr.success(res.message)
                $('#editUser').modal('hide')
                table.ajax.reload()
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })
    
    $('.ibox-content').on("click", ".btn-group-vertical .add-btn", function () {
        let id = $(this).parent().attr("data-id")
        $("#user_id").val(id)
    })
    
    $('#sure-add').on("click", function () {
        var userID = $("#user_id").val()
        var fakeLevel = $("#fake_user_level").val()
        $.ajax({
            url: '/api/user/addFaker',
            type: 'POST',
            data: {
                id: userID,
                level: fakeLevel
            },
            dataType: 'json',
            success: function (res) {
                toastr.success(res.message)
                $('#addSubordinate').modal('hide')
                table.ajax.reload()
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })

    $('.ibox-content').on("click", ".btn-group-vertical .level-btn", function () {
        var id = $(this).parent().attr("data-id")
        window.location.href = '/user/list/level?id=' + id
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
                toastr.success(res.message)
                $('#systemTips').modal('hide')
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