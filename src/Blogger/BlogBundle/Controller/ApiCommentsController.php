<?php

namespace App\Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\AbstractFOSRestController ;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Blogger\BlogBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Response;
use App\Blogger\BlogBundle\Entity\Comment;

/**
 * Class BlogPostsController
 * @package AppBundle\Controller
 *
 * @RouteResource("comment")
 */
class ApiCommentsController extends AbstractFOSRestController  implements ClassResourceInterface
{
    public function postAction(Request $request)
    {
        $form = $this->createForm(CommentType::class, null, [
            'csrf_protection' => false,
        ]);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        $commentPost = $form->getData();

        $em = $this->getDoctrine()->getManager();
        $em->persist($commentPost);
        $em->flush();

        $routeOptions = [
            'id' => $commentPost->getId(),
            '_format' => $request->get('_format'),
        ];

        return new Response(
            '<html><body><center>Comment '.$commentPost->getId().' was created</center></body></html>'
        );
    }

    public function putAction(Request $request, int $id)
    {

        $blogPost = $this->getBlogPostRepository()->find($id);

        if ($blogPost === null) {
            return new View(null, Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(CommentType::class, $blogPost, [
            'csrf_protection' => false,
        ]);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $routeOptions = [
            'id' => $blogPost->getId(),
            '_format' => $request->get('_format'),
        ];

        return new Response(
            '<html><body><center>Comment '.$blogPost->getId().' was updated</center></body></html>'
        );
    }

    public function patchAction(Request $request, int $id)
    {
        /**
         * @var $blogPost BlogPost
         */
        $commentPost = $this->getBlogPostRepository()->find($id);
        if ($commentPost === null) {
            return new View(null, Response::HTTP_NOT_FOUND);
        }
        $form = $this->createForm(CommentType::class, $blogPost, [
            'csrf_protection' => false,
        ]);
        $form->submit($request->request->all(), false);
        if (!$form->isValid()) {
            return $form;
        }
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $routeOptions = [
            'id' => $blogPost->getId(),
            '_format' => $request->get('_format'),
        ];

        return new Response(
            '<html><body><center>Comment '.$commentPost->getId().' was patched</center></body></html>'
        );
    }

    public function deleteAction(int $id)
    {
        /**
         * @var $blogPost Blog
         */
        $commentPost = $this->getBlogPostRepository()->find($id);
        if ($commentPost === null) {
            return new View(null, Response::HTTP_NOT_FOUND);
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($commentPost);
        $em->flush();

        return new Response(
            '<html><body><center>Comment '.$id.' was deleted</center></body></html>'
        );
    }

    private function getBlogPostRepository()
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository(Comment::class);
    }
}