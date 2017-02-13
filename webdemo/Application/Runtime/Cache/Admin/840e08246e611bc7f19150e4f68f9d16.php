<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <script type="text/javascript" src="/webdemo/Public/js/jquery.js"></script>
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
   /* $(function () {
        if(<?php echo ($setting_info["auto_start_editor"]); ?>==1){
            $(':radio[name="data[auto_start_editor]"]').eq(0).attr("checked",true);
        }
        else
        {
            $(':radio[name="data[auto_start_editor]"]').eq(1).attr("checked",true);
        }
        $('#auto_start_editor1').click(function () {
            $(this).attr("checked",true);
            $('#auto_start_editor4').attr("checked",false);

        });
        $('#auto_start_editor4').click(function() {
            $(this).attr("checked",true);
            $('#auto_start_editor1').attr("checked",false);

        });
    }) */
</script>
<div class="container">
    <div class="mainbox nomargin">
        <form action="<?php echo ($setting_url); ?>" method="post" enctype="multipart/form-data">

            <h3>LOGO设置</h3>
            <table class="inputlist">

                <tr><td class="form_left_space">LOGO文件</td><td class="form_right_space"><label><input name="logofile" type="file" id="logofile" class="uploadbtn marginbot" style="width:200px; height:18px;"></label><label>&nbsp;&nbsp;<b><a target='_blank' rel='lightbox[roadtrip]' href="<?php echo ($setting_info["logofile"]); ?>">查看已上传文件</a></b>&nbsp;&nbsp;<input name='del_file[logofile]' type='checkbox' value='<?php echo ($setting_info["logofile"]); ?>'>&nbsp;删除它</label></td><td>&nbsp;&nbsp;图片格式必须为.jpg或.gif格式&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">LOGO图片标题</td><td class="form_right_space"><label><input name="data[logofile_alt]" type="text" id="logofile_alt" value="<?php echo ($setting_info["logofile_alt"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;网站LOGO的图片标题&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">默认BANNER视频的链接地址</td><td class="form_right_space"><label><input name="data[banner_flv]" type="text" id="banner_flv" value="<?php echo ($setting_info["banner_flv"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;如果开启视频BANNER，请输入正确的“FLV”视频文件的地址&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">首页背音乐MP3文件URL地址</td><td class="form_right_space"><label><input name="data[site_bgsound]" type="text" id="site_bgsound" value="<?php echo ($setting_info["site_bgsound"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;只能是正确的MP3格式，若开启，则输入mp3地址&nbsp;&nbsp;</td></tr>

            </table>

            <h3>全局SEO设置</h3>
            <table class="inputlist">

                <tr><td class="form_left_space">SEO标题</td><td class="form_right_space"><label><input name="data[seo_title]" type="text" id="seo_title" value="<?php echo ($setting_info["seo_title"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">SE0描述</td><td class="form_right_space"><label><textarea name="data[seo_description]" id="seo_description" class="txt" style="width:400px; height:100px;"><?php echo ($setting_info["seo_description"]); ?></textarea></label></td><td>&nbsp;&nbsp;SEO描述信息&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">SEO关键词</td><td class="form_right_space"><label><input name="data[seo_keywords]" type="text" id="seo_keywords" value="<?php echo ($setting_info["seo_keywords"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">SEO作者</td><td class="form_right_space"><label><input name="data[seo_author]" type="text" id="seo_author" value="<?php echo ($setting_info["seo_author"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">SEO版权信息</td><td class="form_right_space"><label><input name="data[seo_copyright]" type="text" id="seo_copyright" value="<?php echo ($setting_info["seo_copyright"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>

            </table>

            <h3>其它应用设置</h3>
            <table class="inputlist">

                <tr><td class="form_left_space">是否默认启用HTML编辑器</td><td class="form_right_space"><label><input name="data[auto_start_editor]" type="radio" id="auto_start_editor1" value="1" class="txt" style="width:50px; height:18px;"  <?php if(($setting_info["auto_start_editor"]) == "1"): ?>checked<?php endif; ?> >开启</label><label><input name="data[auto_start_editor]" type="radio" id="auto_start_editor4" value="4" class="txt" style="width:50px; height:18px;" <?php if(($setting_info["auto_start_editor"]) != "1"): ?>checked<?php endif; ?> >关闭</label></td><td>&nbsp;&nbsp;可选值为：为空或者“1”表示开启，“4”表示关闭，默认为“1”&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">是否开启手机版网站访问</td><td class="form_right_space"><label><input name="data[mobile_web]" type="radio" id="mobile_web1" value="1" class="txt" style="width:50px; height:18px;"  <?php if(($setting_info["mobile_web"]) != "4"): ?>checked<?php endif; ?> >开启</label><label><input name="data[mobile_web]" type="radio" id="mobile_web4" value="4" class="txt" style="width:50px; height:18px;" <?php if(($setting_info["mobile_web"]) == "4"): ?>checked<?php endif; ?> >关闭</label></td><td>&nbsp;&nbsp;可选值为：为空或者“1”表示开启，“4”表示关闭，默认为“1”&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">网站图片水印文件</td><td class="form_right_space"><label><input name="watermark" type="file" id="watermark" class="uploadbtn marginbot" style="width:200px; height:18px;"></label><label>&nbsp;&nbsp;<b><a target='_blank' rel='lightbox[roadtrip]' href='<?php echo ($setting_info["watermark"]); ?>'>查看已上传文件</a></b>&nbsp;&nbsp;<input name='del_file[watermark]' type='checkbox' value='<?php echo ($setting_info["watermark"]); ?>'>&nbsp;删除它</label></td><td>&nbsp;&nbsp;尽量使用PNG格式&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">发内容时，是否自动下载远程图片</td><td class="form_right_space"><label><input name="data[auto_image]" type="radio" id="auto_image1" value="1" class="txt" style="width:50px; height:18px;" <?php if(($setting_info["auto_image"]) == "1"): ?>checked<?php endif; ?> >开启</label><label><input name="data[auto_image]" type="radio" id="auto_image4" value="4" class="txt" style="
                width:50px; height:18px;"  <?php if(($setting_info["auto_image"]) != "1"): ?>checked<?php endif; ?> >关闭</label></td><td>&nbsp;&nbsp;可选值为：“1”表示开启，“4”表示关闭，默认为“4”&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">首页是否显示在线客服</td><td class="form_right_space"><label><input name="data[display_guest]" type="radio" id="display_guest1" value="1" class="txt" style="width:50px; height:18px;" <?php if(($setting_info["display_guest"]) != "4"): ?>checked<?php endif; ?> >开启</label><label><input name="data[display_guest]" type="radio" id="display_guest4" value="4" class="txt" style="width:50px; height:18px;" <?php if(($setting_info["display_guest"]) == "4"): ?>checked<?php endif; ?> >关闭</label></td><td>&nbsp;&nbsp;可选值为：“1”表示开启，“4”表示关闭，默认为“4”&nbsp;&nbsp;</td></tr>




<tr><td class="form_left_space">网站友情链接</td><td class="form_right_space"><label><textarea name="data[swap_links]" id="swap_links" class="tarea" style="width:300px; height:100px;"><?php echo ($setting_info["swap_links"]); ?></textarea></label></td><td>&nbsp;&nbsp;友情链接格式如下：多个友情链接请用逗号“,”隔开或者一行一个：<br/>&nbsp;&nbsp;文字格式举例：建站软件|http://www.xsite.cn<br/>&nbsp;&nbsp;图片格式举例：建站软件|http://www.xsite.cn|/templates/default/logo.gif&nbsp;&nbsp;</td></tr>

<tr><td class="form_left_space">网站客服信息设置</td><td class="form_right_space"><label><textarea name="data[online_service]" id="online_service" class="tarea" style="width:300px; height:100px;"><?php echo ($setting_info["online_service"]); ?>
</textarea></label></td><td>&nbsp;&nbsp;请按以下格式输入客服信息(举例)：<br/>&nbsp;&nbsp;QQ：28693177<br/>&nbsp;&nbsp;TEL：020-37202015<br />&nbsp;&nbsp;TEL：15360819831<br />&nbsp;&nbsp;WW：dnok<br />&nbsp;&nbsp;TB:dnok&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">ICP备案信息</td><td class="form_right_space"><label><input name="data[website_icp]" type="text" id="website_icp" value="<?php echo ($setting_info["website_icp"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;ICP备案号&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">网站底部版权处设置</td><td class="form_right_space"><label><textarea name="data[copyright]" id="copyright" class="tarea" style="width:300px; height:100px;"><?php echo ($setting_info["copyright"]); ?></textarea></label></td><td>&nbsp;&nbsp;请使用HTML代码&nbsp;&nbsp;</td></tr>

                <tr><td class="form_left_space">全站通用的联系方式</td><td class="form_right_space"><label><textarea name="data[contact]" id="contact" class="tarea" style="width:300px; height:100px;"><?php echo ($setting_info["contact"]); ?></textarea></label></td></tr>

            </table>

            <h3>企业信息设置</h3>
            <table class="inputlist">

                <tr><td class="form_left_space">企业名称</td><td class="form_right_space"><label><input name="data[company_name]" type="text" id="company_name" value="<?php echo ($setting_info["company_name"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业所属行业</td><td class="form_right_space"><label><input name="data[company_trade]" type="text" id="company_trade" value="<?php echo ($setting_info["company_trade"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业性质</td><td class="form_right_space"><label><input name="data[company_type]" type="text" id="company_type" value="<?php echo ($setting_info["company_type"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业主营产品/服务</td><td class="form_right_space"><label><input name="data[company_service]" type="text" id="company_service" value="<?php echo ($setting_info["company_service"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业所在地区</td><td class="form_right_space"><label><input name="data[company_area]" type="text" id="company_area" value="<?php echo ($setting_info["company_area"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业成立时间</td><td class="form_right_space"><label><input name="data[company_create]" type="text" id="company_create" value="<?php echo ($setting_info["company_create"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业员工人数</td><td class="form_right_space"><label><input name="data[company_employ]" type="text" id="company_employ" value="<?php echo ($setting_info["company_employ"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业年营业额</td><td class="form_right_space"><label><input name="data[company_turnover]" type="text" id="company_turnover" value="<?php echo ($setting_info["company_turnover"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业联系人</td><td class="form_right_space"><label><input name="data[company_linkman]" type="text" id="company_linkman" value="<?php echo ($setting_info["company_linkman"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业联系电话</td><td class="form_right_space"><label><input name="data[company_telephone]" type="text" id="company_telephone" value="<?php echo ($setting_info["company_telephone"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业传真</td><td class="form_right_space"><label><input name="data[company_fax]" type="text" id="company_fax" value="<?php echo ($setting_info["company_fax"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业邮政编码</td><td class="form_right_space"><label><input name="data[company_post]" type="text" id="company_post" value="<?php echo ($setting_info["company_post"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">Email</td><td class="form_right_space"><label><input name="data[company_email]" type="text" id="company_email" value="<?php echo ($setting_info["company_email"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;管理员信箱&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业QQ</td><td class="form_right_space"><label><input name="data[company_qq1]" type="text" id="company_qq1" value="<?php echo ($setting_info["company_qq1"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;只能填一个数字QQ号码&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业QQ</td><td class="form_right_space"><label><input name="data[company_qq2]" type="text" id="company_qq2" value="<?php echo ($setting_info["company_qq2"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;只能填一个数字QQ号码&nbsp;&nbsp;</td></tr>



                <tr><td class="form_left_space">企业联系地址</td><td class="form_right_space"><label><input name="data[company_address]" type="text" id="company_address" value="<?php echo ($setting_info["company_address"]); ?>" class="txt" style="width:300px; height:18px;"></label></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>

            </table>

            <div class="opt">
                <input type="submit" name="dosubmit" value=" 提 交 " class="btn" tabindex="3" />
            </div>
        </form>
    </div>
</div>
</body>
</html>