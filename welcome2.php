<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to DPS Pharmacy</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Navbar */
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

        /* Search Bar */
        #searchBar {
            width: 70%;
        }

        /* Carousel */
        .carousel-item img {
            max-height: 350px;
            object-fit: cover;
        }

        /* Shop by Categories */
        .categories .col-md-2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .categories .btn {
            width: 100%;
        }

        .categories .img-fluid {
            max-height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        /* Footer Styling */
.footer {
    padding: 40px 0;
}

.footer ul {
    list-style: none;
    padding: 0;
}

.footer ul li {
    margin-bottom: 10px;
}

.footer ul li a {
    color: #fff;
    text-decoration: none;
}


.navbar {
    background-color: black; /* Black background color */
}

.navbar .navbar-text {
    color: white; /* Dark white color */
}
.health-blog-bar {
    background-color: #f0f0f0; /* Change this to the desired background color */
    padding: 20px;
    margin-top: 20px;
}

.health-blog-bar h1 {
    font-size: 24px;
}

.health-blog-bar img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.health-blog-bar a {
    color: #007bff; /* Change this to the desired link color */
    text-decoration: none;
}

.health-blog-bar a:hover {
    text-decoration: underline;
}


      










    </style>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-text mr-auto">Helpline: +022 2345672247</span>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="mailto:DPS12@gmail.com">DPS12@gmail.com</a>
            </li>
        </ul>
    </div>
</nav>







    <div class="container-fluid">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">DPS Pharmacy</a>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a href="enter.php" class="btn btn-primary mb-2">Enter your details</a> 
                        
                    </li>
                    <li class="nav-item">
                    <a href="predetails.php" class="btn btn-primary mb-2">Prescription</a> 
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Expired Medicines</a>
                    </li> -->
                    
                    <li class="nav-item">
                    <a href="logout.php" class="btn btn-primary mb-2">Log out</a> 
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Search Bar -->
        <div class="row mt-3">
    <div class="col-md-6 offset-md-3 text-center">
        <h2>What are you looking for?</h2>
        <form class="form-inline" id="searchForm">
            <input type="text" class="form-control mb-2 mr-sm-2" id="searchBar" placeholder="Search Product by ID">
         
            <button type="submit" class="btn btn-primary mb-2">Search</button>
            <script>
            document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get the value entered in the search bar
    const searchTerm = document.getElementById('searchBar').value.trim();

    // Check if the entered value is a valid ID (between 1 and 17)
    const productId = parseInt(searchTerm);
    if (!isNaN(productId) && productId >= 1 && productId <= 17) {
        // Redirect to the medicine category page with the specific product ID
        window.location.href = `index.html#product-${productId}`;
    } 
    else if (!isNaN(productId) && productId >= 18 && productId <= 25) {
        // Redirect to the medicine category page with the specific product ID
        window.location.href = `indexx2.html#product-${productId}`;
    }
   else  if (!isNaN(productId) && productId >= 26 && productId <= 33) {
        // Redirect to the medicine category page with the specific product ID
        window.location.href = `indexx3.html#product-${productId}`;
    }
   else  if (!isNaN(productId) && productId >= 34 && productId <= 45) {
        // Redirect to the medicine category page with the specific product ID
        window.location.href = `indexx4.html#product-${productId}`;
    }
    
    else {
        // Handle invalid input (not a valid ID)
        alert('Please enter a valid product ID between 1 and 17.');
    }
});
</script>






        </form>
        <div id="searchResults" class="mt-3">
            <!-- Search results will be displayed here -->
        </div>
    </div>
</div>


        
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="pic1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="picc.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="neww.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

        
        <!-- Shop by Categories -->
        <!-- Shop by Categories -->
<div class="container mt-4">
    <h2 class="text-center">Shop by Categories</h2>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="pic8.webp" class="card-img-top" alt="Skincare">
                <div class="card-body text-center">
                    <a href="indexx4.html" class="btn btn-primary mb-2">Skincare</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="pic6.webp" class="card-img-top" alt="Elderly Care">
                <div class="card-body text-center">
                    <a href="indexx3.html" class="btn btn-primary mb-2">Elderly Care</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="pic10.webp" class="card-img-top" alt="Babycare">
                <div class="card-body text-center">
                    <a href="indexx2.html" class="btn btn-primary mb-2">Babycare</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="m1.jpg" class="card-img-top" alt="Medicines">
                <div class="card-body text-center">
                    <a href="index.html" class="btn btn-primary mb-2">Medicines</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Add more categories as needed -->
</div>


<!-- Your existing content -->

<!-- Footer -->


<!-- Health Blog Bar -->
<div class="health-blog-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Article of The Day</h1>
                <img src="moringa.jpg">
                <a href="https://www.webmd.com/vitamins-and-supplements/health-benefits-moringa">12 Health benefits of Moringa Leaves</a>

                <!-- <a href="#" class="btn btn-primary">Visit Health Blog</a> -->
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="footer bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Footer content for services -->
                <h4>Services</h4>
                <ul>
                    <li><a href="#">App development</a></li>
                    <li><a href="#">Web development</a></li>
                    <li><a href="#">DevOps</a></li>
                    <li><a href="#">Web designing</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <!-- Footer content for social media -->
                <h4>Social Media</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <!-- Add more social media links as needed -->
                </ul>
            </div>
            <div class="col-md-4">
                <!-- Footer content for quick links -->
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <!-- Add more quick links as needed -->
                </ul>
            </div>
        </div>
    </div>
</footer>
     
        
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>



   

    


