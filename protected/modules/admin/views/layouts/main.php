<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

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
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3 well">
       <?php $this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'list',
            'items' => array(
            array('label'=>'Главная', 'url'=>'#', 'itemOptions'=>array('class'=>'active')),
	    array('label'=>'Меню', 'itemOptions'=>array('class'=>'nav-header')),
                array('label'=>'Управление пунктами', 'url'=>'#'),
                array('label'=>'Добавить', 'url'=>'#','icon'=>'icon-plus-sign'),
            array('label'=>'Новости', 'itemOptions'=>array('class'=>'nav-header')),
                array('label'=>'Управление новостями', 'url'=>'#'),
                array('label'=>'Добавить', 'url'=>'#','icon'=>'icon-plus-sign'),
            array('label'=>'Статьи', 'itemOptions'=>array('class'=>'nav-header')),
                array('label'=>'Управление статьями', 'url'=>'#'),
                array('label'=>'Добавить', 'url'=>'#','icon'=>'icon-plus-sign'),
            array('label'=>'Пользователи', 'itemOptions'=>array('class'=>'nav-header')),
                array('label'=>'Управление пользователями', 'url'=>'/index.php/admin/user'),
                array('label'=>'Добавить', 'url'=>'/index.php/admin/user/create','icon'=>'icon-plus-sign'),
            array('label'=>'Комментарии', 'itemOptions'=>array('class'=>'nav-header')),
                array('label'=>'Управление комментариями', 'url'=>'#'),
                array('label'=>'Добавить', 'url'=>'#','icon'=>'icon-plus-sign'),
            array('label'=>'Галерея', 'itemOptions'=>array('class'=>'nav-header')),
	    array('label'=>'Настройки', 'itemOptions'=>array('class'=>'nav-header')),
                array('label'=>'Управление', 'url'=>'#'),
            array('label'=>'Информационные страницы', 'itemOptions'=>array('class'=>'nav-header')),
                
    )
));
?>   
    </div>
    <div class="span9">
        <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                
        <?php echo $content; ?>
                
	<div class="clear"></div>
    </div>
    </div>
  </div>    

</body>
</html>
