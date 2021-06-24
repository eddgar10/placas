<!DOCTYPE html>
<html>
<!-- 
Los datos ingresados son responsabilidad de quien los proporcion y de quien contacta

La información almacenada sera utilizda para realizar un analisis de datos y/o estadistico respecto a la relación busqueda y perdida de dicho documento a nivel nacional, por lo que los unicos datos que se almacenan de manera permanente son  "estado en que te encuentras", "fecha de consulta", "fecha de carga", "estado al que pertenece" y "estado donde se encuentra".

Una vez que se haya sucitado la recuperacion y/o entrega de una placa registrada en esta aplicación debera ponerse en contacto para dar de baja la información personal, esto se refiere a los registros "nombre del contacto", "telefono de contacto" "placa sin guiones" e "imagen de la placa"

Esta aplicación es gratuita, si deseas colaborar ó donar ponte en contacto via whatsapp al 2228040853
Estare trabajando constantemente en ella para mejorarla y hacer de ella una aplicación 100% funcional, util y persistente al servicio de todos en la republica mexicana.

El analisis grafico asi como la información estadistica se publicara una vez que se cuente con un numero de registros para realizarlo

El buen uso de la aplicación beneficia a todos.

Desarrollada por Edgar Espinosa Ordoñes Egresado de la Lic. en Ciencias de la Computación BUAP 2021
-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de placas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--PARA   sweetalert-->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        /* Rounded border */
        hr.rounded {
            border-top: 4px solid #bbb;
            border-radius: 5px;
        }

        #namanyay-search-btn {
            background: #0099ff;
            color: white;
            font: 'trebuchet ms', trebuchet;
            padding: 10px 20px;
            border-radius: 0 5px 5px 0;
            -moz-border-radius: 0 5px 5px 0;
            -webkit-border-radius: 0 5px 5px 0;
            -o-border-radius: 0 5px 5px 0;
            border: 0 none;
            font-weight: bold;
        }

        #namanyay-search-box {
            background: #eee;
            padding: 10px;
            border-radius: 5px 0 0 5px;
            -moz-border-radius: 5px 0 0 5px;
            -webkit-border-radius: 5px 0 0 5px;
            -o-border-radius: 5px 0 0 5px;
            border: 0 none;
            width: 210px;
        }

        body {
            text-align: center;
            padding: 200px;
            padding: 0px;
            margin: 0px;
            background-color: #212531;
        }

        #title {
            color: #fffffe;
            font-size: 50px;
        }

        #description {
            color: #b8c1ec !important;
        }

        .form-group label {
            color: #b8c1ec !important;
        }

        #survey-form .form-group #nameHelp,
        #survey-form .form-group #emailHelp {
            color: #a6aed4 !important;
        }

        #submit {
            background: #eebbc3;
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 10px;
            padding-bottom: 10px;
            color: #232946;
        }

        #submit:hover {
            background: #be969c;
            color: white;
        }

        #title svg {
            height: 70px;
            margin-top: -20px;
        }

        .form-check {
            margin: 5px;
        }

        .form-check label {
            color: #a6aed4 !important;
            font-size: 16px;
        }

        #askQuestion {
            color: #b8c1ec !important;
        }

        #submit svg {
            height: 24px;
            padding-left: 4px;
            padding-bottom: 2px;
            transition: all 0.2s ease;
        }

        #submit:hover svg {
            transform: scale(1.1);
            color: white !important;
        }

    </style>
</head>

