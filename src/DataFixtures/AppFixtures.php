<?php

namespace App\DataFixtures;

use App\Entity\Article;

use App\Repository\ArticleRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * @var ArticleRepository
     */
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository){
        $this->articleRepository = $articleRepository;
    }


    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i < 21; $i++) {
            $article = new Article();

            $article->setTitle('My trip '.$i." at the beach");
            $article->setDescription('It was so great!');
            $article->setUrlPhoto('https://images.unsplash.com/photo-1432251407527-504a6b4174a2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');
            $article->setDate(new \DateTime());

            $manager->persist($article);
        }
        $manager->flush();
    }
}
