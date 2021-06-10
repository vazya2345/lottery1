<?php

namespace app\core\models;

use Yii;

/**
 * This is the model class for table "lot_wins_combinations".
 *
 * @property int $id
 * @property int $lottery_id
 * @property int $count
 * @property string $value
 */
class WinsCombinations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lot_wins_combinations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lottery_id', 'count', 'value'], 'required'],
            [['lottery_id', 'count'], 'integer'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lottery_id' => 'Lottery ID',
            'count' => 'Count',
            'value' => 'Value',
        ];
    }
}
