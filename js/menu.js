$(document).ready(function(){
    $('#cuentaDropdown').on('click', function(e) {
        e.preventDefault();
        $(this).next('.dropdown-menu').toggle();
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('#cuentaDropdown').length) {
            $('.dropdown-menu').hide();
        }
    });
});