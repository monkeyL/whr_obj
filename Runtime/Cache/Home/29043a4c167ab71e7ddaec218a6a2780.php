<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link rel="stylesheet" type="text/css" href="/default/App/Home/View/Public/Css/style.css">
<script type="text/javascript" src="/default/App/Home/View/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/default/App/Home/View/Public/Js/cloud.js"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 
<style type="text/css">
    li{
        position: relative;
    }
    li span{
        position: absolute;
        color: red;
    }
</style>
</head>

<body style="background-color:#1c77ac; background-image:url(/default/App/Home/View/Public/Images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
    <li><a href="#">回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    
    <div class="loginbody">
    
    <span class="systemlogo"></span> 
       
    <div class="loginbox">
    <form name="form" method="post" action="">
    <ul>
    <li><input name="username" type="text" id="username" class="loginuser" value="admin" onclick="JavaScript:this.value=''"/><span id ="username_info"></span></li>
    <li><input name="password" type="password" id="password" class="loginpwd" value="密码" onclick="JavaScript:this.value=''"/><span id ="password_info"></span></li>
    <li><input name="" type="submit" class="loginbtn" value="登录"  onclick="javascript:;"  /><label><input name="" type="checkbox" value="" checked="checked" />记住密码</label><label><a href="#">忘记密码？</a></label></li>
    </ul>
    
    </form>
    </div>
    
    </div>
    
    
    
    <div class="loginbm"><?php echo (C("web_copy")); ?></div>
	
    
</body>

</html>