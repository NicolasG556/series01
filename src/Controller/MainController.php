<?php


namespace App\Controller;


use App\Entity\Serie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home()
    {
        return $this->render("main/home.html.twig");
    }

    /**
     * @Route("/test/", name="main_test")
     */
    public function test(EntityManagerInterface $entityManager)
    {
        $serie = new Serie();

        $serie->setBackdrop("abcdefghij")
                ->setDateCreated(new \DateTime())
                ->setFirstAirDate(new \DateTime("-1 year"))
                ->setGenres("Western")
                ->setLastAirDate(new \DateTime("- 6 months"))
                ->setName("Lucky Luke")
                ->setPopularity(100.8)
                ->setPoster("jihfzeajihf")
                ->setStatus("Returning")
                ->setTmdbId(123456)
                ->setVote(9.8);

        $serie2 = new Serie();

        $serie2->setBackdrop("abcdefghij")
            ->setDateCreated(new \DateTime())
            ->setFirstAirDate(new \DateTime("-1 year"))
            ->setGenres("Western")
            ->setLastAirDate(new \DateTime("- 6 months"))
            ->setName("Dalton")
            ->setPopularity(100.8)
            ->setPoster("jihfzeajihf")
            ->setStatus("Returning")
            ->setTmdbId(123456)
            ->setVote(9.8);

        //Autre possibilité pour récuperé l'instance de EntityManager
        //$entityManager = $this->>getDoctrine()->getManager();

        dump($serie);

        $entityManager->persist($serie);
        $entityManager->persist($serie2);
        $entityManager->flush();

        $serie->setName("Calamity Jane");
        $entityManager->persist($serie);
        $entityManager->flush();

        dump($serie);

        $entityManager->remove($serie);
        $entityManager->flush();

        return $this->render("main/test.html.twig",[
           ]);

    }
}