@extends('web.layouts.app')

@section('title', $title)
@section('css')
<link rel="stylesheet" href="/fontawesome/css/font-awesome.min.css">
@endsection('css')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>用户协议</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">主页</a>
            </li>
            <li>
                <a href="{{ url('/system/parameter') }}">系统设置</a>
            </li>
            <li class="active">
                <strong>用户协议</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content clear-fix">
                    <form id="submit" action="/api/banner" method="post"  enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-group clear-fix">
                            <div class="col-lg-2 col-md-2 col-sm-3 textarea-title">用户协议</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 rule-box">
                                <div class="editor-container">
                                    <div class="btn-toolbar" role="toolbar" data-role="editor-toolbar" data-target="#editor">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Font">
                                                <i class="icon-font"></i><b class="caret"></b>
                                            </button>
                                            <ul class="dropdown-menu"></ul>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size">
                                                <i class="icon-text-height"></i>&nbsp;<b class="caret"></b>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                                <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                                <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)">
                                                <i class="icon-bold"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)">
                                                <i class="icon-italic"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="strikethrough" title="Strikethrough">
                                                <i class="icon-strikethrough"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)">
                                                <i class="icon-underline"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="insertunorderedlist" title="Bullet list">
                                                <i class="icon-list-ul"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="insertorderedlist" title="Number list">
                                                <i class="icon-list-ol"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)">
                                                <i class="icon-indent-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="indent" title="Indent (Tab)">
                                                <i class="icon-indent-right"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)">
                                                <i class="icon-align-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)">
                                                <i class="icon-align-center"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)">
                                                <i class="icon-align-right"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)">
                                                <i class="icon-align-justify"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink">
                                                    <i class="icon-link"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div class="input-group" style="margin: 0 5px; min-width: 200px;">
                                                        <input class="form-control" placeholder="URL" type="text" data-edit="createLink" /> <span class="input-group-btn">
                                                            <button class="btn" type="button">Add</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn" data-edit="unlink" title="Remove Hyperlink">
                                                <i class="icon-cut"></i>
                                            </button>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn1">
                                                <i class="icon-picture"></i>
                                            </button>
                                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn1" data-edit="insertImage" />
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)">
                                                <i class="icon-undo"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)">
                                                <i class="icon-repeat"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="editor1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <div class="col-lg-2 col-md-2 col-sm-3 textarea-title">公司简介</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 rule-box">
                                <div class="editor-container">
                                    <div class="btn-toolbar" role="toolbar" data-role="editor-toolbar" data-target="#editor">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Font">
                                                <i class="icon-font"></i><b class="caret"></b>
                                            </button>
                                            <ul class="dropdown-menu"></ul>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size">
                                                <i class="icon-text-height"></i>&nbsp;<b class="caret"></b>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                                <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                                <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)">
                                                <i class="icon-bold"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)">
                                                <i class="icon-italic"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="strikethrough" title="Strikethrough">
                                                <i class="icon-strikethrough"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)">
                                                <i class="icon-underline"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="insertunorderedlist" title="Bullet list">
                                                <i class="icon-list-ul"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="insertorderedlist" title="Number list">
                                                <i class="icon-list-ol"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)">
                                                <i class="icon-indent-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="indent" title="Indent (Tab)">
                                                <i class="icon-indent-right"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)">
                                                <i class="icon-align-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)">
                                                <i class="icon-align-center"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)">
                                                <i class="icon-align-right"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)">
                                                <i class="icon-align-justify"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink">
                                                    <i class="icon-link"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div class="input-group" style="margin: 0 5px; min-width: 200px;">
                                                        <input class="form-control" placeholder="URL" type="text" data-edit="createLink" /> <span class="input-group-btn">
                                                            <button class="btn" type="button">Add</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn" data-edit="unlink" title="Remove Hyperlink">
                                                <i class="icon-cut"></i>
                                            </button>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn2">
                                                <i class="icon-picture"></i>
                                            </button>
                                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn2" data-edit="insertImage" />
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)">
                                                <i class="icon-undo"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)">
                                                <i class="icon-repeat"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="editor2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <div class="col-lg-2 col-md-2 col-sm-3 textarea-title">系统帮助</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 rule-box">
                                <div class="editor-container">
                                    <div class="btn-toolbar" role="toolbar" data-role="editor-toolbar" data-target="#editor">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Font">
                                                <i class="icon-font"></i><b class="caret"></b>
                                            </button>
                                            <ul class="dropdown-menu"></ul>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size">
                                                <i class="icon-text-height"></i>&nbsp;<b class="caret"></b>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                                <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                                <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)">
                                                <i class="icon-bold"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)">
                                                <i class="icon-italic"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="strikethrough" title="Strikethrough">
                                                <i class="icon-strikethrough"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)">
                                                <i class="icon-underline"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="insertunorderedlist" title="Bullet list">
                                                <i class="icon-list-ul"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="insertorderedlist" title="Number list">
                                                <i class="icon-list-ol"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)">
                                                <i class="icon-indent-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="indent" title="Indent (Tab)">
                                                <i class="icon-indent-right"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)">
                                                <i class="icon-align-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)">
                                                <i class="icon-align-center"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)">
                                                <i class="icon-align-right"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)">
                                                <i class="icon-align-justify"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink">
                                                    <i class="icon-link"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div class="input-group" style="margin: 0 5px; min-width: 200px;">
                                                        <input class="form-control" placeholder="URL" type="text" data-edit="createLink" /> <span class="input-group-btn">
                                                            <button class="btn" type="button">Add</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn" data-edit="unlink" title="Remove Hyperlink">
                                                <i class="icon-cut"></i>
                                            </button>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn3">
                                                <i class="icon-picture"></i>
                                            </button>
                                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn3" data-edit="insertImage" />
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)">
                                                <i class="icon-undo"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)">
                                                <i class="icon-repeat"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="editor3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clear-fix">
                            <div class="col-lg-2 col-md-2 col-sm-3 textarea-title">领取规则</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 rule-box">
                                <div class="editor-container">
                                    <div class="btn-toolbar" role="toolbar" data-role="editor-toolbar" data-target="#editor">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Font">
                                                <i class="icon-font"></i><b class="caret"></b>
                                            </button>
                                            <ul class="dropdown-menu"></ul>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size">
                                                <i class="icon-text-height"></i>&nbsp;<b class="caret"></b>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                                <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                                <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)">
                                                <i class="icon-bold"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)">
                                                <i class="icon-italic"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="strikethrough" title="Strikethrough">
                                                <i class="icon-strikethrough"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)">
                                                <i class="icon-underline"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="insertunorderedlist" title="Bullet list">
                                                <i class="icon-list-ul"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="insertorderedlist" title="Number list">
                                                <i class="icon-list-ol"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)">
                                                <i class="icon-indent-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="indent" title="Indent (Tab)">
                                                <i class="icon-indent-right"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)">
                                                <i class="icon-align-left"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)">
                                                <i class="icon-align-center"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)">
                                                <i class="icon-align-right"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)">
                                                <i class="icon-align-justify"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink">
                                                    <i class="icon-link"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div class="input-group" style="margin: 0 5px; min-width: 200px;">
                                                        <input class="form-control" placeholder="URL" type="text" data-edit="createLink" /> <span class="input-group-btn">
                                                            <button class="btn" type="button">Add</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn" data-edit="unlink" title="Remove Hyperlink">
                                                <i class="icon-cut"></i>
                                            </button>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn4">
                                                <i class="icon-picture"></i>
                                            </button>
                                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn4" data-edit="insertImage" />
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)">
                                                <i class="icon-undo"></i>
                                            </button>
                                            <button type="button" class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)">
                                                <i class="icon-repeat"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="editor4"></div>
                                </div>
                            </div>
                            <input type="text" id="id" hidden>
                        </div>

                        <div class="create-task"><button type="button" class="btn btn-primary btn-lg modify-btn">保存</button></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/jquery.hotkeys.js"></script>
