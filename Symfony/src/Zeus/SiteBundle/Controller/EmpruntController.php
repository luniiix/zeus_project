<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Zeus\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zeus\SiteBundle\Form\EmpruntType;
use Zeus\SiteBundle\Entity\Emprunt;
use Zeus\SiteBundle\Entity\Exemplaire;
use Zeus\UserBundle\Entity\Utilisateur;

/**
 * Controller par défault concernant l'emprunt
 */
class EmpruntController extends Controller
{

    /**
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @name indexAction
     * @return Emprunt $emprunts Liste des emprunts en cours
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT e
            FROM ZeusSiteBundle:Emprunt e
            WHERE e.datedebut < :dateDebut
            AND e.datefin > :dateFin
            ORDER BY e.datefin ASC'
        )->setParameter(':dateDebut', date("Y-m-d H:i:s"))
         ->setParameter(':dateFin', date("Y-m-d H:i:s"));
        $emprunts = $query->getResult();
        //Formulaire
        $form = $this->createForm(new EmpruntType());
        $validator = $this->get('validator');

        return $this->render('ZeusSiteBundle:Emprunt:page_gestion.html.twig', array(
                    'emprunts' => $emprunts,
                    'form' => $form->createView(),
        ));
    }

    /**
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @name mesEmprunt
     * @return Emprunt $emprunts Liste des emprunts en cours de l'utilisateur
     */
    public function mesEmpruntsAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT e
            FROM ZeusSiteBundle:Emprunt e
            WHERE e.datedebut <= :date
            AND e.datefin >= :date
            AND e.utilisateur = :id_user
            ORDER BY e.datefin ASC'
        )->setParameter(':date', date("Y-m-d H:i:s"))
         ->setParameter(':id_user', $user->getId());
        $emprunts = $query->getResult();
        //Formulaire
        $form = $this->createForm(new EmpruntType());

        return $this->render('ZeusSiteBundle:Emprunt:mesEmprunts.html.twig', array(
                'emprunts' => $emprunts,
                'form' => $form->createView(),
            ));
    }

    /**
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @name mesEmprunt
     * @param integer $idExemplaire Id de l'exemplaire à emprunter.
     * @return type Permet l'ajout d'un nouvel emprunt.
     */
    public function ajouterAction(Request $request, $idExemplaire)
    {
        // Initialisation des variables $emprunt, $form et $validator
        $emprunt = new Emprunt();
        $form = $this->createForm(new EmpruntType(), $emprunt);

        // Récupération des informations sur l'exemplaire.
        $em = $this->getDoctrine()->getManager();
        $exemplaire = $em->getRepository('ZeusSiteBundle:Exemplaire')->findOneById($idExemplaire);

        // On vérifie que l'exemplaire n'est pas en cours de réservation
        $query = $em->createQuery(
            'SELECT e
            FROM ZeusSiteBundle:Emprunt e
            WHERE e.datedebut <= :date
            AND e.datefin >= :date
            AND e.exemplaire = :idExemplaire
            ORDER BY e.datefin ASC'
        )->setParameter(':date', date("Y-m-d H:i:s"))
         ->setParameter(':idExemplaire', $idExemplaire);
        $test = $query->getResult();

        // Si un emprunt existe on renvoie l'utilisateur sur la page d'accueil avec en message que l'exemplaire
        // est déja emprunté.
        if ($test) {
            $notification['class']   = 'warning';
            $notification['message'] = 'Cet exemplaire est déjà enprunté';
            $this->get('session')->getFlashBag()->add(
                'notification',
                $notification
            );
            return $this->redirect($this->generateUrl('zeus_site_homepage'), 301);
        }

        if (!$exemplaire) {
            $notification['class']   = 'danger';
            $notification['message'] = 'Aucun exemplaire trouvé';
            $this->get('session')->getFlashBag()->add(
                'notification',
                $notification
            );
            return $this->redirect($this->generateUrl('zeus_site_homepage'), 301);
        }

        if ($request->isMethod('POST')) {
            // Insertion des données
            $emprunt->setUtilisateur($this->getUser());
            $emprunt->setExemplaire($exemplaire);
            $form->handleRequest($request);
            if (!$form->isValid()) {
                // Envoie de la requête
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($emprunt);
                $entity_manager->flush();

                $notification['class']   = 'success';
                $notification['message'] = "L'emprunt à été enregistré";
                $this->get('session')->getFlashBag()->add(
                    'notification',
                    $notification
                );
                return $this->redirect($this->generateUrl('zeus_site_emprunt_mes_emprunts'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Emprunt:page_ajout.html.twig', array(
            'form' => $form->createView(),
            'exemplaire' => $exemplaire,
        ));
    }
}
