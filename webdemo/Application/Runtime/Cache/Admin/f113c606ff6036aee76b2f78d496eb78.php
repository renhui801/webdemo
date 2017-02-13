<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <link rel="stylesheet" href="/webdemo/Public/admin/images/admincp.css" type="text/css" media="all" />
    <meta content="xSite Inc." name="Copyright" />
    <script src="/webdemo/Public/admin/js/common.js" type="text/javascript"></script>
    <script type="text/javascript" src="/webdemo/Public/js/jquery.js"></script>
    <script type="text/javascript" src=/webdemo/Public/js/ckeditor.js"></script>
    <script type="text/javascript" src="/webdemo/Public/js/ckfinder.js"></script>

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

    <h3 class="marginbot">网站风格配置</h3>

    <div class="note fixwidthdec">
        <p class="i">你可通过下面的设置来改变网站的风格样式。</p>
    </div>

    <div class="mainbox">

        <form action="xsite.php?action=tplconfig" method="post" enctype="multipart/form-data" name="html_edit" id="html_edit">

            <table class="opt">

                <tr><th>网站LOGO<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[该套风格的LOGO文件]</span></th></tr><tr><td><label><input name="tpl_logo" type="file" id="tpl_logo" class="uploadbtn marginbot" style="width:300px; height:18px;"></label><label><input name='data[tpl_logo]' id='hidden_tpl_logo' type='hidden' value='' /></label></td></tr>



                <tr><th>广告图片<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[该套风格的第1个Banner文件，只能传jpg,gif,png格式]</span></th></tr><tr><td><label><input name="tpl_banner_1" type="file" id="tpl_banner_1" class="uploadbtn marginbot" style="width:300px; height:18px;"></label><label><input name='data[tpl_banner_1]' id='hidden_tpl_banner_1' type='hidden' value='' /></label></td></tr>



                <tr><th>广告链接<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[该套风格的的第1个BANNER文件链接到哪个网址？]</span></th></tr><tr><td><label><input name="data[tpl_banner_1_link]" type="text" id="tpl_banner_1_link" value="http://www.php.net.cn/xsite/url.html" class="txt" style="width:300px; height:18px;"></label></td></tr>



                <tr><th>广告图片<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[该套风格的第2个Banner文件，只能传jpg,gif,png格式]</span></th></tr><tr><td><label><input name="tpl_banner_2" type="file" id="tpl_banner_2" class="uploadbtn marginbot" style="width:300px; height:18px;"></label><label><input name='data[tpl_banner_2]' id='hidden_tpl_banner_2' type='hidden' value='' /></label></td></tr>



                <tr><th>广告链接<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[该套风格的的第2个BANNER文件链接到哪个网址？]</span></th></tr><tr><td><label><input name="data[tpl_banner_2_link]" type="text" id="tpl_banner_2_link" value="http://www.php.net.cn/xsite/url.html" class="txt" style="width:300px; height:18px;"></label></td></tr>



                <tr><th>广告图片<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[该套风格的第3个Banner文件，只能传jpg,gif,png格式]</span></th></tr><tr><td><label><input name="tpl_banner_3" type="file" id="tpl_banner_3" class="uploadbtn marginbot" style="width:300px; height:18px;"></label><label><input name='data[tpl_banner_3]' id='hidden_tpl_banner_3' type='hidden' value='' /></label></td></tr>



                <tr><th>广告链接<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[该套风格的的第3个BANNER文件链接到哪个网址？]</span></th></tr><tr><td><label><input name="data[tpl_banner_3_link]" type="text" id="tpl_banner_3_link" value="http://www.php.net.cn/xsite/url.html" class="txt" style="width:300px; height:18px;"></label></td></tr>



                <tr><th>缩略图宽度<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[模板中所使用的图片缩略图的宽度]</span></th></tr><tr><td><label><input name="data[tpl_images_thumb_width]" type="text" id="tpl_images_thumb_width" value="160" class="txt" style="width:100px; height:18px;"></label></td></tr>



                <tr><th>缩略图高度<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[模板中所使用的图片缩略图的高度]</span></th></tr><tr><td><label><input name="data[tpl_images_thumb_height]" type="text" id="tpl_images_thumb_height" value="120" class="txt" style="width:100px; height:18px;"></label></td></tr>



                <tr><th>产品排序设置<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[产品列表是否采用降序排序，默认采用降序]</span></th></tr><tr><td><label><input name="data[tpl_product_list_desc]" type="text" id="tpl_product_list_desc" value="1" class="txt" style="width:100px; height:18px;"></label></td></tr>



                <tr><th>列表显示条数<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[产品列表，每页显示的条数]</span></th></tr><tr><td><label><input name="data[tpl_product_list_limit]" type="text" id="tpl_product_list_limit" value="8" class="txt" style="width:100px; height:18px;"></label></td></tr>



                <tr><th>文章排序设置<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[文章列表是否采用降序排序，默认采用降序]</span></th></tr><tr><td><label><input name="data[tpl_article_list_desc]" type="text" id="tpl_article_list_desc" value="1" class="txt" style="width:100px; height:18px;"></label></td></tr>



                <tr><th>列表显示条数<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[文章列表，每页显示的条数]</span></th></tr><tr><td><label><input name="data[tpl_article_list_limit]" type="text" id="tpl_article_list_limit" value="10" class="txt" style="width:100px; height:18px;"></label></td></tr>

            </table>

            <p>
                <label>
                    <input type="submit" name="dosubmit" value=" 保存编辑 " class="btn" tabindex="3" />

                </label>
            </p>
        </form>

        <div class="margintop"></div>


    </div>
</div>



</body>
</html>