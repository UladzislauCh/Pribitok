<?php

namespace Limycuk\PribitokBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApplicationController extends Controller
{
    public function applicationsAction($lang = "en")
    {
        $language = $this->getDoctrine()->getRepository('LimycukPribitokBundle:Language')->findByTitle($lang);
        if(!$language) return new JsonResponse([]);
        $foundApplications = $language[0]->getApplications();

        $applications = array();
        foreach ($foundApplications as $application)
        {
            $applications[] = $application->getPublicVersion();
        }

        $response = new JsonResponse($applications);

        return $response;
    }

    public function applicationAction($id)
    {
        $application = $this->getDoctrine()->getRepository('LimycukPribitokBundle:Application')->find($id);

        if ($application) {
            $response = new JsonResponse($application->getPublicVersion());
        } else {
            $response = new JsonResponse();
        }

        return $response;
    }

}
