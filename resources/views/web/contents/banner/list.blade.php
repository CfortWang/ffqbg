@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>广告管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">广告管理</a>
            </li>
            <li class="active">
                <strong>轮播图</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>轮播图</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover user-list-table" >
                            <thead>
                                <tr>
                                   <th class="text-center">ID</th>
                                   <th class="text-center">缩略图</th>
                                   <th class="text-center">文字提示</th>
                                   <th class="text-center">链接</th>
                                   <th class="text-center">显示位置</th>
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
            url: "{{ url('/api/banner/list')}}",
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
                data:"image",
                className:"text-center img-td",
                render:function(data,type,row) {
                    return '<div><img src="' + row.image + '" /></div>';
                },
                searchable: false,
                orderable: false
            },
            {
                data:"name",
                className:"text-center",
                searchable: false,
                orderable: false
            },
            {
                data:"link",
                className:"text-center",
                searchable: false,
                orderable: false
            },
            {
                data:"advertisement_position_id",
                className:"text-center",
                render: function (data, type, row) {
                    if (row.advertisement_position_id == 1) {
                        var place = "主页"
                    } else if (row.advertisement_position_id == 2) {
                        var place = "商城"
                    }
                    return place
                },
                searchable: false,
                orderable: false
            },
            {
                data: null,
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

    $('.ibox-content').on("click", ".edit-btn", function () {
        var id = $(this).parent().attr("data-id")
        window.location.href = '/banner/' + id + '/detail'
    })

    $('.ibox-content').on("click", ".delete-btn", function () {
        var id = $(this).parent().attr("data-id")
        $("#sure-delete").attr("data-id", id)
    })

    $('#sure-delete').on("click", function () {
        var id = $(this).attr("data-id")
        $.ajax({
            url: '/api/banner',
            type: 'delete',
            data: {
                id: id
            },
            dataType: 'json',
            success: function (res) {
                $('#systemTips').modal('hide')
                if (res.status == 200) {
                    toastr.success(res.message)
                    table.ajax.reload()
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
