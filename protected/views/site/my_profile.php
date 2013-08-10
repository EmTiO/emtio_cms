<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions'=>array('class'=>'well','enctype' => 'multipart/form-data'),
)); ?>
<p><img src="/images/<?=$model->avatar?>" class="img-rounded"></p> 
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'buttons'=>array(
	  array('label'=>$model->karma, 'url'=>'#','disabled'=>true,'type'=>'info')
	  
)))?></br></br>
<?php echo $form->textFieldRow($model, 'username', array('disabled'=>true,'labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'Логин')).'</br>'; ?>
<?php echo $form->textFieldRow($model, 'name', array('labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'Имя')).'</br>'; ?>
<?php echo $form->textFieldRow($model, 'email', array('labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'Почта')).'</br>'; ?>
<?php echo $form->textFieldRow($model, 'registerdata', array('disabled'=>true,'labelOptions' => array('label' => false),'class'=>'span2','prepend'=>'Дата регистрации')).'</br>'; ?>
<?php echo $form->fileFieldRow($model, 'avatar',array('labelOptions' => array('label' => false,'visible'=>Yii::app()->user->id==$model['id']))).'</br>'; ?> 
<?php $this->widget('bootstrap.widgets.TbButton', array('type' => 'info','buttonType'=>'submit', 'label'=>'Сохранить')); ?>
 
<?php $this->endWidget(); ?>    

    
    
    
    


