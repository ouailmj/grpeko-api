<?php

/*
 * This file is part of the Moddus project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */


namespace AppBundle\Entity;


class FiscalYear
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
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetimetz",nullable=true)
     */
    protected $startDate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="datetimetz",nullable=true)
     */
    protected $closeDate;
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10,nullable=true)
     */
    protected $status;
    /**
     * @var integer
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $year;
    /**
     * Regime d'imposition.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $taxationRegime;
    /**
     * Regime TVA.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $vatSystem;
    /**
     * Regime Fiscal.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $taxSystem;

    /**
     * @var Mode
     *
     * @OneToOne(targetEntity="Mode")
     * @JoinColumn(name="mode_id", referencedColumnName="id")
     */
    private $mode;

    /**
     * @var LegalForm
     * @ORM\ManyToOne(targetEntity="LegalForm", inversedBy="fiscalYears")
     *
     */
    private $legalForm;

    /**
     * @return Mode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param Mode $mode
     */
    public function setMode(Mode $mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return LegalForm
     */
    public function getLegalForm()
    {
        return $this->legalForm;
    }

    /**
     * @param LegalForm $legalForm
     */
    public function setLegalForm(LegalForm $legalForm)
    {
        $this->legalForm = $legalForm;
    }



}