$(function() {
    let body = $('body')
    $('.left-menu-toggle').click(function() {
        if (body.hasClass('mini-left-menu')) {
            body.removeClass('mini-left-menu')
            $('.profile-info').removeAttr('style')
        } else {
            body.addClass('mini-left-menu')
            setTimeout(() => {
                $('.profile-info').css({
                    '--webkit-transition': 'top .4s, opacity .4s, visibility .4s',
                    transition: 'top .4s, opacity .4s, visibility .4s',
                })
            }, 400)
        }
    })

    $('.profile-part').click(function() {
        let profile_part = $(this)
        if (profile_part.hasClass('profile-part-active')) {
            profile_part.removeClass('profile-part-active')
        } else {
            profile_part.addClass('profile-part-active')
        }
    })

    fixedHeight()
    $(window).resize(fixedHeight)
    function fixedHeight() {
        let window_height = $(window).height()
        $('main').css({'min-height': window_height + 'px'})
        $('.right-nav-content').css({height: (window_height - 100) + 'px'})
    }

    $('.right-nav-part-icon a').click(function() {
        let is_selected = $(this).hasClass('active')

        $('.right-nav-part-icon a.active').removeClass('active')
        $('.right-nav-part-icon.active').removeClass('active')
        $('.right-nav-container.active').removeClass('active')
        $('.right-nav-content > div.active').removeClass('active')

        if (!is_selected) {
            let selected_container = $(this).data('targetContainer')
            $(`.${selected_container}-container`).addClass('active')
            $(this).addClass('active')
            $('.right-nav-part-icon').addClass('active')
            $('.right-nav-container').addClass('active')
        }
    })
})
