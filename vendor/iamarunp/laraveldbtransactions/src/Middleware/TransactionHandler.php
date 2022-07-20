<?php

namespace iamarunp\Laraveldbtransactions\Middleware;
use Illuminate\Support\Facades\Log;

use Closure;

class TransactionHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $startTime=0;
    private $endTime=0;

    public function handle($request, Closure $next)
    {

        $this->startTime = microtime(true);
        \DB::enableQueryLog();

        \DB::beginTransaction();
        try {
            return $next($request);
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {

        $queries = \DB::getQueryLog();
        if ($response->getStatusCode() >= 500) {

            \DB::rollBack();


        /*
            if (env('API_DATALOGGER', true)) {
                $this->endTime = microtime(true);

                $filename = 'middleware_logger.log';
                $dataToLog = ["Time" => gmdate("F j, Y, g:i a"),
                    "Duration" => number_format($this->endTime - LARAVEL_START, 3),
                    "Ip-address" => $request->ip(),
                    "Url" => $request->fullUrl(),
                    "method" => $request->method(),
                    "input" => $request->getContent(),
                    "headers" => request()->header(),
                    // "response" => $response->getContent(),
                    "queries" => $queries];
                $dataToLog = json_encode($dataToLog,JSON_PRETTY_PRINT);
                \File::append(storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog . "\n" . str_repeat("=", 60) . "\n\n");
                // Log::eror($dataToLog);
            }

        */

        } else {

            \DB::commit();
        }


        // Log::info("Code : ".$response->getStatusCode().", time : ". number_format($this->endTime-$this->startTime, 3));

        return $response;

    }

}
