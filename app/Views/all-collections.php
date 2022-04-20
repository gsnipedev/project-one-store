<!DOCTYPE html>
<html lang="en">
<?php
$session = session();
$imageUrl = $session->get('imgUrl') != null ? $session->get('imgUrl') : 'https://picsum.photos/id/237/40/40';
$email = $session->get('email');
$username = $session->get('username') != null ? $session->get('username') : "Not Login Yet";
$isLogin = $session->get('logged_in');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="google-signin-client_id"
        content="886944638657-o4urpbf9h3uoohmaoogig2smlvchh56t.apps.googleusercontent.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/script.js') ?>"></script>
    <script src="<?php echo base_url('assets/collections-script.js') ?>"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v13.0&appId=357242339747863&autoLogAppEvents=1"
        nonce="CndJOdbp"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href=" <?php echo base_url('assets/styles.css') ?>">
    <style>
    .itemImage {
        transition: .4s;
    }

    .itemImage:hover {
        transform: scale(1.05);
    }
    </style>
    <title>Collections</title>
</head>

<body class="bg-light" oncontextmenu="return false">


    <div class="container-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid">
                <div class="input-group mb-3 navbar-brand navbar-toggler mt-3"
                    style="border: 0; padding: 0; width: 65%;">
                    <input type="text" class="form-control" placeholder="Search for something"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                        onclick="signOut()">GO</button>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse target7781" id="navbarSupportedContent">
                    <a class="navbar-brand" href="#">My Store</a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Pictures</a></li>
                                <li><a class="dropdown-item" href="#">Videos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Collections
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">All Collections</a></li>
                                <li><a class="dropdown-item" href="#">1st Collections</a></li>
                                <li><a class="dropdown-item" href="#">2nd Collections</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                Support

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Wishlist
                            </a>
                        </li>

                    </ul>

                    <div class="user-profile-ui position-sticky">
                        <button type="button" class="btn font-rubik pp-button">
                            <img src="<?php echo $imageUrl ?>" alt="" class="rounded-circle" height="30" width="30"
                                referrerpolicy="no-referrer">
                            <?php echo $username ?>
                        </button>

                        <div class="profile-dd position-absolute mt-3 bg-dark text-light rounded-bottom font-rubik"
                            style="display: none; width:100%">
                            <ul class="list-group profile-dd-list-group">
                                <li class="list-group-item">Profile</li>
                                <li class="list-group-item">My Cart</li>
                                <li class="list-group-item">Setting</li>
                                <li class="list-group-item">Theme</li>
                                <a class="list-group-item text-decoration-none" href="home/logout">
                                    <li class="text-decoration-none" style="list-style: none;">
                                        Logout</li>
                                </a>

                            </ul>

                        </div>
                    </div>

                </div>





            </div>

        </nav>
    </div>

    <section class="mt-4 mb-4 bg-dark d-flex align-items-center" style="height: 40vh">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center ps-5">
                    <p class="roboto-condensed fs-1 text-light heroTitle">All Collections</p>
                </div>
                <div class="col-md-6">
                    <img src="https://picsum.photos/500/200" alt="" class="img-fluid border border-light rounded">
                </div>
            </div>
        </div>
    </section>


    <section class="pb-5 pt-5">
        <div class="container-sm">
            <div class="row" id="collectionItemContainer">

                <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-xl-5 overflow-hidden">
                                <img src="https://picsum.photos/600/300" class="rounded-start" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body font-rubik">
                                    <h5 class="card-title">Collections Name</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>

                            </div>
                            <div class="card-footer roboto-condensed">
                                Shopping Now
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>





            </div>



        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col font-rubik">
                <span>Filter : </span>
            </div>
        </div>
        <hr>
        <p class="roboto-condensed fs-1 text-light heroTitle text-dark">All Collections</p>
    </div>

    <section class="pb-4">
        <div class="container-lg">
            <div class="row item-collection-container">


                <div class="col-6 col-md-3 mb-3">
                    <div class="overflow-hidden" style="width: auto;">
                        <img src="https://images.pexels.com/photos/2916814/pexels-photo-2916814.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="" class="img-fluid itemImage" width="300" height="400">
                    </div>
                    <div class="mt-2">
                        <span class="roboto-condensed">This is item title</span>
                        <br>
                        <span class="font-rubik">$99.99</span>
                        <div class="row">
                            <div class="col">
                                <span class="roboto-condensed">Rating-</span>
                                <span class="font-rubik">9.9/10</span>
                            </div>
                            <div class="col-6">
                                <i class="fa-solid fa-heart item-like-button"></i>
                                &nbsp;
                                <i class="fa-solid fa-comment item-comment-button"></i> 99
                            </div>
                        </div>
                    </div>

                </div>





            </div>
        </div>
    </section>


    <footer class="footer bg-dark text-light pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <p class="fs-1 roboto-condensed">STORE</p>
                    <p class="font-rubik">We provide the best e-commerce for you,<br>for the connected world.</p>
                </div>
                <div class="col-lg-2">
                    <p class="roboto-condensed fs-4">Explore</p>
                    <p class="font-rubik">Home</p>
                    <p class="font-rubik">Collections</p>
                    <p class="font-rubik">Our Media</p>
                    <p class="font-rubik">Customer Care</p>
                </div>
                <div class="col-lg-3">
                    <p class="roboto-condensed fs-4">Visit</p>
                    <p class="font-rubik">Sumatera Utara, Indonesia</p>
                    <p class="font-rubik">Medan</p>
                    <br>
                    <p class="roboto-condensed fs-4">Business</p>
                    <p class="font-rubik">yourEmail@email.com</p>
                </div>
                <div class="col-lg-2">
                    <p class="roboto-condensed fs-4">Follow</p>
                    <p class="font-rubik"><i class="fa-brands fa-instagram"></i> yourStoreIG</p>
                    <p class="font-rubik"><i class="fa-brands fa-twitter"></i> yourStore_Twitter</p>
                    <p class="font-rubik"><i class="fa-brands fa-facebook"></i> yourStore-fb</p>
                    <p class="font-rubik"><i class="fa-brands fa-whatsapp"></i> yourStore-number</p>

                </div>
                <div class="col-lg-2">
                    <p class="roboto-condensed fs-4">Legal</p>
                    <p class="font-rubik">Terms</p>
                    <p class="font-rubik">Privacy</p>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-12">
                    <p class="font-rubik text-secondary">&copy; 2022 mySTORE, All Rights Reserved.</p>
                </div>
            </div>

        </div>
    </footer>

</body>

</html>