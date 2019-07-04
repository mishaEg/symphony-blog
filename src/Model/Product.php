<?php

namespace App\Model;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;

class Product
{
    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("SHORTNAME")
     */
    protected  $SHORTNAME;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("LAST")
     */
    protected  $LAST;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("CHANGE")
     */
    protected  $CHANGE;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("NUMOFFERS")
     */
    protected  $NUMOFFERS;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("UPDATETIME")
     */
    protected  $UPDATETIME;

    /**
     * @return mixed
     */
    public function getSHORTNAME()
    {
        return $this->SHORTNAME;
    }

    /**
     * @param mixed $SHORTNAME
     */
    public function setSHORTNAME($SHORTNAME): void
    {
        $this->SHORTNAME = $SHORTNAME;
    }

    /**
     * @return mixed
     */
    public function getLAST()
    {
        return $this->LAST;
    }

    /**
     * @param mixed $LAST
     */
    public function setLAST($LAST): void
    {
        $this->LAST = $LAST;
    }

    /**
     * @return mixed
     */
    public function getCHANGE()
    {
        return $this->CHANGE;
    }

    /**
     * @param mixed $CHANGE
     */
    public function setCHANGE($CHANGE): void
    {
        $this->CHANGE = $CHANGE;
    }

    /**
     * @return mixed
     */
    public function getNUMOFFERS()
    {
        return $this->NUMOFFERS;
    }

    /**
     * @param mixed $NUMOFFERS
     */
    public function setNUMOFFERS($NUMOFFERS): void
    {
        $this->NUMOFFERS = $NUMOFFERS;
    }

    /**
     * @return mixed
     */
    public function getUPDATETIME()
    {
        return $this->UPDATETIME;
    }

    /**
     * @param mixed $UPDATETIME
     */
    public function setUPDATETIME($UPDATETIME): void
    {
        $this->UPDATETIME = $UPDATETIME;
    }
}