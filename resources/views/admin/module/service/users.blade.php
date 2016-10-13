<div class="panel panel-default">
    <div class="panel-heading">
        <h1>
            Attached Users
        </h1>
    </div>
</div>
<div class="panel-body">
    <table class="table table-user-information">
        <tbody>
        <tr>
            <th>Name</th>
            <th>Delete</th>
        </tr>
        @foreach($model->services as $service)
            <tr>
                <td>{{ $service->user ? $service->user->name : '' }}</td>
                <td>X</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>