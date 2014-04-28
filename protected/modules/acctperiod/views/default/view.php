<?php
/* @var $this AcctperiodsController */
/* @var $model Acctperiods */

$this->breadcrumbs=array(
   'Master Data'=>array('/site/masterdata'),
   'Daftar'=>array('index'),
   'Lihat Data',
);

$this->menu=array(
	array('label'=>'Tambah Data', 'url'=>array('create')),
	array('label'=>'Ubah Data', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Data', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Cari Data', 'url'=>array('admin')),
        array('label'=>'History', 'url'=>array('history', 'id'=>$model->id)),
);
?>

<h1>Periode Pembukuan</h1>

<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
		//'id',
			'idatetime',
			'name',
			'startdate',
			'enddate',
			array(
				'name'=>'userlog',
				'value'=>lookup::UserNameFromUserID($model->userlog),
			),
			'datetimelog',
		),
	)); 
?>
