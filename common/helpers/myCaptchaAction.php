<?php
/**
 * Created by PhpStorm.
 * User: pashaevs
 * Date: 19.01.15
 * Time: 2:52
 */

namespace common\helpers;

use yii\captcha\CaptchaAction;

class myCaptchaAction extends CaptchaAction {

    /**
     * Generates a new verification code.
     * @return string the generated verification code
     */
    protected function generateVerifyCode()
    {
        if ($this->minLength > $this->maxLength) {
            $this->maxLength = $this->minLength;
        }
        if ($this->minLength < 3) {
            $this->minLength = 3;
        }
        if ($this->maxLength > 20) {
            $this->maxLength = 20;
        }
        $length = mt_rand($this->minLength, $this->maxLength);

        $letters='1234567890';
        $code = '';
        for($i=0;$i<$length;++$i)
        {
            $code.=$letters[mt_rand(0, strlen($letters)-1)];
        }
        return $code;
    }

}