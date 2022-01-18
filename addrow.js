$(".addRow").on("click", function () {
    addRow();
});

function addRow() {
    var tr =
        "<tr>" +
        '<td><select name="subject_id" id="" class="form-control">   <option value="">-----------Chọn-------------</option><option value="3">Tiếng anh chuyên ngành</option> <option value="4">Tin học đại cương</option><option value="7">Lập trình phân tán</option> <option value="15">Cấu trúc dữ liệu và giải thuật</option> <option value="19">Lập trình nâng cao</option> <option value="21">Lập trình java</option> <option value="30">Mạng máy tính</option></select></td>' +
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
