<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\NoteRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    private NoteRepositoryInterface $noteRepository;

    public function __construct(NoteRepositoryInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    /**
     * @param $id
     * @return  Response|Application|ResponseFactory
     * @author Mohamed Eldefrawy
     * @OA\Get(
     *      path="/api/notes/{id}",
     *      summary="Get Patient Notes by patient id",
     *      tags={"Notes"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="ID of Patient",
     *      required=true,
     *      example="1",
     *  ),
     * @OA\Response(
     *      response=200,
     *      description="All Patient Symptoms returned successfully",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    )
     *  )
     *
     */
    public function getNotes($id): Response|Application|ResponseFactory
    {
        $NotesOfPatient = $this->noteRepository->getNotesOfPatient($id);
        if (!empty($NotesOfPatient)) {
            return response([
                "status" => true,
                "data" => $NotesOfPatient,
            ], 200);
        }
        return response([
            "status" => true,
            "data" => "notes not found",
        ], 404);

    }

    /**
     * @param Request $note
     * @return  Response|Application|ResponseFactory
     * @author Ahmed Abdelaty
     * @OA\Post(
     *      path="/api/add-note",
     *      summary="Add note to patient",
     *      tags={"Notes"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     *
     * @OA\RequestBody (
     *   @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *          @OA\Property (
     *                property="patient_id",
     *                type="number"
     *            ),
     *          @OA\Property (
     *                property="note",
     *                type="string"
     *            ),
     *          )
     *      )
     * ),
     *
     * @OA\Response(
     *      response=200,
     *      description="note has been added",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    )
     *  )
     */
    public function addNote(Request $note): Response|Application|ResponseFactory
    {
        $newNote = null;
        if (isset($note->note) && isset($note->patient_id)) {
            $newNote = $this->noteRepository->create($note);
        }
        if (!empty($newNote)) {
            return response([
                "status" => true,
                "note" => $newNote,
            ], 200);
        }
        return response([
            'message' => 'check your body'
        ], 400);
    }
}
