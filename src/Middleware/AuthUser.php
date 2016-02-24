<?php

namespace TaixuDayDayUp\Ssoclient\Middleware;

use Closure;
use TaixuDayDayUp\Ssoclient\SsoClient;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 登录验证
        $result = SsoClient::check();

        if ($result['status'] == false) {
            if (isset($result['url'])) {
                return redirect($result['url']);
            }

            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('admin/sso/sync');
            }
        }

        // 路由权限验证
        if (! SsoClient::hasAccess($request->route()->getName())) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return view('vendor.sso.noPermission');
            }
        }

        return $next($request);
    }
}
