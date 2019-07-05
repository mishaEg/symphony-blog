<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Sonata\AdminBundle\Route\RouteCollection;

use App\Blogger\BloggBundle\Entity\Blog;
use App\Blogger\BloggBundle\Entity\Comment;

class BlogAdmin extends Admin
{
    protected $baseRouteName = 'blog_post';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->add('deleteBlog', $this->getRouterIdParameter().'/deleteBlog');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', TextType::class)
            ->add('blog', TextareaType::class);
            //->add('comments', Comment::class);
    }

    public function toString($object)
    {
        return $object instanceof Blog
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                    'deleteBlog' => [
                        'template' => 'CRUD/list__action_delete.html.twig',
                    ]
                ]
            ]);
    }
}