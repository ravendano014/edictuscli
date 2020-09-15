
<?php
mysql_select_db($database_Edictos, $Edictos);
$query_Edictos = "select distinct edictos.Id_Etapa as Id_Etapa, etapa, count(id) as Cantidad from edictos inner join etapas on edictos.Id_Etapa=etapas.Id_Etapa where year(ingreso)=".$datayear." group by Id_Etapa";
$Edictos = mysql_query($query_Edictos, $Edictos) or die(mysql_error());
$row_Edictos = mysql_fetch_assoc($Edictos);
$totalRows_Edictos = mysql_num_rows($Edictos);
?>

<?php 
  do { 
	  if($row_Edictos['Id_Etapa']==1){
		  $nEdictos_Step1 = $row_Edictos['Cantidad'];
		  }
	  if($row_Edictos['Id_Etapa']==2){
		  $nEdictos_Step2 = $row_Edictos['Cantidad'];
		  }
	  if($row_Edictos['Id_Etapa']==3){
		  $nEdictos_Step3 = $row_Edictos['Cantidad'];		  
      }
    if($row_Edictos['Id_Etapa']==4){
      $nEdictos_Step4 = $row_Edictos['Cantidad'];		  
      }
    if($row_Edictos['Id_Etapa']==5){
      $nEdictos_Step5 = $row_Edictos['Cantidad'];		  
      }
    if($row_Edictos['Id_Etapa']==6){
      $nEdictos_Step6 = $row_Edictos['Cantidad'];		  
    }
                  
} while ($row_Edictos = mysql_fetch_assoc($Edictos)); 
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">

  <style>
    html, body, #diagram {
      height: 100%
    }

    .highlight:not(.djs-connection) .djs-visual > :nth-child(1) {
      fill: skyblue !important; /* color elements as green */
    }

    .highlight-overlay {
      background-color: green; /* color elements as green */
      opacity: 0.4;
      pointer-events: none; /* no pointer events, allows clicking through onto the element */
      border-radius: 10px;
    }

    .hyellow:not(.djs-connection) .djs-visual > :nth-child(1) {
      fill: lightyellow !important; /* color elements as green */
    }

    .hyellow-overlay {
      background-color: green; /* color elements as green */
      opacity: 0.4;
      pointer-events: none; /* no pointer events, allows clicking through onto the element */
      border-radius: 10px;
    }

    .hgreen:not(.djs-connection) .djs-visual > :nth-child(1) {
      fill: lightgreen !important; /* color elements as green */
    }

    .hgreen-overlay {
      background-color: green; /* color elements as green */
      opacity: 0.4;
      pointer-events: none; /* no pointer events, allows clicking through onto the element */
      border-radius: 10px;
    }

    .hpink:not(.djs-connection) .djs-visual > :nth-child(1) {
      fill: pink !important; /* color elements as green */
    }

    .hpink-overlay {
      background-color: green; /* color elements as green */
      opacity: 0.4;
      pointer-events: none; /* no pointer events, allows clicking through onto the element */
      border-radius: 10px;
    }

    .horange:not(.djs-connection) .djs-visual > :nth-child(1) {
      fill: orange !important; /* color elements as green */
    }

    .horange-overlay {
      background-color: green; /* color elements as green */
      opacity: 0.4;
      pointer-events: none; /* no pointer events, allows clicking through onto the element */
      border-radius: 10px;
    }


  </style>

  <!--
    BPMN diagram using bpmn-js
  -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link id="color-scheme" href="metro/css/schemes/custom.css" rel="stylesheet">

    <title>Edictos Judiciales</title>

    <style>
        h2 {
            margin-top: 20px;
        }
        .app-bar-menu li {
            list-style: none!important;
        }
    </style>

    <script>
	function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

        function changeSchemeTo(n){
            $("#color-scheme").attr("href", "metro/css/schemes/" + n);
            $("#scheme-name").html(n);
            Metro.utils.addCssRule(Metro.sheet, ".app-bar-menu li", "list-style: none!important;");
			setCookie("scheme", n, 365);
        }


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var scheme = getCookie("scheme");
    if (scheme != "") {
        changeSchemeTo(scheme);
    } else {
        scheme = "";
        if (scheme != "" && scheme != null) {
            setCookie("scheme", scheme, 365);
        }
    }
}		
    </script>

<script>
function OpenChildAsPopup() {
        var childWindow = window.open("searchbox.php", "_blank",
        "width=550px,height=80px,left=200,top=100");
        childWindow.focus();
 }

function Search(childsearch) {
        var para = document.getElementById('Imputado');
        if (para !="undefied") {
            para.style.backgroundColor = '';
        }
		para.value = childsearch.value;
		document.forms.SearchBox.submit();
		// alert('Search something...'+para.value);
 }
