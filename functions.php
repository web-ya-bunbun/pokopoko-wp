<?php
// Googleフォントの読み込み速度を上げるための事前接続（preconnect）を追加
function my_theme_minify_gfonts_preconnect()
{
  echo '<link rel="preconnect" href="https://googleapis.com">' . "\n";
  echo '<link rel="preconnect" href="https://gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'my_theme_minify_gfonts_preconnect', 1); // wp_headの最優先（1）で実行

function my_vite_theme_scripts()
{
  //Google fonts
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;600&display=swap', array(), null);
  $is_dev = is_vite_dev_server_running();

  // ==========================================
  // 【最優先JS】publicフォルダ内 の読み込み設定
  // ==========================================
  if ($is_dev) {
    // 開発環境：Vite開発サーバーのルートから直接読み込む
    wp_enqueue_script('js-check-js', 'http://localhost:5173/js/js-check.js', array(), null, false);
  } else {
    // 本番環境：dist/ の直下にコピーされたファイルを読み込む
    wp_enqueue_script('js-check-js', get_template_directory_uri() . '/dist/js/js-check.js', array(), '1.0.0', false);
  }
  // ==========================================

  // 全ページ共通のスタイル・JSを読み込む
  if ($is_dev) {
    //開発環境：localhost:5173 からリアルタイムのJSとCSSを読み込む
    wp_enqueue_style('my-theme-style', 'http://localhost:5173/src/main.scss', array(), null);
    wp_enqueue_script('vite-client', 'http://localhost:5173@vite/client', array(), null, true);
    wp_enqueue_script('my-theme-main', 'http://localhost:5173/src/main.js', array(), null, true);
  } else {
    //本番環境: npm run build でdist フォルダに書き出されたファイルを読み込む
    wp_enqueue_style('my-theme-style', get_template_directory_uri() . '/dist/assets/main.css', array(), '1.0.0');
    wp_enqueue_script_module('my-theme-main-module', get_template_directory_uri() . '/dist/assets/main-js.js', array(), '1.0.0');
    wp_enqueue_style('my-theme-main-module-css', get_template_directory_uri() . '/dist/assets/main-js.css', array('my-theme-style'), '1.0.0');
  }
  // トップページ（front-page.php）のときだけ読み込む
  if (is_front_page()) {
    if ($is_dev) {
      wp_enqueue_style('my-theme-front', 'http://localhost:5173/src/front-page.scss', array('my-theme-style'), null);
    } else {
      wp_enqueue_style('my-theme-front', get_template_directory_uri() . '/dist/assets/front-page.css', array('my-theme-style'), '1.0.0');
    }
  }
  // カフェの猫たちページ用
  if (is_post_type_archive('cats') || is_singular('cats')) {
    if ($is_dev) {
      wp_enqueue_style('my-theme-cats', 'http://localhost:5173/src/page-cats.scss', array('my-theme-style'), null);
    } else {
      wp_enqueue_style('my-theme-cats', get_template_directory_uri() . '/dist/assets/page-cats.css', array('my-theme-style'), '1.0.0');
    }
  }
  // 料金・メニューページ用
  if (is_page('menu')) {
    if ($is_dev) {
      wp_enqueue_style('my-theme-menu', 'http://localhost:5173/src/page-menu.scss', array('my-theme-style'), null);
    } else {
      wp_enqueue_style('my-theme-menu', get_template_directory_uri() . '/dist/assets/page-menu.css', array('my-theme-style'), '1.0.0');
    }
  }
  // お知らせページ用
  if (is_home() || is_post_type_archive('post') || is_singular('post')) {
    if ($is_dev) {
      wp_enqueue_style('my-theme-news', 'http://localhost:5173/src/page-news.scss', array('my-theme-style'), null);
    } else {
      wp_enqueue_style('my-theme-news', get_template_directory_uri() . '/dist/assets/page-news.css', array('my-theme-style'), '1.0.0');
    }
  }
  // お店情報ページ用
  if (is_page('info')) {
    if ($is_dev) {
      wp_enqueue_style('my-theme-info', 'http://localhost:5173/src/page-info.scss', array('my-theme-style'), null);
    } else {
      wp_enqueue_style('my-theme-info', get_template_directory_uri() . '/dist/assets/page-info.css', array('my-theme-style'), '1.0.0');
    }
  }
  // お問い合わせページ用
  if (is_page('contact')) {
    if ($is_dev) {
      wp_enqueue_style('my-theme-contact', 'http://localhost:5173/src/page-contact.scss', array('my-theme-style'), null);
    } else {
      wp_enqueue_style('my-theme-contact', get_template_directory_uri() . '/dist/assets/page-contact.css', array('my-theme-style'), '1.0.0');
    }
  }
  //404ページ用
    // 5. お問い合わせページ用
  if (is_404()) {
    if ($is_dev) {
      wp_enqueue_style('my-theme-404', 'http://localhost:5173/src/page-404.scss', array('my-theme-style'), null);
    } else {
      wp_enqueue_style('my-theme-404', get_template_directory_uri() . '/dist/assets/page-404.css', array('my-theme-style'), '1.0.0');
    }
  }
}
add_action('wp_enqueue_scripts', 'my_vite_theme_scripts');

// （開発環境用）従来の<script>タグ変換フィルター
function add_type_attribute($tag, $handle, $src)
{
  if ('vite-client' === $handle || 'my-theme-main' === $handle) {
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
  }
  return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

// Viteの開発サーバーが動いているかをチェックする裏方関数
function is_vite_dev_server_running()
{
  $fp = @fsockopen('localhost', 5173, $errno, $errstr, 1);
  if ($fp) {
    fclose($fp);
    return true; //動いている（開発モード）
  }
  return false; // 動いていない（本番モード）
}

//タイトルタグ出力（セパレーターを設定）
add_theme_support('title-tag');
function my_title_separator($separator)
{
  $separator = ' | ';
  return $separator;
}
add_filter('document_title_separator', 'my_title_separator');

//Newsスラッグ名の日本語を変換
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
  $nowPostId = 1;
  if ($post_type === 'post' && $post_ID != $nowPostId) {
    $digit = 6;
    $format = '%0' . $digit . 'd';
    if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
      $slug = sprintf($format, $post_ID);
    }
  }
  return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);

