<?php

namespace app\core\models;

use Yii;

/**
 * This is the model class for table "once1".
 *
 * @property string $guid
 * @property string|null $val1
 * @property string|null $val2
 * @property string|null $val3
 * @property string|null $val4
 * @property string|null $val5
 * @property string|null $val6
 * @property string|null $val7
 * @property string|null $val8
 * @property string|null $val9
 * @property string|null $result
 * @property int $is_used
 */
class Once1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const STATUS_NOT_USED = 0;
    const STATUS_USED = 1;
    public static function tableName()
    {
        return 'once1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guid'], 'required'],
            [['is_used'], 'integer'],
            [['guid', 'val1', 'val2', 'val3', 'val4', 'val5', 'val6', 'val7', 'val8', 'val9'], 'string', 'max' => 40],
            [['result'], 'string', 'max' => 255],
            [['guid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guid' => 'Guid',
            'val1' => 'Val1',
            'val2' => 'Val2',
            'val3' => 'Val3',
            'val4' => 'Val4',
            'val5' => 'Val5',
            'val6' => 'Val6',
            'val7' => 'Val7',
            'val8' => 'Val8',
            'val9' => 'Val9',
            'result' => 'Result',
            'is_used' => 'Is Used',
        ];
    }
}
