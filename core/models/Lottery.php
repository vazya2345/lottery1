<?php

namespace app\core\models;

use Yii;

/**
 * This is the model class for table "lot_lottery".
 *
 * @property int $id
 * @property string $title
 * @property int $type_id
 * @property int $is_active
 * @property string|null $info
 * @property string|null $offer
 * @property string|null $date_begin
 * @property string|null $date_end
 * @property int|null $max_count
 */
class Lottery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lot_lottery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type_id'], 'required'],
            [['type_id', 'is_active', 'max_count'], 'integer'],
            [['info'], 'string'],
            [['date_begin', 'date_end'], 'safe'],
            [['title', 'offer'], 'string', 'max' => 255],
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
            'type_id' => 'Type ID',
            'is_active' => 'Is Active',
            'info' => 'Info',
            'offer' => 'Offer',
            'date_begin' => 'Date Begin',
            'date_end' => 'Date End',
            'max_count' => 'Max Count',
        ];
    }
}
