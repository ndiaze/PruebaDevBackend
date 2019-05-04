<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * TipoClientes
 *
 * @ORM\Table(name="TIPO_CLIENTES")
 * @ORM\Entity(repositoryClass="App\Repository\TipoClientesRepository")
 */
class TipoClientes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="TICL_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ticlId;

    /**
     * @var string
     *
     * @ORM\Column(name="TICL_DESCRIPCION", type="string", length=30, nullable=false)
     */
    private $ticlDescripcion;

    /**
     * @var \DateTime
     * Gedmo\Timestampable(on="create")
     * @ORM\Column(name="TICL_FECHACREACION", type="datetime", nullable=false)
     */
    private $ticlFechacreacion;

    /**
     * @var \DateTime
     * Gedmo\Timestampable(on="create")
     * @ORM\Column(name="TICL_FECHAMODIFICACION", type="datetime", nullable=false)
     */
    private $ticlFechamodificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TICL_FECHAELIMINACION", type="datetime", nullable=true)
     */
    private $ticlFechaeliminacion = 'NULL';



    /**
     * Get ticlId
     *
     * @return integer
     */
    public function getTiclId()
    {
        return $this->ticlId;
    }

    /**
     * Set ticlDescripcion
     *
     * @param string $ticlDescripcion
     *
     * @return TipoClientes
     */
    public function setTiclDescripcion($ticlDescripcion)
    {
        $this->ticlDescripcion = $ticlDescripcion;

        return $this;
    }

    /**
     * Get ticlDescripcion
     *
     * @return string
     */
    public function getTiclDescripcion()
    {
        return $this->ticlDescripcion;
    }

    /**
     * Set ticlFechacreacion
     *
     * @param \DateTime $ticlFechacreacion
     *
     * @return TipoClientes
     */
    public function setTiclFechacreacion($ticlFechacreacion)
    {
        $this->ticlFechacreacion = $ticlFechacreacion;

        return $this;
    }

    /**
     * Get ticlFechacreacion
     *
     * @return \DateTime
     */
    public function getTiclFechacreacion()
    {
        return $this->ticlFechacreacion;
    }

    /**
     * Set ticlFechamodificacion
     *
     * @param \DateTime $ticlFechamodificacion
     *
     * @return TipoClientes
     */
    public function setTiclFechamodificacion($ticlFechamodificacion)
    {
        $this->ticlFechamodificacion = $ticlFechamodificacion;

        return $this;
    }

    /**
     * Get ticlFechamodificacion
     *
     * @return \DateTime
     */
    public function getTiclFechamodificacion()
    {
        return $this->ticlFechamodificacion;
    }

    /**
     * Set ticlFechaeliminacion
     *
     * @param \DateTime $ticlFechaeliminacion
     *
     * @return TipoClientes
     */
    public function setTiclFechaeliminacion($ticlFechaeliminacion)
    {
        $this->ticlFechaeliminacion = $ticlFechaeliminacion;

        return $this;
    }

    /**
     * Get ticlFechaeliminacion
     *
     * @return \DateTime
     */
    public function getTiclFechaeliminacion()
    {
        return $this->ticlFechaeliminacion;
    }
}
