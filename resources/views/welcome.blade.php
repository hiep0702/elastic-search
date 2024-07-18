<!DOCTYPE html>
<html lang="en">

<head>
    <title>Elaticsearch</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="page-header">
            <h3 class="page-title"> Danh sách nhân viên </h3>

            <form action="{{ route('search') }}" method="get">
                <div style="display: flex; justify-content: center;">
                    <input style="margin-right: 10px; width: 250px" type="text" id="key_search" name="key_search"
                        class="form-control" />
                    <button style="width: 200px;" id="checkButton" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> STT </th>
                    <th> Mã nhân viên </th>
                    <th> Ảnh </th>
                    <th> Họ tên </th>
                    <th> Email </th>
                    <th> Sinh nhật </th>
                    <th> Sđt </th>
                    <th> Trạng thái </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->employeeCode }}</td>
                        <td>
                            <img src="{{ $item->image }}" style="width: 50px; height: 50px" alt="image">
                        </td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->birthday }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            @if ($item->status == 1)
                                Hoạt động
                            @else
                                Đã nghỉ
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
