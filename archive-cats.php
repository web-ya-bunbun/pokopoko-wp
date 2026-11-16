<?php get_header(); ?>
<main class="main">
  <h1 class="pageTitle"><?php esc_html(post_type_archive_title()); ?></h1>
  <?php my_custom_breadcrumb(); ?>
  <div class="catfiltering">
    <div class="catfiltering__inner">
      <label for="filtering" class="catfiltering__label">
        <select name="filtering" id="filtering">
          <option value="all">すべての猫ちゃんを見る</option>
          <optgroup label="性別で絞り込む">
            <option value="male">オス</option>
            <option value="female">メス</option>
          </optgroup>
          <optgroup label="大人・子どもで絞り込む">
            <option value="kitten">子猫（1歳未満）</option>
            <option value="adult">大人猫（1歳以上）</option>
          </optgroup>
          <optgroup label="毛色で絞り込む">
            <option value="white">白</option>
            <option value="black">黒</option>
            <option value="gray">グレー</option>
            <option value="shirokuro">白黒</option>
            <option value="kijitora">キジトラ</option>
            <option value="sabatora">サバトラ</option>
            <option value="chatora">茶トラ</option>
            <option value="shirokiji">白キジ</option>
            <option value="shirosaba">白サバ</option>
            <option value="shirocha">白茶</option>
            <option value="mike">三毛</option>
            <option value="sabi">サビ</option>
            <option value="other">その他</option>
          </optgroup>
        </select>
      </label>
    </div>
  </div>
  <?php if (have_posts()): ?>
    <ul class="catsList">
      <?php while (have_posts()): the_post();
        $cat_name = get_the_title();
        $cat_description = get_field('cat_description');
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

      ?>
        <li class="catsList__item js-fadeInUp" data-sex="<?php if($sex) echo esc_attr($sex['value']); ?>" data-age="<?php echo esc_attr($data_age); ?>" data-color="<?php if($color) echo esc_attr($color['value']); ?>">
          <a href="<?php the_permalink(); ?>">
            <p class="catsList__name"><?php the_title(); ?></p>
            <div class="catsList__img">
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
            <?php if($cat_description): ?>
            <p class="catsList__catch"><?php echo $cat_description; ?></p>
            <?php endif; ?>
            <dl class="catsList__prof">
              <?php if($sex): ?>
              <dt>性別</dt>
              <dd><?php echo esc_html($sex['label']); ?></dd>
              <?php endif; ?>
              <dt>推定年齢</dt>
              <dd><?php echo esc_html($age) ?></dd>
              <?php if($color): ?>
              <dt>毛色</dt>
              <dd><?php echo esc_html($color['label']); ?></dd>
              <?php endif; ?>
            </dl>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>
</main>
<?php get_footer(); ?>