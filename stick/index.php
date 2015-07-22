<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Hello, world!</h1>
<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p>Exportar a Excel  <img src="export_to_excel.gif" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>

    <table id="Exportar_a_Excel" border="1" class="table table-bordered overflow-y">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th>10</th>
           <th>11</th>
          <th>12</th>
          <th>13</th>
          <th>14</th>
          <th>15</th>
          <th>16</th>
          <th>17</th>
          <th>18</th>
          <th>19</th>
          <th>20</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <th scope="row">M04-NOV13ESP</th>
          <th scope="row">GESTIÓN DE METALES PESADOS</th>
          <th scope="row">RUBÉN ANGEL YNOCENTE TAPIA</th>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <th scope="row">M04-AGO13ESP</th>
          <th scope="row">GESTION DE METALES PESADOS</th>
          <th scope="row">RUBEN ANGEL YNOCENTE TAPIA</th>
          <td>12</td>
          <td>10</td>
          <td>12</td>
          <td>14</td>
          <td>12</td>
          <td>14</td>
          <td>20</td>
          <td>18</td>
          <td>14</td>
          <td>13</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
          <td>15</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <th scope="row">M04-NOV13ESP</th>
          <th scope="row">GESTION DE METALES PESADOS</th>
          <th scope="row">RUBEN ANGEL YNOCENTE TAPIA</th>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
          <td>17</td>
        </tr>
      </tbody>
    </table>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="stick/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    

    <script src="stick/js/jquery.ba-throttle-debounce.min.js"></script>
    <script src="stick/js/jquery.stickyheader.js"></script>

  <script type="text/javascript">

  $(document).ready(function() {
  $(".botonExcel").click(function(event) {
    $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
    $("#FormularioExportacion").submit();
});
});

  </script>


<link rel="stylesheet" type="text/css" href="stick/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="stick/css/component.css" />

  </body>
</html>