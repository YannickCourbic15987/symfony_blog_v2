<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{


    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i <= 50; $i++) {

            $users = new Users();
            $users->setUsername($this->faker->word());
            $users->setPassword($this->faker->password());
            $users->setEmail($this->faker->freeEmail());
            $manager->persist($users);
        }

        $manager->flush();
    }
}
