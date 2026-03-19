<?php

namespace App\Adapters;

use App\Adapters\Response\Enums\HttpStatusCode;
use Illuminate\Http\JsonResponse;

class Response extends JsonResponse
{
    public static function success(
        ?string        $message = null,
        ?array         $data = null,
        HttpStatusCode $status = HttpStatusCode::OK_200
    ): Response
    {
        return static::mountResponse($status, true, $message, $data);
    }

    public static function failed(
        ?string        $message = null,
        ?array         $data = null,
        HttpStatusCode $status = HttpStatusCode::BAD_REQUEST_400
    ): Response
    {
        return static::mountResponse($status, false, $message, $data);
    }

    private static function mountResponse(
        HttpStatusCode $status,
        ?bool          $success,
        ?string        $message = null,
        ?array         $data = [],
    ): static
    {
        if (!empty($data)) {
            $data = ['data' => $data];
        }

        $data['success'] = $success;
        $data['status'] = $status->value;

        if (!empty($message)) {
            $data['message'] = $message;
        }

        return (new static($data, $status->value));
    }
}
