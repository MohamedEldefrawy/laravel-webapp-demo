<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\ServicesRepositoryInterface;
use App\Repository\Contracts\WorkingSlotsRepositoryInterface;
use Illuminate\Http\Request;

class WorkingSlotController extends Controller
{
    private WorkingSlotsRepositoryInterface $workingSlotsRepository;
    private ServicesRepositoryInterface $servicesRepository;

    public function __construct(WorkingSlotsRepositoryInterface $workingSlotService, ServicesRepositoryInterface $servicesService)
    {
        $this->workingSlotsRepository = $workingSlotService;
        $this->servicesRepository = $servicesService;

    }

    /**
     * @param Request $request
     * @author Abdullah Hegab
     *
     *
     * @OA\Get(
     *      path="/api/working-slots/service/{id}",
     *      summary="Get Working Slots By Service Type",
     *      tags={"Working slots"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="ID of Survice",
     *    required=true,
     *    example="1",
     * ),
     *
     * @OA\Response(
     *      response=200,
     *      description="Get Working Slots By Service Type",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    )
     *  )
     */
//    public function slotsPerServiceId(Request $request)
//    {
//        $serviceId = $request->id;
//        return $this->workingSlotService->workingSlotsByService($serviceId);
//
//    }

}
