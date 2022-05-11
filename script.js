// handle links with @href started with '#' only
$(document).on('click', 'a[href^="#"]', function (e) {
    // target element id
    let id = $(this).attr('href');

    // target element
    let $id = $(id);
    if ($id.length === 0) {
        return;
    }

    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    let pos = $id.offset().top;

    // animated top scrolling
    $('body, html').animate({ scrollTop: pos });
});

