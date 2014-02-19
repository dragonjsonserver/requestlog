<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2014 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerRequestlog
 */

namespace DragonJsonServerRequestlog\Service;

/**
 * Serviceklasse zur Verwaltung des Requestlogs
 */
class Requestlog
{
    use \DragonJsonServer\ServiceManagerTrait;
	use \DragonJsonServerDoctrine\EntityManagerTrait;
	
    /**
	 * Erstellt und speichert einen neuen Requestlog
	 * @param \DragonJsonServer\Request $request
	 * @param \DragonJsonServer\Response $response
	 * @return Requestlog
	 */
	public function createRequestlog(\DragonJsonServer\Request $request, \DragonJsonServer\Response $response)
	{
		$serviceManager = $this->getServiceManager();
		$entityManager = $this->getEntityManager();

		if (!$entityManager->isOpen()) {
			return;
		}
		$method = $request->getMethod();
    	$serviceServer = $this->getServiceManager()->get('\DragonJsonServer\Service\Server');
		list ($classname, $methodname) = $serviceServer->parseMethod($method);
		$requestlog = (new \DragonJsonServerRequestlog\Entity\Requestlog())
			->setMethod($method)
			->setId($request->getId())
			->setClassname($classname)
			->setMethodname($methodname)
			->setParams($request->getParams())
			->setResponse($response->toArray());
		if ($serviceManager->has('\DragonJsonServerAccount\Service\Session')) {
			$session = $serviceManager->get('\DragonJsonServerAccount\Service\Session')->getSession();
			if (null !== $session) {
				$requestlog->setSession($session->toArray());
			}
		}
		$entityManager->persist($requestlog);
		$entityManager->flush();
		return $this;
	}
}
