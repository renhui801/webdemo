<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2016/11/29
 * Time: 17:21
 */
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends Controller{
    public function ask(){  //开发者留言
        //留言分割字符串
        $str=implode(',',$_POST);
        //上传附件存盘
        $dirname="public/update/ask";
        if(!file_exists($dirname)) {

            mkdir($dirname, 0777, true);
        }
        file_put_contents("public/update/ask/ask.txt",$str);
        if(isset($_FILES['screen']['tmp_name'])){
            //echo 'ok';
            move_uploaded_file($_FILES['screen']['tmp_name'],"public/update/ask/".$_FILES['screen']['name']);
        }
        //PHPMailer控件发送邮件
        Vendor('PHPMailer.PHPMailerAutoload');
        $mail=new \PHPMailer;
        $mail->isSMTP();
        $mail->Host='smtp.163.com';
        $mail->SMTPAuth=true;
        $mail->Username='renhui801@163.com';
        $mail->Password='REN3850069';
        $mail->Port=25;

        $mail->setFrom('renhui801@163.com');
        $mail->addAddress('411409947@qq.com');

        $mail->addAttachment("public/update/ask/".$_FILES['screen']['name']);

        $mail->Subject='test_mail';
        $mail->Body="$str";

        if(!$mail->send()){
            echo $mail->ErrorInfo;
        }
        else{
        }
        //成功返回
        echo '1';
    }

    public function setting(){ //setting页配置存入数据库
        $model=D('Setting');
        $data=I('post.data');
        $data['id']=1;
        $del_file=I('post.del_file');
        $img_file=array('logofile','watermark');
        foreach($img_file as $del){
            $_tmp=$del_file["$del"];
            if($_tmp!=''){
                $model->where('id=1')->setField("$del",'');

            }
        }
        $dirname="public/update/img";//创建图标上传文件目录
        if(!file_exists($dirname)) {

            mkdir($dirname, 0777, true);
        }
        //上传图标处理
        foreach ($img_file as $item) {
            if(isset($_FILES["$item"]['tmp_name'])&&$_FILES["$item"]['error']==0){ //图标路径
                $file_suffix=strrchr($_FILES["$item"]['name'],'.');
                move_uploaded_file($_FILES["$item"]['tmp_name'],"public/update/img/"."$item".$file_suffix);
                $data["$item"]=__ROOT__."/public/update/img/"."$item".$file_suffix;
            }
            else{
                $_tmp=$model->field("$item")->select(); //查询现有图标路径
                if($_tmp[0]["$item"]!=''){ //显示现有图标
                    $data["$item"]=$_tmp[0]["$item"];
                }
            }
        }
       $model->create($data);
        if($model->add($data='',$options=array(),$replace=true)){
            S('setting_info',null);
            header("Location:{$_SERVER['HTTP_REFERER']}");
        }

    }

    public function editpage(){  //单页编辑操作
        $model=D('page');
        $editpage=I('post.data');
        $del_file=I('post.del_file');
        if($del_file['ptitle']!=''){
            $model->where("id={$editpage['id']}")->setField("ptitle",'');
        }
        $dirname="public/update/img/page";//创建图标上传文件目录
        if(!file_exists($dirname)) {
            mkdir($dirname, 0777, true);
        }
        if(isset($_FILES["ptitle"]['tmp_name'])&&$_FILES["ptitle"]['error']==0){ //图标路径
            $file_suffix=strrchr($_FILES["ptitle"]['name'],'.');
            move_uploaded_file($_FILES["ptitle"]['tmp_name'],"public/update/img/page/"."ptitle".$editpage['id'].$file_suffix);
            $editpage["ptitle"]=__ROOT__."/public/update/img/page/"."ptitle".$editpage['id'].$file_suffix;
        }
        else{
            $_tmp=$model->field("ptitle")->select(); //查询现有图标路径
            if($_tmp[0]["ptitle"]!=''){ //显示现有图标
                $editpage["ptitle"]=$_tmp[0]["ptitle"];
            }
        }
        //var_dump($editpage);
        $model->create($editpage);
        if($model->add($data='',$options=array(),$replace=true)){
           header("Location:".U('Index/nav'));
        }
    }

    public function editProduct(){//产品添加/编辑
        $model=D('product');
        $data=I('post.data');
        $del_file=I('post.del_file');
        $replaceTmp=__ROOT__.'/';
        if($del_file['ptitle']!=''){
            $model->where("id={$data['id']}")->setField("ptitle",'');
            $replaceTmp=str_replace($replaceTmp,'',$del_file['ptitle']);
            unlink($replaceTmp);
        }
        $dirname="Public/update/img/product/";
        if(!file_exists($dirname)) {
            mkdir($dirname, 0777, true);
        }
        if(isset($_FILES["ptitle"]['tmp_name'])&&$_FILES["ptitle"]['error']==0){ //图标路径
            $file_suffix=strrchr($_FILES["ptitle"]['name'],'.');
            move_uploaded_file($_FILES["ptitle"]['tmp_name'],$dirname.date('YmdHis').$file_suffix);
            $data["ptitle"]=__ROOT__.'/'.$dirname.date('YmdHis').$file_suffix;
        }
        else{
            if($data['id']!=''){
                $_tmp=$model->where("id={$data['id']}")->field("ptitle")->select(); //查询现有图标路径
                if($_tmp[0]["ptitle"]!=''){ //显示现有图标
                    $data["ptitle"]=$_tmp[0]["ptitle"];
                }
            }

        }
        for($i=1;$i<=8;$i++){ //产品图片
            $productPic='product_pic'.$i;
            $product_pic_del='product_pic_del'.$i;
            if(isset($data["$product_pic_del"])){
                $data["$productPic"]='';
                $replaceTmp=str_replace($replaceTmp,'',$data["$product_pic_del"]);
                unlink($replaceTmp) ;
                $replaceTmp=__ROOT__.'/';
            }
            if(isset($_FILES["$productPic"]['tmp_name'])&&$_FILES["$productPic"]['error']==0){ //图标路径
                $file_suffix=strrchr($_FILES["$productPic"]['name'],'.');
                move_uploaded_file($_FILES["$productPic"]['tmp_name'],$dirname.date('YmdHis').$i.$file_suffix);
                $data["$productPic"]=__ROOT__.'/'.$dirname.date('YmdHis').$i.$file_suffix;
            }
        }
        if($data['id']!=''){
                $model->setField($data);
                header("Location:".U('Index/product'));
        }
        else{
            $model->create($data);
            if($model->add($data='',$options=array(),$replace=true)){
                header("Location:".U('Index/nav'));
            }
        }
    }

    public function editArticle(){//产品添加/编辑
        $model=D('article');
        $data=I('post.data');
        $del_file=I('post.del_file');
        $replaceTmp=__ROOT__.'/';
        if($del_file['ptitle']!=''){
            $model->where("id={$data['id']}")->setField("ptitle",'');
            $replaceTmp=str_replace($replaceTmp,'',$del_file['ptitle']);
            unlink($replaceTmp);
        }
        $dirname="Public/update/img/article/";
        if(!file_exists($dirname)) {
            mkdir($dirname, 0777, true);
        }
        if(isset($_FILES["ptitle"]['tmp_name'])&&$_FILES["ptitle"]['error']==0){ //图标路径
            $file_suffix=strrchr($_FILES["ptitle"]['name'],'.');
            move_uploaded_file($_FILES["ptitle"]['tmp_name'],$dirname.date('YmdHis').$file_suffix);
            $data["ptitle"]=__ROOT__.'/'.$dirname.date('YmdHis').$file_suffix;
        }
        else{
            if($data['id']!=''){
                $_tmp=$model->where("id={$data['id']}")->field("ptitle")->select(); //查询现有图标路径
                if($_tmp[0]["ptitle"]!=''){ //显示现有图标
                    $data["ptitle"]=$_tmp[0]["ptitle"];
                }
            }

        }
        if($data['id']!=''){
            $model->setField($data);
            header("Location:".U('Index/article'));
        }
        else{
            $model->create($data);
            if($model->add($data='',$options=array(),$replace=true)){
                header("Location:".U('Index/nav'));
            }
        }
    }

    public function ProductListEdit(){
        $post=I('post.');
        //var_dump($post);
        $get=I('get.');
        $model=M('product');
        if(isset($post)){
            foreach ($post['product_key'] as $item) {
                $del['id']=$item;
            }
            $del['_logic']='OR';
            switch ($post['batch_action']){
                case 'del':
                    $model->where($del)->delete();
                    break;
                case 'move':
                    $move['category_id']=$post['new_category_id'];
                    $model->where($del)->setField($move);
                    break;
            }
        }
        if(isset($get)){
            switch($get['type']){
                case 'pass':
                    $model->where("id={$get['id']}")->setField('pass',$get['pass']);
                    break;
                case 'status':
                    $model->where("id={$get['id']}")->setField('status',$get['pass']);
                    break;
                case 'delete':
                    $model->where("id={$get['id']}")->delete();
                    break;
            }
        }
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }

    public function ArticleListEdit(){
        $post=I('post.');
        //var_dump($post);
        $get=I('get.');
        $model=M('Article');
        if(isset($post)){
            foreach ($post['article_key'] as $item) {
                $del['id']=$item;
            }
            $del['_logic']='OR';
            switch ($post['batch_action']){
                case 'del':
                    $model->where($del)->delete();
                    break;
                case 'move':
                    $move['category_id']=$post['new_category_id'];
                    $model->where($del)->setField($move);
                    break;
            }
        }
        if(isset($get)){
            switch($get['type']){
                case 'delete':
                    $model->where("id={$get['id']}")->delete();
                    break;
            }
        }
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }

    public function nav(){//nav页各配置项跳转
        $model=M('navigation');
        $get=I('get.');
        $urlCache=U('Config/nav').'?action=add&type=';
        $urlAdd=array('page'=>$urlCache.'page','product'=>$urlCache.'product','url'=>$urlCache.'url','article'=>$urlCache.'article');
        switch ($get['action']){
            case 'delete':
                $this->delete($get['id']);
                break;
            case 'add':
                if(!isset($get['id'])){
                    $data['level']=1;
                    $data['parent_id']=0;
                    $show='add'.$get['type'];
                }
                else{
                    $data['level']=$get['level']+1;
                    $data['parent_id']=$get['id'];
                    if(!isset($get['type'])){
                        $show='addpage';
                    }
                    else{
                        $show='add'.$get['type'];
                    }
                }
                $this->assign('add',$urlAdd);
                $this->assign('data',$data);
                $this->assign('get',$get);
                $this->assign('url',U('Config/add'));
                $this->display($show);
                break;
            case 'edit':
                $get=I('get.');
                $show='add'.$get['type'];
                $data=$model->where("id={$get['id']}")->find();
                $this->assign('hidden','hidden');
                $this->assign('data',$data);
                $this->assign('url',U('Config/add'));
                $this->display($show);
                break;
            case 'connect':
                $tmp=$model->where("id={$get['id']}")->field('type')->find();
                switch ($tmp['type']) {
                    case 'page':
                        $show = 'editpage';
                        $data=$model->where("id={$get['id']}")->table('page')->find();
                        $this->assign('url',U('Config/editpage'));
                        $this->assign('back',U('Index/nav'));
                        $this->assign('editpage',$data);
                        $this->assign('id',$get['id']);
                        $this->display($show);
                        break;
                    case 'product':
                        $get=I('get.');
                        $show ='editproduct';
                        $productData=$model->where("type='product'")->order('sort desc,id')->select();
                        //var_dump($productData);
                        $productClass='';
                        $selectTmp="<option value='".U('Config/listProduct')."?id=replace_id'  replace_selected>replace_name</option>";
                        $selectList="";
                        $arrayProduct=array();
                        foreach ($productData as $item1) {
                            if($item1['level']==1){
                                $arrayProduct[]=array('id'=>$item1['id'],'name'=>$item1['name']);

                                foreach($productData as $item2){
                                    if($item2['parent_id']==$item1['id']){
                                        $arrayProduct[]=array('id'=>$item2['id'],'name'=>"&nbsp;&nbsp;|----{$item2['name']}");
                                        foreach ($productData as $item3) {
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
                            if($get['id']==$item['id']){
                                $selectList=str_replace("replace_selected","selected='selected'",$selectList);
                            }
                        }
                        if(isset($get['productId'])){
                            $data=$model->where("id={$get['productId']}")->table('product')->find();
                            $product_pic_list='';
                            $product_pic_listTmp="<span style=\"float:left; margin:2px; text-align:center; margin-top:4px\"><a href=\"replace_pic\" target=\"_blank\"><img src=\"replace_pic\" border=\"0\" width=\"80\" height=\"80\" /></a> <br /><input style=\"margin-top:3px\" name=\"data[product_pic_delreplace_no]\" type=\"checkbox\" id=\"data[product_pic_delreplace_no]\" value=\"replace_pic\" /></span>";
                            for($i=1;$i<=8;$i++){
                                $product_pic='product_pic'.$i;
                                if($data["$product_pic"]!=''){
                                    $product_pic_list=$product_pic_list.str_replace(array('replace_pic','replace_no'),array($data["$product_pic"],$i),$product_pic_listTmp);
                                }
                            }
                            $this->assign('id',$data['id']);
                        }
                        $this->assign('data',$data);
                        $this->assign('product_pic_list',$product_pic_list);
                        $this->assign('selectList',$selectList);
                        $this->assign('url',U('Config/editProduct'));
                        $this->assign('urlProduct',U('Index/Product'));
                        $this->assign('urlNav',U('Index/nav'));
                        $this->assign('category_id',$get['id']);
                        $this->display($show);
                        break;
                    case 'article':
                        $get=I('get.');
                        $show ='editarticle';
                        $articleData=$model->where("type='article'")->order('sort desc,id')->select();
                        //var_dump($articleData);
                        $articleClass='';
                        $selectTmp="<option value='".U('Config/listArticle')."?id=replace_id'  replace_selected>replace_name</option>";
                        $selectList="";
                        $arrayArticle=array();
                        foreach ($articleData as $item1) {
                            if($item1['level']==1){
                                $arrayArticle[]=array('id'=>$item1['id'],'name'=>$item1['name']);

                                foreach($articleData as $item2){
                                    if($item2['parent_id']==$item1['id']){
                                        $arrayArticle[]=array('id'=>$item2['id'],'name'=>"&nbsp;&nbsp;|----{$item2['name']}");
                                        foreach ($articleData as $item3) {
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
                            if($get['id']==$item['id']){
                                $selectList=str_replace("replace_selected","selected='selected'",$selectList);
                            }
                        }
                        if(isset($get['articleId'])){
                            $data=$model->where("id={$get['articleId']}")->table('article')->find();
                            $this->assign('id',$data['id']);
                        }
                        $this->assign('data',$data);
                        $this->assign('selectList',$selectList);
                        $this->assign('url',U('Config/editArticle'));
                        $this->assign('urlArticle',U('Index/Aroduct'));
                        $this->assign('urlNav',U('Index/nav'));
                        $this->assign('category_id',$get['id']);
                        $this->display($show);
                        break;
                }
        }
    }

    public function add(){
            $data=I('post.');
            $model=M('navigation');
            $model->create($data);
            $model->add($data='',$options=array(),$replace=true);
            $jumpUrl=U('Index/nav');
            header("Location:$jumpUrl");
    }
    private function delete($id){ //删除导航
        $model=M('navigation');
        $model->delete("$id");
        $childLevel2=$model->where("parent_id=$id")->field('id')->select();
        if(sizeof($childLevel2)){
            //var_dump($childLevel2);
            foreach ($childLevel2 as $item) {
                $model->delete("{$item['id']}");
                $childLevel3=$model->where("parent_id={$item['id']}")->field('id')->select();
                if(sizeof($childLevel3)){
                    foreach($childLevel3 as $item){
                        $model->delete("{$item['id']}");
                    }
                }
            }
        }
        header("Location:{$_SERVER['HTTP_REFERER']}");
        exit();
    }
}
?>