@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>参与信息</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/task/list') }}">任务管理</a>
            </li>
            <li>
                <a href="{{ url('/task/list') }}">任务列表</a>
            </li>
            <li class="active">
                <strong>参与信息</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>@lang('user/list.contents.title')</h5>
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
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                    <th class="text-center">任务ID</th>
                                   <th class="text-center">用户信息</th>
                                   <th class="text-center">参与时间</th>
                                   <!-- <th class="text-center">失败时间</th> -->
                                   <th class="text-center">完成时间</th>
                                   <th class="text-center">获得赏金</th>
                                   <th class="text-center">参与状态</th>
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
var id = args['id']
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
            url: "{{ url('/api/task/user')}}",
            data: function (d) {
                d.id = id,
                d.user_id = $("#search_id").val()
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"task_id",
                className:"text-center"
            },
            {
                data:"user_id",
                className:"text-center",
                render:function (data, type, row) {
                    return row.user_id + '<br/>' + row.name
                }
            },
            {
                data:"apply_time",
                className:"text-center"
            },
            {
                data:"complete_time",
                className:"text-center",
            },
            {
                data:"amount",
                className:"text-center",
            },
            {
                data:"status",
                className:"text-center",
                render:function (data, type, row) {
                    if (row.status == 1) {
                        row.status = "已完成"
                    } else {
                        row.status = "已申请"
                    }
                    return row.status
                }
            }
        ],
        drawCallback: function () {
            appendSkipPage()
        }
    });

    $('.search-btn').on("click", function () {
        table.ajax.reload()
    })
});
</script>
@endsection
