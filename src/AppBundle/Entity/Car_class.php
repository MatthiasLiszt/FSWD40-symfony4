<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**

* @ORM\Entity

* @ORM\Table(name="cars")

*/

class Car_class

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

 private $carType;

 /**

 * @ORM\Column(type="integer")

 */

 private $seats;

 /**

 * @ORM\Column(type="integer")

 */

 private $carPower;

 /**

 * @ORM\Column(type="integer")

 */

 private $prodYear;

 /**

 * @ORM\Column(type="string", length=50)

 */

 private $office;

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
     * Set carType
     *
     * @param string $carType
     *
     * @return Car_class
     */
    public function setCarType($carType)
    {
        $this->carType = $carType;

        return $this;
    }

    /**
     * Get carType
     *
     * @return string
     */
    public function getCarType()
    {
        return $this->carType;
    }

    /**
     * Set seats
     *
     * @param integer $seats
     *
     * @return Car_class
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get seats
     *
     * @return integer
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set carPower
     *
     * @param integer $carPower
     *
     * @return Car_class
     */
    public function setCarPower($carPower)
    {
        $this->carPower = $carPower;

        return $this;
    }

    /**
     * Get carPower
     *
     * @return integer
     */
    public function getCarPower()
    {
        return $this->carPower;
    }

    /**
     * Set prodYear
     *
     * @param integer $prodYear
     *
     * @return Car_class
     */
    public function setProdYear($prodYear)
    {
        $this->prodYear = $prodYear;

        return $this;
    }

    /**
     * Get prodYear
     *
     * @return integer
     */
    public function getProdYear()
    {
        return $this->prodYear;
    }

    /**
     * Set office
     *
     * @param string $office
     *
     * @return Car_class
     */
    public function setOffice($office)
    {
        $this->office = $office;

        return $this;
    }

    /**
     * Get office
     *
     * @return string
     */
    public function getOffice()
    {
        return $this->office;
    }
}
