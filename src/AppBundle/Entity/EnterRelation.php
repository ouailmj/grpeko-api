<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnterRelation
 *
 * @ORM\Table(name="enter_relation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnterRelationRepository")
 */
class EnterRelation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Company
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="enterRelation" ,cascade={"persist"})
     */
    private $company;

    /**
     * @var TypeMission
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\TypeMission")
     *
     * @ORM\JoinColumn(name="type_mission_id", referencedColumnName="id")
     */
    private $typeMission;

    /**
     * Apporteur
     *
     * @var Employee
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee" ,inversedBy="enterRelations" )
     */
    private $contributor;

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
    public function getCompany()
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
     * @return Employee
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /**
     * @param Employee $contributor
     */
    public function setContributor(Employee $contributor)
    {
        $this->contributor = $contributor;
    }

    /**
     * @return TypeMission
     */
    public function getTypeMission()
    {
        return $this->typeMission;
    }

    /**
     * @param TypeMission $typeMission
     */
    public function setTypeMission(TypeMission $typeMission)
    {
        $this->typeMission = $typeMission;
    }



}
