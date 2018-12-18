<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>发发圈 - @yield('title') </title>
    <link rel="icon" href="/img/logo/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/datatables.min.css') !!}" />
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"> -->
    <link rel="stylesheet" href="{!! asset('css/plugins/awesome-bootstrap-checkbox.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/datepicker3.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/clockpicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/bootstrap-duallistbox.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/chosen/bootstrap-chosen.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/toastr.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}" />
    @yield('stylesheet')
    @yield('css')

</head>
<body>
  <!-- Wrapper-->
    <div id="wrapper">
        <!-- Navigation -->
        @include('web.layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg" data-locale="{{App::getLocale()}}">

            <!-- Page wrapper -->
            @include('web.layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')
            <div class="modal fade bs-example-modal-sm" id="systemTips" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">系统提示</h4>
                    </div>
                    <div class="modal-body">
                        删除之后不可恢复，请谨慎操作！
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-danger" id="sure-delete">确定删除</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('web.layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/toastr.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/public.js') !!}" type="text/javascript"></script>
<!-- session -->
<!-- <script src="{!! asset('js/session.js') !!}" type="text/javascript"></script> -->
<!-- DataTables -->
<!-- <script src="{!! asset('js/plugins/datatables.min.js') !!}" type="text/javascript"></script> -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<!-- DatePicker -->
<script src="{!! asset('js/plugins/bootstrap-datepicker.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/plugins/bootstrap-datepicker-locale.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/plugins/clockpicker.js') !!}" type="text/javascript"></script>
<!-- Number Formatter -->
<script src="{!! asset('js/plugins/numeral.min.js') !!}" type="text/javascript"></script>
<!-- Custom Alert -->
<script src="{!! asset('js/plugins/bootbox.min.js') !!}" type="text/javascript"></script>
<!-- Dual List Box -->
<script src="{!! asset('js/plugins/jquery.bootstrap-duallistbox.js') !!}" type="text/javascript"></script>
<!-- Chosen -->
<script src="{!! asset('js/plugins/chosen/chosen.jquery.js') !!}" type="text/javascript"></script>
<script>

function setDatePicker()
{
    $('.date').datepicker({
        todayBtn: "linked",
        todayHighlight: true,
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "yyyy-mm-dd",
        language: 'zh'
    });
}

function setClockPicker()
{
    $('.clockpicker').clockpicker();
}

function setPickers()
{
    setDatePicker();
    setClockPicker();
}

$(".date").on("click", function () {
    setPickers()
})

var getArgs = function () {
    var url = location.search
    var args = {}
    if (url.indexOf("?") != -1) {
        var str = url.substr(1)
        var strs = str.split("&")
        for (let i = 0; i < strs.length; i++) {
            args[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1])
        }
    }
    return args
}

function appendSkipPage () {
    var table = $(".user-list-table").dataTable(); 
    // var template =
    //     $("<li class='paginate_button active'>" +
    //         "   <div class='input-group' style='margin-left:3px;'>" +
    //         "       <span class='input-group-addon' style='padding:0px 8px;background-color:#fff;font-size: 12px;'>跳转页</span>" +
    //         "       <input type='text' class='form-control' style='text-align:center;padding: 8px 2px;height:30px;width:40px;' />" +
    //         "       <span class='input-group-addon active' style='padding:0px 8px;'><a href='javascript:void(0)'> Go </a></span>" +
    //         "   </div>" +
    //         "</li>");

    var template = $('<div class="goto-box"><div class="goto-text">跳转至</div><input type="text" class="form-control goto-page"><div class="goto-btn"><a href="javascript:void(0)"> Go </a></div></div>')

    template.find("a").click(function () {
        var pn = template.find("input").val();
        if (pn > 0) {
            --pn;
        } else {
            pn = 0;
        }
        table.fnPageChange(pn);
    });
    // $("ul.pagination").append(template)
    $("div#DataTables_Table_0_paginate").append(template)
}

$(document).ready(function(){

    $(".preparing").click(function(e){
        e.preventDefault();
        alert("preparing");
    });

    $('#lang').change(function(e) {
        var locale = $('#lang').val();
        $.ajax({
            url: '/api/setlocale',
            data: {
            'locale' : locale
            },
            dataType: 'json',
            type: 'POST',
            success: function(data){
                location.reload();
            },
            error: function(data) {
                
            }
        });
    });
    $('#logout-btn').click(function(e) {
        $.ajax({
            url: '/logout',
            type: 'GET',
            success: function(data){
                location.reload();
            },
            error: function(data) {
                alert('잘못된 요청입니다.(중국어)');
                alert('잘못된 요청입니다.(영어)');
                alert('잘못된 요청입니다.(한국어)');
            }
        });

        // if (!confirm(changeSaveConfirm)) {
        //     e.preventDefault();
        // } else {
        //     $(this).closest('form').submit();
        // }
    });
});
</script>
@section('scripts')
@show

</body>
</html>
