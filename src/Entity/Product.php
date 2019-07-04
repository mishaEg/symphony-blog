<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("SHORTNAME")
     */
    private $shortname;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("LAST")
     */
    private $last;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("CHANGE")
     */
    private $changeprise;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("NUMOFFERS")
     */
    private $numoffers;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("UPDATETIME")
     */
    private $updatetime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortname(): ?string
    {
        return $this->shortname;
    }

    public function setShortname(string $shortname): self
    {
        $this->shortname = $shortname;

        return $this;
    }

    public function getLast(): ?string
    {
        return $this->last;
    }

    public function setLast(?string $last): self
    {
        $this->last = $last;

        return $this;
    }

    public function getChangeprise(): ?string
    {
        return $this->changeprise;
    }

    public function setChangeprise(?string $changeprise): self
    {
        $this->changeprise = $changeprise;

        return $this;
    }

    public function getNumoffers(): ?string
    {
        return $this->numoffers;
    }

    public function setNumoffers(?string $numoffers): self
    {
        $this->numoffers = $numoffers;

        return $this;
    }

    public function getUpdatetime(): ?string
    {
        return $this->updatetime;
    }

    public function setUpdatetime(?string $updatetime): self
    {
        $this->updatetime = $updatetime;

        return $this;
    }
}
