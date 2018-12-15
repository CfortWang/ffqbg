@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>创建角色</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/admin/list') }}">管理员</a>
            </li>
            <li class="active">
                <strong>创建角色</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                    <form id="submit" action="/api/admin/addRole" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">角色昵称</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="role_name" name="name" placeholder="最多可输入20个字符" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">角色权限</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="clear-fix">
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="menu-title">用户管理
                                        <label for="session1" class="label-radio">
                                            <input type="checkbox" id="session1" value="1" hidden="" name="" class="session">
                                            <label for="session1" class="menu-checkbox"></label>
                                        </label>
                                    </div>
                                    <div class="menu-box">
                                        <div class="menu">
                                            <label for="menu1" class="label-radio">
                                                <input type="checkbox" id="menu1" value="1" hidden="" name="menu_id[]" >
                                                <label for="menu1" class="menu-checkbox"></label>
                                                <span>用户列表</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu2" class="label-radio">
                                                <input type="checkbox" id="menu2" value="2" hidden="" name="menu_id[]" >
                                                <label for="menu2" class="menu-checkbox"></label>
                                                <span>账户钱包</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu3" class="label-radio">
                                                <input type="checkbox" id="menu3" value="3" hidden="" name="menu_id[]" >
                                                <label for="menu3" class="menu-checkbox"></label>
                                                <span>支付列表</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu4" class="label-radio">
                                                <input type="checkbox" id="menu4" value="4" hidden="" name="menu_id[]" >
                                                <label for="menu4" class="menu-checkbox"></label>
                                                <span>提现列表</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu5" class="label-radio">
                                                <input type="checkbox" id="menu5" value="5" hidden="" name="menu_id[]" >
                                                <label for="menu5" class="menu-checkbox"></label>
                                                <span>佣金管理</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu6" class="label-radio">
                                                <input type="checkbox" id="menu6" value="6" hidden="" name="menu_id[]" >
                                                <label for="menu6" class="menu-checkbox"></label>
                                                <span>数据统计</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="menu-title">管理员
                                        <label for="session2" class="label-radio">
                                            <input type="checkbox" id="session2" value="1" hidden="" name="" class="session">
                                            <label for="session2" class="menu-checkbox"></label>
                                        </label>
                                    </div>
                                    <div class="menu-box">
                                        <div class="menu">
                                            <label for="menu7" class="label-radio">
                                                <input type="checkbox" id="menu7" value="7" hidden="" name="menu_id[]" >
                                                <label for="menu7" class="menu-checkbox"></label>
                                                <span>管理员列表</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu8" class="label-radio">
                                                <input type="checkbox" id="menu8" value="8" hidden="" name="menu_id[]" >
                                                <label for="menu8" class="menu-checkbox"></label>
                                                <span>角色列表</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu9" class="label-radio">
                                                <input type="checkbox" id="menu9" value="9" hidden="" name="menu_id[]" >
                                                <label for="menu9" class="menu-checkbox"></label>
                                                <span>创建角色</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu10" class="label-radio">
                                                <input type="checkbox" id="menu10" value="10" hidden="" name="menu_id[]" >
                                                <label for="menu10" class="menu-checkbox"></label>
                                                <span>创建管理员</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="menu-title">系统设置
                                        <label for="session3" class="label-radio">
                                            <input type="checkbox" id="session3" value="1" hidden="" name="" class="session">
                                            <label for="session3" class="menu-checkbox"></label>
                                        </label>
                                    </div>
                                    <div class="menu-box">
                                        <div class="menu">
                                            <label for="menu11" class="label-radio">
                                                <input type="checkbox" id="menu11" value="11" hidden="" name="menu_id[]" >
                                                <label for="menu11" class="menu-checkbox"></label>
                                                <span>基础设置</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu12" class="label-radio">
                                                <input type="checkbox" id="menu12" value="12" hidden="" name="menu_id[]" >
                                                <label for="menu12" class="menu-checkbox"></label>
                                                <span>参数设置</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu13" class="label-radio">
                                                <input type="checkbox" id="menu13" value="13" hidden="" name="menu_id[]" >
                                                <label for="menu13" class="menu-checkbox"></label>
                                                <span>验证码列表</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu14" class="label-radio">
                                                <input type="checkbox" id="menu14" value="14" hidden="" name="menu_id[]" >
                                                <label for="menu14" class="menu-checkbox"></label>
                                                <span>用户协议</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="menu-title">任务管理
                                        <label for="session4" class="label-radio">
                                            <input type="checkbox" id="session4" value="1" hidden="" name="" class="session">
                                            <label for="session4" class="menu-checkbox"></label>
                                        </label>
                                    </div>
                                    <div class="menu-box">
                                        <div class="menu">
                                            <label for="menu15" class="label-radio">
                                                <input type="checkbox" id="menu15" value="15" hidden="" name="menu_id[]" >
                                                <label for="menu15" class="menu-checkbox"></label>
                                                <span>任务列表</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu16" class="label-radio">
                                                <input type="checkbox" id="menu16" value="16" hidden="" name="menu_id[]" >
                                                <label for="menu16" class="menu-checkbox"></label>
                                                <span>任务记录</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu17" class="label-radio">
                                                <input type="checkbox" id="menu17" value="17" hidden="" name="menu_id[]" >
                                                <label for="menu17" class="menu-checkbox"></label>
                                                <span>发布任务</span>
                                            </label>
                                        </div>
                                    </div>
                                </div></div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="menu-title">广告管理
                                        <label for="session5" class="label-radio">
                                            <input type="checkbox" id="session5" value="1" hidden="" name="" class="session">
                                            <label for="session5" class="menu-checkbox"></label>
                                        </label>
                                    </div>
                                    <div class="menu-box">
                                        <div class="menu">
                                            <label for="menu18" class="label-radio">
                                                <input type="checkbox" id="menu18" value="18" hidden="" name="menu_id[]" >
                                                <label for="menu18" class="menu-checkbox"></label>
                                                <span>轮播列表</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu19" class="label-radio">
                                                <input type="checkbox" id="menu19" value="19" hidden="" name="menu_id[]" >
                                                <label for="menu19" class="menu-checkbox"></label>
                                                <span>新建轮播</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="menu-title">新闻管理
                                        <label for="session6" class="label-radio">
                                            <input type="checkbox" id="session7" value="1" hidden="" name="" class="session">
                                            <label for="session6" class="menu-checkbox"></label>
                                        </label>
                                    </div>
                                    <div class="menu-box">
                                         <div class="menu">
                                            <label for="menu20" class="label-radio">
                                                <input type="checkbox" id="menu20" value="20" hidden="" name="menu_id[]" >
                                                <label for="menu20" class="menu-checkbox"></label>
                                                <span>发布新闻</span>
                                            </label>
                                        </div>
                                        <div class="menu">
                                            <label for="menu21" class="label-radio">
                                                <input type="checkbox" id="menu21" value="21" hidden="" name="menu_id[]" >
                                                <label for="menu21" class="menu-checkbox"></label>
                                                <span>新闻列表</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="menu-title" id="select_all">全选
                                        <label for="all" class="label-radio">
                                            <input type="checkbox" id="all" value="1" hidden="" name="all" >
                                            <label for="all" class="menu-checkbox"></label>
                                        </label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg create-btn">创建角色</button></div>
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
$(".create-btn").on("click", function () {
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: $("#submit").attr('action'),
        data: $("#submit").serialize(),
        success: function(data, status, x) {
            if(data.status == 200){
                toastr.success("创建角色成功")
                setTimeout(() => {
                    window.location.href = '/admin/role'
                }, 1500);
            } else {
                toastr.error(data.message);
            }
            console.log(status);
        }
    });
})

$('input[type=checkbox][name=all]').change(function() {
    if (this.value == 0) {
        this.value = 1
        $(".menu").find("input").prop("checked", false)
    } else if (this.value == 1) {
        this.value = 0
        $(".menu").find("input").prop("checked", true)
    }
})

$('input[type=checkbox][class=session]').change(function() {
    if (this.value == 0) {
        this.value = 1
        $(this).parent().parent().parent().find("input").prop("checked", false)
    } else if (this.value == 1) {
        this.value = 0
        $(this).parent().parent().parent().find("input").prop("checked", true)
    }
})

</script>
@endsection
