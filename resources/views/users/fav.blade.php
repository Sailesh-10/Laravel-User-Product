<table class="table  " id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr class="bg-primary text-white">
            <th>name</th>



        </tr>
    </thead>
    <tbody>
        @foreach ($user_favourites as $favourite)
        <tr>

            <td>{{$favourite->name}}</td>
            <td>{{$favourite->description}}</td>


        </tr>
        @endforeach
    </tbody>
</table>