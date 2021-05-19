<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $generator = Faker\Factory::create('fr_FR');

        for ($i=0; $i <= 10; $i++){
            $serie = new Serie();

            $serie->setBackdrop($generator->imageUrl())
                ->setDateCreated(new \DateTime())
                ->setFirstAirDate(new \DateTime("-1 year"))
                ->setGenres($generator->word())
                ->setLastAirDate(new \DateTime("- 6 months"))
                ->setName($generator->word())
                ->setPopularity(100.8)
                ->setPoster($generator->imageUrl())
                ->setStatus("Returning")
                ->setTmdbId(123 + $i)
                ->setVote($generator->randomFloat(2,1,10));

            $manager->persist($serie);
        }

        $manager->flush();
    }
}
