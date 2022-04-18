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
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v13.0&appId=357242339747863&autoLogAppEvents=1"
        nonce="CndJOdbp"></script>


    <link rel="stylesheet" href=" <?php echo base_url('assets/styles.css') ?>">
    <title>Document</title>
</head>



<body>

    <section style="height: 100vh;" class="d-flex justify-content-center align-items-center bg-light ">
        <div class="col-xl-3">

            <div class="row">

                <div class="col-xl-6 border-4 rounded-3 bg-dark" style="background-color: #FDFFFC; min-width: 335px;"
                    id="login-form-div">
                    <form class="m-3 " method="post" action="<?php echo base_url('/useraccountapi/create') ?>"
                        id="register-form-div">
                        <div class="mb-3">
                            <h1 class="text-light text-center roboto-condensed">REGISTER</h1>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control font-rubik" id="exampleInputEmail1"
                                aria-describedby="emailHelp" autocomplete="off" placeholder="Username" name="username">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control font-rubik" id="exampleInputEmail1"
                                aria-describedby="emailHelp" autocomplete="off" placeholder="First Name"
                                name="first_name">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control font-rubik" id="exampleInputEmail1"
                                aria-describedby="emailHelp" autocomplete="off" placeholder="Last Name"
                                name="last_name">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email"
                                name="email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password" name="password">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Repeat Password" name="password-confirm">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input text-dark" id="exampleCheck1">
                            <label class="form-check-label text-light" for="exampleCheck1">I agree with my Store privacy
                                policy</label>
                        </div>
                        <button type="submit" class="btn btn-info text-light col-12 mb-3 roboto-condensed fs-5">Sign
                            Up</button>
                        <p class="text-light">I have an account, i want to <a class="text-primary"
                                id="want-to-sign-in">Sign In</a></p>

                        <hr>

                    </form>






                </div>
            </div>


        </div>
    </section>






</body>

</html>