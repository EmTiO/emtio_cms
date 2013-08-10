<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class='well'>
 
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'news-form',
		'type'=>'horizontal',
	)); ?>
    
        <?php echo $form->textFieldRow($model, 'title',
            array('class'=>'span5')); ?>
        <?php echo $form->ckEditorRow($model, 'introtext', 
                array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>
        <?php echo $form->ckEditorRow($model, 'fulltext', 
                array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>
        <?php echo $form->dropDownListRow($model, 'category_id', Category::all()); ?>
        <?php echo $form->dropDownListRow($model, 'access', 
                array('1'=>'Open','0'=>'Close')); ?>
        <?php echo $form->datepickerRow($model, 'created',
                array('prepend'=>'<i class="icon-calendar"></i>', 
                    'options'=>array(
                        'language'=>'ru',
                        'format'=>'dd.mm.yyyy')));?>
	
        <?php $this->widget('bootstrap.widgets.TbButton', 
                array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Редактировать')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', 
                array('buttonType'=>'reset', 'label'=>'Сброс')); ?>
    
<?php $this->endWidget(); ?>
</div>