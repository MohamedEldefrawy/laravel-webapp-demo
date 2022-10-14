<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Repository\DocumentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DocumentController extends Controller
{

    private DocumentRepository $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }


    /**
     * @param $patientId
     * @return AnonymousResourceCollection
     * @author Mohamed Eldefrawy
     *
     *
     * @OA\Get(
     * path="/api/documents/{id}",
     * tags={"Documents"},
     * summary="Get Patient documents by patient id",
     * security={
     *  {
     *    "sanctum": {}},
     *  },
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="ID of Patient",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=200,
     *    description="All Patient documents returned successfully",
     *     @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *     )
     * )
     */
//    public function getDocuments($patientId): AnonymousResourceCollection
//    {
//        return $this->documentService->getPatientDocuments($patientId);
//    }


    /**
     * @OA\Post(
     *     path="/api/upload",
     *     description="upload medical documents related to th epatient",
     *     summary="uploads an image or pdf",
     *     operationId="uploadFile",
     *     tags={"Documents"},
     *     security={
     *      {
     *      "sanctum": {}},
     *      },
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *            @OA\Property(
     *                     description="file to upload",
     *                     property="documents[]",
     *                     type="string",
     *                     format="base64",
     *                 ),
     *                 @OA\Property(
     *                     description="patient id",
     *                     property="patientId",
     *                     type="int"
     *                 ),
     *                  @OA\Property(
     *                     description="creator id",
     *                     property="createdBy",
     *                     type="int"
     *                 ),
     *             )
     *         )
     *     ),
     *   * @OA\Response(
     *      response=200,
     *      description="All Patient Symptoms returned successfully",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    )
     * )
     * */
    public function upload(DocumentRequest $request): Response|Application|ResponseFactory
    {
        return $this->documentRepository->uploadDocument($request->documents, $request->patientId, $request->createdBy);
    }

}
