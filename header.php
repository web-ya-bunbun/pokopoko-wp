<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="header">
    <?php echo (is_front_page()) ? '<h1 class="headerLogo">' : '<p class="headerLogo">'; ?>
    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>" /></a>
    <?php echo (is_front_page()) ? '</h1>' : '</p>'; ?>
    <div class="menuCtrl">
      <input type="checkbox" name="menuCtrlBtn" id="menuCtrlBtn" />
      <label for="menuCtrlBtn" class="menuCtrlBtn">
        <svg xmlns="http://w3.org" viewBox="0 0 240 180">
          <rect class="menuCtrlLine" y="0" width="240" height="30" rx="15" ry="15" />
          <rect class="menuCtrlLine" y="75" width="240" height="30" rx="15" ry="15" />
          <rect class="menuCtrlLine" y="75" width="240" height="30" rx="15" ry="15" />
          <rect class="menuCtrlLine" y="150" width="240" height="30" rx="15" ry="15" />
        </svg>
      </label>
    </div>
    <?php
    // グローバルナビゲーションの定義配列
    $nav_items = array(
      array(
        'label'      => 'カフェの猫たち',
        'url'        => get_post_type_archive_link('cats'),
        'is_current' => is_post_type_archive('cats') || is_singular('cats'),
      ),
      array(
        'label'      => '料金・メニュー',
        'url'        => home_url('/menu/'),
        'is_current' => is_page('menu'), // 固定ページのスラッグを指定
      ),
      array(
        'label'      => 'お知らせ',
        'url'        => get_post_type_archive_link('post'),
        'is_current' => is_home() || is_post_type_archive('post') || is_single('post'),
      ),
      array(
        'label'      => 'お店情報',
        'url'        => home_url('/info/'),
        'is_current' => is_page('info'),
      ),
      array(
        'label'      => 'ご予約・お問い合わせ',
        'url'        => home_url('/contact/'),
        'is_current' => is_page('contact'),
      ),
    );
    ?>
    <nav class="gnav">
      <ul class="gnavList">
        <?php foreach ($nav_items as $item) : ?>
          <?php
            $current_class = $item['is_current'] ? 'is-current' : '';
            $aria_current  = $item['is_current'] ? ' aria-current="page" ' : '';
          ?>
        <li class="gnavItem">
          <?php
            echo '<a href="' . esc_url($item['url']) . '"';
            echo $aria_current;
            if($item['label'] !== 'ご予約・お問い合わせ') :
              echo 'class="' . $current_class . '">';
            else:
              echo 'class="gnavItem__btn btn ' . $current_class . '">';
            endif;
            echo esc_html($item['label']);
            echo '</a>';
          ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <div class="siteAttention">※このサイトは架空のサンプルサイトです。</div>
  </header>