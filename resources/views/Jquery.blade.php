<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {

        $('#create_form').submit(function(e) {
            e.preventDefault();

            var cForm = $('#create_form')[0];
            var cData = new FormData(cForm);

            $.ajax({
                type: "POST",
                url: "{{ route('create') }}",
                data: cData,
                processData: false,
                contentType: false,
                success: function(r) {
                    if (r.sts == 200) {
                        $('.cName').text('');
                        $('.cDesc').text('');
                        $('.cImage').text('');
                        cForm.reset();
                        $('#createModal').modal('hide');
                        $('.table').load(location.href + ' .table');

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: r.msg,
                            showConfirmButton: false,
                            timer: 1500,
                        })
                    }
                },
                error: function(er) {
                    let error = er.responseJSON;

                    $.each(error, function(index, value) {
                        $('.cName').text(value.name);
                        $('.cDesc').text(value.desc);
                        $('.cImage').text(value.image);
                    });
                }
            });
        });

        // DATA CREATE END

        $(document).on('click', '.upBtn', function(e) {
            e.preventDefault();

            let id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "{{ route('upData') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.sts == 200) {
                        let img = response.data.image;
                        $('#upName').val(response.data.name);
                        $('#upDesc').val(response.data.desc);
                        $('#upId').val(response.data.id);
                    }
                }
            });
        });

        // DATA SHOW UPDATE FROM END

        $('#update_form').submit(function(e) {
            e.preventDefault();

            var uForm = $('#update_form')[0];
            var uData = new FormData(uForm);

            $.ajax({
                type: "POST",
                url: "{{ route('update') }}",
                data: uData,
                processData: false,
                contentType: false,
                success: function(r) {
                    if (r.sts == 200) {
                        $('.upName').text('');
                        $('.upDesc').text('');
                        $('.upImage').text('');
                        $('#upModal').modal('hide');
                        $('.table').load(location.href + ' .table');

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: r.msg,
                            showConfirmButton: false,
                            timer: 1500,
                        })
                    }
                },
                error: function(er) {
                    let error = er.responseJSON;

                    $.each(error, function(index, value) {
                        $('.upName').text(value.upName);
                        $('.upDesc').text(value.upDesc);
                    });
                }
            });
        });

        // DATA UPDATE END

        $(document).on('click', '.delBtn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "DELETE",
                        url: "{{ route('delete') }}",
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if (response.sts == 200) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: response.msg,
                                    showConfirmButton: false,
                                    timer: 1500,
                                })
                                $('.table').load(location.href + ' .table');
                            }
                        }
                    });
                }
            });
        });

        // DATA DELETE END

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            let page = $(this).attr('href').split('page=')[1];

            $.ajax({
                url: "paginate-data?page=" + page,
                success: function(response) {
                    $('.table-data').html(response);
                }
            });
        });

        // DATA PAGINATE END

        $(document).on('keyup', '#search', function(e) {
            e.preventDefault();
            var string = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('searchData') }}",
                data: {
                    string: string
                },
                success: function(response) {
                    $('.table-data').html(response);

                    if (response.sts == 400) {
                        $('.table-data').append(`<p class="text-danger text-center mt-5">` +
                            response.msg + `</p>`);
                    }
                }
            });
        });

        // DATA SEARCH END

    });
</script>
