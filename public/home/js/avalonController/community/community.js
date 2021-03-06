


avalon.directive('newyincang', {
    update: function (value) {
        // 超出部分隐藏(新闻资讯)
        $('.new_content_font div').each(function(){
            var maxwidth=30;
            if($(this).html().length>maxwidth){
                $($(this)).html($($(this)).html().substring(0,maxwidth));
                $($(this)).html($($(this)).html()+'…');
            }
        });
    }
});


avalon.directive('xueyuan', {
    update: function (value) {
        // 超出部分隐藏(新闻资讯)
        $('.newstudent_name div').each(function(){
            var maxwidth=5;
            if($(this).html().length>maxwidth){
                $($(this)).html($($(this)).html().substring(0,maxwidth));
                $($(this)).html($($(this)).html()+'…');
            }
        });

    }
});





//图片放大(热门视频)
avalon.directive('bigimg', {
    update: function (value) {
        var element = this.element;
        var w1 = element.width;
        var h1 = element.height;
        var w2 = w1 + 40;
        var h2 = h1 + 40;
        $('.big_img').hover(function(){
            $(this).stop().animate({height: h2, width: w2, left: "-20px", top: "-20px"}, 'fast');
        },function () {
            $(this).stop().animate({height: h1, width: w1, left: "0px", top: "0px"}, 'fast');
        })
    }
});




//鼠标悬浮显示(最新学员)
 avalon.directive('showhideleft',{
     update: function (value){
         $('.newstudent').mouseover(function(){
             var fenyeover = $('#fenyeover').val();
             if(fenyeover > 6){
                 $('.newstudent_left_img').removeClass('hide');
                 $('.newstudent_right_img').removeClass('hide');
             }
         })
         $('.newstudent').mouseout(function(){
             var fenyeover = $('#fenyeover').val();
             if(fenyeover > 6){
                 $('.newstudent_left_img').addClass('hide');
                 $('.newstudent_right_img').addClass('hide');
             }
         })
     }
 });




define([],function(){

    var model = avalon.define({
        $id: 'community',
        theteacherlisturl : '/community/newdetail/',
        hotvideourl: '/community/videodetail/',
        //名师主页路由
        teacherhomepage : '/lessonComment/teacher/',
        //学员主页路由
        studenthomepage : '/lessonComment/student/',


        //名师
        theteacherlist: [],
        getteacher:function(){
            $.ajax({
                url : '/community/getteacher',
                type : 'get',
                dataType : 'json',
                success: function(response){
                    if(response.statuss){
                        model.theteacherlist = response.data;
                    }
                },
            })
        },


        //新闻资讯
        newlist :[],
        getnewData:function(){
            $.ajax({
                url : '/community/getlist',
                type : 'get',
                dataType : 'json',
                success: function(response){
                    if(response.statuss){
                        model.newlist = response.data;
                    }
                },
            })
        },


        //最新学员
        studentlist: [],
        getstudent:function(){
            $('#demo').pagination({
                dataSource: function(done) {
                    $.ajax({
                        type: 'GET',
                        url : '/community/getstudent',
                        dataType : 'json',
                        success: function(response) {
                            if(response.statuss){
                                done(response.data);
                                //console.log(response.data.length);
                                var datalength = response.data.length;
                                var str = '<input type="hidden" value="'+datalength+'"  id="fenyeover"  name="fenyeover"  class="fenyeover" >';
                                $('#kongbai').html(str);
                            }
                        }
                    });
                },
                pageSize: 6,
                className:"paginationjs-theme-blue",
                showPageNumbers: false,
                showNavigator: false,
                callback: function(data) {
                    if(data){
                        model.studentlist = data;
                    }

                }
            })


        },



        //最热视频
        hotvideo :[],
        Yes: false,
        gethotData:function(){
            model.Yes = false;
            $.ajax({
                url : '/community/gethotvideo',
                type : 'get',
                dataType : 'json',
                success: function(response){
                    if(response.statuss){
                        model.hotvideo = response.data;
                        model.Yes = true;
                    }
                },
            })
        },

    });

    return model;
});