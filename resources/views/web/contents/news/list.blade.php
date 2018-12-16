@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>新闻管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">新闻管理</a>
            </li>
            <li class="active">
                <strong>新闻列表</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>新闻列表</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <!-- <div id="" class="dataTables_filter">
                            <div class="search-box">
                                <label>搜索 :</label>
                                <input type="search" id="search_id" class="form-control input-md" placeholder="" aria-controls="">
                            </div>
                            <div class="filter-box">
                                <label>状态 :</label>
                                <select class="form-control" id="choose_level">
                                    <option value="">全部</option>
                                    <option value="0">已显示</option>
                                    <option value="1">已隐藏</option>
                                </select>
                            </div>
                            <div class="search-btn">
                                <button type="button" class="btn btn-primary btn-sm search-btn" data-toggle="" data-target="">查找</button>
                            </div>
                        </div> -->
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                   <th class="text-center">ID</th>
                                   <th class="text-center">标题</th>
                                   <th class="text-center">时间</th>
                                   <th class="text-center">操作</th>
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
            url: "{{ url('/api/news/list')}}",
            data: function (d) {
                d.id = $("#search_id").val()
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
                data:"title",
                className:"text-center overflow big-td"
            },
            {
                data:"created_at",
                className:"text-center",
            },
            {
                data:null,
                className:"text-center",
                render:function(data,type,row) {
                    return '<div data-id="' + row.id + '"><button type="button" class="btn btn-primary btn-sm edit-btn" style="margin-right: 10px;" data-toggle="modal" data-target="#editNews">编辑</button><button type="button" class="btn btn-danger btn-sm delete-btn" data-toggle="modal" data-target=".bs-example-modal-sm">删除</button></div>'
                },
                searchable: false,
                orderable: false
            },
        ],
        drawCallback: function () {
            appendSkipPage()
        }
    });

    $('.search-btn').on("click", function () {
        table.ajax.reload()
    })

    $('.ibox-content').on("click", ".edit-btn", function () {
        var id = $(this).parent().attr("data-id")
        window.location.href = '/news/' + id + '/detail'
    })

    $('.ibox-content').on("click", ".delete-btn", function () {
        var id = $(this).parent().attr("data-id")
        $("#sure-delete").attr("data-id", id)
    })

    $('#sure-delete').on("click", function () {
        var id = $(this).attr("data-id")
        $.ajax({
            url: '/api/news',
            type: 'delete',
            data: {
                id: id
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
});
</script>
@endsection
