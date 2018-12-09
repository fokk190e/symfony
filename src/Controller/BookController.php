<?php

namespace App\Controller;

use App\Entity\Library\Book\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class BookController extends AbstractController
{
    public function index(Request $request)
    {
        $book = new Book();
        $book->setName('Saga o wiedźminie');
        $book->setCode('5433455345');
        $book->setYear('1998');

        $form = $this->createFormBuilder($book)
            ->add('name', TextType::class)
            ->add('code', TextType::class)
            ->add('year', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Add book'))
            ->getForm();


        return $this->render('book/book.html.twig', array('user' => 'KO-KO-KO'));
    }
}