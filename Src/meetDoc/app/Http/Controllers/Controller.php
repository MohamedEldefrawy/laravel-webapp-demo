<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @author Mohamed Eldefrawy
 * @OA\Info(
 *      version="1.0.0",
 *      title="MeetDoc",
 *      description="MeetDoc APIs Documentation using Swagger",
 *      @OA\Contact(
 *          email="mohamed.ahmed.aly.d@gmail.com"
 *      )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
