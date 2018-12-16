@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>用户协议</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/system/parameter') }}">系统设置</a>
            </li>
            <li class="active">
                <strong>用户协议</strong>
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
                            <label class="col-lg-2 col-md-2 col-sm-3">用户协议</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="protocol" id="protocol" cols="" rows="" placeholder="支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">公司简介</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="introduction" id="introduction" cols="" rows="" placeholder="支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">系统帮助</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="help" id="help" cols="" rows="" placeholder="支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">领取规则</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="rule" id="rule" cols="" rows="" placeholder="支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg modify-btn">保存</button></div>
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

$(".modify-btn").on("click", function () {
    // let title = $("#banner_title").val()
    // let link = $("#link").val()
    // let showPlace = $("#show_place").val()
    // let desc = $("#desc").val()
    // if (title == '' || title == null) {
    //     toastr.error("轮播标题不能为空！")
    //     return false
    // }
    // if (desc == '' || desc == null) {
    //     toastr.error("轮播描述不能为空！")
    //     return false
    // }

    // $.ajax({
    //     type: "POST",
    //     dataType: 'JSON',
    //     url: $("#submit").attr('action'),
    //     data: $("#submit").serialize(),
    //     success: function(res) {
    //         if(res.status == 200){
    //             toastr.success("新建轮播成功")
    //             setTimeout(() => {
    //                 window.location.href = '/banner/list'
    //             }, 1500);
    //         } else {
    //             toastr.error(res.message);
    //         }
    //         console.log(status);
    //     },
    //     error: function (ex) {
    //         console.log(ex)
    //     }
    // });
})

</script>
@endsection
