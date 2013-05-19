<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerRequestlog
 */

/**
 * @return array
 */
return [
	'service_manager' => [
		'invokables' => [
            '\DragonJsonServerRequestlog\Service\Requestlog' => '\DragonJsonServerRequestlog\Service\Requestlog',
		],
	],
	'doctrine' => [
		'driver' => [
			'DragonJsonServerRequestlog_driver' => [
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => [
					__DIR__ . '/../src/DragonJsonServerRequestlog/Entity'
				],
			],
			'orm_default' => [
				'drivers' => [
					'DragonJsonServerRequestlog\Entity' => 'DragonJsonServerRequestlog_driver'
				],
			],
		],
	],
];
