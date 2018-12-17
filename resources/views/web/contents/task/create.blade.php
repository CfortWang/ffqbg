@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>发布任务</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/task/list') }}">任务管理</a>
            </li>
            <li class="active">
                <strong>发布任务</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                    <form id="submit" action="/api/task" method="post"  enctype="multipart/form-data">
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
                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg create-btn">发布任务</button></div>
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
        $(".create-btn").attr("disabled", true)
        $(".create-btn").text("任务图片上传中...")
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
            if (res.status == 200) {
                let url = res.data.url
                let selector = kind + ' .selected-image:last-child .img-value'
                $(selector).val(url)
                $(".create-btn").attr("disabled", false)
                $(".create-btn").text("发布任务")
            } else {
                toastr.error(res.message)
                $(".create-btn").attr("disabled", false)
                $(".create-btn").text("发布任务")
            }
        },
        error: function (ex) {
            console.log(ex)
            toastr.error("图片上传失败，请重试")
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

$(".create-btn").on("click", function () {
    let taskTitle = $("#task_title").val()
    let taskLimit = $("#task_limit").val()
    let taskDesc = $("#task_desc").val()
    if (taskTitle == '' || taskTitle == null) {
        toastr.error("任务标题不能为空！")
        return false
    }
    if (taskLimit == '' || taskLimit == null) {
        toastr.error("任务人数限制不能为空！")
        return false
    }
    if (taskDesc == '' || taskDesc == null) {
        toastr.error("任务详情不能为空！")
        return false
    }
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: $("#submit").attr('action'),
        data: $("#submit").serialize(),
        success: function(res) {
            if(res.status == 200){
                toastr.success("发布任务成功")
                setTimeout(() => {
                    window.location.href = '/task/list'
                }, 1500);
            } else {
                toastr.error(res.message);
            }
        },
        error: function (ex) {
            toastr.error(ex.statusText)
            console.log(ex)
        }
    });
})

</script>
@endsection
