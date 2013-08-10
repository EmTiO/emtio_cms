<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Test',
    'language'=>'ru',

	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.user.models.*',
                'application.modules.user.components.*',
                'application.modules.admin.models.*',
                'application.modules.admin.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
                        'generatorPaths' => array('bootstrap.gii'),
			'class'=>'system.gii.GiiModule',
			'password'=>'pq5zmg1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                
                'admin'=>array(
                        'layoutPath' => 'protected/modules/admin/views/layouts',
                        'layout' => 'main'
                ),
            
                'user'=>array(
                        # encrypting method (php hash function)
                        'hash' => 'md5',

                        # send activation email
                        'sendActivationMail' => true,

                        # allow access for non-activated users
                        'loginNotActiv' => false,

                        # activate user on registration (only sendActivationMail = false)
                        'activeAfterRegister' => false,

                        # automatically login from registration
                        'autoLogin' => true,

                        # registration path
                        'registrationUrl' => array('/user/registration'),

                        # recovery password path
                        'recoveryUrl' => array('/user/recovery'),

                        # login form path
                        'loginUrl' => array('/user/login'),

                        # page after login
                        'returnUrl' => array('/user/profile'),

                        # page after logout
                        'returnLogoutUrl' => array('/user/login'),
        ),
		
	),

	// application components
	'components'=>array(
            
                'bootstrap' => array(
                    'class' => 'ext.bootstrap.components.Bootstrap',
                    'responsiveCss' => true,
                ),
            
		'user'=>array(
			// enable cookie-based authentication
                        'class' => 'WebUser',
			'allowAutoLogin'=>true,
                        'loginUrl' => array('/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=emtio',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
                        'tablePrefix' => 'tbl_',
			 'enableProfiling'=>true,
			// показываем значения параметров
			 'enableParamLogging' => true,
		),
		
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
					'enabled'=>true,
				),
				array(
					// направляем результаты профайлинга в ProfileLogRoute (отображается
					// внизу страницы)
					'class'=>'CProfileLogRoute',
					'levels'=>'profile',
					'enabled'=>true,
				    ),
				array(
				    'class' => 'CWebLogRoute',
				    'categories' => 'application',
				    'showInFireBug' => true
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);