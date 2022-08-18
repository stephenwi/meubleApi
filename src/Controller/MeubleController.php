<?php

namespace App\Controller;


use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FaqRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[ApiResource]
class MeubleController extends AbstractController
{

    /**
     * @Route("/ss/faqs", name="faq")
     */
    public function getFaqs(FaqRepository $faqRepository) {
        return json_encode($faqRepository->findAll(), true);
    }
}