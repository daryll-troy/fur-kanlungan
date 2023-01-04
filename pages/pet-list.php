<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Browse Pets Section -->
    <section class="pet-list min-vh-100" id="pet-list">
        <div class="container flex-wrap filter wrap-search">
            <!-- Dropdown to filter the animal category -->
            <div class="dropdown mt-5 d-flex justify-content-center ">
                <button class="btn btn-secondary dropdown-toggle choose-animal " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Animal Type
                </button>
                <ul class="dropdown-menu animal-type" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Dogs</a></li>
                    <li><a class="dropdown-item" href="#">Cats</a></li>
                    <li><a class="dropdown-item" href="#">Hamsters</a></li>
                    
                </ul>
            </div>
            <!-- Search the name of the animal -->
            <nav class="navbar navbar-light bg-light mt-5 search-nav">
                <div class="container-fluid search-nav middle-search">
                    <form class="d-flex flex-wrap justify-content-center pet-list">
                        <input class="form-control me-2 type-search " type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success press-search" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
        <!-- card containers of pets -->
        <div class="container mt-5 pb-5 pet-container">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="d-flex justify-content-center ipa-grey">
                            <img src="https://hips.hearstapps.com/hmg-prod/images/cute-dog-captions-1563456568.jpg?crop=0.668xw:1.00xh;0.241xw,0&resize=480:*" class="card-img-top img-fluid" alt="image">
                        </div>
                        <div class="card-body">
                            <p class="card-text"><span style="font-weight: bold;">Name: </span>Totoy Brown</p>
                            <p class="card-text"><span style="font-weight: bold;">Age: </span>3 yrs.</p>
                            <p class="card-text"><span style="font-weight: bold;">Breed: </span>Golden Retriever</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="d-flex justify-content-center ipa-grey">
                            <img src="https://hips.hearstapps.com/hmg-prod/images/funny-dog-captions-1563456605.jpg?crop=0.748xw:1.00xh;0.0897xw,0&resize=1200:*" class="card-img-top img-fluid" alt="image">
                        </div>
                        <div class="card-body">
                            <p class="card-text"><span style="font-weight: bold;">Name: </span>Totoy Brown</p>
                            <p class="card-text"><span style="font-weight: bold;">Age: </span>3 yrs.</p>
                            <p class="card-text"><span style="font-weight: bold;">Breed: </span>Golden Retriever</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Pagination for the list of pets -->
        <div class="page-number">
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex flex-wrap justify-content-center no-margin-bottom">
                    <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">30</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
 
</body>

</html>