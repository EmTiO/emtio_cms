<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

<?php
    $count = Yii::app()->getModule('user')->newMessages();
    
    $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
        
            'title' => 'Ваш профиль',
            'headerButtons'=>array(array(
                'class'=>'bootstrap.widgets.TbButtonGroup',
                'buttons'=>array(
                       array('label'=>'Настройки',
                           'items'=>array(
                       array('label'=>'Сообщения ('.$count.')', 'icon'=>'icon-file', 'url'=>'/index.php/user/messages'),
                       array('label'=>'Смена пароля', 'icon'=>'icon-file', 'url'=>'/index.php/user/profile/changepassword'),
                       array('label'=>'Редактировать', 'icon'=>'icon-pencil','url'=>'/index.php/user/profile/edit'),
                       array('label'=>'Выход', 'icon'=>'icon-remove','url'=>'/index.php/user/logout'),))),
                'type' => 'success',
            )),));
?>

<img src="/images/<?php echo $profile->avatar?>" class="img-rounded">


<table>
        <tr>
		<th><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
                <td><?php echo CHtml::encode($model->username); ?></td>
	</tr>
<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {				
?>
	<tr>
		<th><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
                <td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
	</tr>
<?php }} ?>
	<tr>
		<th><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
                <td><?php echo CHtml::encode($model->email); ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
                <td><?php echo $model->create_at; ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
                <td><?php echo $model->lastvisit_at; ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
                <td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
	</tr>
</table>
       
<?php $this->endWidget();?>
