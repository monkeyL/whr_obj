<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="/whr/App/Home/View/Public/Css/style.css" rel="stylesheet" type="text/css" />
        <link href="/whr/App/Home/View/Public/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/whr/App/Home/View/Public/Js/jquery.js"></script>
        <script type="text/javascript" src="/whr/App/Home/View/Public/Js/bootstrap.min.js"></script>
                <script src="/whr/App/Home/View/Public/bootstrap/js/jquery.v2.1.1.js"></script>

        <input type ="hidden" name="action" value="<?php echo ($data["action"]); ?>">
            <link rel="stylesheet" type="text/css" href="/whr/App/Home/View/Public/Css/bootstrap.min.css">
                <script type="text/javascript">
              
              /*function getLocalTime(nS) {     
                        return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');     
                    }    
                    function deleteSum(id){
                        if(confirm("确认删除"))
                            location.href="/whr/index.php?s=/Home/Developer/del/id/"+id
                    }
                    var selectDeveloper = function() {

                        $.getJSON('<?php echo U("selectDeveloper");?>', function(res) {
                            console.log(res);
                            var table=$(".tablelist");
                            if($(".tablelist tr td").text()==''){
                                for(var i=0; i<res.length; i++)  
                                {  
                                    var id=res[i].id
                                  
                                    var select="<tr><td><input name='num' type='checkbox' value='' /></td>\n\
                                                 <td>"+res[i].id+"</td>\n\
                                                 <td>"+res[i].name+"</td>\n\
                                                 <td>"+res[i].owner+"</td>\n\
                                                 <td>"+res[i].phone+"</td>\n\
                                                 <td>"+getLocalTime(res[i].addtime)+"</td>\n\
                                                 <td>"+res[i].admin+"</td><td><a href='/whr/index.php?s=/Home/Developer/delvePid/id/"+id+"' class='tablelink'>查看分部</a>\n\
                                                                     <a href='/whr/index.php?s=/Home/Developer/add/id/"+id+"' class='tablelink'>修改</a>   \n\
                                                                     <a class='tablelink'onclick='deleteSum("+id+")'> 删除</a> </td> ";
                                    table.append(select)
                                }                           
                            }
                        });
                    };
                    */
            //        selectDeveloper()
                    $(function(){
                        $('#select_deve').bind('click',function(){
                            selectDeveloper()
                        });
                    });
                    // $(document).ready(function(){
                    //   $(".click").click(function(){
                    //   $(".tip").fadeIn(200);
                    //   });
  
                    //   $(".tiptop a").click(function(){
                    //   $(".tip").fadeOut(200);
                    // });

                    //   $(".sure").click(function(){
                    //   $(".tip").fadeOut(100);
                    // });

                    //   $(".cancel").click(function(){
                    //   $(".tip").fadeOut(100);
                    // });
 
                    // });
                    // $(function(){
                    //     // alert(1);
                    //     loadList();
                    //     function loadList(pid){
                    //         // alert(1);
                    //         var pageSize = "20";
                    //         var cPage = ( pid==''|| pid==undefined ) ? 1 :pid;
                    //         var url="/wrt/index.php?s=/Home/Developer/index&cPage="+cPage+"&pageSize="+pageSize; 
                    //         // alert(url);
                    //         var vForm = $("#sform").serializeArray();
                    //         // partLoading('table-list');
                    //         httpRequest = $.post(encodeURI(url),vForm,function(data){
                    //             // closePartLoading('table-list');             
                    //             if( data == null ) return ;
                    //             $("#table_ajax_list").html(data.html);              
                    //             self.pageShow(data.cPage,data.count);
                    //         },'json');
                    //     }
                    // })

                </script>


                </head>
                <style type="text/css">
                    form ul{width: 100%;}
                    form ul li{float: left;width: 110px;line-height: 25px;text-align: center;}
                    form ul input{border: 1px solid #ccc;width: 100px;}
                    form ul select{border: 1px solid #ccc;width: 100px;}
                </style>

                <body style="background: none;">

                    <div class="place">
                        <span>后台管理：</span>
                        <ul class="placeul">
                            <li><a href="#">开发商管理</a></li>
                            <li><a href="#">开发商列表</a></li>
                        </ul>
                    </div>

                    <div class="rightinfo">

                        <div class="tools">

                            <!-- <ul class="toolbar">
                            <li class="click"><span><img src="/whr/App/Home/View/Public/Images/t01.png" /></span>添加</li>
                            
                            <li><span><img src="/whr/App/Home/View/Public/Images/t03.png" /></span>删除</li>
                            <li><span><img src="/whr/App/Home/View/Public/Images/t04.png" /></span>统计</li>
                            </ul>
                            
                            
                            <ul class="toolbar1">
                            <li><span><img src="/whr/App/Home/View/Public/Images/t05.png" /></span>设置</li>
                            </ul> -->
                            <form action="" method="post" name="vform" id="vform">
                                <ul>
                                    <!-- <li>开发商类别:</li>
                                    <li>
                                        <select name="type">
                                            <option value="0">全部</option>
                                            <option value="1">总部</option>
                                        </select>
                                    </li> -->
                                    <li>开发商名称:</li>
                                    <li><input type="text" value="" class="form-control" name ="name" /></li>
                                    <li><span id="select_deve"><img src="/whr/App/Home/View/Public/Images/ico06.png" width="25"/>查找</span></li>
                                    <!-- <li></li> -->
                                </ul>
                            </form>

                        </div>


                        <table class="tablelist">
                            <thead>
                                <tr>
                                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                                    <th>编号<i class="sort"><img src="/whr/App/Home/View/Public/Images/px.gif" /></i></th>
                                    <th>名称</th>
                                    <th>负责人</th>
                                    <th>电话</th>
                                    <th>添加时间</th>
                                    <th>添加人</th>
                                    <th>操作</th>
                                </tr>
                            </thead>

                            <tbody >
                                 <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="table_ajax_list">
                               
                                  <td><?php echo ($vo["id"]); ?></td>
                                  <td><?php echo ($vo["name"]); ?></td>
                                  <td><?php echo ($vo["owner"]); ?></td>
                                  <td><?php echo ($vo["mobile_phone"]); ?></td>
                                  <td><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
                                  <td><?php echo ($vo["admin"]); ?></td>
            
                                  <td>
                                      <a href="<?php echo U('delvePid',array(id=>$vo['id']),'');?>" class="tablelink">查看分部</a> 
                                      <a href="<?php echo U('add',array(id=>$vo['id']),'');?>" class="tablelink">修改</a>    
                                      <a href="<?php echo U('del',array(id=>$vo['id']),'');?>" class="tablelink"> 删除</a>
                                  </td>
                                  
                              </tr><?php endforeach; endif; else: echo "" ;endif; ?>  
                            </tbody>
                        </table>


                        <div class="pagin">
                            <div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
                            <ul class="paginList">
                                <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
                                <li class="paginItem"><a href="javascript:;">1</a></li>
                                <li class="paginItem current"><a href="javascript:;">2</a></li>
                                <li class="paginItem"><a href="javascript:;">3</a></li>
                                <li class="paginItem"><a href="javascript:;">4</a></li>
                                <li class="paginItem"><a href="javascript:;">5</a></li>
                                <!-- <li class="paginItem more"><a href="javascript:;">...</a></li> -->
                                <li class="paginItem"><a href="javascript:;">10</a></li>
                                <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
                            </ul>
                        </div>


                        <div class="tip">
                            <div class="tiptop"><span>提示信息</span><a></a></div>

                            <div class="tipinfo">
                                <span><img src="/whr/App/Home/View/Public/Images/ticon.png" /></span>
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
                    </script>

                </body>

                </html>