// メニューボタン
$(function () {
    //　ボタンクリックで開閉
    $('#menu_button').click(function () {
        $(this).next('#menu_list').stop(true, true).slideToggle();
    });
    //　画面をクリックで閉じる
    $(document).on("touchstart click", function (e) {
        if (!$(e.target).is('#menu_button, #menu_list')) {
            var windowSize = $(window).width();
            if ($('#menu_list').is(':visible') && windowSize < 768) {
                $('#menu_list').slideUp();
            }
        }
    });
    //　親要素への伝搬を無効にする（画面クリック判定用）
    $(document).on('touchstart click', '#menu_button', function (e) {
        e.stopPropagation();
    })

    //　ウィンドウサイズがモバイル幅を超えた場合、メニューを戻す
    $(window).on('resize', function () {
        var windowSize = $(window).width();
        if (windowSize > 768) {
            $('#menu_list').show();
        } else {
            $('#menu_list').hide();
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
        'width': circle_size,
        'height': circle_size
    });

    // サークルサイズを大きくしていく
    let count = 0;
    const countUp = () => {
        count++;

        $('.open_circle').css({
            'background': `radial-gradient(rgba(255,255,255,0) ${count}%, rgba(255,255,255,1) ${count + 5}%)`
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