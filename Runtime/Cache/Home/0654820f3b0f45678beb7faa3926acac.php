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
        <link rel="stylesheet" type="text/css" href="/whr/App/Home/View/Public/Css/bootstrap.min.css">
            <script src='/whr/App/Home/View/Public/Js/jquery.uploadify.min.js'></script>
            <script type="text/javascript">
                /*    $(function(){
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
                    jiance($('#address'),$('#address_info'))
                    $('form').submit(function(){
                        $('#name').trigger('blur');
                        $('#address').trigger('blur');
                        if($.trim($("#name").val()) !== ''){ validate.username = true; }
                        if($.trim($("#address").val()) !== ''){ validate.password = true; }
                        //      if($("#password2").val()==$("#password").val()){ validate.password2 = true; }
                        //  else{cats_Shop($("#password2"),'要一致') }
                        var isOK = validate.username;
                        var psw=validate.password;   
                        var psw2=validate.password2;   
                        if(!isOK || !psw){
                            return false;
                        }
                        return true;
            
                    });
                })
                 */
            </script>
    </head>
    <style type="text/css">
        .sku_tip { background: none repeat scroll 0 0 rgba(0, 0, 0, 0.7);border-radius: 4px;box-shadow: 0 0 3px 3px rgba(150, 150, 150, 0.7);color: #fff;display: none;left: 50%;margin-left: -70px; padding: 5px 10px;position: fixed; text-align: center; top: 50%;z-index: 25;}
        .pro select{width: 345px;height: 32px; }
        #val_list{width: 345px;height: 32px;  margin-left: 85px;}
    </style>

    <body style="background: none;">

        <div class="place">
            <span>后台管理：</span>
            <ul class="placeul">
                <li><a href="#">公告管理</a></li>
                <li><a href="#">添加公告</a></li>
            </ul>
        </div>
        <form action="" method="post" name ="vform">
            <input type ="hidden" name="nid" value="<?php echo ($info["nid"]); ?>">
                <input type ="hidden" name="action" value="<?php echo ($data["action"]); ?>">
                    <input type ="hidden" name="admin" value=<?php echo ($_SESSION['admin']['name']); ?>>
                        <div class="formbody">

                            <div class="formtitle"><span><?php echo ($data["title"]); ?></span></div>

                            <ul class="forminfo">
                                <li><label>公告标题</label><input name="title" id="name" type="text" class="dfinput" value="<?php echo ($info["title"]); ?>" /><i id="name_info"></i></li>
                                <li><label>公告内容</label><input name="content" id="address" type="text" class="dfinput" value="<?php echo ($info["content"]); ?>" /><i id="address_info"></i></li>
                                <li><label>所属开发商</label>
                                    <select  class="form-control" name = 'pid' style="width: 345px;height: 32px;" >
                                        <option class="cheng_in" value="<?php echo ($info["yid"]); ?>"><?php echo ($info["pname"]); ?></option>
                                        <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($list["id"]); ?>"><?php echo ($list["pname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select></li>
                                <li><label>&nbsp;</label><input name="" type="submit" class="btn btn-primary" value="确认<?php echo ($data["btn"]); ?>"  onclick="javascript:;" /></li>
                            </ul>
                            <div style="display:none" id="skuNotice" class="sku_tip">
                                <span id="skuTitle2"></span>
                            </div>
                        </div>
                        </form>
                        <script type="Text/Javascript">
                            
                        </script>
                        </body>

                        </html>