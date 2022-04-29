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
                                <a class="list-group-item text-decoration-none" href="<?= base_url('/home/logout') ?>">
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