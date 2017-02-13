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
    <div class="mainbox nomargin">
        <form action="xsite.php?action=mobi&operation=setting" method="post" enctype="multipart/form-data">

            <h3>手机网站全局设置</h3>
            <table class="inputlist">

                <tr><td class="form_left_space">手机网站标志</td><td class="form_right_space"><label><input name="mobi_logofile" type="file" id="mobi_logofile" class="uploadbtn marginbot" style="width:200px; height:18px;"></label><label><input name='data[mobi_logofile]' id='hidden_mobi_logofile' type='hidden' value='' /></label></td><td>&nbsp;&nbsp;推荐尺寸：186px × 32px&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">手机版首页第一张广告图片</td><td class="form_right_space"><label><input name="mobi_banner_ad1" type="file" id="mobi_banner_ad1" class="uploadbtn marginbot" style="width:200px; height:18px;"></label><label><input name='data[mobi_banner_ad1]' id='hidden_mobi_banner_ad1' type='hidden' value='' /></label></td><td>&nbsp;&nbsp;推荐尺寸：400px × 200px&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">第一张广告图片的标题</td><td class="form_right_space"><label><input name="data[mobi_banner_ad1_name]" type="text" id="mobi_banner_ad1_name" value="" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">广告图片的链接地址</td><td class="form_right_space"><label><input name="data[mobi_banner_ad1_link]" type="text" id="mobi_banner_ad1_link" value="http://www.php.net.cn/xsite/url.html" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;不填，默认为本网站首页&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">手机版首页第二张广告图片</td><td class="form_right_space"><label><input name="mobi_banner_ad2" type="file" id="mobi_banner_ad2" class="uploadbtn marginbot" style="width:200px; height:18px;"></label><label><input name='data[mobi_banner_ad2]' id='hidden_mobi_banner_ad2' type='hidden' value='' /></label></td><td>&nbsp;&nbsp;推荐尺寸：400px × 200px&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">第二张广告图片的标题</td><td class="form_right_space"><label><input name="data[mobi_banner_ad2_name]" type="text" id="mobi_banner_ad2_name" value="" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsnbsp;</td></tr>



                <tr><td class="form_left_space">广告图片的链接地址</td><td class="form_right_space"><label><input name="data[mobi_banner_ad2_link]" type="text" id="mobi_banner_ad2_link" value="http://www.php.net.cn/xsite/url.html" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;不填，默认为本网站首页&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">手机版首页第三张广告图片</td><td class="form_right_space"><label><input name="mobi_banner_ad3" type="file" id="mobi_banner_ad3" class="uploadbtn marginbot" style="width:200px; height:18px;"></label><label><input name='data[mobi_banner_ad3]' id='hidden_mobi_banner_ad3' type='hidden' value='' /></label></td><td>&nbsp;&nbsp;推荐尺寸：400px × 200px&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">第三张广告图片的标题</td><td class="form_right_space"><label><input name="data[mobi_banner_ad3_name]" type="text" id="mobi_banner_ad3_name" value="" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">广告图片的链接地址</td><td class="form_right_space"><label><input name="data[mobi_banner_ad3_link]" type="text" id="mobi_banner_ad3_link" value="http://www.php.net.cn/xsite/url.html" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;不填，默认为本网站首页&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">自定义栏目</td><td class="form_right_space"><label><textarea name="data[cat_links]" id="cat_links" class="tarea" style="width:300px; height:100px;">电脑版|http://www.

PHP|http://www.php.net.cn

看图网|http://www.kantu.com

xSite|http://www.xsite.cn</textarea></label></td><td>&nbsp;&nbsp;定义栏目格式如下：多个栏目用逗号“,”隔开或者一行一个，举例：<br/><br/>&nbsp;&nbsp;一栏|http://www.xsite.cn<br />&nbsp;&nbsp;二栏|http://www.php.net.cn&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">是否开启网站顶部小广告</td><td class="form_right_space"><label><input name="data[mobi_open_topad]" type="radio" id="mobi_open_topad1" value="1" class="txt" style="width:50px; height:18px;">开启</label><label><input name="data[mobi_open_topad]" type="radio" id="mobi_open_topad4" value="4" class="txt" style="width:50px; height:18px;" checked>关闭</label></td><td>&nbsp;&nbsp;可选值为：为空或者“1”表示开启，“4”表示关闭，默认为“4”&nbsp;&nbsp;</td></tr>

            </table>

            <div class="opt">
                <input type="submit" name="dosubmit" value=" 提 交 " class="btn" tabindex="3" />
            </div>
        </form>
    </div>
</div>
</body>
</html>