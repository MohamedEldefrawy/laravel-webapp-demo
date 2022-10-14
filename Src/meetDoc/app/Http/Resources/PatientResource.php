<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     * @author Mohamed Eldefrawy
     */
    public function toArray($request)
    {
        $this->remove_nulls();

        $documents_objects = $this->medicalDocuments->sortByDesc('created_at');
        $documents = [];

        foreach ($documents_objects as $document)
            $documents [] = $document;


        return [
            "id" => $this->user_id,
            "email" => $this->user->email,
            "userName" => $this->user->name,
            "name" => $this->first_name . " " . $this->last_name,
            "weight" => $this->weight,
            "height" => $this->height,
            "gender" => $this->gender,
            "age" => $this->age,
            "bloodType" => $this->blood_type,
            "profileImage" => $this->user->profile_image,
            "progress" => $this->calculateProfileProgress(),
            "symptom" => count($this->symptoms) > 0 ? SymptomsResource::Collection($this->symptoms)->sortByDesc('created_at')->take(1)[0]->symptom : "",
            "documents" => PatientDocumentResource::Collection($documents)->sortByDesc('created_at')->take(5),
            "note" => count($this->notes) > 0 ? NoteResource::Collection($this->notes)->sortByDesc('created_at')->take(1)[0]->note : ""
        ];
    }

    /**
     * @return float|int
     * @author Mohamed Eldefrawy
     */
    private function calculateProfileProgress(): float|int
    {
        $progress = 0;

        if ($this->first_name != null)
            $progress++;
        if ($this->first_name != null)
            $progress++;
        if ($this->weight != null)
            $progress++;
        if ($this->height != null)
            $progress++;
        if ($this->gender != null)
            $progress++;
        if ($this->age != null)
            $progress++;
        if ($this->blood_type != null)
            $progress++;
        if ($this->user->profile_image != null)
            $progress++;

        return ($progress / 8) * 100;

    }

    /**
     * @return void
     */
    public function remove_nulls(): void
    {
        $this->symptoms = $this->symptoms == null ? [""] : $this->symptoms;
        $this->notes = $this->notes == null ? [] : $this->notes;
        $this->medicalDocuments = $this->medicalDocuments == null ? [] : $this->medicalDocuments;
        $this->user->profile_image = $this->user->profile_image == null ? "" : $this->user->profile_image;
    }
}
