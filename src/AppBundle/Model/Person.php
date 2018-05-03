<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 03/05/2018
 * Time: 16:09
 */

namespace AppBundle\Model;


class Person extends LegalPerson
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var \DateTime
     */
    protected $birthDate;

    /**
     * @var \DateTime
     */
    protected $deathDate = null;

}