<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!-- Footer section  -->

<footer class="container-fluid mt-1 p-4">
	<div class="container ">
		<div class="row pb-1"> 
		<!-- Footer logo -->
		<div class="col-lg-3 col-md-12"><?php if ($this->options->logoUrl): ?>
		  <a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->logoUrl() ?>"></a><?php else: ?>
		  <a class="title" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
          <?php endif; ?></div>

		<!-- footer links -->
		<div class="col-lg-6 col-md-12">
			<ul class="nav justify-content-center">
			  <li class="nav-item">
			    <a class="nav-link active" href="#">Travel Tips</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#">Get Inspired</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#">Cheap Airfare</a>
			  </li>			  
			  <li class="nav-item">
			    <a class="nav-link" href="#">About</a>
			  </li>
			</ul>
		</div>

		<!-- footer social links -->
		<div class="col-lg-3 col-md-12">
			<ul class="nav justify-content-end">
			  <li class="nav-item">
			    <a class="nav-link active btn btn-light" href="#"><i class="fab fa-facebook-f"></i></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active btn btn-light" href="#"><i class="fab fa-google"></i></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active btn btn-light" href="#"><i class="fab fa-twitter"></i></a>
			  </li>
			</ul>

		</div>

		<hr>
		</div>
		<hr>

		<!-- copyright text -->
		<div class="row pt-2">
			<div class="col-lg-12 text-center">
				<span>&copy <a target="_blank" href="<?php $this->options->siteUrl(); ?>" title=""><?php $this->options->title() ?></a> & <a target="_blank" href="https://shouca.ng" title="">网络收藏家</a> All Rights Received.</span>
			</div>
		</div>
	</div>
</footer><!-- end #footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript">
//点击加载更多
jQuery(document).ready(function($) {
    //点击下一页的链接(即那个a标签)
    $('.next').click(function() {
        $this = $(this);
        $this.addClass('loading').text('正在努力加载'); //给a标签加载一个loading的class属性，用来添加加载效果
        var href = $this.attr('href'); //获取下一页的链接地址
        if (href != undefined) { //如果地址存在
            $.ajax({ //发起ajax请求
                url: href,
                //请求的地址就是下一页的链接
                type: 'get',
                //请求类型是get
                error: function(request) {
                    //如果发生错误怎么处理
                },
                success: function(data) { //请求成功
                    $this.removeClass('loading').text('点击查看更多'); //移除loading属性
                    var $res = $(data).find('.post'); //从数据中挑出文章数据，请根据实际情况更改
                    $('#content').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。
                    var newhref = $(data).find('.next').attr('href'); //找出新的下一页链接
                    if (newhref != undefined) {
                        $('.next').attr('href', newhref);
                    } else {
                        $('.next').remove(); //如果没有下一页了，隐藏
                    }
                }
            });
        }
        return false;
    });
});
</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php $this->footer(); ?>
  </body>
</html>
