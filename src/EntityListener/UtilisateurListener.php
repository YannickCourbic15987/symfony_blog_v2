<?php

namespace App\EntityListener;

use App\Entity\Utilisateur;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateurListener
{
    private  UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function prePersist(Utilisateur $utilisateur)
    {
        $this->encodePassword($utilisateur);
    }

    public function preUpdate(Utilisateur $utilisateur)
    {
        $this->encodePassword($utilisateur);
    }
    /** 
     * @param Utilisateur $name
     * @return void
     * 
     */
    public function encodePassword(Utilisateur $utilisateur)
    {
        if ($utilisateur->getPlainPassword() === null) {
            return;
        }
        $utilisateur->setPassword(
            $this->hasher->hashPassword(
                $utilisateur,
                $utilisateur->getPlainPassword()
            )
        );
    }
}
