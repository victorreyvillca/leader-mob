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
 * @Entity(repositoryClass="Model\Repositories\PositionRepository")
 * @Table(name="Position")
 */
class Position extends DomainObject {

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $name;

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
	 * @return Position
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
	 * @return Position
	 */
	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}
}