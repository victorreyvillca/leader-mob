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
	 * @Column(type="string")
	 * @var string
	 */
	private $street;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $neighborhood;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $zone;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $email;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $phone;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $phonemobil;

	/**
	 * @Column(type="datetime")
	 * @var datetime
	 */
	private $dateInaguration;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $countMember;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $countUnityMen;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $countUnityWomen;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $countMemberDirective;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $flags;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $mastils;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $handbooks;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $banners;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $tents;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $bookMembers;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $observation;

	/**
	 * @Column(type="datetime")
	 * @var datetime
	 */
	private $dateRegistre;

	/**
	 * Id of the Area this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $areaId;

	/**
	 * Area this model is associated with.
	 * @ManyToOne(targetEntity="Area")
	 * @JoinColumn(name="areaId", referencedColumnName="id")
	 * @var Area
	 */
	private $area;

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
	 * Id of the Pastor this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $pastorId;

	/**
	 * Pastor this model is associated with.
	 * @ManyToOne(targetEntity="Pastor")
	 * @JoinColumn(name="pastorId", referencedColumnName="id")
	 * @var Pastor
	 */
	private $pastor;

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
	 * @return string
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * @param string $street
	 * @return Club
	 */
	public function setStreet($street) {
		$this->street = $street;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNeighborhood() {
		return $this->neighborhood;
	}

	/**
	 * @param string $neighborhood
	 * @return Club
	 */
	public function setNeighborhood($neighborhood) {
		$this->neighborhood = $neighborhood;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getZone() {
		return $this->zone;
	}

	/**
	 * @param string $zone
	 * @return Club
	 */
	public function setZone($zone) {
		$this->zone = $zone;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return Club
	 */
	public function setEmail($email) {
		$this->email = $email;
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
	 * @return Club
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPhonemobil() {
		return $this->phonemobil;
	}

	/**
	 * @param int $phonemobil
	 * @return Club
	 */
	public function setPhonemobil($phonemobil) {
		$this->phonemobil = $phonemobil;
		return $this;
	}

	/**
	 * @return datetime
	 */
	public function getDateInaguration() {
		return $this->dateInaguration;
	}

	/**
	 * @param datetime $dateInaguration
	 * @return Club
	 */
	public function setDateInaguration($dateInaguration) {
		$this->dateInaguration = $dateInaguration;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCountMember() {
		return $this->countMember;
	}

	/**
	 * @param int $countMember
	 * @return Club
	 */
	public function setCountMember($countMember) {
		$this->countMember = $countMember;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCountUnityMen() {
		return $this->countUnityMen;
	}

	/**
	 * @param int $countUnityMen
	 * @return Club
	 */
	public function setCountUnityMen($countUnityMen) {
		$this->countUnityMen = $countUnityMen;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCountUnityWomen() {
		return $this->countUnityWomen;
	}

	/**
	 * @param int $countUnityWomen
	 * @return Club
	 */
	public function setCountUnityWomen($countUnityWomen) {
		$this->countUnityWomen = $countUnityWomen;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCountMemberDirective() {
		return $this->countMemberDirective;
	}

	/**
	 * @param int $countMemberDirective
	 * @return Club
	 */
	public function setCountMemberDirective($countMemberDirective) {
		$this->countMemberDirective = $countMemberDirective;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * @param int $flags
	 * @return Club
	 */
	public function setFlags($flags) {
		$this->flags = $flags;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getMastils() {
		return $this->mastils;
	}

	/**
	 * @param int $mastils
	 */
	public function setMastils($mastils) {
		$this->mastils = $mastils;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getHandbooks() {
		return $this->handbooks;
	}

	/**
	 * @param int $handbooks
	 * @return Club
	 */
	public function setHandbooks($handbooks) {
		$this->handbooks = $handbooks;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getBanners() {
		return $this->banners;
	}

	/**
	 * @param int $banners
	 * @return Club
	 */
	public function setBanners($banners) {
		$this->banners = $banners;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTents() {
		return $this->tents;
	}

	/**
	 * @param int $tents
	 * @return Club
	 */
	public function setTents($tents) {
		$this->tents = $tents;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getBookMembers() {
		return $this->bookMembers;
	}

	/**
	 * @param int $bookMembers
	 * @return Club
	 */
	public function setBookMembers($bookMembers) {
		$this->bookMembers = $bookMembers;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getObservation() {
		return $this->observation;
	}

	/**
	 * @param string $observation
	 * @return Club
	 */
	public function setObservation($observation) {
		$this->observation = $observation;
		return $this;
	}

	/**
	 * @return datetime
	 */
	public function getDateRegistre() {
		return $this->dateRegistre;
	}

	/**
	 * @param datetime $dateRegistre
	 * @return Club
	 */
	public function setDateRegistre($dateRegistre) {
		$this->dateRegistre = $dateRegistre;
		return $this;
	}

	/**
	 * @return Pastor
	 */
	public function getPastor() {
		return $this->pastor;
	}

	/**
	 * @param Pastor $pastor
	 * @return Club
	 */
	public function setPastor($pastor) {
		$this->pastor = $pastor;
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
	 * @return Area
	 */
	public function getArea() {
		return $this->area;
	}

	/**
	 * @param Area $area
	 * @return Club
	 */
	public function setArea($area) {
		$this->area = $area;
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