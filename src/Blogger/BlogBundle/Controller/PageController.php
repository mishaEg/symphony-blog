<?php

namespace App\Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('@BloggerBlog/Page/index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('@BloggerBlog/Page/about.html.twig');
    }
}
