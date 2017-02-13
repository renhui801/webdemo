<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <link rel="stylesheet" href="/webdemo/Public/css/admincp.css" type="text/css" media="all" />
    <meta content="xSite Inc." name="Copyright" />
    <script type="text/javascript" src="/webdemo/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/webdemo/Public/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/webdemo/Public/ckfinder/ckfinder.js"></script>

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

</script>


<div class="container">

    <h3 class="marginbot">
        <select name="category_list" onchange="select_category()" id="category_list">
            <option value="<?php echo ($urlProduct); ?>" >全部分类</option>
            <?php echo ($selectList); ?>
        </select>

        <a href="<?php echo ($urlNav); ?>" class="sgbtn"><span>返回列表</span></a>
    </h3>

    <div class="note fixwidthdec">
        <p class="i">在这里编辑或添加新的文章。</p>
    </div>


    <div class="mainbox nomargin">
        <form name="form1" method="post" enctype="multipart/form-data" action="<?php echo ($url); ?>">


            <table class="opt">

                <tr><th>文章主标题<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[必填]</span></th></tr><tr><td><label><input name="data[name]" type="text" id="name" value="<?php echo ($data["name"]); ?>" class="txt" style="width:300px; height:18px;"></label></td></tr>



                <tr><th>文章简要描述<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[必填]</span></th></tr><tr><td><label><input name="data[keywords]" type="text" id="keywords" value="<?php echo ($data["keywords"]); ?>" class="txt" style="width:300px; height:18px;"></label></td></tr>



                <tr><th>介绍图片<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[图片格式必须为.jpg或.gif格式]</span></th></tr><tr><td><label><input name="ptitle" type="file" id="ptitle" class="uploadbtn marginbot" style="width:300px; height:18px;"></label><label>&nbsp;&nbsp;<b><a target='_blank' rel='lightbox[roadtrip]' href='<?php echo ($data["ptitle"]); ?>'>查看已上传文件</a></b>&nbsp;&nbsp;<input name='del_file[ptitle]' type='checkbox' value='<?php echo ($data["ptitle"]); ?>'>&nbsp;删除它</label></td></tr>


                <tr><th>文章详细内容<a style="cursor:hand" onclick="create_editor('content');">[开]</a><a style="cursor:hand" onclick="close_editor();">[关]</a><a target="_blank" href="http://www.webps.cn">[图]</a><span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[这是必填项]</span></th></tr><tr><td><label><textarea name="data[content]" id="content" class="editcontent" style="width:600px; height:400px;">
                <?php echo ($data["content"]); ?>
                </textarea>
            </label></td></tr>
               <tr><th>自定义页面CSS代码<span style="margin-left:20px;font-weight: lighter;font:12px;color: #CCCCCC;">[这是选填项]</span></th></tr><tr><td><label><textarea name="data[page_css]" id="page_css" class="tarea" style="width:300px; height:100px;"><?php echo ($data["page_css"]); ?></textarea></label></td></tr>

            </table>

            <h3>SEO设置</h3>
            <table class="inputlist">

                <tr><td class="form_left_space">头部默认的SEO标题</td><td class="form_right_space"><label><input name="data[seo_title]" type="text" id="seo_title" value="<?php echo ($data["seo_title"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;选填&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">头部默认的SE0描述</td><td class="form_right_space"><label><textarea name="data[seo_description]" id="seo_description" class="txt" style="width:300px; height:100px;"><?php echo ($data["seo_title"]); ?></textarea></label></td><td>&nbsp;&nbsp;选填&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">头部默认的SEO关键词</td><td class="form_right_space"><label><input name="data[seo_keywords]" type="text" id="seo_keywords" value="<?php echo ($data["seo_title"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;选填&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">头部默认的SEO作者</td><td class="form_right_space"><label><input name="data[seo_author]" type="text" id="seo_author" value="<?php echo ($data["seo_title"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;选填&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">头部默认的SEO版权信息</td><td class="form_right_space"><label><input name="data[seo_copyright]" type="text" id="seo_copyright" value="<?php echo ($data["seo_title"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;选填&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">禁止搜索引擎索引</td><td class="form_right_space"><label><input name="data[seo_noindex]" type="text" id="seo_noindex" value="<?php if(($$data["seo_noindex"]) != "1"): ?>4<?php endif; ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;是否禁止搜索引擎收录，“1”为是，“4”为否&nbsp;&nbsp;</td></tr>

            </table>
            <input name="data[id]" type="hidden" value="<?php echo ($id); ?>"/>
            <input name="data[category_id]" type="hidden" value="<?php echo ($category_id); ?>"/>

            <div class="opt">
                <input type="submit" name="dosubmit" value=" 提 交 " class="btn" tabindex="3" />
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    //<![CDATA[

    var editor_status = 0;

    var editor = null;

    function close_editor() {
        if (editor_status != 1) {
            return false;
        }

        editor.destroy();
        editor_status = 0;
    }

    function create_editor(div){

        if (editor_status != 0) {
            return false;
        }

        window.editor = CKEDITOR.replace( div,
                {
                    height:'400px',
                    width:'600px',

                });
        CKFinder.setupCKEditor( editor, { basePath : '/webdemo/Public/ckfinder/', rememberLastFolder : false });

        editor_status = 1;
    }

    create_editor('content');


    //]]>
</script>


</body>
</html>