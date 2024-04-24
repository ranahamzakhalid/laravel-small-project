@include('header')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="h1"> <u> All Users Records </u> </h1>
                    <table class="table table-borbered table-striped">
                        <td><a href="/newuser" class="btn btn-success btn-sm">Add</a></td>
                        <td><a href="{{route('city.table') }}" class="btn btn-primary btn-sm">Table</a></td>
                        {{-- <td><a href="{{route('category.index') }}" class="btn btn-primary btn-sm">Back</a></td> --}}
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Phone</th>
                        {{-- <th>Password</th> --}}
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->phone }}</td>
                            <td><a href="{{route('view.user',['id'=>$user->id]) }}" class="btn btn-primary btn-sm">View</a></td>
                            <td><a href="{{route('update.user',['id'=>$user->id]) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a href="{{route('delete.user',['id'=>$user->id]) }}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    @endforeach    
                </table>
                <div class="mt-5">
                    {{$users->links()}}
                </div>
            </div>
        </div> 
    </div>
@include('footer')
</body>
</html>
        