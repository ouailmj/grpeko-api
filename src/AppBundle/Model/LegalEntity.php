<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 04/05/2018
 * Time: 22:48
 */

namespace AppBundle\Model;


class LegalEntity
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