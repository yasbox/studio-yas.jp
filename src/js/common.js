// メニューボタン
$(function () {
    //　ボタンクリックで開閉
    $('#mobile_menu_btn').click(function () {
        $('#main-nav').stop(true, true).slideToggle();
    });
    //　画面をクリックで閉じる
    $(document).on("touchstart click", function (e) {
        if (!$(e.target).is('#mobile_menu_btn, #main-nav')) {
            var windowSize = $(window).width();
            if ($('#main-nav').is(':visible') && windowSize < 768) {
                $('#main-nav').slideUp();
            }
        }
    });
    //　親要素への伝搬を無効にする（画面クリック判定用）
    $(document).on('touchstart click', '#mobile_menu_btn', function (e) {
        e.stopPropagation();
    })

    //　ウィンドウサイズがモバイル幅を超えた場合、メニューを戻す
    $(window).on('resize', function () {
        var windowSize = $(window).width();
        if (windowSize > 768) {
            $('#main-nav').show();
        } else {
            $('#main-nav').hide();
        }
    });
});


// ローディングcircle
$(window).on('load', function () {

    // 最大サークルサイズ算出
    let circle_size = 0;
    if ($(window).width() > $(window).height()) {
        circle_size = $(window).width() * 1.5;
    } else {
        circle_size = $(window).height() * 1.5;
    }
    // サークルサイズ設定
    $('.open_circle').css({
        'min-width': circle_size,
        'min-height': circle_size
    });

    $('.loading_wrap').css({
        'background-color': 'transparent',
    });

    // サークルサイズを大きくしていく
    let count = 0;
    const countUp = () => {
        count++;

        $('.open_circle').css({
            'background': `radial-gradient(rgba(234,239,247,0) ${count}%, rgba(234,239,247,1) ${count + 5}%)`
        });
    }
    const intervalId = setInterval(() => {
        countUp();
        if (count > 100) {
            clearInterval(intervalId);
            $('.loading_wrap').hide();
        }
    }, 10);
});
