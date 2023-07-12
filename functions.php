<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowOther'          => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
}

/*
function themeFields($layout)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点LOGO地址'),
        _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO')
    );
    $layout->addItem($logoUrl);
}
*/

/*自定义函数-图片*/
function showThumbnail($widget)
{ 
    // 当文章无图片时的默认缩略图
    $rand = rand(1,10); // 随机 1-7 张缩略图

    $random = $widget->widget('Widget_Options')->themeUrl . '/img/' . $rand . '.jpeg'; // 随机缩略图路径
    //正则匹配 主题目录下的/images/sj/的图片（以数字按顺序命名）

$cai = '';
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
  $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png|jpeg))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png|jpeg))/i';



if ($attach && $attach->isImage) {

$ctu = $attach->url.$cai;
    } 
//调用第一个图片附件
else 

//下面是调用文章第一个图片
if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }

//如果是内联式markdown格式的图片
  else   if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }
//以上都不符合，即随机输出图片
else {
$ctu = $random;
}
return $ctu;
}
//获取Gravatar头像 QQ邮箱取用qq头像
function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array())
{
preg_match_all('/((\d)*)@qq.com/', $email, $vai);
if (empty($vai['1']['0'])) {
    $url = 'https://cravatar.cn/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
}else{
    $url = 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';
}
return  $url;
}
//自定义上下篇
/**
* 显示上一篇
*/
function thePrev($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created < ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_DESC)
->limit(1);
$content = $db->fetchRow($sql); 
if ($content) {
$content = $widget->filter($content);
$link = '<a href="' . $content['permalink'] . '" title="' . $content['title'] . '">上一篇</a>';
echo $link;
} else {
echo $default;
}
}
/**
* 显示下一篇
*/
function theNext($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created > ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_ASC)
->limit(1);
$content = $db->fetchRow($sql);
 
if ($content) {
$content = $widget->filter($content);
$link = '<a href="' . $content['permalink'] . '" title="' . $content['title'] . '">下一篇</a>';
echo $link;
} else {
echo $default;
}
} 
/**/
function getPermalinkFromCoid($coid) {//留言加@  
$db       = Typecho_Db::get();   
$options  = Typecho_Widget::widget('Widget_Options');   
$contents = Typecho_Widget::widget('Widget_Abstract_Contents');   
$row = $db->fetchRow($db->select('cid, type, author, text')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));   
if (empty($row)) return 'Comment not found!';   
    $cid = $row['cid'];   
    $select = $db->select('coid, parent')->from('table.comments')->where('cid = ? AND status = ?', $cid, 'approved')->order('coid');   
if ($options->commentsShowCommentOnly)   
    $select->where('type = ?', 'comment');   
    $comments = $db->fetchAll($select);   
if ($options->commentsOrder == 'DESC')   
    $comments = array_reverse($comments);   
foreach ($comments as $key => $val)   
    $array[$val['coid']] = $val['parent'];   
    $i = $coid;   
while ($i != 0) {   
    $break = $i;   
    $i = $array[$i];   
}   
$count = 0;   
foreach ($array as $key => $val) {   
    if ($val == 0) $count++;    
    if ($key == $break) break;    
}   
$parentContent = $contents->push($db->fetchRow($contents->select()->where('table.contents.cid = ?', $cid)));   
$permalink = rtrim($parentContent['permalink'], '/');   
$page = ($options->commentsPageBreak)? '/comment-page-' . ceil($count / $options->commentsPageSize) : ( substr($permalink, -5, 5) == '.html' ? '' : '/' );   
return array(   
    "author" => $row['author'],   
    "text" => $row['text'],   
    "href" => "{$permalink}{$page}#{$row['type']}-{$coid}"  
);   
}