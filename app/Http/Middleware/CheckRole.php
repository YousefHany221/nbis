<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role (ده البراميتر اللي هنبعت فيه nurse أو police)
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. التأكد إن المستخدم مسجل دخول أصلاً
        if (!auth()->check()) {
            return redirect('login');
        }

        // 2. التأكد إن الـ role بتاع المستخدم هو نفسه الـ role المطلوب للمسار ده
        if (auth()->user()->role !== $role) {
            // لو مش هو، ارمي خطأ 403 (غير مسموح)
            abort(403, 'Unauthorized action. This area is for ' . $role . ' only.');
        }

        return $next($request);
    }
}