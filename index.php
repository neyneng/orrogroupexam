<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="col-md-6">
            <div class="card">
                <h4 class="card-header">
                    Convert Number to String
                </h4>
                <?php
                    include('Classes/Convert.php');

                    $convert = new Convert();

                    $convert->numberToString();

                ?>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="number">Number</label>
                                <input type="text" required name="number" class="form-control">
                            </div>
                            <div class="col-md-4 mt-2">
                                <button type="submit"  class="btn btn-md btn-success" name="convert">Convert</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>