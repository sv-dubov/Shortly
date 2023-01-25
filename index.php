<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shortly</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<header class="header">
    <h1>Short your link</h1>
</header>

<main class="main">
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <form id="formData" class="card p-2 margin">
                    <div class="input-group">
                        <input type="text" name="url" class="form-control" placeholder="Your link">
                        <div class="input-group-append">
                            <button type="submit" id="submit" class="btn btn-success mx-2">Short</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered caption-top">
                <caption>List of links</caption>
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Url</th>
                            <th scope="col">Short Url</th>
                            <th scope="col">Clicks</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                <tbody id="linksList"></tbody>
            </table>
        </div>
    </div>
</main>

<footer class="footer">
    <p>Dubov &copy; <?php echo date("Y"); ?></p>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</body>

</html>