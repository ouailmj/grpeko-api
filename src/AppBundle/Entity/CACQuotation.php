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

use Doctrine\ORM\Mapping as ORM;


/**
 * Class CACQuotation
 * @package AppBundle\Entity
 *
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CACQuotationRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class CACQuotation extends JobQuotation
{

}