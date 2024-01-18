<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>All View User!</title>
  </head>
  <body>
    <h1 class="mt-4">All View User</h1>
    <a href="/"><button class="btn btn-dark me-4" style="float:right">Add New User</button></a>
    <table class="table table-bordared mt-5">
    
        <thead>
          <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Password</th>
            <th>Description</th>
            <th >Edit</th>
            <th >Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($userf as $userv)
                
          
          <tr>
        
            <td>{{$loop->index+1}}</td>
            <td><a href="{{$userv->id}}/user_details" style="text-decoration:none;color:black">{{$userv->name}}</a></td>
            <td><img src="userimg/{{$userv->image}}" class="rounded-circle" width="50px" height="50px" alt=""></td>
            <td>{{$userv->email}}</td>
            <td>{{$userv->mobile}}</td>
            <td>{{$userv->password}}</td>
             <td>{{$userv->description}}</td>
             <td><a href="{{$userv->id}}/edit_user"><button class="btn btn-success">Edit</button> </a></td>
             {{-- <td><a href="{{$userv->id}}/delete"><button class="btn btn-danger">Delete</button> </a></td> --}}
                <td><form method="post" action="/{{$userv->id}}/delete">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form></td>
          </tr>
          @endforeach
        </tbody>
      
      </table>
      {{ $userf->links() }}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>