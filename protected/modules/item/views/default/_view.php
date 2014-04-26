<?php
/* @var $this ItemsController */
/* @var $data Items */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('itemname')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->itemname), array('view', 'id'=>$data->id)); 
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode(CFormatter::formatNText($data->remark)); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute')); ?>:</b>
	<?php echo CHtml::encode($data->attribute); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rowdeleted')); ?>:</b>
	<?php echo CHtml::encode($data->rowdeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userlog')); ?>:</b>
	<?php echo CHtml::encode($data->userlog); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datetimelog')); ?>:</b>
	<?php echo CHtml::encode($data->datetimelog); ?>
	<br />

	*/ ?>

</div>
