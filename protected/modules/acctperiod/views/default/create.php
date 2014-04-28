<?php
/* @var $this AcctperiodsController */
/* @var $model Acctperiods */

$this->breadcrumbs=array(
   'Master Data'=>array('/site/masterdata'),
	'Daftar'=>array('index'),
	'Tambah Data',
);

$this->menu=array(
	//array('label'=>'Daftar Pelanggan', 'url'=>array('index')),
	array('label'=>'Pencarian Data', 'url'=>array('admin')),
);
?>

<h1>Periode Pembukuan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>