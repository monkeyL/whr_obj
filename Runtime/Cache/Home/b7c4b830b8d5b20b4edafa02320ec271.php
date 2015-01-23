<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加业主</title>
<link href="/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/App/Home/View/Public/Js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/App/Home/View/Public/Css/bootstrap.min.css">
<link rel="stylesheet" href="/App/Home/View/Public/Css/uploadify.css">
<script src='/App/Home/View/Public/Js/jquery.uploadify.min.js'></script>
<script type="text/javascript">
    //alert(1)
    //简单验证
        var validate = {
        'name' : false,
        'mobile':false,
        'address':false
    };
    $('#name').blur(function(){
        if($.trim($(this).val()) == ''){
            $('#name_info').text('业主名字不能为空').css('color','red');
            validate.username = false;
        }else{
            $('#name_info').text('');
            validate.username = true;
        }
    });
    $('#mobile').blur(function(){
        if($.trim($(this).val()) == ''){
            $('#mobile_info').text('手机号码不能为空').css('color','red');
            validate.username = false;
        }else{
            $('#mobile_info').text('');
            validate.username = true;
        }
    });
    $('#address').blur(function(){
        if($.trim($(this).val()) == ''){
            $('#address_info').text('地址不能为空').css('color','red');
            validate.username = false;
        }else{
            $('#address_info').text('');
            validate.username = true;
        }
    });
    $('#property_id').change(function(){
        if($.trim($(this).val()) == 0){
            $('#property_info').text('请选择物业').css('color','red');
            validate.type_id = false;
        }else{
            $('#property_info').text('');
            validate.type_id = true;
        }
    });


    $('form').submit(function(){
        $('#name').trigger('blur');
        var isOK = validate.name && validate.mobile && validate.address
        if(!isOK){
            if($("#property_id").text()== 0){
                $('#skuTitle2').text("您还未选择分类")
                $('#skuNotice').show();
                setTimeout( function(){
                    $( '#skuNotice' ).fadeOut();
                }, ( 1 * 1000 ) ); 
                return false;
            }
        }
        return true;

    });
     

</script>
<style type="text/css">
    .pro {
    	float: left;
    	line-height: 30px;
    	margin-left: 0px;
    	margin-bottom: 10px;
    }

    .sku_tip {
    	background: none repeat scroll 0 0 rgba(0, 0, 0, 0.7);
    	border-radius: 4px;
    	box-shadow: 0 0 3px 3px rgba(150, 150, 150, 0.7);
    	color: #fff;
    	display: none;
    	left: 50%;
    	margin-left: -70px;
    	padding: 5px 10px;
    	position: fixed;
    	text-align: center;
    	top: 50%;
    	z-index: 25;
    }

    .pro select {
    	width: 345px;
    	height: 32px;
    }

    .box {
    	margin-left: 5px;
    	font-size: 12px;
    	margin-top: -3px;
    	padding-left: 5px;
    	padding: 3px;
    }
</style>
</head>
<body style="background: none;">

	<div class="place">
		<span>后台管理：</span>
		<ul class="placeul">
			<li><a href="#">业主管理</a></li>
			<li><a href="#">添加业主</a></li>
		</ul>
	</div>
	<form action="" method="post" name="vform">
		<div class="formbody">
			<div class="formtitle">
				<span><?php echo ($data["title"]); ?></span>
			</div>
			<ul class="forminfo">

				<li><label>所属物业</label> <span class='pro'> 
                    <select
						name='property_id' class="form-control" id="property_id">
						<option class="cheng" value="0">请选择</option>
						<?php if(is_array($property)): $i = 0; $__LIST__ = $property;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option class="pro_in"  value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["pname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span> <i></i></li>
                <li><label>业主姓名</label><input name="name" id="name" type="text" class="dfinput" value="<?php echo ($info["name"]); ?>" /><i id="name_info">请输入真是姓名</i></li>
                <li><label>业主电话</label><input name="mobile" id="mobile" type="text" class="dfinput" value="<?php echo ($info["mobile"]); ?>" /><i id="mobile_info">请输入真实电话</i></li>
                <li><label>业主地址</label><input name="address" id="address" type="text" class="dfinput" value="<?php echo ($info["address"]); ?>" /><i id="address_info">请输入真实的地址</i></li> 
                <input type ='hidden' value = "<?php echo ($info["property_id"]); ?>" id = "property">
                <input type="hidden" name = "id" value="<?php echo ($info["id"]); ?>">
				<li><label>&nbsp;</label><input name="" type="submit"
					class="btn btn-primary" value="确认<?php echo ($data["btn"]); ?>"
					onclick="javascript:;" /></li>
			</ul>
		</div>
	</form>
</body>
<!-- 给物业添加对应的属性 -->
<script type="text/javascript">
    $(function(){
        var property = $('.pro_in');
        for(i=0;i<property.length;i++){            
            if (property.eq(i).val() == $('#property').val()) {
                property.eq(i).attr('selected','selected');
            };           
        }
    })
</script>
</html>