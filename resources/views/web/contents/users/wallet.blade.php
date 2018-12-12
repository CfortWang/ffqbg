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
$(document).ready(function(){
    $('.user-list-table').DataTable({
        pageLength: 10,
        responsive: true,
        dom: 'f<"row"t>p',
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
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"name",
                className:"text-center",
                render:function(data,type,row) {
                    var details = row.name+'<br>'+row.phone_number;
                    return details;
                }
            },
            {
                data:"amount",
                className:"text-center",
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
                data:"ticket_cnt",
                className:"text-center",
                render:function(data,type,row) {
                    var details = row.remarks+'<br>'+row.type;
                    return details;
                }
            },
        ],
    });
});
</script>
@endsection
