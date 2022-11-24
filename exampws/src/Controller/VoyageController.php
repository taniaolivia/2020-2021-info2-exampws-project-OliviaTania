<?php

namespace App\Controller;

use App\Entity\Voyage;
use App\Entity\Participant;
use App\Entity\Destination;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyageController extends AbstractController
{
    /**
     * @Route("/voyages", name="voyages")
     */
    public function index()
    {
        //accès aux services Doctrine, puis Repository de l'objet Liste:
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\Voyage');

        //Récupération du magasin choisi par un identifiant
        $ListeVoyages = $repository->findAll();

        return $this->render('voyage/index.html.twig', [
            'voyages' => $ListeVoyages,
        ]);
    }

    /**
     * @Route("/voyages/{id}", name="detailvoyage")
     */
    public function detailvoyage($id)
    {
        //accès aux services Doctrine, puis Repository de l'objet Liste:
        $repository = $this->getDoctrine()->getManager();

        //récupération de voyage passé en paramètre
        $VoyageChoisi = $repository->getRepository(Voyage::class)->find($id);

        //récupération de toutes les partipants associé à ce voyage:
        $listeParticipants = $VoyageChoisi->getParticipant();

        //récupération de toutess les destinations associé à ce voyage :
        $listeDestinations = $VoyageChoisi->getDestination();

        return $this->render('voyage/detailvoyage.html.twig', [
            'voyage' => $VoyageChoisi,
            'destination' => $listeDestinations,
            'participant' => $listeParticipants,

        ]);
    }

    /**
     * @Route("/stats", name="stats")
     */
    public function stats()
    {
        //accès aux services Doctrine, puis Repository de l'objet Liste:
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\Voyage');

        //Récupération de la liste des voyages
        $ListeVoyages = $repository->findAll();

        return $this->render('voyage/stats.html.twig', [
            'voyage' => $ListeVoyages,
        ]);
    }
}
