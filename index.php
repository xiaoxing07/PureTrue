<?php
/**
 * 一款比较奇怪的主题。
 * Pure译为纯的，True是真的，PureTrue可以理解为纯真的意思。
 * 说明本主题是一款代码混杂的主题🐣，因代码极其杂乱，非专业人士勿看🙏
 * 在安装之前，请阅读 license.txt ，有任何问日直接联系我。
 *
 * @package PureTrue Theme
 * @author ShouCa.ng
 * @version 1.1.2
 * @link http://shouca.ng
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
   <div class="container mt-2 mb-2 pt-5 pb-5" id="article-grid">
	<div class="row justify-content-center">
    <?php while ($this->next()): ?>
		<div class="col-xl-6 col-lg-12 text-center">
			<a href="<?php $this->permalink() ?>">
			<div class="article-card">
			    
			 <?php if (array_key_exists('thumb',unserialize($this->___fields()))): ?>

                            <div class="article-img">
                                <a class="index-post-cover" href="<?php $this->permalink() ?>">
                                    <img class="thumb" src="<?php echo $this->fields->thumb;?>">
                                </a>
                            </div>
                            <?php else : ?>
                            <?php $thumb = showThumbnail($this); if(!empty($thumb)):?>

                            <div class="article-img">
                                <a class="index-post-cover" href="<?php $this->permalink() ?>">
                                    <img class="thumb" src="<?php echo $thumb;?>">
                                </a>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
				<div class="article-meta text-left">
					<a href="<?php $this->permalink() ?>"><h2><?php $this->title() ?></h2>
					<p><?php $this->excerpt(50, '...'); ?></p></a>
				</div>
			</div>
			</a>
		</div>
    <?php endwhile; ?>
</div><!-- end #main--></div></div>
<div class="container text-center pb-3 mb-5">
<!--	<a herf="" class="btn btn-lg btn-light">Read More</a>-->
	<nav class="my-5">
    <?php
      ob_start(); 
      $this->pageNav('&laquo;','&raquo;', 1, '', array('wrapTag' => 'ul', 'wrapClass' => 'pagination pagination-rounded mb-0 justify-content-center', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'active', 'prevClass' => 'prev', 'nextClass' => 'next'));
      $content = ob_get_contents();
      ob_end_clean();
      $content = preg_replace("/<li><span>(.*?)<\/span><\/li>/sm", '', $content);
      $content = preg_replace("/<li [class=\"active\"]+>(.*?)<\/li>/sm", '<li class="page-item active">$1</li>', $content);
      $content = preg_replace("/<li [class=\"prev\"]+>(.*?)<\/li>/sm", '<li class="page-item">$1</li>', $content);
      $content = preg_replace("/<li [class=\"next\"]+>(.*?)<\/li>/sm", '<li class="page-item">$1</li>', $content);
      $content = preg_replace("/<li>(.*?)<\/li>/sm", '<li class="page-item">$1</li>', $content);
      $content = preg_replace("/<a href=\"(.*?)\">(.*?)<\/a>/sm", '<a class="page-link" href="$1">$2</a>', $content);
      echo $content;
     ?>
  </nav>
</div>
<?php $this->need('footer.php'); ?>
