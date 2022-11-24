<?php

namespace App\DataFixtures;

use App\Entity\Voyage;
use App\Entity\Participant;
use App\Entity\Destination;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Liste des participants
        $participant1 = new Participant();
        $participant1->setPrenompart("Tania");
        $participant1->setNompart('OLIVIA');
        $participant1->setAdressePart("Avenue Jean Monnet, 17000, La Rochelle");
        $manager->persist($participant1);

        $participant2 = new Participant();
        $participant2->setPrenompart("Michelle");
        $participant2->setNompart('OLIVIA');
        $participant2->setAdressePart("13 rue du Lion, 75908, Paris");
        $manager->persist($participant2);

        $participant3 = new Participant();
        $participant3->setPrenompart("Matthew");
        $participant3->setNompart('OLIVIAN');
        $participant3->setAdressePart("30 rue de Norvège, 17000, La Rochelle");
        $manager->persist($participant3);

        //Liste des destinations

        $destination1 = new Destination();
        $destination1->setLieudestination("Toulouse");
        $manager->persist($destination1);

        $destination2 = new Destination();
        $destination2->setLieudestination("Paris");
        $manager->persist($destination2);

        $destination3 = new Destination();
        $destination3->setLieudestination("La Rochelle");
        $manager->persist($destination3);

        //Liste des voyages
        $voyage1 = new Voyage();
        $voyage1->setRefvoyage("T0210");
        $voyage1->setResumevoyage("Voyage à Toulouse");
        $date = '02/10/2020';
        $voyage1->setDatedepartvoyage(new \DateTime ($date));

        $voyage1->addParticipant($participant1);
        $voyage1->addParticipant($participant2);

        $voyage1->setDestination($destination1);

        $manager->persist($voyage1);

        $voyage2 = new Voyage();
        $voyage2->setRefvoyage("T0112");
        $voyage2->setResumevoyage("Voyage à Toulouse");
        $date = '01/12/2020';
        $voyage2->setDatedepartvoyage(new \DateTime ($date));

        $voyage2->addParticipant($participant2);
        $voyage2->addParticipant($participant3);

        $voyage2->setDestination($destination1);

        $manager->persist($voyage2);

        $voyage3 = new Voyage();
        $voyage3->setRefvoyage("T0212");
        $voyage3->setResumevoyage("Voyage à Toulouse");
        $date = '02/12/2020';
        $voyage3->setDatedepartvoyage(new \DateTime ($date));

        $voyage3->addParticipant($participant1);
        $voyage3->addParticipant($participant3);

        $voyage3->setDestination($destination1);

        $manager->persist($voyage3);

        $voyage4 = new Voyage();
        $voyage4->setRefvoyage("LA0511");
        $voyage4->setResumevoyage("Voyage à La Rochelle");
        $date = '05/11/2020';
        $voyage4->setDatedepartvoyage(new \DateTime ($date));

        $voyage4->addParticipant($participant1);
        $voyage4->addParticipant($participant2);
        $voyage4->addParticipant($participant3);

        $voyage4->setDestination($destination2);

        $manager->persist($voyage4);

        $voyage5 = new Voyage();
        $voyage5->setRefvoyage("LA0812");
        $voyage5->setResumevoyage("Voyage à La Rochelle");
        $date = '08/12/2020';
        $voyage5->setDatedepartvoyage(new \DateTime ($date));

        $voyage5->addParticipant($participant1);

        $voyage5->setDestination($destination2);

        $manager->persist($voyage5);

        $voyage6 = new Voyage();
        $voyage6->setRefvoyage("P0912");
        $voyage6->setResumevoyage("Voyage à Paris");
        $date = '09/12/2020';
        $voyage6->setDatedepartvoyage(new \DateTime ($date));

        $voyage6->addParticipant($participant3);

        $voyage6->setDestination($destination3);

        $manager->persist($voyage6);


        $manager->flush();

    }
}
