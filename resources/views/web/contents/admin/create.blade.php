@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>创建管理员</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/admin/list') }}">管理员</a>
            </li>
            <li class="active">
                <strong>创建管理员</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                    <form id="submit" action="/api/admin/addAdmin" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">管理员昵称</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="admin_name" name="name" placeholder="最多可输入20个字符" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">管理员账号</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="account" name="username" placeholder="">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">管理员密码</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">确认密码</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="password" class="form-control" id="re_password" name="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">选择角色</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <select class="form-control" id="role_id" name="role_id">
                                    <option value="">暂无角色信息，请先创建角色</option>
                                </select>
                            </div>
                        </div>
                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg create-btn">创建管理员</button></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function getRole () {
    $.ajax({
        type: "GET",
        dataType: 'JSON',
        url: '/api/admin/role?start=0&length=10',
        success: function(res) {
            if (res.status == 200) {
                let resData = res.data.data
                if (resData.length) {
                    $("#role_id").empty()
                } else {
                    toastr.info("暂无角色信息，请先创建角色")
                }
                for (let i = 0; i < resData.length; i++) {
                    let option = '<option value="' + resData[i].id + '">' + resData[i].name + '</option>'
                    $("#role_id").append(option)
                }
            } else {
                toastr.error(res.message)
            }
        },
        error: function (ex) {
            console.log(ex)
            toastr.error("获取角色列表失败，请刷新页面重试")
        }
    });
}
getRole()

$(".create-btn").on("click", function () {
    let adminName = $("#admin_name").val()
    let account = $("#account").val()
    let password = $("#password").val()
    let rePassword = $("#re_password").val()
    let roleID = $("#role_id").val()
    if (adminName == '' || adminName == null) {
        toastr.error("管理员昵称不能为空！")
        return false
    }
    if (account == '' || account == null) {
        toastr.error("管理员账号不能为空！")
        return false
    }
    if (password == '' || password == null) {
        toastr.error("管理员密码不能为空！")
        return false
    }
    if (rePassword == '' || rePassword == null) {
        toastr.error("请确认密码！")
        return false
    }
    if (rePassword != '' && rePassword != password) {
        toastr.error("两次密码不一致！")
        return false
    }
    if (roleID == '' || roleID == null) {
        toastr.error("用户角色不能为空！")
        return false
    }
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: $("#submit").attr('action'),
        data: $("#submit").serialize(),
        success: function(res) {
            if(res.status == 200){
                toastr.success("管理员创建成功")
                setTimeout(() => {
                    window.location.href = '/admin/list'
                }, 1500);
            } else {
                toastr.error(res.message);
            }
        },
        error: function (ex) {
            console.log(ex)
            toastr.error(ex.statusText)
        }
    });
})

</script>
@endsection
