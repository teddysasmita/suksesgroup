<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Master Data'=>array('/site/masterdata'),
	'Daftar'=>array('index'),
   'Sejarah'
);

$this->menu=array(
	array('label'=>'Tambah Data', 'url'=>array('create')),
);
?>

<h1>Satuan Barang</h1>

<?php    $data=Yii::app()->tracker->createCommand()->
       select()->from('suppliers')->where("id='$model->id'")->queryAll();
    $ap=new CArrayDataProvider($data);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-grid',
	'dataProvider'=>$ap,
	'columns'=>array(
		'id',
		'name',
		'remark',
		/*
		'userlog',
		'datetimelog',
		*/
		array(
                    'class'=>'CButtonColumn',
                   'buttons'=> array(
                        'view'=>array(
                            'visible'=>'false',
                        ),
                        'delete'=>array(
                          'visible'=>'false',
                        ),
                    ),
                   'updateButtonUrl'=>"Action::decodeRestoreHistorySupplierUrl(\$data)",
		),
	),
)); ?>
