<?php
get_header();
?>

<?php if(have_posts()): while(have_posts()):the_post(); ?>
<main class="main">
  <h1 class="pageTitle"><?php the_title(); ?></h1>
  <?php my_custom_breadcrumb(); ?>
  <div class="contentsInner">
    <?php the_content(); ?>
  </div>
</main>
<?php endwhile; endif; ?>
<?php
get_footer();
?>