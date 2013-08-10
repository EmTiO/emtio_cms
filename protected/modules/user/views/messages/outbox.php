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
        <td><?php echo $value->author_id;?></td>
        <td><?php echo $value->theme;?></td>
        <td><?php echo $value->data;?></td>
    </tr>
</tbody>
<?php } ?>
</table>
