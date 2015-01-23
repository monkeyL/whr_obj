<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="/default/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
        <link href="/default/App/Home/View/Public/Css/select.css" rel="stylesheet" type="text/css" />
        <link href="/default/App/Home/View/Public/Css/tableList.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="/default/App/Home/View/Public/js/jquery-ui/css/pepper-grinder/jquery-ui.min.css">
            <script type="text/javascript" src="/default/App/Home/View/Public/Js/jquery.js"></script>
            <script type="text/javascript" src="/default/App/Home/View/Public/Js/common.js"></script>
            <script type="text/javascript" src="/default/App/Home/View/Public/Js/jquery.idTabs.min.js"></script>
            <script type="text/javascript" src="/default/App/Home/View/Public/Js/select-ui.min.js"></script>
            <script type="text/javascript" src="/default/App/Home/View/Public/Js/kindeditor.js"></script>
            <script type="text/javascript" src="/default/App/Home/View/Public/Js/kindeditor.js"></script>
            <script type="text/javascript" src="/default/App/Home/View/Public/Js/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
            <script language="javascript">

                function deleteSum(id){
                    if(confirm("确认删除"))
                        location.href="/whr/index.php?s=/Home/Business/del/id/"+id
                }
            </script>

            <script type="text/javascript">
                $(function(){
                    $('.scbtn').bind('click',function(){
                        $('#from_sub').submit();
                    
                    });
                    $("#detailDialog").draggable({
                        cancel:"table"
                    });
                    $("#close").bind("click",function(e){
                        $("#detailDialog").css({
                            'top':'50px',
                            "left":'0px'
                        })
                        $(this).parent().hide(1000);  
                    })
                    $("#ig_primary").bind("click",function(){ 
                        window.location.href=$("#url_add").val();          
                        // $("#ig_primary").sumbit($("#url_add").val())    
                             
                    });
                    initPager();  
                });
                function showDetail(teacherId){
                    var xtop= $(".showlist"+teacherId).position().top;
                    var xleft=$(".showlist"+teacherId).position().left;
                    //   alert(xtop)
                    $("#detailDialog").position(
                    {
                        my: "top"+xtop+"px",
                        at: xleft+"px",
                        of: window
                    });
                    $.ajax({ 
                        url:$("#url_getTeacher").val(),
                        type:"post",
                        dataType:"json",
                        cache:false,
                        data: {"id":teacherId},
                        timeout:30000,
                        error:function(data, msg){
                            alert("error:"+msg);
                        },
                        success:function(data){
                            console.log(data)
                            /*  $("#goods_name").text(data.goods_name?data.goods_name:"");
                            $("#price").text(data.price?data.price:"");
                            $("#show_mobile").text(data.mobile?data.mobile:"");
                            $("#if_show").text(data.sex==1?"是":data.sex==0?"否":"保密");
                            $("#show_officePhone").text(data.office_phone?data.office_phone:"");
                            $("#show_homePhone").text(data.home_phone?data.home_phone:"");
                            $("#show_entryTime").text(data.qq?data.qq:"");
                            $("#show_teacherPid").text(data.qq?data.qq:"");
                            $("#show_qq").text(data.qq?data.qq:"");
                            $("#show_email").text(data.email?data.email:"");
                            $("#show_wechatNo").text(data.wechat_no?data.wechat_no:"");
                            $("#show_homePage").text(data.home_page?data.home_page:"");
                            $("#show_idcardNumber").text(data.idcard_number?data.idcard_number:"");
                            $("#show_officeAddress").text(data.office_address?data.office_address:"");
                            $("#show_homeAddress").text(data.home_address?data.home_address:"");
                            //$("#photo_path").attr("src",data.photo_path);*/
                            $("#detailDialog").fadeIn(1000);
                        }
                    });
                }
            </script>
            <style>
                #close{ font-size: 16px; border: 2px solid;}
                #ig_primary{float: right; margin-top: 3px; margin-right: 10px;    }
            </style>
    </head>


    <body style="background: none;">
        <input type="hidden" value="/default/index.php?s=/Home/Config/details" id="url_getTeacher" name="url_getTeacher" />
        <input type="hidden" value="/default/index.php?s=/Home/Config/add" id="url_add" name="url_getTeacher" />
        <div class="place">
            <span>位置：</span>
            <ul class="placeul">
                <li><a href="#">首页</a></li>
                <li><a href="#">图片列表</a></li>
            </ul>
        </div>
        <input id="ig_primary" type="button" class="btn btn-primary" value="添加"  onclick="javascript:;" />
        <div class="rightinfo">
            <form action="" method="post" name ="vform" id="from_sub">


                <table class="imgtable">
                    <thead>
                        <tr>
                            <th width="100px;">列表图片</th>
                            <th>店铺名字</th>
                            <th>店铺客服qq</th>
                            <th>商店电话</th>
                            <th>店家负责人</th>
                            <th>店铺地址</th>
                            <th>操作</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--  /default/ -->
                                <td class="imgtd"><img src="<?php echo ($vo["list_pic"]); ?>" width="50px"/></td>
                                <td><?php echo ($vo["bsname"]); ?></a></td>
                                <td><?php echo ($vo["qq"]); ?></td>
                                <td><?php echo ($vo["phone"]); ?></td>
                                <td><?php echo ($vo["owner"]); ?></td>
                                <td><?php echo ($vo["address"]); ?></td>
                                <!--   <td><?php echo ($vo["content"]); ?></td>
                                   <td><?php echo ($vo["server"]); ?></td> -->
                                <td><a class="showlist<?php echo ($vo["bsid"]); ?>" href="javascript:showDetail(<?php echo ($vo["bsid"]); ?>)" title="详情">详情</a>
                                    <a href="<?php echo U('add',array(id=>$vo['bsid']),'');?>">编辑</a>
                                    <a class="tablelink" onclick="deleteSum('<?php echo ($vo["bsid"]); ?>')"> 删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>  

                    </tbody>

                </table>
                <div id="pager" class="pager">
                    <div class="fanye">
                        <div class="fanye1">
                            <?php echo ($page); ?>
                        </div>
                        <div class="fanye2">
                            <span class="">共<?php echo ($currentPage); ?>/<?php echo ($totalPage); ?>页</span>
                            转到<input type="text" value="<?php echo ($currentPage); ?>" id="gopage_input" class="ui-widget-header" />页&nbsp;
                            <input type="button" value="确定" id="gopage_btn_confirm" />
                        </div>
                    </div>
                </div>
                <div id="detailDialog">
                    <div id="close" title="关闭" class="ui-button-icon-primary ui-icon ui-icon-closethick"></div>
                    <table cellpadding="0" cellspacing="0" border="1">
                        <tr>
                            <td width="80px" class="label">商品名字</td>
                            <td width="120px"><span id="goods_name"></span></td>
                            <td width="80px" class="label">价 格</td>
                            <td width="120px"><span id="price"></span></td>
                            <td rowspan="3" style="text-align:center" width="120px"><img src="http://img1.3lian.com/gif/more/11/201211/72c8280fdd1c9c0d228c37891eb388b5.jpg" width="100px" height="110px"/></td>
                        </tr>
                        <tr>
                            <td class="label">库 存</td>
                            <td><span id="show_sex"></span></td>
                            <td class="label">地 址</td>
                            <td><span id="show_mobile"></span></td>
                        </tr>
                        <tr>
                            <td class="label">是否上架</td>
                            <td><span id="if_show"></span></td>
                            <td class="label">销售数量</td>
                            <td><span id="number"></span></td>
                        </tr>
                        <tr>
                            <td class="label">分类</td>
                            <td><span id="cat_id"></span></td>
                            <td class="label">商家名称</td>
                            <td colspan="2"><span id="store_id"></span></td>
                        </tr>
                        <tr>
                            <td class="label">促销价</td>
                            <td><span id="markdown"></span></td>
                            <td class="label">添加时间</td>
                            <td colspan="2"><span id="add_time"></span></td>
                        </tr>
                        <tr>
                            <td class="label">商品赠送积分</td>
                            <td><span id="points"></span></td>
                            <td class="label">品牌</td>
                            <td colspan="2"><span id="brand"></span></td>
                        </tr>	
                        <!-- <tr>
                             <td class="label">身份证号</td>
                             <td colspan="4"><span id="show_idcardNumber"></span></td>
                         </tr>
                         <tr>
                             <td class="label">办公地址</td>
                             <td colspan="4"><span id="show_officeAddress"></span></td>
                         </tr>
                         <tr>
                             <td class="label">家庭地址</td>
                             <td colspan="4"><span id="show_homeAddress"></span></td>
                         </tr> 
                        -->
                    </table>
                </div>
                <div class="tip">
                    <div class="tiptop"><span>提示信息</span><a></a></div>

                    <div class="tipinfo">
                        <span><img src="/default/App/Home/View/Public/Images/ticon.png" /></span>
                        <div class="tipright">
                            <p>是否确认对信息的修改 ？</p>
                            <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
                        </div>
                    </div>

                    <div class="tipbtn">
                        <input name="" type="button"  class="sure" value="确定" />&nbsp;
                        <input name="" type="button"  class="cancel" value="取消" />
                    </div>

                </div>
            </form>



        </div>

        <div class="tip">
            <div class="tiptop"><span>提示信息</span><a></a></div>

            <div class="tipinfo">
                <span><img src="/default/App/Home/View/Public/Images/ticon.png" /></span>
                <div class="tipright">
                    <p>是否确认对信息的修改 ？</p>
                    <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
                </div>
            </div>

            <div class="tipbtn">
                <input name="" type="button"  class="sure" value="确定" />&nbsp;
                <input name="" type="button"  class="cancel" value="取消" />
            </div>

        </div>

        <script type="text/javascript">
            $('.imgtable tbody tr:odd').addClass('odd');
        </script>

    </body>

</html>