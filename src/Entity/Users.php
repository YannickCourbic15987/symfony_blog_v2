<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
// use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\Length(min: 2, max: 10)]
    #[Assert\NotBlank()]
    private string $username;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 7)]
    private string $password;
    #[ORM\Column(type: 'string', length: 200)]
    #[Assert\NotBlank()]
    #[Assert\Email]
    private string $email;

    #[ORM\Column(type: 'datetime')]
    private  DateTimeImmutable $date_account_users;

    public function __construct()
    {
        $this->date_account_users = new \DateTimeImmutable;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
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

    public function getDateAccountUsers(): ?\DateTimeInterface
    {
        return $this->date_account_users;
    }

    public function setDateAccountUsers(\DateTimeInterface $date_account_users): self
    {
        $this->date_account_users = $date_account_users;

        return $this;
    }
}
