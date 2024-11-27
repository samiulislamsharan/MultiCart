<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
<!--notification js -->
<script src="{{ asset('assets/plugins/notifications/js/lobibox.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/messageboxes.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notifications.js') }}"></script>
<!--app JS-->
<script src="{{ asset('assets/js/app.js') }}"></script>
{{-- Parsley JS --}}
{{-- <script src="https://developercodez.com/developerCorner/parsley/parsley.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
    integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(f) {
        $('#formSubmit').on('submit', function(e) {
            if ($(this).parsley().validate()) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            } else {
                alert('Failed to submit.');
            }
        });
    });
</script>
