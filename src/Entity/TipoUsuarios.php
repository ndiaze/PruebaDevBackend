<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use JMS\Serializer\Annotation as Serializer;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * TipoUsuarios
 *
 * @ORM\Table(name="TIPO_USUARIOS")
 * @ORM\Entity(repositoryClass="App\Repository\TipoUsuariosRepository")
 */
class TipoUsuarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="TIUS_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tiusId;

    /**
     * @var string
     *
     * @ORM\Column(name="TIUS_DESCRIPCION", type="string", length=30, nullable=false)
     */
    private $tiusDescripcion;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="TIUS_FECHACREACION", type="datetime", nullable=false)
     */
    private $tiusFechacreacion;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="TIUS_FECHAMODIFICACION", type="datetime", nullable=false)
     */
    private $tiusFechamodificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TIUS_FECHAELIMINACION", type="datetime", nullable=true)
     */
    private $tiusFechaeliminacion;



    /**
     * Get tiusId
     *
     * @return integer
     */
    public function getTiusId()
    {
        return $this->tiusId;
    }

    /**
     * Set tiusDescripcion
     *
     * @param string $tiusDescripcion
     *
     * @return TipoUsuarios
     */
    public function setTiusDescripcion($tiusDescripcion)
    {
        $this->tiusDescripcion = $tiusDescripcion;

        return $this;
    }

    /**
     * Get tiusDescripcion
     *
     * @return string
     */
    public function getTiusDescripcion()
    {
        return $this->tiusDescripcion;
    }

    /**
     * Set tiusFechacreacion
     *
     * @param \DateTime $tiusFechacreacion
     *
     * @return TipoUsuarios
     */
    public function setTiusFechacreacion($tiusFechacreacion)
    {
        $this->tiusFechacreacion = $tiusFechacreacion;

        return $this;
    }

    /**
     * Get tiusFechacreacion
     *
     * @return \DateTime
     */
    public function getTiusFechacreacion()
    {
        return $this->tiusFechacreacion;
    }

    /**
     * Set tiusFechamodificacion
     *
     * @param \DateTime $tiusFechamodificacion
     *
     * @return TipoUsuarios
     */
    public function setTiusFechamodificacion($tiusFechamodificacion)
    {
        $this->tiusFechamodificacion = $tiusFechamodificacion;

        return $this;
    }

    /**
     * Get tiusFechamodificacion
     *
     * @return \DateTime
     */
    public function getTiusFechamodificacion()
    {
        return $this->tiusFechamodificacion;
    }

    /**
     * Set tiusFechaeliminacion
     *
     * @param \DateTime $tiusFechaeliminacion
     *
     * @return TipoUsuarios
     */
    public function setTiusFechaeliminacion($tiusFechaeliminacion)
    {
        $this->tiusFechaeliminacion = $tiusFechaeliminacion;

        return $this;
    }

    /**
     * Get tiusFechaeliminacion
     *
     * @return \DateTime
     */
    public function getTiusFechaeliminacion()
    {
        return $this->tiusFechaeliminacion;
    }
}
