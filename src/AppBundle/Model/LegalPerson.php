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

class LegalPerson
{
    /**
     * @var string
     */
    protected $legalName;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $faxNumber;

    /**
     * @var array
     */
    protected $otherPhoneNumbers = [];

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var Address
     */
    protected $currentAddress;

    /**
     * @var Address[]
     */
    protected $oldAddresses;
}
