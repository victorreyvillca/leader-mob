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
	 * Id of the District this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $districtId;

	/**
	 * District this model is associated with.
	 * @ManyToOne(targetEntity="District")
	 * @JoinColumn(name="districtId", referencedColumnName="id")
	 * @var District
	 */
	private $district;

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
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return Church
	 */
	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}

	/**
	 * @return District
	 */
	public function getDistrict() {
		return $this->district;
	}

	/**
	 * @param District $district
	 * @return Church
	 */
	public function setDistrict($district) {
		$this->district = $district;
		return $this;
	}
}