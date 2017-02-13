<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <link rel="stylesheet" href="/webdemo/Public/admin/images/admincp.css" type="text/css" media="all" />
    <meta content="xSite Inc." name="Copyright" />
    <script src="/webdemo/Public/admin/js/common.js" type="text/javascript"></script>
</head>
<body>
<div id="append"></div>
<script type="text/javascript">
    function headermenu(ctrl) {
        ctrl.className = ctrl.className == 'otherson' ? 'othersoff' : 'otherson';
        var menu = document.getElementById('header_menu_body');
        if(!menu) {
            menu = document.createElement('div');
            menu.id = 'header_menu_body';
            menu.innerHTML = '<ul>' + document.getElementById('header_menu_menu').innerHTML + '</ul>';
            var obj = ctrl;
            var x = ctrl.offsetLeft;
            var y = ctrl.offsetTop;
            while((obj = obj.offsetParent) != null) {
                x += obj.offsetLeft;
                y += obj.offsetTop;
            }
            menu.style.left = x + 'px';
            menu.style.top = y + ctrl.offsetHeight + 'px';
            menu.className = 'togglemenu';
            menu.style.display = '';
            document.body.appendChild(menu);
        } else {
            menu.style.display = menu.style.display == 'none' ? '' : 'none';
        }
    }

</script>

<script type="text/javascript">
    function select_category() {
        var category_list = document.getElementById("category_list");
        window.location = category_list.options[category_list.selectedIndex].value;
    }
    var product_category = new Array();
    <?php echo ($js); ?>
    function select_operation(f) {
        document.postform.new_category_id.length = 0; //初始化下拉列表 清空下拉数据
        document.postform.new_category_id.style.display = 'none';
        document.postform.keywords.style.display = 'none';
        if (f.options[f.selectedIndex].value == 'del') {
            //删除处理
        }
        if (f.options[f.selectedIndex].value == 'move') {
            document.postform.new_category_id.style.display = '';
            for (var i in product_category) {
                //alert(group_list[f.options[f.selectedIndex].value][i]);
                document.postform.new_category_id.options[document.postform.new_category_id.length] = new Option(product_category[i], i);
            }
        }
        //搜索
        if (f.options[f.selectedIndex].value == 'search') {
            document.postform.keywords.style.display = '';

        }
    }

</script>