//管理画面のラベルを変更
function change_post_menu_label()
{
  global $menu;
  global $submenu;
  $post_name = 'お知らせ';
  $menu[5][0] = $post_name;
  $submenu['edit.php'][5][0] = $post_name . '一覧';
  $submenu['edit.php'][10][0] = $post_name . '新規追加';
  $page_name = 'ページ';
  $menu[20][0] = $page_name . '追加・編集';
  $submenu['edit.php?post_type=page'][5][0] = $page_name . '一覧';
  $submenu['edit.php?post_type=page'][10][0] = $page_name . '新規追加';
}
function change_post_object_label()
{
  global $wp_post_types;
  $name = 'お知らせ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name . 'を新規追加';
  $labels->edit_item = $name . 'の編集';
  $labels->new_item = '新規' . $name;
  $labels->view_item = $name . 'を表示';
  $labels->search_items = $name . 'を検索';
  $labels->not_fount = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
function change_page_object_label()
{
  global $wp_post_types;
  $name = 'ページ';
  $labels = &$wp_post_types['page']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name . 'を新規追加';
  $labels->edit_item = $name . 'の編集';
  $labels->new_item = '新規' . $name;
  $labels->view_item = $name . 'を表示';
  $labels->search_items = $name . 'を検索';
  $labels->not_fount = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'change_post_object_label');
add_action('init', 'change_page_object_label');
add_action('admin_menu', 'change_post_menu_label');

//投稿機能から「タグ」「カテゴリー」を削除
function unregister_taxonomies()
{
  global $wp_taxonomies;
  //カテゴリー
  if (!empty($wp_taxonomies['category']->object_type)) {
    foreach ($wp_taxonomies['category']->object_type as $i => $object_type) {
      if ($object_type == 'post') {
        unset($wp_taxonomies['category']->object_type[$i]);
      }
    }
  }
  //タグ
  if (!empty($wp_taxonomies['post_tag']->object_type)) {
    foreach ($wp_taxonomies['post_tag']->object_type as $i => $object_type) {
      if ($object_type == 'post') {
        unset($wp_taxonomies['post_tag']->object_type[$i]);
      }
    }
  }
  return true;
}
add_action('init', 'unregister_taxonomies');

//Contact Form 7のPタグ除去
function wpcf7_autop_return_false() {
    return false;
}
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');


// カスタム投稿タイプの設定ファイルを読み込む
require get_template_directory() . '/inc/cpt.php';

// パンくずリストの設定ファイルを読み込む
require get_template_directory() . '/inc/breadcrumb.php';

// ページネーションの設定ファイルを読み込む
require get_template_directory() . '/inc/pagination.php';

// booking packageのカスタマイズ
require get_template_directory() . '/inc/booking.php';
