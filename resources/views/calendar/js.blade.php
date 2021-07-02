<!-- Calendar BEGIN: Vendor JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->


<!-- Calendar BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/moment.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- Calendar BEGIN: Theme JS-->
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- Calendar BEGIN: Page JS-->
<script src="../../../app-assets/js/scripts/pages/app-calendar-events.js"></script>
<script src="../../../app-assets/js/scripts/pages/app-calendar.js"></script>
<!-- END: Page JS-->



<!-- Calendar-->
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    setTimeout(function() {
        $('#alert-div').fadeOut('fast');
    }, 2000); // <-- time in milliseconds


</script>







