<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <link rel="stylesheet" href="/webdemo/Public/admin/images/admincp.css" type="text/css" media="all" />
    <meta content="xSite Inc." name="Copyright" />
    <script src="/webdemo/Public/js/common.js" type="text/javascript"></script>
    <script type="text/javascript" src="/webdemo/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/webdemo/Public/js/ckeditor.js"></script>
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

    <h3 class="marginbot">网站首页配置</h3>

    <div class="note fixwidthdec">
        <p class="i">你可通过下面的设置来改变网站首页的样式。</p>
    </div>

    <div class="mainbox">

        <form action="xsite.php?action=first" method="post" enctype="multipart/form-data" name="html_edit" id="html_edit">

            <table class="opt">

                <tr><th>分类ID<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[网站首页左边的第1个分类[index_L_cat1]]</span></th></tr><tr><td><label>
                <select name="data[index_L_cat1]" id="index_L_cat1" class="txt" style="width:200px; height:18px;">
                    <option value="0">--请选择--</option>
                    <option value="news" selected="selected">公司动态</option>
                    <option value="sales" >&nbsp;&nbsp;|----促销活动</option>
                    <option value="s1" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----X月A促销</option>
                    <option value="s2" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----X月B促销</option>
                    <option value="market" >&nbsp;&nbsp;|----市场前景</option></label></td></tr>



                <tr><th>分类ID<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[网站首页左边的第2个分类[index_L_cat2]]</span></th></tr><tr><td><label>
                <select name="data[index_L_cat2]" id="index_L_cat2" class="txt" style="width:200px; height:18px;">
                    <option value="0">--请选择--</option>
                    <option value="service" selected="selected">主营产品</option>
                    <option value="all" >&nbsp;&nbsp;|----综合类</option>
                    <option value="p2" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----产品分类A</option>
                    <option value="p3" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----产品分类B</option>
                    <option value="other" >&nbsp;&nbsp;|----其它类</option>
                    <option value="p1" >&nbsp;&nbsp;|----分类B</option></label></td></tr>



                <tr><th>分类ID<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[网站首页左边的第3个分类[index_L_cat3]]</span></th></tr><tr><td><label>
                <select name="data[index_L_cat3]" id="index_L_cat3" class="txt" style="width:200px; height:18px;">
                    <option value="0">--请选择--</option>
                    <option value="about" >企业简介</option>
                    <option value="company" >&nbsp;&nbsp;|----企业文化</option>
                    <option value="c1" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----成长之路</option>
                    <option value="c2" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----荣誉资质</option>
                    <option value="team" >&nbsp;&nbsp;|----管理团队</option>
                    <option value="hr" >&nbsp;&nbsp;|----企业招聘</option>
                    <option value="customer" >&nbsp;&nbsp;|----合作客户</option>
                    <option value="contact" selected="selected">联系我们</option></label></td></tr>



                <tr><th>分类ID<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[网站首页右边的第1个分类[index_R_cat1]]</span></th></tr><tr><td><label>
                <select name="data[index_R_cat1]" id="index_R_cat1" class="txt" style="width:200px; height:18px;">
                    <option value="0">--请选择--</option>
                    <option value="about" >企业简介</option>
                    <option value="company" >&nbsp;&nbsp;|----企业文化</option>
                    <option value="c1" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----成长之路</option>
                    <option value="c2" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----荣誉资质</option>
                    <option value="team" >&nbsp;&nbsp;|----管理团队</option>
                    <option value="hr" >&nbsp;&nbsp;|----企业招聘</option>
                    <option value="customer" >&nbsp;&nbsp;|----合作客户</option>
                    <option value="contact" >联系我们</option></label></td></tr>



                <tr><th>分类ID<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[网站首页右边的第2个分类[index_R_cat2]]</span></th></tr><tr><td><label>
                <select name="data[index_R_cat2]" id="index_R_cat2" class="txt" style="width:200px; height:18px;">
                    <option value="0">--请选择--</option>
                    <option value="service" selected="selected">主营产品</option>
                    <option value="all" >&nbsp;&nbsp;|----综合类</option>
                    <option value="p2" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----产品分类A</option>
                    <option value="p3" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----产品分类B</option>
                    <option value="other" >&nbsp;&nbsp;|----其它类</option>
                    <option value="p1" >&nbsp;&nbsp;|----分类B</option></label></td></tr>



                <tr><th>分类ID<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[网站首页右边的第3个分类[index_R_cat3]]</span></th></tr><tr><td><label>
                <select name="data[index_R_cat3]" id="index_R_cat3" class="txt" style="width:200px; height:18px;">
                    <option value="0">--请选择--</option>
                    <option value="news" >公司动态</option>
                    <option value="sales" >&nbsp;&nbsp;|----促销活动</option>
                    <option value="s1" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----X月A促销</option>
                    <option value="s2" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----X月B促销</option>
                    <option value="market" >&nbsp;&nbsp;|----市场前景</option></label></td></tr>



                <tr><th>分类ID<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[网站首页右边的第4个分类[index_R_cat4]]</span></th></tr><tr><td><label>
                <select name="data[index_R_cat4]" id="index_R_cat4" class="txt" style="width:200px; height:18px;">
                    <option value="0">--请选择--</option>
                    <option value="news" >公司动态</option>
                    <option value="sales" >&nbsp;&nbsp;|----促销活动</option>
                    <option value="s1" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----X月A促销</option>
                    <option value="s2" >&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----X月B促销</option>
                    <option value="market" selected="selected">&nbsp;&nbsp;|----市场前景</option></label></td></tr>

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