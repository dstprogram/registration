<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

 class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeDemoBundle:Default:index.html.twig', array('name' => $name));
    }
    public function mailAction($name)
{
    $mailer = $this->get('mailer');
    $message = $mailer->createMessage()
        ->setSubject('You have Completed Registration!')
        ->setFrom('sa514007@mail.ustc.edu.cn')
        ->setTo('1094006418@qq.com')
        ->setBody(
            $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                'Emails/registration.html.twig',
                array('name' => $name)
            ),
            'text/html'
        )
        /*
         * If you also want to include a plaintext version of the message
        ->addPart(
            $this->renderView(
                'Emails/registration.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        )
        */
    ;
    $mailer->send($message);

    return $this->render('AcmeDemoBundle:Default:index.html.twig', array('name' => $name));
  }
    
    
    
    
}
