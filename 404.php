<?php
get_header();
?>

<main class="main">
  <h1 class="pageTitle">ページが見つかりません</h1>
  <?php my_custom_breadcrumb(); ?>
  <div class="pageContents">
    <h2 class="secTitle secTitle--404">お探しのページが見つかりませんでした</h2>
    <div class="sorryImg"><img src="<?php echo get_template_directory_uri(); ?>/img/sorry.svg" alt=""></div>
    <p>お探しのページは削除されたか、URLが変更された可能性があります。</p>
    <p>入力されたURLが正しいかご確認いただくか、以下のボタンよりトップページへお戻りください。</p>
    <div class="btnArea">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--type2">トップページへ</a>
    </div>
  </div>
</main>
<?php
get_footer();
?>