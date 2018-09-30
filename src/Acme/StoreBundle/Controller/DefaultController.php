<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Document\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Acme\StoreBundle\Form\ProductType;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {


      $product = new Product();

      $form = $this->createForm(ProductType::class, $product);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

        $product = $form->getData();

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($product);
        $dm->flush();

        return $this->redirectToRoute('acme_store_insecion');
      }

      return $this->render('AcmeStoreBundle:Default:index.html.twig', array('form' => $form->createView() ));


    }

    public function insercionAction()
    {
      $repository = $this->get('doctrine_mongodb')->getManager() ->getRepository('AcmeStoreBundle:Product');
      $products = $repository-> findAll ();
      return $this->render('AcmeStoreBundle:Default:insercion.html.twig', array('product' => $products ));
    }
}
