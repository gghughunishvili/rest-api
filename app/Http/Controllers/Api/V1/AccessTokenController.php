<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\MyResponseTrait;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\Http\Request;
use \Laravel\Passport\Http\Controllers\AccessTokenController as AccessTokenParentController;

class AccessTokenController extends AccessTokenParentController
{

    use MyResponseTrait;

    public function issue(ServerRequestInterface $request)
    {
        return parent::issueToken($request);
    }

//    public function revoke(Request $request)
//    {
//        if (!is_null(auth()->user()->token())) {
//            $user = auth()->user();
//            $user->token()->revoke();
//        }
//        return $this->respondNoContent();
//    }
}
