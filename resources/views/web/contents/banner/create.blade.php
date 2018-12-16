@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>广告管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/banner/list') }}">轮播列表</a>
            </li>
            <li class="active">
                <strong>新建轮播</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                    <form id="submit" action="/api/banner" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">轮播标题</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="banner_title" name="title" placeholder="最多可输入20个字符" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group image-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">轮播图片</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 task">
                                <a href="javascript:;" class="file">+添加图片
                                    <input type="file" class="" id="task_image" name="" onchange="selectImage(this, '.task')">
                                </a>
                                <span class="image-remark">建议尺寸:200×200像素，请上传gif,jpeg,png,bmp格式的图片</span>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">跳转链接</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="link" name="link" placeholder="为空则不跳转">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">显示位置</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <select class="form-control" id="show_place" name="advertisement_position_id">
                                    <!-- <option value="0">全部</option> -->
                                    <option value="1">主页</option>
                                    <option value="2">商城</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">显示状态</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <select class="form-control" id="show_type" name="user_level">
                                    <option value="0">隐藏</option>
                                    <option value="1">显示</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">轮播描述</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="description" id="desc" cols="" rows="" placeholder="轮播的详细说明，支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg create-btn">创建轮播</button></div>
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

function selectImage(file, selector) {
    if (!file.files || !file.files[0]) {
        return;
    }
    var reader = new FileReader();
    reader.onload = function (evt) {
        var $imgBox = '<div class="selected-image"><div class="delete-image"><img class="image" src="/img/close.png" alt=""></div><img class="image" alt="" src="' +evt.target.result + '"><input class="img-value" type="text" name="file" hidden></div>'
        $(selector).append($imgBox)
        image = evt.target.result;
        let remark = selector + ' .image-remark'
        $(remark).hide()
        $(".file").hide()
        $(".create-btn").attr("disabled", true)
        $(".create-btn").text("轮播图片上传中...")
    }
    reader.readAsDataURL(file.files[0]);
    fd = new FormData()
    fd.append('file', file.files[0])
    fd.append('type', 'banner')
    upLoadImage(fd, selector);
}

function upLoadImage (file, kind) {
    $.ajax({
        url: '/api/upload',
        type: 'post',
        dataType: 'json',
        data: file,
        processData: false,
        contentType: false,
        success: function (res) {
            let url = res.data.url
            let selector = kind + ' .selected-image:last-child .img-value'
            $(selector).val(url)
            $(".create-btn").attr("disabled", false)
            $(".create-btn").text("创建轮播")
        },
        error: function (ex) {
            console.log(ex)
        }
    })
}

$(".task").on("click", ".selected-image .delete-image", function () {
    $(this).parent().remove()
    var sonNum = $(".task").children().length
    if (sonNum == 2) {
        $(".task .image-remark").show()
    }
    $(".file").show()
})

$(".create-btn").on("click", function () {
    let title = $("#banner_title").val()
    let link = $("#link").val()
    let showPlace = $("#show_place").val()
    let desc = $("#desc").val()
    if (title == '' || title == null) {
        toastr.error("轮播标题不能为空！")
        return false
    }
    if (desc == '' || desc == null) {
        toastr.error("轮播描述不能为空！")
        return false
    }

    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: $("#submit").attr('action'),
        data: $("#submit").serialize(),
        success: function(res) {
            if(res.status == 200){
                toastr.success("新建轮播成功")
                setTimeout(() => {
                    window.location.href = '/banner/list'
                }, 1500);
            } else {
                toastr.error(res.message);
            }
            console.log(status);
        },
        error: function (ex) {
            console.log(ex)
        }
    });
})

</script>
@endsection
