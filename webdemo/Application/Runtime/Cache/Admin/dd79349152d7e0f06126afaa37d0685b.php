<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <link rel="stylesheet" href="/webdemo/Public/css/admincp.css" type="text/css" media="all" />
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

        <h3 class="marginbot">



            选择栏目模型：<a <?php echo ($hidden); ?> href="<?php echo ($add["page"]); ?>&id=<?php echo ($get["id"]); ?>&parentId=<?php echo ($get["parentId"]); ?>&level=<?php echo ($get["level"]); ?>" class="sgbtn">单页</a>
            <a <?php echo ($hidden); ?> href="<?php echo ($add["article"]); ?>&id=<?php echo ($get["id"]); ?>&parentId=<?php echo ($get["parentId"]); ?>&level=<?php echo ($get["level"]); ?>" class="sgbtn">文章</a>
            <a  href="javascript:void(0);" class="">产品</a>
            <a <?php echo ($hidden); ?> href="<?php echo ($add["url"]); ?>&id=<?php echo ($get["id"]); ?>&parentId=<?php echo ($get["parentId"]); ?>&level=<?php echo ($get["level"]); ?>" class="sgbtn">链接</a>

        </h3>

        <div class="note fixwidthdec">
            <p class="i">这是一个产品信息管理模块。</p>
        </div>

        <form action="<?php echo ($url); ?>" method="post" enctype="multipart/form-data" name="form1">
            <h3>分类基本设置</h3>
            <table class="inputlist">

                <tr><td class="form_left_space">分类名称</td><td class="form_right_space"><label><input name="name" type="text" id="name" value="<?php echo ($data["name"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;必填项&nbsp;&nbsp;</td></tr>


                <tr><td class="form_left_space">分类排序ID</td><td class="form_right_space"><label><input name="sort" type="text" id="sort" value="<?php echo ($data["sort"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;分类排序ID，产品分类从小到大排序&nbsp;&nbsp;</td></tr>


                <tr><td class="form_left_space">是否显示该分类</td><td class="form_right_space"><label><input name="display" type="text" id="display" value="<?php if(($data["display"]) != "4"): ?>1<?php endif; ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;“1”显示分类，“4”隐藏分类&nbsp;&nbsp;</td></tr>

            </table>

            <h3>SEO设置</h3>
            <table class="inputlist">

                <tr><td class="form_left_space">SEO标题</td><td class="form_right_space"><label><input name="seo_title" type="text" id="seo_title" value="<?php echo ($data["seo_title"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">SE0描述</td><td class="form_right_space"><label><textarea name="seo_description" id="seo_description" class="txt" style="width:300px; height:60px;"><?php echo ($data["seo_description"]); ?></textarea></label></td><td>&nbsp;&nbsp;SEO描述信息&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">SEO关键词</td><td class="form_right_space"><label><input name="seo_keywords" type="text" id="seo_keywords" value="<?php echo ($data["seo_keywords"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>

            </table>

            <div class="opt">
                <input type="submit" name="dosubmit" value=" 提 交 " class="btn" tabindex="3" />
                <input name="parent_id" type="hidden" id="parent_category" value="<?php echo ($data["parent_id"]); ?>">
                <input name="level" type="hidden" id="level" value="<?php echo ($data["level"]); ?>">
                <input name="type" type="hidden" id="module" value="product">
                <input name="id" type="hidden" id="id" value="<?php echo ($data["id"]); ?>">
            </div>
        </form>

    </div>
</div>
</body>
</html>