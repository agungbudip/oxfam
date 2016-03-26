<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class ForgotForm extends Model {

    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // email and password are both required
            [['email'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
        ];
    }

}
