<?php
//$this->layout='//layouts/column2';
$this->menu=array(
    array('label'=>UserModule::t('Входящие сообщения'), 'url'=>array('create')),
    array('label'=>UserModule::t('Исходящие сообщения'), 'url'=>array('admin')),
);?>

<table class="table table-condensed table-bordered">
  <thead>
    <tr>
      <th>Автор</th>
      <th>Тема сообщения</th>
      <th>Дата</th>
    </tr>
  </thead>
  

<?php
foreach ($model as $value) {?>
<tbody>
    <?php echo($value->status==1)?"<tr class='success'>":"<tr>" ?>
        <td><?php echo CHtml::link($value->author->username,array('/user/profile/'.$value->author->id));?></td>
        <td><?php echo CHtml::link($value->theme,array('/user/messages/view?id='.$value->id));?></td>
        <td><?php echo $value->data;?></td>
    </tr>
</tbody>
<?php } ?>
</table>
