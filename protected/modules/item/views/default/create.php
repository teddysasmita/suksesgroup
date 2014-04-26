<?php
/* @var $this ItemsController */
/* @var $model Items */

$this->breadcrumbs=array(
   'Proses'=>array('/site/proses'),
	'Daftar'=>array('index'),
	'Tambah Data',
);

$this->menu=array(
	array('label'=>'Tambah Detil', 'url'=>array('detailitems/create', 'id'=>$model->id),
		'linkOptions'=>array('id'=>'adddetail')),
);

$jq=<<<EOH
   $('#adddetail').click(function(event){
     var mainform;
     var hiddenvar;
     mainform=$('#items-form');
     $('#command').val('adddetail');
     mainform.submit();
     event.preventDefault();
   });
EOH;
Yii::app()->clientScript->registerScript('myscript', $jq, CClientScript::POS_READY);

?>

<h1>Item Penjualan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
