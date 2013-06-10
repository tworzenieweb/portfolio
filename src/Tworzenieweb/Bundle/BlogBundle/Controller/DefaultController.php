<?php

namespace Tworzenieweb\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TworzeniewebBlogBundle:Default:index.html.twig');
    }
}
