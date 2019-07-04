<?php

namespace App\Twig\Extensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('cast_to_array', array($this, 'castToArray')),
        );
    }

    public function castToArray ($stdClassObject) {
        $response = (array)$stdClassObject;

        return $response;
    }
}