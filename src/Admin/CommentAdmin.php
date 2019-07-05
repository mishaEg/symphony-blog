<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Blogger\BloggBundle\Entity\Comment;

class CommentAdmin extends Admin
{
    protected $baseRouteName = 'sonata_comment';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('comment', TextareaType::class)
            ->add('user', TextType::class);
    }

    public function toString($object)
    {
        return $object instanceof Comment
            ? $object->getTitle()
            : 'Blog Comment'; // shown in the breadcrumb on the create view
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('comment')
            ->addIdentifier('user')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => []
                ]
            ]);
    }

}