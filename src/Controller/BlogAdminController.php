<?php

namespace App\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Blogger\BlogBundle\Entity\Blog;

class BlogAdminController extends CRUDController
{
    public function deleteBlogAction($id)
    {
        /**
         * @var $blogPost Blog
         */
        $blogPost = $this->admin->getSubject();

        if (!$blogPost) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id: %s', $id));
        }

        $em = $this->getDoctrine()->getManager();

        //$comments = $blogPost->getComments();

        $em = $this->getDoctrine()->getManager();

        /*foreach ($comments as $comment) {
            $em->remove($comment);
            $em->flush();
        }*/

        $em->remove($blogPost);
        $em->flush();

        return new RedirectResponse($this->admin->generateUrl('list'));
    }
}