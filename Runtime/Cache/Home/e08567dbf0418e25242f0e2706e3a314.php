<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="/default/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/default/App/Home/View/Public/Js/jquery.js"></script>
        <script type="text/javascript" src="/default/App/Home/View/Public/Js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/default/App/Home/View/Public/Css/bootstrap.min.css">
            <script type="text/javascript" type="text/javascript">
                function deleteSum(id){
                    if(confirm("确认删除"))
                        location.href="/whr/index.php?s=/Home/Admin/del/id/"+id
                }

            </script>


    </head>
    <style type="text/css">
        .info{float: left;}
    </style>

    <body style="background: none;">

        <div class="place">
            <span>后台管理：</span>
            <ul class="placeul">
                <li><a href="#">角色管理</a></li>
                <li><a href="#">角色列表</a></li>
            </ul>
        </div>
         <div class="tools" style="font-size:15px;line-height:45px;text-indent:20px;font-weight:700">
                你正在给："<?php echo ($info["title"]); ?>"角色添加权限
            </div>
        <form action ="" method="post">
        <div class="rightinfo">




            <table class="tablelist">
                <thead>
                    <tr>
                        <th width="15%">小计权限</th>
                        <th width="85%">详细权限</th>
                    </tr>
                </thead>

                <tbody id="table_ajax_list">
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 

                            <td><input type = "checkbox" value="<?php echo ($vo["id"]); ?>" name ="check[]"  id = "<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></td>    
                            <td>
                                <?php if(is_array($vo["son"])): $i = 0; $__LIST__ = $vo["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son): $mod = ($i % 2 );++$i;?><div class="info"><input type = "checkbox" value="<?php echo ($son["id"]); ?>" name ="check[]" class = "one_<?php echo ($vo["id"]); ?>"><?php echo ($son["title"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>    
                </tbody>
            </table>
                <input type ="hidden" value="<?php echo ($info["id"]); ?>" name="id">
                 <div style="text-align:center"><input type="checkbox" value= "0"  data="0" id="checkall" name="checkall">  全选
                <input type="submit" value="提交" border="1px solid red" class="btn btn-info"></div>
            </form>
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




        </div>

        <script type="text/javascript">
            $('.tablelist tbody tr:odd').addClass('odd');

    $(function () { 
    //调用全选插件
    $.fn.check({ checkall_name: "checkall", checkbox_name: "check[]" })
        });
        //全选插件
        //checkall_name   操作全选的复选框name
        //checkbox_name   被操作的复选框的name  name值可不统一 设置包含值 以XXX开头 自己修改
        (function ($) {
            $.fn.check = function (options) {
                var defaults = {
                    checkall_name: "checkall_name", //全选框name
                    checkbox_name: "checkbox_name" //被操作的复选框name
                },
                ops = $.extend(defaults, options);
                e = $("input[name='" + ops.checkall_name + "']"), //全选
                f = $("input[name='" + ops.checkbox_name + "']"), //单选
                g = f.length; //被操作的复选框数量
                f.click(function () {
                    $("input[name ='" + ops.checkbox_name + "']:checked").length == $("input[name='" + ops.checkbox_name + "']").length ? e.attr("checked", !0) : e.attr("checked", !1);
                }), e.click(function () {
                    for (i = 0; g > i; i++) f[i].checked = this.checked;
                });
            };
        })(jQuery);
       
        </script>
        <script type="text/javascript">
            function checkAll(num){
                // alert(num);
                // $(".one_"+num).attr('checked',true);
                // $(".one_"+num+":checked").length == $('.one_'+num).length ? $("#"+num).attr('checked',!0) : $("#"+num).attr('checked',!1);
                $('this').parents('tr')
            }

        </script>
<script type="text/javascript">
            
//         $(function (num) { 
// //调用全选插件
//     $.fn.checkone({ checkall_name: "#"+num, checkbox_name: ".one_"+num })
//     });
//     //全选插件
//     //checkall_name   操作全选的复选框name
//     //checkbox_name   被操作的复选框的name  name值可不统一 设置包含值 以XXX开头 自己修改
//     (function ($) {
//         $.fn.checkone = function (options) {
//             var defaults = {
//                 checkall_name: "checkall_name", //全选框name
//                 checkbox_name: "checkbox_name" //被操作的复选框name
//             },
//             ops = $.extend(defaults, options);
//             e = $(ops.checkall_name), //全选
//             f = $(ops.checkbox_name), //单选
//             g = f.length; //被操作的复选框数量
//             f.click(function () {
//                 $(ops.checkbox_name + ":checked").length == $( ops.checkbox_name ).length ? e.attr("checked", !0) : e.attr("checked", !1);
//             }), e.click(function () {
//                 for (i = 0; g > i; i++) f[i].checked = this.checked;
//             });
//         };
//     })(jQuery);
</script>

    </body>

</html>