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
<script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
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
                                'bx bx-check',
                                response.status,
                                response.message || 'Successfully submitted.'
                            );

                            if (response.data.reload == true) {
                                setTimeout(function() {
                                    window.location.href = window.location.href;
                                }, 5000);
                            }

                        } else {
                            showNotification(
                                'error',
                                'bx bx-error',
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
                                    'bx bx-error',
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
    function showNotification(notificationType, notificationIcon, status, message) {
        Lobibox.notify(notificationType, {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: notificationIcon,
            msg: '<strong>' + status + '</strong>' + ':' + ' ' + message,
            sound: false,
            size: 'mini'
        });
    }
</script>
<!-- DataTable -->
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#dataTable_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    function deleteData(id, table) {
        if (confirm("Are you sure you want to delete this record?") == true) {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.delete') }}" + "/" + id + "/" + table,
                data: "",
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'Success') {
                        showNotification(
                            'success',
                            'bx bx-check',
                            response.status,
                            response.message || 'Successfully submitted.'
                        );

                        if (response.data.reload == true) {
                            setTimeout(function() {
                                window.location.href = window.location.href;
                            }, 5000);
                        }

                    } else {
                        showNotification(
                            'error',
                            'bx bx-error',
                            response.status,
                            response.message || 'Failed to submit.'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    let errors = JSON.parse(xhr.responseJSON.message);

                    $.each(errors, function(key, messages) {
                        $.each(messages, function(index, message) {
                            showNotification(
                                'error',
                                'bx bx-error',
                                xhr.responseJSON.status,
                                message || 'An error occurred.'
                            );
                        });
                    });
                }
            });
        } else {
            return false;
        }
    }
</script>
<script>
    function previewImage(sourceInput, targetImage) {
        $(sourceInput).change(function(e) {
            file = this.files[0];

            if (file) {
                let reader = new FileReader();
                let imageElement = document.createElement('img');

                imageElement.setAttribute('id', 'imgPreview');
                imageElement.setAttribute('class', 'rounded-2 mt-2');
                imageElement.setAttribute('height', '200px');

                reader.onload = function(e) {
                    $(targetImage).attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
            }
        });
    }
</script>
