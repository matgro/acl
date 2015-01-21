<?php
namespace Ydentidad\ACL;

use \Session;
use \Ydentidad\Identity;

class ACL {
    /**
     * 
     */
    public static function doLogin ( Eloquent $model )
    {
           return Identity::doLogin( $model );
    }
    public static function getMenuPermision ( $u )
    {
        $p = $u->perfil->all();
        $Permisos = array();
        $Perfiles = array();
        $menuLeft= array();
        
        foreach ($p as $op){
            $Perfiles[] = $op->descripcion;
            $pe = $op->permiso;
            foreach ($pe as $ope){
                $Permisos[] = $ope->id;//[$ope->controlador][] = ucfirst($ope->accion);
//                $Permisos[ucfirst($ope->controlador)][] = ucfirst($ope->accion);
            }
            
        }
        
        $Menu = \Menu::wherePosicionId(1)->get();
//        print_r($Menu);
        foreach ($Menu as $m){
            if(in_array($m->permiso_id,  $Permisos))
                $menuLeft[ucfirst($m->menu)][] = array (
                    'opcion' => ucfirst($m->opcion),
                    'url' => strtolower($m->url)
                    );
        }
//        print_r($menuLeft);
        Session::set("MenuLeft",$menuLeft);
//        die();
//        $this->CI->session->set_userdata('Permiso',$Permisos);
//        $this->CI->session->set_userdata('MenuLeft',$menuLeft);
        
    }
} 
