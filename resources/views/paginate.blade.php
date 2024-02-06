

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
                    <img src="{{ asset('storage/images/' . $data->image) }}" width="40px">
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->desc }}</td>
                <td>

                    <a class="btn btn-sm btn-outline-success upBtn" data-bs-toggle="modal" data-id="{{ $data->id }}"
                        data-bs-target="#upModal">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-sm btn-outline-danger delBtn" data-id="{{ $data->id }}">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $allData->links() }}
