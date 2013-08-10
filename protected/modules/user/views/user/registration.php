<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");?>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<?php
    $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => 'Редактирвоание профиля',
            'headerButtons'=>array(array(
                'class'=>'bootstrap.widgets.TbButtonGroup',
                'buttons'=>array(
                       array('label'=>'Настройки',
                           'items'=>array(
                       array('label'=>'Смена пароля', 'icon'=>'icon-file', 'url'=>'/index.php/user/profile/changepassword'),
                       array('label'=>'Редактировать', 'icon'=>'icon-pencil','url'=>'/index.php/user/profile/edit'),
                       array('label'=>'Выход', 'icon'=>'icon-remove','url'=>'/index.php/user/logout'),))),
                'type' => 'success',
            )),));?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'registration-form',
    'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));?>    
        
        <?php echo $form->textFieldRow($model, 'username', array('labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'<i class="icon-user"></i>')).'</br>'; ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'<i class="icon-briefcase"></i>')).'</br>';; ?>
        <?php echo $form->passwordFieldRow($model, 'verifyPassword', array('labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'<i class="icon-briefcase"></i>')).'</br>';; ?>
        <?php echo $form->textFieldRow($model, 'email', array('labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'<i class="icon-user"></i>')).'</br>'; ?>
        
        <?php 
	$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
		<?php echo $form->labelEx($profile,$field->varname); ?>
		
                <?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}?>
		
                <?php echo $form->error($profile,$field->varname); ?>	
        	<?php }} ?>
                
                <?php if (UserModule::doCaptcha('registration')): ?>
	
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
		
	<?php endif; ?>
</br>	
<?php $this->widget('bootstrap.widgets.TbButton', array('type' => 'info','buttonType'=>'submit', 'label'=>'Регистрация')); ?>                
                
<?php $this->endWidget(); ?>
</div>
<?php endif; ?>
<?php $this->endWidget(); ?>