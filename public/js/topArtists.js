$(document).ready(function(){
    $(".typeahead__field").on('click', '#search', function () {
        if ($("#searchText").val() != '') {
            library.initiateSearch($("#searchText").val());
        }
    });

    $("[data-action='next']").click(function () {
        var page = parseInt($('#current_page').val());
        library.initiateSearch($("#searchText").val(), page + 1);
    });
    $("[data-action='prev']").click(function () {
        var page = parseInt($("#current_page").val());
        library.initiateSearch($("#searchText").val(), page - 1);
    });


});