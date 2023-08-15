<?php

namespace App\Entity;

use App\Repository\DatosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DatosRepository::class)
 */
class Datos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Nombre;



    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Clasificacion;

    /**
     * @ORM\Column(type="date")
     */
    private $fechainicio;

    /**
     * @ORM\Column(type="date")
     */
    private $fechacierre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;






    public function getId(): ?int
    {
        return $this->id;
    }


    

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getClasificacion(): ?string
    {
        return $this->Clasificacion;
    }

    public function setClasificacion(string $Clasificacion): self
    {
        $this->Clasificacion = $Clasificacion;

        return $this;
    }

    public function getFechainicio(): ?\DateTimeInterface
    {
        return $this->fechainicio;
    }

    public function setFechainicio(\DateTimeInterface $fechainicio): self
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    public function getFechacierre(): ?\DateTimeInterface
    {
        return $this->fechacierre;
    }

    public function setFechacierre(\DateTimeInterface $fechacierre): self
    {
        $this->fechacierre = $fechacierre;

        return $this;
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
}
