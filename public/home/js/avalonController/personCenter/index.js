/**
 * Created by LT on 2016/6/29.
 */
avalon.directive('imgbig', {
    update: function (value) {
        var element = this.element;
        var w1 = element.width;
        var h1 = element.height;
        var w2 = w1 + 40;
        var h2 = h1 + 40;
        $('.img_big').hover(function(){
            $(this).stop().animate({height: h2, width: w2, left: "-20px", top: "-20px"}, 'fast');
        },function () {
            $(this).stop().animate({height: h1, width: w1, left: "0px", top: "0px"}, 'fast');
        })
    }
});

define(['/famousTeacher/courseTeacher','/teacherStudent/course','/famousTeacher/collectionTeacher','/teacherStudent/collection','/famousTeacher/myFocusTeacher','/famousTeacher/myFansTeacher','/notice', '/teacherStudent/comment', '/teacherStudent/commentCourse','/teacherStudent/myOrders','/famousTeacher/waitComment','/famousTeacher/completeComment'], function (courseTeacher,course,collectionTeacher,collection,myFocusTeacher,myFansTeacher,notice,comment,commentCourse,myOrdersStudent,waitCommentController,completeCommentController) {

    var sideBar = avalon.define({
        $id: 'sideBar',
        phone:'',
        code:'',
        checkPhone:false,
        checkCode:false,
        sendAgain:true,
        newphone:'',
        newcode:'',
        checkNewPhone:false,
        checkNewCode:false,
        sendAgainb:true,
        //display:true,
        //弹出层
        popUp: false,
        noticeId : null,
        commentId : null,
        //我的订单  弹出层
        refundableAmount:'',
        applyRefund  : {},
        refundContent: '',
        refundType   : '',
        noReadNotice : false,
        noReadComment : false,
        selectChange : function(a){
            sideBar.refundType = a

            //console.log(sideBar.refundType + '___');
        },
        goToLesson:function(commentId){
            $.ajax({
                url : '/lessonSubject/getLessonStatus/' + commentId,
                type : 'GET',
                dataType : 'json',
                success: function(response){
                    if(response.status){
                        location.href = "/lessonComment/detail/" + commentId;
                    }else{
                        location.href = '/lessonSubject/lessonFalse';
                    }
                }
            })
        },
        //sideBar.applyRefund.refundableAmount = response.data;

        popUpSwitch: function(value,needId) {
            if(value == 'deleteNotice'){ //获取删除的ID
                sideBar.noticeId = needId;
            }
            if(value == 'sureNotice'){ // 执行删除通知
                $.ajax({
                    url : '/member/deleteNotice',
                    type : 'POST',
                    dataType : 'json',
                    data : {id : sideBar.noticeId},
                    success: function(response){
                        if(response.status){
                            notice.notice.getNoticeInfo(sideBar.mineUsername);
                            sideBar.popUp = false;
                        }
                    }
                })
            }
            if(value == 'deleteComment'){
                sideBar.commentId = needId;
            }
            if(value == 'sureComment'){ // 执行删除评论回复
                $.ajax({
                    url : '/member/deleteComment',
                    type : 'POST',
                    dataType : 'json',
                    data : {id : sideBar.commentId},
                    success: function(response){
                        if(response.status){
                            comment.comment.getCommentInfo(sideBar.mineUsername);
                            sideBar.popUp = false;
                        }
                    }
                })
            }


            if(needId == 1){
                sideBar.refundableAmount = '';
                sideBar.refundContent = '';
                sideBar.refundType = '';
                $('.select_require_msg').html('');
                $('.bot_span_last').html('请选择退款原因');
                $('.last').addClass('hide');
                //console.log(sideBar.refundType);
            }
            //我的订单弹窗

            if(value == 'applyRefund') {
                sideBar.applyRefund = needId;
                //window.location.hash = 'myOrders';
                //console.log(window.location.hash);

                //console.log(sideBar.applyRefund);
                //if(sideBar.applyRefund.orderType == 0) {
                //    //console.log(sideBar.applyRefund);
                //    $.ajax ({
                //        url      : '/member/applyRefund',
                //        type     : 'POST',
                //        dataType : 'json',
                //        data     : { courseId : sideBar.applyRefund.courseId, userId : sideBar.applyRefund.userId, payPrice : sideBar.applyRefund.payPrice},
                //        success  : function ( response ) {
                //            if ( response.type ) {
                //                sideBar.refundableAmount = response.data;
                //                //console.log(sideBar.applyRefund.refundableAmount);
                //            }else {
                //                sideBar.refundableAmount = 0;
                //            }
                //        }
                //    })
                //}else if ( sideBar.applyRefund.orderType == 2) {
                //    //console.log(sideBar.applyRefund);
                //    sideBar.refundableAmount = sideBar.applyRefund.payPrice;

                //}
                //console.log(sideBar.applyRefund);

            }

            //提交退款申请
            if(value == 'submitApply') {

                if( sideBar.refundType == ''){
                    $('.select_require_msg').html('亲，请选择退款原因！');
                    return;
                }

                $.ajax ({
                    url      : '/member/submitApply',
                    type     : 'POST',
                    dataType : 'json',
                    data     : {id:sideBar.applyRefund.id ,refundType : sideBar.refundType,orderTitle:sideBar.applyRefund.orderTitle,orderSn:sideBar.applyRefund.orderSn,username:sideBar.applyRefund.userName,refundContent:sideBar.refundContent,refundAmount:sideBar.applyRefund.price},
                    success  : function ( response ) {
                        //alert( response.msg );
                        if ( response.type ) {
                            sideBar.popUp = false;
                            myOrdersStudent.myOrdersStudent.getMyOrdersInfo();
                            sideBar.refundableAmount = '';
                            sideBar.selectChange('');
                            sideBar.refundContent = '';
                            $('.select_require_msg').html('');
                            $('.bot_span_last').html('请选择退款原因');
                            $('.last').addClass('hide');
                        }else{
                            sideBar.popUp = false;
                        }

                    }
                })
            }


            sideBar.popUp = value;
        },
        //选项卡
        tabStatus: '',
        changeTab:function(value,type){
            //锚点赋值
            window.location.hash = value;
            //console.log(window.location.hash);
            if(value == 'lessonSubject'){
                if(type == 'teacher'){
                    courseTeacher.courseTeacher.courseInfo.length == '0' ? courseTeacher.courseTeacher.getCourseInfo(2,1) : courseTeacher.courseTeacher.courseInfo;
                }else{
                    course.course.courseInfo.length == '0' ? course.course.getCourseInfo(1,1) : course.course.courseInfo;
                }
            }
            if(value == 'lessonComment'){
                commentCourse.commentCourse.commentCourseInfo.length == '0' ? commentCourse.commentCourse.getCommentCourse(sideBar.mineUserId,1) : commentCourse.commentCourse.commentCourseInfo;
            }
            if(value == 'lessonStore'){
                if(type == 'teacher'){
                    collectionTeacher.collectionTeacher.collectionInfo.length == '0' ? collectionTeacher.collectionTeacher.getCollectionInfo() : collectionTeacher.collectionTeacher.courseInfo;
                }else{
                    collection.collection.collectionInfo.length == '0' ? collection.collection.getCollectionInfo() : collection.collection.courseInfo;
                }
            }
            if(value == 'wholeNotice'){
                notice.notice.noticeInfo.length == '0' ? notice.notice.getNoticeInfo(sideBar.mineUsername) : notice.notice.noticeInfo;
                notice.notice.isRead ? notice.notice.changeNoticeStatus() : '';
                notice.notice.isRead ? sideBar.findHaveNotice() : '';
                sideBar.noReadNotice = false;
            }
            if(value == 'commentAnswer'){
                comment.comment.commentInfo.length == '0' ? comment.comment.getCommentInfo(sideBar.mineUsername) : comment.comment.commentInfo;
                comment.comment.isRead ? comment.comment.changeNoticeStatus() : '';
                comment.comment.isRead ? sideBar.findHaveNotice() : '';
                sideBar.noReadComment = false;
            }
            if(value == 'myFocus'){
                    myFocusTeacher.myFocusTeacher.myFocusList.length == '0' ? myFocusTeacher.myFocusTeacher.getMyFocusInfo() : myFocusTeacher.myFocusTeacher.myFocusList;
            }

            if(value == 'myFans' || value == 'myFriends'){
                myFansTeacher.myFansTeacher.myFansList.length == '0' ? myFansTeacher.myFansTeacher.getMyFansInfo() : myFansTeacher.myFansTeacher.myFansList;
            }

            if(value == 'myOrders'){
                myOrdersStudent.myOrdersStudent.myOrdersList.length == '0' ? myOrdersStudent.myOrdersStudent.getMyOrdersInfo() : myOrdersStudent.myOrdersStudent.myOrdersList;
            }

            if(value == 'waitComment'){
                waitCommentController.waitCommentController.waitCommentList.length == '0' ? waitCommentController.waitCommentController.getCommentInfo() : waitCommentController.waitCommentController.waitCommentList;

            }

            if(value == 'sureComment'){
                completeCommentController.completeCommentController.completeCommentList.length == '0' ? completeCommentController.completeCommentController.getCompleteCommentInfo(type) : completeCommentController.completeCommentController.completeCommentList;
            }
            sideBar.tabStatus = value;
        },
        //修改
        phoneIndex:'changePhone',
        changePhone:function(value){
            sideBar.phoneIndex = value;
        },
        //下一步
        next:'checkAuth',
        changeNext:function(value){

            if(value == 'next1'){
                if(sideBar.checkPhone && sideBar.checkCode) {
                    $(".right_checkPhone_third div:first-child").next().addClass('bottom_line_blue').siblings().removeClass('bottom_line_blue');
                    sideBar.next = value;
                }
            }else if(value == 'success_next'){
                if(sideBar.checkNewPhone && sideBar.checkNewCode){
                    $.ajax({
                        type: "post",
                        url: "/member/changePhone",
                        data:{phone:sideBar.newphone},
                        // async:false,
                        success: function(data){
                            if(data == 1){
                                $(".right_checkPhone_third div:last-child").addClass('bottom_line_blue').siblings().removeClass('bottom_line_blue');
                                sideBar.next = value;
                            }else if(data == 2){
                                alert('修改失败');
                            }
                        }
                    });

                }
            }

        },
        checkHave:function(phone){
            $.ajax({
                type: "post",
                url: "/index/getCheckUphone",
                data:{phone:phone},
                // async:false,
                success: function(data){
                    if(data == 2){  //1手机号存在 ，2手机号不存在
                        sideBar.checkPhone = false;
                        $('.Msgaa').html('* 该手机号码尚未注册');
                    }else{
                        sideBar.checkPhone = true;
                        $('.Msgaa').html(' ');
                    }
                }
            });
        },
        checkHaveb:function(phone){
            $.ajax({
                type: "post",
                url: "/index/getCheckUphone",
                data:{phone:phone},
                // async:false,
                success: function(data){
                    if(data == 1){  //1手机号存在 ，2手机号不存在
                        sideBar.checkNewPhone = false;
                        $('.Msgcc').html('* 该手机号码已被注册');
                    }else{
                        sideBar.checkNewPhone = true;
                        $('.Msgcc').html(' ');
                    }
                }
            });
        },
        getCodo:function(){
            if(sideBar.checkPhone && sideBar.sendAgain){
                $.ajax({
                    type: "get",
                    url: "/index/getMessage/"+sideBar.phone,
                    // async:false,
                    success: function(data){
                        // if(data.type== true){
                            // code = data.info;
                        // }else{
                            // alert('验证码获取失败');
                        // }
                    }
                });
                // console.log('点击');
                //计数60s
                var countdown = 90;
                sideBar.sendAgain = false;//重新发送按钮 不能点击
                var myTime = setInterval(function() {
                    countdown--;
                    $('.getyzm').html(countdown); // 通知视图模型的变化
                    if(countdown == 0){
                        sideBar.sendAgain = true;//重新发送按钮 可以点击
                        $('.getyzm').html('重发');
                        clearInterval(myTime);
                    }
                }, 1000);
            }
        },
        getCodob:function(){
            if(sideBar.checkNewPhone && sideBar.sendAgainb){
                $.ajax({
                    type: "get",
                    url: "/index/getMessage/"+sideBar.newphone,
                    // async:false,
                    success: function(data){
                        // if(data.type== true){
                            // codeb = data.info;
                        // }else{
                            // alert('验证码获取失败');
                        // }
                    }
                });
                // console.log('点击');
                //计数60s
                var countdown = 90;
                sideBar.sendAgainb = false;//重新发送按钮 不能点击
                var myTime = setInterval(function() {
                    countdown--;
                    $('.getyzmb').html(countdown); // 通知视图模型的变化
                    if(countdown == 0){
                        sideBar.sendAgainb = true;//重新发送按钮 可以点击
                        $('.getyzmb').html('重发');
                        clearInterval(myTime);
                    }
                }, 1000);
            }
        },
        findHaveNotice : function(){
            $.ajax({
                url : '/member/findHaveNotice',
                type : 'POST',
                data : {username : sideBar.mineUsername},
                dataType : 'json',
                success : function(response){
                    if(response.status == 1){// 通知消息 评论回复消息
                        sideBar.noReadNotice = true;
                        sideBar.noReadComment = true;
                    }else if(response.status == 2){// 通知消息
                        sideBar.noReadNotice = true;
                    }else if(response.status == 3){// 评论回复消息
                        sideBar.noReadComment = true;
                    }else{
                        sideBar.noReadNotice = false;
                        sideBar.noReadComment = false;
                    }
                }
            })
        }
    });


    sideBar.$watch("phone", function(a, b) {//a
        if (a.length == 11){
            if (!a.match(/^1(3|5|8|7){1}[0-9]{9}$/)) {
                sideBar.checkPhone = false;
                $('.Msgaa').html('* 手机号格式错误');
            } else if (a != $('.changePhone_label_span').attr('title')) {
                sideBar.checkPhone = false;
                $('.Msgaa').html('* 请输入原绑定手机号');
            } else {
                sideBar.checkHave(a);
            }
        }
    })

    sideBar.$watch("code", function(a, b) {//a
        if(a.length == 6){
            console.log('hello');
            $.ajax({
                type: "get",
                url: "/index/checkCode/"+a,
                // async:false,
                success: function(data){
                    if(data == 1){
                        sideBar.checkCode = true;
                        $('.Msgbb').html(' ');
                    }else{
                        sideBar.checkCode = false;
                        $('.Msgbb').html('* 验证码错误');
                    }
                }
            });
        }
        // if(a != code){
        //     sideBar.checkCode = false;
        //     $('.Msgbb').html('* 验证码错误');
        // }else{
        //     sideBar.checkCode = true;
        //     $('.Msgbb').html(' ');
        // }
    })

    sideBar.$watch("newphone", function(a, b) {//a
        if (a.length == 11) {
            if (!a.match(/^1(3|5|8|7){1}[0-9]{9}$/)) {
                sideBar.checkNewPhone = false;
                $('.Msgcc').html('* 手机号格式错误');
            } else {
                sideBar.checkHaveb(a);
            }
        }
    })

    sideBar.$watch("newcode", function(a, b) {//a
        if(a.length == 6){
            $.ajax({
                type: "get",
                url: "/index/checkCode/"+a,
                // async:false,
                success: function(data){
                    if(data == 1){
                        sideBar.checkNewCode = true;
                        $('.Msgdd').html(' ');
                    }else{
                        sideBar.checkNewCode = false;
                        $('.Msgdd').html('* 验证码错误');
                    }
                }
            });
        }
        // if(a != codeb){
        //     sideBar.checkNewCode = false;
        //     $('.Msgdd').html('* 验证码错误');
        // }else{
        //     sideBar.checkNewCode = true;
        //     $('.Msgdd').html(' ');
        // }
    })

    return sideBar;
});