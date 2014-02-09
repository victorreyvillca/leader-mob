<?php
/**
 * Model Doctrine 2 for Dist 3
 *
 * @category Dist
 * @package Model
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2013 Emini A/S
 * @license Proprietary
 */

namespace Model;

/**
 * @Entity(repositoryClass="Model\Repositories\ClubRepository")
 * @Table(name="Club")
 */
class Club extends DomainObject {

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
	 * Id of the Department this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $departmentId;

	/**
	 * Department this model is associated with.
	 * @ManyToOne(targetEntity="Department")
	 * @JoinColumn(name="departmentId", referencedColumnName="id")
	 * @var Department
	 */
	private $department;

	/**
	 * Id of the Church this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $churchId;

	/**
	 * Church this model is associated with.
	 * @ManyToOne(targetEntity="Church")
	 * @JoinColumn(name="churchId", referencedColumnName="id")
	 * @var Church
	 */
	private $church;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Club
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
	 * @return Club
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return Department
	 */
	public function getDepartment() {
		return $this->department;
	}

	/**
	 * @param Department $department
	 * @return Club
	 */
	public function setDepartment($department) {
		$this->department = $department;
		return $this;
	}

	/**
	 * @return Church
	 */
	public function getChurch() {
		return $this->church;
	}

	/**
	 * @param Church $church
	 * @return Club
	 */
	public function setChurch($church) {
		$this->church = $church;
		return $this;
	}
}