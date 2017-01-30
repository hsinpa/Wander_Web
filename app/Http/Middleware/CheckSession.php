<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use App\Model\CMSUserModel;

class CheckSession
{

  function __construct( CMSUserModel $user ) {
    $this->_user = $user;
  }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)  {
      if (!$request->session()->has('cms.token')) {
        return redirect('cms/logout');
      }
      
      // If session is over, then redirect to logout
      if (!$this->_user->GetUserID($request->session()->get('cms.token'))) {
        return redirect('cms/logout');
      }

        return $next($request);
    }
}
