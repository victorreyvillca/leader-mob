<?php
/**
 * Model Doctrine 2 for MOB
 *
 * @category MOB
 * @package Model
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2014 Emini A/S
 * @license Proprietary
 */

namespace Model;

/**
 * @Entity(repositoryClass="Model\Repositories\ClassConquerorRepository")
 * @Table(name="ClassConqueror")
 */
class ClassConqueror extends DomainObject {

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $name;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $description;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $classType;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return ClassConqueror
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return ClassConqueror
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getClassType() {
		return $this->classType;
	}

	/**
	 * @param int $classType
	 */
	public function setClassType($classType) {
		$this->classType = $classType;
	}
}