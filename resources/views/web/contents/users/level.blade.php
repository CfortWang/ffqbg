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
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">上级会员<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">上级会员</a></li>
                                        <li><a href="#">下级会员</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm search-btn" data-toggle="" data-target="">查找</button>
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

$(document).ready(function(){
    drawList()
    function drawList() {
        $('.user-list-table').DataTable({
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
                url: "{{ url('/api/user/list')}}",
                // data: {

                // },
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
                        var details = '<p>' + row.phone_number + '</p>'+ '<p>' + row.name + '</p>';
                        return details;
                    }
                },
                {
                    data:"user_register_time",
                    className:"text-center",
                },
                {
                    data:"user_register_ip",
                    className:"text-center",
                },
                {
                    data:"user_level_id",
                    className:"text-center",
                },
                {
                    data:"total_amount",
                    className:"text-center",
                    render: function (data,type,row) {
                        return '<p>￥' + data + '</p><a href="/user/wallet?id="' + row.id + '>资金历史</a>'
                    }
                },
                {
                    data:null,
                    className:"text-center",
                    render:function(data,type,row) {
                        return '<div class="btn-group-vertical" role="group" aria-label="" data-id="' + row.id + '"><button type="button" class="btn btn-primary btn-sm edit-btn" data-toggle="modal" data-target="#editUser">编辑用户</button><button type="button" class="btn btn-info btn-sm level-btn" data-toggle="modal" data-target="#memberLevel">会员层级</button><button type="button" class="btn btn-danger btn-sm delete-btn" data-toggle="modal" data-target=".bs-example-modal-sm">删除用户</button></div>'
                    }
                },
            ],
            drawCallback: function () {
                appendSkipPage()
            }
        });
    }

    function appendSkipPage () {
        var table = $(".user-list-table").dataTable(); 
        var template =
            $("<li class='paginate_button active'>" +
                "   <div class='input-group' style='margin-left:3px;'>" +
                "       <span class='input-group-addon' style='padding:0px 8px;background-color:#fff;font-size: 12px;'>跳转页</span>" +
                "       <input type='text' class='form-control' style='text-align:center;padding: 8px 2px;height:30px;width:40px;' />" +
                "       <span class='input-group-addon active' style='padding:0px 8px;'><a href='javascript:void(0)'> Go </a></span>" +
                "   </div>" +
                "</li>");
    
        template.find("a").click(function () {
            var pn = template.find("input").val();
            if (pn > 0) {
                --pn;
            } else {
                pn = 0;
            }
            table.fnPageChange(pn);
        });
        $("ul.pagination").append(template)
    }

    $('.search-btn').on("click", function () {
        var userID = $("#search_id").val()
        var userLevel = $("choose_level").val()
        var startTime = $("start-date").val()
        var endTime = $("end-date").val()
        drawList()
    })

    $('.ibox-content').on("click", ".btn-group-vertical .edit-btn", function () {
        var id = $(this).parent().attr("data-id")
        $.ajax({
            url: '/user/' + id + '/detail',
            type: 'get',
            dataType: 'json',
            success: function (res) {
                console.log(res)
                $("#phone_number").val() = res.data.data.phone_number
                $("#nickname").val() = res.data.data.name
                $("#superior_id").val() = res.data.data.recommder_id
                // $("#phone_number").val() = res.data.data.phone_number
                $("#total_amount").val() = res.data.data.total_amount
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })
    $('.ibox-content').on("click", ".btn-group-vertical .level-btn", function () {
        var id = $(this).parent().attr("data-id")
        window.location.href = '/user/list/level?id=' + id
    })
    $('.ibox-content').on("click", ".btn-group-vertical .delete-btn", function () {
        var id = $(this).parent().attr("data-id")
        $("#sure-delete").attr("data-id", id)
    })

    $('#sure-delete').on("click", function () {
        var id = $(this).attr("data-id")
        $.ajax({
            url: '/user/delete',
            type: 'del',
            data: {
                id: id
            },
            dataType: 'json',
            success: function (res) {
                console.log(res)
                $('#systemTips').hide()
            },
            error: function (ex) {
                console.log(ex)
            }
        })
    })
});
</script>
@endsection
