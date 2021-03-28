  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#commonAddForm").submit(function(event) {
      event.preventDefault();

      let commonQ = $("#commonQ").val();
      let commonA = $("#commonA").val();
      let _token = $("input[name=_token]").val();
        
       // console.log(commonQ);
       // console.log(commonA);
       // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxAddfqna') }}",
          type: "POST",
          data:{
            commonQ:commonQ,
            commonA:commonA,
            _token:_token
          },
          success:function(response)
          {
            if (response) {
                $("#commonAddForm")[0].reset();

              $("#datatable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.fQnaQ+'</td><td>'+response.fQnaA+'</td><td>'+"Added"+'</td></tr>');

              //console.log(response);

              //For Toster
        var x = document.getElementById("successTost");
                x.style.display = "block";

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

        function editCommon(id) {
       console.log("id = "+id);

      $.get('fQnafindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updateCommonId').val(responce.fQnaId);
        $('#updateCommonQ').val(responce.fQnaQ);
        $('#updateCommonA').val(responce.fQnaA);
        $('#commonUpdateModal').modal("toggle");
    });
  }

      {{-- Ajax Brand Insert --}}
    $("#updateCommonForm").submit(function(event) {
      event.preventDefault();

      let commonId = $("#updateCommonId").val();
      let commonQ = $("#updateCommonQ").val();
      let commonA = $("#updateCommonA").val();
      let _token = $("input[name=_token]").val();
        
       //console.log(commonName);
      // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxUpdatefQna') }}",
          type: "POST",
          data:{
            commonId:commonId,
            commonQ:commonQ,
            commonA:commonA,
            _token:_token
          },
          success:function(response)
          {
            if (response) {

              //console.log(response);

          $("#commonId"+response.fQnaId+' td:nth-child(2)').text(response.fQnaQ);
          $("#commonId"+response.fQnaId+' td:nth-child(3)').text(response.fQnaA);
          $("#commonUpdateModal").modal('toggle');
          $("#updateCommonForm")[0].reset();

          //For Toster
        var x = document.getElementById("successTost");
                x.style.display = "block";

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

  {{-- Ajax Brand Delete --}}
    $(".commonDelete").click(function(){

      $confirm = confirm("Delete!");

      if ($confirm) {
        var commonId = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

     // console.log(commonId);
     // console.log(token);
    
    $.ajax(
    {
      url: "ajaxDeletefQna/"+commonId,
      {{-- url: "{{ route('brDeleteAjax', "brId") }}", --}}
      type: 'DELETE',
      data: {
        commonId:commonId,
        _token:token,
      },
      success:function(response)
      {
        $('#commonId'+commonId).remove();
        // console.log(response);

        //For Toster
        var x = document.getElementById("successTost");
                x.style.display = "block";

      }
    });
  }

});



  </script>