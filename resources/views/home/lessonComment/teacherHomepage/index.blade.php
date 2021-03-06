@extends('layouts.layoutHome')

@section('title', '名师主页')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/lessonComment/teacherHomepage/index.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/lessonSubject/detail.css') }}">
@endsection

@section('content')
	<div class="teacherHomepage ms-controller" ms-controller="userHomepage">
		<div class="teacherHomepage_crumbs">
			<a href="/">首页</a> >
			<a href="/community">名师介绍</a> >
			<a>名师主页</a>
		</div>

		<div class="teacherHomepage_introduce">
			<div class="teacherHomepage_introduce_header"><img ms-attr-src="userInfo.pic" width="100%" height="100%"></div>
			<div class="teacherHomepage_introduce_name" ms-html="userInfo.username"></div>
			<div class="teacherHomepage_introduce_compant" ms-html="userInfo.company"></div>
			<div class="teacherHomepage_introduce_videoNumber">
				<div class="teacherHomepage_introduce_number_img"><img src="{{asset('/home/image/lessonComment/teacherHomepage/fans.png')}}" width="100%" height="100%"></div>
				<div class="teacherHomepage_introduce_number_text">粉丝</div>
				<div class="teacherHomepage_introduce_number" ms-html="fansNum"></div>
			</div>
			<div class="teacherHomepage_introduce_fansNumber">
				<div class="teacherHomepage_introduce_number_img"><img src="{{asset('/home/image/lessonComment/teacherHomepage/vcr.png')}}" width="100%" height="100%"></div>
				<div class="teacherHomepage_introduce_number_text">视频</div>
				<div class="teacherHomepage_introduce_number" ms-html="videoNum"></div>
			</div>
			<div class="teacherHomepage_introduce_bottom">
				@if (Auth::check() && Auth::user() -> id != $userID)
					<div id="buttonhover" class="teacherHomepage_introduce_bottom_button" ms-buttonhover="isFollow" ms-click="followUser()"></div>
				@else
					<div id="buttonhover" class="teacherHomepage_introduce_bottom_button isFollow" style="background: none !important;"></div>
				@endif
				<div class="teacherHomepage_introduce_bottom_block" style="margin: 0;">
					<img src="{{asset('/home/image/lessonComment/teacherHomepage/sex.png')}}" width="100%" height="100%">
					<div ms-html="userInfo.sex == 2 ? '女' : '男'"></div>
				</div>
				<div class="teacherHomepage_introduce_bottom_block" ms-visible="userInfo.city">
					<img src="{{asset('/home/image/lessonComment/teacherHomepage/location.png')}}" width="100%" height="100%" style="width: 20px; height: 24px;">
					<div ms-html="userInfo.city"></div>
				</div>
				<div id="nostock" class="teacherHomepage_introduce_bottom_block" ms-attr-title="'已加入点评网' + userInfo.created_at + '天'" style="width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
					<img src="{{asset('/home/image/lessonComment/teacherHomepage/time.png')}}" width="100%" height="100%">
					<div ms-text="'已加入点评网' + userInfo.created_at + '天'"></div>
				</div>
			</div>
		</div>

		<div class="teacherHomepage_detail">
			<div class="teacherHomepage_detail_tab">
				<div id="tabs" ms-tabstatus="tabStatus" ms-click="changeTabStatus()" value="2">申请点评</div>
				<div id="tabs" ms-tabstatus="tabStatus" ms-click="changeTabStatus()" value="0">专题课程</div>
				<div id="tabs" ms-tabstatus="tabStatus" ms-click="changeTabStatus()" value="1">点评课程</div>
			</div>

			<div class="teacherHomepage_detail_content" ms-visible="tabStatus == 2">
				<div class="teacherHomepage_detail_content_title">名师介绍</div><br>
				<div class="teacherHomepage_detail_content_image" style="font-size: 18px; margin-top: 0;"><img ms-attr-src="userInfo.cover" width="100%" height="100%"></div>
				<div class="teacherHomepage_detail_content_comment">点评费用</div>
				<div class="teacherHomepage_detail_content_comment hide" ms-visible='userInfo.price' style="margin-bottom: 22px;">
					￥<span style="color: red;" ms-html="Math.ceil(userInfo.price / 100)"></span> / 次
				</div>
				<div class="teacherHomepage_detail_content_comment">点评类型</div>
				<div class="teacherHomepage_detail_content_comment" style="font-size: 18px; color: rgb(102, 102, 102); margin-bottom: 22px;">
					<img src="{{asset('/home/image/lessonComment/teacherHomepage/point.png')}}">钢琴演奏
				</div>
				@if (\Auth::check() && \Auth::user() -> type != 3)
					@if(\Auth::user() -> type != 2 && \Auth::user() -> id != $userID)
						<a ms-attr-href="[--userInfo.stock > 0 ? '/lessonComment/buy/{{$userID}}' : '#nostock'--]" class="teacherHomepage_detail_content_button" ms-applycomment="userInfo.stock">
							立即申请
							<div class="teacherHomepage_detail_content_applyTips">该老师近期没有点评名额</div>
						</a>
					@endif
				@else
					<a href="/index/login" class="teacherHomepage_detail_content_button active">立即申请</a>
				@endif
				<div style="clear: both; height: 10px;"></div>
				<div class="claer_line"></div>
				<div class="teacher_info" ms-html="userInfo.username"></div>
				<div class="teacher_info" ms-html="userInfo.company" style="font-size: 16px; color: gray;"></div>
				<div class="claer_line"></div>
				<div class="teacher_info">名师简介</div>
				<div class="teacher_introduction" ms-html="userInfo.intro"></div>
                <div class="screen1200"></div>
			</div>

			<div class="teacherHomepage_detail_special hide" ms-visible="tabStatus == 0">
				<div class="teacherHomepage_detail_content_title">专题课程</div>
				<div class="teacherHomepage_detail_special_order">
					<span ms-css-color="order.special == 0 ? '#0593EA' : 'rgb(102, 102, 102)'" ms-click="changeOrder('special', 0)">最新</span> - 
					<span ms-css-color="order.special == 1 ? '#0593EA' : 'rgb(102, 102, 102)'" ms-click="changeOrder('special', 1)">热门</span>
				</div>
				<div style="width: 100%; height: 300px; line-height: 300px; text-align: center; display: none; font-size: 16px;" ms-visible='specialLesson.size() < 1 && !loading'>暂无数据</div>
				<div class="teacherHomepage_detail_video hide" ms-visible="!loading">
					<a target="_blank" class="teacherHomepage_detail_video_block" ms-repeat="specialLesson" ms-attr-href="'/lessonSubject/detail/' + el.id">
						<div class='img' style='overflow: hidden; position: relative;' ms-attr-href="'/lessonSubject/detail/' + el.id">
							<img class='img_big' ms-attr-src="el.coursePic" width='285' height='182' ms-imgbig>
						</div>
						<div class="title" ms-html="el.courseTitle"></div>
						<div class="detail">
							<div class="time"><img src="/home/image/lessonComment/teacherHomepage/classes.png">[--el.extra--] 课时</div>
							<div class="learned"><img src="/home/image/lessonComment/teacherHomepage/classes.png">[--parseInt(el.completecount) + parseInt(el.courseStudyNum)--] 人学过</div>
						</div>
						<div class="price" ms-if="el.coursePrice > 0" ms-html="'￥ ' + Math.ceil(el.coursePrice / 100)"></div>
						<div class="price" ms-if="el.coursePrice <= 0" ms-html="'免费课程'"></div>
					</a>
				</div>
				<div class="spinner " ms-visible="loading">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>

			<div class="teacherHomepage_detail_special hide" ms-visible="tabStatus == 1">
				<div class="teacherHomepage_detail_content_title">点评课程</div>

				<div class="teacherHomepage_detail_special_order">
					<span ms-css-color="order.comment == 0 ? '#0593EA' : 'rgb(102, 102, 102)'" ms-click="changeOrder('comment', 0)">最新</span> - 
					<span ms-css-color="order.comment == 1 ? '#0593EA' : 'rgb(102, 102, 102)'" ms-click="changeOrder('comment', 1)">热门</span>
				</div>

				<div style="width: 100%; height: 300px; line-height: 300px; text-align: center; display: none; font-size: 16px;" ms-visible='commentLesson.size() < 1 && !loading'>暂无数据</div>

				<div class="teacherHomepage_detail_video hide" ms-visible="!loading">
					<a target="_blank" class="teacherHomepage_detail_video_block" ms-repeat="commentLesson" ms-attr-href="'/lessonComment/detail/' + el.id">
						<div class='img' style='overflow: hidden; position: relative;'>
							<img class='img_big' ms-attr-src="el.coursePic" width='285' height='182' ms-imgbig>
						</div>
						<div class="title" ms-html="el.courseTitle"></div>
						<div class="detail">
							<div class="time">讲师：[--el.extra--]</div>
							<div class="learned"><img src="/home/image/lessonComment/teacherHomepage/classes.png">[--parseInt(el.coursePlayView) + parseInt(el.courseStudyNum)--] 人学过</div>
						</div>
						<div class="price" ms-if="el.coursePrice > 0 && el.courseDiscount == 0" ms-html="'￥ ' + Math.ceil(el.coursePrice / 100)"></div>
						<div class="price" ms-if="el.coursePrice > 0 && el.courseDiscount > 0" ms-html="'￥ ' + Math.ceil((el.coursePrice * (el.courseDiscount / 10000)) / 100)"></div>
						<div class="price" ms-if="el.coursePrice <= 0" ms-html="'免费课程'"></div>
					</a>
				</div>

				<div class="spinner " ms-visible="loading">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>

			<div class="teacherHomepage_page" ms-visible="tabStatus == 0">
				<div class="prev" ms-visible="page.special != 1" ms-click="skip('special', false)"><</div>
				<div class="next" ms-repeat="specialCountNumber" ms-html="el" ms-page="'special'" ms-class="active: el == page.special" ms-click="skip('special', el)"></div>
				<div class="next" ms-visible="page.special <= (specialCount - 4) && specialCount >= 9">...</div>
				<div class="next" ms-html="specialCount" ms-visible="specialCount >= 9 && page.special < (specialCount - 3)"></div>
				<div class="next" ms-visible="page.special != specialCount && specialCount != 1" ms-click="skip('special', true)">></div>
				<input type="text" ms-visible="specialCount > 1" ms-duplex-number='jump' ms-visible="specialCount > 1">
				<button ms-visible="specialCount > 1" ms-click="jumping('special')">跳转</button>
			</div>

			<div class="teacherHomepage_page" ms-visible="tabStatus == 1">
				<div class="prev" ms-visible="page.comment != 1" ms-click="skip('comment', false)"><</div>
				<div class="next" ms-repeat="commentCountNumber" ms-html="el" ms-page="'comment'" ms-class="active: el == page.comment" ms-click="skip('comment', el)"></div>
				<div class="next" ms-visible="page.comment <= (commentCount - 4) && commentCount >= 9">...</div>
				<div class="next" ms-html="commentCount" ms-visible="commentCount >= 9 && page.comment < (commentCount - 3)"></div>
				<div class="next" ms-visible="page.comment != commentCount && commentCount != 1" ms-click="skip('comment', true)">></div>
				<input type="text" ms-visible="commentCount > 1" ms-duplex-number='jump'>
				<button ms-visible="commentCount > 1" ms-click="jumping('comment')">跳转</button>
			</div>
		</div>

		<!-- 遮罩层 -->
        <div class="shadow hide" ms-popup="popUp" value="close"></div>
        <!-- 删除评论弹出层 -->
        <div class="delete_comment hide" ms-popup="popUp" value="unfollow">
            <div class="top">
                <span>确认取消关注？</span>
            </div>
            <div class="bot">
                <span class="quit" ms-click="popUpSwitch(false)">取消</span>
                <span class="sure" ms-click="popUpSwitch(false, true)">确定</span>
            </div>
        </div>

		<div style="clear: both; height: 20px;" ms-if="tabStatus != 2"></div>
		<div style="clear: both; height: 150px;" ms-if="tabStatus == 2"></div>
	</div>
