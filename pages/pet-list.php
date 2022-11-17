<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>

<body>
    <!-- Browse Pets Section -->
    <section class="pet-list min-vh-100" id="pet-list">
        <div class="container d-flex justify-content-between filter">
            <!-- Dropdown to filter the animal category -->
            <div class="dropdown mt-5">
                <button class="btn btn-secondary dropdown-toggle choose-animal ms-5" type="button" id="dropdownMenuButton1" onclick="colorFunction()" data-bs-toggle="dropdown" aria-expanded="false">
                    Animal Type
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Dogs</a></li>
                    <li><a class="dropdown-item" href="#">Cats</a></li>
                    <li><a class="dropdown-item" href="#">Hamsters</a></li>
                </ul>
            </div>
            <!-- Search the name of the animal -->
            <nav class="navbar navbar-light bg-light mt-5 me-5 search-nav ">
                <div class="container-fluid search-nav">
                    <form class="d-flex">
                        <input class="form-control me-2 type-search " type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success press-search" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>

        <div class="container mt-5 pb-5">
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="image">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="image">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="image">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Make the color of the .type-search button according to its :hover background-color-->
    <script>
        function colorFunction() {
            document.getElementById("dropdownMenuButton1").style.backgroundColor = "rgb(54, 10, 10)";
        }
    </script>
</body>

</html>