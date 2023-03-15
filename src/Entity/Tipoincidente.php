<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoincidente
 *
 * @ORM\Table(name="tipoincidente")
 * @ORM\Entity
 */
class Tipoincidente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tipoincidente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipoincidente_id_tipoincidente_seq", allocationSize=1, initialValue=1)
     */
    private $idTipoincidente;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=256, nullable=false)
     */
    private $nombre;

    public function getIdTipoincidente(): ?int
    {
        return $this->idTipoincidente;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }


}
