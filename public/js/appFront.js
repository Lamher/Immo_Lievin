$(function () {
    $(".description").text($(".description").text().substring(0, 300) + ' ...');

    // PREVIEW IMAGE PRODUIT
    $("#product-preview2").on("click", function () {
        let previewValue1 = $("#product-preview1").attr("src");
        let previewValue2 = $("#product-preview2").attr("src");
        $("#product-preview1").attr("src", previewValue2);
        $(this).attr("src", previewValue1);
        $(previewValue1) = $("#product-preview1").attr("src");
        $(previewValue2) = $("#product-preview2").attr("src");

    });
    $("#product-preview3").on("click", function () {
        let previewValue1 = $("#product-preview1").attr("src");
        let previewValue3 = $("#product-preview3").attr("src");
        $("#product-preview1").attr("src", previewValue3);
        $(this).attr("src", previewValue1);
        $(previewValue1) = $("#product-preview1").attr("src");
        $(previewValue3) = $("#product-preview3").attr("src");
    });
    $("#product-preview1").on("click", function () {
        // Zoom
    })


    // FILTRES PAGE LISTE PROPERTIES
    filter_data();
    function filter_data() {
        $('#filter').on('change', function () {
            let type = $('#type').val();
            let city = $('#city').val();
            let category = $('#category').val();
            let reference = $('#reference').val();
            let minPrice = $('#minPrice').val();
            let maxPrice = $('#maxPrice').val();
            $.ajax({
                url: "http://localhost/Immo_Lievin/public/index/ajaxListeAnnonces/",
                method: "POST",
                data: {
                    type: type,
                    city: city,
                    category: category,
                    reference: reference,
                    minPrice: minPrice,
                    maxPrice: maxPrice
                },
                success: function (data) {
                    $("#content-list").html(data);
                    $(".description").text($(".description").text().substring(0, 300) + ' ...');
                }
            });
        })
    }



});