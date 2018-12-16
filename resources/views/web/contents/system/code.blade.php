@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>主页</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/system/basis') }}">系统设置</a>
            </li>
            <li class="active">
                <strong>验证码列表</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>验证码列表</h5>
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
                                <input type="search" id="search_id" class="form-control input-md" placeholder="手机号码" aria-controls="">
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm" id="search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                   <th class="text-center">手机号</th>
                                   <th class="text-center">类型</th>
                                   <th class="text-center">验证码</th>
                                   <th class="text-center">时间</th>
                                   <!-- <th class="text-center">过期时间</th>
                                   <th class="text-center">IP</th> -->
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
            url: "{{ url('/api/system/code')}}",
            data: function (d) {
                d.phone = $("#search_id").val()
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"phone_number",
                className:"text-center",
            },
            {
                data:"msg_type",
                className:"text-center",
                render:function(data,type,row) {
                    if (row.msg_type == "register") {
                        return "注册"
                    } else if (row.msg_type == "reset_password") {
                        return "找回密码"
                    }
                }
            },
            {
                data:"code",
                className:"text-center",
            },
            {
                data:"created_at",
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
});
</script>
@endsection
