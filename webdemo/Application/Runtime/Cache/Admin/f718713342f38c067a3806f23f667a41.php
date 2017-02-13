<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <style>
        /* common */
        *{ word-wrap:break-word; outline:none; }
        body{ width:159px; background:#F2F9FD url(/webdemo/Public/admin/images/bg_repx_h.gif) right top no-repeat; color:#666; font:12px "Lucida Grande", Verdana, Lucida, Helvetica, Arial, "宋体" ,sans-serif; }
        body, ul{ margin:0; padding:0; }
        a{ color:#2366A8; text-decoration:none; }
        a:hover { text-decoration:underline; }
        .menu{ position:relative; z-index:20; }
        .menu ul{ position:absolute; top:10px; right:-1px !important; right:-2px; list-style:none; width:150px; background:#F2F9FD url(/webdemo/Public/admin/images/bg_repx_h.gif) right -20px no-repeat; }
        .menu li{ margin:3px 0; *margin:1px 0; height:auto !important; height:24px; overflow:hidden; font-size:14px; font-weight:700; }
        .menu li a{ display:block; margin-right:2px; padding:3px 0 2px 30px; *padding:4px 0 2px 30px; border:1px solid #F2F9FD; background:url(/webdemo/Public/admin/images/bg_repno.gif) no-repeat 10px -40px; color:#666; }
        .menu li a:hover{ text-decoration:none; margin-right:0; border:1px solid #B5CFD9; border-right:1px solid #FFF; background:#FFF; }
        .menu li a.tabon{ text-decoration:none; margin-right:0; border:1px solid #B5CFD9; border-right:1px solid #FFF; background:#FFF url(/webdemo/Public/admin/images/bg_repy.gif) repeat-y; color:#2366A8; }
        .footer{ position:absolute; z-index:10; right:35px; bottom:0; padding:5px 0; line-height:150%; background:url(/webdemo/Public/admin/images/bg_repx.gif) 0 -199px repeat-x; font-family:Arial, sans-serif; font-size:12px;font-style: italic }
    </style>
</head>
<body>
<div class="menu">
    <ul id="leftmenu">
        <li><a id="m1" onclick="menu_style('m1')" href="/webdemo/Admin/Index/defaultframe" target="main" class="tabon">后台管理中心</a></li>

        <li><a id="m2" onclick="menu_style('m2')" href="/webdemo/Admin/Index/setting" target="main">网站基本设置</a></li>

        <li><a id="m3" onclick="menu_style('m3')" href="/webdemo/Admin/Index/nav" target="main">网站导航中心</a></li>

        <li><a id="m4" onclick="menu_style('m4')" href="/webdemo/Admin/Index/article" target="main">文章内容管理</a></li>

        <li><a id="m5" onclick="menu_style('m5')" href="/webdemo/Admin/Index/product" target="main">产品内容管理</a></li>

        <li><a id="m6" onclick="menu_style('m6')" href="/webdemo/Admin/Index/theme" target="main">网站主题选择</a></li>

        <li><a id="m7" onclick="menu_style('m7')" href="/webdemo/Admin/Index/block" target="main">模板局部内容</a></li>

        <li><a id="m8" onclick="menu_style('m8')" href="/webdemo/Admin/Index/tplconfig" target="main">网站风格配置</a></li>

        <li><a id="m9" onclick="menu_style('m9')" href="/webdemo/Admin/Index/first" target="main">网站首页设置</a></li>

        <li><a id="m10" onclick="menu_style('m10')" href="/webdemo/Admin/Index/attachments" target="main">网站附件管理</a></li>

        <li><a id="m13" onclick="menu_style('m13')" href="/webdemo/Admin/Index/mobi" target="main">手机网站设置</a></li>
<!--

        <li><a id="m11" onclick="menu_style('m11')" href="update.php?action=version" target="main">网站升级程序</a></li>
-->
    </ul>
</div>
<div class="footer" style="text-align:center"> &copy; www.<a href="http://www.php.net.cn" target="_blank">PHP</a>.net.cn</div>
<script type="text/javascript">

    var menus = document.getElementById('leftmenu').getElementsByTagName('a');
    function menu_style(id) {
        for(var i = 0; i < menus.length; i++) {
            var menu = menus[i];
            menu.className = menu;
        }

        document.getElementById(id).className = 'tabon';
    }

</script>
</body>
</html>