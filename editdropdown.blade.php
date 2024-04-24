<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Companies</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body style="text-align: center">

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

    {{-- <form action="{{route('$edit ? company.update,['id'=>$edit->id]: company.store')}}" method="POST"> --}}
        <form action="{{route('edit.company')}}" method="POST">

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
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    </script>
</body>
</html>