<?php
/* @var $this NewsController */
?>

<?php
    foreach ($models as $value) {
            $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
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
?>     
       <?=CHtml::image($value->img_url,false,$htmlOptions=array('class'=>'pull-left'))?> 
       <?=CHtml::encode($value->introtext);?><br/><br/>
       <?=CHtml::link('Читать далее...', '/index.php/news/view/'.$value->id , array('class'=>'btn btn-primary'))?></br>
<?php $this->endWidget();?>
       
<? } ?>
<?$this->widget('CLinkPager', array(
    'pages' => $pages,
))?>