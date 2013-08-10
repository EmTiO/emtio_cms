<?php
/* @var $this NewsController */
/* @var $model News */
?>

<div class='well'>
    <h3><?=CHtml::encode($new->title);?></h3>
    <?php $this->beginWidget('CHtmlPurifier'); ?>
    <p><?=$new->fulltext;?></p>
    <?php $this->endWidget(); ?>
    <p>
        <b>
            <i class="icon-eye-open"></i> <?=CHtml::encode($new->views);?> | 
            <i class="icon-list"></i> <?=CHtml::encode($new->category->title);?> | 
            <i class="icon-time"></i> <?=CHtml::encode($new->created)?>
       </b>
    </p>
<hr>

<i class="icon-envelope"></i> Комментарии ( <?=$data=Comments::model()->countByAttributes(array('page_id'=>$new->id));?> )<br><hr>

<?php foreach ($comment as $value) {?>
    <b><i class="icon-user"></i> <?=CHtml::encode($value->users->username);?></b> | 
       <i class="icon-time"></i> <?=CHtml::encode(date("j.n.Y",$value->created))?> <br>
       <?=CHtml::encode($value->text);?>
    <hr>
<? } ?>

<?php 
if(!Yii::app()->user->isGuest){$this->renderPartial('_comment',array('model'=>$model));
}else{
        echo "Для отправки коментариев, необходимо осуществить <a href='/index.php/site/login' class='btn'>Вход</a>";
}?>
</div>
