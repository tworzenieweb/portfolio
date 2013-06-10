<?php

namespace Application\Sonata\NewsBundle\Controller;

use Sonata\NewsBundle\Controller\PostController as BaseController;

class PostController extends BaseController
{
 
    /**
     * @throws NotFoundHttpException
     *
     * @param $permalink
     *
     * @return Response
     */
    public function viewAction($permalink)
    {
        $post = $this->getPostManager()->findOneByPermalink($permalink, $this->container->get('sonata.news.blog'));

        $previousPost = $this->getPostManager()->getPreviousPost($post);
        $nextPost = $this->getPostManager()->getNextPost($post);
        
        if (!$post || !$post->isPublic()) {
            throw new NotFoundHttpException('Unable to find the post');
        }

        if ($seoPage = $this->getSeoPage()) {
            $seoPage
                ->setTitle($post->getTitle())
                ->addMeta('name', 'description', $post->getAbstract())
                ->addMeta('property', 'og:title', $post->getTitle())
                ->addMeta('property', 'og:type', 'blog')
                ->addMeta('property', 'og:url',  $this->generateUrl('sonata_news_view', array(
                    'permalink'  => $this->getBlog()->getPermalinkGenerator()->generate($post, true)
                ), true))
                ->addMeta('property', 'og:description', $post->getAbstract())
            ;
        }

        return $this->render('SonataNewsBundle:Post:view.html.twig', array(
            'post' => $post,
            'form' => false,
            'blog' => $this->get('sonata.news.blog'),
            'previousPost' => $previousPost,
            'nextPost' => $nextPost
        ));
    }
    
    
}