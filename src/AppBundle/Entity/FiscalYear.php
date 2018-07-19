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