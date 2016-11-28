@section('navbar')
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            
        </div>
        <ul class="navbar-nav">
            <li> Nuestros doctores </li>
            <li> Especialidades </li>
            
            @if($sesion_iniciada == 1)
                <li>Bienvenido {{ $usuario.nombre }}</li>
            @else
                <li>Registrarse</li>
                <li>Iniciar sesión</li>
            >@endif
        </ul>
    </nav>
@endsection