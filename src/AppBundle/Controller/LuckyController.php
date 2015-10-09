<?php
namespace AppBundle\Controller;

use Doctrine\DBAL\Schema\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class LuckyController extends Controller
{
/**
* @Route("/lucky/number")
*/
    public function numberAction()
    {
        $number = rand(0, 100);


        return new Response(
        '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/api/lucky/number")
     */
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        // calls json_encode and sets the Content-Type header
        return new JsonResponse($data);
    }

    /**
     * @Route("/nice/lucky/number/{symfonyLoveFor}")
     */
    public function niceNumberAction($symfonyLoveFor)
    {
        $html = $this->container->get('templating')->render(
            'lucky/number.html.twig',
            array('symfonyLoveFor' => $symfonyLoveFor)
        );

        return new Response($html);
        //return new Response('Symfony &#10084;\'s '.$symfonyLoveFor);
    }
}