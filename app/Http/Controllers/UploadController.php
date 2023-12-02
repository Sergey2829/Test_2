<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Illuminate\Http\UploadedFile;

class UploadController extends Controller
{
    /**
     * @param StoreFileRequest $request
     * @return JsonResponse
     */
    public function upload(StoreFileRequest $request): JsonResponse
    {
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        $save = $receiver->receive();

        if ($save->isFinished()) {

            return $this->saveFile($save->getFile());
        }

        $handler = $save->handler();

        return response()->json([
            "done" => $handler->getPercentageDone(),
            'status' => true
        ]);


    }

    protected function saveFile(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();

        $fileName = Str::random(18) . "." . $extension;

        $mime = str_replace('/', '-', $file->getMimeType());


        $dateFolder = date("Y-m-W");


        $filePath = "upload/{$mime}/{$dateFolder}";
        $finalPath = storage_path("app/public/" . $filePath);


        $file->move($finalPath, $fileName);

        return response()->json([
            'path' => asset('storage/' . $filePath),
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }
}
