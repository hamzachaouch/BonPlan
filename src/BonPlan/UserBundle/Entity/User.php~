<?php
/**
 * Created by PhpStorm.
 * User: Hamza
 * Date: 14/02/2018
 * Time: 10:15
 */


namespace BonPlan\UserBundle\Entity;
use FOS\MessageBundle\Model\ParticipantInterface;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

}
