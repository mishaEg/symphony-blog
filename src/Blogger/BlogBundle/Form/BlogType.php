<?php


namespace App\Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('blog', TextType::class)
            ->add('image', TextType::class)
            ->add('author', TextType::class)
            ->add('tags', TextType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Blogger\BlogBundle\Entity\Blog',
            'allow_extra_fields' => true,
        ]);
    }
    public function getName()
    {
        return 'blog_post';
    }
}