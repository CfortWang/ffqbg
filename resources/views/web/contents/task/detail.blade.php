@extends('web.layouts.app')

@section('title', $title)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>@lang('user/detail.header.title')</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">@lang('user/detail.header.depth1')</a>
            </li>
            <li>
                <a href="{{ url('/user/list') }}">@lang('user/detail.header.depth2')</a>
            </li>
            <li class="active">
                <strong>@lang('user/detail.header.depth3')</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>@lang('user/detail.contents.title')</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">@lang('user/detail.contents.user.title')</h3>
                            <form class="form-horizontal" id="userDetailForm" method="post">
                                <input type="hidden" id="user" name="seq" value="{{ $user->seq }}">
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.phone')</label>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="account" disabled>
                                            <option>+{{ $user->phoneCountry->calling_code }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" placeholder="@lang('user/detail.contents.user.phone')" value="{{ $user->phone_num }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.email')</label>
                                    <div class="col-lg-9"><input type="email" id="user-email" class="form-control" placeholder="@lang('user/detail.contents.user.email')" value="{{ $user->email }}" name="email" required></div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.nickname')</label>
                                    <div class="col-lg-9"><input type="text" id="user-nickname" class="form-control" placeholder="@lang('user/detail.contents.user.nickname')" value="{{ $user->nickname }}" name="nickname" required></div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.name')</label>
                                    <div class="col-lg-9"><input type="text" id="user-name" class="form-control" placeholder="@lang('user/detail.contents.user.name')" value="{{ $user->name }}" name="name" required></div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.birthday')</label>
                                    <div class="col-lg-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="user-birthday" name="birthday" class="form-control" value="{{ $user->birthday }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.gender.title')</label>
                                    <div class="col-lg-9">
                                        <div class="col-sm-5 radio radio-info radio-inline">
                                            <input type="radio" id="genderRadio1" value="male" name="gender" {{ $user->gender=='male' ? 'checked' : '' }}>
                                            <label for="genderRadio1"> @lang('user/detail.contents.user.gender.male') </label>
                                        </div>
                                        <div class="col-sm-5 radio radio-info radio-inline">
                                            <input type="radio" id="genderRadio2" value="female" name="gender" {{ $user->gender=='female' ? 'checked' : '' }}>
                                            <label for="genderRadio2"> @lang('user/detail.contents.user.gender.female') </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.marry.title')</label>
                                    <div class="col-lg-9">
                                        <div class="col-sm-5 radio radio-info radio-inline">
                                            <input type="radio" id="isMarriedRadio1" value="0" name="is_married" {{ $user->is_married=='0' || $user->is_married==null ? 'checked' : '' }}>
                                            <label for="isMarriedRadio1"> @lang('user/detail.contents.user.marry.married') </label>
                                        </div>
                                        <div class="col-sm-5 radio radio-info radio-inline">
                                            <input type="radio" id="isMarriedRadio2" value="1" name="is_married" {{ $user->is_married=='1' ? 'checked' : '' }}>
                                            <label for="isMarriedRadio2"> @lang('user/detail.contents.user.marry.single') </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.region.province')</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="province" name="province">
                                            <option value="">-</option>
                                            @foreach($province as $key => $value)
                                            <option value="{{ $value->seq }}" {{ $value->seq==$user->province ? 'selected':'' }}>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.region.city')</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="city" name="city">
                                            <option value="">-</option>
                                            @foreach($city as $key => $value)
                                            <option value="{{ $value->seq }}" {{ $value->seq==$user->city ? 'selected':'' }}>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.region.area')</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="area" name="area">
                                            <option value="">-</option>
                                            @foreach($area as $key => $value)
                                            <option value="{{ $value->seq }}" {{ $value->seq==$user->area ? 'selected':'' }}>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.recommend_code')</label>
                                    <div class="col-lg-9"><input type="text" placeholder="@lang('user/detail.contents.user.recommend_code')" class="form-control" value="{{ $user->recommend_code }}" disabled></div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.created_at')</label>
                                    <div class="col-lg-9"><input type="text" placeholder="@lang('user/detail.contents.user.created_at')" class="form-control" value="{{ $user->created_at }}" disabled></div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.user.last_login_at')</label>
                                    <div class="col-lg-9"><input type="text" placeholder="@lang('user/detail.contents.user.last_login_at')" class="form-control" value="{{ $user->last_login_at }}" disabled></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 text-right">
                                        <button type="button" class="ladda-button ladda-button-submit btn btn-w-m btn-warning"  data-style="zoom-in" id="modify-user-btn">@lang('user/detail.contents.submit')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="m-t-none m-b">@lang('user/detail.contents.point.title')</h3>
                            <div class="form-horizontal">
                                <div class="form-group"><label class="col-lg-3 control-label">@lang('user/detail.contents.point.user_point')</label>
                                <div class="col-lg-5"><input type="text" placeholder="User Point" class="form-control" value="{{ $user->point }}" disabled></div>
                                <div class="col-lg-4"><button type="button" id="userPointModalButton" data-toggle="modal" data-target="#userPointModal" class="btn btn-w-m btn-info btn-block">@lang('user/detail.contents.point.list')</button></div>
                            </div>
                            <br>
                            <h3 class="m-t m-b">@lang('user/detail.contents.ticket.user_ticket')  :  {{ $user->ticket_cnt }} @lang('user/detail.contents.ticket.sheet')</h3>
                            <br>
                            <br>
                            <h3 class="m-t m-b">@lang('user/detail.contents.entry.title')</h3>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-lg-4">
                                        <select class="form-control" id="drawing-select">
                                            @foreach ($drawing as $item)
                                            <option value="{{ $item->seq }}" {{ $drawingFirst->seq === $item->seq ? 'selected' : '' }}>{{ $item->drawing_num }} @lang('user/detail.contents.entry.round')</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover entry-list-table" >
                                    <thead>
                                        <tr>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.no')</th>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.ball1')</th>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.ball2')</th>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.ball3')</th>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.ball4')</th>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.ball5')</th>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.ball6')</th>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.ball7')</th>
                                            <th class="text-center">@lang('user/detail.contents.entry.table.date')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <p class="pull-right">
                        <a href="{{route('bo_user_list')}}" class="btn btn-w-m btn-default">@lang('user/detail.contents.list')</a>
                    </p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal inmodal" id="userPointModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header modal-header-equal-padding">
                <h2 class="m-t-none m-b text-left">@lang('user/detail.modal.title')</h2>
            </div>
            <div class="modal-body">
                <h3 class="m-b">@lang('user/detail.modal.user_point')  :  {{ $user->point }} P</h3>
                <h3 class="m-t-lg m-b text-left">@lang('user/detail.modal.list')</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover point-list-table" >
                        <thead>
                            <tr>
                                <th class="text-center">@lang('user/detail.modal.table.no')</th>
                                <th class="text-center">@lang('user/detail.modal.table.point')</th>
                                <th class="text-center">@lang('user/detail.modal.table.description')</th>
                                <th class="text-center">@lang('user/detail.modal.table.date')</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">@lang('user/detail.modal.close')</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
