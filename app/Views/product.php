<!DOCTYPE html>
<html lang="en">
<?php
$session = session();
$imageUrl = $session->get('imgUrl') != null ? $session->get('imgUrl') : 'https://picsum.photos/id/237/40/40';
$email = $session->get('email');
$username = $session->get('username') != null ? $session->get('username') : "Not Login Yet";
$isLogin = $session->get('logged_in');
session()->set(['current_item' => $itemId]);
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/product_script.js') ?>"></script>
    <link rel="stylesheet" href=" <?php echo base_url('assets/styles.css') ?>">

    <title>Product</title>
</head>

<body style="height:300vh">

    <section>
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
                        <a class="navbar-brand roboto-condensed fs-3" href="#">MY STORE</a>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
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
                                    <li><a class="dropdown-item" href="<?= base_url('home/collections') ?>">All
                                            Collections</a></li>
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
    </section>

    <section>
        <div class="container-lg">
            <div class="row">
                <div class="col-xl-6 d-flex justify-content-center mt-5" style="overflow: hidden;">
                    <img src="<?= $itemImg ?>" alt="" class="img-fluid" width="500"
                        style="object-fit: cover; height:500px;width:1920px">
                </div>
                <div class="col-sm-6 mt-5">
                    <div>
                        <h3 class="roboto-condensed"><?= $itemName ?></h3>
                    </div>
                    <div>
                        <p class="font-rubik fs-6"><i class="fa-solid fa-star text-warning"></i> 9.9/10 (45
                            Reviews)</p>
                    </div>
                    <div>
                        <p class="font-rubik fs-5 text-dark"><i class="fa-solid fa-tag"></i>$<?= $itemPrice ?></p>
                    </div>
                    <div>
                        <p class="font-rubik fs-6 text-dark">
                            <?= $itemDesc ?>
                        </p>
                    </div>
                    <div class="pt-3 pb-3 size-list">
                        <span class="badge rounded-pill bg-dark text-light border border-1 fs-6 ps-4 pe-4 m-1">S</span>
                        <span class="badge rounded-pill bg-light text-dark border border-1 fs-6 ps-4 pe-4 m-1">M</span>
                        <span class="badge rounded-pill bg-light text-dark border border-1 fs-6 ps-4 pe-4 m-1">L</span>
                        <span class="badge rounded-pill bg-light text-dark border border-1 fs-6 ps-4 pe-4 m-1">XL</span>
                        <span
                            class="badge rounded-pill bg-light text-dark border border-1 fs-6 ps-4 pe-4 m-1">XXL</span>
                    </div>
                    <div style="height:max-content">
                        <button type="button"
                            class="btn border border-dark btn-light text-dark roboto-condensed ps-4 pe-4 fs-5"
                            id="cart-button"><i class="fa-solid fa-basket-shopping"></i> Add to
                            Cart</button>

                        <button type="button" class="btn btn-dark text-light roboto-condensed ps-4 pe-4 fs-5">Buy
                            Now</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-6 col-lg-3 pt-3">
                            <img src="https://picsum.photos/100/100" alt="" width="100%">
                        </div>

                        <div class="col-6 col-lg-3 pt-3">
                            <img src="https://picsum.photos/100/100" alt="" width="100%">
                        </div>

                        <div class="col-6 col-lg-3 pt-3">
                            <img src="https://picsum.photos/100/100" alt="" width="100%">
                        </div>

                        <div class="col-6 col-lg-3 pt-3">
                            <img src="https://picsum.photos/100/100" alt="" width="100%">
                        </div>

                    </div>
                </div>


            </div>
    </section>

    <section class="pt-3 mb-5">
        <form action="<?= base_url('/commentapi') ?>" method="POST" target="_self">
            <div class="container">
                <div class="row">
                    <div class="col-12 pb-3 roboto-condensed">
                        <p class="comment-counter">
                            <span>Comments</span>
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-2 col-md-1">
                        <img src="https://picsum.photos/200/200" alt="" width="50" height="50"
                            class="border rounded-circle thumbnail">
                    </div>
                    <div class="col-10 col-lg-5 d-flex align-items-center">
                        <div class="input-group mb-3 col-12">
                            <textarea name="comment" id="" rows="6" maxlength="255" class="form-control font-rubik"
                                placeholder="<?= $username == "Not Login Yet" ? "Login first" : "Add your comment" ?>"
                                <?= $username == "Not Login Yet" ? "Disabled" : ""; ?>></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="float-end">
                            <button type="reset" class="btn btn-light">Cancel</button>
                            <button type="submit" class="btn btn-dark submit-comment">Submit</button>
                        </div>
                    </div>

                </div>




            </div>
        </form>
    </section>

    <section class="comments-section">


        <div class="container mb-5">
            <div class="row">
                <div class="col-2 col-md-1">
                    <img src="https://picsum.photos/200/200" alt="" width="50" height="50"
                        class="border rounded-circle thumbnail">
                </div>
                <div class="col-10 col-md-5 d-flex align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <p class="font-rubik">Do you have the Yellow one?</p>

                        </div>

                        <div class="col-12 bg-light p-3 rounded-3 reply-from-seller-box">
                            <p class="roboto-condensed">Reply from seller</p>
                            <p class="font-rubik">Kamu tahu kenapa HP sekarang namanya smartphone? karena penggunanya
                                Stuppid</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </section>


    <section class="DEVELOPMENT-TEST">


        <!-- <div class="modal fade" id="replyModal" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="POST">
                            <input type="text" id="inputAdminReply" class="form-control"
                                aria-describedby="adminCommentReply" placeholder="Write your reply">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- <div class="container mb-5">
            <div class="row">
                <div class="col-2 col-md-1">
                    <img src="https://picsum.photos/200/200" alt="" width="50" height="50"
                        class="border rounded-circle thumbnail">
                </div>
                <div class="col-10 col-md-5">
                    <div class="row">
                        <div class="col-10 col-md-11">
                            <p class="font-rubik">COMMENTTEXT</p>
                        </div>

                        <div class="col-1">
                            <div class="btn-group">
                                <button type="button" class="rounded dropdown-toggle-split" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="background-color: white; border:none">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>

                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="https://youtube.com">Edit</a></li>
                                </ul>
                            </div>

                        </div>
                        <hr>

                        <div class="col-12 bg-light p-3 rounded-3 reply-from-seller-box">
                            <p class="roboto-condensed">Reply from seller</p>
                            <p class="font-rubik">Kamu tahu kenapa HP</p>
                        </div>

                    </div>

                </div>
            </div>

        </div> -->


    </section>

    <div class="position-fixed top-0 end-0 p-3 ms-3" style="z-index: 11">
        <div class="toast align-items-center " id="cart-notification" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body roboto-condensed ">
                    An item has been added to your Cart.
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>


</body>

</html>