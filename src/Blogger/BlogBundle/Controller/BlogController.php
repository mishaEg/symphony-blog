<?php


namespace App\Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('App\\Blogger\\BlogBundle\\Entity\\Comment')
            ->getCommentsForBlog($blog->getId());

        return $this->render('@BloggerBlog/Blog/show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments
        ));
    }
}