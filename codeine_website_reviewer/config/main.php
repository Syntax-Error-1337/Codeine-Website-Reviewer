<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	// Brand name. Your app name (Will not be translated)
	'name'=>'Codeine Website Reviewer',
	// Default app lang
	'language'=>'en',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(),

	// application components
	'components'=>array(
		// Url Manager
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'class'=>'application.components.UrlManager',
            'cacheID'=>'cache',
            'rules'=>array(
                'proxy'=>'PagePeekerProxy/index',
                '<language:\w{2}>' => 'site/index',
                '<language:\w{2}>/contact' => 'site/contact',
                '<language:\w{2}>/rating/page/<page:\w+>' => 'rating/index',
                '<language:\w{2}>/www/<domain:[\w\d\-\.]+>' => 'websitestat/generateHTML',
                '<language:\w{2}>/pdf-review/<domain:[\w\d\-\.]+>.pdf' => 'websitestat/generatePDF',
                '<language:\w{2}>/<controller:\w+>' => '<controller>/index',
            ),
		),

		// File Cache. ~/root/codeine_website_reviewer/runtime/cache direcotry
		'cache'=>array(
			'class'=>'CFileCache',
		),

		// Databse Settings
		'db'=>array(
			// Mysql with host: localhost and databse name codeine_website_reviewer
			'connectionString' => 'mysql:host=localhost;dbname=max',
			// whether to turn on prepare emulation
			'emulatePrepare' => true,
			// db username
			'username' => 'root',
			// db password
			'password' => '',
			// default cahrset
			'charset' => 'utf8',
			// table prefix
			'tablePrefix' => 'codeine_',
			// cache time to dicrease SHOW CREATE TABLE * queries
			'schemaCachingDuration' => 60 * 60 * 24 * 30,
		),

		// Error handler
		'errorHandler'=>array(
			// ControllerID/ActionID custom page to handle errors
			'errorAction'=>'site/error',
		),

		// Log errors into ~/root/codeine_website_reviewer/runtime/application.log file
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
                    'except'=>'exception.CHttpException.*',
				),
                /*array(
                    'class'=>'CWebLogRoute',
                ),*/
			),
		),
	),

	// App level params
	'params'=>array(
		// your email which will receive messages from contact form
		'adminEmail'=>'admin@codeine.xyz',
		// Website count in "Rating" section
		'webPerPage'=>6,
        // Website count on Index page
        'websitesOnIndexPage'=>6,
		// Available app languages
		'languages'=>array(
			'da'=>'Dansk',
			'de'=>'Deutsch',
			'en'=>'English',
            'es'=>'Español',
			'fr'=>'Français',
			'it'=>'Italiano',
			'nl'=>'Nederlands',
            'pt'=>'Português',
			'fi'=>'Suomi',
			'sv'=>'Svenska',
			'ru'=>'Русский',
		),
        // wait until thumbnail is ready
        'useProxyImage' => false,
        // if you are running over https and have free pagepeeker account, then value must be "true"
        'pagePeekerVerify'=>"", // Pagepeeker verification HTML for free unbranded account
        // Set this value only if you are running over HTTPS and "useProxyImage" is "true". You need to register unbranded/paid pagepeeker account in order to get api key.
        // Paid: https://pagepeeker.com/site-thumbs-pricing/
        // Free: https://pagepeeker.com/free-thumbnails/
        'pagepeekerApiKey'=>'',
        // Google api key
        //'googleApiKey'=>'',
		// Whether to show cookie disclaimer
		'showCookieDisclaimer'=>true,
        // Whether to download all reviews in one PDF
        'partialPdf'=>true,
		// Allow instant redirect
		'instantRedir' => false,
		// Check website for badwords
		'checkForBadwords' => true,
		// Addthis.com javascript source
		'addthis'=>'',
		// Mailer extension
		'mailer' => array(
			'SMTPAuth' => true,
			// smtp server's port
			'Port' => 25,
			// server's host
			'Host' => 'mail.your-host.com',
			// username
			'Username' => 'username',
			// password
			'Password' => 'password',
			// letter's charset
			'CharSet' => 'UTF-8',
            // set "tls" if Port is 587 or "ssl" if Port is 465
            'SMTPSecure'=>'',
            // SMTP cconnection options
            'SMTPOptions' => array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            ),
		),
		// Analyser extension
		'analyser' => array(
			// Cache time in seconds.
			// For example if the website was added on 2013:06:15 12:40:11, then the
			// user will be able to update information after {cacheTime} seconds
			'cacheTime' => 60 * 60 * 24,
			// Total words in tag cloud
			'tagCloud' => 10,
			// Using 5 most consistency words from tagCloud to generate consistency matrix.
			/** !WARNING **/ // This value is closely related to the score calculation. See
			// ~/root/codeine_website_reviewer/vendors/Webmaster/Rating/rates.php file
			'consistencyCount' => 5,
		),
	),
);