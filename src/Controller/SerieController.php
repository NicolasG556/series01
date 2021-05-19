<?php

namespace App\Controller;

use App\Repository\SerieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/series", name="serie_list")
     */
    public function list(SerieRepository $serieRepository, EntityManagerInterface $entityManager): Response
    {


        //TODO Recuperer la liste de mes séries

      // $serieRepository = $this->getDoctrine()->getRepository(Serie::class);
        // $serieRepository = $entityManager->getRepository(Serie::class);

        //$series = $serieRepository->findAll();

        //$series = $serieRepository->findBy([], ["vote" => "DESC"], 50);

        $series = $serieRepository->findBestSeries();

        return $this->render('serie/list.html.twig', [
            "series" => $series
        ]);
    }

    /**
     * @Route("/series/detail/{id}", name="serie_detail")
     */
    public function detail($id, SerieRepository $serieRepository): Response
    {

        $series = $serieRepository->find($id);

        if(!$series){
            //throw $this->createNotFoundException("Oops ! This serie does not exist ! ");

            return $this->redirectToRoute('main_home');
        }

        //TODO Recuperer la série en fonction de son id

        return $this->render('serie/detail.html.twig', [
            "serie" => $series
        ]);
    }

    /**
     * @Route("/series/create/", name="serie_create")
     */
    public function create(): Response
    {

        //TODO Generé un form pour ajouter une nouvelle serie

        return $this->render('serie/create.html.twig', [

        ]);
    }
}
