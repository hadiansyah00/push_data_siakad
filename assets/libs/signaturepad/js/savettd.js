      function simanpetugas(urlnya){
            html2canvas([document.getElementById('sign-pad-p')], {
               onrendered: function (canvas) {
                  var canvas_img_data = canvas.toDataURL('image/png');
                  var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                  $.ajax({
                     url: urlnya+'tandaterima/simpanttdpetugas',
                     data: { img_data:img_data },
                     type: 'post',
                     dataType : "JSON",
                     success: function (response) {
                        document.getElementById('inputttdpetugas').value= response[0].file_name;
                     }
                  });
               }
            });
         }
         function simanklien(urlnya){
            html2canvas([document.getElementById('sign-pad-k')], {
               onrendered: function (canvas) {
                  var canvas_img_data = canvas.toDataURL('image/png');
                  var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                  //ajax call to save image inside folder
                  $.ajax({
                     url: urlnya+'tandaterima/simpanttdklien',
                     data: { img_data:img_data },
                     type: 'post',
                     dataType : "JSON",
                     success: function (response) {
                        document.getElementById('inputttdklien').value= response[0].file_name;
                     }
                  });
               }
            });
         }