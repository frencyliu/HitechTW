<?php
$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
</main>
<footer class="bg-primary position-relative" style="z-index:9">
    <div class="py-lg-4r py-1hr container text-gray-900">
        <div class="row">
            <div class="col-lg-6 text-lg-start text-center d-flex align-items-center">
                <div class="lc-block">
                    <div editable="rich">
                        <ul class="footer-ul">
                            <li class="d-none d-lg-inline-block"><?= do_shortcode('[ht_icons type="fb"]') ?></li>

                            <li class="d-none d-lg-inline-block"><?= do_shortcode('[ht_icons type="line"]') ?></li>
                            <br class="d-none d-md-none my-2r">
                            <li><a class="nolightbox" href="<?= site_url('privacy-policy') ?>">隱私政策</a></li>
                            <li><a class="nolightbox" href="<?= site_url('terms') ?>">服務條款</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /lc-block -->
            </div>
            <div class="col-lg-6 text-lg-end text-start">
                <div class="lc-block">
                    <div editable="rich">

                        <div class="d-flex justify-content-lg-end">
                            <?= do_shortcode('[ht_icons class="me-2 d-lg-none" type="fb"]') ?>
                            <?= do_shortcode('[ht_icons class="me-2 d-lg-none" type="line"]') ?>
                            <?= do_shortcode('[addtoany url="' . $url . '"]'); ?></div>
                        <p>
                            Copyright © <?= date('Y') ?> HORUS INTELLIGENT. All Rights Reserved
                        </p>
                    </div>
                </div>
                <!-- /lc-block -->
            </div>
        </div>
    </div>

</footer>

<?= do_shortcode('[ht_chatbtn]'); ?>

<script>
    (function($) {
        $(document).ready(function() {
            //調整高度
            const headerHeight = $('header').height();
            $('body main#theme-main').css('paddingTop', headerHeight + 'px');


            //IMG
            let screen_width = $(window).width();
            if (screen_width < 991) {
                $('.m-src').each(function() {
                    const m_src = $(this).attr('m-src');
                    if (m_src !== '') {
                        $(this).attr('src', m_src);
                    }
                });
            }
        });

        //針對驗屋實例做的
        setTimeout(() => {
            $(window).off("scroll");
        }, 1000);

        //GA
        function ht_ga(categorty, action, label, value) {
            return gtag('event', action, {
                'event_category': categorty,
                'event_label': label,
                'value': value,
            });
        }
        $('nav.top-nav a.btn').click(ht_ga('Call to Action', '點擊', '頂部nav', '1'));


        $('.chatbtn_fb').click(ht_ga('Call to Action', '點擊', 'Chat Button FB', '1'));
        $('.chatbtn_line').click(ht_ga('Call to Action', '點擊', 'Chat Button Line', '1'));
        $('.chatbtn_phone').click(ht_ga('Call to Action', '點擊', 'Chat Button Phone', '1'));

        $('.footer-ul .icons_fb').click(ht_ga('Call to Action', '點擊', 'Footer FB icon', '1'));
        $('.footer-ul .icons_line').click(ht_ga('Call to Action', '點擊', 'Footer Line icon', '1'));


        $('.btn-form').click(function(e) {
            let order_number = $(this).index('.btn-form') + 1;
            ht_ga('Call to Action', '開啟表單', '[第 ' + order_number + ' 個]立即諮詢按鈕 from ' + document.title, '1')
        });

        $('.wpcf7-submit').click(ht_ga('轉換', '送出表單', '送出表單 from ' + document.title, '5'));















    })(jQuery)
</script>

<?php wp_footer(); ?>

</body>

</html>