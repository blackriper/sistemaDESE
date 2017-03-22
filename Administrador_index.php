<?php 
    //Reanudamos la sesión 
  @session_start();
  //Validamos si existe realmente una sesión activa o no 
  if($_SESSION["autentica"] != "si" && $_SESSION['puesto']!=="Administrador")
  { 
    //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
    header("Location: index.html"); 
    @session_destroy(); 
  }
?>
<html lang="es-ES">
  <!--Seccion de Estilos y Contenidos-->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Sistema DESE" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'>
    <link href='menu/src/vendor/normalize.css/normalize.css' rel='stylesheet'>
    <link href='menu/src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>
    <link href="menu/dist/vertical-responsive-menu.min.css" rel="stylesheet">
    <link async href="css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/faviconupjr.png">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/formulario.css">
    <style is="custom-style">
      .layaut {@apply(--layout-horizontal);@apply(--layout-center-justified);}
    </style>
    <!--/////////////////////////////Elementos polymer//////////////////////////////////-->
    <link rel="import" href="elementos.html">
    <!--/////////////////////////////Seccion de Scripts/////////////////////////////////-->
    <script async src="js/jquery-2.1.4.js"></script>
    <script async src="polymer/webcomponentsjs/webcomponents-lite.min.js"></script>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>
    Sistema DESE
  </title>
  </head>

  <body>
    <!--////////////////////////////////////////Seccion dela cabecera////////////////////////////////////////-->
    <header class="header clearfix">
      <img src="img/lobo.png" align="right" height= "100px">
      <img src="img/logo.png" align="left" width="145px">
      <button type="button" id="toggleMenu" class="toggle_menu">
        <i class="fa fa-bars"></i>
      </button>
      <h1><center><p class="tit">Departamento de Estancias, Servicio Social y Estadías (DESE)</p></center></h1>
    </header>
    <!--////////////////////////////////////////Seccion del Menu/////////////////////////////////////////////-->
        <nav class="vertical_nav">
          <ul id="js-menu" class="menu">
            <li class="menu--item" data-route="home">
              <a href="/home" return false; class="menu--link" title="Home">
                <i class="menu--icon  fa fa-fw fa-home"></i>
                <span class="menu--label">Home</span>
              </a>
            </li> 
            <li data-route="liberacion" class="menu--item  menu--item__has_sub_menu">
              <label class="menu--link" title="Alumnos">
                <a href="/liberacion" return false;>
                  <i class="menu--icon  fa fa-fw fa-group"></i>
                  <span class="menu--label">Alumnos</span>
                </a>
              </label>
              <ul class="sub_menu">
                <li data-route="alta_alum" class="sub_menu--item">
                  <a href="/altaalu" return false; class="sub_menu--link sub_menu--link__active">Alta Alumnos</a>
                </li>
                <li data-route="cons_al" class="sub_menu--item">
                  <a href="/cona" return false; class="sub_menu--link sub_menu--link__active">Consulta Alumnos</a>
                </li>
                <li data-route="regis_alum_ser" class="sub_menu--item">
                  <a href="/regisalum" return false; class="sub_menu--link sub_menu--link__active">Registro Alumnos</a>
                </li>
                <li data-route="mod_al" class="sub_menu--item">
                  <a href="/almod" return false; class="sub_menu--link sub_menu--link__active">Modificar Alumnos</a>
                </li>
              </ul>
            </li>
            <li data-route="consulta_us" class="menu--item  menu--item__has_sub_menu">
              <label class="menu--link" title="Usuarios">
                <a href="/consul_us" return false;>
                  <i class="menu--icon  fa fa-fw fa-user-secret"></i>
                  <span class="menu--label">Usuarios</span>
                </a>
               </label>
              <ul class="sub_menu">
                <li data-route="alta_us" class="sub_menu--item">
                  <a href="/altaus" return false; class="sub_menu--link sub_menu--link__active">Alta Usuarios</a>
                </li>
                <li data-route="modifi" class="sub_menu--item">
                  <a href="/modi" return false; class="sub_menu--link sub_menu--link__active">Modificar Usuarios</a>
                </li>
                <li data-route="consulta_us" class="sub_menu--item">
                  <a href="/consul_us" return false; class="sub_menu--link sub_menu--link__active">Consultar Usuarios</a>
                </li>
              </ul>
            </li>
            <li data-route="configuracion" class="menu--item">
              <a href="/config" return false; class="menu--link" title="Configuraciones">
                <i class="menu--icon  fa fa-fw fa-cog"></i>
                <span class="menu--label">Configuraciones</span>
              </a>
            </li>
            <li class="menu--item">
              <a href="ManualdeUsuarioDESE.pdf" return false; target="_blank"class="menu--link" title="Manual de Usuario">
                <i class="menu--icon  fa fa-fw fa-file-pdf-o"></i>
                <span class="menu--label">Manual de Usuario</span>
              </a>
            </li>
            <li class="menu--item">
              <a href="salir.php" return false; class="menu--link" title="Cerrar Sesion">
                <i class="menu--icon  fa fa-fw fa-power-off"></i>
                <span class="menu--label">Cerrar Sesión</span>
              </a>
            </li>
          </ul>
          <button id="collapse_menu" class="collapse_menu">
            <i class="collapse_menu--icon  fa fa-fw"></i>
            <span class="collapse_menu--label"></span>
          </button>
        </nav>
        <div class="wrapper">
          <section class="contenido">
            <template is="dom-bind" id="app">
              <section class="bloque">
                  <iron-pages attr-for-selected="data-route" selected="{{route}}">
          <!--////////////////////////////////////Secciones para usuario/////////////////////////////////////////////-->
          <section data-route="home">
            <paper-card class="presentacion" elevation="8">
            <table style="float:center; width:700px;">
              <tr>
                <td><p align="left"><b>SISTEMA D.E.S.E</b></p></td>
                <td><p align="right" ><i><b>Bienvenido:</b> <?php echo $_SESSION["usuarioactual"]?>&nbsp;</i></p></span></td>
              </tr>
            </table>
              <!--//////////////////////////////////////////Seccion del Calendario/////////////////////////////////////-->
              <div style="background-color:rgba(0, 0, 0, 0.2);width:700px; height:460px; padding-bottom:15px;">
                <iframe class="layaut" width="700" height="460" src="calendario/calendario.html" scrolling="no" frameborder="no" ></iframe>
              </div>
            </paper-card>
          </section>
          <!--////////////////////////////////////////////////////Seccion Alta Usuarios/////////////////////////////////////////////////-->
          <section data-route="alta_us" class="layaut">
            <section>
              <paper-card heading="Nuevo Usuario" class="docentes-card" elevation="4">
                <form id="alta_us">
                  <div class="card-content">
                    <paper-input label="N° de Docente" id="matricula" class="cols2" char-counter maxlength="4" auto-validate pattern="[0-9]*"error-message="Solo Números"></paper-input>
                    <paper-input label="Nombre" id="nombre" class="cols2" maxlength="70" auto-validate pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" error-message="Solo letras"></paper-input>
                    <paper-input label="Apellidos" id="apellido"class="cols2"maxlength="70" auto-validate pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"error-message="Solo letras"></paper-input>
                    <paper-dropdown-menu  id="carrera" label="Carrera" attr-for-selected="car" selected="{{opcion}}">
                      <paper-menu class="dropdown-content" id="rasengan">
                        <paper-item car="ISA">ISA</paper-item>
                        <paper-item car="ITE">ITE</paper-item>
                        <paper-item car="IME">IME</paper-item>
                        <paper-item car="IFI">IFI</paper-item>
                        <paper-item car="IPL">IPL</paper-item>
                        <paper-item car="ADD">ADD</paper-item>
                      </paper-menu>
                    </paper-dropdown-menu>
                    <paper-input char-counter label="Contraseña" type="password" id="contraseña"  maxlength="8" auto-validate pattern=".{8}" error-message="La contraseña es max de 8 caracteres"></paper-input>
                    <paper-input char-counter label="Repetir Contraseña" type="password" id="loop" maxlength="8" auto-validate pattern=".{8}" error-message="La contraseña es max de 8 caracteres"></paper-input>
                    <paper-dropdown-menu label="Cargo">
                      <paper-menu class="dropdown-content" id="puesto" attr-for-selected="pue" selected="{{selection}}">
                        <paper-item pue="Director">Director</paper-item>
                        <paper-item pue="Tutor">Tutor</paper-item>
                        <paper-item pue="Administrador">Administrador</paper-item>
                      </paper-menu>
                    </paper-dropdown-menu><br><br>
                  </div>
                  <div class="card-actions">
                    <paper-button raised class="botondocente" onclick="ajax_altas_us()">Registrar</paper-button>
                  </div>
                </form>
              </paper-card> 
            </section>
          </section>
          <!--////////////////////////////////////////////////////Seccion Configuraciones/////////////////////////////////////////////////-->
          <section data-route="configuracion" class="layaut">
            <div style="margin-top:-60px;font-size:32px;padding-left:70px;">
                <p><b>Cambio de Contraseña</b></p>
              </div>   
            <div class="enter">    
              <paper-input label="N° de Administrador" id="mattr" class="cols" char-counter auto-validate pattern="[0-9]*"error-message="Solo Números" maxlength="4"></paper-input>
              <div class="vc"><paper-fab icon="search" id="serc1" style="background: #ff6e40;"title="Buscar Administrador"on-click="contraseña"></paper-fab></div>
            </div>
            <div id="cn_u1" class="ndc3" style="heihgt:300px;display:none;">
              <paper-card heading="Modificar Contraseña" class="docentes-card" style="height:365px;">
                <form id="modus" style="height:300px;">
                  <div class="card-content">
                    <paper-input disabled label="N° de Administrador" id="matri" class="cols2" char-counter maxlength="4" auto-validate pattern="[0-9]*"error-message="Solo Números"></paper-input>
                    <paper-input disabled char-counter label="Contraseña Actual" type="password" id="cont" class="cols2" maxlength="8" auto-validate pattern=".{8}" error-message="La contraseña es max de 8 caracteres"></paper-input>
                    <paper-input char-counter label="Nueva Contraseña" type="password" id="n_cont" class="cols2" maxlength="8" auto-validate pattern=".{8}" error-message="La contraseña es max de 8 caracteres"></paper-input>
                    <paper-input char-counter label="Repetir Nueva Contraseña" type="password" id="n_lo" class="cols2" maxlength="8" auto-validate pattern=".{8}" error-message="La contraseña la contraseña debe ser igual al campo anterior"></paper-input>
                    <br><br><br><br><br><br><br><br><br><br><br>
                  </div>
                  <div class="card-actions">
                    <paper-button class="botondocente" raised onclick="ajax_actualizar_contra()">Guardar</paper-button>
                  </div>
                </form>
              </paper-card> 
            </div>
            <div class="ndc2" style="heihgt:360px;width:180px;">
              <paper-card class="docentes-card-2" heading="Cuenta Fantasma" elevation="4">
                 <div class="card-content">
                  <article class="texto">La cuenta fantasma es una cuenta predeterminada que permite al 
                    usuario poder entrar con una matrícula y una contraseña ya establecidas en la base datos.<br><br>
                    Es recomendable utilizar la cuenta fantasma cuando hay un nuevo administrador en el sistema y
                    este no cuenta con usuario y contraseña personales.
                  </article>
                  </div>
                  <div class="card-actions">
                   <br> 
                  <center><b>Desactivada  </b><paper-toggle-button id="togg" on-click="ghost" checked></paper-toggle-button><b>  Activada</b></center>
                  <br>
                  </div>
              </paper-card>
            </div>
          </section>
          <!--////////////////////////////////////////////////////Seccion Modificar Usuarios/////////////////////////////////////////////////-->
          <section data-route="modifi" class="layaut">
            <div style="font-size:32px;margin-top:-50px;padding-left:70px;">
                <p><b>Modificar de Usuarios</b></p>
              </div>   
            <div class="enter"> 
              <paper-input label="N° de Docente" id="mattr1" class="cols"  char-counter auto-validate pattern="[0-9]*"error-message="Solo Números" maxlengh="4"></paper-input>
              <div class="vc"><paper-fab icon="search" id="serc" style="background: #2196f3;"title="Buscar Usuario"on-click="modificar"></paper-fab></div>
            </div>
            <div id="cn_u" style="display:none;padding-bottom:30px;padding-top:50px;">
              <paper-card heading="Modificar Usuario" class="docentes-card">
                <form id="modus">
                  <div class="card-content">
                    <paper-input label="N° de Docente" id="ino" class="cols2" char-counter maxlength="4" auto-validate pattern="[0-9]*"error-message="Solo Números"></paper-input>
                    <paper-input label="Nombre" id="nom" class="cols2" maxlength="70" auto-validate pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" error-message="Solo letras"></paper-input>
                    <paper-input label="Apellidos" id="ape"class="cols2"maxlength="70" auto-validate pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"error-message="Solo letras"></paper-input>
                    <paper-dropdown-menu id="ca" label="Carrera" attr-for-selected="car" selected="{{opcion}}">
                        <paper-menu class="dropdown-content" id="sub"attr-for-selected="car" selected="ISA">
                          <paper-item car="ISA">ISA</paper-item>
                          <paper-item car="ITE">ITE</paper-item>
                          <paper-item car="IME">IME</paper-item>
                          <paper-item car="IFI">IFI</paper-item>
                          <paper-item car="IPL">IPL</paper-item>
                          <paper-item car="ADD">ADD</paper-item>
                        </paper-menu>
                    </paper-dropdown-menu>
                    <paper-input char-counter label="Contraseña" type="password" id="shino"  maxlength="8" auto-validate pattern=".{8}" error-message="La contraseña es max de 8 caracteres"></paper-input>
                    <paper-input char-counter label="Repetir Contraseña" type="password" id="lo" maxlength="8" auto-validate pattern=".{8}" error-message="La contraseña es max de 8 caracteres"></paper-input>
                    <paper-dropdown-menu label="Cargo" class="con">
                      <paper-menu class="dropdown-content" id="puest" attr-for-selected="pue" selected="{{selection}}">
                        <paper-item pue="Director">Director</paper-item>
                        <paper-item pue="Tutor">Tutor</paper-item>
                        <paper-item pue="Administrador">Administrador</paper-item>
                      </paper-menu>
                    </paper-dropdown-menu><br><br>
                  </div>
                  <div class="card-actions">
                    <paper-button class="botondocente" raised onclick="ajax_actualizar_us()">Guardar</paper-button>
                  </div>
                </form>
              </paper-card> 
            </div>
          </section>
          <!--////////////////////////////////////////////////////Seccion Consultar Usuarios/////////////////////////////////////////////////-->
          <section data-route="consulta_us" class="layaut">
          <section id="tabla2" class="uchiha">
            <div style="margin-top:-65px;text-align:center;padding-left:150px;font-size:32px;">
              <p><b>Consulta General de Usuarios</b></p>
            </div>
              <iframe style="padding-left:120px;" width="970" height="1150" src="usuario_table.php" scrolling="no" frameborder="no" ></iframe>
           </section>
           </section>
           <!--////////////////////////////////////////////////////Seccion Consulta Alumnos////////////////////////////////////////////////////-->
          
          <section data-route="cons_al" class="layaut">
            <div style="padding-left:-50;"><p style="font-size:32px;"><b>Consulta de Alumnos</b></p>
            <section style="padding-left:45px;">
            <paper-material class="card4">
              <paper-dropdown-menu label="Proceso" class="co" id="pr">
                <paper-menu class="dropdown-content"id="kiba" attr-for-selected="registros" selected="{{opc}}">
                  <paper-item registros="serviciosocial"selected>Servicio Social</paper-item>
                  <paper-item registros="estancia1">Estancia 1</paper-item>
                  <paper-item registros="estancia2">Estancia 2</paper-item>
                  <paper-item registros="estadia">Estadía</paper-item>
                </paper-menu>
              </paper-dropdown-menu>
            </paper-material>
            </section></div>
            <section id="tabla" class="uzumaki"></section>
          </section>
          
          <!--//////////////////////////////////////////////////Consultar Liberacion General/////////////////////////////////////////////////-->
          
          <section data-route="liberacion" id="tabla3" class="uchiha" style="margin-top:-70px;">
            <div style="text-align:center;padding-left:250px;font-size:32px;">
              <p><b>Consulta General de Alumnos</b></p>
            </div>
            <iframe style="margin-bottom:10px;padding-left:160px;" width="1100" height="850" src="liberados.php" scrolling="no" frameborder="no" ></iframe>
          </section>
          
          <!--////////////////////////////////////////////////////Seccion Alta Alumnos////////////////////////////////////////////////////-->
          <section data-route="alta_alum" id="saru" class="layaut">
            <iron-ajax auto  url="obtutores.php" last-response="{{tutor}}" handle-as="json"></iron-ajax>
            <paper-card heading="Nuevo Alumno" class="card2" elevation="4">
              <form  id="altas_alum">
                <div class="card-content">
                  <paper-input label="No. de control" id="matr"  class="que" char-counter maxlength="9" auto-validate pattern="[0-9]*"error-message="Solo Números"></paper-input>
                  <paper-input label="Nombre" id="nomb"  class="que"maxlength="70" auto-validate pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" error-message="Solo letras"></paper-input >
                  <paper-input label="Apellidos" id="apel" class="que" maxlength="70" auto-validate pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" error-message="Solo letras"></paper-input>
                </div>
                <select name="nombre" id="tutor" class="burn">
                  <template is="dom-repeat" items="[[tutor]]"> 
                   <option value="[[item.tutor]]">[[item.tutor]]</option>
                  </template>
                </select>
                <paper-dropdown-menu label="Carrera">
                  <paper-menu class="dropdown-content" id="car" attr-for-selected="zoo" selected="{{seted}}">
                    <paper-item zoo="ISA">ISA</paper-item>
                    <paper-item zoo="ITE">ITE</paper-item>
                    <paper-item zoo="IME">IME</paper-item>
                    <paper-item zoo="IFI">IFI</paper-item>
                    <paper-item zoo="IPL">IPL</paper-item>
                   </paper-menu>
                </paper-dropdown-menu>
                <div class="card-actions">
                  <paper-button id="boton" raised onclick="ajax_altas_alum()">Registrar</paper-button>
                </div>
              </form>
            </paper-card> 
          </section>
          <!--////////////////////////////////////////////////////Seccion Registros Alumnos////////////////////////////////////////////////////-->
          <section data-route="regis_alum_ser" class="layaut">
            <div style="margin-top:-50px;text-align:left;font-size:32px;">
              <p><b>Registro de Alumnos</b></p>
            </div>
            <paper-material  class="card3" elevation="4">
              <div>
                <paper-input class="cols3" label="Matricula de Alumno" char-counter maxlength="9" auto-validate pattern="[0-9]*"error-message="Solo numeros" id="gh"></paper-input>
              </div>
              <div>
                <paper-dropdown-menu label="Proceso" class="co" id="prcs" disabled>
                  <paper-menu class="dropdown-content"id="proceso" attr-for-selected="registros" selected="{{op}}">
                    <paper-item registros="SERVICIO"selected>Servicio Social</paper-item>
                    <paper-item registros="ESTANCIA1">Estancia 1</paper-item>
                    <paper-item registros="ESTANCIA2">Estancia 2</paper-item>
                    <paper-item registros="ESTADIA">Estadía</paper-item>
                  </paper-menu>
                </paper-dropdown-menu>
              </div>
              <div class="butsub">       
                <paper-button class="botondocente" id="hokage"raised onclick="buscar_alu()">Buscar</paper-button>
              </div>
              <div class="sharingan">    
              <paper-button class="itachi" id="raikage" disabled raised onclick="nuevo()">Nuevo</paper-button>
            </div>
            </paper-material> 
            <div id="tarro" style="display:none;" > 
              <paper-card heading="Estancia 1" class="estancia1" elevation="4" id="es_1">
                <div class="card-content">
                 <paper-input label="Organismo" id="es_or" style="width:300px;"></paper-input>
                 <paper-dropdown-menu label="Periodo" style="padding-left:20px;">
                  <paper-menu class="dropdown-content" id="es_pe" attr-for-selected="periodo" selected="{{selcv}}">
                    <paper-item periodo="per1">Enero-Abril</paper-item>
                    <paper-item periodo="per2">Mayo-Agosto</paper-item>
                    <paper-item periodo="per3">Septiembre-Diciembre</paper-item>
                  </paper-menu>
                </paper-dropdown-menu>
                  <br><br>
                  <paper-checkbox id="check3">REC03</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check4">EV</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check5">CT</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check6">CA</paper-checkbox>
                </div>
                <div class="card-actions">
                  <paper-button onclick="estancia1()">Guardar</paper-button>
                </div>
              </paper-card>
            </div>  
            <div id="tarro1" style="display:none;">  
              <paper-card heading="Estancia 2" class="estancia2" elevation="4" id="es_2">
                <div class="card-content">
                 <paper-input label="Organismo" id="est_or" style="width:300px;"></paper-input>
                 <paper-dropdown-menu label="Periodo" style="padding-left:20px;">
                  <paper-menu class="dropdown-content" id="est_pe" attr-for-selected="period" selected="{{pe}}">
                    <paper-item period="per1">Enero-Abril</paper-item>
                    <paper-item period="per2">Mayo-Agosto</paper-item>
                    <paper-item period="per3">Septiembre-Diciembre</paper-item>
                  </paper-menu>
                </paper-dropdown-menu>
                  <br><br>
                  <paper-checkbox id="check7">REC03</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check8">EV</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check9">CT</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check10">CA</paper-checkbox>
                </div>
                <div class="card-actions">
                  <paper-button onclick="estancia2()">Guardar</paper-button>
                </div>
            </div>  
            <div id="tarro2" style="display:none;"> 
              <paper-card heading="Servicio Social" class="servicio_Social" elevation="4"  id="se_s"> 
                <div class="card-content">
                 <paper-input label="Organismo"id="ser_or"style="width:270px;"></paper-input>
                  <paper-dropdown-menu label="Periodo" style="padding-left:20px;">
                  <paper-menu class="dropdown-content" id="ser_pe" attr-for-selected="perio" selected="{{shinigami}}">
                    <paper-item perio="per1">Enero-Abril</paper-item>
                    <paper-item perio="per2">Mayo-Agosto</paper-item>
                    <paper-item perio="per3">Septiembre-Diciembre</paper-item>
                  </paper-menu>
                </paper-dropdown-menu>
                  <br><br>
                  <paper-checkbox id="check1">REC03</paper-checkbox>&nbsp;&nbsp;&nbsp;&nbsp;
                  <paper-checkbox id="check2">CT</paper-checkbox>
                </div>
                <div class="card-actions">
                  <paper-button onclick="serviciosocial()">Guardar</paper-button>
                </div>
              </paper-card>
            </div>  
            <div id="tarro3" style="display:none;">  
             <paper-card heading="Estadía" class="estadia" elevation="4" id="esta_2">
                <div class="card-content">
                 <paper-input label="Organismo" id="esta_or" style="width:300px;"></paper-input>
                 <paper-dropdown-menu label="Periodo" style="padding-left:20px;">
                  <paper-menu class="dropdown-content" id="esta_per" attr-for-selected="peri" selected="{{rem}}">
                    <paper-item peri="per1">Enero-Abril</paper-item>
                    <paper-item peri="per2">Mayo-Agosto</paper-item>
                    <paper-item peri="per3">Septiembre-Diciembre</paper-item>
                  </paper-menu>
                </paper-dropdown-menu>
                  <br><br>
                  <paper-checkbox id="check11">REC03</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check12">EV</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check13">CT</paper-checkbox>&nbsp;&nbsp;
                  <paper-checkbox id="check14">CA</paper-checkbox>
                </div>
                <div class="card-actions">
                  <paper-button onclick="estadia()">Guardar</paper-button>
                </div>
            </div>  
          </section>
          <!--///////////////////////////////////////////ACTUALIZAR ALUMNO//////////////////////////////////////////////////////77-->
          <section data-route="mod_al" class="layaut">
            <div style="margin-top:-60px;font-size:32px;padding-left:35px;">
                <p><b>Modificar Alumnos</b></p>
              </div>   
            <div class="enter1">    
              <paper-input label="No. de control" id="infinito"  class="cols" char-counter maxlength="9" auto-validate pattern="[0-9]*"error-message="Solo Números"></paper-input>
              <div class="vc"><paper-fab icon="search" id="polycast" style="background: #607d8b;"title="Buscar Alumno" mini on-click="buscar"></paper-fab></div>
            </div>
             <div id="cn_ac" class="ndc">
              <paper-card heading="Modificar Alumno" class="card-material" elevation="4">
                 <form  id="act_alum">
                <div class="card-content">
                  <paper-input label="No. de control" id="arenita"  class="que" char-counter maxlength="9" auto-validate pattern="[0-9]*"error-message="Solo Números"></paper-input>
                  <paper-input label="Nombre" id="larry"  class="que"maxlength="70" auto-validate pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" error-message="Solo letras"></paper-input >
                  <paper-input label="Apellidos" id="doncangrejo" class="que" maxlength="70" auto-validate pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" error-message="Solo letras"></paper-input>
                </div>
                <select name="nombre" id="mrspop" class="burn1">
                  <template is="dom-repeat" items="[[tutor]]"> 
                   <option value="[[item.tutor]]">[[item.tutor]]</option>
                  </template>
                </select>
                <paper-dropdown-menu label="Carrera">
                  <paper-menu class="dropdown-content" id="gary" attr-for-selected="zoo" selected="{{seted}}">
                    <paper-item zoo="ISA">ISA</paper-item>
                    <paper-item zoo="ITE">ITE</paper-item>
                    <paper-item zoo="IME">IME</paper-item>
                    <paper-item zoo="IFI">IFI</paper-item>
                    <paper-item zoo="IPL">IPL</paper-item>
                   </paper-menu>
                </paper-dropdown-menu>
                <div class="card-actions">
                  <paper-button id="boton" raised onclick="ajax_actualizar_alu()">Guardar</paper-button>
                    </div>
                  </form>
                </paper-card> 
             </div>
          </section>
       </iron-pages>
    </section>
   </template>
  </section>
          <!--/////////////////////////////////////////////////////////Notificaciones///////////////////////////////////////////////////////////////-->
          <paper-dialog id="iguales" modal class="kira">
            <center><h2><b>Advertencia</b></h2></center>
            <div class="n">
              <img src="img/warning.png">
            </div>
            <article> Los Campos de Contraseña y Repetir Contraseña deben ser  iguales.</article>
            <div class="buttons">
              <paper-button dialog-confirm autofocus>Aceptar</paper-button>
            </div>
          </paper-dialog>

          <paper-dialog id="vacios" modal class="kira">
            <center><h2><b>Advertencia</b></h2></center>
              <div class="n">
                <img src="img/error.png">
              </div>
              <article>No se puede introducir campos vacíos.</article>
              <div class="buttons">
                <paper-button dialog-confirm autofocus>Aceptar</paper-button>
              </div>
          </paper-dialog>
        </div>
    <script async src="js/design.js"></script>
    <script async src="js/material.js"></script>
    <script async src="menu/dist/vertical-responsive-menu.min.js"></script>
    <script async src="js/lolipop.js"></script>

    <!--/////Script temporizador de pagina web sin actividad/////-->
    <script>
        var time = new Date().getTime();
        $(document.body).bind("mousemove keypress click", function(e) {
            time = new Date().getTime();
        });
        function refresh() {
            if(new Date().getTime() - time >= 1200000)
                window.location.reload(true);
            else{
                setTimeout(refresh, 1000);}
          }
        setTimeout(refresh, 1000);
      </script>
  </body>
</html>