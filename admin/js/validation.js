// assets/js/validation.js
$(document).ready(function () {

    $('.ajaxForm').each(function () {

        $(this).validate({
            ignore: [],

            errorElement: 'span',
            errorClass: 'text-danger small',

            highlight: function (element) {
                $(element).addClass('is-invalid');
            },

            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },

            // 🔹 DEFAULT RULES (can override per form)
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                slug: {
                    minlength: 3
                },
                image: {
                    extension: "jpg|jpeg|png|webp"
                }
            },

            messages: {
                name: {
                    required: "This field is required",
                    minlength: "Minimum 3 characters"
                },
                image: {
                    extension: "Only JPG, PNG, WEBP allowed"
                }
            }
        });

    });

});
