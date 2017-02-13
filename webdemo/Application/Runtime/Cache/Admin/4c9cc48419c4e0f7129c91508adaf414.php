<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <link rel="stylesheet" href="/webdemo/Public/admin/images/admincp.css" type="text/css" media="all" />
    <meta content="xSite Inc." name="Copyright" />
    <script src="/webdemo/Public/js/common.js" type="text/javascript"></script>
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
    var article_category = new Array();
    <?php echo ($js); ?>
    function select_operation(f) {
        document.postform.new_category_id.length = 0; //初始化下拉列表 清空下拉数据
        document.postform.new_category_id.style.display = 'none';

        if (f.options[f.selectedIndex].value == 'del') {
            //删除处理
        }
        if (f.options[f.selectedIndex].value == 'move') {
            document.postform.new_category_id.style.display = '';
            for (var i in article_category) {
                //alert(group_list[f.options[f.selectedIndex].value][i]);
                document.postform.new_category_id.options[document.postform.new_category_id.length] = new Option(article_category[i], i);
            }
        }

    }

</script>

<div class="container">

    <h3 class="marginbot">
        <select name="category_list" onchange="select_category()" id="category_list">
            <option value="<?php echo ($url); ?>" >全部分类</option>

            <?php echo ($selectList); ?>
        </select>

        <a href="<?php echo ($addarticle); ?>" class="sgbtn"><span>添加产品</span></a>
        <a onClick="return confirm('此操作需要几分钟或更长时间，确定要进行吗？')"  href="" class="sgbtn"><span>更新所有栏索引</span></a>
    </h3>

    <div class="note fixwidthdec">
        <p class="i">这里是产品内容列表。</p>
    </div>

    <div class="mainbox">
        <form id="postform" name="postform" method="post" action="<?php echo ($ArticleListEdit); ?>">
            <table class="inputlist">
                <tr>
                    <th><label><input class="checkbox" type="checkbox" id="chkall" name="chkall" onClick="checkall(this.form);" /></label></th>
                    <th nowrap="nowrap">标题</th>
                    <th nowrap="nowrap">时间</th>
                    <th nowrap="nowrap">标题图</th>
                    <th nowrap="nowrap">编辑</th>
                    <th nowrap="nowrap">删除</th>
                </tr>
                <?php echo ($articleList); ?>
            </table>
            管理动作：
            <label>
                <select name="batch_action" id="batch_action" onChange="select_operation(this);">
                    <option value="0">----</option>
                    <option value="del">删除</option>
                    <option value="move">移动</option>
                </select>
            </label>
            <label><select name="new_category_id" id="new_category_id" style="display:none"></select></label>
            <label>
                <input name="category" type="hidden" value="<?php echo ($category); ?>">
                <input name="page" type="hidden" value="1"></label>
            <label><input type="submit" name="Submit" class="btn" value="提交" /></label>

        </form>


        <div class="margintop"></div>





    </div>
</div>
</body>
</html>