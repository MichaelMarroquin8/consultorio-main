<?php
if ($_SESSION["rols_id"] == 3) {
?>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item  ">
                    <a href="..\Home\" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Casos</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">

                                <li class="submenu-item  ">
                                    <a href="..\NuevoCaso\" class='submenu-link'>Crear caso</a>


                                </li>

                                <li class="submenu-item  ">
                                    <a href="..\ConsultarCaso\" class='submenu-link'>Mis casos</a>


                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-plus-square-fill"></i>
                        <span>Sistema de gestion SST</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Planificar</a>
                                    <ul class="subsubmenu ">

                                        <li class="subsubmenu-item  ">
                                            <a href="..\PDesignacion\"><span class="lbl">Designación de responsabilidades.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\PCapacitacionSeguridad\"><span class="lbl">Capacitación en seguridad y salud en el trabajo.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\PEvaluacionInicial\"><span class="lbl">Evaluación inicial.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\PPlanAnual\"><span class="lbl">Plan anual de trabajo.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\PPerfilSociodemografico\"><span class="lbl">Perfil sociodemografico.</span></a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Hacer</a>
                                    <ul class="subsubmenu ">

                                        <li class="subsubmenu-item  ">
                                            <a href="..\HIdentificación\"><span class="lbl">Identificación de peligros y valoración de riesgos.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\HMedidas\"><span class="lbl">Medidas de prevención y control.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\HEvaluaciones\"><span class="lbl">Evaluaciones médicas.</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Verificar</a>
                                    <ul class="subsubmenu ">
                                        <li class="subsubmenu-item  ">
                                            <a href="..\VInvestigación\"><span class="lbl">Investigación de incidentes, accidentes de trabajo y enfermedades laborales.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\VAuditoria\"><span class="lbl">Auditoria</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\VSeguimiento\"><span class="lbl">Seguimiento de indicadores</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\VRevicion\"><span class="lbl">Revisión por la dirección</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Actuar</a>
                                    <ul class="subsubmenu ">
                                        <li class="subsubmenu-item  ">
                                            <a href="..\AAcciones\"><span class="lbl">Acciones de mejoramiento correctivas o preventivas.</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu-item  ">
                                    <a href="..\Mempresas\" class='submenu-link'>Mis Empresas</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<?php
} else if ($_SESSION["rols_id"] == 2) {
?>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item  ">
                    <a href="..\Home\" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Casos</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">

                                <li class="submenu-item  ">
                                    <a href="..\ConsultarCaso\" class='submenu-link'>Casos asignados</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Registros</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="..\MntEmpresa\" class='submenu-link'>Empresas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<?php
}else if ($_SESSION["rols_id"] == 1) {
?>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item  ">
                    <a href="..\Home\" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Casos</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">

                                <li class="submenu-item  ">
                                    <a href="..\NuevoCaso\" class='submenu-link'>Crear caso</a>
                                </li>

                                <li class="submenu-item  ">
                                    <a href="..\ConsultarCaso\" class='submenu-link'>Mis casos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Registros</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">

                                <li class="submenu-item  ">
                                    <a href="..\MntUsuario\" class='submenu-link'> Usuario</a>
                                </li>

                                <li class="submenu-item  ">
                                    <a href="..\MntEmpresa\" class='submenu-link'> Empresas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-plus-square-fill"></i>
                        <span>Sistema de gestion SST</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Planificar</a>
                                    <ul class="subsubmenu ">

                                        <li class="subsubmenu-item  ">
                                            <a href="..\PDesignacion\"><span class="lbl">Designación de responsabilidades.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\PCapacitacionSeguridad\"><span class="lbl">Capacitación en seguridad y salud en el trabajo.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\PEvaluacionInicial\"><span class="lbl">Evaluación inicial.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\PPlanAnual\"><span class="lbl">Plan anual de trabajo.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\PPerfilSociodemografico\"><span class="lbl">Perfil sociodemografico.</span></a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Hacer</a>
                                    <ul class="subsubmenu ">

                                        <li class="subsubmenu-item  ">
                                            <a href="..\HIdentificación\"><span class="lbl">Identificación de peligros y valoración de riesgos.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\HMedidas\"><span class="lbl">Medidas de prevención y control.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\HEvaluaciones\"><span class="lbl">Evaluaciones médicas.</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Verificar</a>
                                    <ul class="subsubmenu ">
                                        <li class="subsubmenu-item  ">
                                            <a href="..\VInvestigación\"><span class="lbl">Investigación de incidentes, accidentes de trabajo y enfermedades laborales.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\VAuditoria\"><span class="lbl">Auditoria</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\VSeguimiento\"><span class="lbl">Seguimiento de indicadores</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\VRevicion\"><span class="lbl">Revisión por la dirección</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Actuar</a>
                                    <ul class="subsubmenu ">
                                        <li class="subsubmenu-item  ">
                                            <a href="..\AAcciones\"><span class="lbl">Acciones de mejoramiento correctivas o preventivas.</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu-item  ">
                                    <a href="..\Mempresas\" class='submenu-link'>Mis Empresas</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>


                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Mantenimentos</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">

                                <li class="submenu-item  ">
                                    <a href="..\MntCategoria\" class='submenu-link'>Mtn Categoria</a>
                                </li>

                                <li class="submenu-item  ">
                                    <a href="..\MntSubCategoria\" class='submenu-link'>Mtn Subcategoria</a>
                                </li>
                                
                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Planificar</a>
                                    <ul class="subsubmenu ">

                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnPDesignacion\"><span class="lbl">Designación de responsabilidades.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnPCapacitacionSeguridad\"><span class="lbl">Capacitación en seguridad y salud en el trabajo.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnPEvaluacionInicial\"><span class="lbl">Evaluación inicial.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnPPlanAnual\"><span class="lbl">Plan anual de trabajo.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnPPerfilSociodemografico\"><span class="lbl">Perfil sociodemografico.</span></a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Hacer</a>
                                    <ul class="subsubmenu ">

                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnHIdentificación\"><span class="lbl">Identificación de peligros y valoración de riesgos.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnHMedidas\"><span class="lbl">Medidas de prevención y control.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnHEvaluaciones\"><span class="lbl">Evaluaciones médicas.</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Verificar</a>
                                    <ul class="subsubmenu ">
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnVInvestigación\"><span class="lbl">Investigación de incidentes, accidentes de trabajo y enfermedades laborales.</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnVAuditoria\"><span class="lbl">Auditoria</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnVSeguimiento\"><span class="lbl">Seguimiento de indicadores</span></a>
                                        </li>
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnVRevicion\"><span class="lbl">Revisión por la dirección</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Actuar</a>
                                    <ul class="subsubmenu ">
                                        <li class="subsubmenu-item  ">
                                            <a href="..\mtnAAcciones\"><span class="lbl">Acciones de mejoramiento correctivas o preventivas.</span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
<?php
}
?>