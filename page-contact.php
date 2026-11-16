<?php
get_header();
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="main">
      <h1 class="pageTitle"><?php the_title(); ?></h1>
      <?php my_custom_breadcrumb(); ?>
      <div class="contactContents">
        <div class="contactMenu js-tab-list" role="tablist" aria-label="ご予約・お問い合わせ">
          <button class="contactMenu__btn js-tab-button is-active" id="tabBtn-reservation" role="tab" aria-controls="panel-reservation" aria-selected="true" tabindex="0">ご来店予約</button>
          <button class="contactMenu__btn js-tab-button" id="tabBtn-contact" role="tab" aria-controls="panel-contact" aria-selected="false" tabindex="-1">お問い合わせ・ご要望</button>
        </div>
        <div class="contactTab">
          <div class="contactTab__panel js-tab-panel" id="panel-reservation" role="tabpanel" aria-labelledby="tabBtn-reservation" tabindex="0">
            <p class="contactTab__txt">こちらのカレンダーからお店のご予約ができます。<br>お電話でのご予約も受け付けております。<br>TEL：000-000-0000</p>
            <?php echo apply_shortcodes('[booking_package id=3]'); ?>
          </div>
          <div class="contactTab__panel js-tab-panel" id="panel-contact" role="tabpanel" aria-labelledby="tabBtn-contact" tabindex="0" hidden>
            <p class="contactTab__txt">当カフェに関するご質問、ご要望などお気軽にお問い合わせください。</p>
            <?php echo apply_shortcodes('[contact-form-7 id="5557484" title="コンタクトフォーム 1"]'); ?>
          </div>
        </div>
      </div>
    </main>
<?php endwhile;
endif; ?>
<?php
get_footer();
?>