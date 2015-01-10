<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加开发商</title>
        <link href="/whr/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="/whr/App/Home/View/Public/Js/jquery-ui/css/pepper-grinder/jquery-ui.min.css">
            <!-- <link href="/whr/App/Home/View/Public/Css/select.css" rel="stylesheet" type="text/css" /> -->
            <script type="text/javascript" src="/whr/App/Home/View/Public/Js/jquery.js"></script>
            <script type="text/javascript" src="/whr/App/Home/View/Public/Js/common.js"></script>
            <script type="text/javascript">
                $(function(){

                    if($(".house_into").val()==''){ $(".house_into").text("请选择")}
                    function setout(){
                        $('.validateTips').text()
                        $('#skuNotice').show();
                        var dingshi= setTimeout( function(){
                            $( '#skuNotice' ).fadeOut();
                        }, ( 1 * 1000 ) );  
                        return dingshi;
                    } 
                    function checkInput(){
                        var bValid = true;
                        bValid = bValid && checkLength( $("#name"), "\u7528户名", 2, 16 );
                        bValid = bValid && checkLength( $("#password"), "\u5bc6码", 6, 16 )
                        bValid = bValid && checkEquals( $("#password"),$("#password2"), "\u4e24次密码输入不一致！" );
                        bValid = bValid && (checkRegexp( $("#email"), /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "\u90ae箱格式不正确！" ));
                        //          bValid = bValid && checkLength( $("#name"), "地 址", 2, 30 );
                        //bValid = bValid && checkRegexp( $("#username"), /^[a-z]([0-9a-z_])+$/i, "用户名只能是数字和字母组成" );
                        if(bValid==false){ setout(); }
                        return bValid;
                    }
                    $('form').submit(function(){
                        if(!checkInput()){
                            $('.dfinput').each(function () {
                                if($(this).val()==''){
                                    $(this).next().css("color","red");
                                    $('.errorColor').css("color","red")
                                }
                            });
                            return false;
                        }
                        return true
                    })
                    $('#village_id').bind('change',function(){
                        $(this).parent().next().css("color","#7f7f7f")
                    })
                    $(".dfinput").bind("focus",function(){
                        $('#skuNotice').hide();
                        $(this).addClass("focus");
                        $(this).next().css("color","#7f7f7f");
                        if($(this).hasClass("ui-state-error")){
                            $(this).removeClass( "ui-state-error" );
                            $(".validateTips").removeClass("errorTip").hide();	
                        }
                    }).bind("blur",function(){
                        $(this).removeClass("focus");
                        if($(this).val()==''){ 
                            $(this).next().css("color","red"); }
                        checkInput();
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
                                <li><label>确认密码</label><input type="password" name="repassword" id="password2" class="dfinput" /><i id="passwd_inf2">两次密码要一致</i></li>
                                <li><label>邮箱</label><input name="email" type="text" id="email" class="dfinput"  value="<?php echo ($info["email"]); ?>"/><i>例如：xxxx@xx.com</i></li>


                                <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认<?php echo ($data["btn"]); ?>"  onclick="javascript:;" /></li>
                            </ul>
                            <div style="display:none" id="skuNotice" class="sku_tip">
                                <span class="validateTips"></span>
                            </div>
                        </div>
                        </form>

                        </body>

                        </html>