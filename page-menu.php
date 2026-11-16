<?php
get_header();
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="main">
      <h1 class="pageTitle"><?php the_title(); ?></h1>
      <?php my_custom_breadcrumb(); ?>
      <div class="menuContents">
        <div class="priceBox js-fadeInUp">
          <?php
          $group_plan = acf_get_field_group('group_6ae3e4960111e');
          ?>
          <h2 class="subuTitle priceBox__title">
            <?php if ($group_plan): echo esc_html($group_plan['title']); ?>
              <?php else: ?>料金プラン
            <?php endif ?>
          </h2>
          <div class="priceBox__block">
            <div class="priceBox__plan">
              <table class="priceBox__table">
                <colgroup>
                  <col>
                  <col class="priceCol">
                  <col class="priceCol">
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
                    $plan_group = get_field('plan' . $i);
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
            </div>
            <div class="priceBox__option">
              <?php
              $group_snack = acf_get_field_group('group_6ae3f7f84233b');
              ?>
              <h3 class="sTitle">
                <?php if ($group_snack): echo esc_html($group_snack['title']); ?>
                  <?php else: ?>猫ちゃんのおやつオプション
                <?php endif ?>
              </h3>
              <table class="priceBox__table">
                <tbody>
                  <?php
                  $max_snacks = 5;
                  for ($i = 1; $i <= $max_snacks; $i++) :
                    $snack_group = get_field('snack' . $i);
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
              <div class="priceBox__imgs">
                <img src="<?php echo get_template_directory_uri(); ?>/img/menu_cat01.png" alt="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/menu_cat02.png" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="menuContents__img js-fadeInUp">
          <?php
          $menu_banner = get_field('menu_banner');
          $menu_banner_link = get_field('menu_banner_link');
          $menu_banner_id = attachment_url_to_postid($menu_banner);
          $menu_banner_alt = get_post_meta($menu_banner_id, '_wp_attachment_image_alt', true);
          if ($menu_banner) :
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
        <div class="menuBox js-fadeInUp">
          <h2 class="subuTitle menuBox__title">フード・ドリンク</h2>
          <?php
          $group_food = acf_get_field_group('group_6ae3fd0d44d76');
          ?>
          <h3 class="sTitle">
            <?php if ($group_food): echo esc_html($group_food['title']); ?>
              <?php else: ?>フードメニュー
            <?php endif ?>
          </h3>
          <ul class="menuBox__list">
            <?php
            $max_food = 5;
            for ($i = 1; $i <= $max_food; $i++) :
              $food_group = get_field('food' . $i);
              if (!empty($food_group) && !empty($food_group['food_title'])) :
                $title     = $food_group['food_title'];
                $price    = $food_group['food_price'];
                $img = $food_group['food_img'];
                $img_id = attachment_url_to_postid($img);
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            ?>
                <li class="menuBox__item">
                  <?php if (!empty($img)): ?>
                    <div class="menuBox__img"><img src="<?php echo esc_url($img); ?>" alt="<?php if (!empty(trim($img_alt))) echo esc_attr($img_alt); ?>"></div>
                  <?php endif; ?>
                  <div class="menuBox__txtBox">
                    <div class="menuBox__name"><?php echo esc_html($title); ?></div>
                    <div class="menuBox__price"><?php if (!empty($price)) echo '¥' . esc_html(number_format($price)); ?></div>
                  </div>
                </li>
            <?php
              endif;
            endfor;
            ?>
          </ul>
          <?php
          $group_drink = acf_get_field_group('group_6ae4006ab9af8');
          ?>
          <h3 class="sTitle">
            <?php if ($group_drink): echo esc_html($group_drink['title']); ?>
              <?php else: ?>ドリンクメニュー
            <?php endif ?>
          </h3>
          <ul class="menuBox__list">
            <?php
            $max_drink = 5;
            for ($i = 1; $i <= $max_drink; $i++) :
              $drink_group = get_field('drink' . $i);
              if (!empty($drink_group) && !empty($drink_group['drink_title'])) :
                $title     = $drink_group['drink_title'];
                $price    = $drink_group['drink_price'];
                $img = $drink_group['drink_img'];
                $img_id = attachment_url_to_postid($img);
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            ?>
                <li class="menuBox__item">
                  <?php if (!empty($img)): ?>
                    <div class="menuBox__img"><img src="<?php echo esc_url($img); ?>" alt="<?php if (!empty(trim($img_alt))) echo esc_attr($img_alt); ?>"></div>
                  <?php endif; ?>
                  <div class="menuBox__txtBox">
                    <div class="menuBox__name"><?php echo esc_html($title); ?></div>
                    <div class="menuBox__price"><?php if (!empty($price)) echo '¥' . esc_html(number_format($price)); ?></div>
                  </div>
                </li>
            <?php
              endif;
            endfor;
            ?>
          </ul>
        </div>
      </div>
    </main>
<?php endwhile;
endif; ?>
<?php
get_footer();
?>