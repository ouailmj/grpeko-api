<?php

/*
 * This file is part of the Instan't App project.
 *
 * (c) Instan't App <contact@instant-app.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Class QuotationSetting
 * @package AppBundle\Entity
 *
 *
 *
 * @ORM\Table(name="quotation_setting")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuotationSettingRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 * @ApiResource()
 */
class QuotationSetting {


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $coefficientNumberWritingByInvoice;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $numberWritingPerMinutes;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCoefficientNumberWritingByInvoice()
    {
        return $this->coefficientNumberWritingByInvoice;
    }

    /**
     * @param int $coefficientNumberWritingByInvoice
     */
    public function setCoefficientNumberWritingByInvoice(int $coefficientNumberWritingByInvoice)
    {
        $this->coefficientNumberWritingByInvoice = $coefficientNumberWritingByInvoice;
    }

    /**
     * @return int
     */
    public function getNumberWritingPerMinutes()
    {
        return $this->numberWritingPerMinutes;
    }

    /**
     * @param int $numberWritingPerMinutes
     */
    public function setNumberWritingPerMinutes(int $numberWritingPerMinutes)
    {
        $this->numberWritingPerMinutes = $numberWritingPerMinutes;
    }





}