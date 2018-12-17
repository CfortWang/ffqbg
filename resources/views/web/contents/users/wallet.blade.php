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
                <strong>账户钱包历史</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>账户钱包历史</h5>
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
                            <div class="filter-box">
                                <label>类型 :</label>
                                <select class="form-control" id="cashout_type">
                                    <option value="">不限制</option>
                                    <option value="ADMIN">管理员操作</option>
                                    <option value="BUY-VIP-BROKERAGE">购买会员返佣</option>
                                    <option value="TASK-COMPLETE">任务</option>
                                </select>
                            </div>
                            <div class="filter-box">
                                <label>收支 :</label>
                                <select class="form-control" id="income_type">
                                    <option value="">不限制</option>
                                    <option value="in">收入</option>
                                    <option value="out">支出</option>
                                </select>
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm" id="search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                   <th class="text-center">会员信息</th>
                                   <!-- id 姓名 手机号 会员类型 -->
                                   <th class="text-center">金额/时间</th>
                                   <th class="text-center">资金变化</th>
                                   <th class="text-center">类型/备注</th>
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
var args = getArgs()
$("#search_id").val(args['id'])
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
        buttons: {
            buttons: [
                {
                    text: 'Alert'
                }
            ]
        },
        deferRender: true,
        processing:true,
        serverSide:true,
        ajax: {
            url: "{{ url('/api/user/wallet')}}",
            data: function (d) {
                d.id = $("#search_id").val()
                d.type = $("#cashout_type").val()
                d.inout = $("#income_type").val()
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
                    var details = row.name + '[' + row.id + ']' + '<br>' + row.phone_number + '<br/>' + userLevel
                    return details;
                }
            },
            {
                data:"amount",
                className:"text-center",
                render: function (data, type, row) {
                    return row.amount + '<br/>' + row.time
                }
            },
            {
                data:"p_amount",
                className:"text-center",
                render:function(data,type,row) {
                    var details = row.p_amount+'-->'+row.n_amount;
                    return details;
                }
            },
            {
                data: null,
                className:"text-center",
                render:function(data,type,row) {
                    var details = row.remarks+'<br>'+row.type;
                    return details;
                }
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
