$(".remove").click(function(){
    var id = $(this).parents("tr").attr("id");

   swal({
    title: "Apakah Anda Yakin?",
    text: "Anda tidak akan dapat memulihkan file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Hapus!",
    cancelButtonText: "Batal!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm) {
    if (isConfirm) {
      $.ajax({
         url: '/Peserta/hapusAktivitas/'+id,
         type: 'DELETE',
         error: function() {
            alert('Something is wrong');
         },
         success: function(data) {
              $("#"+id).remove();
              swal("Sukses!", "File berhasil dihapus.", "success");
         }
      });
    } else {
      swal("Batal", "File tidak terhapus", "error");
    }
  });
 
});