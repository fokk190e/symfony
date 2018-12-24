<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $post_query = $this->getDoctrine()->getRepository(Post::class)->getAllPostsQuery();
        $container = $this->container;

        $paginator  = $container->get('knp_paginator');
        $pagination = $paginator->paginate($post_query, $request->query->getInt('page', 1), 10);


        return $this->render('main.html.twig', array('pagination' => $pagination));
    }
}
