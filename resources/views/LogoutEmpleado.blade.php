<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Contacto.css') }}" />
</head>
<body>
    <section class="form_wrap">
        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Registro<br>de Empleados</h2>
            </section>
            <section class="info_items">
            </section>
        </section>
        <form action="/empleado/datos" method="post" class="form_contact" >
            {{ csrf_field() }}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div class="user_info">
                <label for="names"> Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="names"> Apellido</label>
                <input type="text" id="apellido" name="apellido" required>
                <label for="names"> Email</label>
                <input type="text" id="email" name="email" required>
                <label for="names"> Telefono</label>
                <input type="text" id="telefono" name="telefono" required>
                <label for="names"> Fecha de Contratacion</label>
                <input type="text" id="fecha_contratacion" name="fecha_contratacion" required>
                <label for="names"> Puesto</label>
                <input type="text" id="puesto" name="puesto" required>
                <label for="names"> Salario</label>
                <input type="text" id="salario" name="salario" required>
                <label for="names"> Departamento</label>
                <input type="text" id="departamento" name="departamento" required>
                <input type="submit" value="Enviar">   
            </div>
        </form>
    </section>
</body>
</html>