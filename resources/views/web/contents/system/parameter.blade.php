@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>参数设置</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/system/list') }}">系统设置</a>
            </li>
            <li class="active">
                <strong>参数设置</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                <form id="submit" action="/api/system/modify" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-group clear-fix reward">
                            <label class="col-lg-2 col-md-2 col-sm-12">推广奖励</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
                                    <div class="title">会员等级</div>
                                    <input type="text" class="form-control full-width" id="user_level1" name="" value="会员" disabled>
                                    <input type="text" class="form-control full-width" id="user_level2" name="" value="中级会员" disabled>
                                    <input type="text" class="form-control full-width" id="user_level3" name="" value="高级会员" disabled>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
                                    <div class="title">推广人数（人）</div>
                                    <input type="number" class="form-control full-width" id="limit_1_number" name="limit_1_number" placeholder="">
                                    <input type="number" class="form-control full-width" id="limit_2_number" name="limit_2_number" placeholder="">
                                    <input type="number" class="form-control full-width" id="limit_3_number" name="limit_3_number" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
                                    <div class="title">奖励金额（元）</div>
                                    <input type="number" class="form-control full-width" id="limit_1_return" name="limit_1_return" placeholder="">
                                    <input type="number" class="form-control full-width" id="limit_2_return" name="limit_2_return" placeholder="">
                                    <input type="number" class="form-control full-width" id="limit_3_return" name="limit_3_return" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">完成任务返佣</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">1级（百分比）</div>
                                    <input type="number" class="form-control full-width" id="finish_1_return" name="finish_1_return" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">2级（百分比）</div>
                                    <input type="number" class="form-control full-width" id="finish_2_return" name="finish_2_return" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">3级（百分比）</div>
                                    <input type="number" class="form-control full-width" id="finish_3_return" name="finish_3_return" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">推广会员返佣</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">1级（百分比）</div>
                                    <input type="number" class="form-control full-width" id="register_1_return" name="register_1_return" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">2级（百分比）</div>
                                    <input type="number" class="form-control full-width" id="register_2_return" name="register_2_return" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">3级（百分比）</div>
                                    <input type="number" class="form-control full-width" id="register_3_return" name="register_3_return" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-12">账户钱包提现</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">最高（元）</div>
                                    <input type="number" class="form-control full-width" id="cashout_max" name="cashout_max" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">最低（元）</div>
                                    <input type="number" class="form-control full-width" id="cashout_min" name="cashout_min" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="title">手续费（百分比）</div>
                                    <input type="number" class="form-control full-width" id="cashout_fee" name="cashout_fee" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-12">限制操作金额</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <input type="number" class="form-control" id="task_title" name="title" placeholder="" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">新用户赠送金额</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="number" class="form-control" id="register_award" name="register_award" placeholder="">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">首次发布任务返回</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="number" class="form-control" id="first_publish_award" name="first_publish_award" placeholder="">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">推广奖励开关</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 reward-switch">
                                <label for="reward_switch1" class="label-radio">
                                    <input type="radio" checked hidden id="reward_switch1" name="is_limit_close" value="1">
                                    <label for="reward_switch1" class="time-radio"></label>
                                    <span>开</span>
                                </label>
                                <label for="reward_switch2" class="label-radio">
                                    <input type="radio" hidden id="reward_switch2" name="is_limit_close" value="0">
                                    <label for="reward_switch2" class="time-radio"></label>
                                    <span>关</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">提现开关</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 cashout-switch">
                                <label for="cashout_switch1" class="label-radio">
                                    <input type="radio" checked hidden id="cashout_switch1" name="is_callout_close" value="1">
                                    <label for="cashout_switch1" class="time-radio"></label>
                                    <span>开</span>
                                </label>
                                <label for="cashout_switch2" class="label-radio">
                                    <input type="radio" hidden id="cashout_switch2" name="is_callout_close" value="0">
                                    <label for="cashout_switch2" class="time-radio"></label>
                                    <span>关</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">新闻公告开关</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 news-switch">
                                <label for="news_switch1" class="label-radio">
                                    <input type="radio" checked hidden id="news_switch1" name="is_model_close" value="1">
                                    <label for="news_switch1" class="time-radio"></label>
                                    <span>开</span>
                                </label>
                                <label for="news_switch2" class="label-radio">
                                    <input type="radio" hidden="" id="news_switch2" name="is_model_close" value="0">
                                    <label for="news_switch2" class="time-radio"></label>
                                    <span>关</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group clear-fix news">
                            <label class="col-lg-2 col-md-2 col-sm-3">新闻公告</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="model_text" id="model_text" cols="" rows="" placeholder="支持换行（不超过300字符）" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg modify-btn">保存修改</button></div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

var drawData = function () {
    $.ajax({
        url: '/api/system/system',
        type: 'get',
        dataType: 'json',
        success: function (res) {
            let resData = res.data
            console.log(resData)
            $("input#limit_1_number").val(resData.limit_1_number)
            $("input#limit_2_number").val(resData.limit_2_number)
            $("input#limit_3_number").val(resData.limit_3_number)
            
            $("input#limit_1_return").val(resData.limit_1_return)
            $("input#limit_2_return").val(resData.limit_2_return)
            $("input#limit_3_return").val(resData.limit_3_return)

            $("input#cashout_max").val(resData.cashout_max)
            $("input#cashout_min").val(resData.cashout_min)
            $("input#cashout_fee").val(resData.cashout_rate)

            $("input#finish_1_return").val(resData.finish_1_return)
            $("input#finish_2_return").val(resData.finish_2_return)
            $("input#finish_3_return").val(resData.finish_3_return)

            $("input#register_1_return").val(resData.register_1_return)
            $("input#register_2_return").val(resData.register_2_return)
            $("input#register_3_return").val(resData.register_3_return)

            $("input#register_award").val(resData.register_award)
            $("input#first_publish_award").val(resData.first_publish_award)

            if (resData.is_callout_close) {
                $("input[type=radio][name=is_callout_close]:eq(0)").attr("checked", 'checked')
            } else {
                $("input[type=radio][name=is_callout_close]:eq(1)").attr("checked", 'checked')
            }

            if (resData.is_limit_close) {
                $("input[type=radio][name=is_limit_close]:eq(0)").attr("checked", 'checked')
                $(".reward").show()
            } else {
                $("input[type=radio][name=is_limit_close]:eq(1)").attr("checked", 'checked')
                $(".reward").hide()
            }

            if (resData.is_model_close) {
                $("input[type=radio][name=is_model_close]:eq(0)").attr("checked", 'checked')
                $(".news").show()
            } else {
                $("input[type=radio][name=is_model_close]:eq(1)").attr("checked", 'checked')
                $(".news").hide()
            }
        },
        error: function (ex) {
            console.log(ex)
        }
    })
}
drawData();

$('input[type=radio][name=is_limit_close]').change(function() {
    if (this.value == 0) {
        $(".reward").hide()
    } else if (this.value == 1) {
        $(".reward").show()
    }
})
$('input[type=radio][name=is_model_close]').change(function() {
    if (this.value == 0) {
        $(".news").hide()
    } else if (this.value == 1) {
        $(".news").show()
    }
})

$(".modify-btn").on("click", function () {
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: $("#submit").attr('action'),
        data: $("#submit").serialize(),
        success: function(data, status, x) {
            if(data.status == 200){
                toastr.success("修改成功")
                setTimeout(() => {
                    window.location.href = '/task/list'
                }, 1500);
            } else {
                toastr.error(data.message);
            }
            console.log(status);
        }
    });
})

</script>
@endsection
