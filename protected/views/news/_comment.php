<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="form">
   
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>false,
    )); ?>
    
    <p class="note">Поля отмеченные <span class="required">*</span> обязательны к заполнению.</p>
    
    <div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textField($model,'text',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'text'); ?>
    </div>
    
    <div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Отправить' : 'Сохранить',array('class'=>'btn')); ?>
    </div>
	
    <?php $this->endWidget(); ?>

</div><!-- form -->