@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>用户限制</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/system/parameter') }}">系统设置</a>
            </li>
            <li class="active">
                <strong>用户限制</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>用户限制</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <div id="" class="dataTables_filter">
                            <div class="interval-box">
                                <label>时间范围 :</label>
                                <div>
                                    <div class="input-group date">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" id="start-date" name="start-date" readonly="">
                                    </div>
                                </div>
                                <div>
                                    <div class="input-group date">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" id="end-date" name="end-date" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="interval-box">
                                <label>钱包余额范围 :</label>
                                <input type="number" id="min_amount" class="form-control input-md" placeholder="" aria-controls="">
                                <input type="number" id="max_amount" class="form-control input-md" placeholder="" aria-controls="">
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm" id="search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                            <div class="limit-switch">
                                <label>限制 :</label>
                                <label for="limit_switch1" class="label-radio">
                                    <input type="radio"  hidden id="limit_switch1" name="limit_switch" value="0">
                                    <label for="limit_switch1" class="time-radio"></label>
                                    <span>开</span>
                                </label>
                                <label for="limit_switch2" class="label-radio">
                                    <input type="radio" checked hidden="" id="limit_switch2" name="limit_switch" value="1">
                                    <label for="limit_switch2" class="time-radio"></label>
                                    <span>关</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="info-box">
                        <span>符合条件的用户共有：</span>
                        <span class="filter-data"></span>
                        <span>人</span>
                        <div class="limit-info">
                            <span class="limit-desc">目前系统限制人数：</span>
                            <span class="limit-number"></span>
                            <button type="button" class="btn btn-success btn-sm" id="add-limit" data-toggle="modal" data-target="#addLimit">添加限制</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 添加限制 -->
    <div class="modal fade" id="addLimit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加限制</h4>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="user_number" class="control-label">不允许进入平台的最大人数:</label>
                    <input type="number" class="form-control" id="user_number" placeholder="">
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="sure-add">确定添加</button>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

$(document).ready(function(){

    function getData() {
        var minAmount = $("#min_amount").val()
        var maxAmount = $("#max_amount").val()
        var startDate = $("#start-date").val()
        var endDate = $("#end-date").val()
        $(".info-box").show()
        $.ajax({
            url: '/api/system/limit',
            type: 'get',
            data: {
                min: minAmount,
                max: maxAmount,
                start_at: startDate,
                end_at: endDate
            },
            dataType: 'json',
            success: function (res) {
                if (res.status == 200) {
                    // toastr.success(res.message)
                    $(".filter-data").text(res.data.count)
                    $("input[type=radio][name=limit_switch][value='"+res.data.is_login_limit_close+"']").attr("checked", 'checked')
                    if (res.data.limit) {
                        $(".limit-desc").text("目前系统限制人数：")
                        $("#add-limit").text("修改限制")
                        $(".limit-number").text(res.data.limit)
                    } else {
                        $(".limit-desc").text("目前系统没有设置限制")
                        $("#add-limit").text("添加限制")
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
    getData()

    $('#search-btn').on("click", function () {
        getData()
    })

    $('#sure-add').on("click", function () {
        var userNumber = $("#user_number").val()
        var minAmount = $("#min_amount").val()
        var maxAmount = $("#max_amount").val()
        var startDate = $("#start-date").val()
        var endDate = $("#end-date").val()
        $.ajax({
            url: '/api/system/addLimit',
            type: 'POST',
            data: {
                total: userNumber,
                min: minAmount,
                max: maxAmount,
                start_at: startDate,
                end_at: endDate
            },
            dataType: 'json',
            success: function (res) {
                $('#addLimit').modal('hide')
                if (res.status == 200) {
                    $("input[type=radio][name=limit_switch]").find("option[value = '"+res.is_login_limit_close+"']").attr("checked", true)
                    toastr.success(res.message)
                    $(".limit-desc").text("目前系统限制人数：")
                    $("#add-limit").text("修改限制")
                    $(".limit-number").text(userNumber)
                } else {
                    toastr.error(res.message)
                }
            },
            error: function (ex) {
                console.log(ex)
                toastr.error(ex.statusText)
            }
        })
    })

    $('input[type=radio][name=limit_switch]').change(function() {
        $.ajax({
            url: '/api/system/switchLoginLimit',
            type: 'POST',
            data: {
                is_login_limit_close: this.value
            },
            dataType: 'json',
            success: function (res) {
                if (res.status == 200) {
                    toastr.success(res.message)
                } else {
                    toastr.error(res.message)
                }
            },
            error: function (ex) {
                console.log(ex)
                toastr.error(ex.statusText)
            }
        })
    })

});
</script>
@endsection
