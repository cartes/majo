<?php
if(isset($_POST['boton'])){
    if($_POST['nombre'] == ''){
        $errors[1] = '<span class="error">Ingrese su nombre</span>';
    }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
        $errors[2] = '<span class="error">Ingrese un email correcto</span>';
    }else if($_POST['telefono'] == '' or !preg_match("/^[0-9]+$/",$_POST['telefono'])){
        $errors[3] = '<span class="error">Ingrese un teléfono</span>';
    }else{

$dest = "carlos.montes.c@gmail.com"; //Email de destino
$asunto = 'Contacto Majo Impulso - '; // acá se puede modificar el asunto del mail
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono']; //Asunto
//Cabeceras del correo
$headers = "From: $asunto $nombre <$email>\r\n"; //Quien envia?
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

$cuerpo = "Nombre: " . "<b>" . $_POST["nombre"] . "</b>" . "\r\n"; 
$cuerpo .= "<br>Email: " . $_POST["email"] . "\r\n";
$cuerpo .= "<br>Teléfono: " . $_POST["telefono"] . "\r\n";

if(mail($dest,$asunto,$cuerpo,$headers)){
    $result = '<div class="result_ok">Email enviado correctamente </div>';

// si el envio fue exitoso reseteamos lo que el usuario escribio:
    $_POST['nombre'] = '';
    $_POST['email'] = '';
    $_POST['telefono'] = '';
}else{
    $result = '<div class="result_fail">Hubo un error al enviar el mensaje </div>';

}
}
}
?>
<html>
<head>
    <title>MAJO IMPULSO</title>
    <link rel='stylesheet' href='formulario.css'>
    <link rel="stylesheet" type="text/css" href="custom.css">
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'>
    </script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:100,200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link rel="icon" href="iso.png" sizes="32x32" />

    <script src='funciones.js'>
    </script>
</head>
<body>
    <header>
        <img src="img/logo-majoimpulso.jpg">
    </header>
    <div class="box1">
        <div class="sello">
            <img src="img/sello.png">
        </div>
    </div>
    <div class="contenido">
        <h1>Nutrición consciente y cambio de hábitos</h1>
        <h2>Gisela Pitura</h2>

        <p class="destacado"> Gisela Pitura es nutricionista y autora de 2 libros:<br>
            "Nutrición para el cuerpo, mente, alma" y "Comida que sana".<br>
            En su conferencia abordará diferentes temáticas relacionada</br>
            con la Nutrición y el Bienestar:</p>
        <ul class="lista">
            <li>+ Aprenderás a mejorar tu calidad de vida</li>
            <li>+ Cómo cambiar hábitos y hacerlos sostenidos en el tiempo</li>
            <li>+ Cómo diferentes áreas de tu salud influyen en tu vida</li>
            <li>+ Recetas y tips para armar tu despensa  </li>
            <li>+ Asesoramiento sobre que equipamiento de cocina usar</li>
            <li>+ Información guías y mucho más...</li>
        </ul>

        <div class="info">
            <div class="date"><img src="img/fecha.png"></div>
            <div class="date"><img src="img/horario.png"></div>
            <div class="date"><img src="img/lugar.png"></div>
        </div>
    </div>


    <h3>Reservar</h3>

    <form class='contacto' method='POST' action="" id="formulario">
        <div>
            <label>Nombre:</label>
            <input type='text' class='nombre' name='nombre' placeholder="ingresa tu Nombre Apellido" value='<?php if(isset($_POST['nombre'])){ echo $_POST['nombre']; } ?>'>
            <?php if(isset($errors)){ echo $errors[1]; } ?>
        </div>
        <div>
            <label>Tu Email:</label>
            <input type='text' class='email' name='email' placeholder="ingresa un email válido" value='<?php if(isset($_POST['email'])){ $_POST['email']; } ?>'>
            <?php if(isset($errors)){ echo $errors[2]; } ?>
        </div>
        <div>
            <label>Teléfono:</label>
            <input type='tel' class='telefono' name='telefono' placeholder="ingresa tu teléfono" value='<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; } ?>'>
            <?php if(isset($errors)){ echo $errors[3]; } ?>
        </div>
        <div class="btn">
            <input type='submit' value='Enviar' class='boton' name='boton'>
        </div>
        <?php if(isset($result)) { echo $result; } ?>
    </form>

    <div class="contact">
        <div class="contact-cel"><img src="img/mail.png"> contacto@majoimpulso.cl</div>
        <div class="contact-cel"><img src="img/face.png"> MajoImpulso</div>
        <div class="contact-cel"><img src="img/insta.png"> majo_impulso</div>
        <div class="contact-cel"><a href="tel:+56978092489"><img src="img/fono.png"> +56 97 809 2489</a></div>
    </div>
</body>
</html>