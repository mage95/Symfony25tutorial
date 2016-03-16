<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Form\Type\BookType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/book/list", name="book_list")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager(); //grab Entity Manager

        $thatBook = $this->getDoctrine()->getRepository('AppBundle:Book')->find(4); // search by PK
        $thatBookBy = $this->getDoctrine()->getRepository('AppBundle:Book')->findBy(array(
            'genre' => 'horror'
        )); // search by Criteria

        $search = $request->query->get('title');
        //var_dump($request->query->all());

        if(!$search){
            $books = $this->getDoctrine()->getRepository('AppBundle:Book')->findAll();

        }else{

            $repo = $this->getDoctrine()->getRepository('AppBundle:Book');
            $books = $repo->createQueryBuilder('a')
                     ->where('a.title LIKE :title')
                     ->setParameter('title', '%'.$search.'%')
                    ->getQuery()->getResult();



           // $books = $this->getDoctrine()->getRepository('AppBundle:Book')->findBy(array(
           //     'title' => $search
           // ));
        }


        return $this->render(':Book:Home.html.twig', array('books' => $books));
    }

    /**
     * @Route("/book/create", name="book_create")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager(); //grab Entity Manager
//        $book = new Book();
//        $book->setTitle("Percy Jackson");
//        $book->setAuthor("Eric Yoman");
//        $book->setDescription("Cerita Tentang Percy Jackson");
//        $book->setGenre("Fantasy");
//        $book->setPublishedDate(new \DateTime("2013-04-12"));
//        $book->setRegisteredDate(new \DateTime('2016-03-15'));
//        $em->persist($book);
//        $em->flush();
//
//        return new Response('success');
        $book = new Book();
        $form = $this->createForm(new BookType(),$book);

        $form->handleRequest($request); //untuk menghandle request dari form agar isValid jalan

        if($form->isValid()){
            try{
                $em->persist($book);
                $em->flush();
                return $this->redirect($this->generateUrl('book_list'));
            }catch (Exception $e){
                return new Response('Input Failed');
            }
        }

        return $this->render(':Book:create.html.twig', array('form' => $form->createView()));

    }


    /**
     * @Route("/book/update/{id}", name="book_update")
     */
    public function updateAction(Request $request, $id)
    {
        $book = $this->getDoctrine()->getRepository('AppBundle:Book')->find($id);
        $em = $this->getDoctrine()->getManager();

        if (!$book) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //create form

        $form = $this->createForm(new BookType(), $book);

        $form->handleRequest($request); //handling request from form

        if($form->isValid()){
            try{
                $em->flush();
                return $this->redirect($this->generateUrl('book_list'));
            }catch(Exception $e){
                return new Response('update Failed');
            }
        }

        //showing the UPDATE page if theres no form submitted before
        return $this->render(':Book:update.html.twig', array(
            'form' => $form->createView(),
            'book' => $book
        ));
    }

    /**
     * @Route("/book/delete/{id}", name="book_delete")
     */
    public function deleteAction($id)
    {
        $book = $this->getDoctrine()->getRepository('AppBundle:Book')->find($id);
        $em = $this->getDoctrine()->getManager();


        if (!$book) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }else{
            $em->remove($book);
            $em->flush();
            return $this->redirect($this->generateUrl('book_list'));
        }

    }

    /**
     * @Route("/book/view/{id}", name="book_view")
     */
    public function viewAction($id)
    {
        $book = $this->getDoctrine()->getRepository('AppBundle:Book')->find($id);

        return $this->render(':Book:view.html.twig', array(
            'book' => $book,
        ));
    }

    /**
     * @Route("/book/search", name="book_search")
     *
     */
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager(); //get entity manager

        $title = $this->get('request')->request->get('title');

        if(!$title){
            return $this->render(':Book:search.html.twig');
        }else{
            $book = $this->getDoctrine()->getRepository('AppBundle:Book')->findOneByTitle($title);
            return $this->render(':Book:view.html.twig', array(
                'book' => $book,
            ));
        }
    }
}
