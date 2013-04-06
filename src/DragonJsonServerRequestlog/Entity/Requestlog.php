<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerRequestlog
 */

namespace DragonJsonServerRequestlog\Entity;

/**
 * Entityklasse eines Requestlogs
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="requestlogs")
 */
class Requestlog
{
	use \DragonJsonServerDoctrine\Entity\CreatedTrait;

	/**
	 * @Doctrine\ORM\Mapping\Id
	 * @Doctrine\ORM\Mapping\Column(type="integer")
	 * @Doctrine\ORM\Mapping\GeneratedValue
	 **/
	protected $requestlog_id;
	
	/** 
	 * @Doctrine\ORM\Mapping\Column(type="string")
	 **/
	protected $method;
	
	/** 
	 * @Doctrine\ORM\Mapping\Column(type="integer")
	 **/
	protected $id;
	
	/** 
	 * @Doctrine\ORM\Mapping\Column(type="string")
	 **/
	protected $classname;
	
	/** 
	 * @Doctrine\ORM\Mapping\Column(type="string")
	 **/
	protected $methodname;
	
	/** 
	 * @Doctrine\ORM\Mapping\Column(type="string")
	 **/
	protected $params;
	
	/** 
	 * @Doctrine\ORM\Mapping\Column(type="string")
	 **/
	protected $response;
	
	/** 
	 * @Doctrine\ORM\Mapping\Column(type="string")
	 **/
	protected $session;
	
	/**
	 * Gibt die ID des Requestlogs zurück
	 * @return integer
	 */
	public function getRequestlogId()
	{
		return $this->requestlog_id;
	}
	
	/**
	 * Setzt den Servicenamen des Requestlogs
	 * @param string $method
	 * @return Requestlog
	 */
	public function setMethod($method)
	{
		$this->method = $method;
		return $this;
	}
	
	/**
	 * Gibt den Servicenamen des Requestlogs zurück
	 * @return string
	 */
	public function getMethod()
	{
		return $this->method;
	}
	
	/**
	 * Setzt die ID des Requestlogs
	 * @param integer $id
	 * @return Requestlog
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * Gibt die ID des Requestlogs zurück
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * Setzt den Klassennamen der API Klasse des Requestlogs
	 * @param string $classname
	 * @return Requestlog
	 */
	public function setClassname($classname)
	{
		$this->classname = $classname;
		return $this;
	}
	
	/**
	 * Gibt den Klassennamen der API Klasse des Requestlogs zurück
	 * @return string
	 */
	public function getClassname()
	{
		return $this->classname;
	}
	
	/**
	 * Setzt den Methodennamen der API Klasse des Requestlogs
	 * @param string $methodname
	 * @return Requestlog
	 */
	public function setMethodname($methodname)
	{
		$this->methodname = $methodname;
		return $this;
	}
	
	/**
	 * Gibt den Methodennamen der API Klasse des Requestlogs zurück
	 * @return string
	 */
	public function getMethodname()
	{
		return $this->methodname;
	}
	
	/**
	 * Setzt die Requestparameters des Requestlogs
	 * @param array $params
	 * @return Requestlog
	 */
	public function setParams(array $params)
	{
		$this->params = \Zend\Json\Encoder::encode($params);
		return $this;
	}
	
	/**
	 * Gibt die Requestparameters des Requestlogs zurück
	 * @return array
	 */
	public function getParams()
	{
		return \Zend\Json\Decoder::decode($this->params, \Zend\Json\Json::TYPE_ARRAY);
	}
	
	/**
	 * Setzt die Response des Requestlogs
	 * @param array $response
	 * @return Requestlog
	 */
	public function setResponse(array $response)
	{
		$this->response = \Zend\Json\Encoder::encode($response);
		return $this;
	}
	
	/**
	 * Gibt die Response des Requestlogs zurück
	 * @return array
	 */
	public function getResponse()
	{
		return \Zend\Json\Decoder::decode($this->response, \Zend\Json\Json::TYPE_ARRAY);
	}
	
	/**
	 * Setzt die Session des Requestlogs
	 * @param array $session
	 * @return Requestlog
	 */
	public function setSession(array $session)
	{
		$this->session = \Zend\Json\Encoder::encode($session);
		return $this;
	}
	
	/**
	 * Gibt die Session des Requestlogs zurück
	 * @return array
	 */
	public function getSession()
	{
		return \Zend\Json\Decoder::decode($this->session, \Zend\Json\Json::TYPE_ARRAY);
	}
	
	/**
	 * Gibt die Attribute der Deviceverknüpfung als Array zurück
	 * @return array
	 */
	public function toArray()
	{
		return [
			'requestlog_id' => $this->getRequestlogId(),
			'created' => $this->getCreated()->getTimestamp(),
			'method' => $this->getMethod(),
			'id' => $this->getId(),
			'classname' => $this->getClassname(),
			'methodname' => $this->getMethodname(),
			'params' => $this->getParams(),
			'response' => $this->getResponse(),
			'session' => $this->getSession(),
		];
	}
}
