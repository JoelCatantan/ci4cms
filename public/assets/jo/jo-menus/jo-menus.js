$(() => {
    $.jo_menu = {
        selector: '.jo-menu',
        animationSpeedMS: 300,
        link_icon_default: 'fa fa-plus-square',
        link_icon_collapsed: 'fa fa-minus-square',
        link_secondary_bullet_icon: 'fa fa-angle-double-right',
    }

    let jo_menu = $(`${$.jo_menu.selector} > ul`)
    let animationSpeedMS = $.jo_menu.animationSpeedMS / 1000

    jo_menu
        .find('ul > li > ul > li > a')
        .prepend(`<i class="${$.jo_menu.link_secondary_bullet_icon}"></i>`)

    jo_menu
        .find('ul')
        .css({
            height: 0,
            '-webkit-transition':
                `-webkit-height ${animationSpeedMS}s, ` +
                `-webkit-opacity ${animationSpeedMS}s, ` +
                `-webkit-visibility ${animationSpeedMS}s`,
            transition:
                `height ${animationSpeedMS}s, ` +
                `opacity ${animationSpeedMS}s, ` +
                `visibility ${animationSpeedMS}s`
        })
        .addClass('jo-submenu')

    jo_menu
        .find('a[href="#"]')
        .addClass('jo-link')
        .append(`<i class="jo-collapse-icon ${$.jo_menu.link_icon_default}"></i>`)
        .click(function(e) {
            e.preventDefault()

            let clicked_link = $(this)
            let submenu_to_toggle = clicked_link.next('.jo-submenu')
            let is_collapsed_already = submenu_to_toggle.hasClass('jo-submenu--collapsed')
            let submenu = clicked_link.parent().parent()
            let collapsables = submenu.find('.jo-submenu--collapsed')
            let link_icon = `${$.jo_menu.link_icon_default} ${$.jo_menu.link_icon_collapsed}`

            if (!is_collapsed_already) {
                let height = 0
                clicked_link.addClass('jo-link--active')
                submenu_to_toggle
                    .addClass('jo-submenu--collapsed')
                    .children()
                    .each((index, elem) => {
                        height += $(elem).outerHeight()
                    })
                    .promise()
                    .then(() => {
                        submenu_to_toggle.css({height})
                    })

                setTimeout(() => {
                    submenu_to_toggle.css({height: 'auto'})
                }, $.jo_menu.animationSpeedMS)
            }

            collapsables
                .css({height: collapsables.outerHeight() + 'px'})
                .promise()
                .then(() => {
                    collapsables
                        .css({height: 0})
                        .removeClass('jo-submenu--collapsed')
                })

            submenu
                .find('.jo-link--active')
                .removeClass('jo-link--active')
                .promise()
                .then(() => {
                    if (!is_collapsed_already) {
                        clicked_link.addClass('jo-link--active')
                    }
                })

            submenu
                .find('.jo-collapse-icon--collapsed')
                .toggleClass(link_icon)
                .removeClass('jo-collapse-icon--collapsed')
                .promise()
                .then(function() {
                    if (!is_collapsed_already) {
                        clicked_link
                            .find('.jo-collapse-icon')
                            .addClass('jo-collapse-icon--collapsed')
                            .toggleClass(link_icon)
                    }
                })
        })
})
