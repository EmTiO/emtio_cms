<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container">         
<div class='navbar'>
            <div class='navbar-inner'>
		<?php
                    $this->widget('zii.widgets.CMenu',array(
			'items'=>Menu::model()->getMenu('mainmenu'),
                        'htmlOptions' => array('class'=>'nav'),));
                $this->widget('bootstrap.widgets.TbButtonGroup', array(
                     'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse' 
                     'htmlOptions'=>array('class'=>'pull-right'),
                     'buttons'=>array(
                                array('label'=>false,'icon'=>'icon-th-list icon-white', 'items'=>array(
                                array('label'=>'Личный кабинет','icon'=>'icon-briefcase', 'url'=>'/index.php/user/profile/','visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Регистрация', 'url'=>'/index.php/user/registration/','visible'=>Yii::app()->user->isGuest),    
                                array('label'=>'Панель администратора','icon'=>'icon-wrench','url'=>'/index.php/admin',),  
                                array('label'=>'Выход', 'url'=>'/index.php/user/logout/','visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Вход', 'url'=>'/index.php/user/login/','visible'=>Yii::app()->user->isGuest),
            )),
        ),
    ));    
                               ?> 
            </div>
</div>
	<!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                
	<?php echo $content; ?>
                
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by EmTiO.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
