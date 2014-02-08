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
 * @Entity(repositoryClass="Model\Repositories\ClubPathfinderRepository")
 * @Table(name="ClubPathfinder")
 */
class ClubPathfinder extends DomainObject {

	/**
	 * 
	 * @Column(type="string")
	 * @var string
	 */
	private $name;

	/**
	 * 
	 * @Column(type="string")
	 * @var string
	 */
	private $textbible;

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
	 * @Column(type="integer")
	 * @var int
	 */
	private $churchId;

	/**
	 * 
	 * @OneToOne(targetEntity="Church")
	 * @JoinColumn(name="churchId", referencedColumnName="id")
	 * @var Church
	 */
	private $church;

	/**
	 * 
	 * @Column(type="integer")
	 * @var int
	 */
	private $logoId;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return ClubPathfinder
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTextbible() {
		return $this->textbible;
	}

	/**
	 * @param string $textbible
	 * @return ClubPathfinder
	 */
	public function setTextbible($textbible) {
		$this->textbible = $textbible;

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
	 * @return ClubPathfinder
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
	 * @return ClubPathfinder
	 */
	public function setContent($content) {
		$this->content = $content;

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
	 * @return ClubPathfinder
	 */
	public function setChurch($church) {
		$this->church = $church;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getLogoId() {
		return $this->logoId;
	}

	/**
	 * @param int $logoId
	 * @return ClubPathfinder
	 */
	public function setLogoId($logoId) {
		$this->logoId = $logoId;

		return $this;
	}
}