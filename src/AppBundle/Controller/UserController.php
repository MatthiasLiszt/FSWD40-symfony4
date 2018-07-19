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
    public function registerAction(/*Request $request*/)
    {
        // replace this example code with whatever you need
        return $this->render('symcar/register.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

/**
     * @Route("/login", name="login")
     */
    public function loginAction(/*Request $request*/)
    {
      $user=new User_class;
      $repository = $this->getDoctrine()->getRepository('AppBundle:User_class');
      $username=$_POST['username'];
      $pw=hash('sha256',$_POST['password']);
      //echo $username." ".$pw;
      $query=["username" => $username];
      $user = $repository->findOneBy($query);

      if($user)
       { 
        
        $hash=$user->getPassword();
        
        if($hash==$pw)      
         { $logdata="{ \"Login\": true, \"Sites\": ";
           $logdata.="{\"offices\": \"office_list.php\",\"cars\": \"cars_list.php\",\"locFilter\": \"location_filter.php\"},";
           $logdata.=" \"Admin\": false ";
           $logdata.="}";
           if($username=="Admin")
            {$logdata="{ \"Login\": true, \"Sites\": "; 
             $logdata.="{\"offices\": \"office_list.php\",\"cars\": \"cars_list.php\",\"locFilter\": \"location_filter.php\"},";
             $logdata.=" \"Admin\": true, \"AdminSite\": \"report.php\" , \"gpsTracking\": \"gps.php\" ";
             $logdata.="}";
            }

          return new Response ($logdata);
        }
       else
         {return new Response ('false username or password');}
        
         
       }
      else
       {return new Response ('no such user');}  
    }


}


