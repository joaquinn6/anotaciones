<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Document\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
      return $this->render('AcmeStoreBundle:Default:index.html.twig');

    }

    public function createAction(Request $request)
    {
      $var=0;
      $product = new Product();

      $var = $request->request->get("nombre");
      $product->setName($var);
      $var = $request->request->get("precio");
      $product->setPrice($var);

      $dm = $this->get('doctrine_mongodb')->getManager();
      $dm->persist($product);
      $dm->flush();

      //return $this->render('AcmeStoreBundle:Default:insercion.html.twig');
      $repository = $this->get('doctrine_mongodb')->getManager() ->getRepository('AcmeStoreBundle:Product');
      $products = $repository-> findAll ();
      return $this->render('AcmeStoreBundle:Default:insercion.html.twig', array('product' => $products ));
  }

  public function insercionAction()
  {
      $repository = $this->get('doctrine_mongodb')->getManager() ->getRepository('AcmeStoreBundle:Product');
      $products = $repository-> findAll ();
      return $this->render('AcmeStoreBundle:Default:insercion.html.twig', array('product' => $products ));
  }
}
