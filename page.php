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

<!-- end #main-->
<?php $this->need('footer.php'); ?>
