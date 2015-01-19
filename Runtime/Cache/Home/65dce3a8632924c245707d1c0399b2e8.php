<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/whr/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/whr/App/Home/View/Public/Js/jquery.js"></script>

</head>


<body style="background:#f0f9fd;">
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    </ul>
    </div>

    <div class="mainindex">
    <div class="welinfo">
    <span><img src="/whr/App/Home/View/Public/Images/dp.png" alt="提醒" /></span>
    <b><?php echo ($_SESSION['admin']['name']); ?>你好，欢迎使用<?php echo ($_SESSION['admin']['top_name']); ?>后台管理系统</b>(
    <a href="<?php echo U('System/setting',array('id'=>$id),'');?>">帐号设置</a>
    </div>
    
    <div class="welinfo">
    <span><img  src="/whr/App/Home/View/Public/Images/time.png" alt="时间" /></span>
    <i>您上次登录的时间：<?php echo (date("Y-m-d H:i:s",$_SESSION['admin']['last_login'])); ?></i> <!-- （不是您登录的？<a href="#">请点这里</a>） -->
    </div>
    
    <div class="welinfo">
    <span><img  src="/whr/App/Home/View/Public/Images/time.png" alt="ip" /></span>
    <i>您上次登录的ip：<?php echo ($_SESSION['admin']['last_ip']); ?></i> <!-- （不是您登录的？<a href="#">请点这里</a>） -->
    </div>
    
    <div class="xline"></div>
    
    <ul class="iconlist">
    
    <li><img src="/whr/App/Home/View/Public/Images/t05.png"><p><a href="#">管理设置</a></p></li>
    <li><img src="/whr/App/Home/View/Public/Images/t05.png" /><p><a href="#">订单管理</a></p></li>
    <li><img src="/whr/App/Home/View/Public/Images/t05.png" /><p><a href="#">电子消费券管理</a></p></li>
    <li><img src="/whr/App/Home/View/Public/Images/t05.png" /><p><a href="#">文件上传</a></p></li>
    <li><img src="/whr/App/Home/View/Public/Images/t05.png" /><p><a href="#">物业管理</a></p></li>
    <li><img src="/whr/App/Home/View/Public/Images/t05.png" /><p><a href="#">会员管理</a></p></li> 
            
    </ul>
    
 
    
    <div class="xline"></div>
    <div class="box"></div>
    
    <div class="welinfo">
    <span><img src="/whr/App/Home/View/Public/Images/dp.png" alt="提醒" /></span>
    <b>WRT后台管理系统使用指南</b>
    </div>
    
    <ul class="infolist">
    <li><span>您可以快速进行文章发布管理操作</span><a class="ibtn">发布或管理文章</a></li>
    <li><span>您可以快速发布产品</span><a class="ibtn">发布或管理产品</a></li>
    <li><span>您可以进行密码修改、账户设置等操作</span><a class="ibtn">账户管理</a></li>
    </ul>
    
    <div class="xline"></div>
    
    <div class="uimakerinfo"><b>查看网站使用指南，您可以了解到多种风格的B/S后台管理界面,软件界面设计，图标设计，手机界面等相关信息</b></div>
    
    <ul class="umlist">
    <li><a href="#">如何发布文章</a></li>
    <li><a href="#">如何访问网站</a></li>
    <li><a href="#">如何管理广告</a></li>
    <li><a href="#">后台用户设置(权限)</a></li>
    <li><a href="#">系统设置</a></li>
    </ul>
    
    
    </div>
    
    

</body>

</html>