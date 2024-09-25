<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/css_style.css")}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <title>{{ $title ?? "home" }}</title>
        <style>
          .btn-purple{
            background-color: #6d31ed;
            color:white
          }
          .btn-purple:hover{
            background-color: white;
            color: #6d31ed;
            border-color: #6d31ed
          }
          .btn-purple-outline{
            background-color: white;
            color: #6d31ed;
            border-color: #6d31ed
            
          }
          .btn-purple-outline:hover{
            background-color: #6d31ed;
            color:white
            
          }
          .thumbs img {
    border: 2px solid #f0f0f0;
    cursor: pointer;
}

.thumbs img:hover {
    border-color: #007bff;
}

.product-details .badge {
    font-size: 0.9rem;
}

.product-details h2 {
    font-size: 2rem;
    font-weight: bold;
}

.product-details .price {
    font-size: 1.8rem;
    color: #6f42c1;
}

.product-details .star-rating {
    color: #ffc107;
    font-size: 1.2rem;
}

.product-details ul li {
    font-size: 0.9rem;
    margin-bottom: 5px;
}

.product-details ul li i {
    color: #28a745;
    margin-right: 10px;
}
.text-purpel{
  color: #6d31ed
}
.text-purpel:hover{
    color: #6f42c1
}
.bg-purpel{
    color: white;
  background-color: #6d31ed
}

.input-group .form-control {
            border-left: none;
            border-color: #6c757d;
            background-color: #fff; /* Background color */
            border-radius: 8px; /* Optional: Round the edges */
        }

        .input-group .btn {
            border: none;
            background-color: transparent; /* Make the button background transparent */
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #6c757d;
        }

        .form-select{
            border-color: #6c757d
        }
        .input-group .btn i {
            color: #6c757d; /* Icon color */
        }
        .input-group-text{
            border-right: none;
            border-color: #6c757d;
            
            background-color: #fff
            
        }
        .input-group-text:focus{
            border-color: #6c757d;
        }
        .input-group-text i{
           color: gray
        }

        .card-custom {
            border-radius: 2px;
            padding: 20px;
            background-color: #fff
        }
        .btn-custom {
            background-color: #6f42c1;
            color: white;
            border-radius: 30px;
        }
        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 10px;
        }
        .voucher-input {
            border-radius: 20px;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 10px;
        }
        .custom-file-input {
            display: none; /* Hide the default file input */
        }
        .custom-file-label {
            cursor: pointer; /* Change cursor to pointer */
        }
        .delivery-option {
            padding: 15px;
            border-radius: 10px;
            border: 2px solid #ddd;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }
        .delivery-option.active {
            border-color: #6f42c1;
            background-color: #f9f1ff;
        }
        /* .radio-custom {
            display: none;
        }
        .radio-custom-label {
            cursor: pointer;
            margin-right: 15px;
            transition: color 0.3s ease;
        } */
        /* .radio-custom:checked + .radio-custom-label {
            color: #6f42c1;
        } */
        </style>
       
        @livewireStyles
    </head>
    <body>
    
        <!-- Header -->
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light py-0 sticky-top">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"><img src="{{asset("assets/images/logo (2).png")}}" alt="logo"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/offers">Offers</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link " href="/shop" >
                            Shop
                        </a>
                       
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="/events"  >events</a>
                      </li>
                      @auth
                      <a href="/logout" class= "nav-link">Logout</a >
                     
                      @endauth
                      @role("admin")
                     
                      <a href="/adminproduct" class= "nav-link ">dashbourd</a >
                     
                     
                      @endrole
                    </ul>
                    <div class="d-flex  ">
                        @guest
                        
                            <a class="nav-link me-3" href="/login" >
                                Login
                            </a>
                           
                          
                          
                            <a class="nav-link me-3" href="/signup"  >Sign Up</a>
                          
                        @endguest
                      
                      @auth
                         @livewire("Cartcount")
                        <a href="/profile" class= "btn me-3"><i class="fas fa-user mx-3"></i>{{auth()->user()->name}}</a >
                          
                        @endauth
                       
                    </div>
                  </div>
                </div>
            </nav>
        </header>
    
        <!-- Main Content -->
        <main class="container-fluid p-0 ">
        
            {{ $slot }}
        </main>
    
        <!-- Footer -->
        <footer class="bg-dark text-light py-5">
            <div class="container">
                <div class="row">
                    <!-- About Section -->
                    <div class="col-md-3">
                        <h5>About</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Company</a></li>
                            <li><a href="#" class="text-light text-decoration-none">News</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Blog</a></li>
                        </ul>
                    </div>
                    <!-- Help Section -->
                    <div class="col-md-3">
                        <h5>Help</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Support</a></li>
                            <li><a href="#" class="text-light text-decoration-none">FAQs</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- Contact Section -->
                    <div class="col-md-3">
                        <h5>Contact</h5>
                        <p>Email: info@example.com</p>
                        <p>Phone: +123 456 7890</p>
                    </div>
                    <!-- Subscription Section -->
                    <div class="col-md-3">
                        <h5>Receive new promotions</h5>
                     
                        <!-- Social Media Icons -->
                        <div>
                            <a href="#" class="text-light me-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-light me-2"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-light me-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-light"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    
        @livewireScripts
    
        <script>
              document.querySelectorAll('.delivery-option').forEach(function (element) {
        element.addEventListener('click', function () {
            // Remove selected class from all options
            document.querySelectorAll('.delivery-option').forEach(function (el) {
                el.classList.remove('selected');
            });

            // Add selected class to clicked option
            this.classList.add('selected');

            // Set the corresponding radio input as checked
            this.querySelector('input[type="radio"]').checked = true;
        });
    });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
    </body>
</html>
