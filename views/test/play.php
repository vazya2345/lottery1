<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Добро пожаловать в игру!';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Попытай свою удачу! Найди три одинаковых приза и выигрывай!
    </p>

<div class="lottery_body">
    <div class="row myrow">
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val1 ?></span></div>
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val2 ?></span></div>
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val3 ?></span></div>    
    </div>
    <div class="row myrow">
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val4 ?></span></div>
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val5 ?></span></div>
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val6 ?></span></div>
    </div>
    <div class="row myrow">
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val7 ?></span></div>
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val8 ?></span></div>
        <div class="col-lg-4 lot_elem hid1"><span><?= $ticket->val9 ?></span></div>
    </div>
</div>


<?php
if($ticket->result=='You loose'){
    echo '<div id="result">Ваш выигрыш: <span class="loose">'.$ticket->result.'</span></div>';
}
else{
    echo '<div id="result">Ваш выигрыш: <span class="win">'.$ticket->result.'</span></div>';
}
?>

</div>


<style type="text/css">
    .lot_elem{
        width: 100px;
        height: 100px;
        background: silver;
        margin: 20px;
        text-align: center;
        padding: 40px 0;
        cursor: pointer;
    }
    .lot_elem span{
        vertical-align: middle;
        display: none;
    }
    #result{
        display: none;
    }
    #result span{
        font-size: 30px;
    }
    #result .loose{
        color: red;
    }
    #result .win{
        color: green;
    }


</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(function(){
    $(".lot_elem").on("click", function(){
        $(this).children().show();
        $(this).removeClass('hid1');
        if($(this).children().html()=='<?=$ticket->result?>'){
            $(this).addClass('winclass');    
        }
        else{
            $(this).addClass('looseclass');   
        }
        
        if($('.hid1').length==0){
            Result();
        }
    });
});
function Result(){
    $('#result').show();
    $('.looseclass').css('background-color', 'red');
    $('.winclass').css('background-color', 'green');

}
</script>