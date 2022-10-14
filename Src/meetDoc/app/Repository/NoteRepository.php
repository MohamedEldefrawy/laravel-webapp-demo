<?php

namespace App\Repository;

use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Repository\Contracts\NoteRepositoryInterface;
use App\Repository\Contracts\RepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NoteRepository implements NoteRepositoryInterface
{

    public function get_all()
    {

    }

    public function get($id)
    {

    }

    public function create($model)
    {
        $note = Note::create([
            'note' => $model->note,
            'patient_id' => $model->patient_id,
        ]);
        return $note;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update($id, $model)
    {
        // TODO: Implement update() method.
    }


    /**
     * @param $patientId
     * @return AnonymousResourceCollection
     * @author Mohamed Eldefrawy
     */
    public function getNotesOfPatient($patientId): AnonymousResourceCollection
    {
        return NoteResource::collection(Note::all()->where('patient_id', $patientId));
    }
}
