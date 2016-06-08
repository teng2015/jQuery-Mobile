$(function(){
	// 团购开始
        $.extend($.fn,{
        fnTimeCountDown:function(d){
            this.each(function(){
                var $this = $(this);
                var o = {
                    // hm: $this.find(".hm"),
                    sec: $this.find(".sec"),
                    mini: $this.find(".mini"),
                    hour: $this.find(".hour"),
                    day: $this.find(".day"),
                    month:$this.find(".month"),
                    year: $this.find(".year")
                };
                var f = {
                    haomiao: function(n){
                        if(n < 10)return "00" + n.toString();
                        if(n < 100)return "0" + n.toString();
                        return n.toString();
                    },
                    zero: function(n){
                        var _n = parseInt(n, 10);//解析字符串,返回整数
                        if(_n > 0){
                            if(_n <= 9){
                                _n = "0" + _n
                            }
                            return String(_n);
                        }else{
                            return "00";
                        }
                    },
                    dv: function(){
                        //d = d || Date.UTC(2050, 0, 1); //如果未定义时间，则我们设定倒计时日期是2050年1月1日
                        var _d = $this.data("end") || d;
                        var now = new Date(),
                            endDate = new Date(_d);
                        //现在将来秒差值
                        //alert(future.getTimezoneOffset());
                        var dur = (endDate - now.getTime()) / 1000 , mss = endDate - now.getTime() ,pms = {
                            // hm:"000",
                            sec: "00",
                            mini: "00",
                            hour: "00",
                            day: "00",
                            month: "00",
                            year: "0"
                        };
                        if(mss > 0){
                            // pms.hm = f.haomiao(mss % 1000);
                            pms.sec = f.zero(dur % 60);
                            pms.mini = Math.floor((dur / 60)) > 0? f.zero(Math.floor((dur / 60)) % 60) : "00";
                            pms.hour = Math.floor((dur / 3600)) > 0? f.zero(Math.floor((dur / 3600)) % 24) : "00";
                            pms.day = Math.floor((dur / 86400)) > 0? f.zero(Math.floor((dur / 86400)) % 30) : "00";
                            //月份，以实际平均每月秒数计算
                            pms.month = Math.floor((dur / 2629744)) > 0? f.zero(Math.floor((dur / 2629744)) % 12) : "00";
                            //年份，按按回归年365天5时48分46秒算
                            pms.year = Math.floor((dur / 31556926)) > 0? Math.floor((dur / 31556926)) : "0";
                        }else{
                            pms.year=pms.month=pms.day=pms.hour=pms.mini=pms.sec="00";
                            // pms.hm = "000";
                            //alert('结束了');
                            return;
                        }
                        return pms;
                    },
                    ui: function(){
                        // if(o.hm){
                        //     o.hm.html(f.dv().hm);
                        // }
                        if(o.sec){
                            o.sec.html(f.dv().sec);
                        }
                        if(o.mini){
                            o.mini.html(f.dv().mini);
                        }
                        if(o.hour){
                            o.hour.html(f.dv().hour);
                        }
                        if(o.day){
                            o.day.html(f.dv().day);
                        }
                        if(o.month){
                            o.month.html(f.dv().month);
                        }
                        if(o.year){
                            o.year.html(f.dv().year);
                        }
                        setTimeout(f.ui, 1);
                    }
                };
                f.ui();
            });
        }
    });
    var tuanovertime=$("#tuan_overtime").val();
    if(tuanovertime !="")
    {
        $(".fnTimeCountDown").fnTimeCountDown(tuanovertime);
    }

    var tuanovertime2=$("#tuan_overtime2").val();
    if(tuanovertime2 !="")
    {
        $(".fnTimeCountDown").fnTimeCountDown(tuanovertime2);
    }

    // 团购结束

	//搜索---下方

	/*banner轮播 start*/
	 $('.banner').hover(function(){
	 	$('.dianList').show();
	 },function(){
	 	$('.dianList').hide();
	 });
	//JQ初始化CSS
	$('.dianList li:last').css('margin-right', 0);

	var imgKey=dianKey=0;
	var timer;
	var tupians = $('.imgList li').length;
	var firstLiClone=$('.imgList li:first').clone(true);
	$('.imgList').append(firstLiClone);

	//下一张图

	function nextFn(event){

		dianKey++;

		if (dianKey>tupians-1) {

			dianKey=0;

		}
		$('.dianList li').eq(dianKey).addClass('current').siblings().removeClass('current');

		imgKey++;
		if (imgKey>tupians) {

			//视口停留在临时工身上
			//用户以为自己看到的是第0张
			//让希望看到的是第一张，但是直接往第一张身上跳会多走一段距离
			//为了让每次都是百分之百

            $(".imgList").css("left","0");

			//要往第一张身上跳（下标从0开始）
			imgKey=1;

		};
		//移动公式：
		//0			imgKey*-100%		0
		//-100%		imgKey*-100%		1
		//-200%		imgKey*-100%		2
		//-300%		imgKey*-100%		3
		//
		var moveS=imgKey*-100;
		//alert(moveS);
		moveS=moveS+'%';
		$('.imgList').stop().animate({
			'left':moveS
		}, 500);
	}
	$('.rightBtn').click(nextFn);


	timer=setInterval(nextFn,5000);

	$('.banner').hover(function() {
		clearInterval(timer);
	}, function() {
		clearInterval(timer);
		timer=setInterval(nextFn, 5000);
	});
	//小点点切图
		$('.dianList li').hover(function(){

			var i=$(this).index();
			//控制小点
			$('.dianList li').eq(i).addClass('current').siblings().removeClass('current');

		var moveS=i*-100;
		//alert(moveS);
		moveS=moveS+'%';
		$('.imgList').stop().animate({'left':moveS}, 500);
		imgKey=dianKey=i;

		})


/*大礼包 侧滑*/
	$(".dalibao_1").hover(function(){
		$("#hover_box_st_1").css({
			"left":"200px"
		});
		$("#hover_box_st_1>ul").stop().fadeIn(500);
	},function(){
		$("#hover_box_st_1").css({
			"left":"-110px"
		});
		$("#hover_box_st_1>ul").hide();
	});
	$(".dalibao_2").hover(function(){
		$("#hover_box_st_2").css({
			"right":"200px"
		});
		$("#hover_box_st_2>ul").stop().fadeIn(500);
	},function(){
		$("#hover_box_st_2").css({
			"right":"-106px"
		});
		$("#hover_box_st_2>ul").hide();
	});
	$(".dalibao_3").hover(function(){
		$("#hover_box_st_3").css({
			"left":"200px"
		});
		$("#hover_box_st_3>ul").stop().fadeIn(500);
	},function(){
		$("#hover_box_st_3").css({
			"left":"-110px"
		});
		$("#hover_box_st_3>ul").hide();
	});
	$(".dalibao_4").hover(function(){
		$("#hover_box_st_4").css({
			"right":"200px"
		});
		$("#hover_box_st_4>ul").stop().fadeIn(500);
	},function(){
		$("#hover_box_st_4").css({
			"right":"-106px"
		});
		$("#hover_box_st_4>ul").hide();
	});

	/*footer*/
	$(".foot_right_st a").click(function(){
		$(this).css({
			"background":"#c96",
			"color":"#fff"
		})
	});

	/*特色购*/
	var cha = $('#cha').offset().top;
	var zhu = $('#zhu').offset().top;
	if($(window).scrollTop()>cha+500){
	     $("body").addClass("body");
	}else{
		$("body").removeClass("body");
	}
	$(window).scroll(function(){
	    if($(window).scrollTop()>cha+500){
	        $("body").addClass("body");
	      }else{
	      	$("body").removeClass("body");
	      }
    });


});
