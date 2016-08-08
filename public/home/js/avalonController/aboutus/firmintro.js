//百度地图
avalon.directive('baiduditu', {
	update: function (value) {

		//创建和初始化地图函数：
		function initMap(){
			createMap();//创建地图
			setMapEvent();//设置地图事件
			addMapControl();//向地图添加控件
			addMarker();//向地图中添加marker
		}

		//创建地图函数：
		function createMap(){
			var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
			var point = new BMap.Point(116.316351,40.03402);//定义一个中心点坐标
			map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
			window.map = map;//将map变量存储在全局
		}

		//地图事件设置函数：
		function setMapEvent(){
			map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
			map.enableScrollWheelZoom();//启用地图滚轮放大缩小
			map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
			map.enableKeyboard();//启用键盘上下左右键移动地图
		}

		//地图控件添加函数：
		function addMapControl(){
			//向地图中添加缩放控件
			var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
			map.addControl(ctrl_nav);
			//向地图中添加缩略图控件
			var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
			map.addControl(ctrl_ove);
			//向地图中添加比例尺控件
			var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
			map.addControl(ctrl_sca);
		}

		//标注点数组
		var markerArr = [{title:"公司地址",content:"我的备注",point:"116.316522|40.033896",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
		];
		//创建marker
		function addMarker(){
			for(var i=0;i<markerArr.length;i++){
				var json = markerArr[i];
				var p0 = json.point.split("|")[0];
				var p1 = json.point.split("|")[1];
				var point = new BMap.Point(p0,p1);
				var iconImg = createIcon(json.icon);
				var marker = new BMap.Marker(point,{icon:iconImg});
				var iw = createInfoWindow(i);
				var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
				marker.setLabel(label);
				map.addOverlay(marker);
				label.setStyle({
					borderColor:"#808080",
					color:"#333",
					cursor:"pointer"
				});

				(function(){
					var index = i;
					var _iw = createInfoWindow(i);
					var _marker = marker;
					_marker.addEventListener("click",function(){
						this.openInfoWindow(_iw);
					});
					_iw.addEventListener("open",function(){
						_marker.getLabel().hide();
					})
					_iw.addEventListener("close",function(){
						_marker.getLabel().show();
					})
					label.addEventListener("click",function(){
						_marker.openInfoWindow(_iw);
					})
					if(!!json.isOpen){
						label.hide();
						_marker.openInfoWindow(_iw);
					}
				})()
			}
		}
		//创建InfoWindow
		function createInfoWindow(i){
			var json = markerArr[i];
			var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
			return iw;
		}
		//创建一个Icon
		function createIcon(json){
			var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
			return icon;
		}

		initMap();//创建和初始化地图


	}
});


define([], function (){


	var model = avalon.define({

		$id: 'aboutus',

		isshowbox: true,
		currentIndex: 1,

		tabs: function(index){
			model.currentIndex = index;

			//实现蓝色背景效果
			if(index == 1){
				$(this).addClass('intro').siblings().removeClass('intro');
			}else if(index == 2){
				$(this).addClass('intro').siblings().removeClass('intro');
			}else if(index == 3){
				$(this).addClass('intro').siblings().removeClass('intro');
			}else if(index == 4){
				$(this).addClass('intro').siblings().removeClass('intro');
			}else if(index == 5){
				$(this).addClass('intro').siblings().removeClass('intro');
			}else if(index == 6){
				$(this).addClass('intro').siblings().removeClass('intro');
			}
		},

		//公司介绍
		aboutus1 : [],
        getData1:function(){

				 $.ajax({
					 url : '/aboutUs/getListone/' ,
					 type : 'get',
					 dataType : 'json',
					 success: function(response){
						 if(response){
							 model.aboutus1 = response.data;
						 }
					 },
				 })
        },

		//联系我们
		aboutus2 : [],
		getData2:function(){

			$.ajax({
				url : '/aboutUs/getListtwo/' ,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						model.aboutus2 = response.data;
					}
				},
			})
		},

		//常见问题
		aboutus3 : [],
		getData3:function(){

			$.ajax({
				url : '/aboutUs/getListthree/' ,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						model.aboutus3 = response.data;
					}
				},
			})
		},


		//用户协议
		aboutus4 : [],
		getData4:function(){

			$.ajax({
				url : '/aboutUs/getListfour/' ,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						model.aboutus4 = response.data;
					}
				},
			})
		},


		//友情链接
		aboutus5 : [],
		linkurl : 'http://',
		getData5:function(){

			//$('#page').pagination({
			//	dataSource: function(done) {
			//		$.ajax({
			//			type: 'GET',
			//			url : '/aboutUs/getListfive/',
			//			dataType : 'json',
			//			success: function(response) {
			//				if(response.statuss){
			//					//console.log(response);
			//					done(response.data);
			//				}else{
            //
			//				}
			//			}
			//		});
			//	},
			//	pageSize: 2,
			//	className:"paginationjs-theme-blue",
			//	showGoInput: true,
			//	showGoButton: true,
			//	callback: function(data) {
			//		if(data){
			//			model.aboutus5 = data;
			//		}
            //
			//	}
			//})






			$.ajax({
				url : '/aboutUs/getListfive/' ,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						model.aboutus5 = response.data;
					}
				},
			})


		},


		//意见反馈
		aboutus6 : [],
		getData6:function(){

			$.ajax({
				url : '/aboutUs/getListsix/' ,
				type : 'get',
				dataType : 'json',
				success: function(response){
					if(response){
						model.aboutus6 = response.data;
					}
				},
			})
		},


	});
	model.getData1();
	model.getData2();
	model.getData3();
	model.getData4();
	model.getData5();
	model.getData6();
	return model;
});