var customLocale = $('#page-wrapper').data('locale');
var modifyUserConfirm = '{{ __("user/detail.message.modify.confirm") }}';
var userNickValidation = '{{ __("user/detail.message.nickname_validation") }}';
var userModifySuccess = '{{ __("user/detail.message.modify.success") }}';
var serverError = '{{ __("user/detail.message.modify.error") }}';

function list(_target, _type, _seq){
    var target = _target;
    var type = _type;
    var seq = _seq;

    var dataArray = {
        'type' : type,
        'seq' : seq
    };
    $.ajax({
        url: '/api/location',
        data: dataArray,
        dataType: 'json',
        type: 'GET',
        success: function(response){
            var row = response.data.data;
            for(var i=0; i<row.length; i++){
                target.append("<option value='"+row[i].seq+"'>"+row[i].name+"</option>");
            }
            //target.chosen("destroy").chosen({width: "100%"});
        },
        error: function(e) {
            console.log(e);
        }
    });
}

$(document).ready(function(){
    /* DatePicker Start */
    $('.input-group.date').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    /* DatePicker End */

    /* Select Box Start */
    $("#province").change(function(){
        if($("#province option:selected").val() != ""){
            $("#city").html("<option value=''>-</option>");
            $("#area").html("<option value=''>-</option>");
            list($("#city"), 'city', $("#province option:selected").val());
        }
    });
    $("#city").change(function(){
        if($("#city option:selected").val() != ""){
            $("#area").html("<option value=''>-</option>");
            list($("#area"), 'area', $("#city option:selected").val());
        }
    });
    /* Select Box End */

    $('#modify-user-btn').click(function(){
        var userSeq = $('#user').val();
        var userEmail = $('#user-email').val().replace(/ /gi, '');
        var userNickname = $('#user-nickname').val().replace(/ /gi, '');
        var userName = $('#user-name').val().replace(/ /gi, '');
        var userBirthday = $('#user-birthday').val().replace(/ /gi, '');
        if ($('#genderRadio1').is(':checked') === true) {
            var genderValue = $('#genderRadio1').val();
        } else {
            var genderValue = $('#genderRadio2').val();
        }
        if ($('#isMarriedRadio1').is(':checked') === true) {
            var marriedValue = $('#isMarriedRadio1').val();
        } else {
            var marriedValue = $('#isMarriedRadio2').val();
        }

        var province = $('#province').val();
        var city = $('#city').val();
        var area = $('#area').val();
        
        $('#user-email').val(userEmail);
        $('#user-nickname').val(userNickname);
        $('#user-name').val(userName);
        $('#user-birthday').val(userBirthday);

        if (userNickname === '') {
            alert(userNickValidation);
            return false;
        }

        if (!confirm(modifyUserConfirm)) {
            e.preventDefault();
        } else {
            $.ajax({
                url: '/user/modify',
                data: {
                    'user_seq' : userSeq,
                    'user_email' : userEmail,
                    'user_nickname' : userNickname,
                    'user_name' : userName,
                    'user_birthday' : userBirthday,
                    'user_gender' : genderValue,
                    'is_married' : marriedValue,
                    'province' : province,
                    'city' : city,
                    'area' : area
                },
                dataType: 'json',
                type: 'PATCH',
                success: function(data){
                    alert(userModifySuccess);
                },
                error: function(data) {
                    alert(serverError);
                }
            });
        }
    });

    var entryListTable = $('.entry-list-table').DataTable({
        pageLength: 10,
        responsive: true,
        dom: 'f<"row"t>p',
        order: [[ 0, "desc" ]],
        language: {
            "zeroRecords": "@lang('user/detail.contents.entry.no_data')",
            "info": "_PAGE_ / _PAGES_ ",
            "search": "@lang('user/detail.contents.entry.search') :",
            "paginate": {
                "next":       "@lang('user/detail.contents.entry.pagination.next')",
                "previous":   "@lang('user/detail.contents.entry.pagination.prev')"
            },
        },
        deferRender: true,
        processing:true,
        serverSide:true,
        ajax: {
            url: "{{ url('/datatable/myentry/list/'.$user->seq.'/'.$drawingFirst->seq)}}",
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                return JSON.stringify( json.data ); // return JSON string
            }
        },
        columns:[
            {
                data:"seq",
                className:"text-center",
            },
            {
                data:"num_1",
                className:"text-center",
            },
            {
                data:"num_2",
                className:"text-center",
            },
            {
                data:"num_3",
                className:"text-center",
            },
            {
                data:"num_4",
                className:"text-center",
            },
            {
                data:"num_5",
                className:"text-center",
            },
            {
                data:"num_6",
                className:"text-center",
            },
            {
                data:"num_7",
                className:"text-center",
            },
            {
                data:"created_at",
                className:"text-center",
            }
        ]
    });

    $('#drawing-select').change(function(e) {
        var selectedDrawing = $('#drawing-select').val();
        entryListTable.ajax.url( "{{ url('/datatable/myentry/list/'.$user->seq)}}" + '/' + selectedDrawing ).load();
    });

    var userPointListTable = null;

    $("#userPointModal").on('show.bs.modal', function () {
        if (userPointListTable == null) {
            userPointListTable = $('.point-list-table').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"row"<"#status-box.col-lg-6 text-left"><"col-lg-6 text-right"f>><"row"t>p',
                order: [[ 0, "desc" ]],
                language: {
                    "zeroRecords": "@lang('common.datatable.no_data')",
                    "info": "_PAGE_ / _PAGES_ ",
                    "search": "@lang('common.datatable.search') :",
                    "paginate": {
                        "next":       "@lang('common.datatable.pagination.next')",
                        "previous":   "@lang('common.datatable.pagination.prev')"
                    },
                },
                deferRender: true,
                processing:true,
                serverSide:true,
                ajax: {
                    url: "{{ url('/api/user/'.$user->seq.'/point') }}",
                    dataFilter: function(data) {
                        var json = jQuery.parseJSON( data );
                        return JSON.stringify( json.data ); // return JSON string
                    },
                },
                columns:[
                    {
                        data:"seq",
                        className:"text-center",
                    },
                    {
                        data:"signed_point",
                        className:"text-center",
                    },
                    {
                        data:"type",
                        className:"text-center",
                        render:function(data, type, row) {
                            if (row.type == 'recommender') {
                                return "@lang('user/detail.point.type.recommender')";
                            } else if (row.type == 'recommend') {
                                return "@lang('user/detail.point.type.recommend')";
                            } else if (row.type == 'ticket') {
                                return "@lang('user/detail.point.type.ticket')";
                            } else if (row.type == 'identification') {
                                return "@lang('user/detail.point.type.identification')";
                            } else if (row.type == 'add_info') {
                                return "@lang('user/detail.point.type.add_info')";
                            } else if (row.type == 'cash_out') {
                                return "@lang('user/detail.point.type.cash_out')";
                            } else {
                                return row.type;
                            }
                        }
                    },
                    {
                        data:"created_at",
                        className:"text-center",
                    }
                ],
            });
        } else {
            userPointListTable.ajax.reload();
        }
    });
});

</script>
@endsection
