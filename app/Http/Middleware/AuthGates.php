<?php

namespace App\Http\Middleware;

use App\Models\ManagementAccess\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // get all user aktif
        // tanda(\)->untuk mengambil semua data user

        $user = \Auth::user();
        // ======checking validation midlleware =====
        
        // user aktif(login)/ tidak

        if(!app()->runningInConsole() && $user){

            // kita get role yang punya permision

            $roles          = Role::with('permision')->get();
            // create variable uyntuk nampung data dari variable $oles
            $permisionArray = [];

            // kita lakuin nested loop  karena butuh pencocokan spesifik

            // loop role
            foreach ($roles as $role ) {
                // loop role yang punya permisio apa
                foreach($role->permision as $permision) {
                    $permisionArray[$permision->title][]= $role->id;
                }
            }

            // note
            // kita menggunakan library Gate untuk mendefinisikan title yang di atas di setiap" proses/role

            // arrayintersect
            // mereturn sebuah aray yang mengandung isi aray tersebut

            // check user role
            foreach ($permisionArray as $title => $roles) {
                Gate::define($title, function(\App\Models\User $user)
                use($roles){
                    return count(array_intersect($user->role->pluck('id')->toArray(),$roles)) > 0;
                });
            }

        }

        // return all middleware
        return $next($request);
    }
}
