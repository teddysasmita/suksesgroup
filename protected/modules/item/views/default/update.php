<?php
/* @var $this ItemsController */
/* @var $model Items */

$this->breadcrumbs=array(
   'Proses'=>array('/site/proses'),
	'Daftar'=>array('index'),
	'Lihat Data'=>array('view','id'=>$model->id),
	'Ubah Data',
);

$this->menu=array(
	array('label'=>'Tambah Detil', 'url'=>array('detailitems/create', 'id'=>$model->id),
		'linkOptions'=>array('id'=>'adddetail')),
);

?>

<h1>Item Penjualan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
