<?php

namespace App\Controller;

use App\Entity\Pin;
use Twig\Environment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PinsController extends AbstractController
{

    private $em;

    public function __construct(Environment $twig, EntityManagerInterface $em)
    {
      
      $this->em = $em;
    }

    
  
    /**
     * @Route("/pins", name="pins")
     */
    public function index() : Response
    {

     // $pin = new Pin;
     // $pin->setTitle('titre 4');
     // $pin->setDescription('description 4');

      // $em = $this->getDoctrine()->getManager();

     // $this->em->persist($pin);

     // $this->em->flush();


      $repo = $this->em->getRepository(Pin::class);

      $pins = $repo->findAll();

      return $this->render('pins/index.html.twig',compact('pins'));
    }


    /**
     * @Route("/pins/create", methods={"GET","POST"})
     */
    public function create(Request $request)
    {
      if ($request->isMethod("POST")) {
        $data = ($request->request->('title'));
        
      }
      return $this->render('pins/create.html.twig');
    }
}
