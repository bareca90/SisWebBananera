<?php
require_once('ConexionBD.php');

class Menu {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    public function obtenerMenu() {
        
        $menuHTML = '<div class="nav" id="menu">';
        $sql = "SELECT * FROM seg_aplicacion  Where seg_apl_tipo='MEN' ORDER BY seg_apl_orden,seg_apl_tipo";
        $resultado = $this->conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            /* $url = $row['seg_apl_archivo']; */
            $nombre = $row['seg_apl_descripcion'];
            $codigo = $row['seg_apl_codigo'];
            $tipo   = $row['seg_apl_tipo'];
            $cadena = $row['seg_apl_tipo'].'-'.$row['seg_apl_codigo'];

            $menuHTML.='<a class="nav-link collapsed" data-tipo="menu" data-id=""  data-url="" href="#" data-bs-toggle="collapse" data-bs-target="#'.$cadena.'" aria-expanded="false" aria-controls="'.$cadena.'">';
            $menuHTML.='<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>'.$nombre;
            $menuHTML.='<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
            $menuHTML.='</a>';
            $menuHTML.='<div class="collapse" id="'.$cadena.'" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">';
            //Consulta Submenu
            $sqlsubmenu = "SELECT * FROM seg_aplicacion WHERE seg_apl_id_padre = ? and seg_apl_tipo='SUB' ORDER BY seg_apl_orden";
            $stmt = $this->conexion->conexion->prepare($sqlsubmenu);
            $stmt->bind_param("i", $codigo);
            $stmt->execute();
            $resultadosubmenu = $stmt->get_result();
            $menuHTML .=   '<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">';
            while ($row = $resultadosubmenu->fetch_assoc()) {
                $nombresubmenu = $row['seg_apl_descripcion'];
                $codigosubmenu = $row['seg_apl_codigo'];
                $tiposubmenu   = $row['seg_apl_tipo'];
                $cadenasubmenu = $row['seg_apl_tipo'].'-'.$row['seg_apl_codigo'];
                $menuHTML .= '<a data-tipo="submenu" data-id=""  data-url="" class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#'.$cadenasubmenu.'" aria-expanded="false" aria-controls="'.$cadenasubmenu.'">';
                $menuHTML .= $nombresubmenu;
                $menuHTML .= '<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
                $menuHTML .= '</a>';
                $menuHTML .= '<div class="collapse" id="'.$cadenasubmenu.'" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">';
                /* Aplicacion */
                $menuHTML .= '<nav class="sb-sidenav-menu-nested nav">';
                $sqlaplicacion = "SELECT * FROM seg_aplicacion WHERE seg_apl_id_padre = ? and seg_apl_tipo='APL' ORDER BY seg_apl_orden";
                $stmtaplicacion = $this->conexion->conexion->prepare($sqlaplicacion);
                $stmtaplicacion->bind_param("i", $codigosubmenu);
                $stmtaplicacion->execute();
                $resultadoaplicacion = $stmtaplicacion->get_result();
                while ($row = $resultadoaplicacion->fetch_assoc()) {
                    $nombreaplicacion = $row['seg_apl_descripcion'];
                    $codigoaplicacion = $row['seg_apl_codigo'];
                    $tipoaplicacion   = $row['seg_apl_tipo'];
                    $cadenaaplicacion = $row['seg_apl_tipo'].'-'.$row['seg_apl_codigo'];
                    $url = $row['seg_apl_archivo'];
                    /* $menuHTML .= '<a class="nav-link" data-href="'.$url.'">'.$nombreaplicacion.'</a>'; */
                    $menuHTML .= '<a data-tipo="aplicacion" data-id="'.$codigoaplicacion.'"  data-url="'.$url.'" class="nav-link" href="'.$url.'">'.$nombreaplicacion.'</a>';
                    /* $menuHTML .= '<a class="nav-link" data-href="'.$url.'" href="'.$url.'">'.$nombreaplicacion.'</a>'; */
                }
                $menuHTML .='</nav>';
                $menuHTML .='</div>';
            
            }
            
            
            $menuHTML .= '</nav>';
            $menuHTML .= '</div>';

            
        }

        $menuHTML .= '</div>';
        return $menuHTML;
    }

    
}
?>
