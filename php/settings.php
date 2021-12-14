<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <title>Settings</title>
</head>

<body>
    <div class="container justify-content-center ">

        <form class=" offset-2 col-8 mb-5">
            <h2>Profile Settings</h2>

            <h4>Base Data</h4>
            <div class="mb-3 form-floating">
                <input aria-label="First name" placeholder="First Name" type="name" class="form-control" id="firstname"
                    aria-describedby="firstname">
                    <label for="firstname">First Name</label>

            </div>
            <div class="mb-3 form-floating">
                <input aria-label="Last name" placeholder="Last name" type="name" class="form-control" id="lastname"
                    aria-describedby="lastname">
                    <label for="lastname">Last Name</label>

            </div>

            <div class=" my-4 form-floating">
                <select class="form-select" id="floatingSelectGrid coffeetea"
                    aria-label="Floating label select example">
                    <option selected>Choose your favourite drink </option>
                    <option value="1">Coffee</option>
                    <option value="2">Tea</option>
                    <option value="3">Hot Chocolate</option>
                </select>
                <label for="floatingSelectGrid">Coffee or Tea</label>
            </div>

            <h4>Tell Something About You</h4>

            <div class=" mb-4 form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Short Description</label>
            </div>

            <h4>Prefered Chat Layout</h4>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Username and message in one line
                </label>
            </div>
            <div class=" mb-4 form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Username and message in separated lines
                </label>
            </div>

            <div class="row justify-content-center">
                    <button class=" col-5 btn btn-lg btn-secondary mx-1 "><a class="btn-link" href="friends.php">Cancel</a></button>
                    <button class=" col-6 btn btn-lg btn-primary ms-4" type="submit"><a class="btn-link" href="#">Save</a></button>
            </div>
        </form>
    </div>


</body>

</html>