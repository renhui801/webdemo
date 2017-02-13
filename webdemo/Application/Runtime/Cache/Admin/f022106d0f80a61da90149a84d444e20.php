<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xSite Administrator's Control Panel</title>
    <link rel="stylesheet" href="/webdemo/Public/admin/images/admincp.css" type="text/css" media="all" />
    <script type="text/javascript" src="/webdemo/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/webdemo/Public/js/jquery.form.js"></script>
    <script type="text/javascript" src="/webdemo/Public/js/jquery-jtemplates.js"></script>
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
    <h3>xSite企业自助建站软件</h3>
    <ul class="memlist fixwidth">
        <li><em>版本信息:</em>本站版本：1.x<span id="s_version"></span><span id="s_update"></span></li>
        <li><em>Web平台架构:</em> Windows / WIN-PC +  Apache/2.4.18 (Win32) PHP/5.6.16  + PHP5.6.16 + MySQL5.5.47</li>
        <li><em>PHP运行方式:</em>APACHE2HANDLER</li>
        <li><em>Zend引擎:</em>NO</li>
        <li><em>MAGIC_QUOTES_GPC:</em>NO</li>
        <li><em>CURL:</em>支持</li>
        <li><em>ZIP:</em>支持</li>
        <li><em>file_get_contents:</em>支持</li>
        <li><em>被禁用的函数:</em>无</li>
        <li><em>PHP最大执行时间:</em>0秒</li>
    </ul>


    <div id="xsite_news">  </div>


    <h3>广州市某某科技有很公司网站管理员信息：</h3>
    <ul class="memlist fixwidth">
        <li> <em>网站系统架构:</em> <em class="memcont"><?php echo ($admin_info["web_name"]); ?> </em></li>
        <li> <em>网站管理员名字:</em><em class="memcont"><?php echo ($admin_info["admin_name"]); ?></em></li>
        <li> <em>网站技术团队:</em> <em class="memcont"><?php echo ($admin_info["admin_team"]); ?></em></li>
        <li> <em>网站管理员电话:</em><em class="memcont"><?php echo ($admin_info["admin_tel"]); ?></em></li>
        <li> <em>网站管理员QQ:</em><em class="memcont"><?php echo ($admin_info["admin_qq"]); ?></em></li>
        <li> <em>网站管理员邮箱:</em><em class="memcont"><?php echo ($admin_info["admin_mail"]); ?></em></li>
        <li> <em>网站管理员联系地址:</em><em class="memcont"><?php echo ($admin_info["admin_address"]); ?></em></li>
    </ul>

    <h3>给xSite开发组留言：</h3>
    <ul class="memlist fixwidth">

        <form action="<?php echo ($submit_url); ?>" method="post" enctype="multipart/form-data" name="ask" id="ask" target="_blank">
            <table width="100%" border="0" cellspacing="1" cellpadding="3">
                <tr>
                    <td width="80">你的邮件：</td>
                    <td><input name="email" type="text" id="email" value="help@php.net.cn" class="txt" style="width:300px; height:18px;"></td>
                </tr>
                <tr>
                    <td align="left" valign="middle">留言内容：</td>
                    <td><textarea name="content" id="content" cols="45" rows="5" class="txt" style="width:400px; height:100px;">如果你在使用xSite建站软件中遇到了问题，比如：网站有错误，网站应该加一些功能等，欢迎通过此处留言我们。我们将以通过你留下的邮件地进行回复。</textarea></td>
                </tr>
                <tr>
                    <td width="80">屏幕截图：</td>
                    <td><input type="file" name="screen" id="screen" value="screen" class="uploadbtn marginbot" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><span id="ask_button"><input type="submit" name="button" id="button" value="提交" onclick="save_ask();return false;" class="btn"></span></td>
                </tr>
            </table>
        </form>
        <!--<li id='ask_response'></li> -->

    </ul>

</div>
<!-- <script language="javascript" type="text/javascript" src="http://data.php.net.cn/xsite/news.php?102648"></script> -->

<script language="javascript" type="text/javascript">
    function save_ask() {

        $(document).ready(function() {
            var options = {
                //target:        '#ask_response',   // target element(s) to be updated with server response
                beforeSubmit:  showRequest,  // pre-submit callback
                success:       showResponse,  // post-submit callback

                // other available options:
                //url:       url         // override for form's 'action' attribute
                //type:      type        // 'get' or 'post', override for form's 'method' attribute
                //dataType:  'json',        // 'xml', 'script', or 'json' (expected server response type)
                //clearForm: true        // clear all form fields after successful submit
                resetForm: true        // reset the form after successful submit

                // $.ajax options can be used here too, for example:
                //timeout:   3000
            };

            // bind to the form's submit event
            $("#ask").ajaxSubmit(options);

        });
    }



    function showRequest(formData, jqForm, options) {
        var queryString = $.param(formData);

        //网站名字以及描述
        var val = $("#content").val();
        if(!(val.length >= 10)) {
            alert('请输入留言内容！');
            $("#content").focus();
            return false;
        }

        //网站管理员邮箱
        var reg=/^[\w\-_\.]+@[\w\-_\.]+\.[\w]+$/;
        if(!reg.test($("#email").val())){
            alert('你输入的电子邮件格式不正确');
            $("#email").focus();
            return false;
        }


        $("#ask_button").html(' <em> 正在提交数据， 请稍后...</em> ');
        return true;

    }

    function showResponse(responseText, statusText)  {
        responseText = parseInt(responseText);

        //如果执行了正确安装
        if (responseText == 1) {
            $("#ask").html('<li> <em>友情提示:</em> <em class="memcont"> 已经收到你的留言。 </em></li> ');
        } else {
            $("#ask").html('<li> <em>友情提示:</em> <em style="width:400px"> <font color="#FF0000"><strong>未能正确提交你的留言内容，可能是你的网站服务器屏弊了该功能！<br>你也可以直接发送邮件至：help@php.net.cn</strong></font> </em></li> ');
        }

    }






</script>



</body>
</html>