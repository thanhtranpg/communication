<?php

require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
$airport= System::getParam('airport');
$airport_price= System::getParam('airport_price');
$car_pick_up_check= System::getParam('car_pick_up_check');
$car_pick_up_check_price= System::getParam('car_pick_up_check_price');
$total_price= System::getParam('total_price');


if($airport=='yes') {
$total_price += $airport_price;

}




if($car_pick_up_check=='yes') 
$total_price +=$car_pick_up_check_price;



echo $total_price;
?>