<body>
    <!-- <script>
            alert(" *El buen uso de la aplicación beneficia a todos. \n *Si deseas colaborar ó donar contacta via whatsapp al 2228040853");
          </script> -->
    <script>
        swal("Si deseas donar contacta via whatsapp al 2228040853");


        function descripcion() {
            swal("Esta aplicación es gratuita, si deseas colaborar ó donar ponte en contacto via whatsapp al 2228040853 \n \n Los datos ingresados son responsabilidad de quien los proporcion y de quien contacta \n \n La información almacenada sera utilizda para realizar un analisis de datos y/o estadistico respecto a la relación busqueda y perdida de dicho documento a nivel nacional, por lo que los unicos datos que se almacenan de manera permanente son  'estado en que te encuentras', 'fecha de consulta', 'fecha de carga', 'estado al que pertenece' y 'estado donde se encuentra' \n \n  Una vez que se haya sucitado la recuperacion y/o entrega de una placa registrada en esta aplicación debera ponerse en contacto para dar de baja la información personal, esto se refiere a los registros 'nombre del contacto', 'telefono de contacto', 'placa sin guiones' e 'imagen de la placa'  \n \n Estare trabajando constantemente en ella para mejorarla y hacer de ella una aplicación 100% funcional, util y persistente al servicio de todos en la republica mexicana. \n \n El analisis grafico asi como la información estadistica se publicara una vez que se cuente con un numero de registros para realizarlo \n \n El buen uso de la aplicación beneficia a todos. \n \n  Desarrollada por Edgar Espinosa Ordoñes Egresado de la Lic. en Ciencias de la Computación BUAP");
        }

    </script>
    <br>
    <div class="container col-md-4">
        <hr class="rounded">
        <h1 id="title" class="text-center pt-5">Busqueda</h1>
        <h6 id="description" class="text-center text-muted">Verifica si alguien ha encontrado y publicado tu placa</h6>
        <form action="action/searchinfo.php" style="display:inline;" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Placa sin guiones</label><br>
                <input id="namanyay-search-box" name="buscaplaca" size="60" type="text" placeholder="numeros y letras juntos" / required pattern="[A-Za-z0-9]{5,10}">
            </div>
            <div class="form-group">
                <label>¿En que estado te encuentras?</label>
                <br>
                <select name="edo_visita">
                    <option value=aguascalientes>Aguascalientes</option>
                    <option value=baja_california>Baja California </option>
                    <option value=baja_california_sur>Baja California Sur </option>
                    <option value=campeche>Campeche </option>
                    <option value=chiapas>Chiapas </option>
                    <option value=chihuahua>Chihuahua </option>
                    <option value=coahuila>Coahuila </option>
                    <option value=colima>Colima </option>
                    <option value=distrito_federal”>Distrito Federal</option>
                    <option value=durango>Durango </option>
                    <option value=estado_de_mexico>Estado de México </option>
                    <option value=guanajuato>Guanajuato </option>
                    <option value=guerrero>Guerrero </option>
                    <option value=hidalgo>Hidalgo </option>
                    <option value=jalisco>Jalisco </option>
                    <option value=michoacan>Michoacán </option>
                    <option value=morelos>Morelos </option>
                    <option value=nayarit>Nayarit </option>
                    <option value=nuevo_leon>Nuevo León </option>
                    <option value=oaxaca>Oaxaca </option>
                    <option value=puebla>Puebla </option>
                    <option value=querétaro>Querétaro </option>
                    <option value=quintana_roo>Quintana Roo </option>
                    <option value=san_luis_potosi>San Luis Potosí </option>
                    <option value=sinaloa>Sinaloa </option>
                    <option value=sonora>Sonora </option>
                    <option value=tabasco>Tabasco </option>
                    <option value=tamaulipas>Tamaulipas </option>
                    <option value=tlaxcala>Tlaxcala </option>
                    <option value=veracruz>Veracruz </option>
                    <option value=yucatán>Yucatán </option>
                    <option value=zacatecas>Zacatecas</option>
                </select>
            </div>
            <input id="namanyay-search-btn" value="Buscar" type="submit" />
        </form>
    </div>


    <div class="container col-md-4">
        <hr class="rounded">
        <h1 id="title" class="text-center pt-5">Carga</h1>
        <h6 id="description" class="text-center text-muted">Sube tus datos de contacto y la placa encontrada </h6>
        <form action="action/submitinfo.php" method="post" enctype="multipart/form-data" id="import_form">
            <div class="form-group">
                <label>Nombre de contacto</label>
                <input type="text" class="form-control" id="nombre" placeholder="solo se aceptan letras" name="nombre" required pattern="[A-Za-z ]{4,30}">
            </div>
            <div class="form-group">
                <label>Telefono de Contacto</label>
                <input type="text" class="form-control" id="telefono" placeholder="solo numero a 10 Digitos" name="telefono" required pattern="[0-9]{10}">
            </div>
            <div class="form-group">
                <label id="placa-label">Placa sin Guiones</label>
                <input type="text" class="form-control" id="placa" placeholder="solo numeros y letras juntos" name="placa" required pattern="[A-Za-z0-9]{5,10}">
            </div>
            <div class="form-group">
                <label>¿A que estado pertenece la placa?</label>
                <select name="edo_pert">
                    <option value=aguascalientes>Aguascalientes</option>
                    <option value=baja_california>Baja California </option>
                    <option value=baja_california_sur>Baja California Sur </option>
                    <option value=campeche>Campeche </option>
                    <option value=chiapas>Chiapas </option>
                    <option value=chihuahua>Chihuahua </option>
                    <option value=coahuila>Coahuila </option>
                    <option value=colima>Colima </option>
                    <option value=distrito_federal”>Distrito Federal</option>
                    <option value=durango>Durango </option>
                    <option value=estado_de_mexico>Estado de México </option>
                    <option value=guanajuato>Guanajuato </option>
                    <option value=guerrero>Guerrero </option>
                    <option value=hidalgo>Hidalgo </option>
                    <option value=jalisco>Jalisco </option>
                    <option value=michoacan>Michoacán </option>
                    <option value=morelos>Morelos </option>
                    <option value=nayarit>Nayarit </option>
                    <option value=nuevo_leon>Nuevo León </option>
                    <option value=oaxaca>Oaxaca </option>
                    <option value=puebla>Puebla </option>
                    <option value=querétaro>Querétaro </option>
                    <option value=quintana_roo>Quintana Roo </option>
                    <option value=san_luis_potosi>San Luis Potosí </option>
                    <option value=sinaloa>Sinaloa </option>
                    <option value=sonora>Sonora </option>
                    <option value=tabasco>Tabasco </option>
                    <option value=tamaulipas>Tamaulipas </option>
                    <option value=tlaxcala>Tlaxcala </option>
                    <option value=veracruz>Veracruz </option>
                    <option value=yucatán>Yucatán </option>
                    <option value=zacatecas>Zacatecas</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>¿En que lugar se encuentra la placa?</label>
                <select name="edo_enc">
                    <option value=aguascalientes>Aguascalientes</option>
                    <option value=baja_california>Baja California </option>
                    <option value=baja_california_sur>Baja California Sur </option>
                    <option value=campeche>Campeche </option>
                    <option value=chiapas>Chiapas </option>
                    <option value=chihuahua>Chihuahua </option>
                    <option value=coahuila>Coahuila </option>
                    <option value=colima>Colima </option>
                    <option value=distrito_federal”>Distrito Federal</option>
                    <option value=durango>Durango </option>
                    <option value=estado_de_mexico>Estado de México </option>
                    <option value=guanajuato>Guanajuato </option>
                    <option value=guerrero>Guerrero </option>
                    <option value=hidalgo>Hidalgo </option>
                    <option value=jalisco>Jalisco </option>
                    <option value=michoacan>Michoacán </option>
                    <option value=morelos>Morelos </option>
                    <option value=nayarit>Nayarit </option>
                    <option value=nuevo_leon>Nuevo León </option>
                    <option value=oaxaca>Oaxaca </option>
                    <option value=puebla>Puebla </option>
                    <option value=querétaro>Querétaro </option>
                    <option value=quintana_roo>Quintana Roo </option>
                    <option value=san_luis_potosi>San Luis Potosí </option>
                    <option value=sinaloa>Sinaloa </option>
                    <option value=sonora>Sonora </option>
                    <option value=tabasco>Tabasco </option>
                    <option value=tamaulipas>Tamaulipas </option>
                    <option value=tlaxcala>Tlaxcala </option>
                    <option value=veracruz>Veracruz </option>
                    <option value=yucatán>Yucatán </option>
                    <option value=zacatecas>Zacatecas</option>
                </select>
            </div>
            <div class="form-group">
                <label>Mensaje para el propietario</label>
                <input type="text" class="form-control" id="mensaje" placeholder="mensaje para el propietario maximo 190 caracteres" name="mensaje" required maxlength="190">
            </div>
            <div class="form-group">
                <label>Carga una Imagen de la Placa</label>
                <input type="file" class="form-control" id="imagenplaca" name="imagenplaca" placeholder="Carga una imagen de la placa encontrada" multiple accept='image/*' required>
            </div>
            <input id="namanyay-search-btn" type="submit" class="btn btn-success btn-sm" name="import_data" value="Cargar Registro">
        </form>
        <br>
        <div class="container col-md-4">
            <form method="get" action="#">
                <button type="submit" href='javascript:;' onclick='descripcion();return false;' class="btn btn-success btn-sm">Acerca de...
                </button>
            </form>
        </div>
    </div>
</body>

</html>

<!-- 
Los datos ingresados son responsabilidad de quien los proporcion y de quien contacta

La información almacenada sera utilizda para realizar un analisis de datos y/o estadistico respecto a la relación busqueda y perdida de dicho documento a nivel nacional, por lo que los unicos datos que se almacenan de manera permanente son  "estado en que te encuentras", "fecha de consulta", "fecha de carga", "estado al que pertenece" y "estado donde se encuentra".

Una vez que se haya sucitado la recuperacion y/o entrega de una placa registrada en esta aplicación debera ponerse en contacto para dar de baja la información personal, esto se refiere a los registros "nombre del contacto", "telefono de contacto" "placa sin guiones" e "imagen de la placa"

Esta aplicación es gratuita, si deseas colaborar ó donar ponte en contacto via whatsapp al 2228040853
Estare trabajando constantemente en ella para mejorarla y hacer de ella una aplicación 100% funcional, util y persistente al servicio de todos en la republica mexicana.

El analisis grafico asi como la información estadistica se publicara una vez que se cuente con un numero de registros para realizarlo

El buen uso de la aplicación beneficia a todos.

Desarrollada por Edgar Espinosa Ordoñes Egresado de la Lic. en Ciencias de la Computación BUAP 2021
-->
