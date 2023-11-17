'<!DOCTYPE html>'+
'<html lang="es">'+
'<head>'+
    '<meta charset="utf-8">'+
    '<link rel="icon" href="https://louvastudio.com/wp-content/uploads/2019/08/cropped-favicon-louva-new-32x32.png" sizes="32x32">'+
    '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">'+
    '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>'+
    '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>'+
    '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>'+
    '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />'+
    '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />'+
    '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />'+
    '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />'+
    '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">'+
    '<script src="https://www.google.com/recaptcha/api.js" async defer></script>'+
    '<title>Louva | Bitacora de trabajo</title>'+
    '<script>		'+
        'window.addEventListener("keypress", function(event){'+
        'if (event.keyCode == 13){'+
        '    event.preventDefault();'+
        '}'+
        '}, false);'+
    '</script>'+
    '<style>'+
        'body {'+
        'background-color: #313a46;'+
        '}'+
    
        '.logo-img {'+
            'background-image: url("https://louvastudio.com/wp-content/uploads/2019/08/whitelogo-louva.png");'+
            'background-repeat: no-repeat;'+
            'background-size: contain;'+
            'background-position: center;'+
            'height: 190px; '+
            'background-color: #313a46;'+
        '}'+
        'form label,'+
        'form select,'+
        'form input[type="text"],'+
        'form button {'+
            'color: white;'+
        '}'+
    '</style>'+
'</head>'+
'<body>'+
'<div class="container mt-5">'+

'<div class="row">'+
'<div class="col-12 logo-img">'+

'</div>'+
'</div>'+
'<h2 class="text-center" style="color: whitesmoke;">LVA Bitacora de trabajo</h2>'+

'<div class="row">'+
'<div class="col-4"></span> </div>'+
'<div class="col-4 text-center">'+
'<button type="button" class="btn btn-primary btn-circle" onclick="duplicateForm()">'+
'<i class="fas fa-plus"></i>'+
'</button>'+

'</div>'+
'<div class="col-4"></div>'+
'</div>'+

'<form id="form_bitacora" method="post" action="https://script.google.com/a/macros/louvastudio.com/s/AKfycbxifWWmnOwi10zW6bltILwR195w-FnzmulAc1tCEit9FfgTI8Mcht2Dogd63SgLuiwy/exec">'+
'<div class="row" id="form_to_bitacora_1">'+

