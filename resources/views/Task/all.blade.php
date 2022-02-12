@extends('template')
@section('title')
    Все задачи
@endsection
@section('content')
    <h1>Все задачи</h1>
    <nav>
        <a href="{{ route(\App\Consts\WebRoutes::SHOW_CREATE_TASK_FORM) }}" class="btn btn-success">Добавить задачу</a>
    </nav>
    <br>
    <div class="row">
        <table class="table" id="table">
            <thead>
            <tr style="text-align: center">
                <th>ID</th>
                <th>Имя пользователя</th>
                <th>Email</th>
                <th>Текст</th>
                <th>Status</th>
                <th>action</th>
            </tr>
            </thead>
        </table>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 3,
            searching: false,
            lengthChange: false,
            ajax: {url: "{{ route(\App\Consts\WebRoutes::GET_ALL_TASKS) }}"},
            columns: [
                {data: 'id', name: 'id'},
                {data: 'user_name', name: 'user_name'},
                {data: 'email', name: 'email'},
                {data: 'body', name: 'body'},
                {
                    data: 'status',
                    name: 'status',
                    orderable: true,
                    searchable: false
                },
                {
                    name: "button",
                    data: "button",
                    orderable: false,
                }
            ]
        });

    });
</script>
