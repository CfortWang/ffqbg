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
                <strong>数据统计</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>数据统计</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12 form-horizontal">
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <span class="count_span">已成功提现手续费金额</span>
                                </div>
                                <div class="col-lg-4">
                                    <span class="count_span">已成功提现金额</span>
                                </div>
                                <div class="col-lg-4">
                                    <span class="count_span">待提现金额</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-horizontal">
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <span class="count_span">购买会员销量</span>
                                </div>
                                <div class="col-lg-4">
                                    <span class="count_span">购买中级会员销量</span>
                                </div>
                                <div class="col-lg-4">
                                    <span class="count_span">购买高级会员销量</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            以下数据不受时间影响
                        </div>
                        <div class="col-sm-12 form-horizontal">
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <span class="count_span">用户钱包总额</span>
                                </div>
                                <div class="col-lg-3">
                                    <span class="count_span">会员数量</span>
                                </div>
                                <div class="col-lg-3">
                                    <span class="count_span">中级会员数量</span>
                                </div>
                                <div class="col-lg-3">
                                    <span class="count_span">高级会员数量</span>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
