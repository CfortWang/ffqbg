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
                            <div class="col-lg-10 col-md-10 col-sm-12" id=menu-div>
                                <div class="col-lg-3 col-md-4 col-sm-12 checked-all">
                                <div class="menu">
                                    <label for="all" class="label-radio">
                                        <input type="checkbox" id="all" value="1" hidden="" name="all">
                                        <label for="all" class="menu-checkbox"></label>
                                        <span>全选</span>
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

    function getRole () {
        $.ajax({
            type: "GET",
            dataType: 'JSON',
            url: '/api/admin/menu',
            success: function (res) {
                if (res.status == 200) {
                    let boxCount = Math.ceil(res.data.length/5)
                    for (let i = 0; i < boxCount; i++) {
                        let $menuBox = '<div class="col-lg-3 col-md-4 col-sm-12 menu-box"></div>'
                        $("#menu-div").prepend($menuBox)
                    }
                    for (let i = 0; i < res.data.length; i++) {
                        let j = parseInt(i / 5)
                        let $menu = '<div class="menu"><label for="menu'+res.data[i].id+'" class="label-radio"><input type="checkbox" id="menu'+res.data[i].id+'" value="'+res.data[i].id+'" hidden="" name="menu_id[]" ><label for="menu'+res.data[i].id+'" class="menu-checkbox"></label><span>'+res.data[i].name+'</span></label></div>'
                        $("#menu-div .menu-box:eq("+ j +")").append($menu)
                    }
                } else {
                    toastr.error(res.message)
                }
            },
            error: function (ex) {
                console.log(ex)
                toastr.error(ex.statusText)
            }
        });
    }
    getRole()

    $(".create-btn").on("click", function () {
        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: $("#submit").attr('action'),
            data: $("#submit").serialize(),
            success: function(res) {
                if(res.status == 200){
                    toastr.success("创建角色成功")
                    setTimeout(() => {
                        window.location.href = '/admin/role'
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
