<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well">
<p><img src="/images/<?=$model->avatar?>" class="img-rounded"></p> 
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'buttons'=>array(
	    array('label'=>'-', 'url'=>'/index.php/site/karma/0','type'=>'danger'),
	    array('label'=>$model->karma, 'url'=>'#','disabled'=>true,'type'=>'info'),
	    array('label'=>'+', 'url'=>'/index.php/site/karma/1','type'=>'success')),
));?></br></br>
<?=$model->name?></br>
<?=$model->registerdata?>
</div>

    
    
    
    