<script src="/js/bootstrap-wysiwyg.js"></script>
<script>
    $(function() {
		// 初始化工具条
		initToolbarBootstrapBindings();

		$('#editor1').wysiwyg();
        $('#editor2').wysiwyg();
        $('#editor3').wysiwyg();
        $('#editor4').wysiwyg();
	});

	// 初始化工具条
	function initToolbarBootstrapBindings() {
		// 字体样式
		var fonts = [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times', 'Times New Roman', 'Verdana' ]
        var fontTarget = $('[title=Font]').siblings('.dropdown-menu');
		$.each(fonts,function(idx, fontName) {
			fontTarget.append($('<li><a href="#" data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">' + fontName + '</a></li>'));
		});

		$('button[title]').tooltip({
			container : 'body'
		});

		// .dropdown-menu下的input事件
		$('.dropdown-menu input').click(function() {
			return false;
		})
		.change(function() {
			$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
		})
		.keydown('esc', function() {
			this.value = '';
			$(this).change();
		});

		// [data-role=magic-overlay]的样式
		$('[data-role=magic-overlay]').each(function() {
			var overlay = $(this), target = $(overlay.data('target'));
			overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
		});
    };
    
    function getProtocol () {
        $.ajax({
            type: "GET",
            dataType: 'JSON',
            url: '/api/system/protocol',
            success: function(res) {
                if(res.status == 200){
                    let resData = res.data
                    $("#id").val(resData.id)
                    $("#editor1").html(resData.user)
                    $("#editor2").html(resData.company)
                    $("#editor3").html(resData.help)
                    $("#editor4").html(resData.rule)
                } else {
                    toastr.error(res.message);
                }
            },
            error: function (ex) {
                console.log(ex)
                toastr.error(ex.statusText)
            }
        });
    }

    getProtocol();

    $(".modify-btn").on("click", function () {
        let id = $("#id").val()
        let user = $("#editor1").html()
        let company = $("#editor2").html()
        let help = $("#editor3").html()
        let rule = $("#editor4").html()

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: '/api/system/protocol',
            data: {
                id: id,
                user: user,
                company: company,
                help: help,
                rule: rule
            },
            success: function(res) {
                if(res.status == 200){
                    toastr.success(res.message)
                    setTimeout(() => {
                        window.location.href = window.location.href
                    }, 1000);
                } else {
                    toastr.error(res.message);
                }
            },
            error: function (ex) {
                console.log(ex)
                toastr.error(ex.statusText)
            }
        });
    })

</script>
@endsection
