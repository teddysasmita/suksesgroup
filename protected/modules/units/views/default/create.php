<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Master Data'=>array('/site/masterdata'),
	'Daftar'=>array('index'),
	'Tambah Data',
);

$this->menu=array(
	array('label'=>'Pencarian Data', 'url'=>array('admin')),
);
?>

<h1>Satuan Barang</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
