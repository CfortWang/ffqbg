@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>会员设置</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/system/list') }}">系统设置</a>
            </li>
            <li class="active">
                <strong>会员设置</strong>
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
                            <label class="col-lg-2 col-md-2 col-sm-3">会员名称及价格</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 info">
                                    <div class="title">会员名称</div>
                                    <input type="text" class="" id="user_level0" name="level[]" hidden>
                                    <input type="text" class="form-control full-width" id="user_level1" name="level[]" placeholder="一级会员名称">
                                    <input type="text" class="form-control full-width" id="user_level2" name="level[]" placeholder="二级会员名称">
                                    <input type="text" class="form-control full-width" id="user_level3" name="level[]" placeholder="三级会员名称">
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4 info" style="padding: 0px;">
                                    <div class="title">价格（元）</div>
                                    <input type="number" class="" id="user_level0_price" name="price[]" hidden>
                                    <input type="number" class="form-control full-width" id="user_level1_price" name="price[]" placeholder="">
                                    <input type="number" class="form-control full-width" id="user_level2_price" name="price[]" placeholder="">
                                    <input type="number" class="form-control full-width" id="user_level3_price" name="price[]" placeholder="">
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
        url: '/api/system/user',
        type: 'get',
        dataType: 'json',
        success: function (res) {
            let resData = res.data
            $("input#id0").val(resData[0].id)
            $("input#id1").val(resData[1].id)
            $("input#id2").val(resData[2].id)
            $("input#id3").val(resData[3].id)
            $("input#user_level0").val(resData[0].name)
            $("input#user_level1").val(resData[1].name)
            $("input#user_level2").val(resData[2].name)
            $("input#user_level3").val(resData[3].name)
            $("input#user_level0_price").val(resData[0].price)
            $("input#user_level1_price").val(resData[1].price)
            $("input#user_level2_price").val(resData[2].price)
            $("input#user_level3_price").val(resData[3].price)
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
