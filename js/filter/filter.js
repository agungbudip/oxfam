$("#form_search").keyup(function (e) {
    var code = e.which;
    var search = $(this).val();
    var order = $('#form_order').val();
    var page = 1;
    if (code == 13) {
        $('#filter_search').val(search);
        $('#filter_order').val(order);
        $('#filter_page').val(page);
        $('#filter').submit();
        return false;
    } else {
        e.preventDefault();
    }
});

$("#form_search").keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
});

$("#form_order").change(function (e) {
    var search = $('#form_search').val();
    var order = $('#form_order').val();
    var page = 1;
    $('#filter_search').val(search);
    $('#filter_order').val(order);
    $('#filter_page').val(page);
    $('#filter').submit();
});

function pagination(page) {
    var search = $('#form_search').val();
    var order = $('#form_order').val();
    $('#filter_search').val(search);
    $('#filter_order').val(order);
    $('#filter_page').val(page);
    $('#filter').submit();
}