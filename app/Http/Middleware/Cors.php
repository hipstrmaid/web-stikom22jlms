public function handle($request, Closure $next)
{
return $next($request)
->header('Access-Control-Allow-Origin', 'https://2rc9z6sk-8000.asse.devtunnels.ms')
->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
}