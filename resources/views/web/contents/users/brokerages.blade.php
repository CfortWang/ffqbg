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
                <strong>佣金管理</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>佣金管理</h5>
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
                                <input type="search" id="search_id" class="form-control input-md" placeholder="" aria-controls="">
                            </div>
                            <div class="filter-box">
                                <label>筛选 :</label>
                                <select class="form-control" id="fileter">
                                    <option value="">全部</option>
                                    <option value="0">最新返佣</option>
                                    <option value="1">最早返佣</option>
                                    <option value="2">最高返佣</option>
                                    <option value="3">最低返佣</option>
                                </select>
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm" id="search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                   <th class="text-center">返佣人信息</th>
                                   <th class="text-center">受佣人信息</th>
                                   <th class="text-center">返佣金额</th>
                                   <th class="text-center">详情</th>
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
            url: "{{ url('/api/user/brokerages')}}",
            data: function (d) {
                d.id = $("#search_id").val()
                d.fileter = $("#fileter").val()
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data: "",
                className:"text-center",
                render:function(data,type,row) {
                    if (row.from_user_level_id == 1) {
                        row.from_user_level_id = "会员"
                    } else if (row.from_user_level_id == 2) {
                        row.from_user_level_id = "中级会员"
                    } else if (row.from_user_level_id == 3) {
                        row.from_user_level_id = "高级会员"
                    } else {
                        row.from_user_level_id = "游客"
                    }
                    return row.from_user_name + '[' + row.from_user_id + ']<br/>' + row.from_phone_number + '<br/>' + row.from_user_level_id
                }
            },
            {
                data: "",
                className:"text-center",
                render:function(data,type,row) {
                    if (row.user_level_id == 1) {
                        row.user_level_id = "会员"
                    } else if (row.user_level_id == 2) {
                        row.user_level_id = "中级会员"
                    } else if (row.user_level_id == 3) {
                        row.user_level_id = "高级会员"
                    } else {
                        row.user_level_id = "游客"
                    }
                    return row.user_name + '[' + row.user_id + ']<br/>' + row.phone_number + '<br/>' + row.user_level_id
                }
            },
            {
                data: "",
                className:"text-center",
                render:function(data,type,row) {
                    return "￥" + row.amount
                }
            },
            {
                data:"",
                className:"text-center",
                render:function(data,type,row) {
                    return row.type + '<br/>' + row.remarks
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
});
</script>
@endsection
