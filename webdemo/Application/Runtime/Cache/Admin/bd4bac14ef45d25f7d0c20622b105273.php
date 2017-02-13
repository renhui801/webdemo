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



<div class="container">

    <h3 class="marginbot">碎片列表</h3>

    <div class="note fixwidthdec">
        <p class="i">你可以对下面的HTML碎片代码进行设置。</p>
    </div>

    <div class="mainbox">

        <table class="inputlist">
            <tr>
                <th nowrap="nowrap">碎片ID</th>
                <th nowrap="nowrap">碎片作用</th>
                <th nowrap="nowrap">管理碎片</th>
            </tr>
            <tr>
                <td style="padding:5px">[ contact ] </td>
                <td style="padding:5px"> 全站通用的联系方式 </td>
                <td width="60" style="padding:5px"> <a href="xsite.php?action=block&operation=edit&key=contact"> 编辑 </a></td>
            </tr>
            <tr>
                <td style="padding:5px">[ adcode ] </td>
                <td style="padding:5px"> 为网站设置一个广告代码 </td>
                <td width="60" style="padding:5px"> <a href="xsite.php?action=block&operation=edit&key=adcode"> 编辑 </a></td>
            </tr>
        </table>


        <div class="margintop"></div>


    </div>
</div>
</body>
</html>