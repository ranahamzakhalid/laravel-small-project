@include('header')

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3> Categories </h3>
            <a href="{{route('create.category')}}" class="btn btn-primary ">Add Category </a>
          </div>
              
          <div class="card-body">
            <table class="table table-borbered table-striped">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Is_Active</th>
                <th>Upload</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
                @foreach ($category as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->description }}</td>
                <td>
                @if ($user->is_active)
                  Active
                @else
                  In_Active
                @endif
                </td>
                  {{-- <td>{{ $user->upload }}</td> --}}
                <td>
                  <img src="{{ asset($user->upload) }}" data-fancybox="gallery" style="width: 80px; height: 80px;" id="thumbnail" />
                </td>
                  <td><a href="{{route('edit.category',['id'=>$user->id]) }}" class="btn btn-success mx-2 ">Edit</a></td>
                  <td><a href="{{route('delete.category',['id'=>$user->id]) }}" class="btn btn-danger mx-1">Delete</a></td>
              </tr>
                @endforeach    
            </table> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3> Rgistration Detail </h3>
          </div>
          <div class="card-body">
            <table class="table table-borbered table-striped">
              <tr>
                <th>ID</th>
                <th>Name</th>  
                <th>Email</th>
              </tr>
                @foreach ($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
              </tr>
              @endforeach  
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

    {{-- <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="largerImage">
    </div>     --}}
  
    {{-- <script>
      // Get the modal
      var modal = document.getElementById("myModal");
          
      // Get the image and insert it inside the modal
      var thumbnail = document.getElementById("thumbnail");
      var largerImage = document.getElementById("largerImage");
      thumbnail.onclick = function(){
      modal.style.display = "block";
      largerImage.src = this.src;
      }
          
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
          
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
      modal.style.display = "none";
      }
    </script> --}}
    
        
    <script>
      $(document).ready(function() {
          $('[data-fancybox="gallery"]').fancybox({
              loop: true // Enable looping through images
          });
      });
    </script>
          
      <script>
        $(document).ready(function() {
        $('#category-dropdown').select2();
        });
      </script>
@include('footer')
</body>
</html>