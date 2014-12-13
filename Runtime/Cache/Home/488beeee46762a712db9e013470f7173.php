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
                                <li><label>物业名称</label><input name="pname" id="name" type="text" class="dfinput" value="<?php echo ($info["pname"]); ?>" /><i id="name_info">名称不能超过30个字符</i></li>
                                <li><label>详细地址</label><input name="address" id="address" type="text" class="dfinput" value="<?php echo ($info["address"]); ?>" /><i id="address_info">密码不能为空</i></li>
                                <li><label>地 址</label>
                                    <span class = 'pro' >
                                        <select name = 'province' class="form-control">
                                            <option class="cheng_in" value="<?php echo ($info["province"]); ?>"><?php echo ($region["REGION_NAME"]); ?></option>
                                            <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option class = "pro_in" value="<?php echo ($vo["region_id"]); ?>"><?php echo ($vo["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <select name = 'city' style="display:none" id ="city_list" class="form-control" >
                                            <option class = "city_in" value="<?php echo ($info["city"]); ?>"></option>
                                        </select>

                                        <select name = 'area' style="display:none"  id ="val_list" class="form-control" >
                                            <option class="area_on" value="<?php echo ($info["area"]); ?>"></option>
                                        </select>

                                    </span></li>
                                <li><label>物业电话</label><input name="phone" type="text" id="password2" class="dfinput" value="<?php echo ($info["phone"]); ?>" /><i id="passwd_inf2"></i></li>
                                <li><label>主管名字</label><input name="manager" type="text" class="dfinput"  value="<?php echo ($info["manager"]); ?>"/><i></i></li>
                                <li><label>主管电话</label><input name="manage_phone" type="text" class="dfinput"  value="<?php echo ($info["manage_phone"]); ?>"/><i></i></li>
                                <input name="staue" value="0" type="hidden"  />
                                <input name="add_time" value="0" type="hidden"  />


                                <li><label>&nbsp;</label><input name="" type="submit" class="btn btn-primary" value="确认<?php echo ($data["btn"]); ?>"  onclick="javascript:;" /></li>
                            </ul>
                            <div style="display:none" id="skuNotice" class="sku_tip">
                                <span id="skuTitle2"></span>
                            </div>
                        </div>
                        </form>
                        <script type="Text/Javascript">
                            $(function(){
                                //   alert($('.area_on').val())
                                if($(".pro_into").val()==''){ $(".pro_into").text("请选择"); }
                                if($(".cheng_in").val()==''){ $(".cheng_in").text("请选择"); }
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
                                                //   $('#city_list').append(str)
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
                                area();
                                province();
                                // getvallage($(".city_in").val());

                                var pro = function() {
                                    var id=$(".pro_into").val();
                                    //  alert(id)
                                    $.ajax({
                                        url : "<?php echo U('sonCate','','');?>",
                                        type : "post",
                                        data : "id="+id,
                                        dataType : "json",
                                        success : function(data){     
                                            //   alert(data) 
                                            if(data != null){

                                                var str=""
                                                $.each(data,function(key,val){
                                                    str += "<option value="+val['type_id']+">"+val['type_name']+"</option>";
                                                })
                                                $('#soncate').html(str);
                                                $('#soncate').show(300);
                                            }
                                        }
                                    });    
                                }
                                province();
                                getvallage($(".city_in").val());
                                pro();
                                $('.top_cate').click(function(){

                                    var id =$(this).val();
                                    //  alert(id);
                                    $.ajax({
                                        url : "<?php echo U('sonCate','','');?>",
                                        type : "post",
                                        data : "id="+id,
                                        dataType : "json",
                                        success : function(data){   
                                            //  alert(data)
                                            if(data != null){
                                                var str=""
                                                $.each(data,function(key,val){
                                                    str += "<option value="+val['type_id']+">"+val['type_name']+"</option>";
                                                })
                                                $('#soncate').html(str);
                                                $('#soncate').show(300);
                                            }
                                        }
                                    });         
                                })    
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
                        </body>

                        </html>