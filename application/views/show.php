<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo "$base/$css";?>"/>
		<title>画板</title>
		<style type="text/css">
			body 
			{ padding-top: 58px; }
			#click
			{
				padding-right: 40px;
			}
			.navbar-text
			{
				font-size: 20px;
				padding-right: 0px;
				font-family: "微软雅黑";
			}
			.list
			{
				font-size: 25px;
				color: #000000;
				padding-left: 25px;
			}
			.nav-list
			{
				padding-top: 33px;
			}
			.btn-info
			{
				margin-left:80px ;
			}
			.checkbox
			{
				padding-top: 15px;
				margin-left: 80px;
			}
			.pic-d2
			{
				margin: 10px 20px 20px;
				padding: 10px 20px;
				
			}
			.pic-c2
			{
				border-style: dotted;
				border-width: 3px;
				border-color:#F2F2F2 ;
				height: 500px;
			}
			.pic-c3
			{
				font-size: 16px;
				color: #777777;
				padding: -100px -100px 0px 0px;
				height:0px;
			}
			.btn-loca
			{
				margin-left: 95px;
			}
			.foot-size
			{
				text-align: center;
			}
			.show_container
			{
				width: 1100px;
				margin-left: auto;
				margin-right: auto;
				height: 600px;
			}
			#btn-submit 
			{
				width: 100px;
				display: block;
				margin: -60px 1100px;
				transition: all 0.2s ease 0s;
				color: #FFF!important;
				font-family: "楷体";
				font-size: 30px;
				background-color: rgba(251, 81, 81, 0.75)!important;
				text-align: center;
				border-radius: 7px;
				padding: 10px 0px 10px 0px;
				
			}
			a:hover
			{
				opacity: 0.8;
				text-decoration:none!important;  
			}
			#btn-back 
			{
				width: 100px;
				height: 90px;
				background-image: url(../../img/back.jpg);
				display: block;
				margin: -520px -80px;
				transition: all 0.2s ease 0s;
				
			}
		</style>
		<script src="../../js/jquery-2.1.0.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
	</head>
	<body onload="pageonload()">
	<?php include "header.php"?>

		<div class="show_container">
		<!--	<p class="navbar-text pull-left">
				<a href="/onepiece/class_list/0/0" class="list">汽车</a>
				<a href="/onepiece/class_list/0/1" class="list">明星</a>
				<a href="/onepiece/class_list/0/2" class="list">风景</a>
				<a href="/onepiece/class_list/0/3" class="list">美食</a>
			</p>  -->
		    <div class="thumbnail pic-d2" align= "center">
		    	<div class="pic-c2">
		    		<canvas id="canvas" width="1000" height="500" style="border:1px solid #999;">您的浏览器不支持canvas!</canvas>
		    	</div>
		    </div><!--thumbnail pic-d2-->
		    <a  href="#" id="btn-submit" onclick="play()">播放</a>
		    <a href="<?php echo "/onepiece/picture_detail?artwork_id=".$res['artwork_id']?>" id="btn-back"></a>
		</div><!--container-->
		<footer class="foot-size"><a href="http://ingzone.com">山东大学ING工作室 Copyright © 2014</a></footer>
	</body>
	<script>
		var n = 0;
		var mycanvas = document.getElementById("canvas");
		var cxt = mycanvas.getContext('2d');
		function pageonload(){
			var objImg = new Image();
			objImg.src = "<?php echo $res['clip_before_draw']?>";
			objImg.onload = function (){
				cxt.drawImage(objImg,0,0,1100,550);//drawImage(Image,x,y,width,height)x,y:要绘制图像的左上角的位置;width,height:图像尺寸
			}
		}
		function  play(){	
			myInterval = setInterval("paint()",50);
		}
		function paint(){
			var recordxy = '<?php echo $res['coordinate']?>';
			//n为读取轨迹记录字符串时的位数，当大于轨迹记录字符串的位数时，终止定时事件
			if(n<recordxy.length)
			{
				//record_x和record_y用于存储从recordxy读出的x坐标和y坐标
				record_x = "";
				record_y = "";
				flag = recordxy.substring(n,n+1);
				
				n++;//“&”或“|”占了一个字符
			
				//获取x坐标
				for(var z=0; z<5 && !(recordxy.substring(n,n+1)==","); z++)
				{
					record_x += recordxy.substring(n,n+1);
					n++;
				}
				n++;//“，”占了一个字符
				//获取有y坐标
				for(var z=0; z<5 && !(recordxy.substring(n,n+1)=="|" || recordxy.substring(n,n+1)=="&"); z++)
				{
					record_y += recordxy.substring(n,n+1);
					n++;
				}
				//字符串转换为数字
				x1 = Number(record_x);
				y1 = Number(record_y);
				
				//判断是否起点
				if(flag=="&")
				{
					cxt.moveTo(x1,y1); 
					
				}else if(flag=="|"){

					if(n < (recordxy.length-1) && recordxy.substring(n,n+1)=="&" )
					{
						cxt.lineTo(x1,y1);
						//设置线条宽度
						cxt.lineWidth = 5;
						cxt.strokeStyle = '<?php echo $res['color']?>';
						cxt.stroke();
					}else{
						cxt.lineTo(x1,y1);
						//设置线条宽度
						cxt.lineWidth = 5;
						cxt.strokeStyle = '<?php echo $res['color']?>';
						cxt.stroke(); 
						cxt.moveTo(x1,y1); 
					}
				}
			}else{
				//清除定时事件
				clearInterval(myInterval);
			}
		}
	</script>
</html>