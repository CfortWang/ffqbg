@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>用户列表</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">用户列表</a>
            </li>
            <li class="active">
                <strong>支付列表</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>支付列表</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                    <div id="" class="dataTables_filter no-margin" style="padding: 10px 0px;">
                            <div class="search-box">
                                <label>搜索 :</label>
                                <input type="search" id="search_id" class="form-control input-md" placeholder="用户ID" aria-controls="" style="max-width: 100px;">
                            </div>
                            <div class="interval-box">
                                <label>时间 :</label>
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
                                <select class="form-control" id="pay_status">
                                    <option value="">全部</option>
                                    <option value="PAIED">已支付</option>
                                    <option value="NOTPAY">未支付</option>
                                </select>
                            </div>
                            <div class="filter-box">
                                <label>支付方式 :</label>
                                <select class="form-control" id="pay_method">
                                    <option value="">全部</option>
                                    <option value="WEIXINPAY">微信</option>
                                    <option value="ALIPAY">支付宝</option>
                                </select>
                            </div>
                            <div class="filter-box">
                                <label>类型 :</label>
                                <select class="form-control" id="pay_type">
                                    <option value="">全部</option>
                                    <option value="MEMBER-BUY-VIP">购买会员</option>
                                    <option value="CREATE-TASK">发布广告</option>
                                </select>
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm" id="search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                   <th class="text-center">用户ID</th>
                                   <th class="text-center">用户昵称</th>
                                   <th class="text-center">支付方式</th>
                                   <th class="text-center">支付单号</th>
                                   <th class="text-center">支付状态</th>
                                   <th class="text-center">金额</th>
                                   <th class="text-center">下单时间/支付时间</th>
                                   <th class="text-center">支付备注</th>
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
            url: "{{ url('/api/user/pay')}}",
            data: function (d) {
                d.id = $("#search_id").val()
                d.start_at = $("#start-date").val()
                d.end_at = $("#end-date").val()
                d.status = $("#pay_status").val()
                d.pay_method = $("#pay_method").val()
                d.type = $("#pay_type").val()
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"user_id",
                className:"text-center",
            },
            {
                data:"name",
                className:"text-center",
                searchable: false,
                orderable: false
            },
            {
                data:"payment",
                className:"text-center",
                render: function (data, type, row) {
                    if (row.payment == "WEIXINPAY") {
                        return "微信"
                    } else {
                        return "支付宝"
                    }
                },
                searchable: false,
                orderable: false
            },
            {
                data:"order_id",
                className:"text-center",
                searchable: false,
                orderable: false
            },
            {
                data:"status",
                className:"text-center",
                render:function(data,type,row) {
                    var details;
                    if(row.status == 'PAIED'){
                        details = "<span class='label label-success'>已支付</span>";
                    }else{
                        details = "<span class='label label-danger'>未支付</span>";
                    }
                    return details;
                },
                searchable: false,
                orderable: false
            },
            {
                data:"amount",
                className:"text-center",
            },
            {
                data: null,
                className:"text-center",
                render: function (data, type, row) {
                    if (row.created_at == '' || row.created_at == null) {
                        row.created_at = "-"
                    }
                    if (row.updated_at == '' || row.updated_at == null) {
                        row.updated_at = "-"
                    }
                    return row.created_at + '<br/>' + row.updated_at
                },
                searchable: false,
                orderable: false
            },
            {
                data:"remarks",
                className:"text-center",
                searchable: false,
                orderable: false
            },
        ],
        drawCallback: function () {
            appendSkipPage()
        }
    });

    $('#search-btn').on("click", function () {
        table.ajax.reload()
    })

});
</script>
@endsection
