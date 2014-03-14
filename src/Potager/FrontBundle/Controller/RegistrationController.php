<?php

namespace Potager\FrontBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;

use Potager\FrontBundle\Form\Type;
use FOS\UserBundle\Model\UserInterface;
use Potager\BusinessBundle\Entity\Attribute;

class RegistrationController extends BaseController
{
    public function registerAction()
    {
        //$form = $this->container->get('fos_user.registration.form');
        $em = $this->container->get('doctrine.orm.entity_manager');
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setEnabled(true);

        $faction = $em->getRepository('PotagerBusinessBundle:Faction')
            ->findOneBy(array('name' => $request->get('factionName')));

        $user->setFaction($faction);

        $formFactory = $this->container->get('form.factory');
        $form = $formFactory->create("potager_front_registration", $user, array('faction' => $faction));
        $form->setData($user);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            echo 'valid';
            var_dump($form);
            die();
            $user = $form->getData();
            $userManager->updateUser($user);
            $attribute = new Attribute();
            $attribute->setUser($user);
            $em->persist($attribute);
            $em->flush();

            $authUser = true;
            $route = 'fos_user_registration_confirmed';

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route, array('factionName' => $faction->getName()));
            $response = new RedirectResponse($url);

            if ($authUser) {
                $this->authenticateUser($user, $response);
            }

            return $response;
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
            'factionName' => $faction->getName()
        ));
    }
}