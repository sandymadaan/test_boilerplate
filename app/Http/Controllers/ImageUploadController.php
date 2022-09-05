<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function uploadImage(Request $request): JsonResponse
    {
        $this->validate($request, [
            'document' => 'required|mimes:pdf,png,jpg|max:9999',
        ]);

        if (!$request->hasFile('document')) {
            return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
        }

        $random_file_name = Str::random(15);
        $base_location = 'user_documents/' . $random_file_name;

        $document_path = Storage::put($base_location, $request->file('document'));
        $temp_document_path = Storage::temporaryUrl(
            $document_path,
            now()->addMinutes(5),
            [
                'ResponseContentType' => 'application/octet-stream',
                'ResponseContentDisposition' => "attachment; filename=\"" . $random_file_name . '"',
            ]
        );

        return response()->json(
            [
            'success' => true,
            'message' => 'Document successfully uploaded',
            'temporaryUrl' => $temp_document_path
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getTempUploadUrl(Request $request): JsonResponse
    {
        $this->validate($request, [
            'fileName' => 'required',
        ]);

        $base_location = 'user_documents/' . $request->fileName;

        $tem_upload_url = Storage::temporaryUploadUrl($base_location, now()->addMinutes(5));

        return response()->json(
            [
                'success' => true,
                'message' => 'Temporary Upload Url Created Successfully',
                'tempUploadUrl' => $tem_upload_url
            ],
            200
        );
    }
}
