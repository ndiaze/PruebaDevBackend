<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use JMS\Serializer\Annotation as Serializer;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Usuarios
 *
 * @ORM\Table(name="USUARIOS", uniqueConstraints={@ORM\UniqueConstraint(name="USUA_CORREO_UNIQUE", columns={"USUA_CORREO"})}, indexes={@ORM\Index(name="fk_USUARIOS_TIPO_CLIENTES_idx", columns={"USUA_TICL_ID"}), @ORM\Index(name="fk_USUARIOS_TIPO_USUARIOS1_idx", columns={"USUA_TIUS_ID"})})
 * @ORM\Entity(repositoryClass="App\Repository\UsuariosRepository")
 */
class Usuarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="USUA_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usuaId;

    /**
     * @var string
     *
     * @ORM\Column(name="USUA_NOMBRE", type="string", length=30, nullable=false)
     */
    private $usuaNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="USUA_APELLIDOPATERNO", type="string", length=30, nullable=true)
     */
    private $usuaApellidopaterno = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="USUA_APELLIDOMATERNO", type="string", length=30, nullable=false)
     */
    private $usuaApellidomaterno;

    /**
     * @var string
     *
     * @ORM\Column(name="USUA_CORREO", type="string", length=255, nullable=false)
     */
    private $usuaCorreo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="USUA_ESTADO", type="boolean", nullable=false)
     */
    private $usuaEstado = '1';

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="USUA_FECHACREACION", type="datetime", nullable=false)
     */
    private $usuaFechacreacion;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="USUA_FECHAMODIFICACION", type="datetime", nullable=false)
     */
    private $usuaFechamodificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="USUA_FECHAELIMINACION", type="datetime", nullable=true)
     */
    private $usuaFechaeliminacion;

    /**
     * @var \TipoClientes
     *
     * @ORM\ManyToOne(targetEntity="TipoClientes", cascade={"persist", "remove" })
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="USUA_TICL_ID", referencedColumnName="TICL_ID")
     * })
     */
    private $usuaTicl;

    /**
     * @var \TipoUsuarios
     *
     * @ORM\ManyToOne(targetEntity="TipoUsuarios", cascade={"persist", "remove" })
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="USUA_TIUS_ID", referencedColumnName="TIUS_ID")
     * })
     */
    private $usuaTius;



    /**
     * Get usuaId
     *
     * @return integer
     */
    public function getUsuaId()
    {
        return $this->usuaId;
    }

    /**
     * Set usuaNombre
     *
     * @param string $usuaNombre
     *
     * @return Usuarios
     */
    public function setUsuaNombre($usuaNombre)
    {
        $this->usuaNombre = $usuaNombre;

        return $this;
    }

    /**
     * Get usuaNombre
     *
     * @return string
     */
    public function getUsuaNombre()
    {
        return $this->usuaNombre;
    }

    /**
     * Set usuaApellidopaterno
     *
     * @param string $usuaApellidopaterno
     *
     * @return Usuarios
     */
    public function setUsuaApellidopaterno($usuaApellidopaterno)
    {
        $this->usuaApellidopaterno = $usuaApellidopaterno;

        return $this;
    }

    /**
     * Get usuaApellidopaterno
     *
     * @return string
     */
    public function getUsuaApellidopaterno()
    {
        return $this->usuaApellidopaterno;
    }

    /**
     * Set usuaApellidomaterno
     *
     * @param string $usuaApellidomaterno
     *
     * @return Usuarios
     */
    public function setUsuaApellidomaterno($usuaApellidomaterno)
    {
        $this->usuaApellidomaterno = $usuaApellidomaterno;

        return $this;
    }

    /**
     * Get usuaApellidomaterno
     *
     * @return string
     */
    public function getUsuaApellidomaterno()
    {
        return $this->usuaApellidomaterno;
    }

    /**
     * Set usuaCorreo
     *
     * @param string $usuaCorreo
     *
     * @return Usuarios
     */
    public function setUsuaCorreo($usuaCorreo)
    {
        $this->usuaCorreo = $usuaCorreo;

        return $this;
    }

    /**
     * Get usuaCorreo
     *
     * @return string
     */
    public function getUsuaCorreo()
    {
        return $this->usuaCorreo;
    }

    /**
     * Set usuaEstado
     *
     * @param boolean $usuaEstado
     *
     * @return Usuarios
     */
    public function setUsuaEstado($usuaEstado)
    {
        $this->usuaEstado = $usuaEstado;

        return $this;
    }

    /**
     * Get usuaEstado
     *
     * @return boolean
     */
    public function getUsuaEstado()
    {
        return $this->usuaEstado;
    }

    /**
     * Set usuaFechacreacion
     *
     * @param \DateTime $usuaFechacreacion
     *
     * @return Usuarios
     */
    public function setUsuaFechacreacion($usuaFechacreacion)
    {
        $this->usuaFechacreacion = $usuaFechacreacion;

        return $this;
    }

    /**
     * Get usuaFechacreacion
     *
     * @return \DateTime
     */
    public function getUsuaFechacreacion()
    {
        return $this->usuaFechacreacion;
    }

    /**
     * Set usuaFechamodificacion
     *
     * @param \DateTime $usuaFechamodificacion
     *
     * @return Usuarios
     */
    public function setUsuaFechamodificacion($usuaFechamodificacion)
    {
        $this->usuaFechamodificacion = $usuaFechamodificacion;

        return $this;
    }

    /**
     * Get usuaFechamodificacion
     *
     * @return \DateTime
     */
    public function getUsuaFechamodificacion()
    {
        return $this->usuaFechamodificacion;
    }

    /**
     * Set usuaFechaeliminacion
     *
     * @param \DateTime $usuaFechaeliminacion
     *
     * @return Usuarios
     */
    public function setUsuaFechaeliminacion($usuaFechaeliminacion)
    {
        $this->usuaFechaeliminacion = $usuaFechaeliminacion;

        return $this;
    }

    /**
     * Get usuaFechaeliminacion
     *
     * @return \DateTime
     */
    public function getUsuaFechaeliminacion()
    {
        return $this->usuaFechaeliminacion;
    }

    /**
     * Set usuaTicl
     *
     * @param \App\Entity\TipoClientes $usuaTicl
     *
     * @return Usuarios
     */
    public function setUsuaTicl(\App\Entity\TipoClientes $usuaTicl = null)
    {
        $this->usuaTicl = $usuaTicl;

        return $this;
    }

    /**
     * Get usuaTicl
     *
     * @return \AppBundle\Entity\TipoClientes
     */
    public function getUsuaTicl()
    {
        return $this->usuaTicl;
    }

    /**
     * Set usuaTius
     *
     * @param \App\Entity\TipoUsuarios $usuaTius
     *
     * @return Usuarios
     */
    public function setUsuaTius(\App\Entity\TipoUsuarios $usuaTius = null)
    {
        $this->usuaTius = $usuaTius;

        return $this;
    }

    /**
     * Get usuaTius
     *
     * @return \AppBundle\Entity\TipoUsuarios
     */
    public function getUsuaTius()
    {
        return $this->usuaTius;
    }
}
