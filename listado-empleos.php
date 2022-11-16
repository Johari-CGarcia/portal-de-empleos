<?php

function obtenerDatos(){
    $url = 'data/json.js';

    $datos = file_get_contents($url);

    $datos = json_decode($datos);
    
    return $datos->data;

}

$rs = obtenerDatos();

$empleosPorPagina = 10;

//Contar elementos del json
$totalElementos = count($rs);

$paginas = ceil($totalElementos/10);

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
            ENCUENTRA EL <br> <span>TRABAJO PERFECTO</span> <br> FACILMENTE
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

    <!-- search -->
    <div class="search-wrapper">
        <dic class="search-box">
            <div class="search-card">
                <input type="text" class="search-input" placeholder="Título del empleo o palabra clave">
                <button class="search-button">Buscar</button>
            </div>
        </dic>
    </div>

    <!-- filter box -->
    <div class="filter-box">
        <div class="filter-dropdown">
            <select name="job-level" id="job-level" class="filter-select">
                <option value="">Nivel</option>
                <option value="">Entry/Trainee</option>
                <option value="">Junior</option>
                <option value="">Mid-Senior</option>
                <option value="">Senior</option>
            </select>
            <select name="job-function" id="job-function" class="filter-select">
                <option value="">Categoría</option>
                <option value="">IT</option>
                <option value="">Management</option>
                <option value="">Education</option>
                <option value="">Construction</option>
            </select>
            <select name="employment" id="employment" class="filter-select">
                <option value="">Tipo</option>
                <option value="">Intership</option>
                <option value="">Part time</option>
                <option value="">Full time</option>
            </select>
            <select name="location" id="location" class="filter-select">
                <option value="">Ubicación</option>
                <option value="">Presencial</option>
                <option value="">Remoto</option>
                <option value="">Híbrido</option>
                <option value="">México</option>
                <option value="">USA</option>
            </select>
            <select name="education" id="education" class="filter-select">
                <option value="">Educación</option>
                <option value="">Secundaria</option>
                <option value="">Media superior</option>
                <option value="">Licenciatura</option>
                <option value="">Maestria</option>
                <option value="">Doctorado</option>
            </select>
        </div>

    </div>

    <section class="job-list" id="jobs">
    <?php 
                                
    $iniciar = ($_GET['pagina']-1)*$empleosPorPagina;
    $array = array_slice($rs, $iniciar, $empleosPorPagina);
                                
    ?>

    <?php foreach($array as $empleo): ?>

        <div class="job-card">
            <div class="job-name">
                <img src="assets/img/logo-empresa.png" alt="" class="job-profile">
                <div class="job-detail">
                    <h4><?php echo $empleo->Empresa;?></h4>
                    <a href="detalles-empleo.php?id=<?php echo $empleo->Id;?>" target="_blank"> 
                        <h3><?php echo $empleo->Titulo;?></h3> 
                    </a>
                    <p><?php echo $empleo->CatName;?></p>
                </div>
            </div>
            <div class="job-label">
                <a href="" class="label-a disabled"><?php echo $empleo->TipoEmpleo;?></a>
                <a href="" class="label-b disabled"><?php echo $empleo->UbicacionEstado;?></a>
                <a href="" class="label-c disabled"><?php echo $empleo->Sueldo;?> <?php echo $empleo->Moneda;?></a>
            </div>
            <div class="job-posted">
                Publicado hace 2 mins
            </div>
        </div>
    <?php endforeach;; ?>
	
    </section>

    
    <div class="pagination">
            <ul class="pagination--link">
                <li class="<?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>"> 
                    <a href="listado-empleos.php?pagina=<?php echo $_GET['pagina']-1 ?>"> 
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> 
                    </a> 
                </li>
               
                <?php for($i=0;$i<$paginas;$i++): ?>
                <li> 
                    <a href="listado-empleos.php?pagina=<?php echo $i+1?>" 
                    class="<?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"> 
                        <?php echo $i+1?> 
                    </a> 
                </li>
                <?php endfor ?>
                
                <li class="<?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>"> 
                    <a href="listado-empleos.php?pagina=<?php echo $_GET['pagina']+1 ?>"> 
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                    </a> 
                </li>
            </ul>
    </div>
    <br><br><br><br><br><br>

    <!-- featured company -->
    <section class="featured" id="companies">
        <h1 class="section-title">Empresas destacadas</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi molestias minima veritatis error 
            et excepturi.
        </p>
        <div class="featured-wrapper">
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
            </div>
            <div class="featured-card">
                <img src="assets/img/logo-empresa.png" alt="" class="featured-img">
                <p>Rostelecom</p>
                <button class="featured-button">Ver 2 empleos</button>
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