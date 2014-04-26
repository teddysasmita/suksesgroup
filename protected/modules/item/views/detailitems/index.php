<?php
/* @var $this DetailitemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
);

$this->menu=array(
	array('label'=>'Tambah Data', 'url'=>array('create')),
	array('label'=>'Pencarian Data', 'url'=>array('admin')),
	'Daftar'
);
?>

<h1>Detil Master Data Barang</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
