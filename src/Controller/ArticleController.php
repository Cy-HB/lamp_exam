<?php

namespace App\Controller;

use App\Entity\Article;

use App\Repository\ArticleRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @var ArticleRepository
     */
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository){
        $this->articleRepository = $articleRepository;
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function articleDetail(Article $article): Response
    {
        return $this->render('article/article.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $articles = $this->articleRepository->findBy(array(),['date'=>'DESC'], 5, null);

        return $this->render('article/home.html.twig', [
            'articles' => $articles,
        ]);
    }


        /**
     * @Route("/articles", name="articles")
     */
    public function articles(): Response
    {

        $articles = $this->articleRepository->findAll();

        return $this->render('article/articles.html.twig', [
            'articles' => $articles,
        ]);
    }
}
