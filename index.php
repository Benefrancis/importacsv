<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Importa CSV</title>
   <script>
      var leitorDeCSV = new FileReader();

      window.onload = function init() {
         try {
            leitorDeCSV.onload = leCSV;
         } catch (error) {
            console.error(error)
         }
      }

      function pegaCSV(inputFile) {
         var file = inputFile.files[0];
         leitorDeCSV.readAsText(file);
      }

      function leCSV(evt) {

         var fileArr = evt.target.result.split('\n');
         var strDiv = '';
         var strCorpo = '';

         strDiv += '<table class="table table-sm"><thead>';

         for (var i = ini; i < fileArr.length; i++) {
            strDiv += '<tr>';
            var fileLine = fileArr[i].split(',');
            for (var j = 0; j < fileLine.length; j++) {
               if (i == 0 && j < fileLine.length) {
                  strDiv += '<th scope="col">' + fileLine[j].trim() + '</th>';
               } else if (i == 1) {
                  strDiv += '</tr></thead><tbody>';
               } else {
                  //console.log(fileLine[2]);
                  if (fileLine[2] == 'Holambra') {
                     if (j == 0) {
                        strDiv += '<th scope="row">' + fileLine[j].trim() + '</th>';
                     }
                     strDiv += '<td class="font-weight-light">' + fileLine[j].trim() + '</td>';
                  }
               }
            }
            strDiv += '</tr>';
         }

         strDiv += ' </tbody></table>';

         var CSVsaida = document.getElementById('CSVsaida');
         CSVsaida.innerHTML = strDiv;
      }
   </script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
   <?php ini_set('max_execution_time', 1080); ?>
   <form action="#" method="post" enctype="multipart/form-data">
      <input type="file" id="inputCSV" onchange="pegaCSV(this)">
   </form>
   <br>
   <hr>
   <br>
   <div id="CSVsaida"></div>
</body>

</html>