<div class="container">

    <h3 class="marginbot">
        <select name="category_list" onchange="select_category()" id="category_list">
            <option value="<?php echo ($url); ?>" >全部分类</option>

            <?php echo ($selectList); ?>
        </select>

        <a href="xsite.php?action=product&operation=edit&category=" class="sgbtn"><span>添加产品</span></a>
        <a onClick="return confirm('此操作需要几分钟或更长时间，确定要进行吗？')"  href="xsite.php?action=product&operation=update_all_index" class="sgbtn"><span>更新所有栏索引</span></a>
    </h3>

    <div class="note fixwidthdec">
        <p class="i">这里是产品内容列表。</p>
    </div>

    <div class="mainbox">
        <form id="postform" name="postform" method="post" action="xsite.php?action=product&operation=batch">
            <table class="inputlist">
                <tr>
                    <th nowrap="nowrap">标题</th>
                    <th nowrap="nowrap">时间</th>
                    <th nowrap="nowrap">缩略图</th>
                    <th nowrap="nowrap">审核</th>
                    <th nowrap="nowrap">调到首页</th>
                    <th nowrap="nowrap">编辑</th>
                    <th nowrap="nowrap">删除</th>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366430362.html">发布产品举例：画册设计…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366430362.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366430362&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366430362&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366430362&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366430362&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366430159.html">发布产品举例：财务软件…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366430159.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366430159&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366430159&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366430159&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366430159&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366429861.html">发布产品举例：企业应用软件…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366429861.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366429861&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366429861&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366429861&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366429861&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366429420.html">发布产品举例：视频营销…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366429420.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366429420&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366429420&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366429420&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366429420&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366429045.html">发布产品举例：事件营销…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366429045.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366429045&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366429045&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366429045&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366429045&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366427080.html">发布产品举例：品牌营销…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366427080.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366427080&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366427080&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366427080&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366427080&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[其它类] <a target="_blank" href="http://localhost/xsite/?product_detailed/other/1366426593.html">发布产品举例：搜索引擎营销…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366426593.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=other&key=1366426593&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=other&key=1366426593&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=other&key=1366426593&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=other&key=1366426593&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[其它类] <a target="_blank" href="http://localhost/xsite/?product_detailed/other/1366425544.html">发布产品举例：数据库</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366425544.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=other&key=1366425544&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=other&key=1366425544&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=other&key=1366425544&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=other&key=1366425544&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366425142.html">发布产品举例：网站空间…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366425142.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366425142&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366425142&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366425142&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366425142&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366424761.html">发布产品举例：网站服务器…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366424761.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366424761&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366424761&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366424761&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366424761&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366424464.html">发布产品举例：网站美工…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366424464.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366424464&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366424464&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366424464&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366424464&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[分类B] <a target="_blank" href="http://localhost/xsite/?product_detailed/p1/1366421960.html">发布产品举例：平面设计…</a></td>
                    <td width="120">2013-04-20</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0420/1366421960.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=p1&key=1366421960&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=p1&key=1366421960&status=8&page=1"><strong>首页展示</strong></a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=p1&key=1366421960&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=p1&key=1366421960&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[综合类] <a target="_blank" href="http://localhost/xsite/?product_detailed/all/1366358444.html">发布产品举例：关于博客营销…</a></td>
                    <td width="120">2013-04-19</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0419/1366358444.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=all&key=1366358444&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=all&key=1366358444&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=all&key=1366358444&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=all&key=1366358444&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[产品分类B] <a target="_blank" href="http://localhost/xsite/?product_detailed/p3/1366358427.html">发布产品举例：建站软件…</a></td>
                    <td width="120">2013-04-19</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0419/1366358427.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=p3&key=1366358427&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=p3&key=1366358427&status=8&page=1"><strong>首页展示</strong></a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=p3&key=1366358427&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=p3&key=1366358427&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[产品分类A] <a target="_blank" href="http://localhost/xsite/?product_detailed/p2/1366358418.html">发布产品举例：关于网站设计…</a></td>
                    <td width="120">2013-04-19</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0419/1366358418.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=p2&key=1366358418&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=p2&key=1366358418&status=1&page=1">取消展示</a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=p2&key=1366358418&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=p2&key=1366358418&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[其它类] <a target="_blank" href="http://localhost/xsite/?product_detailed/other/1366358410.html">发布产品举例：网站内容管理系统…</a></td>
                    <td width="120">2013-04-19</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0419/1366358410.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=other&key=1366358410&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=other&key=1366358410&status=8&page=1"><strong>首页展示</strong></a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=other&key=1366358410&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=other&key=1366358410&page=1">删除</a></td>
                </tr>
                <tr>
                    <td>[主营产品] <a target="_blank" href="http://localhost/xsite/?product_detailed/service/1366355086.html">发布产品举例：什么是网站流量，如何…</a></td>
                    <td width="120">2013-04-19</td>
                    <td width="60">  <a href="attachments/421aa90e/product/2013/0419/1366355086.jpg" target="_blank" >查看</a> </td>
                    <td width="60"><a href="xsite.php?action=product&operation=pass&category=service&key=1366355086&pass=4&page=1">关闭</a></td>
                    <td width="80"><a href="xsite.php?action=product&operation=headtopic&category=service&key=1366355086&status=8&page=1"><strong>首页展示</strong></a></td>
                    <td width="60"><a href="xsite.php?action=product&operation=edit&category=service&key=1366355086&page=1">编辑</a></td>
                    <td width="60"><a onClick="return confirm('确定删除？');" href="xsite.php?action=product&operation=del&category=service&key=1366355086&page=1">删除</a></td>
                </tr>
            </table>



        </form>


        <div class="margintop"></div>





    </div>
</div>
</body>
</html>