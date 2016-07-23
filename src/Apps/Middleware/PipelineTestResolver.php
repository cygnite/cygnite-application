<?php
namespace Apps\Middleware;

class PipelineTestResolver
{
    public function handle($request, $next)
    {
        return $next($request);
    }

}