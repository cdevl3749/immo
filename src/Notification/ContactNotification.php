<?php
namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification {

    private $mailer;
    private $environment;

    public function __construct(\Swift_Mailer $mailer, Environment $environment){
        $this->mailer = $mailer;
        $this->environment = $environment;
    }

    public function notify(Contact $contact) {
        $message = (new \Swift_Message('Annonce : '. $contact->getProperty()->getTitle()))
        ->setFrom(array('cdevl3749@gmail.com' => $contact->getEmail()))
        ->setTo('cdevl3749@gmail.com')
        ->setBody(
            $this->environment->render(
                'emails/contact.html.twig',
                ['contact' => $contact]
            ),
            'text/html'
        );
        //dd($message) Voila ^^ deja sa c ryegleé&sssssuper;
        $this->mailer->send($message);
    }
}