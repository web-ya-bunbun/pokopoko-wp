<?php get_header(); ?>
<main class="main">
  <section class="topKV">
    <!-- 1つ目のブロック -->
    <div class="topKV__img01">
      <!-- 背景のうねうねシェイプ -->
      <svg xmlns="http://w3.org" viewBox="0 0 829 728" class="topKV__shap01">
        <path fill="#FFD9B3">
          <animate attributeName="d" dur="6s" repeatCount="indefinite" keyTimes="0; 0.5; 1" calcMode="spline"
            keySplines="0.42 0 0.58 1; 0.42 0 0.58 1" begin="0s"
            values="
          M28.7477 503.232C133.817 779.155 551.433 760.718 787.529 656.827C801.556 650.654 815.179 643.779 828.374 636.26V0H147.374C24.0432 131.782 -41.4188 318.969 28.7477 503.232Z;
          M38.0000 483.000C150.000 740.000 520.000 790.000 770.000 666.000C790.000 656.000 810.000 646.000 828.374 636.26V0H147.374C34.0000 151.000 -21.0000 298.000 38.0000 483.000Z;
          M28.7477 503.232C133.817 779.155 551.433 760.718 787.529 656.827C801.556 650.654 815.179 643.779 828.374 636.26V0H147.374C24.0432 131.782 -41.4188 318.969 28.7477 503.232Z" />
        </path>
      </svg>
      <!-- 画像とうねうねマスク -->
      <svg xmlns="http://w3.org" viewBox="0 0 829 728" class="topKV__imgClip01">
        <defs>
          <mask id="mask01">
            <!-- マスク内を「白(#fff)」で塗った部分だけが画像として表示されます -->
            <path fill="#ffffff">
              <animate attributeName="d" dur="6s" repeatCount="indefinite" keyTimes="0; 0.5; 1" calcMode="spline"
                keySplines="0.42 0 0.58 1; 0.42 0 0.58 1" begin="-1.5s"
                values="
              M28.7477 503.232C133.817 779.155 551.433 760.718 787.529 656.827C801.556 650.654 815.179 643.779 828.374 636.26V0H147.374C24.0432 131.782 -41.4188 318.969 28.7477 503.232Z;
              M38.0000 483.000C150.000 740.000 520.000 790.000 770.000 666.000C790.000 656.000 810.000 646.000 828.374 636.26V0H147.374C34.0000 151.000 -21.0000 298.000 38.0000 483.000Z;
              M28.7477 503.232C133.817 779.155 551.433 760.718 787.529 656.827C801.556 650.654 815.179 643.779 828.374 636.26V0H147.374C24.0432 131.782 -41.4188 318.969 28.7477 503.232Z" />
            </path>
          </mask>
        </defs>
        <!-- マスクを適用する画像（clip-path ではなく mask 属性を使います） -->
        <image xlink:href="<?php echo get_template_directory_uri(); ?>/img/KV_img01.jpg" width="100%" height="100%" preserveAspectRatio="xMidYMid slice"
          mask="url(#mask01)" />
      </svg>
    </div>

    <!-- 2つ目のブロック -->
    <div class="topKV__img02">
      <svg xmlns="http://w3.org" viewBox="0 0 570 533" class="topKV__shap02">
        <path fill="#FFD9B3">
          <animate attributeName="d" dur="6s" repeatCount="indefinite" keyTimes="0; 0.5; 1" calcMode="spline"
            keySplines="0.42 0 0.58 1; 0.42 0 0.58 1" begin="0s"
            values="
          M570 316.5C570 141.702 422.03 0 239.5 0C145.247 0 60.2083 37.7834 0 98.3967V533H480.582C536.037 476.392 570 400.244 570 316.5Z;
          M570 336.5C570 161.000 402.000 20.000 219.000 0C125.000 0 50.0000 47.0000 0 98.3967V533H480.582C526.000 456.000 570 380.000 570 336.5Z;
          M570 316.5C570 141.702 422.03 0 239.5 0C145.247 0 60.2083 37.7834 0 98.3967V533H480.582C536.037 476.392 570 400.244 570 316.5Z" />
        </path>
      </svg>
      <svg xmlns="http://w3.org" viewBox="0 0 570 533" class="topKV__imgClip02">
        <defs>
          <mask id="mask02">
            <path fill="#ffffff">
              <animate attributeName="d" dur="6s" repeatCount="indefinite" keyTimes="0; 0.5; 1" calcMode="spline"
                keySplines="0.42 0 0.58 1; 0.42 0 0.58 1" begin="-1s"
                values="
              M570 316.5C570 141.702 422.03 0 239.5 0C145.247 0 60.2083 37.7834 0 98.3967V533H480.582C536.037 476.392 570 400.244 570 316.5Z;
              M570 336.5C570 161.000 402.000 20.000 219.000 0C125.000 0 50.0000 47.0000 0 98.3967V533H480.582C526.000 456.000 570 380.000 570 336.5Z;
              M570 316.5C570 141.702 422.03 0 239.5 0C145.247 0 60.2083 37.7834 0 98.3967V533H480.582C536.037 476.392 570 400.244 570 316.5Z" />
            </path>
          </mask>
        </defs>
        <image xlink:href="<?php echo get_template_directory_uri(); ?>/img/KV_img02.jpg" width="100%" height="100%" preserveAspectRatio="xMidYMid slice"
          mask="url(#mask02)" />
      </svg>
    </div>

    <div class="topKV__box js-fadeInUp">
      <p class="topKV__lead">
        個性豊かな猫ちゃんたちと
        <br />
        特別なひとときを過ごしませんか？
      </p>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="topKV__btn btn">カフェを予約する</a>
    </div>
    <div class="topKV__CTA">
      <a href="#" class="topKV__CTATxt">
        保護猫の譲渡
        <br />
        ご希望の方は
        <br />
        こちら
      </a>
    </div>

    <div class="topKV__scroll">
      <img src="<?php echo get_template_directory_uri(); ?>/img/scroll.svg" alt="スクロールしてニャ" />
    </div>
  </section>
  <section class="section secAbout">
    <h2 class="secTitle js-fadeInUp">保護猫カフェ ぽこぽこについて</h2>
    <div class="inner">
      <div class="secAbout__box">
        <div class="secAbout__txt js-fadeInUp">
          <p>
            猫とのふれあいを通じて人や社会が少しずつ（poco a
            poco）でもやさしく豊かになっていけるようにという願いをこめて、「ぽこぽこ」と名付けました。
          </p>
          <p>
            木のぬくもりを感じる落ち着いた店内で、おいしいコーヒーやスイーツと共に、
            猫たちとのふれあいをお楽しみください。
          </p>
          <p>
            当店にいる猫たちはすべて、健康管理を徹底し、定期的な検診を受けています。
            お客様にも猫たちにも安心してお過ごしいただける環境づくりを心がけています。
          </p>
        </div>
        <div class="secAbout__img js-fadeInUp">
          <img src="<?php echo get_template_directory_uri(); ?>/img/top_about_img.jpg" alt="" />
        </div>
      </div>
      <div class="secAbout__3points js-fadeInUp">
        <div class="secAbout__3pointsBox">
          <div class="secAbout__3pointsIcon">
            <img src="<?php echo get_template_directory_uri(); ?>/img/ico_heart.svg" alt="" />
          </div>
          <h3 class="secAbout__3pointsTitle">猫への愛情</h3>
          <p class="secAbout__3pointsTxt">
            すべての猫たちは愛情を持って飼育され、健康管理も万全です。
          </p>
        </div>
        <div class="secAbout__3pointsBox">
          <div class="secAbout__3pointsIcon">
            <img src="<?php echo get_template_directory_uri(); ?>/img/ico_coffee.svg" alt="" />
          </div>
          <h3 class="secAbout__3pointsTitle">こだわりのドリンク</h3>
          <p class="secAbout__3pointsTxt">
            厳選した豆を使用したコーヒーと、オリジナルのドリンクをご用意。
          </p>
        </div>
        <div class="secAbout__3pointsBox">
          <div class="secAbout__3pointsIcon">
            <img src="<?php echo get_template_directory_uri(); ?>/img/ico_glitter.svg" alt="" />
          </div>
          <h3 class="secAbout__3pointsTitle">清潔な空間</h3>
          <p class="secAbout__3pointsTxt">
            常に清潔で快適な環境を維持し、安心してお過ごしいただけます。
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="section secCats">
    <?php
    $post_type_obj_cats = get_post_type_object('cats');
    if ($post_type_obj_cats) {
      $post_type_obj_cats_title = $post_type_obj_cats->label;
    }
    ?>
    <h2 class="secTitle js-fadeInUp"><?php echo esc_html($post_type_obj_cats_title); ?></h2>
    <div class="secCats__wrapper js-fadeInUp">
      <?php
      $args = [
        'post_type' => 'cats',
        'posts_per_page' => 12,
        'no_found_rows' => true,
        'orderby'        => 'rand'
      ];
      $cats_posts = new WP_Query($args);

      if ($cats_posts->have_posts()): ?>
        <div class="splide">
          <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev">
              <img src="<?php echo get_template_directory_uri(); ?>/img/nikukyu.svg" alt="" />
            </button>
            <button class="splide__arrow splide__arrow--next">
              <img src="<?php echo get_template_directory_uri(); ?>/img/nikukyu.svg" alt="" />
            </button>
          </div>
          <div class="splide__track">
            <ul class="secCats__list splide__list">

              <?php
              while ($cats_posts->have_posts()):
                $cats_posts->the_post();
                $cat_name = get_the_title();
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
                      if ($years === 0 && $month === 0) {
                        $age = '0ヶ月（生まれたて）';
                      } else {
                        $age = $month . 'ヶ月';
                      }
                    } else {
                      $age = $years . '歳';
                    }
                  }
                } else {
                  $age = '年齢不詳';
                }
                $color = get_field('color');
                $cat_img_main = get_field('cat_img_main');
              ?>
                <li class="secCats__item splide__slide">
                  <a href="<?php the_permalink(); ?>">
                    <div class="secCats__img">
                      <?php if ($cat_img_main):
                        $cat_img_id = attachment_url_to_postid($cat_img_main);
                        $cat_img_alt = get_post_meta($cat_img_id, '_wp_attachment_image_alt', true);
                        if (empty(trim($cat_img_alt))) {
                          $cat_img_alt = $cat_name . 'ちゃんの写真';
                        }
                      ?>
                        <img src="<?php echo esc_url($cat_img_main); ?>" alt="<?php echo esc_attr($cat_img_alt); ?>" />
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/cat_noimg.png" alt="画像準備中です">
                      <?php endif; ?>
                    </div>
                    <p class="secCats__name"><?php the_title(); ?></p>
                    <p class="secCats__prof"><?php if ($sex) echo $sex['label']; ?>・推定<?php echo $age; ?>・<?php if ($color) echo $color['label']; ?></p>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      <?php
      else :
        // 投稿が1件もない場合の表示
        echo '<p>猫ちゃんがまだ登録されていません</p>';
      endif;
      wp_reset_postdata();
      ?>

    </div>
    <div class="section__btnArea js-fadeInUp">
      <a href="<?php echo esc_url(get_post_type_archive_link('cats')); ?>" class="btn btn--type2">
        <?php echo esc_html($post_type_obj_cats_title); ?>について詳しく見る
      </a>
    </div>
  </section>
  <section class="section secPrice js-parallax">
    <?php
    $page_menu = get_page_by_path('menu'); // スラッグ名を指定
    $page_menu_id = $page_menu ? $page_menu->ID : null;
    if ($page_menu) {
      $page_menu_title = get_the_title($page_menu_id);
    }
    ?>
    <h2 class="secTitle js-fadeInUp"><?php echo esc_html($page_menu_title); ?></h2>
    <div class="secPrice__contents js-fadeInUp">
      <div class="secPrice__priceBox">
        <h3 class="subTitle">料金プラン</h3>
        <table class="secPrice__table">
          <colgroup>
            <col />
            <col class="priceCol" />
            <col class="priceCol" />
          </colgroup>
          <tbody>
            <tr>
              <td></td>
              <td>平日</td>
              <td>土日祝</td>
            </tr>
            <?php
            $max_plans = 8;
            for ($i = 1; $i <= $max_plans; $i++) :
              $plan_group = get_field('plan' . $i, $page_menu_id);
              if (!empty($plan_group) && !empty($plan_group['plan_title'])) :
                $title     = $plan_group['plan_title'];
                $price_weekday    = $plan_group['plan_price_weekday'];
                $price_holiday = $plan_group['plan_price_holiday'];
            ?>
                <tr>
                  <th><?php echo esc_html($title); ?></th>
                  <td><?php if (!empty($price_weekday)) echo '¥' . esc_html(number_format($price_weekday)); ?></td>
                  <td><?php if (!empty($price_holiday)) echo '¥' . esc_html(number_format($price_holiday)); ?></td>
                </tr>
            <?php
              endif;
            endfor;
            ?>
          </tbody>
        </table>
        <h4 class="sTitle">猫ちゃんのおやつオプション</h4>
        <table class="secPrice__table">
          <tbody>
            <?php
            $max_snacks = 5;
            for ($i = 1; $i <= $max_snacks; $i++) :
              $snack_group = get_field('snack' . $i, $page_menu_id);
              if (!empty($snack_group) && !empty($snack_group['snack_title'])) :
                $title     = $snack_group['snack_title'];
                $price    = $snack_group['snack_price'];
            ?>
                <tr>
                  <th><?php echo esc_html($title); ?></th>
                  <td><?php if (!empty($price)) echo '¥' . esc_html(number_format($price)); ?></td>
                </tr>
            <?php
              endif;
            endfor;
            ?>
          </tbody>
        </table>
      </div>
      <?php
      $menu_banner = get_field('menu_banner', $page_menu_id);
      $menu_banner_link = get_field('menu_banner_link', $page_menu_id);
      $menu_banner_id = attachment_url_to_postid($menu_banner);
      $menu_banner_alt = get_post_meta($menu_banner_id, '_wp_attachment_image_alt', true);
      ?>
      <div class="secPrice__menuImg">
        <?php if ($menu_banner) :
          if ($menu_banner_link):
            $menu_banner_link_url = $menu_banner_link['url'];
            $menu_banner_link_target = $menu_banner_link['target'] ? $menu_banner_link['target'] : '_self';
        ?>
            <a href="<?php echo esc_url($menu_banner_link_url); ?>" target="<?php echo esc_attr($menu_banner_link_target); ?>"><img src="<?php echo esc_url($menu_banner); ?>" alt="<?php if (!empty(trim($menu_banner_alt))) echo esc_attr($menu_banner_alt); ?>"></a>
          <?php else: ?>
            <img src="<?php echo esc_url($menu_banner); ?>" alt="<?php if (!empty(trim($menu_banner_alt))) echo esc_attr($menu_banner_alt); ?>">
          <?php endif; ?>
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/food_img01.jpg" alt="">
        <?php endif; ?>
      </div>
      <div class="secPrice__menuBox">
        <h3 class="subTitle">フード・ドリンク</h3>
        <h4 class="sTitle">フードメニュー</h4>
        <table class="secPrice__table">
          <tbody>
            <?php
            $max_food = 5;
            for ($i = 1; $i <= $max_food; $i++) :
              $food_group = get_field('food' . $i, $page_menu_id);
              if (!empty($food_group) && !empty($food_group['food_title'])) :
                $title     = $food_group['food_title'];
                $price    = $food_group['food_price'];
                $img = $food_group['food_img'];
                $img_id = attachment_url_to_postid($img);
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            ?>
                <tr>
                  <th><?php echo esc_html($title); ?></th>
                  <td><?php if (!empty($price)) echo '¥' . esc_html(number_format($price)); ?></td>
                </tr>
            <?php
              endif;
            endfor;
            ?>
          </tbody>
        </table>
        <h4 class="sTitle">ドリンクメニュー</h4>
        <table class="secPrice__table">
          <tbody>
            <?php
            $max_drink = 5;
            for ($i = 1; $i <= $max_drink; $i++) :
              $drink_group = get_field('drink' . $i, $page_menu_id);
              if (!empty($drink_group) && !empty($drink_group['drink_title'])) :
                $title     = $drink_group['drink_title'];
                $price    = $drink_group['drink_price'];
                $img = $drink_group['drink_img'];
                $img_id = attachment_url_to_postid($img);
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            ?>
                <tr>
                  <th><?php echo esc_html($title); ?></th>
                  <td><?php if (!empty($price)) echo '¥' . esc_html(number_format($price)); ?></td>
                </tr>
            <?php
              endif;
            endfor;
            ?>
          </tbody>
        </table>
      </div>
      <p class="secPrice__att">※価格は税込です</p>
    </div>
    <div class="section__btnArea js-fadeInUp">
      <a href="<?php echo esc_url(home_url('/menu/')); ?>" class="btn btn--type2">
        <?php echo esc_html($page_menu_title); ?>について詳しく見る
      </a>
    </div>
  </section>
  <section class="section secNotice">
      <?php
  // 投稿一覧ページ（固定ページ）のIDからタイトル「お知らせ」を取得
  $post_page_id    = get_option( 'page_for_posts' );
  $post_page_title = get_the_title( $post_page_id );
  ?>
    <h2 class="secTitle js-fadeInUp"><?php echo $post_page_title; ?></h2>
        <?php
    $args = [
      'post-type' => 'post',
      'posts_per_page' => 5,
    ];
    $news_posts = new WP_Query($args);
    if($news_posts->have_posts()):?>
    <ul class="secNotice__list js-fadeInUp">
      <?php while($news_posts->have_posts()):
        $news_posts->the_post();
      ?>
      <li class="secNotice__item">
        <time datetime="<?php the_time('Y-m-d'); ?>" class="secNotice__date"><?php the_time('Y年n月j日'); ?></time>
        <h3 class="secNotice__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      </li>
      <?php endwhile; ?>
    </ul>
    <?php endif; ?>
    <div class="section__btnArea js-fadeInUp">
      <a href="<?php echo esc_url(home_url('/news/')); ?>" class="btn btn--type2"><?php echo $post_page_title; ?>をもっと見る</a>
    </div>
  </section>
  <section class="section secInquiry">
    <div class="secInquiry__wrapper">
      <h2 class="secTitle js-fadeInUp">ご予約・お問い合わせ</h2>
      <div class="secInquiry__btnArea js-fadeInUp">
        <div class="secInquiry__btnReserve">
          <a href="<?php echo esc_url( home_url('/contact/')); ?>#" class="btn btn--type2">お店のご予約</a>
        </div>
        <div class="secInquiry__btnContact">
          <a href="<?php echo esc_url( home_url('/contact/')); ?>" class="btn btn--type2--color2">お問い合わせ</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>