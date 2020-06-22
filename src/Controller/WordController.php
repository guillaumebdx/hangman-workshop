<?php

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/word", name="word_")
 */
class WordController extends AbstractController
{
    /**
     * @Route("/check", name="check")
     */
    public function check(GameRepository $gameRepository, EntityManagerInterface $entityManager)
    {
        $game = $gameRepository->findOneBy([]);
        $win  = false;
        //TODO Determinate if $win is true or false according to the letter typed by the user
        if ($win) {

        } else {
            $game->setStep($game->getStep() +1);
            $entityManager->persist($game);
            $entityManager->flush();
        }
        return $this->redirectToRoute('word_word');
    }

    /**
     * @Route("/replay", name="replay")
     */
    public function replay(GameRepository $gameRepository, EntityManagerInterface $entityManager)
    {
        $game = $gameRepository->findOneBy([]);
        $game->setStep(0);
        $entityManager->persist($game);
        $entityManager->flush();
        return $this->redirectToRoute('word_word');
    }

    /**
     * @Route("/word", name="word")
     */
    public function index(GameRepository $gameRepository)
    {
        $game = $gameRepository->findOneBy([]);
        return $this->render('word/index.html.twig', [
            'game' => $game,
        ]);
    }
}
