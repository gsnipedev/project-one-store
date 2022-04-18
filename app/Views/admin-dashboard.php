<!DOCTYPE html>
<html lang="en">

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
    <script src="<?php echo base_url('assets/admin-script.js') ?>"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v13.0&appId=357242339747863&autoLogAppEvents=1"
        nonce="CndJOdbp"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href=" <?php echo base_url('assets/styles.css') ?>">
    <title>Document</title>
</head>

<body>


    <section>
        <div class="container-fluid">
            <div class="row" style="height: 100vh;">
                <div class="col-xl-2 bg-dark text-light">
                    <div class="mb-3 mt-3 text-center roboto-condensed fs-3">
                        My Store
                    </div>
                    <hr>
                    <div class="roboto-condensed">
                        <div class="nav flex-column nav-pills me-3 col-12" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-dashboard" type="button" role="tab"
                                aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                            <button class="nav-link" id="v-pills-items-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-items" type="button" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Items</button>
                            <button class="nav-link" id="v-pills-payments-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-payments" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">Payments</button>
                            <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-orders" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">Orders</button>
                            <button class="nav-link" id="v-pills-status-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-status" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="false">Status</button>
                        </div>



                    </div>
                </div>
                <div class="col-xl-10 position-relative bg-light">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active roboto-condensed" id="v-pills-dashboard" role="tabpanel"
                            aria-labelledby="v-pills-dashboard-tab">
                            <h1>FIRST ITEM</h1>


                        </div>
                        <div class="tab-pane fade" id="v-pills-items" role="tabpanel"
                            aria-labelledby="v-pills-items-tab">

                            <div class="position-absolute bottom-0 end-0 mb-3 me-3 float">
                                <button type="button" class="btn btn-primary fs-3 roboto-condensed"
                                    data-bs-toggle="modal" data-bs-target="#addItemModal">
                                    <i class="fa-solid fa-plus"></i>
                                    New
                                </button>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-9 font-rubik">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light"><i class="fa-solid fa-filter"></i>
                                            Filter</button>
                                        <button type="button"
                                            class="btn btn-light dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" id="filter-by-id">By Id</a></li>
                                            <li><a class="dropdown-item" href="#" id="filter-by-price">By Price</a></li>
                                            <li><a class="dropdown-item" href="#" id="filter-stock">Category</a></li>
                                            <li><a class="dropdown-item" href="#" id="filter-stock">Stock</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Reset</a></li>
                                        </ul>
                                    </div>
                                    <span class="badge rounded-pill bg-secondary">filter badge
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </span>

                                </div>
                                <div class="col-xl-3">
                                    <div class="input-group mb-3">
                                        <input type="text" id="admin-search-input" class="form-control"
                                            placeholder="Something" aria-label="Recipient's username"
                                            aria-describedby="button-addon2">
                                        <button class="btn btn-outline-dark" type="button"
                                            id="admin-search">Search</button>
                                    </div>

                                </div>

                            </div>
                            <div class="overflow-scroll" style="height: 80vh;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Collections</th>
                                            <th scope="col">Likes</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="admin-items-list">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>



                        </div>
                        <div class="tab-pane fade" id="v-pills-payments" role="tabpanel"
                            aria-labelledby="v-pills-payments-tab">.3.</div>
                        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel"
                            aria-labelledby="v-pills-orders-tab">4</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="updateItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Item's detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?php echo base_url('/itemsapi') ?>">
                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Item Name" name="item_name">
                        </div>

                        <div class="mb-3">

                            <select id="disabledSelect" class="form-select adminCategorySelect" name="category_id">


                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Size" name="size">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Stock" name="stock">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">$</span>
                            <input type="text" class="form-control" placeholder="Price" name="price">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Image URL" name="item_image">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add
                            Item</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>



</body>

</html>