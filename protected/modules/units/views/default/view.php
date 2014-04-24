<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Master Data'=>array('/site/masterdata'),
	'Daftar'=>array('index'),
   'Lihat Data'
);

$this->menu=array(
	array('label'=>'Tambah Data', 'url'=>array('create')),
	array('label'=>'Ubah Data', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Data', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Pencarian Data', 'url'=>array('admin')),
   array('label'=>'Sejarah', 'url'=>array('history', 'id'=>$model->id)),
);
?>

<h1>Satuan Barang</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'name',
		array(
			'name'=>'remark',
			'type'=>'ntext'
		),
		array(
			'name'=>'userlog',
			'value'=>lookup::UserNameFromUserID($model->userlog),
		),
		'datetimelog',
	),
)); ?>
