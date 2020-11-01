<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DomainPreventJetStream
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $forbidden = [
            'login',
            'password.reset',
            'password.update',
            'register',
            'verification.send',
            'profile.show',
            'api-tokens.index',
            'teams.create',
            'teams.show',
            'teams.store',
            'teams.update',
            'teams.destroy',
            'current-team.update',
            'team-members.store',
            'team-members.update',
            'team-members.destroy',
            'current-team.update',
            'profile.show',
            'other-browser-sessions.destroy',
            'current-user.destroy',
            'current-user-photo.destroy',
            'api-tokens.index',
            'api-tokens.store',
            'api-tokens.update',
            'api-tokens.destroy',
        ];
        
        $protocol = (($_SERVER['HTTPS']) ? 'https://' : 'http://');
        $check = $protocol . $request->getHost();
        $domain = config('app.url');

        if ($check == $domain && in_array($request->route()->getName(), $forbidden)) {
            abort(404);
        }
        return $next($request);
    }
}
