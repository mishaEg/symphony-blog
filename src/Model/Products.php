<?php

namespace App\Model;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;

/* @XmlRoot("data") */
class Products
{

    /**
     * @Type("array<App\Entity\Product>")
     * @SerializedName("row")
     */
    protected $row;

    /**
     * @return mixed
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @param mixed $row
     */
    public function setRow($row): void
    {
        $this->row = $row;
    }

}