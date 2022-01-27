<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phone".
 *
 * @property int $id
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $phone1
 * @property string|null $telegram
 * @property string|null $email
 */
class Phone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'string', 'max' => 255],
            [['phone', 'phone1'], 'string', 'max' => 20],
            [['phone', 'phone1'], 'match', 'pattern' => '/\+[9][9][8] [0-9][0-9] [0-9][0-9][0-9] [0-9][0-9] [0-9][0-9]/'],
            [['telegram'], 'string', 'max' => 50],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address' => 'Manzil',
            'phone' => 'Telefon nomer',
            'phone1' => 'Telefon nomer',
            'telegram' => 'Telegram',
            'email' => 'Email',
        ];
    }
}
