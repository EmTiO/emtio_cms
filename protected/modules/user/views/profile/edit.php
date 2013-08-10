<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

<?php
    $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => 'Редактирование профиля',
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
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'profile-form',
    'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

        
<?php 
    $profileFields=$profile->getFields();
        if ($profileFields) {
			foreach($profileFields as $field) { ?>
	
		<?php 
		
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
                        echo $form->textAreaRow($profile,$field->varname,array('class'=>'span8', 'rows'=>6, 'cols'=>50));
		} else {
                        echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			
		}}} ?>
	
                <?php echo $form->textFieldRow($model,'username',array('size'=>20,'maxlength'=>20));?></br>
                
		<?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128));?></br>
                <?php echo $form->fileFieldRow($profile, 'avatar',array('labelOptions' => array('label' => 'Avatar'))); ?></br>
                <?php $this->widget('bootstrap.widgets.TbButton', array('type' => 'info','buttonType'=>'submit', 'label'=>$model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'))); ?>

<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>
