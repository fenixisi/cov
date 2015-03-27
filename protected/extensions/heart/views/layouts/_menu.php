<?php
$currController 	= Yii::app()->controller->id;
$currControllers	= explode('/', $currController);
$currAction			= Yii::app()->controller->action->id;
$currRoute 			= Yii::app()->controller->getRoute();
$currRoutes			= explode('/', $currRoute);

$menu=array(
		array('label'=>'Home', 'url'=>array('/site/index'), 'icon'=>'fa fa-home', 'visible'=>!Yii::app()->user->isGuest,'active'=>($currController=='site' and $currAction=='index' )),
		array('label'=>'Admin', 'url'=>'#', 'icon'=>'fa fa-gear', 'visible'=>!Yii::app()->user->isGuest, 'active'=> false ,'items'=>array(
			array('label'=>'Generator Code', 'url'=>array('/gii/heart'), 'icon'=>'fa fa-refresh fa-fw', 'visible'=>!Yii::app()->user->isGuest),)),
                array('label'=>'Personal', 'url'=>array('/perPersonal/admin'), 'icon'=>'fa fa-user', 'visible'=>((yii::app()->user->getState('tipo')== 1))),
                array('label'=>'Otros', 'url'=>array('/sysCatalogo/admin'), 'icon'=>'fa fa-home', 'visible'=>((yii::app()->user->getState('tipo')== 1))),                       
	);	
?>	