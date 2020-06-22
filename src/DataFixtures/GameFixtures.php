<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $game = new Game();
        $game->setStep(0);
        $game->setWord($this->getReference('word_' . rand(0, count(WordFixtures::WORDS))));
        $manager->persist($game);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          WordFixtures::class,
        ];
    }


}
