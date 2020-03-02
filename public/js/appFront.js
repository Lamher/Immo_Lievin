$(function () {
    $(".description").text($(".description").text().substring(0,300) + ' ...');

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
    $("#product-preview1").on("click", function () {})

    filter_data();

    function filter_data() {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        let action = 'fetch_data';
        let minimum_price = $('#hidden_minimum_price').val();
        let maximum_price = $('#hidden_maximum_price').val();
        let city = get_filter('city');
        let category = get_filter('category');
        let type = get_filter('type');
        $.ajax({
            url: "fetch_data.php",
            method: "POST",
            data: {
                action: action,
                minimum_price: minimum_price,
                maximum_price: maximum_price,
                brand: brand,
                ram: ram,
                storage: storage
            },
            success: function (data) {
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name) {
        let filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function () {
        filter_data();
    });

    $('#price_range').slider({
        range: true,
        min: 1000,
        max: 65000,
        values: [1000, 65000],
        step: 500,
        stop: function (event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});