'<div class="col-4"></div>'+
'<div class="col-4">'+
'<div class="form-group">'+
'<label for="proyecto">Proyecto: <span id="miContenedor">1</span></label>'+
'<select class="form-select" id="proyecto" name="proyecto[]" data-placeholder="Elige de la lista">'+
'<option value="0">Elige una opción del menú</option>'+
'<option value="0000_ADMINISTRACION"> 0000_ADMINISTRACION </option>'+
'<option value="0001_INTERKONE"> 0001_INTERKONE </option>'+
'<option value="0002_PRANA"> 0002_PRANA </option>'+
'<option value="0003_YANTRA"> 0003_YANTRA </option>'+
'<option value="0004_CASA PITUS"> 0004_CASA PITUS </option>'+
'<option value="0006_CASA SAHAGUN"> 0006_CASA SAHAGUN </option>'+
'<option value="0007_KANTÉ"> 0007_KANTÉ </option>'+
'<option value="0008_BODEGAS"> 0008_BODEGAS </option>'+
'<option value="0009_CANTABRIA"> 0009_CANTABRIA </option>'+
'<option value="0010_MARAKATE"> 0010_MARAKATE </option>'+
'<option value="0011_AMERICAS 1320"> 0011_AMERICAS 1320 </option>'+
'<option value="0012_LOS ENCINOS"> 0012_LOS ENCINOS </option>'+
'<option value="0013_ENTORNO FLORESTA"> 0013_ENTORNO FLORESTA </option>'+
'<option value="0014_OFICINAS PROTECCIÓN CIVIL NUEVO LEÓN"> 0014_OFICINAS PROTECCIÓN CIVIL NUEVO LEÓN </option>'+
'<option value="0015_EL TAPATÍO"> 0015_EL TAPATÍO </option>'+
'<option value="0016_CAVA SAN MIGUEL"> 0016_CAVA SAN MIGUEL </option>'+
'<option value="0017_ENTORNO LAGUNA"> 0017_ENTORNO LAGUNA </option>'+
'<option value="0018_LA PUEBLITA AJIJIC"> 0018_LA PUEBLITA AJIJIC </option>'+
'<option value="0019_LA PUEBLITA SAN MIGUEL"> 0019_LA PUEBLITA SAN MIGUEL </option>'+
'<option value="0020_EL MANGLE"> 0020_EL MANGLE </option>'+
'<option value="0021_LA PUEBLITA ENSENADA"> 0021_LA PUEBLITA ENSENADA </option>'+
'<option value="0022_SOHO"> 0022_SOHO </option>'+
'<option value="0023_LEGACY TOWER"> 0023_LEGACY TOWER </option>'+
'<option value="0024_DISTRITO CUBE"> 0024_DISTRITO CUBE </option>'+
'<option value="0025_LA28"> 0025_LA28 </option>'+
'<option value="0026_OFICINAS 4T"> 0026_OFICINAS 4T </option>'+
'<option value="0027_CASA ZEPEDA"> 0027_CASA ZEPEDA </option>'+
'<option value="0028_CASA CHAPALA"> 0028_CASA CHAPALA </option>'+
'<option value="0029_CONCHAS CHINAS"> 0029_CONCHAS CHINAS </option>'+
'<option value="0030_EL CAMPESTRE"> 0030_EL CAMPESTRE </option>'+
'<option value="0031_LA PUEBLITA VALLARTA"> 0031_LA PUEBLITA VALLARTA </option>'+
'<option value="0032_AMAPAS"> 0032_AMAPAS </option>'+
'<option value="0033_PETREO"> 0033_PETREO </option>'+
'<option value="0034_ÁREAS VERDES P019A"> 0034_ÁREAS VERDES P019A </option>'+
'<option value="0035_ÁREAS VERDES P019B"> 0035_ÁREAS VERDES P019B </option>'+
'<option value="0036_CENTRO DE SALUD P018"> 0036_CENTRO DE SALUD P018 </option>'+
'<option value="0037_BOMBEROS P022"> 0037_BOMBEROS P022 </option>'+
'<option value="0038_CENTRO DE DESARROLLO COMUNITARIO"> 0038_CENTRO DE DESARROLLO COMUNITARIO </option>'+
'<option value="0039_CHACAJ"> 0039_CHACAJ </option>'+
'<option value="0040_GANZA"> 0040_GANZA </option>'+
'<option value="0041_FRAY PEDRO AYALA"> 0041_FRAY PEDRO AYALA </option>'+
'<option value="0042_SAO PAULO URBANO"> 0042_SAO PAULO URBANO </option>'+
'<option value="0043_ESSENTIA COUNTRY"> 0043_ESSENTIA COUNTRY </option>'+
'<option value="0044_CASA GALLO"> 0044_CASA GALLO </option>'+
'<option value="0045_CASA TOTOTLÁN"> 0045_CASA TOTOTLÁN </option>'+
'<option value="0046_HOSPITAL MIGUEL HIDALGO"> 0046_HOSPITAL MIGUEL HIDALGO </option>'+
'<option value="0047_CASA MARTINEZ"> 0047_CASA MARTINEZ </option>'+
'<option value="0048_COLOMOS PATRIA"> 0048_COLOMOS PATRIA </option>'+
'<option value="0049_THALATHA"> 0049_THALATHA </option>'+
'<option value="0050_SAO PAULO VERTICAL"> 0050_SAO PAULO VERTICAL </option>'+
'<option value="0051_PARKS"> 0051_PARKS </option>'+
'<option value="0052_CASA GONZALEZ"> 0052_CASA GONZALEZ </option>'+
'<option value="0053_PUERTA TLALNEPANTLA"> 0053_PUERTA TLALNEPANTLA </option>'+
'<option value="0054_TORRE DEL PRADO"> 0054_TORRE DEL PRADO </option>'+
'<option value="0055_SAN JUAN DE ALIMA"> 0055_SAN JUAN DE ALIMA </option>'+
'<option value="0056_SECRET BEACH"> 0056_SECRET BEACH </option>'+
'<option value="0057_OFICINAS SAO PAULO"> 0057_OFICINAS SAO PAULO </option>'+
'<option value="0058_BALLINA SAO PAULO"> 0058_BALLINA SAO PAULO </option>'+
'<option value="0059_MILES CHRISTI"> 0059_MILES CHRISTI </option>'+
'<option value="0060_STUDIO 24"> 0060_STUDIO 24 </option>'+
'<option value="0061_CHAPULTEPEC 427"> 0061_CHAPULTEPEC 427 </option>'+
'<option value="0062_SCZ"> 0062_SCZ </option>'+
'<option value="0063_UNIVERSIDAD"> 0063_UNIVERSIDAD </option>'+
'<option value="0064_DIVISADERO 4"> 0064_DIVISADERO 4 </option>'+
'<option value="0065_ESTACIÓN LEONA VICARIO"> 0065_ESTACIÓN LEONA VICARIO </option>'+
'<option value="0066_KAUYUMARI"> 0066_KAUYUMARI </option>'+
'<option value="0067_PROTOTIPO FRIDA"> 0067_PROTOTIPO FRIDA </option>'+
'<option value="0068_PROTOTIPO MONSIVAIS"> 0068_PROTOTIPO MONSIVAIS </option>'+
'<option value="0069_PROTOTIPO OROZCO"> 0069_PROTOTIPO OROZCO </option>'+
'<option value="0070_PROTOTIPO ALISIOS"> 0070_PROTOTIPO ALISIOS </option>'+
'<option value="0071_PROTOTIPO FUENTES"> 0071_PROTOTIPO FUENTES </option>'+
'<option value="0072_PROTOTIPO LOFT"> 0072_PROTOTIPO LOFT </option>'+
'<option value="0073_PROTOTIPO NUEVO"> 0073_PROTOTIPO NUEVO </option>'+
'<option value="0079_MASCOTA"> 0079_MASCOTA </option>'+
'<option value="0080_THE DISTRICT"> 0080_THE DISTRICT </option>'+
'<option value="0081_SIENA"> 0081_SIENA </option>'+
'<option value="0082_AMENIDADES - PUNTO DE VENTA"> 0082_AMENIDADES - PUNTO DE VENTA </option>'+
'<option value="0083_AMENIDADES - TERRAZA SIN GIMNASIO"> 0083_AMENIDADES - TERRAZA SIN GIMNASIO </option>'+
'<option value="0084_AMENIDADES - CASETA DE INGRESO (CASAS)"> 0084_AMENIDADES - CASETA DE INGRESO (CASAS) </option>'+
'<option value="0085_AMENIDADES - CASETA DE INGRESO (CONJUNTO)"> 0085_AMENIDADES - CASETA DE INGRESO (CONJUNTO) </option>'+
'<option value="0086_AMENIDADES - TERRAZA CON GIMNASIO"> 0086_AMENIDADES - TERRAZA CON GIMNASIO </option>'+
'<option value="0087_AMENIDADES - CASETA DE INGRESO (LOTES)"> 0087_AMENIDADES - CASETA DE INGRESO (LOTES) </option>'+
'<option value="0088_AMENIDADES - HITO"> 0088_AMENIDADES - HITO </option>'+
'<option value="0089_AMENIDADES - TERRASOLES"> 0089_AMENIDADES - TERRASOLES </option>'+
'<option value="0089_TORRE JUAN SORIANO"> 0089_TORRE JUAN SORIANO </option>'+
'<option value="0090_TORRE CAMPO DE POLO"> 0090_TORRE CAMPO DE POLO </option>'+
'<option value="0091_BODEGAS CLJ"> 0091_BODEGAS CLJ </option>'+
'<option value="0092_TORRE VERSALLES"> 0092_TORRE VERSALLES </option>'+
'<option value="0093_MERCADO VERSALLES"> 0093_MERCADO VERSALLES </option>'+
'<option value="0094_OFICINA LOUVA"> 0094_OFICINA LOUVA </option>'+
'<option value="0095_GALARZAS"> 0095_GALARZAS </option>'+
'<option value="0096_REMODELACIÓN PUNTO SAO PAULO"> 0096_REMODELACIÓN PUNTO SAO PAULO </option>'+
'<option value="0097_EL TIGRE"> 0097_EL TIGRE </option>'+
'<option value="0098_VIVENTO"> 0098_VIVENTO </option>'+
'<option value="0099_VALLE"> 0099_VALLE </option>'+
'<option value="0100_ARCOS"> 0100_ARCOS </option>'+
'<option value="0101_DE LOS POETAS"> 0101_DE LOS POETAS </option>'+
'<option value="0102_ESFERA MORELIA"> 0102_ESFERA MORELIA </option>'+
'<option value="0103_HUAXTLA"> 0103_HUAXTLA </option>'+
'<option value="0104_SIENA SUPERVISION"> 0104_SIENA SUPERVISION </option>'+
'<option value="0105_ESTACIÓN CHICHEN ITZA"> 0105_ESTACIÓN CHICHEN ITZA </option>'+
'<option value="0106_ALMASELVA \'LOTE 3\'"> 0106_ALMASELVA \'LOTE 3\' </option>'+
'<option value="0107_ALMASELVA \'LOTE 4\'"> 0107_ALMASELVA \'LOTE 4\' </option>'+
'<option value="0108_ALMASELVA \'LOTE 5\'"> 0108_ALMASELVA \'LOTE 5\' </option>'+
'<option value="0109_ALMASELVA \'LOTE 14\'"> 0109_ALMASELVA \'LOTE 14\' </option>'+
'<option value="0110_ALMASELVA \'LOTE 8\'"> 0110_ALMASELVA \'LOTE 8\' </option>'+
'<option value="0111_ALMASELVA \'LOTE 21\'"> 0111_ALMASELVA \'LOTE 21\' </option>'+
'<option value="0112_ALMASELVA \'LOTE 12\'"> 0112_ALMASELVA \'LOTE 12\' </option>'+
'<option value="0000_PROMOCION"> 0000_PROMOCION </option>'+
'<option value="0000_COTIZACIONES"> 0000_COTIZACIONES </option>'+
'<option value="0000_ESTANDARIZACION"> 0000_ESTANDARIZACION </option>'+
'<option value="0000_CAPACITACION"> 0000_CAPACITACION </option>'+
'<option value="0112_INCA CENTRO ADMINISTRATIVO TLAJOMULCO"> 0112_INCA CENTRO ADMINISTRATIVO TLAJOMULCO </option>'+
'<option value="0074_PUNTO SAN PEDRO TLAQUEPAQUE"> 0074_PUNTO SAN PEDRO TLAQUEPAQUE </option>'+
'<option value="0075_BODEGAS SAN ISIDRO"> 0075_BODEGAS SAN ISIDRO </option>'+
'</select>'+
'</div>'+
'<div class="form-group">'+
'<label for="categoria">Categoria:</label>'+
'<select class="form-select" id="categoria" name="categoria[]" data-placeholder="Elige de la lista">'+
'<option value="0">Elige una opción del menú</option>'+
'<option value="ADMINISTRACION">ADMINISTRACION</option>'+
'<option value="CALCULO Y PROYECTO DE AIRE ACONDICIONADO">CALCULO Y PROYECTO DE AIRE ACONDICIONADO</option>'+
'<option value="PROYECTO ARQUITECTONICO">PROYECTO ARQUITECTONICO</option>'+
'<option value="CATALOGO DE CONCEPTOS AIRE ACONDICIONADO">CATALOGO DE CONCEPTOS AIRE ACONDICIONADO</option>'+
'<option value="CATALOGO DE CONCEPTOS ARQUITECTURA">CATALOGO DE CONCEPTOS ARQUITECTURA</option>'+
'<option value="CATALOGO DE CONCEPTOS ELECTRICO">CATALOGO DE CONCEPTOS ELECTRICO</option>'+
'<option value="CATALOGO DE CONCEPTOS ESTRUCTURA">CATALOGO DE CONCEPTOS ESTRUCTURA</option>'+
'<option value="CATALOGO DE CONCEPTOS HIDROSANITARIO">CATALOGO DE CONCEPTOS HIDROSANITARIO</option>'+
'<option value="CATALOGO DE CONCEPTOS TELECOMUNICACIONES">CATALOGO DE CONCEPTOS TELECOMUNICACIONES</option>'+
'<option value="DOCUMENTACION AIRE ACONDICIONADO">DOCUMENTACION AIRE ACONDICIONADO</option>'+
'<option value="DOCUMENTACION ARQUITECTURA">DOCUMENTACION ARQUITECTURA</option>'+
'<option value="DOCUMENTACION ELECTRICO">DOCUMENTACION ELECTRICO</option>'+
'<option value="DOCUMENTACION ESTRUCTURA">DOCUMENTACION ESTRUCTURA</option>'+
'<option value="DOCUMENTACION HIDROSANITARIO">DOCUMENTACION HIDROSANITARIO</option>'+
'<option value="DOCUMENTACION TELECOMUNICACIONES">DOCUMENTACION TELECOMUNICACIONES</option>'+
'<option value="CALCULO Y PROYECTO ELECTRICO">CALCULO Y PROYECTO ELECTRICO</option>'+
'<option value="CALCULO Y PROYECTO ESTRUCTURAL">CALCULO Y PROYECTO ESTRUCTURAL</option>'+
'<option value="GERENCIA DE CONCUROS Y CONTRATOS">GERENCIA DE CONCUROS Y CONTRATOS</option>'+
'<option value="GERENCIA DE PLANECION Y SEGUIMIENTO">GERENCIA DE PLANECION Y SEGUIMIENTO</option>'+
'<option value="CALCULO Y PROYECTO HIDROSANITARIO">CALCULO Y PROYECTO HIDROSANITARIO</option>'+
'<option value="MODELO CUANTIFICACION AIRE ACONDICIONADO">MODELO CUANTIFICACION AIRE ACONDICIONADO</option>'+
'<option value="MODELO CUANTIFICACION ARQUITECTURA">MODELO CUANTIFICACION ARQUITECTURA</option>'+
'<option value="MODELO CUANTIFICACION ELECTRICO">MODELO CUANTIFICACION ELECTRICO</option>'+
'<option value="MODELO CUANTIFICACION ESTRUCTURA">MODELO CUANTIFICACION ESTRUCTURA</option>'+
'<option value="MODELO CUANTIFICACION HIDROSANITARIO">MODELO CUANTIFICACION HIDROSANITARIO</option>'+
'<option value="MODELO CUANTIFICACION TELECOMUNICACIONES">MODELO CUANTIFICACION TELECOMUNICACIONES</option>'+
'<option value="MODELO INTERFERENCIAS ARQUITECTURA">MODELO INTERFERENCIAS ARQUITECTURA</option>'+
'<option value="MODELO INTERFERENCIAS ELECTRICO">MODELO INTERFERENCIAS ELECTRICO</option>'+
'<option value="MODELO INTERFERENCIAS ESTRUCTURA">MODELO INTERFERENCIAS ESTRUCTURA</option>'+
'<option value="MODELO INTERFERENCIAS HIDROSANITARIO">MODELO INTERFERENCIAS HIDROSANITARIO</option>'+
'<option value="MODELO INTERFERENCIAS TELECOMUNICACIONES">MODELO INTERFERENCIAS TELECOMUNICACIONES</option>'+
'<option value="MODELO INTERFERENCIAS AIRE ACONDICIONADO">MODELO INTERFERENCIAS AIRE ACONDICIONADO</option>'+
'<option value="SEGUIMIENTO BIM EN OBRA">SEGUIMIENTO BIM EN OBRA</option>'+
'<option value="SEGURIDAD DE OBRA">SEGURIDAD DE OBRA</option>'+
'<option value="SEGURIDAD PATRIMONIAL DE OBRA">SEGURIDAD PATRIMONIAL DE OBRA</option>'+
'<option value="SUPERVISION OBRA">SUPERVISION OBRA</option>'+
'<option value="CALCULO Y PROYECTO TELECOMUNICACIONES">CALCULO Y PROYECTO TELECOMUNICACIONES</option>'+
'<option value="ORDEN DE TRABAJO">ORDEN DE TRABAJO</option>'+
'<option value="ESTANDARIZACION">ESTANDARIZACION</option>'+
'<option value="COORDINACION BIM">COORDINACION BIM</option>'+
'<option value="HISTORICO">HISTORICO</option>'+
'<option value="TOPOGRAFIA">TOPOGRAFIA</option>'+
'<option value="MASTER PLAN">MASTER PLAN</option>'+

