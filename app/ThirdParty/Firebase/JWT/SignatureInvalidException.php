<?php
namespace Firebase\JWT;

use App\Controllers\BaseResourceController;

class SignatureInvalidException extends \UnexpectedValueException
{
    public function __construct($ErrMsg)
    {
        $BaseResourceController = new BaseResourceController();
        $BaseResourceController->respondJWTFailer(["ErrorType" => 'Token Error', 'Errors' => $ErrMsg]);
        die;
    }
}
