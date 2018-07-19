<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\User_class;


class UserController extends Controller {

 /**

 * @Route("/register/addUser")

 */

 public function addUser()

 {

 $newUser = new User_class();

 $newUser->setUsername($_POST['username']);

 $newUser->setPassword(hash('sha256', $_POST['password']));


 $doct = $this->getDoctrine()->getManager();

 // tells Doctrine you want to save the Product

 $doct->persist($newUser);

 //executes the queries (i.e. the INSERT query)

 $doct->flush();

 return new Response('new user added with id ' . $newUser->getId());

 }

/**
     * @Route("/register", name="register")
     */
    public function indexAction(/*Request $request*/)
    {
        // replace this example code with whatever you need
        return $this->render('symcar/register.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

}


