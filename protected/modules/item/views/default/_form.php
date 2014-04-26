<?php
/* @var $this ItemsController */
/* @var $model Items */
/* @var $form CActiveForm */
?>

<div class="form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'items-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
             echo $form->hiddenField($model, 'id');
             echo $form->hiddenField($model, 'userlog');
             echo $form->hiddenField($model, 'datetimelog');
             echo CHtml::hiddenField('command');
             
          ?>

	<div class="row">
		<?php echo $form->labelEx($model,'itemname'); ?>
		<?php echo $form->textField($model,'itemname',array('size'=>50 ,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'itemname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textArea($model,'remark',array('cols'=>50,'rows'=>10)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>

<?php 
	if (isset(Yii::app()->session['Detailitems'])) {
       $rawdata=Yii::app()->session['Detailitems'];
       $count=count($rawdata);
    } else {
       $count=Yii::app()->db->createCommand("select count(*) from detailitems where id='$model->id'")->queryScalar();
       $sql="select * from detailitems where id='$model->id'";
       $rawdata=Yii::app()->db->createCommand($sql)->queryAll ();
    }
    $dataProvider=new CArrayDataProvider($rawdata, array(
          'totalItemCount'=>$count,
    ));
    $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$dataProvider,
            'columns'=>array(
            array(
               'name'=>'idunit',
               'value'=>"lookup::UnitNameFromUnitID(\$data['idunit'])"
            ),
            array(
               'class'=>'CButtonColumn',
               'buttons'=> array(
                  'view'=>array(
                     'visible'=>'false'
                  ),
                  /*'delete'=>array(
                     'visible'=>'false'
                  ),
                  'update'=>array(
                     'visible'=>'false'
                  ),*/
               ),
               'deleteButtonUrl'=>"Action::decodeDeleteDetailItemUrl(\$data)",
				'updateButtonUrl'=>"Action::decodeUpdateDetailItemUrl(\$data)",
            )
          ),
    ));
?>

	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	
	<?php $this->endWidget(); ?>
	
</div><!-- form -->
