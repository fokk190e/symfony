<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\Alice\Loader\NativeLoader as Alice;

class MainController extends Controller
{
    private $username = [
        'Lion el Jonson',
        'Fulgrim',
        'Perturabo',
        'Rogal Dorn',
        'Konrad Curze',
        'Sanguinius',
        'Mortarion',
        'Magnus',
        'Angron',
        'Corvus Corax',
        'Vulcan',
        'Alpharius',
    ];

    private $email = [
        'lion_el_jonson@gmail.com',
        'fulgrim@gmail.com',
        'perturabo@gmail.com',
        'rogal_dorn@gmail.com',
        'konrad_curze@gmail.com',
        'sanguinius@gmail.com',
        'mortarion@gmail.com',
        'magnus@gmail.com',
        'angron@gmail.com',
        'corvus_corax@gmail.com',
        'vulcan@gmail.com',
        'alpharius@gmail.com',
    ];

    public function index(Request $request)
    {
        $post_query = $this->getDoctrine()->getRepository(Post::class)->getAllPostsQuery();
        $container = $this->container;

        $paginator  = $container->get('knp_paginator');
        $pagination = $paginator->paginate($post_query, $request->query->getInt('page', 1), 10);


        return $this->render('main.html.twig', array('pagination' => $pagination));
    }

    public function addFixtures()
    {
        $loader = new Alice();
        $objectSet = $loader->loadData([
            User::class => [
                'user{1..10}' => [
                    'username' => '<username()>',
                    'email' => '<email()>',
                ],
            ],
        ]);

        foreach($objectSet as $object)
        {
            $this->getDoctrine()->getManager()->persist($object);
        }

        $this->getDoctrine()->getManager()->flush();
    }

    public function username()
    {
        $key = array_rand($this->username);
        return $this->username[$key];
    }

    public function email()
    {
        $key = array_rand($this->email);
        return $this->email[$key];
    }
}
