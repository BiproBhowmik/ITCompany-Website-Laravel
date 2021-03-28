  <script type="text/javascript">
            function editCommon(id) {
       console.log("id = "+id);

      $.get('tmfindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updateCommonId').val(responce.tmId);
        $('#updateCommonName').val(responce.tmName);
        $('#updateCommonPosition').val(responce.tmPosition);
        $('#updateCommonFbLink').val(responce.tmFbLink);
        $('#updateCommonLnLink').val(responce.tmLnLink);
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
      url: "ajaxDeleteTm/"+commonId,
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