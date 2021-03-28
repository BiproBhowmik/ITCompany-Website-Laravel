  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#commonMessageForm").submit(function(event) {
      event.preventDefault();

      let name = $("#name").val();
      let email = $("#email").val();
      let subject = $("#subject").val();
      let message = $("#message").val();
      let _token = $("input[name=_token]").val();
        
       // console.log(name);
       // console.log(message);
       // console.log(email);
       // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxSendMessage') }}",
          type: "POST",
          data:{
            name:name,
            email:email,
            subject:subject,
            message:message,
            _token:_token
          },
          success:function(response)
          {
            if (response) {
                var x = document.getElementById("sent-message");
                x.style.display = "block";

              //console.log(response);
              $("#commonMessageForm")[0].reset();

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

        function editCommon(id) {
       console.log("id = "+id);

      $.get('messagefindByIdAjax/'+id, function(responce) {
        // console.log(id);
        //$('#messageBody').val(responce.urText);
        document.getElementById("messageBody").innerHTML = responce.urText;
        $('#commonUpdateModal').modal("toggle");
    });
  }

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
      url: "ajaxDeleteMessage/"+commonId,
      {{-- url: "{{ route('brDeleteAjax', "brId") }}", --}}
      type: 'DELETE',
      data: {
        commonId:commonId,
        _token:token,
      },
      success:function(response)
      {
        var x = document.getElementById("successTost");
                x.style.display = "block";
                
        $('#commonId'+commonId).remove();
        // console.log(response);

      }
    });
  }

});



  </script>