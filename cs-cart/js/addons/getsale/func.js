(function (_, $) {
    $(document).on('click', 'button[type=submit][name^="dispatch[checkout.add"]', function () {
        if (!($(this).prop('name').match('checkout.add_'))) {
            $.ceEvent('one', 'ce.formajaxpost_' + $(this).parents('form').prop('name'), function (form, elm) {
                document.cookie = "GETSALE_ADD=Y; path=/;";
                console.log('cookie-ajax-add-to-cart');
            });
        };
    });

    $(document).on('click', 'button[name^="dispatch[checkout.add_profile"]', function () {
        $.ceEvent('one', 'ce.formajaxpost_' + $(this).parents('form').prop('name'), function (form, elm) {
            document.cookie = "GETSALE_REG=Y; path=/;";
            console.log('cookie-user-reg');
        });
    });

    $.ceEvent('on', 'ce.ajaxdone', function (elms, inline_scripts, params, data) {
        if (typeof data['html'] == 'object' && data['html']['product_quick_view']) {
            document.cookie = "GETSALE_IVIEW=Y; path=/;";
            console.log('cookie-ajax-item-view');
        }
    });
})(Tygh, Tygh.$);