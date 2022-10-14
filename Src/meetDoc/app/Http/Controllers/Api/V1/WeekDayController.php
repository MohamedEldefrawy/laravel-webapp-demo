<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\WeekDayRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeekDayController extends Controller
{

    private WeekDayRepositoryInterface $weekDayRepository;


    public function __construct(WeekDayRepositoryInterface $weekDayRepository)
    {
        $this->weekDayRepository = $weekDayRepository;
    }

    /**
     * @param Request $request
     * @return Response|Application|ResponseFactory
     * @author Abdullah Hegab
     * @OA\Get(
     *      path="/api/days/",
     *      summary="get all Days",
     *      tags={"Week Days"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     * @OA\Response(
     *      response=200,
     *      description="all working slots",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    )
     *  )
     */
    public function getAll(Request $request): Response|Application|ResponseFactory
    {
        $days = $this->weekDayRepository->get_all();
        if (!empty($days)) {
            return response([
                'status' => true,
                'data' => $days,
            ], 200);
        }
        return response([
            'status' => false,
            'message' => "days not found",
        ], 404);
    }
}