@endsection

@section('js')
	<script type="text/javascript">
		require(['lessonComment/directive', 'lessonComment/studentHomepage/index'], function (directive, user) {
			user.userID = {{$userID}} || null;
			user.mineID = {{$mineID}} || null;
			user.mineName = '{{$mineName}}' || null;
			user.videoUrl = '/lessonComment/getTeacherVideo';
			user.checks = {{$checks}} || null;

			user.tabStatus = 2;
			//	获取用户信息
			user.getData('/lessonComment/getTeacherInfo/' + user.userID, 'userInfo');
			//	获取好友总数
			user.getData('/lessonComment/getCount', 'fansNum', {table: 'friends', data: {toUserId: user.userID}}, 'POST');
			//	获取专题课程
			user.getData(user.videoUrl, 'specialLesson', {userid: user.userID, order: user.order.special, type: 0, page: user.page.special}, 'POST');
			//	获取专题课程总数
			user.getData('/lessonComment/getTeacherVideoCount', 'specialCount', {userid: user.userID, type: 0}, 'POST');
			//	获取点评课程
			user.getData(user.videoUrl, 'commentLesson', {userid: user.userID, order: user.order.comment, type: 1, page: user.page.comment}, 'POST');
			//	获取点评课程总数
			user.getData('/lessonComment/getTeacherVideoCount', 'commentCount', {userid: user.userID, type: 1}, 'POST');
			//	查看是否关注
			user.mineID && user.getData('/lessonComment/getFirst', 'isFollow', {table: 'friends', action: 1, data: {fromUserId: user.mineID, toUserId: user.userID}}, 'POST');

            avalon.scan();
		});
	</script>
@endsection