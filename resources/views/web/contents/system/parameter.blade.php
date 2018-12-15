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
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-12">推广满十人奖励</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">会员</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">中级</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">高级</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">完成任务返佣</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">1级</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">2级</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">3级</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">推广会员返佣</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">1级</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">2级</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">3级</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-12">账户钱包提现</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">最高</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">最低</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="col-lg-4 col-md-5 col-sm-4 data-title">手续费</div>
                                    <div class="col-lg-8 col-md-7 col-sm-8">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
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
                                <input type="number" class="form-control" id="task_limit" name="amount" placeholder="">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">首次发布任务返回</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="number" class="form-control" id="task_limit" name="amount" placeholder="">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">关注提示语</label>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="task_limit" name="amount" placeholder="">
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-12">大厅名称</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div>
                                    <div class="col-lg-5 col-md-6 col-sm-12" style="padding: 0px">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="col-lg-4 col-md-5 col-sm-4 data-title">单价</div>
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-lg-5 col-md-6 col-sm-12" style="padding: 0px">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="col-lg-4 col-md-5 col-sm-4 data-title">单价</div>
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-lg-5 col-md-6 col-sm-12" style="padding: 0px">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="col-lg-4 col-md-5 col-sm-4 data-title">单价</div>
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">会员名称及价格</label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div>
                                    <div class="col-lg-5 col-md-6 col-sm-12" style="padding: 0px">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="一级会员名称">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="col-lg-4 col-md-5 col-sm-4 data-title">价格</div>
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-lg-5 col-md-6 col-sm-12" style="padding: 0px">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="二级会员名称">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="col-lg-4 col-md-5 col-sm-4 data-title">价格</div>
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-lg-5 col-md-6 col-sm-12" style="padding: 0px">
                                        <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="三级会员名称">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="col-lg-4 col-md-5 col-sm-4 data-title">价格</div>
                                        <div class="col-lg-8 col-md-7 col-sm-8">
                                            <input type="number" class="form-control full-width" id="task_title" name="title" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">提现开关</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 cashout-switch">
                                <label for="cashout_switch1" class="label-radio">
                                    <input type="radio" checked="" hidden="" id="cashout_switch1" name="continued_time" value="1">
                                    <label for="cashout_switch1" class="time-radio"></label>
                                    <span>开</span>
                                </label>
                                <label for="cashout_switch2" class="label-radio">
                                    <input type="radio" hidden="" id="cashout_switch2" name="continued_time" value="0">
                                    <label for="cashout_switch2" class="time-radio"></label>
                                    <span>关</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">新闻公告开关</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 news-switch">
                                <label for="news_switch1" class="label-radio">
                                    <input type="radio" checked="" hidden="" id="news_switch1" name="continued_time" value="1">
                                    <label for="news_switch1" class="time-radio"></label>
                                    <span>开</span>
                                </label>
                                <label for="news_switch2" class="label-radio">
                                    <input type="radio" hidden="" id="news_switch2" name="continued_time" value="0">
                                    <label for="news_switch2" class="time-radio"></label>
                                    <span>关</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <label class="col-lg-2 col-md-2 col-sm-3">新闻公告</label>
                            <div class="col-lg-10 col-md-10 col-sm-9 rule-box">
                                <textarea class="rule-text" name="content" id="task_desc" cols="" rows="" placeholder="支持换行（不超过300字符）" maxlength="300"></textarea>
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

function selectImage(file, selector) {
    if (!file.files || !file.files[0]) {
        return;
    }
    var reader = new FileReader();
    reader.onload = function (evt) {
        var $imgBox = '<div class="selected-image"><div class="delete-image"><img class="image" src="/img/close.png" alt=""></div><img class="image" alt="" src="' +evt.target.result + '"><input class="img-value" type="text" name="image[]" hidden></div>'
        $(selector).append($imgBox)
        image = evt.target.result;
        let remark = selector + ' .image-remark'
        $(remark).hide()
    }
    reader.readAsDataURL(file.files[0]);
    var fd = new FormData()
    fd.append('file', file.files[0])
    upLoadImage(fd, selector);
}

function upLoadImage (file, kind) {
    $.ajax({
        url: '/api/upload',
        type: 'post',
        dataType: 'json',
        data: file,
        processData: false,
        contentType: false,
        success: function (res) {
            let url = res.data.url
            let selector = kind + ' .selected-image:last-child .img-value'
            $(selector).val(url)
        },
        error: function (ex) {
            console.log(ex)
        }
    })
}

$(".task").on("click", ".selected-image .delete-image", function () {
    $(this).parent().remove()
    var sonNum = $(".task").children().length
    if (sonNum == 2) {
        $(".task .image-remark").show()
    }
})
var args = getArgs()
$("input#task_id").val(args['id'])
var drawData = function () {
    $.ajax({
        url: '/api/task/detail',
        type: 'get',
        data: {
            id: args['id']
        },
        dataType: 'json',
        success: function (res) {
            let resData = res.data
            console.log(resData)
            $("input#task_title").val(resData.title)
            $("input#task_price").val(resData.price)
            $("input#task_limit").val(resData.task_limit)
            $("select#task_type").val(resData.user_level)
            $("select#task_type").find("option[value = '"+ resData.user_level +"']").attr("selected","selected")
            $("#task_desc").val(resData.content)

            // 渲染任务图片
            $(".task .image-remark").hide()
            for (let i = 0; i < resData.images.length; i++) {
                var $imgBox = '<div class="selected-image"><div class="delete-image"><img class="image" src="/img/close.png" alt=""></div><img class="image" alt="" src="' + resData.images[i] + '"><input class="img-value" type="text" name="image[]" hidden value="' + resData.images[i] + '"></div>'
                $('.task').append($imgBox)
            }
            
        },
        error: function (ex) {
            console.log(ex)
        }
    })
}
drawData();

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
