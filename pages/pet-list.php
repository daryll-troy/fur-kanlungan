<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pet-list.css">
    <!-- css reset -->
    <link rel="stylesheet" href="css/css-resets.css">
</head>

<body>
    <!-- Browse Pets Section -->
    <section class="pet-list min-vh-100" id="pet-list">
        <div class="container d-flex justify-content-between">
            <!-- Dropdown to filter the animal category -->
            <div class="dropdown mt-5">
                <button class="btn btn-secondary dropdown-toggle choose-animal ms-5" type="button" id="dropdownMenuButton1" onclick="colorFunction()" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
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
    </section>
</body>
<!-- Make the color of the .type-search button according to its :hover background-color-->
<script>
function colorFunction() {
  document.getElementById("dropdownMenuButton1").style.backgroundColor = "rgb(54, 10, 10)";
}
</script>
</html>