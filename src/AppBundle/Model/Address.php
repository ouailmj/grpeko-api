<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 03/05/2018
 * Time: 16:20
 */

namespace AppBundle\Model;


class Address
{
    /**
     *
     * @var \DateTime
     */
    protected $leftAt = null;

    /**
     *
     * @var string
     */
    protected $address = '';

    /**
     *
     * @var string
     */
    protected $city = '';

    /**
     *
     * @var string
     */
    protected $country = '';

    /**
     *
     * @var string
     */
    protected $street = '';
}