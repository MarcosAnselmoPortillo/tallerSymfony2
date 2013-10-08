<?php

namespace Taller\Bundle\CursoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Curso
 *
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="Taller\Bundle\CursoBundle\Entity\CursoRepository")
 */
class Curso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Alumno", mappedBy="cursos")
     */
    private $alumnos;
   
    /**
     *
     * @ORM\ManyToOne(targetEntity="Materia",inversedBy="cursos",cascade={"persist"})
     * @ORM\JoinColumn(name="materia_id",referencedColumnName="id", nullable=false) 
     */
    private $materia;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Curso
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add alumnos
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Alumno $alumnos
     * @return Curso
     */
    public function addAlumno(\Taller\Bundle\CursoBundle\Entity\Alumno $alumnos)
    {
        $this->alumnos[] = $alumnos;
    
        return $this;
    }

    /**
     * Remove alumnos
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Alumno $alumnos
     */
    public function removeAlumno(\Taller\Bundle\CursoBundle\Entity\Alumno $alumnos)
    {
        $this->alumnos->removeElement($alumnos);
    }

    /**
     * Get alumnos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }

    /**
     * Set materia
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Materia $materia
     * @return Curso
     */
    public function setMateria(\Taller\Bundle\CursoBundle\Entity\Materia $materia)
    {
        $this->materia = $materia;
    
        return $this;
    }

    /**
     * Get materia
     *
     * @return \Taller\Bundle\CursoBundle\Entity\Materia 
     */
    public function getMateria()
    {
        return $this->materia;
    }
    
    public function __toString() {
        return $this->getNombre();
    }
}