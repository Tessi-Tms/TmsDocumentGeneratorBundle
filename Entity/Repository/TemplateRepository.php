<?php

/**
 *
 * @author:  Jean-Philippe CHATEAU <jp.chateau@trepia.fr>
 * @license: MIT
 *
 */

namespace Tms\Bundle\DocumentGeneratorBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * TemplateRepository
 */
class TemplateRepository extends EntityRepository
{
    /**
     * findByNameAndTagNames
     *
     * @param string|null   $name
     * @param array         $tagNames
     * @param integer|null  $limit
     * @param integer|null  $offset
     */
    public function findByNameAndTagNames($name, array $tagNames, $limit = null, $offset = null)
    {
        $queryBuilder = $this->createQueryBuilder('template');
        if (!empty($tagNames)) {
            $queryBuilder
            ->join('template.tags', 'tags')
            ->where($queryBuilder->expr()->in('tags.value', $tagNames))
            ;
        }
        if ($name) {
            $queryBuilder
                ->add('where', 'template.name = :name')
                ->setParameter('name', $name)
            ;
        }
        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }
        if ($offset) {
            $queryBuilder->setFirstResult($offset);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult()
        ;
    }
}
