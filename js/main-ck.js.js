$(document).ready(function(){$(function(){$("#intro, #one, #two, #three, #four, #five, #six, #seven").css({height:$(window).height()});$("#intro").css({"padding-top":$(window).height()/2-300});$("#one div.row").css({"padding-top":$(window).height()/2+50});$("#two div.row").css({"padding-top":$(window).height()/2-140});$("#three div.row").css({"padding-top":$(window).height()/2});$("#four div.row").css({"padding-top":$(window).height()/2-240});$("#five div.row").css({"padding-top":$(window).height()/2-150});$("#six div.row").css({"padding-top":$(window).height()/2-50});$("#seven div.row").css({"padding-top":$(window).height()/2-100});$(window).bind("resize",function(){$("#intro, #one, #two, #three, #four, #five, #six, #seven").css({height:$(window).height()});$("#intro").css({"padding-top":$(window).height()/2-300});$("#one div.row").css({"padding-top":$(window).height()/2+50});$("#two div.row").css({"padding-top":$(window).height()/2-140});$("#three div.row").css({"padding-top":$(window).height()/2});$("#four div.row").css({"padding-top":$(window).height()/2-300});$("#five div.row").css({"padding-top":$(window).height()/2-150});$("#six div.row").css({"padding-top":$(window).height()/2-50});$("#seven div.row").css({"padding-top":$(window).height()/2-100})})});$("#one div.info").hover(function(){$("div#fork, div#scraps, div#knife, div#fish, div#apple, div.fact").addClass("over")},function(){$("div#fork, div#scraps, div#knife, div#fish, div#apple, div.fact").removeClass("over")});$("#two div.info").hover(function(){$("#two div.fact, div#bins1, div#bins2").addClass("over")},function(){$("#two div.fact, div#bins1, div#bins2").removeClass("over")});$("#three div.info").hover(function(){$("#three div.fact, div#truck").addClass("over")},function(){$("#three div.fact, div#truck").removeClass("over")});$("#four div.info").hover(function(){$("#four div.fact, div#heat").addClass("over")},function(){$("#four div.fact, div#heat").removeClass("over")});$("#five div.info").hover(function(){$("#five div.fact").addClass("over")},function(){$("#five div.fact").removeClass("over")});$("#six div.info").hover(function(){$("#six div.fact, #can1, #can2, #lemon, #orange, #watermelon, #carrot").addClass("over")},function(){$("#six div.fact, #can1, #can2, #lemon, #orange, #watermelon, #carrot").removeClass("over")});$("input#1B, input#1A").click(function(){$("#1B").is(":checked")?$("div.vent").css("opacity",1):$("div.vent").css("opacity",0)});$("#q1 input#1A").click(function(){window.setTimeout(function(){$.scrollTo("#q2",700,{easing:"easeInOutCubic"})},700)});$("#2A, #2B, #2C, #2D").click(function(){window.setTimeout(function(){$.scrollTo("#q3",700,{easing:"easeInOutCubic"})},700)});$("#3A, #3B, #3C, #3D, #3E").click(function(){window.setTimeout(function(){$.scrollTo("#q4",700,{easing:"easeInOutCubic"})},700)});$("#4A, #4B, #4C, #4D").click(function(){window.setTimeout(function(){$.scrollTo("#q5",700,{easing:"easeInOutCubic"})},700)});$("#5A, #5B, #5C, #5D").click(function(){window.setTimeout(function(){$.scrollTo("#q6",700,{easing:"easeInOutCubic"})},700)});$("#6A, #6B, #6C, #6D").click(function(){window.setTimeout(function(){$.scrollTo("#q7",700,{easing:"easeInOutCubic"})},700)});$("#7A, #7B, #7C").click(function(){window.setTimeout(function(){$.scrollTo("#q8",700,{easing:"easeInOutCubic"})},700)});if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)){$("body").css("width","1000px");$("#intro, #one, #two, #three").css("height","2000px")}});

$('a.tabs').on('click', function(e){
	e.preventDefault();
	$(this).siblings().removeClass('active');
	$(this).addClass('active');
	var tab = $(this).attr('href').split('#');

	$('#details, #stockists').fadeOut(200, function(){
		$('#' + tab[1]).delay(250).fadeIn(200);
	});
});


$(window).on('load', function(){
	var wH = $(window).height();
	var url = window.location.href;
	if (url.indexOf('tips') > 0) {
		$('#loop').localScroll({duration:700,easing:"easeInOutCubic"});
	} else {
		$.localScroll({duration:700,easing:"easeInOutCubic"});
	}
	$('#product-intro').css('height', wH);
	$('.morelink').css('top', wH);
	$('#stockists').hide();
	$('#factone div.fact, #facttwo div.fact, #factthree div.fact').css('display', 'none');
});

$(window).on('resize', function(){
	var wH = $(window).height();
	$('#product-intro').css('height', wH);
});

$('a.accordion-toggle').on('click', function(e){
	e.preventDefault();
})


$('#factone div.info').hover(function(){
	$('#factone div.fact').css('display', 'block');
}, function(){
	$('#factone div.fact').css('display', 'none');
});

$('#facttwo div.info').hover(function(){
	$('#facttwo div.fact').css('display', 'block');
}, function(){
	$('#facttwo div.fact').css('display', 'none');
});

$('#factthree div.info').hover(function(){
	$('#factthree div.fact').css('display', 'block');
}, function(){
	$('#factthree div.fact').css('display', 'none');
});