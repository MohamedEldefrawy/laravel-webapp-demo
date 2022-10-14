<?php

namespace App\Repository;

use App\Builder\DocumentBuilder;
use App\Models\MedicalDocument;
use App\Repository\Contracts\DocumentRepositoryInterface;
use Aws\S3\Exception\S3Exception;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DocumentRepository implements DocumentRepositoryInterface
{
    private DocumentBuilder $documentBuilder;

    public function __construct(DocumentBuilder $documentBuilder)
    {
        $this->documentBuilder = $documentBuilder;
    }

    /**
     * Create Medical Document record in database
     * @return void
     * @author Mohamed Eldefrawy
     */
    public function create($model): void
    {
        MedicalDocument::Create([
            'link' => $this->documentBuilder->getLink(),
            'type' => $this->documentBuilder->getType(),
            'name' => $this->documentBuilder->getName(),
            'uploaded_by' => $this->documentBuilder->getUploadedBy(),
            'patient_id' => $this->documentBuilder->getPatientId()
        ]);
    }

    /**
     * @param $documents
     * @param $patientId
     * @param $uploadedBy
     * @return Application|ResponseFactory|Response
     * @author Mohamed Eldefrawy
     */
    public function uploadDocument($documents, $patientId, $uploadedBy): Application|ResponseFactory|Response
    {
        $urls = [];
        $fileNames = [];
        $fileExtensions = [];


        foreach ($documents as $document) {
            $path = Storage::disk('s3')->put('documents', $document);
            $fileNames[] = $path;
            $fileExtensions[] = $document->extension();
            $this->documentBuilder
                ->setName($path)
                ->setType($document->extension());

            try {
                $path = Storage::disk('s3')->temporaryUrl($path, now()->addMinutes(10));
                $urls[] = $path;
                $this->documentBuilder
                    ->setLink($path)
                    ->setPatientId($patientId)
                    ->setUploadedBy($uploadedBy);
                $this->create(null);

            } catch (S3Exception $err) {
                return response([
                    "success" => false,
                    "message" => "Failed to upload file",
                    "error" => $err
                ], 400);
            }
        }

        return response([
            "success" => true,
            "urls" => $urls,
            "extension" => $fileExtensions,
            "file-name" => $fileNames,
        ], 200);

    }


    /**
     * Return patient documents by patient id
     * @param $id
     * @param $model
     * @return void
     * @author Mohamed Eldefrawy
     */
    public function update($id, $model): void
    {
        $patientDocuments = MedicalDocument::all()->where('patient_id', $id);
        if ($patientDocuments->count() > 0) {
            foreach ($patientDocuments as $document) {
                $url = Storage::disk('s3')->temporaryUrl(
                    $document->name, Carbon::now()->addMinutes(10)
                );

                $document->update([
                    'link' => $url
                ]);
            }
        }
    }

    public function get_all()
    {
        // TODO: Implement get_all() method.
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
