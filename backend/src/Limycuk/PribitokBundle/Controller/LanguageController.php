<?php

namespace Limycuk\PribitokBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class LanguageController extends Controller
{
    public function LanguagesAction()
    {
        $foundLanguages = $this->getDoctrine()->getRepository('LimycukPribitokBundle:Language')->findAll();
        $languages = array();

        foreach ($foundLanguages as $language)
        {
            $languages[] = $language->getPublicVersion();
        }

        $response = new JsonResponse($languages);

        return $response;
    }

    public function LanguageAction($title = 'en')
    {
        $language = $this->getDoctrine()->getRepository('LimycukPribitokBundle:Language')->findOneByTitle($title);

        if ($language && $language->getJson()) {
            $url = $language->getJson()->getPublicImageVersion()->realUri;
            $content = file_get_contents('http://' . $this->getRequest()->getHost() . '/' . $url);
            $response = new JsonResponse(json_decode($content));
        } else {
            $response = new JsonResponse();
        }

        return $response;
    }
}