</script>
<script type="text/javascript">
function confirm_delete() {
  return confirm('Confirmar Eliminación?');
}
</script>    
<script language="javascript">
function ts(e,t){if(document.getElementById){var a,r,n,s=document,d=null,m=startSz;for((m+=t)<0&&(m=0),m>6&&(m=6),startSz=m,(d=s.getElementById(e))||(d=s.getElementsByTagName(e)[0]),d.style.fontSize=szs[m],a=0;a<tgs.length;a++)for(n=d.getElementsByTagName(tgs[a]),r=0;r<n.length;r++)n[r].style.fontSize=szs[m]}}var tgs=new Array("div","p","li","td","tr","table"),szs=new Array("xx-small","x-small","small","medium","large","x-large","xx-large"),startSz=3;
</script>

<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">

<body onLoad="checkCookie();">
<br>
  <h1>WorkFlow Departamento de Edictos Judiciales</h1>

  <div data-role="panel"
                            data-title-caption="BPMN DEJ Ver 2.0"
                            data-title-icon="<span class='mif-user'></span>"
                            data-width="1000" 
                            data-height="350">
                        
                        <div class="text-bold mt-2">Actividades</div>

                        <table width="100%" border="0" class="table	compact striped row-border table-border row-hover">
                          <thead>
                            <th>
                                <td>Actividad</td>
                                <td>Responsable</td>
                                <td>Salida</td>
                                <td>Clase</td>
                            </th>
                          </thead>
                          <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Establece programación de actividades mensual</td>
                                <td>Jefatura / Administrador de Contrato</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Establece Criterio de Carga por Colaborador</td>
                                <td>Jefatura / Administrador de Contrato</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Verifica Plazo de Antelación de Solicitud</td>
                                <td>Secretaria</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Verifica No Duplicidad y Complementa Datos</td>
                                <td>Secretaria</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Escanea Edicto y Adjunta Digital</td>
                                <td>Secretaria</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Asigna Edictos a Colaborador según Criterio de Jefatura</td>
                                <td>Secretaria</td>
                                <td>DEJ-F01 Hoja de Asignación de Edictos</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Complementa Datos y Verifica Requisitos de Ley</td>
                                <td>Colaborador</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>Solicita Autorización para Remitir</td>
                                <td>Colaborador</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>Emite Nota de Remisión</td>
                                <td>Colaborador</td>
                                <td>DEJ-F02 Nota de Remisión a Medio</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>10.</td>
                                <td>Elabora Acta de Recepción de Edictos</td>
                                <td>Colaborador</td>
                                <td>DEJ-F03 Acta de Recepción de Edictos</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>11.</td>
                                <td>Elabora Informe de Actividades</td>
                                <td>Colaborador</td>
                                <td>DEJ-F04 Informe de Actividades</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>12.</td>
                                <td>Elabora Notificación a Usuario</td>
                                <td>Colaborador</td>
                                <td>DEJ-F05 Notificación de Publicación de Edictos Judiciales</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>13.</td>
                                <td>Ingresa Costos por Líneas Impresas Cotizadas</td>
                                <td>Jefatura / Administrador de Contrato</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>14.</td>
                                <td>Elabora Informes de Gestión y Control</td>
                                <td>Jefatura / Administrador de Contrato</td>
                                <td>DPI-F01 Indicador de Gestión, DPI-F02 Seguimiento de Actividades PAO</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>
                            <tr>
                                <td>15.</td>
                                <td>Elabora Informe Ejecutivo Mensual</td>
                                <td>Jefatura / Administrador de Contrato</td>
                                <td>DEJ-F06 Informe Ejecutivo</td>
                                <td><span class="mif-more-horiz"></span></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-done fg-green"></span></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><span class="mif-done fg-green"></span></td>
                            </tr>
                          </tbody>
                        </table>

                    </div>

