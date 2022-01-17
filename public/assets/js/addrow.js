$(".addRow").on("click", function () {
    addRow();
});

function addRow() {
    var tr =
        "<tr>" +
        '<td><input type="text" name="subject_name[]" class="form-control" required=""></td>' +
        '<td><input type="text" name="mark[]" class="form-control"></td>' +
        '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>' +
        "</tr>";
    $("tbody").append(tr);
}
$("tbody").on("click", ".remove", function (e) {
    var last = $("tbody tr").length;
    if (last == 1) {
        alert("you can not remove last row");
    } else {
        e.preventDefault();
        $(this).parent().parent().remove();
    }
});
