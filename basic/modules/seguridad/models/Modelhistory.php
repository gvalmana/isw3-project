<?php

namespace app\modules\seguridad\models;

use Yii;

/**
 * This is the model class for table "modelhistory".
 *
 * @property int $id
 * @property string $date
 * @property string $table
 * @property string $field_name
 * @property string $field_id
 * @property string $old_value
 * @property string $new_value
 * @property int $type
 * @property string $user_id
 */
class Modelhistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modelhistory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'table', 'field_name', 'field_id', 'type', 'user_id'], 'required'],
            [['date'], 'safe'],
            [['old_value', 'new_value'], 'string'],
            [['type'], 'integer'],
            [['table', 'field_name', 'field_id', 'user_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Fecha',
            'table' => 'Modelo',
            'field_name' => 'Atributo',
            'field_id' => 'ID del Modelo',
            'old_value' => 'Valor antiguo',
            'new_value' => 'Nuevo valor',
            'type' => 'Cambio',
            'user_id' => 'Usuario',
        ];
    }
}
