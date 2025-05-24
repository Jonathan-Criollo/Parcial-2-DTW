
<aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
    <a href="#" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" >
        <span class="brand-text font-weight" style="color: white">PROYECTO DTW</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

                <!-- ROLES Y PERMISO -->
                @can('sidebar.roles.y.permisos')
                 <li class="nav-item">

                     <a href="#" class="nav-link nav-">
                        <i class="far fa-edit"></i>
                        <p>
                            Roles y Permisos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rol y Permisos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.permisos.index') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuario</p>
                            </a>
                        </li>

                    </ul>
                 </li>
                @endcan

                <!-- PARCIAL 2 -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calculator"></i>
                        <p>
                            Parcial 2
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('soap.formulario') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Calculadora SOAP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contactos.listado') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabla Contactos xml</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Opciones del proyecto -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tools"></i>
                        <p>
                            Proyecto Final
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('clima.formulario') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>API Clima</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contactos.index') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agenda Contactos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- cierre del menu -->
            </ul>
        </nav>


    </div>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Guardar el menú al hacer click
    document.querySelectorAll('.nav-sidebar a.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            const nombreMenu = this.textContent.trim();
            sessionStorage.setItem('ultimoSidebar', nombreMenu);
        });
    });

    // Al cargar, resaltar el último menú visitado
    const ultimo = sessionStorage.getItem('ultimoSidebar');
    if (ultimo) {
        document.querySelectorAll('.nav-sidebar a.nav-link').forEach(link => {
            if (link.textContent.trim() === ultimo) {
                link.classList.add('active');
                link.style.fontWeight = 'bold';
                link.style.color = 'red';
                // Si está en un submenú, abre el treeview
                const treeview = link.closest('.nav-treeview');
                if (treeview) {
                    treeview.style.display = 'block';
                    const parent = treeview.closest('.has-treeview');
                    if (parent) parent.classList.add('menu-open');
                }
            } else {
                link.classList.remove('active');
                link.style.fontWeight = '';
                link.style.color = '';
            }
        });
    }
});
</script>



