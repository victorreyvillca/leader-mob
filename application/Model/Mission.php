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
 * @Entity(repositoryClass="Model\Repositories\MissionRepository")
 * @Table(name="Mission")
 */
class Mission extends DomainObject {

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $name;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $abreviation;

	/**
	 * @Column(type="text")
	 * @var string
	 */
	private $description;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Mission
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getAbreviation() {
		return $this->abreviation;
	}

	/**
	 * @param string $abreviation
	 * @return Mission
	 */
	public function setAbreviation($abreviation) {
		$this->abreviation = $abreviation;
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
	 * @return Mission
	 */
	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}
}