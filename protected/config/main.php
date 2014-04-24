<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// 
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sukses Group Administration System',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.vendors.phpexcel.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'test',
                        
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
            'user',
            'auth',
            'customer',
            'supplier',
            'units',
            'item',
            
            'salesorder',
            
            'purchasesorder',
            'stockentries',
            'warehouse',
            'purchasesmemo',
            'salesperson',
            'purchasesreceipt',
            'purchasespayment',
            'financepayment',
            'inventorytaking',	
            'inputinventorytaking',
            'inventorycosting',
            'purchasesretur',
            'salespos',
            'barcodeprint',
            'sellingprice',
            'salescancel',
            'salesreplace',
            'purchasesstockentries',
            'deliveryordersnt',
            'deliveryorders',
            'requestdisplays',
            'stockexits',
            'salesreturs',
            'itemtransfers',
            'orderretrievals',
            'returstocks',
        ),

        

	// application components
	'components'=>array(
            'authManager'=>array(
               'class'=>'CDbAuthManager',
               'connectionID'=>'authdb',
	),
          
	'user'=>array(
			// enable cookie-based authentication
		'allowAutoLogin'=>false,
	),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
	'db'=>array(
		'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/sukses-admin.db',
		'class' => 'CDbConnection',
               /*'connectionString' => 'mysql:host=localhost;dbname=gsi',
               'emulatePrepare' => true,
               'username' => 'root',
               'password' => 'test',
               'charset' => 'utf8',*/

	 ),
	'authdb'=>array(
		'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/sukses-users.db',
		'class'=>'CDbConnection',
               /*'connectionString' => 'mysql:host=localhost;dbname=gsi-auth',
               'emulatePrepare' => true,
               'username' => 'root',
               'password' => 'test',
               'charset' => 'utf8',*/
	),
	'sessiondb'=>array(
		'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/sukses-session.db',
		'class'=>'CDbConnection',
               /*'connectionString' => 'mysql:host=localhost;dbname=gsi-auth',
               'emulatePrepare' => true,
               'username' => 'root',
               'password' => 'test',
               'charset' => 'utf8',*/
	),
	'tracker'=>array(
               'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/sukses-track.db',
		'class'=>'CDbConnection',
        /*       'connectionString' => 'mysql:host=localhost;dbname=gsi-track',
               'emulatePrepare' => true,
               'username' => 'root',
               'password' => 'test',
               'charset' => 'utf8',*/

    ),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web page
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	'session'=>array(
	  'class'=>'CDbHttpSession',
	  'connectionID'=>'sessiondb',
	  'autoCreateSessionTable'=>'false',
	  'timeout'=>46800,
	),
	
	'clientscript'=>array(
	  'class'=>'CClientScript',
	)
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
