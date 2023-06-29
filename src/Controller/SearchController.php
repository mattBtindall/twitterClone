<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search-form', name: 'app_search_form')]
    public function index(Request $request): Response
    {
        /**
         * Notice here that the action is explicitly set.
         * This controller is embedded directly within the route
         * therefore the action is set to that route (app_posts)
         */
        $form = $this->createForm(SearchType::class, null, [
            'action' => $this->generateUrl('app_search_form')
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $searchTerm = $form->getData('searchTerm');
            return $this->redirectToRoute('app_search_result', $searchTerm);
        }

        return $this->render('search/_search-form.html.twig', [
            'searchForm' => $form
        ]);
    }

    #[Route('/search/{searchTerm}', name: 'app_search_result')]
    public function searchResult(string $searchTerm, UserRepository $users): Response
    {
        $searchResult = $users->searchUser($searchTerm);

        return $this->render('search/search-result.html.twig', [
            'pageTitle' => 'Search - ' . $searchTerm,
            'users' => $searchResult
        ]);
    }
}
