<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传APK</title>
<link href="/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/App/Home/View/Public/Js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css"
	href="/App/Home/View/Public/Css/bootstrap.min.css">
<link rel="stylesheet" href="/App/Home/View/Public/Css/uploadify.css">
	<script src='/App/Home/View/Public/Js/jquery.uploadify.min.js'></script>
<script type="text/javascript">
    $(function(){
        // alert(1)
        //简单验证
            var validate = {
            'version' : false,
            'des':false,

        };
        $('#version').blur(function(){
            if($.trim($(this).val()) == ''){
                $('#version_info').text('版本号不能为空').css('color','red');
                validate.version = false;
            }else{
                id = $.trim($('#id').val());
                if (id == '') {
                    $.post("<?php echo U('check');?>",{'version':$.trim($(this).val())},function(data){
                        if (data) {
                            $('#version_info').text('你输入的版本号已经存在').css('color','red');
                            validate.version = false;
                        }                 
                    },'json')
                };
                $('#version_info').text('');
                validate.version = true;
                
            }
        });
        $('#des').blur(function(){
            if($.trim($(this).val()) == 0){
                $('#des_info').text('更新描述不能为空').css('color','red');
                validate.des = false;
            }else{
                $('#des_info').text('');
                validate.des = true;
            }
        });   

        $('form').submit(function(){
            $('#version').trigger('blur');
            $('#des').trigger('blur');
            var isOK = validate.version && validate.des
            if(!isOK){                               
                return false;
            }
            if($.trim($('#url').val()) == 0){
                $('#url_info').text('上传文件不能为空').css('color','red');
                return false;
            }
            return true;

        });
         
    })
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
		<ul class="placeul">
            <li>位置：</li>
            <li><a href="<?php echo U('Index/start');?>">首页</a></li>
            <li>系统管理</li>
			<li><a href="<?php echo U('index');?>">APK列表</a></li>
			<li>上传APK</li>
		</ul>
	</div>
	<form action="<?php echo U('insert');?>" method="post" name="vform">
        <input type="hidden" id="id" name = "id" value="<?php echo ($info["id"]); ?>">
		<input type="hidden" name="add_user" value=<?php echo ($_SESSION['admin']['name']); ?>>
			<div class="formbody">
				<div class="formtitle">
					<span><?php echo ($data["title"]); ?></span>
				</div>
				<ul class="forminfo">
					<li><label>版本号</label><input name="version" id="version"  type="text" class="dfinput"  value="<?php echo ($info["version"]); ?>" /><i id="version_info">纯数字</i></li>
                    <li><label>版本更新内容</label><input name="des" id="des"  type="text" class="dfinput"  value="<?php echo ($info["des"]); ?>" /><i id="des_info">版本更新内容</i></li>
                    <li><label>APP文件</label><input name="url" id="url"  type="hidden" class="dfinput"  value="<?php echo ($info["url"]); ?>" /><i id="url_info">请选择上传文件</i></li>
					<li style="position: relative; margin-bottom: 5px; height: 55px"><input
						name="file" id="upload_file" type="file" class="dfinput"
						style="" value=""/></li>
                    
					<li><label>&nbsp;</label><input name="" type="submit"
						class="btn btn-primary" value="确认<?php echo ($data["btn"]); ?>"
						onclick="javascript:;" />
                        
                    </li>
				</ul>
			</div>
	</form>
    <script type="text/javascript">
         var img = "";
            $('#upload_file').uploadify({
                'swf'      : '/App/Home/View/Public/Images/uploadify.swf',
                'uploader' : '<?php echo U("Uploads/apk");?>',
                'cancelImage':'/App/Home/View/Public/Images/uploadify-cancel.png',
                'buttonText' : '文件上传',
                'multi': false,
                'onUploadSuccess' : function(file, data, response) {
                    //alert(data);
                    obj= $.parseJSON(data);
                    $('#url').val(obj);
                    $('#url_info').text('文件已经选择');
                }
            });
    
        
        function deletePic(){
                                                                                                                       
            $("#imgs img").remove();
            $('#list_hidde input').remove();
        }
    </script>


</body>
</html>