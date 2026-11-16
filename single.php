<?php
get_header();
$post_page_id = get_option('page_for_posts');
?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="main">
      <p class="pageTitle"><?php echo get_the_title($post_page_id); ?></p>
      <?php my_custom_breadcrumb(); ?>
      <article class="newsContents">
        <h1 class="newsTitle"><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>
      <ul class="pageNavi">
        <li class="pageNavi__item pageNavi__item--prev"><?php previous_post_link('%link','前の記事'); ?></li>
        <li class="pageNavi__item"><a href="<?php echo esc_url( home_url('/')); ?>news/" class="btn btn--type2">お知らせ一覧ページへ</a></li>
        <li class="pageNavi__item pageNavi__item--next"><?php next_post_link('%link','次の記事'); ?></li>
      </ul>
    </main>
<?php endwhile;
endif; ?>
<?php
get_footer();
?>