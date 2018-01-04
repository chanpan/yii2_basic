<?php

namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property integer $user_id
 * @property string $fname
 * @property string $lname
 * @property string $sex
 * @property string $address
 * @property string $tel
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['address'], 'string'],
            [['fname', 'lname', 'tel'], 'string', 'max' => 100],
            [['sex'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'fname' => Yii::t('app', 'Fname'),
            'lname' => Yii::t('app', 'Lname'),
            'sex' => Yii::t('app', 'Sex'),
            'address' => Yii::t('app', 'Address'),
            'tel' => Yii::t('app', 'Tel'),
        ];
    }
}
