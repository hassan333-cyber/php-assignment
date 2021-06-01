// for table
$(document).ready(function() {
    $('#bookInfo').DataTable();
} );
// Edit
function updateBookInfo(a,b,c,d,e){
    // Set Values in the modal
    var bookName = b;
    var publisher = c;
    var isbn = d;
    var thumbnail = e;
    $("#bookID").val(a);
    $("#bookName").val(bookName);
    $("#publisher").val(publisher);
    $("#isbn").val(isbn);
    var newThumbnail = thumbnail.split("/");
    $("#thumbnail").attr("value",newThumbnail[1]);
    $("#blah").attr("src",thumbnail);
    $("#blah").show();
    $("#type").val(2);
    $(".modal-title").text("Update Book");
    $('#addBookModal').modal('show');
}
// Reset modal
$('#addBookModal').on('hidden.bs.modal', function () {
    $("#book_form").trigger("reset");
    $("#type").val(1);
    $("#blah").hide();
    $(".modal-title").text("Add Book");
});