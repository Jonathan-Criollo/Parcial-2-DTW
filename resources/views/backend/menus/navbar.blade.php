
<nav class="main-header navbar navbar-expand border-bottom navbar-dark" id="navbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: white"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" style="color: white">{{ $titulo }}</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    
        
        <li class="nav-item dropdown">
            
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-cogs" style="color: white"></i>
                <span class="hidden-xs" style="color: white"></span>
            </a>
        
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="{{ route('admin.perfil') }}" target="frameprincipal" class="dropdown-item">
                    <i class="fas fa-user"></i></i> Editar Perfil
                </a>
                <a href="#"  class="dropdown-item" id="modo">
                    <i class="fas fa-adjust"></i> Cambiar modo
                </a>
                <div class="dropdown-divider"></div>

                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                    document.getElementById('frm-logout').submit();" class="dropdown-item"> <i class="fas fa-sign-out-alt"></i></i></i> Cerrar Sesión</a>

                <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>



    </ul>
</nav>



<script>
// Cambia el modo de la página entre claro y oscuro
document.addEventListener('DOMContentLoaded', () => {
    const boton = document.getElementById('modo');
    const aside = document.getElementById('sidebar');
    const navbar = document.getElementById('navbar');
    const pushmenu = navbar.querySelector('[data-widget="pushmenu"]');
    const tituloLink = navbar.querySelector('.nav-item.d-none.d-sm-inline-block .nav-link');
    const dropdownLink = navbar.querySelector('.nav-item.dropdown > .nav-link');
    const dropdownIcon = dropdownLink.querySelector('i');
    const dropdownSpan = dropdownLink.querySelector('span');
    const brandText = aside.querySelector('.brand-text');
    const icono = boton.querySelector('i');

    // Función para aplicar el tema
    function aplicarTema(tema) {
        if (tema === 'oscuro') {
            aside.classList.remove('sidebar-light-primary');
            aside.classList.add('sidebar-dark-primary');
            brandText.style.color = 'white';

            navbar.classList.remove('navbar-light');
            navbar.classList.add('navbar-dark');
            pushmenu.style.color = 'white';
            tituloLink.style.color = 'white';
            dropdownIcon.style.color = 'white';
            dropdownSpan.style.color = 'white';

            // Cambia el texto del enlace
            boton.innerHTML = '<i class="fas fa-adjust"></i> Modo oscuro';
        } else {
            aside.classList.remove('sidebar-dark-primary');
            aside.classList.add('sidebar-light-primary');
            brandText.style.color = 'black';

            navbar.classList.remove('navbar-dark');
            navbar.classList.add('navbar-light');
            pushmenu.style.color = 'black';
            tituloLink.style.color = 'black';
            dropdownIcon.style.color = 'black';
            dropdownSpan.style.color = 'black';

            // Cambia el texto del enlace
            boton.innerHTML = '<i class="fas fa-adjust"></i> Modo claro';
        }
    }

    // Leer el tema guardado o usar 'oscuro' por defecto
    let tema = localStorage.getItem('tema') || 'oscuro';
    aplicarTema(tema);

    boton.addEventListener('click', function(e) {
        e.preventDefault();
        tema = (tema === 'oscuro') ? 'claro' : 'oscuro';
        aplicarTema(tema);
        localStorage.setItem('tema', tema);
    });
});
</script>