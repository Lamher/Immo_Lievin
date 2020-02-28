 console.log('hello');

$(function () {




$(document).ready(function () {

    $('.first-button').on('click', function () {

        $('.animated-icon1').toggleClass('open');
    });
    $('.second-button').on('click', function () {

        $('.animated-icon2').toggleClass('open');
    });
    $('.third-button').on('click', function () {

        $('.animated-icon3').toggleClass('open');
    });
});
     $('.carousel').carousel({

          });


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
    $(function () {

        // Autocomplete searchbar
        let availableTags = [
            'maison',
            'appartement',
            'terrain',
            'garage',
            'parking',
            'terrain à batir',
        ];
        $("#tags").autocomplete({
            source: availableTags
        });

        $(".fa-search").on("click", function () {
            $("#searchBar").slideToggle();
        })



    });