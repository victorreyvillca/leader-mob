<?php
/**
 * Model Doctrine 2 for Dist 2
 *
 * @category Dist
 * @package Models
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2012 Emini A/S
 * @license Proprietary
 */

namespace Model;

/**
 * @Entity(repositoryClass="Model\Repositories\ChurchRepository")
 * @Table(name="Church")
 */
class Church extends DomainObject {
	
	/**
	 * 
	 * @Column(type="string")
	 * @var string
	 */
	private $name;
	
	/**
	 * 
	 * @Column(type="text")
	 * @var string
	 */
	private $address;
	
	/**
	 * 
	 * @Column(type="text")
	 * @var string
	 */
	private $content;
	
	/**
	 * 
	 * @Column(type="string")
	 * @var string
	 */
	private $phone;
	
	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Church
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @param string $address
	 * @return Church
	 */
	public function setAddress($address) {
		$this->address = $address;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param string $content
	 * @return Church
	 */
	public function setContent($content) {
		$this->content = $content;
		
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param string $phone
	 * @return Church
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
		
		return $this;
	}
}