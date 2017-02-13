<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <link rel="stylesheet" href="/webdemo/Public/admin/images/admincp.css" type="text/css" media="all" />
    <meta content="xSite Inc." name="Copyright" />
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
<div class="container">
    <h3 class="marginbot">创建一级栏目：<a href="<?php echo ($add["page"]); ?>" class="sgbtn">单页</a>
        <a href="<?php echo ($add["article"]); ?>" class="sgbtn">文章</a>
        <a href="<?php echo ($add["product"]); ?>" class="sgbtn">产品</a>
        <a href="<?php echo ($add["url"]); ?>" class="sgbtn">链接</a> </h3>
    <div class="note fixwidthdec">
        <p class="i">你可以根据自己的需要添加多级分类。</p>
    </div>

    <div class="mainbox">


        <table class="tb tb2 ">
            <tr class="header">
                <th align="left">排序</th>
                <th align="left">版块名称</th>
                <th align="left">模块</th>
                <th align="left">添加内容信息</th>
                <th align="left">分类管理</th>
            </tr>
            <?php echo ($level_html); ?>




        </table>

        <!--
        <table class="tb tb2 ">
          <tr class="header">
            <th align="left">排序</th>
            <th align="left">版块名称</th>
            <th align="left"></th>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div class="parentboard"> Discuz </div></td>
            <td><a href="?action=forums&operation=edit&fid=1" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=delete&fid=1" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div class="board"> 新版块名称 </div></td>
            <td><a href="?action=forums&operation=edit&fid=7" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=7" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=7" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div id="cb_15" class="childboard"> 新版块名称111 </div></td>
            <td><a href="?action=forums&operation=edit&fid=15" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=15" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=15" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div id="cb_14" class="childboard"> 新版块名称1111 </div></td>
            <td><a href="?action=forums&operation=edit&fid=14" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=14" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=14" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div id="cb_13" class="childboard"> 新版块名称111 </div></td>
            <td><a href="?action=forums&operation=edit&fid=13" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=13" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=13" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div id="cb_16" class="childboard"> 新版块名称111 </div></td>
            <td><a href="?action=forums&operation=edit&fid=16" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=16" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=16" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div class="board"> 新版块名称 </div></td>
            <td><a href="?action=forums&operation=edit&fid=6" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=6" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=6" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div class="board"> 新版块名称 </div></td>
            <td><a href="?action=forums&operation=edit&fid=5" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=5" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=5" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div class="board"> 默认版块 </div></td>
            <td><a href="?action=forums&operation=edit&fid=2" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=2" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=2" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div class="parentboard"> 新分区名称 </div></td>
            <td><a href="?action=forums&operation=edit&fid=3" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=delete&fid=3" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
          <tr class="hover">
            <td class="td25">0</td>
            <td><div class="board"> 新版块名称 </div></td>
            <td><a href="?action=forums&operation=edit&fid=10" title="编辑本版块设置" class="act">编辑</a><a href="?action=forums&operation=copy&source=10" title="将本版块的设置复制到其他版块" class="act">设置复制</a><a href="?action=forums&operation=delete&fid=10" title="删除本版块及其中所有帖子" class="act">删除</a></td>
          </tr>
        </table>
         -->


        <div class="margintop"></div>

    </div>
</div>
</body>
</html>