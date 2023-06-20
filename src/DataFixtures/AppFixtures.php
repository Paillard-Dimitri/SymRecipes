<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i=1; $i <= 50; $i++) { 
            $ingredient = new Ingredient();
            $ingredient->setName($faker->word())
                ->setPrice(rand(1, 200));
            $manager->persist($ingredient);
        }

        $manager->flush();
    }
}
