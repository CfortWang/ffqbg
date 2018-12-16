@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>任务设置</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/system/list') }}">系统设置</a>
            </li>
            <li class="active">
                <strong>任务设置</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                <form id="submit" action="/api/system/modify" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                    <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-12">任务大厅设置</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 info">
                                    <div class="title">名称</div>
                                    <input type="text" class="form-control full-width" id="taskhall0_name" name="name[]" placeholder="">
                                    <input type="text" class="form-control full-width" id="taskhall1_name" name="name[]" placeholder="">
                                    <input type="text" class="form-control full-width" id="taskhall2_name" name="name[]" placeholder="">
                                    <input type="text" class="form-control full-width" id="taskhall3_name" name="name[]" placeholder="">
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4 info" style="padding: 0px;">
                                    <div class="title">单价（元）</div>
                                    <input type="number" class="form-control full-width" id="taskhall0_price" name="price[]" placeholder="">
                                    <input type="number" class="form-control full-width" id="taskhall1_price" name="price[]" placeholder="">
                                    <input type="number" class="form-control full-width" id="taskhall2_price" name="price[]" placeholder="">
                                    <input type="number" class="form-control full-width" id="taskhall3_price" name="price[]" placeholder="">
                                </div>
                                <input type="text" name="id[]" id="id0" hidden>
                                <input type="text" name="id[]" id="id1" hidden>
                                <input type="text" name="id[]" id="id2" hidden>
                                <input type="text" name="id[]" id="id3" hidden>
                            </div>
                        </div>
                        
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

var drawData = function () {
    $.ajax({
        url: '/api/system/task',
        type: 'get',
        dataType: 'json',
        success: function (res) {
            let resData = res.data
            $("input#id0").val(resData[0].id)
            $("input#id1").val(resData[1].id)
            $("input#id2").val(resData[2].id)
            $("input#id3").val(resData[3].id)
            $("input#taskhall0_name").val(resData[0].name)
            $("input#taskhall1_name").val(resData[1].name)
            $("input#taskhall2_name").val(resData[2].name)
            $("input#taskhall3_name").val(resData[3].name)
            $("input#taskhall0_price").val(resData[0].price)
            $("input#taskhall1_price").val(resData[1].price)
            $("input#taskhall2_price").val(resData[2].price)
            $("input#taskhall3_price").val(resData[3].price)
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
                    window.location.href = window.location.href
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
