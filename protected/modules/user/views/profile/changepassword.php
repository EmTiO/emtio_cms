<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");?>

<?php
    $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => 'Ваш профиль',
            'headerButtons'=>array(array(
                'class'=>'bootstrap.widgets.TbButtonGroup',
                'buttons'=>array(
                       array('label'=>'Настройки',
                           'items'=>array(
                       array('label'=>'Смена пароля', 'icon'=>'icon-file', 'url'=>'/index.php/user/profile/changepassword'),
                       array('label'=>'Редактировать', 'icon'=>'icon-pencil','url'=>'/index.php/user/profile/edit'),
                       array('label'=>'Выход', 'icon'=>'icon-remove','url'=>'/index.php/user/logout'),))),
                'type' => 'success',
            )),));
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
	<?php echo $form->labelEx($model,'oldPassword'); ?>
	<?php echo $form->passwordField($model,'oldPassword'); ?>
	<?php echo $form->error($model,'oldPassword'); ?>
	</div>
	
	<div class="row">
	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="row">
	<?php echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
	
	
	<div class="row submit">
	<?php echo CHtml::submitButton(UserModule::t("Save")); ?>
	</div>

<?php $this->endWidget(); ?>
<?php $this->endWidget();?>    
</div><!-- form -->