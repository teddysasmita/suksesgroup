<?php
/* @var $this AcctperiodsController */
/* @var $model Acctperiods */

$this->breadcrumbs=array(
    'Master Data'=>array('/site/masterdata'),
    'Daftar'=>array('index'),
    'Lihat Data'=>array('view','id'=>$model->id),
    'Sejarah',
);

$this->menu=array(
	//array('label'=>'List Acctperiods', 'url'=>array('index')),
	array('label'=>'Tambah Data', 'url'=>array('create')),
);

?>

<h1>Periode Pembukuan</h1>

<?php 
    $data=Yii::app()->tracker->createCommand()->
       select()->from('acctperiods')->where("id='$model->id'")->queryAll();
    $ap=new CArrayDataProvider($data);
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acctperiods-grid',
	'dataProvider'=>$ap,
	'columns'=>array(
		'idatetime',
		'name',
		'startdate',
		'enddate',
		array(
    		'name'=>'userlog',
			'value'=>"lookup::UserNameFromUserID(\$data['userlog'])",
    	),
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
                   'updateButtonUrl'=>"Action::decodeRestoreHistoryAcctPeriodUrl(\$data)",
		),
	),
    )); 
?>
