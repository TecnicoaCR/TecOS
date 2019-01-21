(function ($) {
    'use strict';
    jQuery(document).ready(function ($) {
        jQuery('.loadmore-portfolio').on('click', function () {

            var id = $(this).data("id");
            var loadmore = jQuery('#br_portfolio_grid_' + id + " .loadmore-portfolio");
            var loading = jQuery('#br_portfolio_grid_' + id + " .loader");
            var paged = $(this).attr("data-paged");
            var column = $(this).attr("data-column");
            var max_paged = $(this).data("max-paged");
            var posts_per_page = $(this).data("posts-per-page");
            loadmore.hide();
            loading.show();

            jQuery.ajax({
                type: 'post',
                data: {
                    'action': 'brick_add_new_portfolio',
                    'id': id,
                    'paged': paged,
                    'column': column,
                    'posts_per_page': posts_per_page
                },
                url: brickPortfolioAjax.ajaxurl,
                success: function (msg) {
                    //alert(msg);
                    loading.hide();
                    loadmore.show();

                    if (msg != '') {

                        var portfolio_id = jQuery('#portfolio-grid-' + id);
                        var paged2 = parseInt(paged) + 1;
                        jQuery('#br_portfolio_grid_' + id + ' .loadmore-portfolio').attr("data-paged", paged2);
                        if (paged2 === max_paged) {
                            $('#br_portfolio_grid_' + id + ' .paging_more').hide();
                        }

                        var elem = jQuery(msg);
                        portfolio_id.isotope().append(elem)
                                .isotope('appended', elem)
                                .isotope('layout');
                        portfolio_id.isotope('layout');
                        setTimeout('jQuery(".portfolio-grid").isotope("layout")', 300);
                        //hoverder
                        if (jQuery('.hoverdir').length) {
                            jQuery('.hoverdir').each(function () {
                                jQuery(this).hoverdir({
                                    hoverElem: '.overlay'
                                });
                            });
                        }
                    } else {
                        $('#br_portfolio_grid_' + id + ' .paging_more').hide();
                    }
                }
            });
        });

    });
})(jQuery);