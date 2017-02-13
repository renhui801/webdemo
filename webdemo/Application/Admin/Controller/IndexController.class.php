<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function topframe(){   //顶部
        $this->display();
    }
    public function leftframe(){  //左侧边栏
        $this->display();
    }
    public function defaultframe (){  //默认首页
      $this->assign('admin_info',admin_info()); //网站管理员信息
      $submit_url=U('Config/ask');
      $this->assign('submit_url',$submit_url);
      $this->display();
    }
    public function  setting(){  //基本设置页
        $setting_url=U('Config/setting');
        $this->assign('setting_url',$setting_url);
        if($setting_info=S('setting_info')){
        }
        else{
            $model=M('setting');//读取设置
            $data=$model->select();
            $data=$data[0];
            $key_name=array_keys($data);
            $setting_info=array();
            foreach ($key_name as $key) {
                $setting_info["$key"]=$data["$key"];
            }
            S('setting_info',$setting_info);
        }
        $this->assign('setting_info',$setting_info);
        $this->display();
    }
    public function  nav(){  //导航设置页显示
        if($level_html=S('level_html')){
        }
        else {
            $model = M('navigation');
            $data1 = $model->where("level=1")->order('sort desc,id')->select();
            $data2 = $model->where("level=2")->order('sort desc,id')->select();
            $data3 = $model->where("level=3")->order('sort desc,id')->select();
            $level_html = "";
            foreach ($data1 as $value1) {  //三级菜单显示
                $htmlClass = "parentboard";
                $menuAdd = "添加次级栏目";
                $level_html = $level_html . $this->_navInfo($value1, $htmlClass, $menuAdd);
                foreach ($data2 as $value2) {
                    if ($value2['parent_id'] == $value1['id']) {
                        $htmlClass = "board";
                        $menuAdd = "添加次级栏目";
                        $level_html = $level_html . $this->_navInfo($value2, $htmlClass, $menuAdd);
                        foreach ($data3 as $value3) {
                            if ($value3['parent_id'] == $value2['id']) {
                                $htmlClass = "childboard";
                                $menuAdd = "";
                                $level_html = $level_html . $this->_navInfo($value3, $htmlClass, $menuAdd);
                            }
                        }
                    }
                }
            }
            S('level_html',$level_html);
        }
        $this->assign('level_html',$level_html);
        $config_url=U('config/nav');
        $addPage=$config_url."?action=add&type=page";
        $addArticle=$config_url."?action=add&type=article";
        $addProduct=$config_url."?action=add&type=product";
        $addUrl=$config_url."?action=add&type=url";
        $add=array('page'=>$addPage,'article'=>$addArticle,'product'=>$addProduct,'url'=>$addUrl);
        $this->assign('add',$add);
        $this->display();
    }
    private function _navInfo($value,$htmlClass,$menuAdd){ //导航设置页信息生成
        $sort=$value['sort'];
        $meueName=$value['name'];
        $config_url=U('Config/nav');
        $id=$value['id'];
        $level=$value['level'];
        $parentId=$value['parent_id'];
        switch ($value['type']){
            case "page":
                $type="单页";
                $infoName="&nbsp&nbsp内容编辑";
                break;
            case "product":
                $type="产品";
                $infoName="&nbsp&nbsp发布新内容";
                break;
            case "article":
                $type="文章";
                $infoName="&nbsp&nbsp发布新内容";
                break;
            case "url":
                $type="链接";
                break;
        }
        return "<tr class=\"hover\">
                <td class=\"td25\">$sort</td>
                <td><div class=\"$htmlClass\"> $meueName</div></td>
                <td>     $type</td>
                <td>
                    <a href=\"$config_url?id=$id&action=connect\">$infoName</a>
                </td>
                <td><a href=\"$config_url?id=$id&level=$level&parentId=$parentId&action=add\"  class=\"act\">$menuAdd</a>
                <a href=\"$config_url?id=$id&action=edit&type={$value['type']}\" title=\"编辑本版块设置\" class=\"act\">编辑</a>
                <a onClick=\"return confirm('确定删除？');\" href=\"$config_url?id=$id&action=delete\" title=\"删除本版块及其中所有帖子\" class=\"act\">删除</a>
                </td>
            </tr>";
    }
    public function article(){  //文章设置页
        $get=I('get.');
        $model=M('navigation');
        $articleClassData=$model->where("type='article'")->order('sort desc,id')->select();
        $selectTmp="<option value='".U('Index/article')."?category_id=replace_id'  replace_selected>replace_name</option>";
        $jstmp="article_category['replace_id'] = 'replace_name';";
        $selectList="";
        $js="";
        $arrayArticle=array();
        $pass='';
        $status='';
        $passText='';
        $statusText='';
        $articleClassName=array();
        foreach ($articleClassData as $item1) {
            $articleClassName["{$item1['id']}"]=$item1['name'];
            if($item1['level']==1){
                $arrayArticle[]=array('id'=>$item1['id'],'name'=>$item1['name']);
                foreach($articleClassData as $item2){
                    if($item2['parent_id']==$item1['id']){
                        $arrayArticle[]=array('id'=>$item2['id'],'name'=>"&nbsp;&nbsp;|----{$item2['name']}");
                        foreach ($articleClassData as $item3) {
                            if($item3['parent_id']==$item2['id']){
                                $arrayArticle[]=array('id'=>$item3['id'],'name'=>"&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----{$item3['name']}");
                            }
                        }
                    }
                }
            }
        }
        foreach ($arrayArticle as $item) {
            $selectList=$selectList.str_replace(array("replace_id","replace_name"),array($item['id'],$item['name']),$selectTmp);
            $js=$js.str_replace(array("replace_id","replace_name"),array($item['id'],$item['name']),$jstmp);
            if($get['category_id']==$item['id']){
                $selectList=str_replace("replace_selected","selected='selected'",$selectList);
                $category=$item['id'];
            }
        }
        if(isset($get['category_id'])){
            $articleListData=$model->where("category_id={$get['category_id']}")->table('article')->select();
        }
        else{
            $articleListData=$model->table('article')->select();
        }

        $articleList='';
        foreach ($articleListData as $item) {
            $articleClassNameTmp=$articleClassName["{$item['category_id']}"];
            $name=$item['name'];
            $articleTime=explode(' ',$item['time'])[0];
            $articlePic=$item['ptitle'];
            if($item['pass']=='1'){
                $pass=U('Config/ArticleListEdit')."?type=pass&id={$item['id']}&pass=4";
                $passText='关闭';
            }
            elseif($item['pass']=='4'){
                $pass=U('Config/ArticleListEdit')."?type=pass&id={$item['id']}&pass=1";
                $passText='开启';
            }
            switch($item['status']){
                case '1':
                    $status=U('Config/ArticleListEdit')."?type=status&id={$item['id']}&pass=8";
                    $statusText='首页展示';
                    break;
                case '8':
                    $status=U('Config/ArticleListEdit')."?type=status&id={$item['id']}&pass=1";
                    $statusText='取消展示';
                    break;
            }
            $edit=U('Config/nav')."?action=connect&id={$item['category_id']}&articleId={$item['id']}";
            $delete=U('Config/ArticleListEdit')."?type=delete&id={$item['id']}";
            $articleList_tmp="<tr>
                    <td width=\"60\"> <label><input name=\"article_key[]\" class=\"checkbox\" type=\"checkbox\" value=\"{$item['id']}\" /></label></td>
                    <td>[$articleClassNameTmp] <a target=\"_blank\" href=\" \">$name</a></td>
                    <td width=\"120\">$articleTime</td>
                    <td width=\"60\">  <a href=\"$articlePic\" target=\"_blank\" >查看</a> </td>
                    <td width=\"60\"><a href=\"$edit\">编辑</a></td>
                    <td width=\"60\"><a onClick=\"return confirm('确定删除？');\" href=\"$delete\">删除</a></td>
                </tr>";
            $articleList=$articleList.$articleList_tmp;
        }
        //var_dump($articleListData);
        $js=str_replace('&nbsp;',' ',$js);
        $this->assign('js',$js);
        $this->assign('selectList',$selectList);
        $this->assign('articleList',$articleList);
        $this->assign('ArticleListEdit',U('Config/ArticleListEdit'));
        $this->assign('url',U('Index/article'));
        $this->assign('category',$category);
        if($get['category_id']==''){
            $this->assign('addarticle',U('Config/nav')."?id={$arrayArticle[0]['id']}&action=connect");
        }
        else{
            $this->assign('addarticle',U('Config/nav')."?id=$category&action=connect");
        }
        $this->display();
    }
    public function  product(){//产品设置页
        $get=I('get.');
        $model=M('navigation');
        $productClassData=$model->where("type='product'")->order('sort desc,id')->select();
        $selectTmp="<option value='".U('Index/product')."?category_id=replace_id'  replace_selected>replace_name</option>";
        $jstmp="product_category['replace_id'] = 'replace_name';";
        $selectList="";
        $js="";
        $arrayProduct=array();
        $pass='';
        $status='';
        $passText='';
        $statusText='';
        $productClassName=array();
        foreach ($productClassData as $item1) {
            $productClassName["{$item1['id']}"]=$item1['name'];
            if($item1['level']==1){
                $arrayProduct[]=array('id'=>$item1['id'],'name'=>$item1['name']);
                foreach($productClassData as $item2){
                    if($item2['parent_id']==$item1['id']){
                        $arrayProduct[]=array('id'=>$item2['id'],'name'=>"&nbsp;&nbsp;|----{$item2['name']}");
                        foreach ($productClassData as $item3) {
                            if($item3['parent_id']==$item2['id']){
                                $arrayProduct[]=array('id'=>$item3['id'],'name'=>"&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;|----{$item3['name']}");
                            }
                        }
                    }
                }
            }
        }
        foreach ($arrayProduct as $item) {
            $selectList=$selectList.str_replace(array("replace_id","replace_name"),array($item['id'],$item['name']),$selectTmp);
            $js=$js.str_replace(array("replace_id","replace_name"),array($item['id'],$item['name']),$jstmp);
            if($get['category_id']==$item['id']){
                $selectList=str_replace("replace_selected","selected='selected'",$selectList);
                $category=$item['id'];
            }
        }
        if(isset($get['category_id'])){
            $productListData=$model->where("category_id={$get['category_id']}")->table('product')->select();
        }
        else{
            $productListData=$model->table('product')->select();
        }

        $productList='';
        foreach ($productListData as $item) {
            $productClassNameTmp=$productClassName["{$item['category_id']}"];
            $name=$item['name'];
            $productTime=explode(' ',$item['time'])[0];
            $productPic=$item['ptitle'];
            if($item['pass']=='1'){
                $pass=U('Config/ProductListEdit')."?type=pass&id={$item['id']}&pass=4";
                $passText='关闭';
            }
            elseif($item['pass']=='4'){
                $pass=U('Config/ProductListEdit')."?type=pass&id={$item['id']}&pass=1";
                $passText='开启';
            }
            switch($item['status']){
                case '1':
                    $status=U('Config/ProductListEdit')."?type=status&id={$item['id']}&pass=8";
                    $statusText='首页展示';
                    break;
                case '8':
                    $status=U('Config/ProductListEdit')."?type=status&id={$item['id']}&pass=1";
                    $statusText='取消展示';
                    break;
            }
            $edit=U('Config/nav')."?action=connect&id={$item['category_id']}&productId={$item['id']}";
            $delete=U('Config/ProductListEdit')."?type=delete&id={$item['id']}";
            $productList_tmp="<tr>
                    <td width=\"60\"> <label><input name=\"product_key[]\" class=\"checkbox\" type=\"checkbox\" value=\"{$item['id']}\" /></label></td>
                    <td>[$productClassNameTmp] <a target=\"_blank\" href=\" \">$name</a></td>
                    <td width=\"120\">$productTime</td>
                    <td width=\"60\">  <a href=\"$productPic\" target=\"_blank\" >查看</a> </td>
                    <td width=\"60\"><a href=\"$pass\">$passText</a></td>
                    <td width=\"80\"><a href=\"$status\">$statusText</a></td>
                    <td width=\"60\"><a href=\"$edit\">编辑</a></td>
                    <td width=\"60\"><a onClick=\"return confirm('确定删除？');\" href=\"$delete\">删除</a></td>
                </tr>";
            $productList=$productList.$productList_tmp;
        }
        //var_dump($productListData);
        $js=str_replace('&nbsp;',' ',$js);
        $this->assign('js',$js);
        $this->assign('selectList',$selectList);
        $this->assign('productList',$productList);
        $this->assign('ProductListEdit',U('Config/ProductListEdit'));
        $this->assign('url',U('Index/product'));
        $this->assign('category',$category);
        if($get['category_id']==''){
            $this->assign('addproduct',U('Config/nav')."?id={$arrayProduct[0]['id']}&action=connect");
        }
        else{
            $this->assign('addproduct',U('Config/nav')."?id=$category&action=connect");
        }
        $this->display();
    }
    public function theme(){  //网站主题设置

    }
    public function block(){  //碎片列表设置

    }
    public function tplconfig(){ //网站风格设置
        $this->display();
    }
    public function first(){  //首页设置
        $this->display();
    }
    public function attachments(){ //附件设置
        $this->display();
    }
    public function mobi(){  //手机版设置
        $this->display();
    }

}