  <footer class="footer">
    <div class="footerContents">
      <div class="footerBlock01">
        <div class="footerTitle"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></div>
        <ul class="footerSNS">
          <li class="footerSNSItem">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>/img/Icon_facebook.svg" alt="Facebook" />
            </a>
          </li>
          <li class="footerSNSItem">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>/img/Icon_instagram.svg" alt="Instagram" />
            </a>
          </li>
          <li class="footerSNSItem">
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/Icon_youtube.svg" alt="Youtube" /></a>
          </li>
        </ul>
      </div>
      <ul class="footerNavi">
        <li class="footerNaviItem"><a href="<?php echo esc_url(get_post_type_archive_link('cats')); ?>">カフェの猫たち</a></li>
        <li class="footerNaviItem"><a href="<?php echo esc_url( home_url('/menu/')); ?>">料金・メニュー</a></li>
        <li class="footerNaviItem"><a href="<?php echo esc_url( home_url('/news/')); ?>">お知らせ</a></li>
        <li class="footerNaviItem"><a href="<?php echo esc_url( home_url('/info/')); ?>">お店情報</a></li>
        <li class="footerNaviItem"><a href="<?php echo esc_url( home_url('/contact/')); ?>">ご予約・お問い合わせ</a></li>
      </ul>
    </div>
    <div class="footerCopy">
      &copy; 2026 <?php bloginfo('name'); ?>. All rights reserved.
    </div>
  </footer>
  <a href="#" class="pageTop"><img src="<?php echo get_template_directory_uri(); ?>/img/pagetop.svg" alt="" /></a>
  <?php wp_footer(); ?>
</body>

</html>