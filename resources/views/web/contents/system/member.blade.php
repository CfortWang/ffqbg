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
                <form id="submit" action="/api/system/user" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">会员名称及价格</label>
                            <div class="col-lg-10 col-md-10 col-sm-12" id="member">
                                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 info" id="level">
                                    <div class="title">会员名称</div>
                                    <!-- <input type="text" class="form-control full-width user_level" id="user_level1" name="level[]" placeholder="">
                                    <input type="text" class="form-control full-width user_level" id="user_level2" name="level[]" placeholder="">
                                    <input type="text" class="form-control full-width user_level" id="user_level3" name="level[]" placeholder=""> -->
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4 info" id="price" style="padding: 0px;">
                                    <div class="title">价格（元）</div>
                                    <!-- <input type="number" class="form-control full-width user_price" id="user_level1_price" name="price[]" placeholder="">
                                    <input type="number" class="form-control full-width user_price" id="user_level2_price" name="price[]" placeholder="">
                                    <input type="number" class="form-control full-width user_price" id="user_level3_price" name="price[]" placeholder=""> -->
                                </div>
                                
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
            if (res.status == 200) {
                let resData = res.data
                let $level = '<input type="text" class="form-control full-width user_level" id="" name="level[]" placeholder="">'
                let $price = '<input type="number" class="form-control full-width user_price" id="" name="price[]" placeholder="">'
                let $id = '<input type="text" name="id[]" class="id" hidden>'
                for (let i = 0; i < resData.length; i++) {
                    $("#level").append($level)
                    $("#price").append($price)
                    $("#member").append($id)
                    $("input.user_level:eq("+i+")").val(resData[i].name)
                    $("input.user_price:eq("+i+")").val(resData[i].price)
                    $("input.id:eq("+i+")").val(resData[i].id)
                }
                $("input.user_level:eq(0)").hide()
                $("input.user_price:eq(0)").hide()
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
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: $("#submit").attr('action'),
        data: $("#submit").serialize(),
        success: function(res) {
            if(res.status == 200){
                toastr.success("修改成功")
                setTimeout(() => {
                    window.location.href = window.location.href
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

</script>
@endsection
