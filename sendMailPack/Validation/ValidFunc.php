<?php
class ValidFunc
{
    public function isNull($val)
    {
        if ($val === '' || $val ===' ' || $val === '　') {
            $messege = 'この項目は入力必須です。';
        } else {
            $messege = '';
        }

        return $messege;
    }

    public function maxText($val, $max)
    {
        if (mb_strlen($val) > $max) {
            $messege = $max . '文字以内でご入力ください。';
        } else {
            $messege = '';
        }

        return $messege;
    }

    public function isEmail($val)
    {
        $pattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/uiD';
        if (!preg_match($pattern, $val)) {
            $messege = 'メールアドレスを正しくご入力ください';
        } else {
            $messege = '';
        }

        return $messege;
    }

    public function verify($val, $target)
    {
        if ($val != $target) {
            $messege = '入力データが一致しません';
        } else {
            $messege = '';
        }

        return $messege;
    }

    public function isTel($val)
    {
        $pattern = '/\A\(?\d{2,5}\)?[-(\.\s]{0,2}\d{1,4}[-)\.\s]{0,2}\d{3,4}\z/u';        
        if (!preg_match($pattern, $val)) {
            $messege = '電話番号を正しくご入力ください';
        } else {
            $messege = '';
        }

        return $messege;
    }
}
