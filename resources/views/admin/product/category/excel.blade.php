<table>
    <thead>
    <tr>
        <th>Category Name</th>
        <th>Remarks</th>
    </tr>
    </thead>
    <tbody>
    @foreach($all as $data)
        <tr>
            <td>{{ $data->prodcate_name }}</td>
            <td>{{ $data->prodcate_remarks }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
