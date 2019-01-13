(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        /* Plus Qty */
        $(document).on('click', '.qty-plus', function () {
            var parent = $(this).parent();
            $('input.qty', parent).val(parseInt($('input.qty', parent).val()) + 1);
        })
        /* Minus Qty */
        $(document).on('click', '.qty-minus', function () {
            var parent = $(this).parent();
            if (parseInt($('input.qty', parent).val()) > 1) {
                $('input.qty', parent).val(parseInt($('input.qty', parent).val()) - 1);
            }
        })
    });
})(jQuery);