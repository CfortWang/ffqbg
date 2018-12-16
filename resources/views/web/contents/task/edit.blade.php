@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>任务信息</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/task/list') }}">任务管理</a>
            </li>
            <li class="active">
                <strong>任务信息</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                <form id="submit" action="/api/task/modify" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">任务标题</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="task_title" name="title" placeholder="最多可输入20个字符" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group image-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">任务图片</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 task">
                                <a href="javascript:;" class="file">+添加图片
                                    <input type="file" class="" id="task_image" name="file" onchange="selectImage(this, '.task')">
                                </a>
                                <span class="image-remark">建议尺寸:200×200像素，请上传gif,jpeg,png,bmp格式的图片</span>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">人数限制</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="number" class="form-control" id="task_limit" name="amount" placeholder="设置领取该任务的最大人数">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">任务类型</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <select class="form-control" id="task_type" name="user_level">
                                    <option value="0">普通</option>
                                    <option value="1">会员</option>
                                    <option value="2">中级</option>
                                    <option value="3">高级</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">任务详情</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="content" id="task_desc" cols="" rows="" placeholder="填写任务的详细说明，支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <input type="text" class="" id="task_id" hidden name="id" placeholder="">
                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg modify-btn">保存修改</button></div>
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
        var $imgBox = '<div class="selected-image"><div class="delete-image"><img class="image" src="/img/close.png" alt=""></div><img class="image" alt="" src="' +evt.target.result + '"><input class="img-value" type="text" name="image[]" hidden></div>'
        $(selector).append($imgBox)
        image = evt.target.result;
        let remark = selector + ' .image-remark'
        $(remark).hide()
        $(".modify-btn").attr("disabled", true)
        $(".modify-btn").text("任务图片上传中...")
    }
    reader.readAsDataURL(file.files[0]);
    var fd = new FormData()
    fd.append('file', file.files[0])
    fd.append('type', 'task')
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
            $(".modify-btn").attr("disabled", false)
            $(".modify-btn").text("保存修改")
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
})
var args = getArgs()
$("input#task_id").val(args['id'])
var drawData = function () {
    $.ajax({
        url: '/api/task/detail',
        type: 'get',
        data: {
            id: args['id']
        },
        dataType: 'json',
        success: function (res) {
            let resData = res.data
            console.log(resData)
            $("input#task_title").val(resData.title)
            $("input#task_price").val(resData.price)
            $("input#task_limit").val(resData.task_limit)
            $("select#task_type").val(resData.user_level)
            $("select#task_type").find("option[value = '"+ resData.user_level +"']").attr("selected","selected")
            $("#task_desc").val(resData.content)

            // 渲染任务图片
            $(".task .image-remark").hide()
            for (let i = 0; i < resData.images.length; i++) {
                var $imgBox = '<div class="selected-image"><div class="delete-image"><img class="image" src="/img/close.png" alt=""></div><img class="image" alt="" src="' + resData.images[i] + '"><input class="img-value" type="text" name="image[]" hidden value="' + resData.images[i] + '"></div>'
                $('.task').append($imgBox)
            }
            
        },
        error: function (ex) {
            console.log(ex)
        }
    })
}
drawData();

$(".modify-btn").on("click", function () {
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: $("#submit").attr('action'),
        data: $("#submit").serialize(),
        success: function(data, status, x) {
            if(data.status == 200){
                toastr.success("修改成功")
                setTimeout(() => {
                    window.location.href = '/task/list'
                }, 1500);
            } else {
                toastr.error(data.message);
            }
            console.log(status);
        }
    });
})

</script>
@endsection
