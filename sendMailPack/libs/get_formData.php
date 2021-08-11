<?PHP
// フォームデータ受け取り
$formData = (object)filter_input_array(INPUT_POST);

foreach ($formData as $key => $value) {

    // 不正な文字チェック
    if (!checkInput($value)) {
        $_SESSION['error']['error-' . $key] = '不正な文字が含まれています';
    } else {
        // セッションに保存
        $_SESSION['formData'][$key] = $value;

        // サニタイズ
        //$formData[$key] = hesc($value);
    }
}