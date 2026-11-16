<?php get_header(); ?>
<main class="main">
  <h1 class="pageTitle"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></h1>
  <?php my_custom_breadcrumb(); ?>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post();
      $cat_name = get_the_title();
      $cat_description = get_field('cat_description');
      $cat_text = get_field('cat_text');
      if ($cat_text) {
        $cat_text_autop = wpautop($cat_text);
        $cat_text_formatted = wp_kses($cat_text_autop, [
          'p' => [],
          'br' => [],
        ]);
      }
      $sex = get_field('sex');
      $birthday_str = get_field('birthday');
      if ($birthday_str) {
        $birthday = DateTime::createFromFormat('Ymd', $birthday_str);
        $today = new DateTime();
        if ($birthday) {
          $interval = $birthday->diff($today);
          $years = $interval->y;
          $month = $interval->m;
          if ($years < 1) {
            $data_age = 'kitten';
            if ($years === 0 && $month === 0) {
              $age = '0ヶ月（生まれたて）';
            } else {
              $age = $month . 'ヶ月';
            }
          } else {
            $data_age = 'adult';
            $age = $years . '歳';
          }
        }
      } else {
        $data_age = 'unknown';
        $age = '年齢不詳';
      }
      $color = get_field('color');
      $cat_img_main = get_field('cat_img_main');

      $cat_gallery_fields = ['cat_img_01', 'cat_img_02', 'cat_img_03', 'cat_img_04', 'cat_img_05', 'cat_img_06', 'cat_img_07', 'cat_img_08', 'cat_img_09', 'cat_img_10'];
      $cat_gallery = [];
      foreach ($cat_gallery_fields as $field) {
        $cat_gallery_id = get_field($field);
        if ($cat_gallery_id) {
          $cat_image_url = wp_get_attachment_image_url($cat_gallery_id, 'large');
          $cat_image_alt = get_post_meta($cat_gallery_id, '_wp_attachment_image_alt', true);
          if (empty(trim($cat_image_alt))) {
            $cat_image_alt = $cat_name . 'ちゃんの写真';
          }
          if ($cat_image_url) {
            $cat_gallery[] = [
              'url' => $cat_image_url,
              'alt' => $cat_image_alt,
            ];
          }
        }
      }
    ?>
      <h2 class="catName"><?php the_title(); ?></h2>
      <div class="catDetail__wrapper">
        <div class="catProfile js-fadeInUp">
          <div class="catProfile__img">
            <?php if (!empty($cat_img_main)):
              $cat_img_id = attachment_url_to_postid($cat_img_main);
              $cat_img_alt = get_post_meta($cat_img_id, '_wp_attachment_image_alt', true);
              if (empty(trim($cat_img_alt))) {
                $cat_img_alt = $cat_name . 'ちゃんの写真';
              }
            ?>
              <img src="<?php echo esc_url($cat_img_main); ?>" alt="<?php echo esc_attr($cat_img_alt); ?>">
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/cat_noimg.png" alt="画像準備中です">
            <?php endif; ?>
          </div>
          <div class="catProfile__detail">
            <?php if ($cat_description): ?>
              <h3 class="catProfile__catch"><?php echo esc_html($cat_description); ?></h3>
            <?php endif; ?>
            <dl class="catProfile__prof">
              <?php if ($sex): ?>
                <dt>性別</dt>
                <dd><?php echo esc_html($sex['label']); ?></dd>
              <?php endif; ?>
              <dt>推定年齢</dt>
              <dd><?php echo esc_html($age); ?></dd>
              <?php if ($color): ?>
                <dt>毛色</dt>
                <dd><?php echo esc_html($color['label']); ?></dd>
              <?php endif; ?>
            </dl>
            <?php if ($cat_text): ?>
              <div class="catProfile__txt">
                <?php echo $cat_text_formatted; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <?php if (!empty($cat_gallery)): ?>
          <div class="catPhotos">
            <h3 class="subTitle catPhotos__title js-fadeInUp"><?php echo esc_html($cat_name); ?>ちゃんの写真一覧</h3>
            <ul class="catPhotos__list">
              <?php foreach ($cat_gallery as $cat_image): ?>
                <li class="catPhotos__item js-fadeInUp"><img src="<?php echo esc_url($cat_image['url']); ?>" alt="<?php echo esc_attr($cat_image['alt']) ?>"></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php get_footer(); ?>