<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => CHtml::encode($value->title),
            'headerIcon' => 'icon-list-alt',
            'headerButtons'=>array(array(
                'class'=>'bootstrap.widgets.TbButtonGroup',
                'buttons'=>array(
                       array('label'=>'Настройки','visible'=>Yii::app()->user->checkAccess('3'),
                           'items'=>array(
                       array('label'=>'Создать', 'icon'=>'icon-file', 'url'=>'/index.php/news/create/'),
                       array('label'=>'Редактировать', 'icon'=>'icon-pencil','url'=>'/index.php/news/update/'.$value->id),
                       array('label'=>'Удалить', 'icon'=>'icon-remove','url'=>'/index.php/news/delete/'.$value->id),))),
                'type' => 'success',
            )),));


$form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
    )); ?>
                <?php echo $form->labelEx($model,'theme'); ?>
		<?php echo $form->textField($model,'theme'); ?>
		<?php echo $form->error($model,'theme'); ?>
                <?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textarea($model,'text',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'text'); ?>
		<?php echo $form->labelEx($model,'receiver'); ?>
		<?php echo $form->textField($model,'receiver',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'receiver'); ?>
</br>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Отправить' : 'Сохранить',array('class'=>'btn')); ?>
	
<?php $this->endWidget(); ?>
<?php $this->endWidget();?>
