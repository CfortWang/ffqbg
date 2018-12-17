@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>新闻 信息</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/news/list') }}">新闻管理</a>
            </li>
            <li class="active">
                <strong>新闻编辑</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                <form id="submit" action="/api/news/modify" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">新闻标题</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="news_title" name="title" placeholder="最多可输入20个字符" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">新闻内容</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="content" id="news_desc" cols="" rows="" placeholder="填写新闻内容，支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <input type="text" class="" id="news_id" hidden name="id" placeholder="">
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
var id = window.location.pathname.split("/")[2]
$("input#news_id").val(id)
var drawData = function () {
    $.ajax({
        url: '/api/news/detail',
        type: 'get',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (res) {
            if (res.status == 200) {
                let resData = res.data
                $("#news_title").val(resData.title)
                $("#news_desc").val(resData.content)
            } else {
                toastr.error(res.message)
            }
        },
        error: function (ex) {
            console.log(ex)
            toastr.error(ex.statusText)
        }
    })
}
drawData();

$(".modify-btn").on("click", function () {
    let news_title = $("#news_title").val()
    let news_desc = $("#news_desc").val()
    if (news_title == '' || news_title == null) {
        toastr.error("新闻标题标题不能为空！")
        return false
    }
    if (news_desc == '' || news_desc == null) {
        toastr.error("新闻详情不能为空！")
        return false
    }
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: $("#submit").attr('action'),
        data: $("#submit").serialize(),
        success: function(res) {
            if(res.status == 200){
                toastr.success("修改成功")
                setTimeout(() => {
                    window.location.href = '/news/list'
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
