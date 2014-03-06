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
 * @Entity(repositoryClass="Model\Repositories\PictureNewsRepository")
 * @Table(name="PictureNews")
 */
class PictureNews extends Picture {

	/**
	 * Id of the News this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $newsId;

	/**
	 * News this model is associated with.
	 * @ManyToOne(targetEntity="News")
	 * @JoinColumn(name="newsId", referencedColumnName="id")
	 * @var News
	 */
	private $news;

	/**
	 * @return News
	 */
	public function getNews() {
		return $this->news;
	}

	/**
	 * @param News $news
	 * @return PictureNews
	 */
	public function setNews($news) {
		$this->news = $news;
		return $this;
	}
}