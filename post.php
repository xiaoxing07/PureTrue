<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<!-- Content -->
<div class="container mt-5" id="content">
	<div class="row justify-content-center">
		<!-- Share buttons -->
		<div class="col-lg-1 text-left mb-3 fixed" id="social-share">
			<a class="btn  btn-light m-2" href="#"><i class="fab fa-facebook-f"></i></a>
			<a class="btn  btn-light m-2" href="#"><i class="fab fa-google"></i></a>
			<a class="btn  btn-light m-2" href="#"><i class="fab fa-twitter"></i></a>
		</div>

		<!-- the content -->
		<div class="col-xl-7 col-lg-10 col-md-12">
<?php $this->content(); ?>
</div>

		<div class="col-lg-10 mt-3"><?php $this->need('comments.php'); ?>
			<hr>
		</div>
	</div>
</div>
<!-- Related Article Grid -->

<div class="container mt-3 mb-5" id="article-grid">
	<div class="row">

		<div class="col-xl-6 col-lg-12 text-center">
			<a>
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
					<h2><?php $this->thePrev('%s', '没有了'); ?></h2>
					<p>Herself of that similar live good up which is are to for French endeavours, screen.</p>
				</div>
			</div>
			</a>
		</div>
		<div class="col-xl-6 col-lg-12 text-center">
			<a>
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
					<h2><?php $this->theNext('%s', '没有了'); ?></h2>
					<p></p>
				</div>
			</div>
			</a>
		</div>
	</div>
</div>
		<!-- end #main-->
<?php $this->need('footer.php'); ?>
