<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Repository\Contracts\AppointmentRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;


class AppointmentController extends Controller
{

    private AppointmentRepositoryInterface $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * @param Request $request
     * @return ResponseAlias|Application|ResponseFactory
     * @author Abdullah hegab
     *
     *  * @OA\Get(
     *      path="/api/appointments/",
     *      summary="get all apointments",
     *      tags={"Appointments"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     * @OA\Response(
     *      response=200,
     *      description="all appointments",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    )
     *  )
     */
    public function appointments(Request $request): ResponseAlias|Application|ResponseFactory
    {
        $dataTableAppointments = $this->appointmentRepository->get_all();
        $startDate = Appointment::all()->pluck('start_date_time');
        if (!empty($dataTableAppointments) & !empty($startDate)) {
            return response([
                "status" => true,
                "data" => [
                    'dataTable' => $dataTableAppointments,
                    'startDate' => $startDate,
                ]
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'Appointments not found',
        ], 404);
    }

    /**
     * @param $id
     * @return ResponseAlias|Application|ResponseFactory
     * @author Ahmed Abdelaty
     *
     *  * @OA\Get(
     *      path="/api/cancel-appointment/{id}",
     *      summary="canceling an appointment",
     *      tags={"Appointments"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     *  @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="ID of appointment",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *      response=200,
     *      description="all appointments",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    )
     *  )
     */
    public function cancelAppointment($id): ResponseAlias|Application|ResponseFactory
    {
        $appointment = $this->appointmentRepository->cancel($id);
        if (!empty($appointment)) {
            return response([
                "status" => true,
                'message' => 'appointment has been canceled',
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'Appointment not found',
        ], 404);
    }


    /**
     *
     * @OA\Post(
     *     path="/api/appointments/info/",
     *     description="get patient name and service type by serviceType and date (mobile)",
     *     summary="get patient name and service type",
     *     tags={"Appointments"},
     *
     *   @OA\RequestBody (
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *           @OA\Property (
     *                property="date",
     *                type="string"
     *            ),
     *            @OA\Property(
     *                property="serviceType",
     *                type="string"
     *            )
     *        )
     *     )
     *   ),
     *  @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   )
     * )
     */
    public function appointmentByDateAndServiceType(Request $request): ResponseAlias|Application|ResponseFactory
    {
        $filterDate = $request->date;
        $filterServiceType = $request->serviceType;

        $appointmentsOfTheDay = $this->appointmentRepository->appointmentsPerDateService($filterDate, $filterServiceType);
        if (!empty($appointmentsOfTheDay)) {
            return response([
                "status" => true,
                "data" => $appointmentsOfTheDay,
            ], 200);
        }
        return response([
            "status" => false,
            "message" => "data not found",
        ], 404);
    }
}
