@extends('layouts.layoutAdmin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/personCenter/Jcrop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/personCenter/uploadify.css')}}">

    <style>
        /*-- --- 上传头像弹出层 --- --*/
        .headImg{
            width:630px;
            height:470px;
            position:fixed;
            top:50%;
            left:50%;
            z-index:1001;
            margin-top:-325px;
            margin-left:-400px;
            background: #F2F8FC;

            /*border-radius: 5px;*/
            /*-moz-border-radius: 5px;*/
            /*-webkit-border-radius: 5px;*/
        }
        .headImg_tit{
            width:100%;
            height:30px;
            background:#B1584C;
        }
        .headImg_tit_l{
            width:100px;
            height:30px;
            float: left;
            line-height: 30px;
            text-indent:7px;
            font-size:13px;
            color:#ffffff;
        }
        .headImg_tit_r{
            width:24px;
            height:30px;
            float:right;
            cursor: pointer;
        }
        .headImg_tit_r img{
            margin-top:4px;
        }
        .headImg_con{
            width:100%;
            height:400px;
        }
        .headImg_con_l{
            width:490px;
            height:400px;
            float: left;
            /*background:#dddddd;                       !*tmp*!*/
        }
        .headImg_con_r{
            width:140px;
            height:400px;
            /*background:#ffffff;*/
            float: right;
        }
        .headImg_con_r_yl{
            width:100%;
            height:20px;
            line-height:20px;
            font-size:13px;
            text-indent: 18px;
        }
        .headImg_con_r_preview_s{
            width:140px;
            height:60px;
            padding-left:40px;
        }
        .headImg_con_r_preview_s2{
            width:140px;
            height:100px;
            padding-left:20px;
        }
        .headImg_con_r_preview_s_info{
            width:100%;
            height:40px;
            line-height:40px;
            text-align: center;
            font-size:12px;
        }
        #imgs{
            width:480px;
            height:330px;
            margin-left:5px;
            overflow:hidden;
            text-align: center;
            /*background:#dddddd;                        !*tmp*!*/
            background: #ffffff;
        }

        .headImg_foot{
            width:100%;
            height:40px;
            background:#F5EBE6;
        }
        .headImg_foot_selImg{
            width:330px;
            height:40px;
            float:left;
            margin-left:50px;
        }

        .headImg_foot_cutImg{
            width:125px;
            height:40px;
            float: left;
        }

        .sel_btn{
            width:120px;
            height:26px;
            line-height:26px;
            text-align: center;
            background:#F4F4F4;
            margin-top:7px;
            cursor: pointer;
            border:1px solid #A09A96;

            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        #file_upload{
            position:relative;
            top:-30px;
            opacity:0;
            filter:alpha(opacity=0);
        }


        #SWFUpload_0_0{
            /*margin-top: 10px;*/
            position: relative;
            top:-130px;
        }
        #SWFUpload_0_1{
            /*margin-top: 10px;*/
            position: relative;
            top:-130px;
        }
        #SWFUpload_0_2{
            /*margin-top: 10px;*/
            position: relative;
            top:-130px;
        }
        #SWFUpload_0_3{
            /*margin-top: 10px;*/
            position: relative;
            top:-130px;
        }
        /*-- --- 上传头像弹出层 结束 --- --*/

        .right_head_img_upload{
            width:100px;
            height:30px;
            line-height:30px;
            background: #209EEA;
            margin-top:20px;
            text-align: center;
            color:#fff;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="{{url('/admin/index')}}">首页</a>
                </li>

                <li>
                    <a href="{{url('/admin/users/userList')}}">用户管理</a>
                </li>
                <li class="active">用户管理列表</li>
            </ul><!-- .breadcrumb -->
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="page-content">
            <div class="page-header">
                <h1>
                    用户管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        编辑用户
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" method="post" action="{{url('admin/users/update/'.$data->id)}}" onsubmit="return postcheck();" >
                        {{csrf_field()}}
                        <input type="hidden" name="pic" id="pic" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="username" placeholder="Username"
                                       class="col-xs-10 col-sm-4" value="{{$data->username}}" readonly/><span
                                        style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                            </div>
                        </div>

                        @if($data->type == 1)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-6">姓名</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-6" name="realname" placeholder="Realname" class="col-xs-10 col-sm-4"
                                      value="{{$data->realname}}"/>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-6">性别</label>

                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="inlineRadio1" value="1" {{$data->sex == 1 ?'checked':''}}>男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="inlineRadio2" value="2" {{$data->sex == 2 ?'checked':''}}>女
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-4">手机号</label>

                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-4" disabled type="hidden" name="oldPhone" placeholder="Phone" value="{{$data->phone}}"/>
                                <input class="col-xs-10 col-sm-4" type="text" name="phone" id="form-field-4" placeholder="Phone" value="{{$data->phone}}"/><span
                                        style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                                <div class="space-2"></div>
                            </div>
                        </div>

                        {{--上传头像--}}
                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户头像 </label>
                            {{--<input type="hidden" value="" name="headImg"/>--}}
                            <div class="col-sm-9">
                                <div class="col-sm-9">
                                    <img id="showImg" src="{{asset($data->pic)}}" style="border:1px solid #f5f5f5; display: block;" width="100" height="100"  alt="">
                                    <div class="right_head_img_upload">上传头像</div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">居住地</label>

                            <div class="col-sm-9">
                                <select id="form-field-7" class="col-xs-10 col-sm-2" name="provinceId">
                                    <option value="">-请选择-</option>
                                    @foreach($data->province as $value)
                                        <option value="{{$value->code}}" {{$data->provinceId == $value->code?'selected':''}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <select id="form-field-7" class="col-xs-10 col-sm-2" name="cityId">
                                    <option value="">-请选择-</option>
                                    @foreach($data->city as $value)
                                        <option value="{{$value->code}}" {{$data->cityId == $value->code?'selected':''}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                                </span>
                            </div>
                        </div>

                    @if($data->type == 1)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">学历</label>

                            <div class="col-sm-9">
                                <select id="form-field-7" class="col-xs-10 col-sm-4" name="education">
                                    <option value="">-请选择-</option>
                                    <option value="中专" {{$data->education == '中专' ? 'selected' : ''}}>中专</option>
                                    <option value="大专" {{$data->education == '大专' ? 'selected' : ''}}>大专</option>
                                    <option value="本科" {{$data->education == '本科' ? 'selected' : ''}}>本科</option>
                                    <option value="硕士" {{$data->education == '硕士' ? 'selected' : ''}}>硕士</option>
                                    <option value="博士" {{$data->education == '博士' ? 'selected' : ''}}>博士</option>
                                    <option value="博士后" {{$data->education == '博士后' ? 'selected' : ''}}>博士后</option>
                                </select>
                                    <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle"></span>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-4">职称</label>

                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-4" name="professional" type="text" id="form-field-4" placeholder="请填写职称" value="{{$data->professional}}"/><span
                                        style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                                <div class="space-2"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-4">所在单位</label>

                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-4" name="company" type="text" id="form-field-4" placeholder="所在单位" value="{{$data->company}}"/><span
                                        style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                                <div class="space-2"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-4">毕业院校</label>

                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-4" name="school" type="text" id="form-field-4" placeholder="毕业院校" value="{{$data->school}}"/><span
                                        style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                                <div class="space-2"></div>
                            </div>
                        </div>

                    @endif
                    @if($data->type == 0)
                        <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">生日</label>

                                <div class="col-sm-9">
                                    <select id="sel_year" class="col-xs-10 col-sm-2" rel="{{$data->birthYear}}" name="birthYear"></select>
                                    <select id="sel_month" class="col-xs-10 col-sm-1" rel="{{$data->birthMonth}}" name="birthMonth"></select>
                                    <select id="sel_day"  class="col-xs-10 col-sm-1" rel="{{$data->birthDay}}" name="birthDay"></select>

                                    <span class="help-inline col-xs-12 col-sm-7"><span class="middle"></span></span>
                                </div>
                            </div>



                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">当前等级</label>

                            <div class="col-sm-9">
                                <select id="form-field-7" class="col-xs-10 col-sm-4" name="pianoGrade">
                                    @if(!$data->pianoGrade)
                                        <option value="">-请选择-</option>
                                    @endif
                                    <option value="钢琴一级" {{ $data->pianoGrade == '钢琴一级' ? "selected" : ''}}>钢琴一级</option>
                                    <option value="钢琴二级" {{ $data->pianoGrade == '钢琴二级' ? "selected" : ''}}>钢琴二级</option>
                                    <option value="钢琴三级" {{ $data->pianoGrade == '钢琴三级' ? "selected" : ''}}>钢琴三级</option>
                                    <option value="钢琴四级" {{ $data->pianoGrade == '钢琴四级' ? "selected" : ''}}>钢琴四级</option>
                                    <option value="钢琴五级" {{ $data->pianoGrade == '钢琴五级' ? "selected" : ''}}>钢琴五级</option>
                                    <option value="钢琴六级" {{ $data->pianoGrade == '钢琴六级' ? "selected" : ''}}>钢琴六级</option>
                                    <option value="钢琴七级" {{ $data->pianoGrade == '钢琴七级' ? "selected" : ''}}>钢琴七级</option>
                                    <option value="钢琴八级" {{ $data->pianoGrade == '钢琴八级' ? "selected" : ''}}>钢琴八级</option>
                                    <option value="钢琴九级" {{ $data->pianoGrade == '钢琴九级' ? "selected" : ''}}>钢琴九级</option>
                                    <option value="钢琴十级" {{ $data->pianoGrade == '钢琴十级' ? "selected" : ''}}>钢琴十级</option>
                                </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle"></span>
                            </span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">开始学琴时间</label>

                            <div class="col-sm-9">
                                <select rel="{{$data->learnYear}}"  class="sel_year col-xs-10 col-sm-2" name="learnYear"></select>
                                <select rel="{{$data->learnMonth}}"  class="sel_month col-xs-10 col-sm-2" name="learnMonth"></select>
                                <span class="help-inline col-xs-12 col-sm-7"><span class="middle"></span></span>
                            </div>
                        </div>
                    @endif

                        <div class="space-4"></div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit" id="btnSub">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>


                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>

                    </form>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->

        {{--头像切换弹出层--}}
        <div class="headImg hide">
            <div class="headImg_tit">
                <div class="headImg_tit_l">更换头像</div>
                <div class="headImg_tit_r"><img src="{{asset('home/image/personCenter/close.png')}}" alt=""></div>
            </div>
            <div class="headImg_con">
                <div class="headImg_con_l">
                    <div style="height:20px;"></div>
                    <div id="imgs">
                        <div style="height:50px;"></div>
                        <img id="imghead" style="" src="{{asset('home/image/personCenter/unload.png')}}">
                    </div>
                </div>
                <div class="headImg_con_r">
                    <div style="height:20px;"></div>
                    <div class="headImg_con_r_yl">预览：</div>
                    <div style="height:30px;"></div>
                    <div class="headImg_con_r_preview_s">
                        <div id="imgsb" style="width:60px;height:60px;overflow: hidden;">
                            {{--<img style="width: 100%;height:100%" src="{{asset(\Auth::user()->pic)}}" alt="">--}}
                            <img style="width: 100%;height:100%" src="{{asset('home/image/personCenter/unload.png')}}" alt="">
                        </div>
                    </div>
                    <div class="headImg_con_r_preview_s_info">60*60</div>
                    <div style="height:20px;"></div>
                    <div class="headImg_con_r_preview_s2">
                        <div id="imgsc" style="width:100px;height:100px;overflow: hidden;">
                            {{--<img style="width: 100%;height:100%" src="{{asset(\Auth::user()->pic)}}" alt="">--}}
                            <img style="width: 100%;height:100%" src="{{asset('home/image/personCenter/unload.png')}}" alt="">
                        </div>
                    </div>
                    <div class="headImg_con_r_preview_s_info">100*100</div>
                </div>
            </div>
            <div class="headImg_foot">
                <div class="headImg_foot_selImg">
                    <div class="sel_btn">选择图片</div>
                    <input id="file_upload"  name="file_upload" type="file" multiple="false" value="" />
                </div>
                <div class="headImg_foot_cutImg">
                    <div class="sel_btn saveImg">保存头像</div>
                </div>
            </div>
        </div>



        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            //初始化验证变量
            var checkPhone =false;

            //onSubmit
            function postcheck(){
                review();
                if(checkPhone){
                    return true;
                }else{
                    return false;
                }
            }

            //再次检查添加信息
            function review(){
                $("input[name='phone']").trigger('blur');
            }

            $(function () {
                //Ajax提交，发送_token
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });

                //验证手机号唯一
                $("input[name='phone']").blur(function () {
                    var obj = $(this);
                    var phone = obj.val();
                    obj.next('span').html('');
                    var original = $("input[name='oldPhone']").val();//获取原来的手机号
                    if(original != phone){
                        if(!phone.match(/^[1][358][0-9]{9}$/) && !phone.match(/^[1][7][07][0-9]{8}$/)){//格式错误
                            obj.next('span').html('* 手机号格式错误');
                            checkPhone = false;
                        }else{//验证唯一性
                            $.ajax({
                                type: "post",
                                url: "{{url('admin/users/unique/users/phone')}}",
                                data: 'phone=' + phone,
                                dataType: 'json',

                                success: function (data) {
                                    var str = '';
                                    if (data.status) {
                                        str += '* 该手机号码已存在!';
                                        checkPhone = false;
                                    }else{
                                        checkPhone = true;
                                    }
                                    obj.next('span').html(str);
                                }
                            })
                        }
                    }else{
                        obj.next('span').html('');
                        checkPhone = true;
                    }

                })

                //省市联动
                $("select[name='provinceId']").change(function(){
                    var code = $(this).val();
                    var str = '<option value="">-请选择-</option>';
                    $("select[name='cityId']").html('<option value="">-请选择-</option>');
                    $.ajax({
                        type: "post",
                        url: "{{url('admin/users/province')}}",
                        data: 'code='+code,
                        dataType: 'json',

                        success: function (result) {
                            if (result.status === true) {
                                $.each(result.city, function (i, val) {
                                    str += '<option value="' + val.code + '">' + val.name + '</option>';
                                })
                                $("select[name='cityId']").html(str);
                            }

                        }
                    });
                })


                //生日插件
                $.ms_DatePicker({
                    YearSelector: ".sel_year",
                    MonthSelector: ".sel_month",
                    DaySelector: ".sel_day"
                });
                $.ms_DatePicker();





                //头像编辑框 显示
                $('.right_head_img_upload').click(function(){
                    $('.headImg').removeClass('hide');
                });

                $('.headImg_tit_r').click(function(){
                    $('.headImg').addClass('hide');
                })
                //头像上传
                var uploadify_onSelectError = function(file, errorCode, errorMsg) {
                    var msgText = "上传失败\n";
                    switch (errorCode) {
                        case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
                            //this.queueData.errorMsg = "每次最多上传 " + this.settings.queueSizeLimit + "个文件";
                            msgText += "每次最多上传 " + this.settings.queueSizeLimit + "个文件";
                            break;
                        case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
                            msgText += "文件大小超过限制( " + this.settings.file_size_limit + " )";
                            break;
                        case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
                            msgText += "文件大小为0";
                            break;
                        case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
                            msgText += "文件格式不正确，仅限 " + this.settings.file_types;
                            break;
                        default:
                            msgText += "错误代码：" + errorCode + "\n" + errorMsg;
                    }
                    alert(msgText);
                };


                //上传头像
                var img = '';
                var imgb = '';
                var imgc = '';

                var x = 0;
                var y = 0;
                var w = 0;
                var h = 0;

                var imgsrc = '';

                $('#file_upload').uploadify({
                    'swf'      : '/home/css/personCenter/uploadify.swf',
                    'uploader' : '/member/addImg',
                    'buttonText' : '选择图片',
                    'post_params' : {
                        '_token' : $('meta[name="csrf-token"]').attr('content')
                    },
                    'file_size_limit' : '5MB',
                    'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;*.gif ",
                    'overrideEvents'  : ['onSelectError'],
                    'onSelectError' : uploadify_onSelectError,
                    'onUploadSuccess' : function(file, data, response) {
                        var data = eval("("+data+")");
                        imgsrc = data.src;
                        img = "<img id=\"imghead\" src='"+data.src+"'>";
                        imgb ="<img id=\"preview\" src='"+data.src+"'>";
                        imgc ="<img id=\"preview2\" src='"+data.src+"'>";
                        $('#imgs').html(img);
                        $('#imgsb').html(imgb);
                        $('#imgsc').html(imgc);

                        w = 0;
                        cutImg(data.width,data.height);
                    }
                });

                function cutImg(boundx,boundy){

                    jQuery('#imghead').Jcrop({
                        aspectRatio: 1,
                        onSelect: showPreview, //选中区域时执行对应的回调函数
                        onChange: showPreview, //选择区域变化时执行对应的回调函数
                    });

                    function showPreview(coords)
                    {
                        var rx = 60 / coords.w;
                        var ry = 60 / coords.h;
                        var rx2 = 100 / coords.w;
                        var ry2 = 100 / coords.h;

                        $('#preview').css({
                            width: Math.round(rx * boundx) + 'px',
                            height: Math.round(ry * boundy) + 'px',
                            marginLeft: '-' + Math.round(rx * coords.x) + 'px',
                            marginTop: '-' + Math.round(ry * coords.y) + 'px'
                        });

                        $('#preview2').css({
                            width: Math.round(rx2 * boundx) + 'px',
                            height: Math.round(ry2 * boundy) + 'px',
                            marginLeft: '-' + Math.round(rx2 * coords.x) + 'px',
                            marginTop: '-' + Math.round(ry2 * coords.y) + 'px'
                        });

                        //jQuery('#x').val(coords.x); //选中区域左上角横
                        //jQuery('#y').val(coords.y); //选中区域左上角纵坐标
                        //jQuery("#x2").val(coords.x2); //选中区域右下角横坐标
                        //jQuery("#y2").val(coords.y2); //选中区域右下角纵坐标
                        //jQuery('#w').val(coords.w); //选中区域的宽度
                        //jQuery('#h').val(coords.h); //选中区域的高度

                        x = coords.x;
                        y = coords.y;
                        w = coords.w;
                        h = coords.h;

                    }


                }

                function checkCoords()
                {
                    if (w>0) return true;
                    alert('请选择需要裁切的图片区域.');
                    return false;
                }

                $('.saveImg').click(function(){
                    if(checkCoords()){
                        $.ajax({
                            type: "post",
                            url: "/member/trimImg",
                            data:{imgsrc:imgsrc,x:x,y:y,w:w,h:h},
                            async:false,
                            success: function(data){
                                $("#pic").val(data);
                                $("#showImg").attr('src',data);
                                $('#imgs').html("<div style=\"height:50px;\"></div><img id=\"imghead\" style=\"\" src=\"{{asset('home/image/personCenter/unload.png')}}\">");
                                $('.headImg').addClass('hide');
                            }
                        });
                    }
                })
            });
        </script>
    </div><!-- /.main-content -->
@endsection
@section('js')
    <script language="javascript" type="text/javascript" src="{{asset('admin/js/users/birthday.js') }}"></script>
    <script type="text/javascript" src="{{asset('home/js/personCenter/Jcrop.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/personCenter/jquery.uploadify.js')}}"></script>
@endsection