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
                                <input type="number" class="form-control" id="task_limit" name="" placeholder="设置领取该任务的最大人数">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">任务类型</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <select class="form-control" id="task_type">
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
                                <textarea class="rule-text" name="" id="task_desc" cols="" rows="" placeholder="填写任务的详细说明，支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg create-btn">发布任务</button></div>
                    </div>
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
    }
    reader.readAsDataURL(file.files[0]);
    var fd = new FormData()
    fd.append('file', file.files[0])
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
        // xhr: function(){
        //     myXhr = $.ajaxSettings.xhr();
        //     if(myXhr.upload){
        //         myXhr.upload.addEventListener('progress',function(e) {
        //             if (e.lengthComputable) {
        //                 var percent = Math.floor(e.loaded/e.total*100);
        //                 if(percent <= 100) {
        //                     // $("#J_progress_bar").progress('set progress', percent);
        //                     $("#percentage").text('已上传：'+percent+'%');
        //                 }
        //                 if(percent >= 100) {
        //                     $("#percentage").text('文件上传完毕，请等待...');
        //                     // $("#percentage").addClass('success');
        //                 }
        //             }
        //         }, false);
        //     }
        //     return myXhr;
        // },
        success: function (res) {
            let url = res.data.url
            let selector = kind + ' .selected-image:last-child .img-value'
            $(selector).val(url)
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



</script>
@endsection
