<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\MyResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

abstract class ApiController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, MyResponseTrait;
}
