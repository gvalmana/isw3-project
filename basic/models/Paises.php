<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Paises".
 *
 * @property string $Codigo
 * @property string $Pais
 */
class Paises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Paises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Codigo', 'Pais'], 'required'],
            [['Codigo'], 'string', 'max' => 2],
            [['Pais'], 'string', 'max' => 100],
            [['Codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Codigo' => 'Codigo',
            'Pais' => 'Pais',
        ];
    }
}
