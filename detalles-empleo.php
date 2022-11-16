<?php
if(!empty($_GET['id'])){
    $id = $_GET['id'];
}
function obtenerDatos(){
    $url = 'data/json.js';

    $datos = file_get_contents($url);

    $datos = json_decode($datos);
    
    return $datos->data;

}

$rs = obtenerDatos();

foreach($rs as $elemento){
    $Id = $elemento->Id;
    if($Id == $id){
        $CatName = $elemento->CatName;
        $Titulo = $elemento->Titulo;
        $Empresa = $elemento->Empresa;
        $Sueldo = $elemento->Sueldo;
        $Moneda = $elemento->Moneda;
        $UbicacionEstado = $elemento->UbicacionEstado;
        $UbicacionCiudad = $elemento->UbicacionCiudad;
        $TipoEmpleo = $elemento->TipoEmpleo;
        $Descri = $elemento->Descri;
    }
    /*else{
        return null;
    }*/
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa de trabajo JobsPortal, nuevos empleos publicados diariamente</title>
    <!-- SEO organico -->
    <meta name="description" content="En JobsPortal puedes buscar miles de empleos en línea para 
        encontrar tu próximo reto profesional. Contamos con herramientas para búsqueda de empleo, 
        CV, evaluaciones de empresas y más.">
    <meta name="keywords" content="búsqueda de empleo, búsqueda de trabajo, JobsPortal, 
        buscador de empleos, buscador de ofertas de empleo, buscador de ofertas de trabajo, 
        buscador de empleo, buscador de trabajo, buscador de empleos, ofertas de empleo, 
        ofertas de trabajo, empleos, buscar trabajo, buscar empleo, buscar empleos, carrera, 
        trabajo, empleo, trabajar, encontrar trabajo, encontrar empleo, encontrar empleos">

    <!-- css style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Nunito&display=wsap" rel="stylesheet">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- header -->
    <header>
        <h1 class="header-title">
            <?php echo $CatName?>
        </h1>
    </header>

    <!-- navbar -->
    <nav class="navbar">
        <h2 class="navbar-logo"><a href="index.php">JobsPortal</a></h2>
        <div class="navbar-menu">
            <a href="#">Empleos</a>
            <a href="#">Empresas</a>
            <a href="#">Iniciar Sesión</a>
            <a href="#">Registrar</a>
        </div>
        <div class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <section class="job-list-item" id="jobs">
        <div>
            <div class="job-name-item">
                <img src="assets/img/logo-empresa.png" alt="" class="job-profile-item">
                <div class="info-job">
                    <h4><?php echo $Empresa?></h4>
                    <h3><?php echo $Titulo?></h3>
                    <p><?php echo $Descri?></p>
                </div>
            </div>
            <div class="job-label-item">
                <a href="#" class="label-a-item disabled">Part time</a>
                <a href="#" class="label-b-item disabled"><?php echo $UbicacionCiudad?>, <?php echo $UbicacionEstado?></a>
                <a href="#" class="label-c-item disabled">$<?php echo $Sueldo?> <?php echo $Moneda?></a>
                <a href="#" class="label-d-item"> Solicitar</a>
            </div>
        </div>
	
    </section>

    <footer>
        <div class="footer-wrapper">
            <h3>JobsPortal</h3>
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero maxime dicta sequi dolorum eos 
                incidunt voluptatibus magni!.
            </P>
            <div class="social-media">
                <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/" target="_blank"> <i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/" target="_blank"> <i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.youtube.com/" target="_blank"> <i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer-wrapper">
            <h4>Explorar</h4>
            <a href="#">Empresas top</a>
            <a href="#">Términos y condiciones</a>
            <a href="#">Podcast</a>
            <a href="#">Carreras</a>
        </div>
        <div class="footer-wrapper">
            <h4>Nosotros</h4>
            <a href="#">Preguntas frecuentes</a>
            <a href="#">Inspirate</a>
            <a href="#">Blog</a>
        </div>
        <div class="footer-wrapper">
            <h4>Soporte</h4>
            <a href="#">Servicio al cliente</a>
            <a href="#">Servicio al cliente</a>
            <a href="#">Servicio al cliente</a>
        </div>
        <div class="footer-wrapper">
            <h4>Comunidad</h4>
            <a href="#">Comunidad</a>
            <a href="#">Unete</a>
            <a href="#">Eventos</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>