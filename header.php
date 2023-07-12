<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- 使用url函数转换相关路径 -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('styles.css'); ?>">
<title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
<!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--头部导航-->
<div class="container-fluid" id="header">
	<nav class="navbar navbar-expand-md navbar-light">
		<div class="container">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="row pb-1"> 
		  <?php if ($this->options->logoUrl): ?>
		  <a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->logoUrl() ?>"></a><?php else: ?>
		  <a class="title" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
          <?php endif; ?></div>
		<div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
		    <ul class="navbar-nav">
		                    <li class="nav-item">
		                    <a class="nav-link" href="<?php $this->options->siteUrl(); ?>">首页</a>
		                   <?php $this->widget('Widget_Contents_Page_List')
               ->parse('<li class="nav-item"><a class="nav-link" href="{permalink}">{title}</a></li>'); ?>
		            </ul>
		  </div>
	  </div>
	  </nav>
<!-- hero section -->
	  <div class="container" id="hero">
	  	<div class="row justify-content-end">
	  		<div class="col-lg-6 hero-img-container">
	  			<a href="#">
	  			<div class="hero-img">
	  				<img src="<?php $this->options->themeUrl('1.jpeg')?>">
	  			</div>
	  			</a>
	  		</div>	  		

	  		<div class="col-lg-9">
	  			<div class="hero-title">
	  				<a href="#">
	  				<h1><?php $this->options->title() ?></h1>
	  				</a>
	  			</div>

	  		</div>

	  		<div class="col-lg-6">
	  			<div class="hero-meta">
	  				<p><?php $this->options->description() ?></p>
	  				<div class="author">
	  					<div class="author-img"><?php $email=$comments->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="45px" height="45px" style="border-radius: 50%;" >'; ?></div>
	  					<div class="author-meta">
	  					<span class="author-name"><?php $this->author() ?></span>
	  					<span class="author-tag">Blogger</span>
	  					</div>	
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
</div>
<!-- hero ends -->
    
