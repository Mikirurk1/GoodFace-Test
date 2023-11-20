<footer class="footer">
    <div class="container-main">

        <div data-wow-duration="0.7s" class="footer__subscriber wow animate__fadeInUp">


            <img data-wow-duration="1s"  class="footer__subscriber-letter wow animate__tada" src="<?php echo get_template_directory_uri() . '/assets/svg/letter.svg'; ?>" alt="">
            <div class="container-short footer-form">
                <div class="footer__subscriber-title">Subscribe for a newsletter</div>
                <div class="footer__subscriber-subtitle">Share your email so we can send you latest LaFinteca news</div>
                <form id="" class="subscription-form" action="">
                    <div class="position-relative">
                        <object id="input-arrow" data="<?php echo get_template_directory_uri() . '/assets/svg/input-arrow.svg'; ?>" type="image/svg+xml"></object>
                        <input id="email" class="subscription-form_email" name="email" placeholder="Email" type="email" inputmode="email">
                    </div>
                    <span class="input-err">Incorrect value</span>
                    <button class="black-btn">Submit<img class="arrow"
                                                         src="<?php echo get_template_directory_uri() . '/assets/svg/purp-arrow.svg'; ?>"
                    </button>
                </form>
            </div>
            <div class="container-short footer-success">
                <div class="footer__subscriber-title">Thanks for subscribing to our newsletter!</div>
                <div class="footer__subscriber-subtitle">You will be the first to know about our news</div>

            </div>


            <img  data-wow-iteration="infinite" data-wow-delay="1s" data-wow-duration="2s" class="footer__subscriber-hello wow animate__wobble" src="<?php echo get_template_directory_uri() . '/assets/svg/hello-hand.svg'; ?>" alt="hello">
            <img data-wow-duration="1s"  class="footer__subscriber-success wow animate__bounce" src="<?php echo get_template_directory_uri() . '/assets/svg/success-hand.svg'; ?>" alt="success">

        </div>
    </div>
</footer>