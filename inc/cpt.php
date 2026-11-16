<?php
//カスタム投稿タイプ
function create_post_type()
{
  register_post_type(
    'cats',
    array(
      'labels' => array(
        'name' => 'カフェの猫たち', //スラッグ
        'singular_name' => 'カフェの猫たち', //スラッグ単数系（日本語なので気にしない）
        'add_new_item' => '新規猫ちゃんを追加', //管理画面メニューの新規追加名
        'edit_item' => '猫ちゃんの編集', //管理画面メニューの編集名
      ),
      'public' => true,
      'menu_position' => 4, //管理画面メニューの場所
      'has_archive' => true,
      'supports' => array(
        'title',
        'custom-fields',
      )
    )
  );
}
add_action('init', 'create_post_type', 20); //少し遅めに実行(20)

/**
 * カスタム投稿タイプのタイトル入力欄のプレースホルダーを変更する
 */
function change_title_placeholder($title)
{
  // 現在の編集画面のスクリーン情報を取得
  $screen = get_current_screen();

  // 投稿タイプが 'cats' の場合のみプレースホルダーを変更
  if (isset($screen->post_type) && 'cats' === $screen->post_type) {
    $title = '猫ちゃんのお名前';
  }

  return $title;
}
add_filter('enter_title_here', 'change_title_placeholder');

/**
 * ACFの URLスラッグ（custom_slug）フィールドに半角英数字のみのバリデーションをかける
 */
function my_theme_validate_custom_slug($valid, $value, $field, $input_name)
{
  // 値が入っている場合のみチェック
  if ($valid && !empty($value)) {
    // 半角英数字とハイフン以外が含まれているかチェック
    if (!preg_match('/^[A-Za-z0-9\-]+$/', $value)) {
      $valid = 'URLスラッグは半角英数字とハイフン（-）のみで入力してください。';
    }
  }
  return $valid;
}
// acf/validate_value/name=フィールド名 というフィルターフックを使用
add_filter('acf/validate_value/name=custom_slug', 'my_theme_validate_custom_slug', 10, 4);

/**
 * ACFの保存完了直後に、custom_slugの値をWordPressのURLスラッグに安全に同期する
 */
function my_theme_sync_acf_slug_on_save($post_id)
{
  // 1. 自動保存、プレビュー、または投稿IDが数値でない場合は処理をスキップ
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!is_numeric($post_id)) return;

  // 2. 現在の投稿タイプが「news」であるかチェック
  $post_type = get_post_type($post_id);
  if ('cats' !== $post_type) return;

  // 3. ACFから 'custom_slug' の最新の入力値を取得（データベース保存直後なので確実に取れます）
  $custom_slug = get_field('custom_slug', $post_id);

  // 4. URLスラッグとして安全な文字列にサニタイズ（大文字を小文字に、不正な文字を排除）
  if (!empty($custom_slug)) {
    $sanitized_slug = sanitize_title($custom_slug);
  } else {
    // 空欄の場合は、文字化けを防ぐために「投稿ID」をスラッグにする
    $sanitized_slug = $post_id;
  }

  // 5. 現在の実際のURLスラッグを取得し、ACFの値と異なる場合のみデータベースを更新する
  // （※これを行わないと、更新処理が無限ループしてフリーズしてしまいます）
  $current_post = get_post($post_id);
  if ($current_post && $current_post->post_name !== $sanitized_slug) {

    // 無限ループを防ぐため、一時的にフックを外して更新する
    remove_action('acf/save_post', 'my_theme_sync_acf_slug_on_save', 20);

    wp_update_post(array(
      'ID'        => $post_id,
      'post_name' => $sanitized_slug
    ));

    // 更新が終わったらフックを戻す
    add_action('acf/save_post', 'my_theme_sync_acf_slug_on_save', 20);
  }
}
// ACFがデータをデータベースに書き込んだ「後」に実行されるように、優先度20でフック
add_action('acf/save_post', 'my_theme_sync_acf_slug_on_save', 20);

//catsアーカイブのランダム表示
function custom_post_type_archive_random($query)
{
  // 管理画面ではなく、メインクエリであり、かつ指定したカスタム投稿タイプのアーカイブページの場合
  if (! is_admin() && $query->is_main_query() && $query->is_post_type_archive('cats')) {
    $query->set('orderby', 'rand');
  }
}
add_action('pre_get_posts', 'custom_post_type_archive_random');
