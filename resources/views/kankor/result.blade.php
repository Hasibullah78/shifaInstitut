<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kankor</title>
</head>
<link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap-4.0.0-dist/css/bootstrap.min.css') }}">
<body>
    <section class="features">
        <div class="container">
            <div class="card">
                <div class="card-header" style="text-align: center">
                   <h3 style="color: rgb(68, 125, 247)">Kankor Results</h3>

                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group" style="float: left">
                                    <input type="text" hidden name="search" class="form-control" placeholder="Enter Kankor ID">
                                </div>
                                <div class="col-md-4 form-group" style="float: left">
                                    <input type="text" name="search" class="form-control" placeholder="Enter Kankor ID">
                                </div>
                                <div class="col-md-1 form-group">
                                    <input type="submit" value="Search" class="btn btn-primary">
                                </div>
                        </div>
                    </form>

                </div>
               </div>


        </div>
    </section>


</body>
</html>
