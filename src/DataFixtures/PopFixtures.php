<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Toy;
use App\Entity\Category;

class PopFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $collection1= new Category();
        $collection1->setName('Assassin\'s Creed Collection');

        $toy1 = new Toy();
        $toy1->setName('Gollum');
        $toy1->setDescription('Figurine POP représentant le personnage de Gollum dans le Seigneur des Anneaux.');
        $toy1->setPrice(12.90);
        $toy1->setSize(20,3);
        $toy1->setReference(150);
        $toy1->setCategory($collection1);
        $toy1->setViewCounter(0);

        $manager->persist($toy1);

        $toy2 = new Toy();
        $toy2->setName('Arno');
        $toy2->setDescription('Figurine POP représentant le personnage d\'Arno dans le jeu video Assassin\'s Creed Unity.');
        $toy2->setPrice(15.50);
        $toy2->setSize(10);
        $toy2->setReference(376);
        $toy2->setCategory($collection1);
        $toy2->setViewCounter(0);

        $manager->persist($toy2); 

        $toy3 = new Toy();
        $toy3->setName('Reaper');
        $toy3->setDescription('Figurine POP représentant le personnage de Faucheur dans le jeu video OverWatch.');
        $toy3->setPrice(11);
        $toy3->setSize(5);
        $toy3->setReference(10);
        $toy3->setCategory($collection1);
        $toy3->setViewCounter(0);
        $manager->persist($toy3); 

        $manager->persist($collection1);

        $manager->flush();
    }
}
