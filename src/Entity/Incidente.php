<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Incidente
 *
 * @ORM\Table(name="incidente", indexes={@ORM\Index(name="IDX_12858081DB38439E", columns={"usuario_id"}), @ORM\Index(name="IDX_128580814B7EC777", columns={"tipoincidente_id"})})
 * @ORM\Entity
 */
class Incidente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_incidente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="incidente_id_incidente_seq", allocationSize=1, initialValue=1)
     */
    private $idIncidente;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=20000, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=20000, nullable=false)
     */
    private $observacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solucion", type="string", length=20000, nullable=true)
     */
    private $solucion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=256, nullable=false)
     */
    private $estado;

    /**
     * @var float|null
     *
     * @ORM\Column(name="costo", type="float", precision=10, scale=0, nullable=true)
     */
    private $costo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lugar", type="string", length=256, nullable=true)
     */
    private $lugar;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id_usuario")
     * })
     */
    private $usuario;

    /**
     * @var \Tipoincidente
     *
     * @ORM\ManyToOne(targetEntity="Tipoincidente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoincidente_id", referencedColumnName="id_tipoincidente")
     * })
     */
    private $tipoincidente;

    public function getIdIncidente(): ?int
    {
        return $this->idIncidente;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(string $observacion): self
    {
        $this->observacion = $observacion;

        return $this;
    }

    public function getSolucion(): ?string
    {
        return $this->solucion;
    }

    public function setSolucion(?string $solucion): self
    {
        $this->solucion = $solucion;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCosto(): ?float
    {
        return $this->costo;
    }

    public function setCosto(?float $costo): self
    {
        $this->costo = $costo;

        return $this;
    }

    public function getLugar(): ?string
    {
        return $this->lugar;
    }

    public function setLugar(?string $lugar): self
    {
        $this->lugar = $lugar;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getTipoincidente(): ?Tipoincidente
    {
        return $this->tipoincidente;
    }

    public function setTipoincidente(?Tipoincidente $tipoincidente): self
    {
        $this->tipoincidente = $tipoincidente;

        return $this;
    }


}
