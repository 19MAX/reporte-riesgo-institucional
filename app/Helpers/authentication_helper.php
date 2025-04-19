<?php

function grantAccess(int $rol = null)
{
    $userSessionRol = session('rol');
    if (isset($userSessionRol)) {
        $userSessionRol = (int) $userSessionRol;
        if (isset($rol)) {
            if ($rol !== $userSessionRol) {
                session()->destroy();
                return redirect()->to(base_url('/login'));
            }
            return true;
        } else {
            switch ($userSessionRol) {
                case (1):
                    return redirect()->to(base_url("admin"));
                case (2):
                    return redirect()->to(base_url("punto"));
                // case RolesOptions::AdministradorDeEventos:
                //     return redirect()->to(base_url("eventos/dashboard"));
                // case RolesOptions::UsuarioPublico:
                //     return redirect()->to(base_url("public/dashboard"));
                default:
                    session()->destroy();
                    return redirect()->to(base_url("/login"));
            }
        }
    }
    return false;
}

if (!function_exists('checkActiveModule')) {

    function checkActiveModule($modulo, $value)
    {
        return ($modulo == $value) ? true : false;
    }
}