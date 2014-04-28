<?php
/* @var $this AcctperiodsController */
/* @var $model Acctperiods */

$this->breadcrumbs=array(
   'Master Data'=>array('/site/master Data'),
   'Daftar'=>array('index'),
   'Data yang telah Terhapus',
);

$this->menu=array(
	array('label'=>'Tambah Data', 'url'=>array('create')),
);

?>

<h1>Periode Pembukuan</h1>

<?php 
    $data=Yii::app()->tracker->createCommand()
       ->select('a.*')->from('acctperiods a')->join('userjournal b', 'b.id=a.idtrack')
       ->where('b.action=:action', array(':action'=>'d'))->queryAll();
    $ap=new CArrayDataProvider($data);
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acctperiods-grid',
	'dataProvider'=>$ap,
	'columns'=>array(
		//'id',
		'name',
		'idatetime',
		'startdate',
		'enddate',
		array(
    		'name'=>'userlog',
			'value'=>"lookup::UserNameFromUserID(\$data['userlog'])"
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
                   'updateButtonUrl'=>"Action::decodeRestoreDeletedAcctPeriodUrl(\$data)",
		),
	),
    )); 
?>
