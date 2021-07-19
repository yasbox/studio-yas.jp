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
