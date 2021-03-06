<?php

namespace Model\Repositories;

use Doctrine\ORM\EntityRepository;
use Model\News;

/**
 * PictureNewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PictureNewsRepository extends EntityRepository {

    /**
     *
     * Alias of the table
     * @var string
     */
    private $_alias = 'picture';

    /**
     * Returns models according the filters
     * @param array $filters
     * @param int $limit
     * @param int $offset
     * @param int $sortColumn
     * @param string $sortDirection
     * @return Array Objects
     */
    public function findByCriteria($filters = array(), $limit = NULL, $offset = NULL, $sortColumn = NULL, $sortDirection = NULL) {
        $query = $this->_em->createQueryBuilder();

        $condName = "";
        foreach ($filters as $filter) {
            $condName = "$this->_alias.title LIKE :title AND ";
            $query->setParameter($filter['field'], $filter['filter']);
        }

        $query->select($this->_alias)
            ->from($this->_entityName, $this->_alias)
            ->where("$condName $this->_alias.state = TRUE")
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        $sort = '';
        switch ($sortColumn) {
            case 1:
                $sort = 'title';
                break;

    		case 2:
    			$sort = 'description';
    			break;

    		case 3:
    			$sort = 'filename';
    			break;

    		case 5:
    			$sort = 'created';
    			break;

    		case 6:
    			$sort = 'changed';
    			break;

    		default: $sort = 'id'; $sortDirection = 'desc';
    	}

    	$query->orderBy("$this->_alias.$sort", $sortDirection);

    	return $query->getQuery()->getResult();
    }

    /**
     * Finds count of models according the filters
     * @param array $filters
     * @return int
     */
    public function getTotalCount($filters = array()) {
        $query = $this->_em->createQueryBuilder();

        $condName = "";
        foreach ($filters as $filter) {
            $condName = "$this->_alias.title LIKE :title AND ";
            $query->setParameter($filter['field'], $filter['filter']);
        }

        $query->select("count($this->_alias.id)")
            ->from($this->_entityName, $this->_alias)
            ->where("$condName $this->_alias.state = TRUE");

        return (int)$query->getQuery()->getSingleScalarResult();
    }

    /**
     * Verifies if the title Picture already exist it.
     * @param string $title
     * @return boolean
     */
    public function verifyExistTitle($title) {
    	$object = $this->findOneBy(array('title' => $title, 'state' => TRUE));
    	return $object != NULL? TRUE : FALSE;
    }

    /**
     *
     * Verifies if the id and title of the category already exist.
     * @param int $id
     * @param string $title
     */
    public function verifyExistIdAndTitle($id, $title) {
    	$object = $this->findOneBy(array('id' => $id, 'title' => $title, 'state' => TRUE));
    	return $object != NULL? TRUE : FALSE;
    }

    /**
     *
     * Finds only titles by criteria
     * @param array $filters
     */
    public function findByCriteriaOnlyTitle($filters = array()) {
    	$query = $this->_em->createQueryBuilder();
    	$query->select($this->_alias)
    	   ->from($this->_entityName, $this->_alias);

    	foreach ($filters as $filter) {
    		$query->where("$this->_alias.".$filter['field'].' '.$filter['operator'].' :'.$filter['field']);
    		$query->setParameter($filter['field'], $filter['filter']);
    	}

    	return $query->getQuery()->getResult();
    }

    /**
     * (non-PHPdoc)
     * @see Doctrine\ORM.EntityRepository::findAll()
     */
    public function findAll() {
    	return $this->findBy(array('state' => TRUE));
    }

    /**
     * Returns picture models by news
     * @param News $news
     * @return Ambigous <multitype:, mixed>
     */
    public function findByNews(News $news) {
        return $this->findBy(array('state' => TRUE, 'newsId' => $news->getId()));
    }
}