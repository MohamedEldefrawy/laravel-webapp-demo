<?php

namespace App\Repository\Contracts;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

interface DocumentRepositoryInterface extends RepositoryInterface
{
    public function uploadDocument($documents, $patientId, $uploadedBy): Application|ResponseFactory|Response;
}
