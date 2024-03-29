@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>角色列表</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/admin/list') }}">管理员</a>
            </li>
            <li class="active">
                <strong>角色列表</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>管理员列表</h5>
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
                                   <th class="text-center">角色ID</th>
                                   <th class="text-center">角色昵称</th>
                                   <th class="text-center">创建时间</th>
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
            url: "{{ url('/api/admin/role')}}",
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
                data:"name",
                className:"text-center",
            },
            {
                data:"created_at",
                className:"text-center",
            },
            {
                data:null,
                className:"text-center",
                render: function (data, type, row) {
                    return '<div data-id="' + row.id + '"><button type="button" class="btn btn-danger btn-sm delete-btn" data-toggle="modal" data-target=".bs-example-modal-sm">删除</button></div>'
                }
            },
        ],
        drawCallback: function () {
            appendSkipPage()
        }
    });

    $('.ibox-content').on("click", ".delete-btn", function () {
        var id = $(this).parent().attr("data-id")
        $("#sure-delete").attr("data-id", id)
    })

    $('#sure-delete').on("click", function () {
        var id = $(this).attr("data-id")
        $.ajax({
            url: '/api/admin/role',
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
