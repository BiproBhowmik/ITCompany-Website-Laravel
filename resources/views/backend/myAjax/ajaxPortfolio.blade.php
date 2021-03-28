  <script type="text/javascript">
            function editCommon(id) {
       console.log("id = "+id);

      $.get('prfindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updateCommonId').val(responce.prId);
        $('#updateCommonTitle').val(responce.prTitle);
        $('#updateCommonLink').val(responce.prLink);
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
      url: "ajaxDeletePr/"+commonId,
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