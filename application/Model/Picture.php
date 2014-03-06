<?php
/**
 * Model Doctrine 2 for MOB
 *
 * @category Dist
 * @package Models
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2014 Emini A/S
 * @license Proprietary
 */

namespace Model;

/**
 * @Entity(repositoryClass="Model\Repositories\PictureRepository")
 * @Table(name="Picture")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"picture"="Picture", "pictureNews"="PictureNews"})
 */
class Picture extends DomainObject {

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $title;

	/**
	 * @Column(type="text")
	 * @var string
	 */
	private $description;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $filename;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $mimeType;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $src;

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return Picture
	 */
	public function setTitle($title) {
		$this->title = $title;
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
	 * @return Picture
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFilename() {
		return $this->filename;
	}

	/**
	 * @param string $filename
	 * @return Picture
	 */
	public function setFilename($filename) {
		$this->filename = $filename;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMimeType() {
		return $this->mimeType;
	}

	/**
	 * @param string $mimeType
	 * @return Picture
	 */
	public function setMimeType($mimeType) {
		$this->mimeType = $mimeType;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @param string $src
	 * @return Picture
	 */
	public function setSrc($src) {
		$this->src = $src;
		return $this;
	}
}