<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    <!--Leancloud 操作库:-->
    <script src="//cdn1.lncld.net/static/js/3.0.4/av-min.js"></script>
    <!--Valine 的核心代码库:-->
    <script src='//unpkg.com/valine/dist/Valine.min.js'></script>
<div class="comment"></div>
    <script>
    new Valine({
            el:'.comment', // Valine 的初始化挂载器
            app_id:'9PdtPmtQq5ypKGQrIEyL7kM9-gzGzoHsz', // 这里填写上面得到的APP ID
            app_key:'GwGwp25vwQeisD8Ry70RgboP', // 这里填写上面得到的APP KEY
            placeholder:'大佬留个言吧~ ', // 留言框占位文字
            notify:true, // 评论邮件提醒
            verify:true, // 验证码
            region:'cn', // 存储节点(cn/us)
            path:window.location.pathname, // 当前文章页路径，区分不同文章页，以保证正确读取该文章页下的评论列表
            avatar:'retro', // Gravatar 头像展示方式
            pageSize:10 // 评论列表分页，每页条数
    });
    </script>