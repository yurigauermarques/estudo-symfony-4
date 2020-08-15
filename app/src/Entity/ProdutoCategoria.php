<?php

namespace App\Entity;

use App\Repository\ProdutoCategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProdutoCategoriaRepository::class)
 */
class ProdutoCategoria {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $situacao;

    /**
     * @ORM\OneToMany(targetEntity=Produto::class, mappedBy="produtoCategoria")
     */
    private $produto;

    public function __toString() {
        return $this->getNome();
    }

    public function __construct() {
        $this->produto = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        $this->nome = $nome;

        return $this;
    }

    public function getSituacao(): ?string {
        return $this->situacao;
    }

    public function setSituacao(string $situacao): self {
        $this->situacao = $situacao;

        return $this;
    }

    /**
     * @return Collection|Produto[]
     */
    public function getProduto(): Collection {
        return $this->produto;
    }

    public function addProduto(Produto $produto): self {
        if (!$this->produto->contains($produto)) {
            $this->produto[] = $produto;
            $produto->setProdutoCategoria($this);
        }

        return $this;
    }

    public function removeProduto(Produto $produto): self {
        if ($this->produto->contains($produto)) {
            $this->produto->removeElement($produto);
            // set the owning side to null (unless already changed)
            if ($produto->getProdutoCategoria() === $this) {
                $produto->setProdutoCategoria(null);
            }
        }

        return $this;
    }

}
