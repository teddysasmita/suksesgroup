<?php
/* @var $this DetailitemsController */
/* @var $model Detailitems */
/* @var $form CActiveForm */
?> 

<div class="form">

<?php
 
   $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detailitems-form',
	'enableAjaxValidation'=>true,
   ));
 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php 
         echo $form->hiddenField($model,'iddetail');
         echo $form->hiddenField($model,'id');
         echo $form->hiddenField($model,'userlog');
         echo $form->hiddenField($model,'datetimelog');
        ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idunit'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
			    'name'=>'Detailitems[idunit]',
			    'sourceUrl'=>Yii::app()->createUrl('LookUp/getUnit'),
			    // additional javascript options for the autocomplete plugin
			    'options'=>array(
			        'minLength'=>'2',
			    ),
			    'htmlOptions'=>array(
			        'style'=>'height:20px;',
			    ),
			));
		
		?>
		<?php echo $form->error($model,'idunit'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($mode); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
