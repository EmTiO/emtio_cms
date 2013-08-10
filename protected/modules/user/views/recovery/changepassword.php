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

<?php echo CHtml::errorSummary($form); ?>
	
	<div class="row">
	<?php echo CHtml::activeLabelEx($form,'password'); ?>
	<?php echo CHtml::activePasswordField($form,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="row">
	<?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
	<?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>
	</div>
	
	
	<div class="row submit">
	<?php echo CHtml::submitButton(UserModule::t("Save")); ?>
	</div>

<?php $this->endWidget();?>
