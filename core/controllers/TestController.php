<?php
namespace core\controllers;


use Yii;
use yii\rest\Controller;
use core\entities\Test;
use app\core\models\Once1;
use app\core\models\Lottery;
use app\core\models\WinsCombinations;
use thamtech\uuid\helpers\UuidHelper;
use thamtech\uuid\helpers\UuidValidator;

abstract class TestController extends Controller
{
	public function beforeAction($action)
	{
		$parent = parent::beforeAction($action);
		Yii::$app->response->format = "json";
		return $parent;
	}

	public function actionIndex($id = 1, $value = "none")
	{
		$uuid = UuidHelper::uuid();
		var_dump($uuid);die;
		return new Test($id, $value);
	}

	public function actionGenerate($lottery)
	{
		die;
		Yii::$app->response->format = "html";
		// echo 1;die;
		$available_values = ['5000','10000','15000','20000','25000','40000','75000','500000'];
		$r = $this->getLooseArrayForLottery(9,3,$available_values,0);
		// var_dump($r);die;
		$combinations = WinsCombinations::find()->where(['lottery_id'=>$lottery])->all();
		foreach($combinations as $comb){
			for($i=0;$i<$comb->count;$i++){
				$model = new Once1();
				$model->guid = UuidHelper::uuid();
				$model->result = $comb->value;

				$r = $this->getWinArrayForLottery(9,3,$available_values,$comb->value);
				$model->val1 = $r[0];
				$model->val2 = $r[1];
				$model->val3 = $r[2];
				$model->val4 = $r[3];
				$model->val5 = $r[4];
				$model->val6 = $r[5];
				$model->val7 = $r[6];
				$model->val8 = $r[7];
				$model->val9 = $r[8];

				if($model->save()){
					continue;
				}
				else{
					var_dump($model->errors);
					$i--;
				}
			}
		}
		$lot_model = Lottery::findOne($lottery);
		$wincount = WinsCombinations::find()->where(['lottery_id'=>$lottery])->sum('count');
		$loose_count = $lot_model->max_count-$wincount;
		// var_dump($loose_count);die;
		for ($i=0; $i < $loose_count; $i++) { 
				$model = new Once1();
				$model->guid = UuidHelper::uuid();
				$model->result = 'You loose';

				$r = $this->getLooseArrayForLottery(9,3,$available_values,0);
				$model->val1 = $r[0];
				$model->val2 = $r[1];
				$model->val3 = $r[2];
				$model->val4 = $r[3];
				$model->val5 = $r[4];
				$model->val6 = $r[5];
				$model->val7 = $r[6];
				$model->val8 = $r[7];
				$model->val9 = $r[8];

				if($model->save()){
					continue;
				}
				else{
					var_dump($model->errors);
					$i--;
				}
		}

		echo "SUCCESS";die;

		
	}

	private function getWinArrayForLottery($length,$count_win,$available_values,$win_value)
	{
		for ($i=0; $i < $count_win; $i++) { 
			$arr[$i] = $win_value;
		}
		$avail_arr = array_diff($available_values,[$win_value]);
		$al = count($avail_arr);
		for ($i=$count_win; $i < $length; $i++) {
			$rand = rand(0,$al);
			if(isset($avail_arr[$rand])){
				$prev_value = $avail_arr[$rand];	
			}
			else{
				$rand--;
				if(isset($avail_arr[$rand])){
					$prev_value = $avail_arr[$rand];
				}
				else{
					$rand+=2;
					$prev_value = $avail_arr[$rand];
				}
			}
			
			$check_arr = array_count_values($arr);
			if(!isset($check_arr[$prev_value])||$check_arr[$prev_value]<2){
				$arr[$i] = $prev_value;	
			}
			else{
				$i--;
			}
			
		}
		shuffle($arr);
		return $arr;
	}

	private function getLooseArrayForLottery($length,$count_win,$available_values,$win_value)
	{
		$al = count($available_values);
		$arr=[];
		for ($i=0; $i < $length; $i++) {
			$rand = rand(0,$al);
			if(isset($available_values[$rand])){
				$prev_value = $available_values[$rand];	
			}
			else{
				$rand--;
				if(isset($available_values[$rand])){
					$prev_value = $available_values[$rand];
				}
				else{
					$rand+=2;
					$prev_value = $available_values[$rand];
				}
			}
			
			$check_arr = array_count_values($arr);
			if(!isset($check_arr[$prev_value])||$check_arr[$prev_value]<2){
				$arr[$i] = $prev_value;	
			}
			else{
				$i--;
			}
		}
		shuffle($arr);
		return $arr;
	}

	public function actionPlay()
	{
		Yii::$app->response->format = "html";
		$ticket = Once1::find()->where(['is_used' => Once1::STATUS_NOT_USED])->orderBy('rand()')->one();
		// var_dump($ticket);die;
		return $this->render('play',['ticket'=>$ticket]);
	}

}
