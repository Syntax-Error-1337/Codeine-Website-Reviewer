<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		// console application components
		'components'=>array(
			'request' => array(
				// your website name: for example: http://your-domain.com
				'hostInfo' => 'http://your-domain.com',
				// if you installed script not in root directory, then you need to set baseUrl. For example : /codeine_website_reviewer
				'baseUrl' => '',
			),
		),
	)
);