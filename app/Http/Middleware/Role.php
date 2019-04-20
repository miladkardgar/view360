<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle($request,\Closure $next)
    {
        if(!Auth::check())
            return redirect()->route('login');

        $user = Auth::user();
        $roles = ['1','2','3'];
        if(in_array($user->role_id,$roles))
            return $next($request);

        return abort(403);
    }
}
?>
