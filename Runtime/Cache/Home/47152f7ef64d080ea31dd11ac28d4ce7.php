<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加开发商</title>
        <link href="/whr/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
        <!-- <link href="/whr/App/Home/View/Public/Css/select.css" rel="stylesheet" type="text/css" /> -->
        <script type="text/javascript" src="/whr/App/Home/View/Public/Js/jquery.js"></script>
        <script type="text/javascript" src="/whr/App/Home/View/Public/Js/common.js"></script>
        <script type="text/javascript" src=/whr/App/Home/View/Public/js/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src ="/whr/App/Home/View/Public/ueditor/editor_config.js"></script>
        <script type="text/javascript" src ="/whr/App/Home/View/Public/ueditor/editor_all_min.js"></script>
        <script type="text/javascript" src='/whr/App/Home/View/Public/Js/jquery.uploadify.min.js'></script>
        <link rel="stylesheet" type="text/css" href="/whr/App/Home/View/Public/js/jquery-ui/css/pepper-grinder/jquery-ui.min.css">
            <link rel="stylesheet" type="text/css" href="/whr/App/Home/View/Public/Css/bootstrap.min.css">

                <link rel="stylesheet" href="/whr/App/Home/View/Public/Css/uploadify.css">

                    <script type="text/javascript">
                        $(function(){
                                      
                            function checkInput(){
                                var bValid = true;
                                bValid = bValid && checkLength( $("#name"), "用户名", 2, 16 );
                                //bValid = bValid && checkRegexp( $("#username"), /^[a-z]([0-9a-z_])+$/i, "用户名只能是数字和字母组成" );
                                //   bValid = bValid && checkLength( $("#password"), "密码", 6, 16 );
                                //   bValid = bValid && checkEquals( $("#password"),$("#repassword"), "2次密码输入不一致！" );
                                //   bValid = bValid && ($("#mobile").val()=="" || checkRegexp( $("#mobile"), /(^1[0-9]{10}$)|(^00[1-9]{1}[0-9]{3,15}$)/ , "手机格式不正确！" ));
                                //   bValid = bValid && ($("#email").val()=="" || checkLength( $("#email"), "邮箱", 6, 80 ));
                                //   bValid = bValid && ($("#email").val()=="" || checkRegexp( $("#email"), /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "邮箱格式不正确！" ));
                                //   bValid = bValid && checkEmpty( $("#role"), "请选择角色！" );
                                //alert(checkEmpty( $("#role"), "请选择角色！" ));
                                return bValid;
                            }
                            function setout(){
                                $('.validateTips').text()
                                $('#skuNotice').show();
                                var dingshi= setTimeout( function(){
                                    $( '#skuNotice' ).fadeOut();
                                }, ( 1 * 1000 ) );  
                                return dingshi;
                            }
                            $('form').submit(function(){
                                if(!checkInput()){
                                    setout();
                                    return false;
                                }
                                return true
                            })
                            $(".dfinput").bind("focus",function(){
                                $(this).addClass("focus");
                                if($(this).hasClass("ui-state-error")){
                                    $(this).removeClass( "ui-state-error" );
                                    $(".validateTips").removeClass("errorTip").hide();	
                                    
                                }
                            }).bind("blur",function(){
                                $(this).removeClass("focus");
                               if($(this).val()==''){  setout();   }
                                checkInput();
                            });
                        })
                    </script>
                    <style type="text/css">
                        .pro{  float: left;line-height: 30px;margin-bottom: 10px; margin-left: 5px;}
                        .pro select{width: 345px;height: 32px; }
                        .sku_tip { background: none repeat scroll 0 0 rgba(0, 0, 0, 0.7);border-radius: 4px;box-shadow: 0 0 3px 3px rgba(150, 150, 150, 0.7);color: #fff;display: none;left: 50%;margin-left: -70px; padding: 5px 10px;position: fixed; text-align: center; top: 50%;z-index: 25;}
                    </style>
                    </head>
                    <body style="background: none;">

                        <div class="place">
                            <span>后台管理：</span>
                            <ul class="placeul">
                                <li><a href="#">会员管理</a></li>
                                <li><a href="#">添加会员</a></li>
                            </ul>
                        </div>
                        <form action="" method="post" name ="vform" id="item_form">
                            <input type ="hidden" name="id" value="<?php echo ($data["id"]); ?>">
                                <input type ="hidden" name="user_id" value="<?php echo ($info["user_id"]); ?>">
                                    <input type ="hidden" name="action" id="actionSave"  value="<?php echo ($data["action"]); ?>">
                                        <input type ="hidden" name="admin" value=<?php echo ($_SESSION['admin']['name']); ?>>
                                            <div class="formbody">

                                                <div class="formtitle"><span><?php echo ($data["title"]); ?></span></div>
                                                <ul class="forminfo">
                                                    <li><label>用户名</label><input name="user_name" id="name" type="text" class="dfinput" value="<?php echo ($info["user_name"]); ?>" /><i id="name_info">名称不能超过30个字符</i></li>
                                                    <li class="pwsave"><label>密码</label><input name="password" id="password" type="password" class="dfinput" value="<?php echo ($info["name"]); ?>" /><i id="password_info">密码不能为空</i></li>
                                                    <li class="pwsave"><label>确认密码</label><input name="password2" id="password2" type="password" class="dfinput" value="<?php echo ($info["name"]); ?>" /><i id="passwd_inf2">两次密码要一致</i></li>
                                                    <li><label>地 址</label>
                                                        <span class = 'pro'>
                                                            <select name = 'province'  class="form-control" >
                                                                <option class="cheng_in" class="dfinput" value="<?php echo ($region["REGION_ID"]); ?>"><?php echo ($region["REGION_NAME"]); ?></option>
                                                                <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option class = "pro_in" value="<?php echo ($vo["region_id"]); ?>" ><?php echo ($vo["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>

                                                            <select name = 'city' style="display:none" id ="city_list" class="form-control" >
                                                                <option class = "city_in" value="<?php echo ($info["city"]); ?>"></option>
                                                            </select>

                                                            <select name = 'area' style="display:none"  id ="val_list" class="form-control"  >
                                                                <option class="area_on" value="<?php echo ($info["area"]); ?>"></option>
                                                            </select>

                                                        </span>

                                                        <div style="display:none" id="skuNotice" class="sku_tip">
                                                            <span class="validateTips"></span>
                                                        </div>
                                                        <i></i></li>  
                                                    <li><label>用户头像</label><div id="list_hidden"></div></li>
                                                    <li style="position:relative;margin-bottom:5px;height:55px"><input name="" id="upload_list" type="file" class="dfinput" style=""/><i  id ="imgs" style="position:absolute;left:150px;top:-5px;"><img src="" style="" height="50px"></i></li>
                                                    <li><label>手机号码</label><input name="mobile_phone" id="notice" type="text" class="dfinput" /><i></i></li>
                                                    <li><label>固定电话</label><input name="fax_phone" type="text" class="dfinput"  value="<?php echo ($info["fax_phone"]); ?>"/><i></i></li>
                                                    <li><label>邮箱</label><input name="email" type="text" class="dfinput"  value="<?php echo ($info["email"]); ?>"/><i></i></li> 
                                                    <li><label>真实姓名</label><input name="true_name" type="text" class="dfinput"  value="<?php echo ($info["true_name"]); ?>"/><i>格式如:2014-11-12</i></li> 
                                                    <li><label>详细地址</label><input name="address" type="text" class="dfinput"  value="<?php echo ($info["address"]); ?>"/><i></i></li>  
                                                    <li><label>昵称</label><input name="nickname" type="text" class="dfinput"  value="<?php echo ($info["nickname"]); ?>"/><i></i></li>  
                                                    <li><label>&nbsp;</label><input name="" type="submit" class="btn btn-primary" value="确认<?php echo ($data["btn"]); ?>"  onclick="javascript:;" /></li>
                                                    <input name="reg_time" type="hidden" /><input name="salt" type="hidden" />
                                                </ul>

                                            </div>
                                            </form>
                                            <!-- <div id="map" style="border:1px solid red;width:100%;height:auto">ditu
                                                
                                            </div> -->

                                            </body>
                                            <script>
                                                //var edit= new UE.ui.Editor({initialContent:'',initialFrameWidth:450});
                                                // console.log(edit)
                                                // edit.render("intro");
                                                /*    UE.getEditor('intro', {
                                                    theme:"default", //皮肤
                                                    lang:"zh-cn",//语言
                                                    initialFrameWidth:600,  //初始化编辑器宽度,默认800
                                                    initialFrameHeight:320
                                                });
                                                 */
                                                var img = "";
                                                $('#upload_list').uploadify({
                                                    'swf'      : '/whr/App/Home/View/Public/Images/uploadify.swf',
                                                    'uploader' : '<?php echo U("Uploads/listUpload");?>',
                                                    'cancelImage':'/whr/App/Home/View/Public/Images/uploadify-cancel.png',
                                                    'buttonText' : '头像上传',
                                                    'multi': false,
                                                    'onUploadSuccess' : function(file, data, response) {
                                                        // alert(data);
                                                        obj= $.parseJSON(data);
                                                        img += "<img height='50px' src='"+obj.path+"'>";
                                                        $('#imgs').html(img);
                                                        var hid ="<input name='face' type='hidden' value='"+obj.mid+"' />"
                                                        $('#list_hidden').html(hid);
                                                    }
                                                });
                                                function openwindow()
                                                {
                                                    var url = 'http://api.map.baidu.com/lbsapi/getpoint/'; //转向网页的地址;
                                                    var name="获取经纬"; //网页名称，可为空;
                                                    var iWidth='800'; //弹出窗口的宽度;
                                                    var iHeight='600'; //弹出窗口的高度;
                                                    //window.screen.height获得屏幕的高，window.screen.width获得屏幕的宽
                                                    var iTop = (window.screen.height-30-iHeight)/2; //获得窗口的垂直位置;
                                                    var iLeft = (window.screen.width-10-iWidth)/2; //获得窗口的水平位置;
                                                    window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
                                                }
                                                function ShowPage()
                                                {
                                                    showModalDialog('http://api.map.baidu.com/lbsapi/getpoint/','example04','dialogWidth:400px;dialogHeight:300px;dialogLeft:200px;dialogTop:150px;center: yes;help:no;resizable:no;status:no')
                                                }

                                            </script>
                                            <script type="Text/Javascript">
                                                $(function(){
                                            
                                                    if($("#actionSave").val()=='edit'){
                                                        $(".pwsave").remove();
                                                        //  $("#password2").remove(); 
                                                    }
                                            
                                            
                                                    $('.pro_in').click(function(){
                                                        $('#vallage').hide(200);
                                                        var id =$(this).val();
                                                        // alert(id);
                                                        $('#city').attr('pro',id);
                                                        $('#val_list').html("<p>请选择城市</p>")
                                                        $.ajax({
                                                            url : "<?php echo U('City/city','','');?>",
                                                            type : "post",
                                                            data : "id="+id,
                                                            dataType : "json",
                                                            success : function(data){                   
                                                                if(data != null){
                                                                    var str=""
                                                                    $.each(data,function(key,val){
                                                                        str += "<option class='city_in' value="+val['region_id']+" onclick='javascript:getvallage("+val['region_id']+")'>"+val['region_name']+"</option>";
                                                                    })
                                                                    $('#city_list').html(str);
                                                                    $('#city_list').show(200);
                                                                }
                                                            }
                                                        });         
                                                    })
                                            
                                                    var province = function() {
                                                        var id=$(".cheng_in").val();
                                                        $.ajax({
                                                            url : "<?php echo U('City/city','','');?>",
                                                            type : "post",
                                                            data : "id="+id,
                                                            dataType : "json",
                                                            success : function(data){                   
                                                                if(data != null){
                                                                    if($(".cheng_in").val()!==''){
                                                                        var str=""
                                                                        $.each(data,function(key,val){
                                                                            str += "<option class='city_in' value="+val['region_id']+" onclick='javascript:getvallage("+val['region_id']+")'>"+val['region_name']+"</option>";
                                                                        })
                                                                        $('#city_list').html(str);
                                                                        $('#city_list').show(200);
                                                                    }
                                                                }
                                                            }
                                                        });  
                                                    };
                                                    var area = function() {
                                                        var id=$(".area_on").val();
                                                        //   alert(id)
                                                        $.ajax({
                                                            url : "<?php echo U('City/vallcage','','');?>",
                                                            type : "post",
                                                            data : "id="+id,
                                                            dataType : "json",
                                                            success : function(data){                       
                                                                if(data != null){
                                                                    if($(".city_in").val()!==''){
                                                                        var str=""
                                                                        $.each(data,function(key,val){
                                                                            str += "<option class='city_in' value="+val['region_id']+">"+val['region_name']+"</option>";
                                                                        })
                                                                        $('#val_list').html(str);
                                                                        $('#val_list').show(200);
                                                                    }
                                                                }
                                                            }
                                                        });  
                                                    };
                                          
                                                    province();
                                                    getvallage($(".city_in").val());
                                                    area();
                                                })
                                                function getvallage(id){
            
                                                    var id = id;
                                                    $('#vallage').attr('city',id);
                                                    $.ajax({
                                                        url : "<?php echo U('City/vallage','','');?>",
                                                        type : "post",
                                                        data : "id="+id,
                                                        dataType : "json",
                                                        success : function(data){                       
                                                            if(data != null){
                                                                var str=""
                                                                $.each(data,function(key,val){
                                                                    str += "<option class='city_in' value="+val['region_id']+">"+val['region_name']+"</option>";
                                                                })
                                                                $('#val_list').html(str);
                                                                $('#val_list').show(200);
                                                            }
                                                        }
                                                    });
        
                                                }
                                            </script>

                                            </html>