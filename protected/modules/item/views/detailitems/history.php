<?php
/* @var $this DetailitemsController */
/* @var $model Detailitems */

$this->breadcrumbs=array(
   'Proses'=>array('/site/proses'),
   'Daftar'=>array('default/index'),
   'Lihat Data'=>array('default/view', 'id'=>$model->id),
   'Ubah Data'=>array('default/update', 'id'=>$model->id),
   'Lihat Detil'=>array('/purchasesorder/detailitems/view',
         'iddetail'=>$model->iddetail),
   'Sejarah'
);

$this->menu=array(
	//array('label'=>'List Detailitems', 'url'=>array('index')),
	//array('label'=>'Create Detailitems', 'url'=>array('create')),
);

?>

<h1>Detil Master Data Barang</h1>

<?php    $data=Yii::app()->tracker->createCommand()->
       select()->from('detailitems')->where('id=:id',array(':id'=>$model->iddetail))->queryAll();
    $ap=new CArrayDataProvider($data);
 ?> 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detailitems-grid',
	'dataProvider'=>$ap,
	'columns'=>array(
		'iddetail',
		'id',
		'idunit',
		'userlog',
		'datetimelog',
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
                   'updateButtonUrl'=>"Action::decodeRestoreHistoryDetailItemUrl(\$data)",
		),
	),
)); ?>
