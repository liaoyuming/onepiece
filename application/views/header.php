<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo "$base/$css";?>" />
		<title>类详情</title>
		<style type="text/css">
			body 
			{ 
				padding-top: 58px; 
			}
			#click
			{
				padding-right: 40px;
			}
			.navbar-text
			{
				font-size: 20px;
				padding-right: 0px;
				font-family: "微软雅黑";
				line-height: 0px;
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
			.alert
			{
				font-size:5px;
				padding-top: 40px;
				margin-left: 390px;
				width:30px;
				height:10px;
				
			}	
		</style>
		<script src="<?php echo $base."js/jquery-2.1.0.js";?>"></script>
        <script src="<?php echo $base."js/bootstrap.min.js";?>"></script>
        <style type="text/javascript" >
            function login()
            {	
            	var my2=document.getElementById(myModal2);
            	alert(my2);
            	my2.style.aria-hidden="true";
            }
            function resist()
            {
            	var my=document.getElementById(myModal);
            	alert(my);
            	my.style.aria-hidden="true";
            }
			function check_sign_in(){
				var username = document.getElementById(username);
				var password = document.getElementById(password);
			}
        </style>
	</head>
	<body>
<?php if(!isset($_SESSION['username'])){?>
		<div class="navbar navbar-fixed-top" role="navigation"  style="background-color:rgba(251, 81, 81, 0.75);height:48px;">
		    <div class="container">
			    <a href="/onepiece/home"><img src="http://1.ingonepiece.sinaapp.com/img/3.png" alt="..." style="width:140px;margin-bottom:-25px;margin-top:"></a>
			    <p class="navbar-text text-right">
			    	<a href="#myModal" data-toggle="modal" style="color:#fff;">登录</a>
			    	<a href="#myModal2" data-toggle="modal" style="color:#fff;">注册</a>
			    </p>
		    </div>
		</div>
		<div id="myModal" class="modal hide fade" tabindex="-1" style="width: 500px;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header" style="background-color:#fff">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<img src="http://1.ingonepiece.sinaapp.com/img/m2.png" alt="..." style="width:190px;padding-top: 25px;padding-bottom: 8px;padding-left:130px;text-align:center">
			</div>
			<form id="signin" action="/onepiece/handle_sign_in" method="post">
				<div class="modal-body">
					
					<input id="username" name="username"type="text"  style="height: 35px;width: 280px;"required="required" placeholder="用户名">
					<span class="span1"></span>
					<input id="password" name="password"type="password"  style="height: 35px;width: 280px;"required="required"placeholder="请输入密码(区分大小写)">		
					<span class="span1"></span>
					<p id="username_pass_warning" style="font-size:80%;color:#ff0000;margin-left:170px;font-weight:bold" hidden="true">X 用户名或密码不正确</p>
					<button id="button_sign_in" class="btn btn-large btn-block btn-info" type="button" style="width:294px;background-image: linear-gradient(to bottom, #FC7D7D, #FC7D7D);background-color:#FC7D7D ;" >登录</button>
					<span class="span1"></span>
					<label class="checkbox">
						<input type="checkbox"> Remember me
					</label>
					<a id="click" href="#myModal2" style="color: rgb(51, 51, 51); margin-left: 200px;" data-dismiss="modal" data-toggle="modal" onclick="resist()"> 点击注册 >> </a>
				</div>
			</form>
		</div>

<div id="myModal2" class="modal hide fade" style="width: 500px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header" style="background-color:#fff">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<img src="http://1.ingonepiece.sinaapp.com/img/m2.png" alt="..." style="width:190px;padding-top:25px;padding-left:130px;padding-bottom: 8px;text-align:center">
			</div>
			<form id="signup" action="/onepiece/handle_sign_up" method="post">
				<div class="modal-body">
					<input name="username_sign_up" id="username_sign_up" type="text" placeholder="用户名" style="height: 35px;width: 280px;">
					<span class="span1"></span>
	  <!--liuyige--><span id="username_warning" style="font-size:80%;color:#ff0000;font-weight:bold;" hidden="true" >用户名已存在</span>
					<input name="pass_sign_up" id="pass_sign_up" type="password" placeholder="密码" style="height: 35px;width: 280px;">
					<span class="span1"></span>
					<input id="confirm_password"class="span5" type="password" placeholder="确认密码" style="height: 35px;width: 280px;">
					<span class="span1"></span>
					<span id="pass_warning" style="font-size:80%;color:#ff0000;font-weight:bold;" hidden="true">密码不符</span>
					<input id="code" class="span2" type="text" placeholder="验证码" style="height: 35px;width: 110px;">
					<img src="/onepiece/getCode/" id="getcode_num" title="看不清，点击换一张" style="padding-left: 10px;">
					<span class="span1"></span>
	<!--留一个-->		<span id="code_warning" style="font-size:80%;color:#ff0000;font-weight:bold;" hidden="true">验证码不正确</span>
					<button id="button_sign_up" class="btn btn-large btn-block btn-info" type="button" style="width:294px;background-image: linear-gradient(to bottom, #FC7D7D, #FC7D7D);background-color:#FC7D7D ;">注册</button>
				</div>
				<div class="modal-footer" style = "background-color: #FFF;box-shadow: 0px 1px 0px #FFF inset;border-top: 0px solid #FFF;padding-bottom: 0px;" >
					<p class="pull-right"><a  style="margin-right: 100px; color: rgb(51, 51, 51);" href="#myModal" data-dismiss="modal" data-toggle="modal" onclick="login()">已有账号 直接登录   >></a></p>
				</div>
			</form>
		</div>
<?php 
		}
		else{
			
?>				
		<div class="navbar navbar-fixed-top" role="navigation"  style="background-color:rgba(251, 81, 81, 0.75);height:48px;">
		    <div class="container">
			    <a href="/onepiece/home"><img src="http://1.ingonepiece.sinaapp.com/img/3.png" alt="..." style="width:140px;margin-bottom:-25px;margin-top:"></a>
			    <div class="navbar-text text-right dropdown">
			    	<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#fff;position: absolute;z-index:2">
			    		<?php echo $_SESSION['username'];?>
			    		<span class="caret"></span>	
			    	</a>
			    	<ul class="dropdown-menu" role="menu" style="width:60px;position: absolute;z-index:40;margin-left:935px;margin-top:20px;">
			    		<li role="presentation"><a role="menuitem" tabindex="-1" href="/onepiece/session_clear" style="text-align: center;">退出</a></li>
			    	</ul>
			    </div>
		    </div>
		  </div>
<?php
		}
?>
	</body>
	<script type="text/javascript">
	$(function(){
		//刷新验证码：
		$("#getcode_num").click(function(){ 
			$(this).attr("src","/onepiece/getCode"); 
		}); 
		//点击登录后的操作
		$("#button_sign_in").click(function(){
			var username = $("#username").val();
			var password = $("#password").val();
			$.post('/onepiece/check_sign_in',{username:username,password:password},function(msg){
				if(msg=="fail"){
					$("#username_pass_warning").show();
				}
				else
				{
					$("#signin").submit();
				}
			});
		});	
		$('.dropdown-toggle').dropdown();
		//点击注册后的操作
		$("#button_sign_up").click(function(){
			var status = 0;
			var username = $("#username_sign_up").val();
			var password = $("#pass_sign_up").val();
			var pass_confirm = $("#confirm_password").val();
			var code = $("#code").val();
			if(password!=pass_confirm){
				$("#pass_warning").show();
			}
			else{
				$("#pass_warning").hide();
				$.post('/onepiece/check_sign_up',{username:username,code:code},function(msg){
					
					var infor = msg.split("*");
					var i =0;
					while(infor[i]){
						if(infor[i]=="1"){
							$("#username_warning").show();
							$("#code_warning").hide();
							status = 1;
						}
						if(infor[i]=="2"){
							$("#code_warning").show();
							$("#username_warning").hide();
							status = 1;
						}
						i++;
					}
					if(status == 0){
						//表单提交
						$("#signup").submit();
					}
				});
			}
		});
	});
	</script>
</html>