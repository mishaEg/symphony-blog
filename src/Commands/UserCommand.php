<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use JMS\Serializer\SerializerBuilder;

use Symfony\Component\DependencyInjection\ContainerInterface;

use App\Entity\Product;

class UserCommand extends Command
{
    protected static $defaultName = 'app:parse-xml';

    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $xml = simplexml_load_file('public\\mmvb.xml');

        $serializer = SerializerBuilder::create()->build();

        foreach ($xml->xpath("//row") as $row) {
            $products = $serializer->deserialize($row->asXML(), Product::class, 'xml');

            $em = $this->container->get('doctrine')->getManager();
            $em->persist($products);
            $em->flush();
        }
    }
}