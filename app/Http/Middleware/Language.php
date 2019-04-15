<?php
namespace App\Http\Middleware;
use Carbon\Carbon;
use Closure;
class Language
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
        if (session('applocale')) {
            $configLang = config('language')[session('applocale')];
            setlocale(LC_TIME, $configLang[1] . '.utf8');
            Carbon::setLocale(session('applocale'));
            \App::setLocale(session('applocale'));
        } else {
            session()->put('applocale', config('app.fallback_locale'));
            setlocale(LC_TIME, 'es_ES.utf8');
            Carbon::setLocale(session('applocale'));
            \App::setLocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}
