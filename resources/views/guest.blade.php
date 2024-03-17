
@section('title') Guest @endsection
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/css/mystyle.css">
      </head>
<body>


    <div >
        <div class="container">



            <div class="text-center mt-3">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Posted By</th>
                            <th scope="col">Creeated At</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Rate</th>


        </tr>
    </thead>
    <tbody>

        @foreach ($posts as $posts)


        <tr>
            <td>{{$posts->id}}</td>
            <td>{{$posts->title}}</td>
            <td>{{$posts->user->name}}</td>
            <td>{{$posts->created_at}}</td>
            <td>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </td>


            <td>
                <a href="{{route('posts.show', $posts->id)}}" type="button" class="btn btn-info">View</a>
                <a href="{{route('posts.comment', $posts->id)}}" type="button" class="btn btn-info" style="background-color: gray;color: white; border: gray">Comment</a>

            </td>

        </tr>
        @endforeach

    </tbody>
    </table>
    </div>
    </div>

</body>
</html>
