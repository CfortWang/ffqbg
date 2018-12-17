@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>会员层级</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">@lang('user/list.header.depth2')</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">@lang('user/list.header.depth3')</a>
            </li>
            <li class="active">
                <strong>@lang('user/list.header.depth4')</strong>
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
                            <div class="form-group">
                                <div class="input-group-btn">
                                    <button type="button" id="level_btn" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">上级会员<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a data-type="to">上级会员</a></li>
                                        <li><a data-type="from">下级会员</a></li>
                                    </ul>
                                </div>
                                <input type="text" id="level_type" value="to" hidden>
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm" id="search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                    <th class="text-center">用户ID</th>
                                    <th class="text-center">用户资料</th>
                                    <th class="text-center">注册时间</th>
                                    <th class="text-center">注册IP</th>
                                    <th class="text-center">关系层级</th>
                                    <th class="text-center">绑定时间</th>
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
$(".ibox-title h5").text("会员" + id + "的层级关系")
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
            url: "{{ url('/api/user/levelList')}}",
            data: function (d) {
                d.id = id
                d.from_uid = $("#search_id").val()
                d.type = $("#level_type").val()
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data: "uid",
                className:"text-center",
                render: function (data, type, row) {
                    var level_type = $("#level_type").val()
                    if (level_type == 'from') {
                        return row.uid
                    } else {
                        return row.from_uid
                    }
                }
            },
            {
                data:"user.phone_number",
                className:"text-center",
                render: function (data, type, row) {
                    let userLevel = ""
                    if (row.user.user_level_id == 3) {
                        userLevel = "高级会员"
                    } else if (row.user.user_level_id == 2) {
                        userLevel = "中级会员"
                    } else if (row.user.user_level_id == 1) {
                        userLevel = "会员"
                    } else {
                        userLevel = "游客"
                    }
                    if (row.user.phone_number == '' || row.user.phone_number == null) {
                        row.user.phone_number = '-'
                    }
                    return row.user.name + '<br/>' + row.user.phone_number + '<br/>' + userLevel
                },
                searchable: false,
                orderable: false
            },
            {
                data:"user.user_register_time",
                className:"text-center",
            },
            {
                data:"user.user_register_ip",
                className:"text-center",
                searchable: false,
                orderable: false
            },
            {
                data:"layer",
                className:"text-center",
                render: function (data, type, row) {
                    return "第" + data + "级"
                }
            },
            {
                data:"time",
                className:"text-center",
            }
        ],
        drawCallback: function () {
            appendSkipPage()
        }
    });

    $('#search-btn').on("click", function () {
        table.ajax.reload()
    })

    $(".dropdown-menu a").on("click", function () {
        $("#level_btn").text($(this).text())
        $("#level_type").val($(this).attr("data-type"))
        table.ajax.reload()
    })
});
</script>
@endsection
