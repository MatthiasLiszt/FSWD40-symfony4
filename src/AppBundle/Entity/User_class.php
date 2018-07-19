<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**

* @ORM\Entity

* @ORM\Table(name="users")

*/

class User_class

{

 /**

 * @ORM\Column(type="integer")

 * @ORM\Id

 * @ORM\GeneratedValue(strategy="AUTO")

 */

 private $id;

 /**

 * @ORM\Column(type="string", length=50)

 */

 private $username;

 /**

 * @ORM\Column(type="string", length=255)

 */

 private $password;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User_class
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User_class
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
