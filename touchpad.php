<?php
session_start();
if (!$_SESSION['usuario']) {
  header('Location: ./login.html');
  exit();
}
include_once("db/conecta.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//$imgBase64 = filter_input(INPUT_GET,'imgBase64', FILTER_SANITIZE_STRING); 
$result_formulario = "SELECT * FROM check_teste WHERE id ='$id'";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Signature Pad demo</title>
  <meta name="description" content="Signature Pad - HTML5 canvas based smooth signature drawing using variable width spline interpolation.">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <link rel="stylesheet" href="css/signature-pad.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/ie9.css">
  <![endif]-->

  <!-- <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39365077-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</head>
<body onselectstart="return false">  -->


  <div id="signature-pad" class="signature-pad">
    <div class="signature-pad--body">
      <canvas></canvas>
    </div>
    <div class="signature-pad--footer">
      <div class="description"></div>

      <div class="signature-pad--actions">
        <div>
          <button type="button" class="button clear btn btn-danger" data-action="clear">Limpar</button>
          <!-- <button type="button" class="button" data-action="change-color">Change color</button> -->
          <!-- <button type="button" class="button" data-action="undo">Undo</button> -->

        </div>
        <div>
          <button id="salvar" type="button" class="button save btn btn-primary" data-action="save-png">Salvar</button>
          <!--<button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
          <button type="button" class="button save" data-action="save-svg">Save as SVG</button> -->
        </div>
      </div>
    </div>
  </div>
  <script>
    var id = location.href.split("=").pop();

    $(function() {
      $("#salvar").click(function() {
        html2canvas($("#signature-pad"), {
          onrendered: function(canvas) {
            var imgsrc = canvas.toDataURL("image/jpeg", 0.5);
            console.log(imgsrc);
            $("#newimg").attr('src', imgsrc);
            $("#img").show();
            var dataURL = canvas.toDataURL();
            $.ajax({
                type: "POST",
                url: "db/envia_assinatura.php",
                data: {
                  imgBase64: dataURL,
                  id: id
                }
              }).done(function(respond) {
                console.log("done: " + respond);
                if (respond > 0) {
                  alert("Assinado com sucesso!")
                  window.location.href = "https://powertechgeradores.com/app/menu.php"
                }
              })
              .fail(function(respond) {
                console.log("fail");
                alert("Erro. Tente novamente!")
              })
              .always(function(respond) {
                console.log("always");
              })

          }
        });
      });
    });
  </script>
  <script src="js/signature_pad.umd.js"></script>
  <script src="js/app.js"></script>
  </body>

</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>