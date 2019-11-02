<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nc_audit".
 *
 * @property int $id
 * @property string $gravedad
 * @property int $personal_detecta
 * @property int $auditor_jefe
 *
 * @property Noconformidad $id0
 * @property User $personalDetecta
 * @property User $auditorJefe
 */
class NcAudit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nc_audit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gravedad', 'personal_detecta', 'auditor_jefe'], 'required'],
            [['id', 'personal_detecta', 'auditor_jefe'], 'integer'],
            [['gravedad'], 'string', 'max' => 10],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Noconformidad::className(), 'targetAttribute' => ['id' => 'id']],
            [['personal_detecta'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['personal_detecta' => 'id']],
            [['auditor_jefe'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['auditor_jefe' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gravedad' => 'Gravedad',
            'personal_detecta' => 'Personal que detecta',
            'auditor_jefe' => 'Auditor jefe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoconformidad()
    {
        return $this->hasOne(Noconformidad::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDetecta()
    {
        return $this->hasOne(User::className(), ['id' => 'personal_detecta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorJefe()
    {
        return $this->hasOne(User::className(), ['id' => 'auditor_jefe']);
    }
}
