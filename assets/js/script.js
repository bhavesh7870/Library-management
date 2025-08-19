$(document).ready(function() {
    function applyFilters() {
        var filters = {
            department: [],
            semester: [],
            content_type: []
        };

        $(".filter-checkbox:checked").each(function() {
            var name = $(this).attr("name");
            var value = $(this).val();
            filters[name].push(value);
        });

        $.ajax({
            url: "../search.php",
            type: "POST",
            data: filters,
            success: function(response) {
                $("#content-area").html(response);
            },
            error: function() {
                console.log("Error in filtering.");
            }
        });
    }

    $(".filter-checkbox").on("change", function() {
        applyFilters();
    });

    // Load results initially
    applyFilters();
});
