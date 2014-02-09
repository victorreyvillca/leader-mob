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
 * @Entity(repositoryClass="Model\Repositories\RegionRepository")
 * @Table(name="Region")
 */
class Region extends DomainObject {

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
	 * Id of the Mission this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $missionId;

	/**
	 * Mission this model is associated with.
	 * @ManyToOne(targetEntity="Mission")
	 * @JoinColumn(name="missionId", referencedColumnName="id")
	 * @var Mission
	 */
	private $mission;

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
	public function getAbreviation() {
		return $this->abreviation;
	}

	/**
	 * @param string $abreviation
	 * @return Region
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
	 * @return Region
	 */
	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}

	/**
	 * @return Mission
	 */
	public function getMission() {
		return $this->mission;
	}

	/**
	 * @param Mission $mission
	 * @return Region
	 */
	public function setMission($mission) {
		$this->mission = $mission;
		return $this;
	}
}