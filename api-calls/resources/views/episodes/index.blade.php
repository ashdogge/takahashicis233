<h<!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="containerfluid">
            <h1 class="display-1 text-center "> {{ $showName}}<br>Episodes</h1>
            <!-- <h1 class="display-1 text-center my-5"></h1> -->
            <div class="d-flex flex-row flex-wrap m-5">
                @foreach ($episodes as $episode)

                    <!-- Episode card -->
                    <div class="card m-3" style="width: 18rem;">
                        <img src="{{$episode->imageUrl}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-text">Season {{$episode->season}} Episode {{$episode->episode}}</h6>
                            <h4 class="card-title">{{$episode->name}}</h4>
                            <hr>
                            <p class="card-text">{{$episode->summary}}</p>
                        </div>

                        <!-- /Episode card -->
                    </div>
                @endforeach
            </div>
        </h1>
    </body>

    </html>