<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();

        // $manager->persist($product);
        $post1 = new Post();
        $post1->setContent('This is just some test content for post 1');
        $manager->persist($post1);


        $post2 = new Post();
        $post2->setContent('This is just some test content for post 2');
        $manager->persist($post2);

        $post3 = new Post();
        $post3->setContent('This is just some test content for post 3');
        $manager->persist($post3);

        $manager->flush();
    }
}
