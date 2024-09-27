<script>



    /**
     * --------------------------------
     * START : Third party plugin initalization
     * --------------------------------
     *
     */
    // Create an instance of Notyf
    var notyf = new Notyf();



    $('.datepicker').datepicker({
        format: 'yyyy-m-d',
    });


    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
    /**
     * --------------------------------
     * END : Third party plugin initalization
     * --------------------------------
     *
     */

    function showLoader()
    {
        $('.preloader_demo').removeClass('d-none');
    }

    function hideLoader()
    {
        $('.preloader_demo').addClass('d-none');
    }

</script>
