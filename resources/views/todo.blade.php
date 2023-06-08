<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>My ToDo App</title>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="card" style="width: 40rem;">




            <div class="card-header fw-bolder">
                My ToDo App
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                <strong>Success!</strong> {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                <strong>Failed!</strong> {{Session::get('fail')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{route('todo')}}" method="post">
                <div class="row">
                    <div class="col-md-10">

                        @csrf
                        <div class="input-group py-3">
                            <input type="text" name="event" value="{{ old('event')?old('event'):'' }}"
                                class="form-control @error('event') is-invalid @enderror"
                                placeholder="Add your new todo" aria-label="Add your new todo"
                                aria-describedby="button-addon2">
                            <button type="submit" class="btn btn-outline-success bg-success" type="button"
                                id="button-addon2">
                                <ion-icon name="add-outline" class="text-dark"></ion-icon>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <button class="btn btn-outline-primary" type="reset" id="button">
                            Reset
                        </button>
                    </div>
                </div>
            </form>
            @error('event')<div class="text-danger mx-3">{{ $message }}</div>@enderror

            @forelse($events as $event)
            <ul class="list-group list-group-flush">

                <li class="list-group-item text-primary">
                    <div class="row">
                        <div class="col-8">{{$event->event}} </div>
                        <div class="col-2">
                            <form action="{{route('delete',$event->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger"
                                    onclick="return confirm('Are you Sure to Delete this event?')">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </div>
                        <div class="col-2"><a href="" class="text-info">
                                <ion-icon name="pencil-outline"></ion-icon>
                            </a></div>
                    </div>
                </li>
            </ul>
            @empty
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-info">
                    No Pending Task
                </li>
            </ul>


            @endforelse
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div class=""><span class="text-primary">{{$count}}</span> Pending Tasks</div>
                @if($count > 0)
                <form action="{{route('delete.all')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-primary"
                        onclick="return confirm('Are you Sure to Delete this event?')" type="submit" id="button">
                        Clear All
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>

    <!-- bootsatrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- iccos -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

</html>