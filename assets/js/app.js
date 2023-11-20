
document.addEventListener('DOMContentLoaded', function () {

});


$(document).ready(function () {




    ///////////Swiper

    const postSwiper = new Swiper('.similarPosts', {
        slidesPerView: 1,
        spaceBetween: 40,
        autoplay: {
            delay: 5000,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },

        }
    })


    ////Header
    function dropDawnMenu() {
        if ($mainNav.is(':visible')) {
            $headerCompany.removeClass('active');

            $mainNav.find('li').each(function (index) {
                $(this).delay(100 * index).fadeOut(400, function () {
                    if (index === $mainNav.find('li').length - 1) {
                        $mainNav.hide();
                    }
                });
            });
        } else {
            $headerCompany.addClass('active');
            $mainNav.find('li').each(function (index) {
                $(this).delay(100 * index).fadeIn(400);
            });
            $mainNav.show();
        }
    }

    let $headerCompany = $('.header__company');
    let $mainNav = $('.main-nav');

    $mainNav.find('li').each(function (index) {
        $(this).fadeOut()
    });
    $headerCompany.on('click', function () {
        dropDawnMenu()
    });


    ///// Animated Text
    const classesToAnimate = ['.blog__item', '.post__similar-item'];

    function handleHoverForClasses() {
        classesToAnimate.forEach(function (className) {
            $(className).hover(
                function () {
                    $(this).find('.animated-link').trigger('mouseenter');
                },
                function () {
                    $(this).find('.animated-link').trigger('mouseleave');
                }
            );
        });
    }

    handleHoverForClasses();

    function getRandomLetter() {
        const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return alphabet[Math.floor(Math.random() * alphabet.length)];
    }

    $('.animated-link').each(function () {
        let originalText = $(this).text().trim();
        $(this).data('original-text', originalText);
    });

    $('.animated-link').hover(
        function () {
            let aLink = this;
            let originalText = $(this).data('original-text');
            let letters = originalText.split('');

            $(this).html('');

            $.each(letters, function (index, letter) {
                let span;
                if (letter === ' ') {
                    span = $('<span class="space">&nbsp;</span>');
                } else {
                    span = $('<span>' + letter + '</span>');
                }

                $(aLink).append(span);

                let newLetter = getRandomLetter();

                setTimeout(function () {
                    span.text(newLetter);
                    setTimeout(function () {
                        span.text(letter);
                    }, 200);
                }, index * 150);
            });
        },
        function () {
            let originalText = $(this).data('original-text');
            $(this).html(originalText);
        }
    );


    /////Video controllers
    let $videoPlayers = $('video');

    $videoPlayers.each(function () {
        let timer;
        let $customContainer = $('<div class="custom-container"></div>');
        let $controlsContainer = $('<div class="custom-controls"></div>');
        let $playPauseButton = $('<button class="play-btn"></button>');
        let $playIcon = $('<img src="http://www.teriv-mykola.site/wp-content/uploads/2023/11/bi_play-fill.webp" alt="Play">');
        let $pauseIcon = $('<img src="http://www.teriv-mykola.site/wp-content/uploads/2023/11/carbon_pause-filled.webp" alt="Pause">');
        let video = $(this)[0];

        $playPauseButton.append($playIcon);

        function showControls() {
            $controlsContainer.stop(true, true).fadeIn();
            clearTimeout(timer);
            timer = setTimeout(function () {
                $controlsContainer.fadeOut();
            }, 2000);
        }

        $playPauseButton.on('click', function () {
            if (video.paused || video.ended) {
                video.play();
                $(this).empty().append($pauseIcon);
            } else {
                video.pause();
                $(this).empty().append($playIcon);
            }
        });

        $videoPlayers.on('mousemove', function () {
            showControls();
        });

        $controlsContainer.append($playPauseButton);

        $customContainer.insertAfter($(this));
        $(this).appendTo($customContainer);
        $customContainer.append($controlsContainer);

        timer = setTimeout(function () {
            $controlsContainer.fadeOut();
        }, 2000);
    });

    //Post h3 counter


    $('.post__body h3').each(function (index) {
        $(this).before('<span class="count">' + (index + 1) + '. </span>');
    });


    ////////Time Dropdown

    $(".blog__filter-time ul li").each(function () {
        $(this).fadeOut();
    });

    $(".blog__filter-time #selectedOption").click(function () {
        if ($(".blog__filter-time ul").is(":visible")) {
            $(".blog__filter-time ul li").each(function (index) {
                $(this).delay(100 * index).fadeOut(400, function () {
                    if (index === $(".blog__filter-time ul li").length - 1) {
                        $(".blog__filter-time ul").hide();
                    }
                });
            });
            $(".blog__filter-time #selectedOption").removeClass('active');
        } else {
            $(".blog__filter-time ul li").each(function (index) {
                $(this).delay(100 * index).fadeIn(400);
            });
            $(".blog__filter-time #selectedOption").addClass('active');
            $(".blog__filter-time ul").show();
        }
    });


    $(".blog__filter-time ul li a").click(function () {
        if ($(this).is('[disabled]')) {
            return false;
        }
        let selectedOptionText = $(this).text();
        $("#selectedOption").text(selectedOptionText);

        $(".blog__filter-time ul li a").removeAttr("disabled");
        $(this).attr("disabled", "true");

        $(".blog__filter-time ul").hide();
    });


    /////SOON TEXT


    $('.soon').on('click', function () {
        var buttonText = $(this).text();
        var button = $(this);

        // Міняємо текст кнопки
        button.text('SOON');

        // Повертаємо оригінальний текст через 3 секунди
        setTimeout(function () {
            button.text(buttonText);
        }, 1000);
    });


    /////////SVG ANIMATION

    const inputArrow = new Vivus(
        'input-arrow',
        {
            type: 'delayed',
            duration: 100,
        },
    );

    $('input#email').hover(function () {
        inputArrow.reset();
        inputArrow.play();
    });
});
new WOW().init();

