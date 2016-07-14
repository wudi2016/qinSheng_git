﻿<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>琴晟后台管理系统</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="keywords" content="钢琴点评,钢琴网站,钢琴,名师钢琴点评" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome-ie7.min.css')}}" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		{{--<link rel="stylesheet" href="http://fonts.useso.com/css?family=Open+Sans:400,300" />--}}
		<link rel="stylesheet" href="{{asset('admin/assets/font/fonts.css')}}" />
   
		<!-- ace styles -->

		<link rel="stylesheet" href="{{asset('admin/assets/css/ace.min.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/assets/css/ace-rtl.min.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/assets/css/ace-skins.min.css')}}" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="{{asset('admin/assets/css/ace-ie.min.css')}}" />
		<![endif]-->
		@yield('css')

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="{{asset('admin/assets/js/ace-extra.min.js')}}"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="{{asset('admin/assets/js/html5shiv.js')}}"></script>
		<script src="{{asset('admin/assets/js/respond.min.js')}}"></script>
		<![endif]-->

		<script type="text/javascript" src="{{asset('home/js/layout/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{asset('avalon/avalon.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/js/avalonConfig.js')}}"></script>
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							琴晟后台管理系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						{{--<li class="grey">--}}
							{{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
								{{--<i class="icon-tasks"></i>--}}
								{{--<span class="badge badge-grey">4</span>--}}
							{{--</a>--}}

							{{--<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">--}}
								{{--<li class="dropdown-header">--}}
									{{--<i class="icon-ok"></i>--}}
									{{--还有4个任务完成--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<div class="clearfix">--}}
											{{--<span class="pull-left">软件更新</span>--}}
											{{--<span class="pull-right">65%</span>--}}
										{{--</div>--}}

										{{--<div class="progress progress-mini ">--}}
											{{--<div style="width:65%" class="progress-bar "></div>--}}
										{{--</div>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<div class="clearfix">--}}
											{{--<span class="pull-left">硬件更新</span>--}}
											{{--<span class="pull-right">35%</span>--}}
										{{--</div>--}}

										{{--<div class="progress progress-mini ">--}}
											{{--<div style="width:35%" class="progress-bar progress-bar-danger"></div>--}}
										{{--</div>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<div class="clearfix">--}}
											{{--<span class="pull-left">单元测试</span>--}}
											{{--<span class="pull-right">15%</span>--}}
										{{--</div>--}}

										{{--<div class="progress progress-mini ">--}}
											{{--<div style="width:15%" class="progress-bar progress-bar-warning"></div>--}}
										{{--</div>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<div class="clearfix">--}}
											{{--<span class="pull-left">错误修复</span>--}}
											{{--<span class="pull-right">90%</span>--}}
										{{--</div>--}}

										{{--<div class="progress progress-mini progress-striped active">--}}
											{{--<div style="width:90%" class="progress-bar progress-bar-success"></div>--}}
										{{--</div>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--查看任务详情--}}
										{{--<i class="icon-arrow-right"></i>--}}
									{{--</a>--}}
								{{--</li>--}}
							{{--</ul>--}}
						{{--</li>--}}

						{{--<li class="purple">--}}
							{{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
								{{--<i class="icon-bell-alt icon-animated-bell"></i>--}}
								{{--<span class="badge badge-important">8</span>--}}
							{{--</a>--}}

							{{--<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">--}}
								{{--<li class="dropdown-header">--}}
									{{--<i class="icon-warning-sign"></i>--}}
									{{--8条通知--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<div class="clearfix">--}}
											{{--<span class="pull-left">--}}
												{{--<i class="btn btn-xs no-hover btn-pink icon-comment"></i>--}}
												{{--新闻评论--}}
											{{--</span>--}}
											{{--<span class="pull-right badge badge-info">+12</span>--}}
										{{--</div>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<i class="btn btn-xs btn-primary icon-user"></i>--}}
										{{--切换为编辑登录..--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<div class="clearfix">--}}
											{{--<span class="pull-left">--}}
												{{--<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>--}}
												{{--新订单--}}
											{{--</span>--}}
											{{--<span class="pull-right badge badge-success">+8</span>--}}
										{{--</div>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<div class="clearfix">--}}
											{{--<span class="pull-left">--}}
												{{--<i class="btn btn-xs no-hover btn-info icon-twitter"></i>--}}
												{{--粉丝--}}
											{{--</span>--}}
											{{--<span class="pull-right badge badge-info">+11</span>--}}
										{{--</div>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--查看所有通知--}}
										{{--<i class="icon-arrow-right"></i>--}}
									{{--</a>--}}
								{{--</li>--}}
							{{--</ul>--}}
						{{--</li>--}}

						{{--<li class="green">--}}
							{{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
								{{--<i class="icon-envelope icon-animated-vertical"></i>--}}
								{{--<span class="badge badge-success">5</span>--}}
							{{--</a>--}}

							{{--<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">--}}
								{{--<li class="dropdown-header">--}}
									{{--<i class="icon-envelope-alt"></i>--}}
									{{--5条消息--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<img src="{{asset('admin/assets/avatars/avatar.png')}}" class="msg-photo" alt="Alex's Avatar" />--}}
										{{--<span class="msg-body">--}}
											{{--<span class="msg-title">--}}
												{{--<span class="blue">Alex:</span>--}}
												{{--不知道写啥 ...--}}
											{{--</span>--}}

											{{--<span class="msg-time">--}}
												{{--<i class="icon-time"></i>--}}
												{{--<span>1分钟以前</span>--}}
											{{--</span>--}}
										{{--</span>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<img src="{{asset('admin/assets/avatars/avatar3.png')}}" class="msg-photo" alt="Susan's Avatar" />--}}
										{{--<span class="msg-body">--}}
											{{--<span class="msg-title">--}}
												{{--<span class="blue">Susan:</span>--}}
												{{--不知道翻译...--}}
											{{--</span>--}}

											{{--<span class="msg-time">--}}
												{{--<i class="icon-time"></i>--}}
												{{--<span>20分钟以前</span>--}}
											{{--</span>--}}
										{{--</span>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<img src="{{asset('admin/assets/avatars/avatar4.png')}}" class="msg-photo" alt="Bob's Avatar" />--}}
										{{--<span class="msg-body">--}}
											{{--<span class="msg-title">--}}
												{{--<span class="blue">Bob:</span>--}}
												{{--到底是不是英文 ...--}}
											{{--</span>--}}

											{{--<span class="msg-time">--}}
												{{--<i class="icon-time"></i>--}}
												{{--<span>下午3:15</span>--}}
											{{--</span>--}}
										{{--</span>--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="inbox.html">--}}
										{{--查看所有消息--}}
										{{--<i class="icon-arrow-right"></i>--}}
									{{--</a>--}}
								{{--</li>--}}
							{{--</ul>--}}
						{{--</li>--}}

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{asset(\Auth::user()->pic)}}" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									{{\Auth::user()->username}}
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<i class="icon-cog"></i>--}}
										{{--设置--}}
									{{--</a>--}}
								{{--</li>--}}

								{{--<li>--}}
									{{--<a href="#">--}}
										{{--<i class="icon-user"></i>--}}
										{{--个人资料--}}
									{{--</a>--}}
								{{--</li>--}}

								<li class="divider"></li>

								<li>
									<a href="{{url('auth/logout')}}">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li class="active">
							<a href="{{url('/admin/index')}}">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 控制台 </span>
							</a>
						</li>

						{{--<li>--}}
							{{--<a href="typography.html">--}}
								{{--<i class="icon-text-width"></i>--}}
								{{--<span class="menu-text"> 文字排版 </span>--}}
							{{--</a>--}}
						{{--</li>--}}

						<!--用户管理-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-user"></i>
								<span class="menu-text"> 用户管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="usersuser">
									<a href="{{url('admin/users/userList')}}">
										<i class="icon-double-angle-right"></i>
										用户列表
									</a>
								</li>

								<li class="usersadds">
									<a href="{{url('admin/users/addUser')}}">
										<i class="icon-double-angle-right"></i>
										添加用户
									</a>
								</li>

								<li class="usersdetail">
									<a href="{{url('admin/users/personDetail')}}">
										<i class="icon-double-angle-right"></i>
										管理员信息
									</a>
								</li>

							</ul>
						</li>

						<!--名师管理-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-adjust"></i>
								<span class="menu-text"> 名师管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="usersfamousteacher">
									<a href="{{url('admin/users/famousTeacherList')}}">
										<i class="icon-double-angle-right"></i>
										名师列表
									</a>
								</li>

								{{--<li class="usersaddfamousteacher">--}}
									{{--<a href="{{url('admin/users/addFamousTeacher')}}">--}}
										{{--<i class="icon-double-angle-right"></i>--}}
										{{--分配名师--}}
									{{--</a>--}}
								{{--</li>--}}

								<li class="usersrecommendfamous">
									<a href="{{url('admin/users/recommendFamousList')}}">
										<i class="icon-double-angle-right"></i>
										名师推荐
									</a>
								</li>

							</ul>
						</li>

						<!--专题课程管理-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 课程管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="specialcoursespecialcourse">
									<a href="{{url('/admin/specialCourse/specialCourseList')}}">
										<i class="icon-double-angle-right"></i>
										专题课程列表
									</a>
								</li>

								{{--<li class="specialcoursespecialchapter">--}}
									{{--<a href="{{url('/admin/specialCourse/specialChapterList')}}">--}}
										{{--<i class="icon-double-angle-right"></i>--}}
										{{--课程章节列表--}}
									{{--</a>--}}
								{{--</li>--}}

								<li class="specialcoursespecialtype">
									<a href="{{url('/admin/specialCourse/specialTypeList')}}">
										<i class="icon-double-angle-right"></i>
										课程类型列表
									</a>
								</li>

								<li class="specialcoursespecialfeedback">
									<a href="{{url('/admin/specialCourse/specialFeedbackList')}}">
										<i class="icon-double-angle-right"></i>
										意见反馈列表
									</a>
								</li>

								<li class="specialcourserecommendspecialcourse">
									<a href="{{url('/admin/specialCourse/recommendSpecialCourseList')}}">
										<i class="icon-double-angle-right"></i>
										专题课程推荐
									</a>
								</li>

							</ul>
						</li>

						<!--点评管理-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 点评管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="commentcoursecommentcourse">
									<a href="{{url('/admin/commentCourse/commentCourseList')}}">
										<i class="icon-double-angle-right"></i>
										演奏视频列表
									</a>
								</li>

								<li class="commentcourseteachercourse">
									<a href="{{url('/admin/commentCourse/teacherCourseList')}}">
										<i class="icon-double-angle-right"></i>
										点评视频列表
									</a>
								</li>

								<li class="commentcourserecommendcourse">
									<a href="{{url('/admin/commentCourse/recommendCourseList')}}">
										<i class="icon-double-angle-right"></i>
										点评视频推荐
									</a>
								</li>

							</ul>
						</li>

						<!--订单管理-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 订单管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="orderorder">
									<a href="{{url('/admin/order/orderList')}}">
										<i class="icon-double-angle-right"></i>
										订单列表
									</a>
								</li>

								<li class="orderrefund">
									<a href="{{url('/admin/order/refundList')}}">
										<i class="icon-double-angle-right"></i>
										退款列表
									</a>
								</li>

							</ul>
						</li>


						{{--评论回复管理--}}
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 评论回复管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="commentreplyapplycomment">
									<a href="{{url('/admin/commentReply/applyCommentList')}}">
										<i class="icon-double-angle-right"></i>
										演奏点评视频评论列表
									</a>
								</li>


								<li class="commentreplycoursecomment">
									<a href="{{url('/admin/commentReply/courseCommentList')}}">
										<i class="icon-double-angle-right"></i>
										课程评论列表
									</a>
								</li>

							</ul>
						</li>



						{{--评论回复管理--}}
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 用户收藏管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="collectioncollection">
									<a href="{{url('/admin/collection/collectionList')}}">
										<i class="icon-double-angle-right"></i>
										用户收藏数据列表
									</a>
								</li>

							</ul>
						</li>



						{{--赛事管理--}}
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 赛事管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="activityactivity">
									<a href="{{url('/admin/activity/activityList')}}">
										<i class="icon-double-angle-right"></i>
										赛事管理列表
									</a>
								</li>


								<li class="activityaddactivity">
									<a href="{{url('/admin/activity/addactivity')}}">
										<i class="icon-double-angle-right"></i>
										添加赛事
									</a>
								</li>

							</ul>
						</li>



						{{--内容管理--}}
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 内容管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="contentmanagerbanner">
									<a href="{{url('/admin/contentManager/bannerList')}}">
										<i class="icon-double-angle-right"></i>
										banner列表
									</a>
								</li>

								<li class="contentmanagerpartner">
									<a href="{{url('/admin/contentManager/partnerList')}}">
										<i class="icon-double-angle-right"></i>
										合作伙伴列表
									</a>
								</li>

								<li class="contentmanagerhotvideo">
									<a href="{{url('/admin/contentManager/hotvideoList')}}">
										<i class="icon-double-angle-right"></i>
										热门视频列表
									</a>
								</li>


								{{--<li class="contentmanagernews">--}}
									{{--<a href="{{url('/admin/contentManager/newsList')}}">--}}
										{{--<i class="icon-double-angle-right"></i>--}}
										{{--新闻资讯列表--}}
									{{--</a>--}}
								{{--</li>--}}



							</ul>
						</li>



						<!--关于我们-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 关于我们 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="aboutusfirmintro">
									<a href="{{url('/admin/aboutUs/firmInt
									roList')}}">
										<i class="icon-double-angle-right"></i>
										公司介绍
									</a>
								</li>

								<li class="aboutusfriendlink">
									<a href="{{url('/admin/aboutUs/friendlinkList')}}">
										<i class="icon-double-angle-right"></i>
										友情链接
									</a>
								</li>

							</ul>
						</li>





						<!--公司后台用户管理-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 公司后台用户管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">

								<li class="companyusercompanyuser">
									<a href="{{url('/admin/companyUser/companyUserList')}}">
										<i class="icon-double-angle-right"></i>
										后台用户列表
									</a>
								</li>

								<li class="companyuseraddcompanyuser">
									<a href="{{url('/admin/companyUser/addcompanyUser')}}">
										<i class="icon-double-angle-right"></i>
										添加后台用户
									</a>
								</li>

							</ul>

						</li>




						<!--部门岗位管理-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 部门岗位管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">

								<li class="departmentpostdepartment">
									<a href="{{url('/admin/departmentPost/departmentList')}}">
										<i class="icon-double-angle-right"></i>
										部门列表
									</a>
								</li>

								<li class="departmentpostpost">
									<a href="{{url('/admin/departmentPost/postList')}}">
										<i class="icon-double-angle-right"></i>
										岗位列表
									</a>
								</li>

							</ul>

						</li>




						<!--回收站-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-trash"></i>
								<span class="menu-text"> 回收站 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="recyclerecyclecourse">
									<a href="{{url('/admin/recycle/recycleCourseList')}}">
										<i class="icon-double-angle-right"></i>
										专题课程
									</a>
								</li>

								<li class="recyclerecyclecommentcourse">
									<a href="{{url('/admin/recycle/recycleCommentCourseList')}}">
										<i class="icon-double-angle-right"></i>
										演奏视频
									</a>
								</li>

								<li class="recyclerecycleteachercourse">
									<a href="{{url('/admin/recycle/recycleTeacherCourseList')}}">
										<i class="icon-double-angle-right"></i>
										点评视频
									</a>
								</li>

								<li class="recyclerecycleorder">
									<a href="{{url('/admin/recycle/recycleOrderList')}}">
										<i class="icon-double-angle-right"></i>
										订单
									</a>
								</li>

							</ul>
						</li>




					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				@yield('content')

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; 选择皮肤</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl">切换到左边</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								切换窄屏
								<b></b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<!--<script src="assets/js/jquery-2.0.3.min.js"></script>-->
		<script src="{{asset('admin/assets/js/jquery-2.0.3.min.js')}}"></script>
		

		<!-- <![endif]-->

		<script>
			var url = window.location.href;
			var param = url.split('admin/');
			var route = (param[param.length - 1]).toLowerCase();
			var first = route.split('/')[(route.split('/').length - 2)];
//			alert(first);
			var second = route.split('/')[(route.split('/').length - 3)];
			if(route.match(/\//g)){
				if (route.match(/\//g).length == '1') { // 一个‘/’
					route = route.split('/')[route.split('/').length - 1];
//					alert(route);
					if (route.indexOf('?') > 0) { // 一个‘/’ 一个‘？’
						var real = route.split('?')[route.split('?').length - 2];
						if (first == 'resource') { // 资源多级菜单
							$('.' + first + real.slice(0, -4)).parent().parent().parent().parent().parent().addClass('open');
							$('.' + first + real.slice(0, -4)).parent().parent().parent().parent().addClass('open');
							$('.' + first + real.slice(0, -4)).parent().parent().parent().parent().parent().css('display', 'block');
							$('.' + first + real.slice(0, -4)).parent().parent().parent().css('display', 'block');
							$('.' + first + real.slice(0, -4)).parent().parent().addClass('open');
							$('.' + first + real.slice(0, -4)).parent().parent().css('display', 'block');
							$('.' + first + real.slice(0, -4)).parent().css('display', 'block');
							$('.' + first + real.slice(0, -4)).addClass('active');

							$('.' + first + real.slice(4)).parent().parent().parent().parent().parent().addClass('open');
							$('.' + first + real.slice(4)).parent().parent().parent().parent().addClass('open');
							$('.' + first + real.slice(4)).parent().parent().parent().parent().parent().css('display', 'block');
							$('.' + first + real.slice(4)).parent().parent().parent().css('display', 'block');
							$('.' + first + real.slice(4)).parent().parent().addClass('open');
							$('.' + first + real.slice(4)).parent().parent().css('display', 'block');
							$('.' + first + real.slice(4)).parent().css('display', 'block');
							$('.' + first + real.slice(4)).addClass('active');
						} else {
							$('.' + first + real.slice(0, -4)).parent().parent().addClass('open');
							$('.' + first + real.slice(0, -4)).parent().css('display', 'block');
							$('.' + first + real.slice(0, -4)).addClass('active');
							$('.' + first + real.slice(4)).parent().parent().addClass('open');
							$('.' + first + real.slice(4)).parent().css('display', 'block');
							$('.' + first + real.slice(4)).addClass('active');
						}
					} else { // 仅一个‘/’
						if (first == 'resource') { // 资源一个 ‘/’
							$('.' + first + route.slice(0, -4)).parent().parent().parent().parent().parent().addClass('open');
							$('.' + first + route.slice(0, -4)).parent().parent().parent().parent().addClass('open');
							$('.' + first + route.slice(0, -4)).parent().parent().parent().parent().parent().css('display', 'block');
							$('.' + first + route.slice(0, -4)).parent().parent().parent().css('display', 'block');
							$('.' + first + route.slice(0, -4)).parent().parent().addClass('open');
							$('.' + first + route.slice(0, -4)).parent().parent().css('display', 'block');
							$('.' + first + route.slice(0, -4)).parent().css('display', 'block');
							$('.' + first + route.slice(0, -4)).addClass('active');

							$('.' + first + route.slice(4)).parent().parent().parent().parent().parent().addClass('open');
							$('.' + first + route.slice(4)).parent().parent().parent().parent().addClass('open');
							$('.' + first + route.slice(4)).parent().parent().parent().parent().parent().css('display', 'block');
							$('.' + first + route.slice(4)).parent().parent().parent().css('display', 'block');
							$('.' + first + route.slice(4)).parent().parent().addClass('open');
							$('.' + first + route.slice(4)).parent().parent().css('display', 'block');
							$('.' + first + route.slice(4)).parent().css('display', 'block');
							$('.' + first + route.slice(4)).addClass('active');

						} else { // 一个‘/’
//							alert('aa');
							$('.' + first + route.slice(0, -4)).parent().parent().addClass('open');
							$('.' + first + route.slice(0, -4)).parent().css('display', 'block');
							$('.' + first + route.slice(0, -4)).addClass('active');
							$('.' + first + route.slice(4)).parent().parent().addClass('open');
							$('.' + first + route.slice(4)).parent().css('display', 'block');
							$('.' + first + route.slice(4)).addClass('active');
							$('.' + first + route.slice(3)).parent().parent().addClass('open');
							$('.' + first + route.slice(3)).parent().css('display', 'block');
							$('.' + first + route.slice(3)).addClass('active');
						}

					}
				} else if (route.match(/\//g).length == '2') { // 2个‘/’
					route = route.split('/')[route.split('/').length - 2];
					if (second == 'specialcourse') {
						if (route == 'specialchapterlist' || route == 'datalist' || route == 'adddata' || route == 'editdata' || route == 'addspecialchapter') {
							$('.specialcoursespecialcourse').parent().parent().addClass('open');
							$('.specialcoursespecialcourse').parent().css('display', 'block');
							$('.specialcoursespecialcourse').addClass('active');
						}
						$('.' + second + route.slice(0, -4)).parent().parent().parent().parent().parent().addClass('open');
						$('.' + second + route.slice(0, -4)).parent().parent().parent().parent().addClass('open');
						$('.' + second + route.slice(0, -4)).parent().parent().parent().parent().parent().css('display', 'block');
						$('.' + second + route.slice(0, -4)).parent().parent().parent().css('display', 'block');
						$('.' + second + route.slice(0, -4)).parent().parent().addClass('open');
						$('.' + second + route.slice(0, -4)).parent().parent().css('display', 'block');
						$('.' + second + route.slice(0, -4)).parent().css('display', 'block');
						$('.' + second + route.slice(0, -4)).addClass('active');

						$('.' + second + route.slice(4)).parent().parent().parent().parent().parent().addClass('open');
						$('.' + second + route.slice(4)).parent().parent().parent().parent().addClass('open');
						$('.' + second + route.slice(4)).parent().parent().parent().parent().parent().css('display', 'block');
						$('.' + second + route.slice(4)).parent().parent().parent().css('display', 'block');
						$('.' + second + route.slice(4)).parent().parent().addClass('open');
						$('.' + second + route.slice(4)).parent().parent().css('display', 'block');
						$('.' + second + route.slice(4)).parent().css('display', 'block');
						$('.' + second + route.slice(4)).addClass('active');
					} else if (route == 'show' || route == 'resetpass') {
//						$('.usersuser').parent().parent().addClass('open');
//						$('.usersuser').parent().css('display', 'block');
						$('.usersfamousteacher').parent().parent().addClass('open');
						$('.usersfamousteacher').parent().css('display', 'block');
						$('.usersfamousteacher').addClass('active');
					}else if(route == 'order'){
						alert(route);
						if (route == 'remarklist') {
							$('.orderorder').parent().parent().addClass('open');
							$('.orderorder').parent().css('display', 'block');
							$('.orderorder').addClass('active');
						}
					} else if (route == 'checkrolepermission' || route == 'addrolepermission') {
						$('.authrole').parent().parent().addClass('open');
						$('.authrole').parent().css('display', 'block');
					} else if (route == 'checkpermissions' || route == 'adduserpermission') {
						$('.authclassmanager').parent().parent().addClass('open');
						$('.authclassmanager').parent().css('display', 'block');
					} else if (route == 'detailmicrolesson') {
						$('.microlessonmicrolesson').parent().parent().addClass('open');
						$('.microlessonmicrolesson').parent().css('display', 'block');
						$('.microlessonmicrolesson').addClass('active');
					} else if (route == 'newsdetail') {
						$('.newsnews').parent().parent().addClass('open');
						$('.newsnews').parent().css('display', 'block');
						$('.newsnews').addClass('active');
					} else if (route == 'detailcomment') {
						$('.microlessonmicrolessoncomment').parent().parent().addClass('open');
						$('.microlessonmicrolessoncomment').parent().css('display', 'block');
						$('.microlessonmicrolessoncomment').addClass('active');
					} else if (route == 'listgrade' || route == 'listsubject' || route == 'editgrade' || route == 'editsubject') {
						$('.microlessonmicrolessoncategory').parent().parent().addClass('open');
						$('.microlessonmicrolessoncategory').parent().css('display', 'block');
						$('.microlessonmicrolessoncategory').addClass('active');
					} else {
						$('.' + second + route.slice(0, -4)).parent().parent().addClass('open');
						$('.' + second + route.slice(0, -4)).parent().css('display', 'block');
						$('.' + second + route.slice(0, -4)).addClass('active');
						$('.' + second + route.slice(4)).parent().parent().addClass('open');
						$('.' + second + route.slice(4)).parent().css('display', 'block');
						$('.' + second + route.slice(4)).addClass('active');
					}
				} else if (route.match(/\//g).length == '4') {
					var auth = route.split('/')[route.split('/').length - 5];
					route = route.split('/')[route.split('/').length - 1];
					$('.' + auth + route.slice(0, -4)).parent().parent().addClass('open');
					$('.' + auth + route.slice(0, -4)).parent().css('display', 'block');
					$('.' + auth + route.slice(0, -4)).addClass('active');
				} else if (route.match(/\//g).length == '3') {
					route = route.split('/')[route.split('/').length - 3];
					if(route == 'checkmanagers' || route == 'addmanager'){
						$('.schoolschoolclass').parent().parent().addClass('open');
						$('.schoolschoolclass').parent().css('display', 'block');
					}
				}
			}

		</script>

		<!--[if IE]>
<script src="{{asset('admin/assets/js/jquery-1.10.2.min.js')}}"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{asset("admin/assets/js/jquery-2.0.3.min.js")}}'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='"+{{asset("assets/js/jquery-1.10.2.min.js")}}+"'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='{{asset('admin/assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"script>");
		</script>
		<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/typeahead-bs2.min.js')}}"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="{{asset('assets/js/excanvas.min.js')}}"></script>
		<![endif]-->

		<script src="{{asset('admin/assets/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/jquery.ui.touch-punch.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/jquery.easy-pie-chart.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/flot/jquery.flot.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/flot/jquery.flot.pie.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/flot/jquery.flot.resize.min.js')}}"></script>

		<!-- ace scripts -->

		<script src="{{asset('admin/assets/js/ace-elements.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/ace.min.js')}}"></script>
		@yield('js')

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
			
			})
		</script>
		<script type="text/javascript">
			if ($('.alert').css('display') == 'block') {
				setTimeout(function () {
					$('.alert').slideUp(500);
				}, 3000);
			}
			;
		</script>
	<div style="display:none"><script src="{{asset('admin/assets/font/stat.js')}}" language='JavaScript' charset='gb2312'></script></div>
</body>
</html>

