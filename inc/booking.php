<?php
function add_booking_package_a11y_script() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const targetContainer = document.getElementById('booking-package');
        if (!targetContainer) return;

        function applyBookingPackageCustom() {
            // 1. 月移動ボタンに「月」を追加＆アクセシビリティラベル付与
            const monthButtons = targetContainer.querySelectorAll('.calendarHeader > label > span');
            monthButtons.forEach(function(btn, index) {
                const currentText = btn.textContent.trim();
                // テキストが数字だけ（例: "10" や "12"）の場合に「月」を追加
                if (/^\d+$/.test(currentText)) {
                    btn.textContent = currentText + '月';
                    // スクリーンリーダー向けに「前の月へ（10月）」のように読み上げさせる
                    const direction = index === 0 ? '前の月へ' : '次の月へ';
                    btn.parentNode.setAttribute('aria-label', direction);
                }
            });

            const availableDay = targetContainer.querySelectorAll('.available_day');
            availableDay.forEach(function(elm) {
              if (elm.dataset.addedLabel === 'true') return;
              const dayText = elm.textContent.trim();
              elm.insertAdjacentHTML('beforeend', '<span class="day_slot__status">○</span>');
              elm.setAttribute('aria-label', `${dayText}日：予約可`);
              elm.dataset.addedLabel = 'true';
            });

            const closingDay = targetContainer.querySelectorAll('.closingDay');
            closingDay.forEach(function(elm) {
              if (elm.dataset.addedClosingLabel === 'true') return;
              const dayText = elm.textContent.trim();
              elm.insertAdjacentHTML('beforeend', '<span class="day_slot__status">満席</span>');
              elm.setAttribute('aria-label', `${dayText}日：満席`);
              elm.dataset.addedClosingLabel = 'true';
            });

            const holidayPanels = targetContainer.querySelectorAll('.holidayPanel');
            holidayPanels.forEach(function(elm) {
              if (elm.dataset.addedHolidayLabel === 'true') return;
              const dayText = elm.textContent.trim();
              elm.insertAdjacentHTML('beforeend', '<span class="day_slot__status">店休</span>');
              elm.setAttribute('aria-label', `${dayText}日：店休日`);
              elm.setAttribute('aria-disabled', true);
              elm.dataset.addedHolidayLabel = 'true';
            });

            // 2. キーボード操作の付与
            const selectors = [
                '#booking-package .calendarHeader > label',          // 月移動ボタン
                '#booking-package .available_day',  // 選択可能な日付
                '#booking-package .selectable_day_slot:not(.closed)',   // プラン選択画面の日付選択
                '#booking-package .selectable_service_slot',   // プラン選択
                '#booking-package .selectable_time_slot',   // 時間選択
                '#booking-package .return_button',         // 戻るボタン
                '#booking-package button, #booking-package input[type="button"]'
            ];

            const elements = targetContainer.querySelectorAll(selectors.join(', '));

            elements.forEach(function(el) {
                if (el.dataset.a11yApplied === 'true' || el.offsetParent === null) return;

                if (el.tagName !== 'BUTTON' && el.tagName !== 'A' && el.tagName !== 'INPUT') {
                    el.setAttribute('tabindex', '0');
                    el.setAttribute('role', 'button');

                    el.addEventListener('keydown', function(e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            el.click();
                        }
                    });
                }

                el.style.outlineOffset = '2px';
                el.dataset.a11yApplied = 'true';
            });
        }

        // 初回実行
        applyBookingPackageCustom();

        // 月移動や画面切り替え（DOM変更）を監視して再適用
        const observer = new MutationObserver(function(mutations) {
            applyBookingPackageCustom();
        });

        observer.observe(targetContainer, {
            childList: true,
            subtree: true
        });
    });
    </script>
    <style>
        /* キーボードフォーカス時の枠線をはっきり表示させる */
        #booking-package [role="button"]:focus-visible {
            outline: 2px solid #005fcc !important;
            box-shadow: 0 0 0 2px rgba(0, 95, 204, 0.3) !important;
        }
    </style>
    <?php
}
add_action('wp_footer', 'add_booking_package_a11y_script', 99);
