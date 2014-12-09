<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加开发商</title>
        <link href="/whr/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
        <!-- <link href="/whr/App/Home/View/Public/Css/select.css" rel="stylesheet" type="text/css" /> -->
        <script type="text/javascript" src="/whr/App/Home/View/Public/Js/jquery.js"></script>
        <!-- <script type="text/javascript" src="/whr/App/Home/View/Public/Js/jquery.idTabs.min.js"></script> -->
        <!-- <script type="text/javascript" src="/whr/App/Home/View/Public/Js/select-ui.min.js"></script> -->
        <!-- <script type="text/javascript" src="/whr/App/Home/View/Public/Js/kindeditor.js"></script> -->
        <script type="text/javascript">
            $(function(){
                //简单验证
                var validate = {
                    'username' : false,
                    'password' : false,
                    'password2': false
                };
                var cats_Shop=function (item,string) {
                    var prev=item.prev().text();
                    var next_on= item.next()
                    next_on.text(prev+string).css('color','red');
                    $('#skuTitle2').text(prev+string)
                    $('#skuNotice').show();
                    setTimeout( function(){
                        $( '#skuNotice' ).fadeOut();
                    }, ( 1 * 1000 ) ); 
                }
                var jiance=function (item,info) {
                    $(item).blur(function(){
                        if($.trim($(this).val()) == ''){
                            cats_Shop(item,'不能为空')
                        }else{
                            info.text('');
                        }
                    });
                }
                jiance($('#name'),$('#name_info'))
                jiance($('#password'),$('#password_info'))
                $('form').submit(function(){
                    $('#name').trigger('blur');
                    $('#password').trigger('blur');
                    if($.trim($("#name").val()) !== ''){ validate.username = true; }
                    if($.trim($("#password").val()) !== ''){ validate.password = true; }
                    if($("#password2").val()==$("#password").val()){ validate.password2 = true; }
                    else{cats_Shop($("#password2"),'要一致') }
                    var isOK = validate.username;
                    var psw=validate.password;   
                    var psw2=validate.password2;   
                    if(!isOK || !psw || !psw2){
                        return false;
                    }
                    return true;
            
                });
            })
        </script>
    </head>
    <style type="text/css">
        .sku_tip { background: none repeat scroll 0 0 rgba(0, 0, 0, 0.7);border-radius: 4px;box-shadow: 0 0 3px 3px rgba(150, 150, 150, 0.7);color: #fff;display: none;left: 50%;margin-left: -70px; padding: 5px 10px;position: fixed; text-align: center; top: 50%;z-index: 25;}

    </style>

    <body style="background: none;">

        <div class="place">
            <span>后台管理：</span>
            <ul class="placeul">
                <li><a href="#">管理员管理</a></li>
                <li><a href="#">添加管理员</a></li>
            </ul>
        </div>
        <form action="" method="post" name ="vform">
            <input type ="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                <input type ="hidden" name="action" value="<?php echo ($data["action"]); ?>">
                    <input type ="hidden" name="admin" value=<?php echo ($_SESSION['admin']['name']); ?>>
                        <div class="formbody">

                            <div class="formtitle"><span><?php echo ($data["title"]); ?></span></div>

                            <ul class="forminfo">
                                <li><label>用户名</label><input name="name" id="name" type="text" class="dfinput" value="<?php echo ($info["name"]); ?>" /><i id="name_info">名称不能超过30个字符</i></li>
                                <li><label>密码</label><input name="password" id="password" type="password" class="dfinput"  /><i id="password_info">密码不能为空</i></li>
                                <li><label>确认密码</label><input type="password" id="password2" class="dfinput" /><i id="passwd_inf2">两次密码要一致</i></li>
                                <li><label>邮箱</label><input name="email" type="text" class="dfinput"  value="<?php echo ($info["email"]); ?>"/><i></i></li>
                                <input name="add_time" type="hidden"  />


                                <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认<?php echo ($data["btn"]); ?>"  onclick="javascript:;" /></li>
                            </ul>
                            <div style="display:none" id="skuNotice" class="sku_tip">
                                <span id="skuTitle2"></span>
                            </div>
                        </div>
                        </form>

                        </body>

                        </html>