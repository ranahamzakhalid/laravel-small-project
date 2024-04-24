@include('header')

<body style="text-align: center">

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

    {{-- <form action="{{route('$edit ? company.update,['id'=>$edit->id]: company.store')}}" method="POST"> --}}
        <form action="{{route('company.store')}}" method="POST">

    @if (Session::has('success'))
        <div class="alert alert-success">{{session::get('success')}}</div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger">{{session::get('fail')}}</div>
    @endif
        @csrf

        <label>Name:</label>
            <input type="text" name="name" placeholder="Enter Name">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
        <br><br>

                 
                     
        <label>Companies:</label>
        <select name="companies[]" class="js-example-basic-multiple" multiple="multiple" style="width: 200px;">
            {{-- <option value="Apple"   @foreach (json_decode($users) as $company){{ $company == "Apple"?'selected':''}}@endforeach>Apple</option> --}}
            <option value="Apple">Apple</option>
            <option value="HTC">HTC</option>
            <option value="OPPO">OPPO</option>
            <option value="VIVO">VIVO</option> 
        </select><br><br>
        <button class="btn btn-success btn-bg" type="submit">Save</button>
        {{-- <a href="{{route('category.index')}}" class="btn btn-primary ">Go Main Page </a> --}}
    </form>

    <div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3>  Detail </h3>
              </div>
              <div class="card-body">
                <table class="table table-borbered table-striped">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>  
                    <th>Companies</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                    @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->companies}}</td>
                    <td><a href="{{route('update.user',['id'=>$user->id]) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a href="{{route('delete.user',['id'=>$user->id]) }}" class="btn btn-danger btn-sm">Delete</a></td>
                  </tr>
                  @endforeach  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    </script>
@include('footer')
</body>
</html>