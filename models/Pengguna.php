<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property integer $nomor_telpon
 * @property string $username
 * @property string $password
 * @property string $role
 * @property integer $tim
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Tim $tim0
 */
class Pengguna extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'pengguna';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nama', 'username', 'password', 'role'], 'required'],
            [['alamat'], 'string'],
            [['nomor_telpon', 'tim'], 'integer'],
            [['nama'], 'string', 'max' => 200],
            [['username', 'password', 'role'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['auth_key', 'access_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'nomor_telpon' => 'Nomor Telpon',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'tim' => 'Tim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTim0() {
        return $this->hasOne(Tim::className(), ['id' => 'tim']);
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {
        return $this->auth_key == $authKey;
    }

    public function validatePassword($password) {
        return $this->password == $password;
    }

    public static function findIdentity($id) {
        return self::findOne(['id' => $id]);
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

}
