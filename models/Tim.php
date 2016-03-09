<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tim".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Pengguna[] $penggunas
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
            [['id', 'nama'], 'required'],
            [['id'], 'integer'],
            [['nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenggunas()
    {
        return $this->hasMany(Pengguna::className(), ['tim' => 'id']);
    }
}
