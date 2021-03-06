<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tim".
 *
 * @property integer $id
 * @property string $tim
 */
class Tim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tim'], 'required'],
            [['tim'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tim' => 'Tim',
        ];
    }
}
