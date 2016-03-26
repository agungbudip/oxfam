<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property integer $id
 * @property string $nama
 * @property string $gambar
 * @property string $alamat
 * @property string $nomor_telpon
 * @property string $email
 * @property string $password
 * @property string $role
 * @property integer $tim
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Tim $tim0
 */
class Pengguna extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    public $file;

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
            [['nama', 'email', 'role'], 'required', 'message' => '{attribute} Tidak boleh kosong.'],
            [['password'], 'required', 'message' => '{attribute} Tidak boleh kosong.', 'on' => 'insert'],
            [['alamat', 'gambar', 'tim'], 'string'],
            [['nama', 'nomor_telpon'], 'string', 'max' => 200, 'message' => '{attribute} Maximal 200 karakter.'],
            [['email', 'password', 'role'], 'string', 'max' => 50, 'message' => '{attribute} Maximal 50 karakter.'],
            [['email'], 'unique', 'message' => 'Email sudah di gunakan'],
            //[['auth_key', 'access_token'], 'unique'],
            [['file'], 'file', 'skipOnEmpty' => TRUE, 'extensions' => 'png, jpg'],
            [['email'], 'email'],
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
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'tim' => 'Tim',
        ];
    }

    public function upload() {
        if (isset($this->file) && !$model->file->error) {
            $path = \Yii::$app->basePath . '/uploads/';
            $filename = $this->file->baseName . '.' . $this->file->extension;
            $index = 1;
            while (file_exists($path . $filename)) {
                $filename = $this->file->baseName . '_' . $index . '.' . $this->file->extension;
                $index++;
            }
            if ($this->file->saveAs($path . $filename)) {
                $this->gambar = '/uploads/' . $filename;
            }
            $this->file = NULL;
        }
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
        return $this->password == md5($password);
    }

    public static function findIdentity($id) {
        return self::findOne(['id' => $id]);
    }

    public static function findByUsername($email) {
        return static::findOne(['email' => $email]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

}
