<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $allowedEmailesPass = [
        'ahmad@gmail.com',
        11111,
    ];
    public function handle(Request $request, Closure $next)
    {
        $error = false;
        if (!$request->hasHeader('X-ITE-TOKEN')) {
            $error = true;
        }
        $token = $request->header('X-ITE-TOKEN');
        try {
            $jsonStr = base64_decode($token);
            $jsonPayload = json_decode($jsonStr, true);
            if (!$jsonPayload) {
                $error = true;
            }
            if (!isset($jsonPayload['email'])) {
                $error = true;
            }
            if (!in_array($jsonPayload['email'], $this->allowedEmailesPass)) {
                $error = true;
            }
        } catch (\Exception $exception) {
            $error = true;
        }
        if ($error) {
            return response()->json(['message' => 'invalid token'], 401);
        }
        else {
            return response()->json(['message' => 'valid token']);
        }
        return $next($request);
    }
}
