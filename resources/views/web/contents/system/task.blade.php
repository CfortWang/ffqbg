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
                <form id="submit" action="/api/system/task" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                    <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-12">任务大厅设置</label>
                            <div class="col-lg-10 col-md-10 col-sm-12" id="task">
                                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 info" id="name">
                                    <div class="title">名称</div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4 info" id="price" style="padding: 0px;">
                                    <div class="title">单价（元）</div>
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
        url: '/api/system/task',
        type: 'get',
        dataType: 'json',
        success: function (res) {
            if (res.status == 200) {
                let resData = res.data
                let $name = '<input type="text" class="form-control full-width task-name" id="" name="name[]" placeholder="">'
                let $price = '<input type="number" class="form-control full-width task-price" id="" name="price[]" placeholder="">'
                let $id = '<input type="text" name="id[]" class="id" hidden>'
                for (let i = 0; i < resData.length; i++) {
                    $("#name").append($name)
                    $("#price").append($price)
                    $("#task").append($id)
                    $("input.task-name:eq("+i+")").val(resData[i].name)
                    $("input.task-price:eq("+i+")").val(resData[i].price)
                    $("input.id:eq("+i+")").val(resData[i].id)
                }
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
                    // window.location.href = window.location.href
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
