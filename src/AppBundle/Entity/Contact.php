<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact extends Person
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="contacts" ,cascade={"persist", "remove"})
     */
    protected $company;

    /**
     * @var Child [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Child",  mappedBy="contact")
     */
    private $children;

    /**
     * @var Wedding [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Wedding", mappedBy="contact")
     */
    private $weddings;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return Child[]|ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Child[]|ArrayCollection $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }


    public function addChild(Child $child)
    {
        $this->children->add($child);
        return $this;
    }

    public function removeChild(Child $child)
    {
        return $this->children->removeElement($child);
    }

    /**
     * @return Wedding[]|ArrayCollection
     */
    public function getWeddings()
    {
        return $this->weddings;
    }

    /**
     * @param Wedding[]|ArrayCollection $weddings
     */
    public function setWeddings($weddings)
    {
        $this->weddings = $weddings;
    }


    public function addWedding(Wedding $wedding)
    {
        $this->weddings->add($wedding);
        return $this;
    }

    public function removeWedding(Wedding $wedding)
    {
        return $this->weddings->removeElement($wedding);
    }

}