'</select>'+

'</div>'+
'<div class="form-group">'+
'<label for="porcentaje">Porcentaje de Trabajo:</label>'+
'<input type="number" class="form-control" id="porcentaje" name="porcentaje[]" min="0" max="100">'+
'</div>'+
'</div>'+
'<div class="col-4"></div>'+
'</div>'+
'<div class="row">'+
'<div class="col-4"></div>'+
'<div class="col-4">'+
'<div class="form-group">'+
'</div>'+
'</div>'+
'<div class="col-4"></div>'+
'</div>'+
'</form>'+

'<div class="row" >'+
'<div class="col-4"></div>'+
'<div class="col-4">'+
'<button type="button" class="btn btn-primary" id="btnEnviar" onclick="enviarForm()">Enviar</button>'+
'</div>'+
'<div class="col-4"></div>'+
'</div>'+
'<br><br>'+
'<div class="row" >'+
'<span id="porcentajeTotal" class="badge badge-secondary"></span>'+
'<table class="table table-dark" id="historial" style="display: none;" >'+
'<thead>'+
'<tr>'+
'<th scope="col">Proyecto</th>'+
'<th scope="col">Categoria</th>'+
'<th scope="col">Porcentaje</th>'+
'</tr>'+
'</thead>'+
'</table>'+
'</div>'+
'</div>'+
'<div class="modal fade" id="modalMsj" tabindex="-1" aria-labelledby="modalMsjLabel" aria-hidden="true">'+
'<div class="modal-dialog">'+
'<div class="modal-content">'+
'<div class="modal-header">'+
'<h5 class="modal-title" id="modalMsjLabel" style="color: red;">Cuidado!!!</h5>'+
'<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'+
'</div>'+
'<div class="modal-body">'+
'<p id="msj"></p>'+
'</div>'+
'<div class="modal-footer">'+
'<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>'+
'</div>'+
'</div>'+
'</div>'+
'</div>'+
'<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>'+
'<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>'+
'<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>'+
'<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>'+
'</body>'+
'</html>'+
