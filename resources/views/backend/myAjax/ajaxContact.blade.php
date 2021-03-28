  <script type="text/javascript">
      {{-- Ajax Brand Insert --}}
    $("#updateCommonForm").submit(function(event) {
      event.preventDefault();

      let commonId = $("#updateCommonId").val();
      let commonAdd = $("#updateCommonAdd").val();
      let commonEmail = $("#updateCommonEmail").val();
      let commonPhone = $("#updateCommonPhone").val();
      let _token = $("input[name=_token]").val();
        
       //console.log(commonName);
      // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxUpdateCont') }}",
          type: "POST",
          data:{
            commonId:commonId,
            commonAdd:commonAdd,
            commonEmail:commonEmail,
            commonPhone:commonPhone,
            _token:_token
          },
          success:function(response)
          {
            if (response) {

              var x = document.getElementById("successTost");
                x.style.display = "block";

              //console.log(response);

          // $("#commonId"+response.fQnaId+' td:nth-child(2)').text(response.fQnaQ);
          // $("#commonId"+response.fQnaId+' td:nth-child(3)').text(response.fQnaA);
          // $("#commonUpdateModal").modal('toggle');
          // $("#updateCommonForm")[0].reset();

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

  </script>