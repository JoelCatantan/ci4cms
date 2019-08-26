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
})
