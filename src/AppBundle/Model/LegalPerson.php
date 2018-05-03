<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 03/05/2018
 * Time: 16:23
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
    protected $email;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var array
     */
    protected $otherPhoneNumbers = array(
        'home'      => '',
        'work'      => '',
        'fax'       => '',
        'mobile'    => ''
    );

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