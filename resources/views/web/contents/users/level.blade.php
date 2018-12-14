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
            url: "{{ url('/api/user/levelList')}}",
            data: function (d) {
                d.id = id
                d.type = "from"
            },
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"uid",
                className:"text-center",
            },
            {
                data:"uid",
                className:"text-center",
            },
            {
                data:"time",
                className:"text-center",
            },
            {
                data:"time",
                className:"text-center",
            },
            {
                data:"layer",
                className:"text-center",
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

    $('.search-btn').on("click", function () {
        table.ajax.reload()
    })
});
</script>
@endsection
