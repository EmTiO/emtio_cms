<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
    'id'=>'inlineForm',
	'type'=>'inline',
)); ?>

        <?php echo $form->textFieldRow($model,'id',array('class'=>'span1')); ?>
        <?php echo $form->textFieldRow($model,'username',array('class'=>'span2','maxlength'=>20)); ?>
        <?php echo $form->textFieldRow($model,'email',array('class'=>'span2','maxlength'=>128)); ?>
        <?php echo $form->textFieldRow($model,'create_at',array('class'=>'span2')); ?>
        <?php echo $form->textFieldRow($model,'lastvisit_at',array('class'=>'span2')); ?>
        <?php echo $form->textFieldRow($model,'superuser',array('class'=>'span1')); ?>
        <?php echo $form->textFieldRow($model,'status',array('class'=>'span1')); ?>
<br><br>
    
    <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Поиск',
        )); ?>
        

<?php $this->endWidget(); ?>