<hr>
<div id="diagram"></div>
<hr>
<span id="countdown">--</span> Ultima Actualización &nbsp;

  <!-- required modeler styles -->
  <link rel="stylesheet" href="https://unpkg.com/bpmn-js@6.3.2/dist/assets/diagram-js.css">
  <link rel="stylesheet" href="https://unpkg.com/bpmn-js@6.3.2/dist/assets/bpmn-font/css/bpmn.css">

  <!-- modeler distro -->
  <script src="https://unpkg.com/bpmn-js@6.3.2/dist/bpmn-modeler.development.js"></script>

  <!-- jquery (required for example only) -->
  <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>

  <!-- app -->
  <script>

    var viewer = new BpmnJS({
      container: '#diagram',
      bpmnRenderer: {
        defaultFillColor: '#fff',
        defaultStrokeColor: '#000'
      }
    });

    function showDiagram(diagramXML) {

      viewer.importXML(diagramXML, function() {

        var overlays = viewer.get('overlays'),
            canvas = viewer.get('canvas'),
            elementRegistry = viewer.get('elementRegistry'),
            modeling = viewer.get('modeling');

        // Option 1: Color via Overlay
        var shape = elementRegistry.get('Event_0rlo0m8');
        var shape2 = elementRegistry.get('Activity_0uro3eo');
        var shape3 = elementRegistry.get('Activity_0beppnr');
        var shape4 = elementRegistry.get('Activity_1bta48z');
        var shape5 = elementRegistry.get('Activity_0im07t1');
        var shape6 = elementRegistry.get('Activity_17xedsd');


        var $overlayHtml = $('<div class="highlight-overlay"><span class="badge bg-blue fg-white"><?php echo $nEdictos_Step6;  ?></span>')
                                .css({
                                  width: shape.width,
                                  height: shape.height
                                });

        var $overlayHtml2 = $('<div class="highlight-overlay"><span class="badge bg-red fg-white"><?php echo $nEdictos_Step3;  ?></span>')
                                .css({
                                  width: shape2.width,
                                  height: shape2.height
                                });


        var $overlayHtml3 = $('<div class="highlight-overlay"><span class="badge bg-red fg-white"><?php print_r($nEdictos_Step2); ?></span>')
                                .css({
                                  width: shape3.width,
                                  height: shape3.height
                                });

        var $overlayHtml4 = $('<div class="highlight-overlay"><span class="badge bg-orange fg-white"><?php echo $nEdictos_Step1;  ?></span>')
                                .css({
                                  width: shape4.width,
                                  height: shape4.height
                                });

        var $overlayHtml5 = $('<div class="highlight-overlay"><span class="badge bg-green fg-white"><?php echo ($nEdictos_Step1+$nEdictos_Step2+$nEdictos_Step3+$nEdictos_Step4+$nEdictos_Step5+$nEdictos_Step6);  ?></span>')
                                .css({
                                  width: shape5.width,
                                  height: shape5.height
                                });

        var $overlayHtml6 = $('<div class="highlight-overlay"><span class="badge bg-red fg-white"><?php echo $nEdictos_Step5;  ?></span>')
                                .css({
                                  width: shape6.width,
                                  height: shape6.height
                                });


        overlays.add('Event_0rlo0m8', {
          position: {
            top: 0,
            left: 0
          },
          html: $overlayHtml
        });


        overlays.add('Activity_0uro3eo', {
          position: {
            top: 0,
            left: 0
          },
          html: $overlayHtml2
        });


        overlays.add('Activity_0beppnr', {
          position: {
            top: 0,
            left: 0
          },
          html: $overlayHtml3
        });


        overlays.add('Activity_1bta48z', {
          position: {
            top: 0,
            left: 0
          },
          html: $overlayHtml4
        });

        overlays.add('Activity_0im07t1', {
          position: {
            top: 0,
            left: 0
          },
          html: $overlayHtml5
        });

        overlays.add('Activity_17xedsd', {
          position: {
            top: 0,
            left: 0
          },
          html: $overlayHtml6
        });

        // Option 2: Color via BPMN 2.0 Extension
        var elementToColor = elementRegistry.get('Activity_0beppnr');

        modeling.setColor([ elementToColor ], {
          stroke: 'green',
          fill: 'rgba(0, 80, 0, 0.4)'
        });

        // Option 3: Color via Marker + CSS Styling
        canvas.addMarker('Activity_0im07t1', 'highlight');
        canvas.addMarker('Event_1thgfaw', 'hgreen');
        canvas.addMarker('Event_0745el5', 'hgreen');
        canvas.addMarker('Event_0tq7x21', 'hgreen');
        canvas.addMarker('Gateway_01nb7np', 'horange');
        canvas.addMarker('Gateway_0eninwh', 'horange');
        canvas.addMarker('Event_0rlo0m8', 'hpink');
        canvas.addMarker('Task_1hcentk', 'hyellow');
        canvas.addMarker('Activity_0fqdg6v', 'hyellow');
        canvas.addMarker('Activity_1a6k22c', 'hyellow');
        canvas.addMarker('Activity_07n2ba7', 'hyellow');
        canvas.addMarker('Activity_1v3app4', 'hyellow');
        canvas.addMarker('Activity_0uro3eo', 'hyellow');
        canvas.addMarker('Activity_17xedsd', 'hyellow');
        canvas.addMarker('Activity_1lacpxa', 'hyellow');
        canvas.addMarker('Activity_0e4jkay', 'hyellow');
        canvas.addMarker('Activity_1v4lsiu', 'hyellow');
        canvas.addMarker('Activity_1qlva54', 'hyellow');
        canvas.addMarker('Activity_1rnwlob', 'hyellow');
      });
    }

    // load + show diagram
    $.get('https://raw.githubusercontent.com/ravendano014/edictuscli/gh-pages/diagram.bpmn', showDiagram, 'text');
  </script>

<br />
<hr class="thin">
<h6 align="right"><small>Dirección de Servicios Técnicos Judiciales - 2018</small></h6>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="metro/js/metro.js"></script>

</body>
</html>
