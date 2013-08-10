<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Авторизация';
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'profile-form',
    'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions'=>array('class'=>'well span3 offset4'),
)); ?>
 
<?php echo $form->textFieldRow($model, 'username', array('labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'<i class="icon-user"></i>')).'</br>'; ?>
<?php echo $form->passwordFieldRow($model, 'password', array('labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'<i class="icon-briefcase"></i>')); ?>
<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('type' => 'info','buttonType'=>'submit', 'label'=>'Войти в систему')); ?>
 
<?php $this->endWidget(); ?>