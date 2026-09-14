<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user sudah login
        if (!$request->user()) {
            return redirect()
                ->route('login')
                ->withErrors('Silakan login terlebih dahulu.');
        }

        // Ambil role user
        $userRole = $request->user()->role?->name;

        // Jika role tidak ditemukan
        if (!$userRole) {
            abort(403, 'Role user tidak ditemukan.');
        }

        // Samakan huruf besar/kecil
        $userRole = strtolower(trim($userRole));

        // Samakan semua role yang diizinkan
        $roles = array_map(function ($role) {
            return strtolower(trim($role));
        }, $roles);

        // Cek apakah role user diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}