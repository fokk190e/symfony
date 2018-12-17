<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i <= 10; $i++) {
            $user = new User();
            $user->setUsername('User ' . $i);
            $user->setPassword('qweqweqwe');
            $user->setEmail('user' . $i . '@gmail.com');
            $user->setRole('ROLE_USER');

            for($j = 0; $j <= 2; $j++) {
                $post = new Post();
                $post->setTheme('Theme ' . $j);
                $post->setPost('Bla bla bla Whiskas');
                $user->addPost($post);
            }

            $manager->persist($user);
        }
        $manager->flush();
    }
}
