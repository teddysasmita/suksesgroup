<?php
/* @var $this AcctperiodsController */
/* @var $model Acctperiods */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acctperiods-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php 
       echo $form->hiddenField($model,'id');
       echo $form->hiddenField($model,'userlog');
       echo $form->hiddenField($model,'datetimelog');
             
   ?>
   
	<div class="row">
		<?php echo $form->labelEx($model,'idatetime'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'Acctperiods[idatetime]',
                     // additional javascript options for the date picker plugin
                  'options'=>array(
                     'showAnim'=>'fold',
                     'dateFormat'=>'yy/mm/dd',
                     'defaultdate'=>$model->idatetime
                  ),
                  'htmlOptions'=>array(
                     'style'=>'height:20px;',
                  ),
                  'value'=>$model->idatetime,
               ));
            ?>
		<?php echo $form->error($model,'idatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'startdate'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'Acctperiods[startdate]',
                     // additional javascript options for the date picker plugin
                  'options'=>array(
                     'showAnim'=>'fold',
                     'dateFormat'=>'yy/mm/dd',
                     'defaultdate'=>$model->startdate
                  ),
                  'htmlOptions'=>array(
                     'style'=>'height:20px;',
                  ),
                  'value'=>$model->startdate,
               ));
            ?>
		<?php echo $form->error($model,'startdate'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'enddate'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'Acctperiods[enddate]',
                     // additional javascript options for the date picker plugin
                  'options'=>array(
                     'showAnim'=>'fold',
                     'dateFormat'=>'yy/mm/dd',
                     'defaultdate'=>$model->enddate
                  ),
                  'htmlOptions'=>array(
                     'style'=>'height:20px;',
                  ),
                  'value'=>$model->enddate,
               ));
            ?>
		<?php echo $form->error($model,'enddate'); ?>
	</div>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
