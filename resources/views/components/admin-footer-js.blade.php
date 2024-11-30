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
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<!--notification js -->
<script src="{{ asset('assets/plugins/notifications/js/lobibox.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/messageboxes.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notifications.js') }}"></script>
<!--app JS-->
<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- Parsley JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
    integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Form Validation-->
<script>
    $(document).ready(function(f) {
        $('#formSubmit').on('submit', function(e) {
            if ($(this).parsley().validate()) {
                e.preventDefault();

                let formData = new FormData(this);
                let btnLoader =
                    '<button class="btn btn-primary px-4" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>';
                let btnSave =
                    '<button class="btn btn-primary px-4" type="submit">Save Changes</button>';

                $('#submitButton').html(btnLoader);

                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 'Success') {
                            showNotification(
                                'success',
                                response.status,
                                response.message || 'Successfully submitted.'
                            );

                            setTimeout(function() {
                                location.reload();
                            }, 5000);

                        } else {
                            showNotification(
                                'error',
                                response.status,
                                response.message || 'Failed to submit.'
                            );
                        }
                        $('#submitButton').html(btnSave);
                    },
                    error: function(xhr, status, error) {
                        let errors = JSON.parse(xhr.responseJSON.message);

                        $.each(errors, function(key, messages) {
                            $.each(messages, function(index, message) {
                                showNotification(
                                    'error',
                                    xhr.responseJSON.status,
                                    message || 'An error occurred.'
                                );
                            });
                        });

                        $('#submitButton').html(btnSave);
                    }
                });
            } else {
                showNotification('error', 'Validation Error', 'Please fill in the required fields.');
            }
        });
    });
</script>
<script>
    function showNotification(notificationType, status, message) {
        Lobibox.notify(notificationType, {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-error',
            msg: '<strong>' + status + '</strong>' + ':' + ' ' + message,
            sound: false,
            size: 'mini'
        });
    }
</script>
