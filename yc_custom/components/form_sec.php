<?php


function ht_form_sec_function($atts = array())
{


    $html = '';
    ob_start();
?>

    <section class="my-3r">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="lc-block">
                        <div class="px-md-4r px-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="nolightbox btn btn-lg btn-primary-d-200 w-100 d-flex align-items-center justify-content-center py-1hr btn-form" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="data:image/png;base64,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" width="42" height="42">
                                <span class="h3 text-white mb-0 mx-lg-1hr mx-1r">立即預約</span>
                                <img src="data:image/png;base64,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" width="42" height="42">
                            </button>

                        </div>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>
        </div>
    </section>

    <?php
    $html .= ob_get_clean();


    return $html;
}

add_shortcode('ht_form_sec', 'ht_form_sec_function');



function ht_form_sec_css()
{

    global $post;
    if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'ht_form_sec')) :

    ?>
        <style>
            .wpcf7-response-output {
                display: none;
            }
        </style>

    <?php
    endif;
}
add_action('wp_head', 'ht_form_sec_css');


function ht_form_sec_js()
{

    global $post;
    if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'ht_form_sec')) :

    ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content rounded-2">
                    <div class="modal-header">
                        <div></div>
                        <h5 class="modal-title" id="exampleModalLabel">立即預約</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="lc-block">
                            <p class="mb-2r">親愛的客戶您好，請您完整填寫以下房屋資訊，客服人員將會儘速與您聯繫。
                            </p>
                            <div lc-helper="shortcode" class="live-shortcode">
                            <?= do_shortcode( '[contact-form-7 id="1998" title="立即預約"]' ) ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            (function($) {
                $(document).ready(function() {
                    const wpcf7Elm = document.querySelectorAll('.wpcf7');


                    wpcf7Elm.forEach(ele => {
                        //wpcf7mailsent  wpcf7submit
                        ele.addEventListener('wpcf7mailsent', function(event) {
                            const exampleModal = document.querySelector('#exampleModal');
                            exampleModal.style.display = 'none';
                            const modalBackdrop = document.querySelector('.modal-backdrop');
                            modalBackdrop.remove();
                            alert('訊息已經成功送出')

                        }, false);

                        ele.addEventListener('wpcf7invalid', function(event) {
                            alert('表單中有欄位錯誤，請重新檢查一次')
                        }, false);

                    })
                })
            })(jQuery)
        </script>
<?php
    endif;
}
add_action('wp_footer', 'ht_form_sec_js');
