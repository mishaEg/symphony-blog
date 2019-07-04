<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    public function indexAction ($i = 0) {

        if (!$i) {
            $i = 10;
        }

        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('App\\Entity\\Product')->getProducts();

        $columns = $em->getClassMetadata('App\\Entity\\Product')->getColumnNames();

        return $this->render('index.html.twig', array(
            'products' => $products,
            'columns'  => $columns,
            'i' => $i
        ));
    }
}