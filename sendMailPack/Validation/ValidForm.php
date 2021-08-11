<?php

require_once(dirname(__FILE__) . '/ValidFunc.php');

class ValidForm
{
    public $ValidFunc;

    public function __construct()
    {
        $this->ValidFunc = new ValidFunc();
    }

    public function Validation($datas, $rules)
    {
        $errormsg = [];

        foreach ($rules as $key => $params) {

            // 不正文字エラーが入ってる場合
            if (isset($_SESSION['form-error'][$key])) {
                // return用エラー配列に追加
                array_push($errormsg, [$key => '不正な文字が含まれています']);
            }

            foreach ($params as $param) {

                $param_arr = explode(':', $param);
                $msg = '';

                if (!(!in_array('required', $params) && $datas->$key === '')){ // 入力必須ではない項目が「空」の場合は除く
                    switch ($param_arr[0]) {
                        case 'required':
                            $msg = $this->ValidFunc->isNull($datas->$key);
                            break;
                        case 'max':
                            $msg = $this->ValidFunc->maxText($datas->$key, $param_arr[1]);
                            break;
                        case 'email':
                            $msg = $this->ValidFunc->isEmail($datas->$key);
                            break;
                        case 'verify':
                            $target = $param_arr[1];
                            $msg = $this->ValidFunc->verify($datas->$key, $datas->$target);
                            break;
                        case 'tel':
                            $msg = $this->ValidFunc->isTel($datas->$key);
                            break;
                    }
                }

                // エラーがあったら
                if ($msg != '') {

                    // 不正文字エラーが入っていない場合代入
                    if (!isset($_SESSION['form-error'][$key])) {
                        // セッションに保存
                        $_SESSION['form-error'][$key] = $msg;

                        // return用エラー配列に追加
                        array_push($errormsg, [$key => $msg]);
                    }
                    
                    break 1;
                }
            }
        }

        return $errormsg;
    }
}
