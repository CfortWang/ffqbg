@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>用户管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">用户管理</a>
            </li>
            <li class="active">
                <strong>提现列表</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>提现列表</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <div id="" class="dataTables_filter">
                            <div class="search-box">
                                <label>搜索 :</label>
                                <input type="search" id="search_id" class="form-control input-md" placeholder="用户ID" aria-controls="">
                            </div>
                            <div class="interval-box">
                                <label>申请时间 :</label>
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
                            <div class="filter-box">
                                <label>状态 :</label>
                                <select class="form-control" id="cashout_status">
                                    <option value="">全部</option>
                                    <option value="0">申请中</option>
                                    <option value="3">已审核，待提现</option>
                                    <option value="1">提现成功</option>
                                    <option value="2">审核完毕</option>
                                </select>
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm" id="search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                   <th class="text-center">提现编号</th>
                                   <th class="text-center">会员资料</th>
                                   <th class="text-center">支付类型</th>
                                   <th class="text-center">钱包</th>
                                   <th class="text-center">提现账号</th>
                                   <!-- 支付宝姓名和账号 -->
                                   <th class="text-center">提现金额</th>
                                   <th class="text-center">提现状态</th>
                                   <th class="text-center">提现时间</th>
                                   <th class="text-center"></th>
                                   <!-- 申请时间 -->
                                   <!-- 审核时间 -->
                                   <!-- 到账时间 -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="operating" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">提现信息</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="cashout_id" class="control-label">提现编号：</label>
                            <input type="text" class="form-control" id="cashout_id">
                        </div>
                        <div class="form-group">
                            <label for="cashout_type" class="control-label">提现类型：</label>
                            <input type="text" class="form-control" id="cashout_type">
                        </div>
                        <div class="form-group">
                            <label for="cashout_type" class="control-label">提现方式：</label>
                            <input type="text" class="form-control" id="cashout_method">
                        </div>
                        <div class="form-group">
                            <label for="alipay_name" class="control-label">支付宝姓名：</label>
                            <input type="text" class="form-control" id="alipay_name">
                        </div>
                        <div class="form-group">
                            <label for="alipay_account" class="control-label">支付宝账号：</label>
                            <input type="text" class="form-control" id="alipay_account">
                        </div>
                        <div class="form-group">
                            <label for="cashout_amount" class="control-label">提现金额：</label>
                            <input type="text" class="form-control" id="cashout_amount">
                        </div>
                        <!-- <div class="form-group">
                            <label for="cashout_fee" class="control-label">提现手续费：</label>
                            <input type="text" class="form-control" id="cashout_fee">
                        </div>
                        <div class="form-group">
                            <label for="arrival_amount" class="control-label">到账金额：</label>
                            <input type="text" class="form-control" id="arrival_amount">
                        </div> -->
                        <div class="form-group">
                            <label for="cashout_status" class="control-label">提现状态：</label>
                            <input type="text" class="form-control" id="cashout_status">
                        </div>
                        <div class="form-group reason">
                            <label for="reason" class="control-label">审核失败原因：</label>
                            <input type="text" class="form-control" id="reason">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-info" data-type="confirm" id="pass-btn">通过申请</button>
                    <button type="button" class="btn btn-danger" data-type="refuse" id="refuse-btn">拒绝申请</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    var table = $('.user-list-table').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"row"t>p',
        order: [[ 0, "desc" ]],
        language: {
            "zeroRecords": "@lang('user/list.table.no_data')",
            "info": "_PAGE_ / _PAGES_ ",
            "search": "@lang('user/list.table.search') :",
            "paginate": {
                "next":       "@lang('user/list.table.pagination.next')",
                "previous":   "@lang('user/list.table.pagination.prev')"
            },
        },
        deferRender: true,
        processing:true,
        serverSide:true,
        ajax: {
            url: "{{ url('/api/user/cashout')}}",
            data: function (d) {
                d.id = $("#search_id").val()
                d.start_at = $("#start-date").val()
                d.end_at = $("#end-date").val()
                d.withdraw_status = $("#cashout_status").val()
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"id",
                className:"text-center",
            },
            {
                data:"phone_number",
                className:"text-center",
                render:function(data,type,row) {
                    var userLevel = ""
                    if (row.user_level_id == 1) {
                        userLevel = "会员"
                    } else if (row.user_level_id == 2) {
                        userLevel = "中级会员"
                    } else if (row.user_level_id == 3) {
                        userLevel = "高级会员"
                    } else {
                        userLevel = "游客"
                    }
                    if (row.phone_number == "" || row.phone_number == null) {
                        row.phone_number = "-"
                    }
                    var details = row.name + '[' + row.user_id + ']' + '<br>' + row.phone_number + '<br/>' + userLevel
                    return details;
                }
            },
            {
                data:"withdraw_type",
                className:"text-center",
                render: function (data, type, row) {
                    if (row.withdraw_type == 'ALIPAY') {
                        row.withdraw_type = "支付宝"
                    }
                    return row.withdraw_type
                }
            },
            {
                data:"withdraw_wallet",
                className:"text-center",
                render: function (data, type, row) {
                    if (row.withdraw_wallet == 'AMOUNT') {
                        row.withdraw_wallet = "账户钱包"
                    }
                    return row.withdraw_wallet
                }
            },
            {
                data:"withdraw_alipay_account",
                className:"text-center",
                render: function (data, type, row) {
                    return "真实姓名:" + row.withdraw_alipay_realname + "<br/>支付宝账号:" + row.withdraw_alipay_account
                }
            },
            {
                data:"withdraw_amount",
                className:"text-center",
            },
            {
                data:"withdraw_status",
                className:"text-center",
                render:function(data,type,row) {
                    var details;
                    if (row.withdraw_status == 0) {
                        details = "<span class='label label-primary'>已申请</span>";
                    } else if (row.withdraw_status == 1) {
                        details = "<span class='label label-success'>已提现</span>";
                    } else if (row.withdraw_status == 2) {
                        details = "<span class='label label-danger'>已拒绝</span>";
                    } else {
                        details = "<span class='label label-info'>待提现</span>";
                    }
                    return details;
                }
            },
            {
                data:"withdraw_apply_time",
                className:"text-center",
                render:function(data,type,row) {
                    if (row.withdraw_confirm_time == "" || row.withdraw_confirm_time == null) {
                        row.withdraw_confirm_time = "-"
                    }
                    if (row.withdraw_complete_time == "" || row.withdraw_complete_time == null) {
                        row.withdraw_complete_time = "-"
                    }
                    return '申请：' + row.withdraw_apply_time + '<br/>审核：' + row.withdraw_confirm_time + '<br/>提现：' + row.withdraw_complete_time
                }
            },
            {
                data: null,
                className: "text-center",
                render: function (data, type, row) {
                    return '<button type="button" data-id="' + row.id + '" data-info="'+row.name+'['+row.user_id+']'+'" data-status="'+row.withdraw_status+'" data-type="'+row.withdraw_wallet+'" data-method="'+row.withdraw_type+'" data-reason="'+row.withdraw_reason+'" data-amount="'+row.withdraw_amount+'" data-name="'+row.withdraw_alipay_realname+'" data-account="'+row.withdraw_alipay_account+'" class="btn btn-primary btn-sm edit-btn" data-toggle="modal" data-target="#operating">操作</button>'
                }
            }
        ],
        drawCallback: function () {
            appendSkipPage()
        }
    });

    $('#search-btn').on("click", function () {
        table.ajax.reload()
    })

    $('.ibox-content').on("click", ".edit-btn", function () {
        var data = $(this)
        $(".modal-footer").attr("data-id", data.attr("data-id"))
        $("#myModalLabel").text("会员" + data.attr("data-info") + "的提现信息")
        $("#cashout_id").val(data.attr("data-id"))
        $("#alipay_name").val(data.attr("data-name"))
        $("#alipay_account").val(data.attr("data-account"))
        $("#cashout_amount").val(data.attr("data-amount"))
        $("#cashout_type").val(data.attr("data-type"))
        $("#cashout_method").val(data.attr("data-method"))
        var cashoutStatus = data.attr("data-status")
        if (cashoutStatus == 0) {
            $("#pass-btn").show()
            $("#refuse-btn").show()
            $("#reason").val("")
            $(".reason").show()
            $("#reason").attr("disabled", false)
        } else if (cashoutStatus == 2) {
            $("#pass-btn").hide()
            $("#refuse-btn").hide()
            $(".reason").show()
            $("#reason").val(data.attr("data-reason"))
        } else {
            $("#pass-btn").hide()
            $("#refuse-btn").hide()
            $(".reason").hide()
        }

        $("#cashout_status").val("1")

    })

    $(".pass-btn, .refuse-btn").on("click", function () {
        var type = $(this).attr("data-type")
        var reason = $("#reason").val()
        var id = $(this).parent().attr("data-id")
        
        $.ajax({
            url: '/api/user/deal',
            type: 'post',
            data: {
                id: id,
                type: type,
                reason: reason
            },
            dataType: 'json',
            success: function (res) {
                toastr.success(res.message)
                $('#systemTips').modal('hide')
                table.ajax.reload()
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })

    $("#operating input").attr("disabled", true)

});
</script>
@endsection
