<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use CodeIgniter\API\ResponseTrait;

class BaseResourceController extends ResourceController
{
    use ResponseTrait;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }
  
    public function respondData($requestedData = [], $successMessages = [], $errorMessages = [], $generalMessages = [])
    {
        $response = ['status'   => 200, 'respondStatus' => "SUCCESS", 'requestHeader' => array("post" => $this->request->getPost(), "get" => $this->request->getGet(), "var" => $this->request->getVar(),  "header" => $this->request->getHeaders(), ), 'requestedData' => $requestedData];
        
        if (!empty($successMessages)) {
            $response['successMessages'] = $successMessages;
        }
      
        if (!empty($ErrorMessages)) {
            $response['errorMessages'] = $errorMessages;
        }
        if (!empty($generalMessages)) {
            $response['generalMessages'] = $generalMessages;
        }

        return $this->respond($response);
    }
    
    public function respondDataFailer($errorData = [], $errorMessages = [], $generalMessages = [], $status = 200)
    {
        $response = ['status'   => $status, 'respondStatus' => "FAILED", 'requestHeader' => array("post" => $this->request->getPost(), "get" => $this->request->getGet(), "var" => $this->request->getVar(),  "header" => $this->request->getHeaders()), 'errorData' => $errorData];

        if (!empty($errorMessages)) {
            $response['errorMessages'] = $errorMessages;
        }
        
        if (!empty($generalMessages)) {
            $response['generalMessages'] = $generalMessages;
        }

            
        return $this->respond($response);
    }

    public function respondJWTFailer($errorMessages, $status = 200)
    {
        header('Content-Type: application/json');
        $ErrorResponse = ['status'   => $status, 'respondStatus' => "FAILED", 'errorMessages'=>$errorMessages];
        echo json_encode($ErrorResponse);
    }
    
    public function respondSuccess($successMessages = [])
    {
        return $this->respondData([], $successMessages);
    }
    
    public function respondFailer($errorMessages = [])
    {
        return $this->respondDataFailer([], $errorMessages);
    }
}
