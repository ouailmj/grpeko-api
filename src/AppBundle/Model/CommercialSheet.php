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

namespace AppBundle\Model;

class CommercialSheet
{
    protected $intermediary;

    protected $otherIntermediaries;

    protected $missionType;

    /**
     * @var bool
     */
    protected $alreadyCreatedCompany;

    /**
     * @var string
     */
    protected $companyName;

    protected $legalForm;

    protected $shareCapitalAmount;

    protected $shareCapitalLiberated;

    protected $closingDate;

    protected $foundingDate;

    protected $discountIRPP;

    protected $frenchBasedCompany;
}
