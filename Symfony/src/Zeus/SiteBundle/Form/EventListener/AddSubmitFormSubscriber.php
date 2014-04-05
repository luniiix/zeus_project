<?php

// src/Zeus/SiteBundle/Form/EventListener/AddSubmitFormSubscriber.php
namespace Zeus\SiteBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddSubmitFormSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // Dit au dispatcher que vous voulez écouter l'évènement
        // form.pre_set_data et que la méthode preSetData doit être appelée
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $element = $event->getData();
        $form = $event->getForm();

        if (!$element || null === $element->getId()) {
            $form->add('ajouter', 'submit');
        }
        else{
            $form->add('modifier', 'submit');
        }
    }
}

