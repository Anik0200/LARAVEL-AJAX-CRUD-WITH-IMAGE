<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: 'Josefin Sans', sans-serif;
        }
    </style>
</head>

<body>

    <section style="padding-top: 40px; padding-bottom: 40px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h2>New Ajax</h2>
                        </div>
                        <div class="card-body">

                            <div class="d-flex d-inline">
                                <a type="button" class="btn btn-sm btn-outline-success" id="modal_cross"
                                    data-bs-toggle="modal" data-bs-target="#createModal">
                                    Add Data
                                </a>

                                <input placeholder="Search" style="margin-left: 5px" type="text" value=""
                                    name="search" id="search">
                            </div>

                            <div class="table-data">
                                <table class="table mt-2">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/images/' . $data->image) }}"
                                                        width="40px">
                                                </td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->desc }}</td>
                                                <td>

                                                    <a class="btn btn-sm btn-outline-success upBtn"
                                                        data-bs-toggle="modal" data-id="{{ $data->id }}"
                                                        data-bs-target="#upModal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a class="btn btn-sm btn-outline-danger delBtn"
                                                        data-id="{{ $data->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $allData->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

    @include('Jquery')
    @include('create')
    @include('update')
</body>

</html>
