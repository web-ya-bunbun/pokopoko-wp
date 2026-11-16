<?php
get_header();
$post_page_id = get_option('page_for_posts');
?>

<div class="main">
  <h1 class="pageTitle"><?php echo get_the_title($post_page_id); ?></h1>
  <?php my_custom_breadcrumb(); ?>
  <section class="newsContents">
    <?php if (have_posts()): ?>
    <ul class="newsList">
      <?php while (have_posts()): the_post(); ?>
      <li class="newsList__item">
        <a href="<?php the_permalink(); ?>" class="newsList__link">
          <time datetime="<?php the_time('Y-m-d'); ?>" class="newsList__date"><?php the_time('Y年n月j日'); ?></time>
          <h2 class="newsList__title"><?php the_title(); ?></h2>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
    <?php my_custom_pagination(); ?>
    <?php endif; ?>
  </section>
</div>
<?php
get_footer();
?>