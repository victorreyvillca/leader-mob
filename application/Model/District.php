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
 * @Entity(repositoryClass="Model\Repositories\DistrictRepository")
 * @Table(name="District")
 */
class District extends DomainObject {

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
	 * Id of the Region this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $regionId;

	/**
	 * Region this model is associated with.
	 * @ManyToOne(targetEntity="Region")
	 * @JoinColumn(name="regionId", referencedColumnName="id")
	 * @var Region
	 */
	private $region;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Region
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
	 * @return District
	 */
	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}

	/**
	 * @return Region
	 */
	public function getRegion() {
		return $this->region;
	}

	/**
	 * @param Region $region
	 * @return District
	 */
	public function setRegion($region) {
		$this->region = $region;
		return $this;
	}
}