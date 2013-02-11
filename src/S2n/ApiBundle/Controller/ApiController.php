<?php

namespace S2n\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response as Response;

class ApiController extends Controller
{
  
  protected $response_data = array();
  
  protected function setResponseData($data)
  {
    if (method_exists($data, 'asMobileObject'))
      $data = $data->asMobileObject();
    else
      array_walk_recursive($data, array($this, 'formatForMobile'));
    $this->response_data = $data;
  }
  
    protected function formatForMobile(&$item, $key = null)
    {
      if ($item && method_exists($item, 'asMobileObject'))
              $item = $item->asMobileObject();
    }
    
    protected function renderResponse()
    {
      header('Access-Control-Allow-Origin: *');
      return new Response(json_encode($this->response_data)); 
    }
    
}
