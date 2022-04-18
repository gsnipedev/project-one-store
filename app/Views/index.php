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
    <link rel="stylesheet" href=" <?php echo base_url('assets/styles.css') ?>">
    <title>my Store</title>
    <style>

    </style>
</head>











<body>



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
                                <li><a class="dropdown-item" href="home/collections">All Collections</a></li>
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

    <!-- TOP -->

    <section class="topsection d-flex align-items-center"
        style="background-image: url(<?php echo base_url('assets/topimg.jpg') ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <p id="hero_title">
                        Store
                    </p>
                    <p id="hero_sub_title">
                        a place where you can find what you could'nt
                    </p>
                    <p class="text-light roboto-condensed fs-3">Shopping Now <i
                            class="fa-solid fa-arrow-right-long"></i></p>

                </div>
                <div class="col-md-8">

                </div>
            </div>
        </div>


    </section>

    <section class="section2 pb-4">
        <div class=" container mt-3 ">
            <div class="text-center font-railway fs-3 pt-4 pb-4">
                <p class="font-railway">Featured Producs</p>
            </div>

            <div class="row featured-item-list justify-content-center">
                <div class="col-lg-4 d-flex justify-content-center" style="border: 0px solid black;">
                    <div class="card" style="width: 18rem; position:relative;border:0">
                        <div class="align-self-center overflow-hidden">

                            <img src="<?php echo base_url('assets/item-example.jpg') ?>"
                                class="shadow card-img-top align-self-center fluid-image" alt="...">
                        </div>
                        <p class="position-absolute align-self-center roboto-condensed fs-4 invisible" style="top:30%"
                            id="">Item
                            Name
                        </p>
                        <div class="card-body">
                            <i class="font-rubik">Your Store</i>
                            <p class="fs-7">Product Name blah blah</p>
                            <p>$299 <sup>99</sup> </p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 d-flex justify-content-center" style="border: 0px solid black;">
                    <div class="card" style="width: 18rem; position:relative;border:0">
                        <img src="assets/item-example.jpg" class="shadow card-img-top align-self-center fluid-image"
                            alt="...">
                        <div class="card-body">
                            <i class="font-rubik">Your Store</i>
                            <p class="fs-7">Product Name blah blah</p>
                            <p>$299 <sup>99</sup> </p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row text-center mt-5">
                <div class="col-md-12 font-rubik">
                    I Want to See Everything
                    <a href="home/login">
                        <button class="btn btn-info font-rubik" style="color: white">
                            Shop Now!
                        </button>
                    </a>
                </div>
            </div>

        </div>

    </section>

    <section class="section3 bg-light">
        <div class="container pt-5 d-flex align-items-center">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/wayang.jpg" alt="" id="imghero2" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <h1 class="font-railway">Why are we?</h1>
                    <br>
                    <p class="font-rubik"> The product we provide is authentic from indonesia, Lorem ipsum dolor sit
                        amet. Et voluptatum
                        quibusdam ut quia reiciendis ab quos ipsum. Non voluptate enim ea ipsa officia qui omnis
                        corporis! Sed expedita consequatur qui fuga pariatur ut nihil accusamus in totam excepturi. Ut
                        quia dolorem qui eius voluptate est voluptatem tempora non necessitatibus labore est sint fugit.

                        33 eius voluptatem nam animi ratione ea quasi dolorum et iste galisum. Qui optio quasi sit minus
                        iusto ut rerum expedita ea nisi libero? Id nostrum aperiam in saepe nesciunt sit possimus omnis
                        et natus quidem est quaerat quas.

                        Aut quia alias eum minima doloribus eos consequatur omnis nam sapiente dolorem ex eaque voluptas
                        et animi voluptates eos saepe porro. Qui quas ipsum cum dolorum doloribus At voluptatem
                        voluptatum est incidunt tempora et quisquam nam quia eius id blanditiis error.</p>
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


















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/script.js') ?>"></script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<script>

</script>


</html>