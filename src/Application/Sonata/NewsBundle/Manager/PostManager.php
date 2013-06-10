<?php

namespace Application\Sonata\NewsBundle\Manager;

use Sonata\NewsBundle\Entity\PostManager as BasePostManager;
use Application\Sonata\NewsBundle\Entity\Post;
use Doctrine\ORM\Query\Expr;

class PostManager extends BasePostManager
{
    /**
     * Get previous post
     * @param \Application\Sonata\NewsBundle\Entity\Post $post
     * @return \Application\Sonata\NewsBundle\Entity\Post
     */
    public function getPreviousPost(Post $post)
    {
        return $this->em->getRepository($this->class)
            ->createQueryBuilder('p')
            ->select('p, t')
            ->leftJoin('p.tags', 't', Expr\Join::WITH, 't.enabled = true')
            ->leftJoin('p.author', 'a', Expr\Join::WITH, 'a.enabled = true')
            ->where('p.id < ?1')
            ->setParameter(1, $post->getId())
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
    
    /**
     * Get next post
     * @param \Application\Sonata\NewsBundle\Entity\Post $post
     * @return \Application\Sonata\NewsBundle\Entity\Post
     */
    public function getNextPost(Post $post)
    {
        return $this->em->getRepository($this->class)
            ->createQueryBuilder('p')
            ->select('p, t')
            ->leftJoin('p.tags', 't', Expr\Join::WITH, 't.enabled = true')
            ->leftJoin('p.author', 'a', Expr\Join::WITH, 'a.enabled = true')
            ->where('p.id > ?1')
            ->setParameter(1, $post->getId())
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
    
}
