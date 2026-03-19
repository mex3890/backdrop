<?php

namespace App\Http\Middlewares;

use App\Adapters\Config;
use App\Adapters\Env;
use App\Adapters\Response;
use App\Adapters\Response\Enums\HttpStatusCode;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as BaseResponse;

class Cors
{
    public function handle(Request $request, Closure $next): BaseResponse
    {
        $response = $next($request);

        if ($request->header('Origin') === null && Env::isNotLocal()) {
            return Response::failed(status: HttpStatusCode::UNAUTHORIZED_401);
        }

        $response->header('Access-Control-Allow-Credentials', Config::supportsCredentials());
        $response->header('Access-Control-Expose-Headers', Config::exposedHeaders());
        $response->header('Access-Control-Allow-Methods', Config::allowedMethods());
        $response->header('Access-Control-Allow-Headers', Config::allowedHeaders());
        $response->header('Access-Control-Allow-Origin', $this->resolveAllowOrigin($request));
        $response->header('Access-Control-Max-Age', Config::maxAge());

        return $response;
    }

    private function resolveAllowOrigin(Request $request): string
    {
        if (in_array($origin = $request->header('Origin'), Config::allowedOrigins())) {
            return $origin;
        }

        return Env::get('APP_URL');
    }
}
