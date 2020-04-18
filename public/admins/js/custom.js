/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

window.mobilecheck() ? $("body").removeClass('use-nicescroll') : '';

$(".use-nicescroll").niceScroll({
    cursorcolor: "rgb(248,148,6)",
    cursorwidth: "8px",
    background: "rgba(222, 222, 222, .75)",
    cursorborder: 'none',
    autohidemode: 'leave',
    zindex: 1,
});

function progress() {

    var windowScrollTop = $(window).scrollTop();
    var docHeight = $(document).height();
    var windowHeight = $(window).height();
    var progress = (windowScrollTop / (docHeight - windowHeight)) * 100;
    var $bgColor = progress > 99 ? '#ff9a06' : '#f89406';
    var $textColor = progress > 99 ? '#fff' : '#333';

    $('.progress .bar').width(progress + '%').css({backgroundColor: $bgColor});
    // $('h1').text(Math.round(progress) + '%').css({color: $textColor});
    $('.fill').height(progress + '%').css({backgroundColor: $bgColor});
}

progress();

$(document).on('scroll', progress);
