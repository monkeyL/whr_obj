<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加开发商</title>
        <link href="/default/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
        <!-- <link href="/default/App/Home/View/Public/Css/select.css" rel="stylesheet" type="text/css" /> -->
        <script type="text/javascript" src="/default/App/Home/View/Public/Js/jquery.js"></script>
            <script type="text/javascript" src ="/default/App/Home/View/Public/ueditor/editor_config.js"></script>
            <script type="text/javascript" src ="/default/App/Home/View/Public/ueditor/editor_all_min.js"></script>
        <script type="text/javascript" src='/default/App/Home/View/Public/Js/jquery.uploadify.min.js'></script>
        <!-- <script type="text/javascript" src="/default/App/Home/View/Public/Js/jquery.idTabs.min.js"></script> -->
        <!-- <script type="text/javascript" src="/default/App/Home/View/Public/Js/select-ui.min.js"></script> -->
        <!-- <script type="text/javascript" src="/default/App/Home/View/Public/Js/kindeditor.js"></script> -->
        <link rel="stylesheet" type="text/css" href="/default/App/Home/View/Public/Css/bootstrap.min.css">

                        <link rel="stylesheet" href="/default/App/Home/View/Public/Css/uploadify.css">
            <script type="text/javascript">
                $(function(){
                    var img = "";
                    $('#upload_list').uploadify({
                        'swf'      : '/default/App/Home/View/Public/Images/uploadify.swf',
                        'uploader' : '<?php echo U("Uploads/listUpload");?>',
                        'cancelImage':'/default/App/Home/View/Public/Images/uploadify-cancel.png',
                        'buttonText' : '列表上传',
                        'multi': false,
                        'onUploadSuccess' : function(file, data, response) {
                       //     console.log(data)
                            // alert(data);
                            obj= $.parseJSON(data);
                            img += "<img height='50px' src='"+obj.path+"'>";
                            $('#imgs').html(img);
                            var hid ="<input name='pic' type='hidden' value='"+obj.mid+"' />"
                               
                            $('#list_hidden').html(hid);
                        }
                    });
                
                })
                function deleteListPic(){
                    $(".up_list_pic").html('');
                    $('#list_hidden').html('');
                }
            </script>
    </head>
    <style type="text/css">
        .sku_tip { background: none repeat scroll 0 0 rgba(0, 0, 0, 0.7);border-radius: 4px;box-shadow: 0 0 3px 3px rgba(150, 150, 150, 0.7);color: #fff;display: none;left: 50%;margin-left: -70px; padding: 5px 10px;position: fixed; text-align: center; top: 50%;z-index: 25;}
        .pro select{width: 345px;height: 32px; }
        #val_list{width: 345px;height: 32px;  margin-left: 85px;}
        .cat_img{ margin-top: -50px;}
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
                                <li style="height:50px"><label>公告内容</label></li>
                                <li><textarea rows="5"  cols='40' style="" name ="content"id="intro" value="<?php echo ($info["content"]); ?>" ><?php echo ($info["content"]); ?></textarea></li>
                                <li><label>公告图片</label><div id="list_hidden"></div></li>
                                <li style="position:relative;margin-bottom:5px;height:55px"><input name="" id="upload_list" type="file" class="dfinput" style=""/><i  id ="imgs" style="position:absolute;left:150px;top:-5px;"><img src="" style="" height="50px">
                                            <?php if($info["pic"] != ''): ?><div class="up_list_pic">
                                                    <img class="cat_img" height='50px' src='<?php echo ($info["pic"]); ?>'>
                                                        <img class="cat_img" src='/default/App/Home/View/Public/Images/uploadify-cancel.png' class ='close' onclick = 'javascript:deleteListPic()'> 
                                                            </div><?php endif; ?>
                                                            </i></li>
                                                            <li><label>所属开发商</label>
                                                                <select  class="form-control" name = 'proid' style="width: 345px;height: 32px;" >
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
                                                                    var edit= new UE.ui.Editor({initialContent:'',initialFrameWidth:600});
                                                                     edit.render("intro");
                                                            </script>
                                                            </body>

                                                            </html>