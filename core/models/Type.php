<?php

namespace app\core\models;

use Yii;

/**
 * This is the model class for table "lot_type".
 *
 * @property int $id
 * @property string $title
 * @property int $is_active
 * @property string|null $create_date
 * @property string|null $mod_date
 * @property int $user_id
 * @property string $desc
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lot_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'desc'], 'required'],
            [['is_active', 'user_id'], 'integer'],
            [['create_date', 'mod_date'], 'safe'],
            [['desc'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'is_active' => 'Is Active',
            'create_date' => 'Create Date',
            'mod_date' => 'Mod Date',
            'user_id' => 'User ID',
            'desc' => 'Desc',
        ];
    }
}
