<?php

namespace App\Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('BloggerBlogBundle:Default:index.html.twig');
    }
}