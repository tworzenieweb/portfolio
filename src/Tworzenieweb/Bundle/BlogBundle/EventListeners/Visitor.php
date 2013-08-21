<?php

namespace Tworzenieweb\Bundle\BlogBundle\EventListeners;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\Cookie;
use Application\Sonata\NewsBundle\Manager\PostManager;
use Sonata\NewsBundle\Model\BlogInterface;

/**
 * This service is responsible for naive cookie based page views incrementing
 */

class Visitor
{
    
    /**
     *
     * @var string
     */
    private $secret;
    
    /**
     *
     * @var \Application\Sonata\NewsBundle\Manager\PostManager
     */
    private $postManager;
    
    /**
     *
     * @var \Sonata\NewsBundle\Model\BlogInterface
     */
    private $blogInterface;
    
    
    public function __construct($secret, PostManager $postManager, BlogInterface $blogInterface)
    {
        $this->secret = $secret;
        $this->postManager = $postManager;
        $this->blogInterface = $blogInterface;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        
        $request = $event->getRequest();
        
        $controllerName = $request->attributes->get('_controller');

        
        if(false !== strstr($controllerName, 'PostController::viewAction'))
        {
            $permalink = $request->get('permalink', false);
            
            if($permalink)
            {
                $pageIdentifier = sha1($this->secret . $permalink);
                
                if(!$request->cookies->has($pageIdentifier))
                {
                    $oneDayCookie = new Cookie($pageIdentifier, true, time() + 3600 * 24);
                    $event->getResponse()
                          ->headers
                          ->setCookie($oneDayCookie);
                    
                    $post = $this->postManager
                                 ->findOneByPermalink($permalink, $this->blogInterface);
                    
                    $this->postManager->updatePostPageViews($post);
                    
                }
                
            }
        }
        
        
    }

}