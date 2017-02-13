<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

    <h3 class="marginbot">
        <a class="sgbtn" href="xsite.php?action=attachments&operation=list"><span>上级目录</span></a>
        <a class="sgbtn" href="xsite.php?action=attachments&operation=list"><span>附件列表</span></a>
        <a class="sgbtn" href="xsite.php?action=attachments&operation=upload"><span>上传附件</span></a>
        <a class="sgbtn" href="xsite.php?action=attachments&operation=mkdir"><span>创建目录</span></a>
    </h3>

    <div class="note fixwidthdec">
        <p class="i">当前位置：/xsite/attachments/421aa90e</p>
    </div>

    <div class="mainbox">

        <table class="inputlist">
            <tr>
                <th nowrap="nowrap">文件名</th>
                <th nowrap="nowrap">位置</th>
                <th nowrap="nowrap">复制URL</th>
                <th nowrap="nowrap">上传时间</th>
                <th nowrap="nowrap">删除</th>
            </tr>
            <tr>
                <td width="350"><a href="xsite.php?action=attachments&operation=list&dir=thumb" target="_self">thumb</a></td>
                <td>--</td>
                <td width="80">--</td>
                <td width="150">2016-11-09 16:28</td>
                <td width="60"><a onClick="return confirm('确定要删除这个文件夹么？');" href="xsite.php?action=attachments&operation=del&filename=thumb">删除</a></td>
            </tr>
            <tr>
                <td width="350"><a href="xsite.php?action=attachments&operation=list&dir=theme" target="_self">theme</a></td>
                <td>--</td>
                <td width="80">--</td>
                <td width="150">2016-10-26 17:08</td>
                <td width="60"><a onClick="return confirm('确定要删除这个文件夹么？');" href="xsite.php?action=attachments&operation=del&filename=theme">删除</a></td>
            </tr>
            <tr>
                <td width="350"><a href="xsite.php?action=attachments&operation=list&dir=mobi" target="_self">mobi</a></td>
                <td>--</td>
                <td width="80">--</td>
                <td width="150">2016-10-26 17:08</td>
                <td width="60"><a onClick="return confirm('确定要删除这个文件夹么？');" href="xsite.php?action=attachments&operation=del&filename=mobi">删除</a></td>
            </tr>
            <tr>
                <td width="350"><a href="xsite.php?action=attachments&operation=list&dir=article" target="_self">article</a></td>
                <td>--</td>
                <td width="80">--</td>
                <td width="150">2016-10-25 18:56</td>
                <td width="60"><a onClick="return confirm('确定要删除这个文件夹么？');" href="xsite.php?action=attachments&operation=del&filename=article">删除</a></td>
            </tr>
            <tr>
                <td width="350"><a href="xsite.php?action=attachments&operation=list&dir=media" target="_self">media</a></td>
                <td>--</td>
                <td width="80">--</td>
                <td width="150">2016-10-25 18:56</td>
                <td width="60"><a onClick="return confirm('确定要删除这个文件夹么？');" href="xsite.php?action=attachments&operation=del&filename=media">删除</a></td>
            </tr>
            <tr>
                <td width="350"><a href="xsite.php?action=attachments&operation=list&dir=page" target="_self">page</a></td>
                <td>--</td>
                <td width="80">--</td>
                <td width="150">2016-10-25 18:56</td>
                <td width="60"><a onClick="return confirm('确定要删除这个文件夹么？');" href="xsite.php?action=attachments&operation=del&filename=page">删除</a></td>
            </tr>
            <tr>
                <td width="350"><a href="xsite.php?action=attachments&operation=list&dir=product" target="_self">product</a></td>
                <td>--</td>
                <td width="80">--</td>
                <td width="150">2016-10-25 18:56</td>
                <td width="60"><a onClick="return confirm('确定要删除这个文件夹么？');" href="xsite.php?action=attachments&operation=del&filename=product">删除</a></td>
            </tr>
            <tr>
                <td width="350"><a href="xsite.php?action=attachments&operation=list&dir=public" target="_self">public</a></td>
                <td>--</td>
                <td width="80">--</td>
                <td width="150">2016-10-25 18:56</td>
                <td width="60"><a onClick="return confirm('确定要删除这个文件夹么？');" href="xsite.php?action=attachments&operation=del&filename=public">删除</a></td>
            </tr>

            <tr>
                <td width="350"><a href="http://localhost/xsite/attachments/421aa90e/logo.png" target="_blank">logo.png</a></td>
                <td><input type="text" value="http://localhost/xsite/attachments/421aa90e/logo.png" size="40" id="url4"> </td>
                <td width="80"><a href="javascript:urlCopy('url4')">复制URL</a></td>
                <td width="150">2016-10-25 18:56</td>
                <td width="60"><a href="xsite.php?action=attachments&operation=del&filename=logo.png">删除</a></td>
            </tr>
            <tr>
                <td width="350"><a href="http://localhost/xsite/attachments/421aa90e/mark.png" target="_blank">mark.png</a></td>
                <td><input type="text" value="http://localhost/xsite/attachments/421aa90e/mark.png" size="40" id="url5"> </td>
                <td width="80"><a href="javascript:urlCopy('url5')">复制URL</a></td>
                <td width="150">2016-10-25 18:56</td>
                <td width="60"><a href="xsite.php?action=attachments&operation=del&filename=mark.png">删除</a></td>
            </tr>

        </table>
        <div class="margintop"></div>

    </div>
</div>

<script language="javascript" type="text/javascript">
    function urlCopy(url) {
        var str=document.getElementById(url);//对象是QQ
        str.select(); //选择对象
        document.execCommand("Copy"); //执行浏览器复制命令
    }
</script>

</body>
</html>