<?php
namespace Apps\Middleware;

use Closure;
use Cygnite\Http\Requests\Request;
use Cygnite\Http\Responses\Response;
use Cygnite\Http\Responses\ResponseHeader;

/**
 * Class AccessMiddleware
 *
 * Application middleware will be executed before passing the
 * request to application's controller.
 *
 * @package Apps\Middleware
 */
class AccessMiddleware
{
    /**
     * Restrict user to access the application if user
     * not belong to particular IP address.
     *
     * @param Request $request
     * @param callable $next
     * @return static
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->server->get('REMOTE_ADDR') !== '192.168.23.1') {
            return Response::make('Forbidden', ResponseHeader::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}