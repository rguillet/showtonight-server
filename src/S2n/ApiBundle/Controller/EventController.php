<?php

namespace S2n\ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EventController extends ApiController
{
    /**
     * @Route("/events")
     * @Template()
     */
    public function listAction()
    {
        $events = $this->getDoctrine()->getEntityManager()->createQuery('SELECT e FROM S2nShowBundle:Event e ORDER BY e.id DESC')
                ->setMaxResults(10)->execute();
        $this->setResponseData($events);
        return $this->renderResponse();
    }
    
    /**
     * @Route("/events/{id}")
     * @Template()
     */
    public function getAction($id)
    {
        $event = $this->getDoctrine()->getEntityManager()->getRepository('S2nShowBundle:Event')->find($id);
        $this->setResponseData($event);
        return $this->renderResponse();
    }
}
