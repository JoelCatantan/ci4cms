$(function() {
    $('.left-nav-part ul').css({height: 0})
    let lefT_nav_clickables = $('.left-nav-part a[href="#"]')
    lefT_nav_clickables.click(function(e) {
        e.preventDefault()
        let menu_to_collapse = $(this).next('ul')
        if (menu_to_collapse.hasClass('active')) {
            closeChildrensSubmenu(this)
            menu_to_collapse.css({height: menu_to_collapse.outerHeight() + 'px'})
            setTimeout(function() {
                menu_to_collapse.css({height: 0}).removeClass('active')
            }, 50)
        } else {
            closeChildrensSubmenu(this)
            let height = 0
            menu_to_collapse.addClass('active').children().each(function() {
                height += $(this).outerHeight()
            })
            menu_to_collapse.css({height})
            setTimeout(function() {
                menu_to_collapse.css({height: 'auto'})
            }, 300)
        }
        function closeChildrensSubmenu(elem) {
            let elems = $(elem).parent().parent('ul').find('.active')
            elems.css({height: elems.outerHeight() + 'px'})
            setTimeout(function() {
                elems.css({height: 0}).removeClass('active')
            }, 50)
        }
    })
})
