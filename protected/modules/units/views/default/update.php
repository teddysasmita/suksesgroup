<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Master Data'=>array('/site/masterdata'),
	'Daftar'=>array('index'),
   'Lihat Data'=>array('view', 'id'=>$model->id),
   'Ubah Data'
);

$this->menu=array(
);
?>

<h1>Satuan Barang</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
