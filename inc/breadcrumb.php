<?php
function my_custom_breadcrumb()
{
  if (is_front_page()) {
    return false;
  }

  $breadcrumb_home_text = 'ホーム';
  $breadcrumb_wrapper_class = 'breadcrumbs';
  $breadcrumb_list_class = 'breadcrumbs__list';
  $breadcrumb_item_class = 'breadcrumbs__item';

  $breadcrumb_item_start = '<li class="' . esc_attr($breadcrumb_item_class) . '">';
  $breadcrumb_item_start_current = '<li class="' . esc_attr($breadcrumb_item_class) . '" aria-current="page"><span>';
  $breadcrumb_item_end = '</li>';
  $breadcrumb_item_end_current = '</span></li>';


  echo '<nav class="' . esc_attr($breadcrumb_wrapper_class) . '" aria-label="パンくずリスト">';
  echo '<ol class="' . esc_attr($breadcrumb_list_class) . '">';

  //ホーム
  echo $breadcrumb_item_start;
  echo '<a href="' . esc_url(home_url('/')) . '">' . $breadcrumb_home_text . '</a>';
  echo $breadcrumb_item_end;

  //固定ページ
  if (is_page()) {
    global $post;
    if ($post->post_parent) {
      $ancestors = array_reverse(get_post_ancestors($post->ID));
      foreach ($ancestors as $ancestor) {
        echo $breadcrumb_item_start;
        echo '<a href="' . esc_url(get_permalink($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a>';
        echo $breadcrumb_item_end;
      }
    }
    echo $breadcrumb_item_start_current . esc_html(get_the_title()) . $breadcrumb_item_end_current;
  } elseif (is_home() || is_post_type_archive() || is_singular()) {
    // 現在の投稿タイプを自動取得
    $post_type = get_query_var('post_type') ? get_query_var('post_type') : get_post_type();
    if ($post_type && 'post' !== $post_type) {
      $post_type_obj = get_post_type_object($post_type);

      if ($post_type_obj) {
        // カスタム投稿の「ラベル名」と「アーカイブリンク」を自動取得
        $cpt_label = esc_html($post_type_obj->label);
        $cpt_archive_link = get_post_type_archive_link($post_type);

        if (is_post_type_archive()) {
          // カスタム投稿の一覧ページを見ている場合
          echo $breadcrumb_item_start_current;
          echo $cpt_label;
          echo $breadcrumb_item_end_current;
        } else {
          // カスタム投稿の詳細ページ（例：/works/slug-01/）を見ている場合
          echo $breadcrumb_item_start;
          echo '<a href="' . esc_url($cpt_archive_link) . '">' . $cpt_label . '</a>';
          echo $breadcrumb_item_end;
          echo $breadcrumb_item_start_current;
          echo get_the_title();
          echo $breadcrumb_item_end_current;
        }
      }
    } elseif ('post' === $post_type) {
      //投稿ページ
      $post_page_id    = get_option( 'page_for_posts' );
      $post_page_title = get_the_title( $post_page_id );
      $post_page_url   = get_permalink( $post_page_id );
      if(is_home()) {
        echo $breadcrumb_item_start_current;
        echo esc_html($post_page_title);
        echo $breadcrumb_item_end_current;
      } elseif (is_single()) {
        echo $breadcrumb_item_start;
        echo '<a href="' . esc_url($post_page_url) . '">' . $post_page_title . '</a>';
        echo $breadcrumb_item_end;
        echo $breadcrumb_item_start_current;
        echo get_the_title();
        echo $breadcrumb_item_end_current;
      }
    } else {
      echo $breadcrumb_item_start_current . get_the_title() . $breadcrumb_item_end_current;
    }
  } elseif (is_404()) {
    echo $breadcrumb_item_start_current;
    echo 'ページが見つかりません';
    echo $breadcrumb_item_end_current;
  }

  echo '</ol>';
  echo '</nav>';
}
