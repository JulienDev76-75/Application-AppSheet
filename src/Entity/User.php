<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="Il existe déjà un compte pour cet e-mail, veuillez en prendre un autre.")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste;

    /**
     * @ORM\OneToMany(targetEntity=Sites::class, mappedBy="user")
     */
    private $sites;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $activation_token;

    /**
     * @ORM\OneToMany(targetEntity=CartesCadeaux::class, mappedBy="user")
     */
    private $cartesCadeaux;

    /**
     * @ORM\OneToMany(targetEntity=PlanCommunication::class, mappedBy="user")
     */
    private $planCommunications;

    /**
     * @ORM\OneToMany(targetEntity=Satisfaction::class, mappedBy="user")
     */
    private $satisfactions;

    /**
     * @ORM\Column(type="text")
     */
    private $prenom_nom;

    /**
     * @ORM\OneToMany(targetEntity=Rig::class, mappedBy="USER")
     */
    private $rigs;

    /**
     * @ORM\OneToMany(targetEntity=Pass::class, mappedBy="user")
     */
    private $passes;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $reset_token;

    public function __construct()
    {
        $this->sites = new ArrayCollection();
        $this->cartesCadeaux = new ArrayCollection();
        $this->planCommunications = new ArrayCollection();
        $this->satisfactions = new ArrayCollection();
        $this->rigs = new ArrayCollection();
        $this->totals = new ArrayCollection();
        $this->passes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * @return Collection|Sites[]
     */
    public function getSites(): Collection
    {
        return $this->sites;
    }

    public function addSite(Sites $site): self
    {
        if (!$this->sites->contains($site)) {
            $this->sites[] = $site;
            $site->setUser($this);
        }

        return $this;
    }

    public function removeSite(Sites $site): self
    {
        if ($this->sites->removeElement($site)) {
            // set the owning side to null (unless already changed)
            if ($site->getUser() === $this) {
                $site->setUser(null);
            }
        }

        return $this;
    }

    public function getActivationToken(): ?string
    {
        return $this->activation_token;
    }

    public function setActivationToken(?string $activation_token): self
    {
        $this->activation_token = $activation_token;

        return $this;
    }

    /**
     * @return Collection|CartesCadeaux[]
     */
    public function getCartesCadeaux(): Collection
    {
        return $this->cartesCadeaux;
    }

    public function addCartesCadeaux(CartesCadeaux $cartesCadeaux): self
    {
        if (!$this->cartesCadeaux->contains($cartesCadeaux)) {
            $this->cartesCadeaux[] = $cartesCadeaux;
            $cartesCadeaux->setUser($this);
        }

        return $this;
    }

    public function removeCartesCadeaux(CartesCadeaux $cartesCadeaux): self
    {
        if ($this->cartesCadeaux->removeElement($cartesCadeaux)) {
            // set the owning side to null (unless already changed)
            if ($cartesCadeaux->getUser() === $this) {
                $cartesCadeaux->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PlanCommunication[]
     */
    public function getPlanCommunications(): Collection
    {
        return $this->planCommunications;
    }

    public function addPlanCommunication(PlanCommunication $planCommunication): self
    {
        if (!$this->planCommunications->contains($planCommunication)) {
            $this->planCommunications[] = $planCommunication;
            $planCommunication->setUser($this);
        }

        return $this;
    }

    public function removePlanCommunication(PlanCommunication $planCommunication): self
    {
        if ($this->planCommunications->removeElement($planCommunication)) {
            // set the owning side to null (unless already changed)
            if ($planCommunication->getUser() === $this) {
                $planCommunication->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Satisfaction[]
     */
    public function getSatisfactions(): Collection
    {
        return $this->satisfactions;
    }

    public function addSatisfaction(Satisfaction $satisfaction): self
    {
        if (!$this->satisfactions->contains($satisfaction)) {
            $this->satisfactions[] = $satisfaction;
            $satisfaction->setUser($this);
        }

        return $this;
    }

    public function removeSatisfaction(Satisfaction $satisfaction): self
    {
        if ($this->satisfactions->removeElement($satisfaction)) {
            // set the owning side to null (unless already changed)
            if ($satisfaction->getUser() === $this) {
                $satisfaction->setUser(null);
            }
        }

        return $this;
    }

    public function getPrenomNom(): ?string
    {
        return $this->prenom_nom;
    }

    public function setPrenomNom(string $prenom_nom): self
    {
        $this->prenom_nom = $prenom_nom;

        return $this;
    }

    /**
     * @return Collection|Rig[]
     */
    public function getRigs(): Collection
    {
        return $this->rigs;
    }

    public function addRig(Rig $rig): self
    {
        if (!$this->rigs->contains($rig)) {
            $this->rigs[] = $rig;
            $rig->setUSER($this);
        }

        return $this;
    }

    public function removeRig(Rig $rig): self
    {
        if ($this->rigs->removeElement($rig)) {
            // set the owning side to null (unless already changed)
            if ($rig->getUSER() === $this) {
                $rig->setUSER(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pass[]
     */
    public function getPasses(): Collection
    {
        return $this->passes;
    }

    public function addPass(Pass $pass): self
    {
        if (!$this->passes->contains($pass)) {
            $this->passes[] = $pass;
            $pass->setUser($this);
        }

        return $this;
    }

    public function removePass(Pass $pass): self
    {
        if ($this->passes->removeElement($pass)) {
            // set the owning side to null (unless already changed)
            if ($pass->getUser() === $this) {
                $pass->setUser(null);
            }
        }

        return $this;
    }
<<<<<<< HEAD

    public function getResetToken(): ?string
    {
        return $this->reset_token;
    }

    public function setResetToken(?string $reset_token): self
    {
        $this->reset_token = $reset_token;

        return $this;
    }

=======
>>>>>>> e04c834bd43097f579a8ed7cafccbc49cb94cedb
}
