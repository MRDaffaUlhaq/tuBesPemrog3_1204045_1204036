<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style-auth.css">

</head>

<body>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Error! <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div id="back">
        <div class="backRight"></div>
        <div class="backLeft"></div>
    </div>

    <div id="slideBox">
        <div class="topLayer">
            <div class="left">
                <div class="content">
                    <h2 class="title-sign-up">Sign Up</h2>
                    <form method="post" onsubmit="return false;">
                        <div class="form-group">
                            <input type="text" placeholder="Username" />
                            <input type="password" placeholder="Password" />
                            <input type="email" placeholder="email" />
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                    </form>
                    <button id="goLeft" class="off-login">Login</button>
                    <button class="btn-sign-up">Sign up</button>


                </div>
            </div>
            <div class="right">
                <div class="content">
                    <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                        <h2 class="title-login">Login</h2>
                        <?php
                        //create form
                        $attributes = array('method' => "post", "autocomplete" => "off");
                        echo form_open('', $attributes);
                        ?>
                        <div class="form-group">
                            <input name="username" type="text" placeholder="Username" required />
                            <input name="password" type="password" placeholder="Password" required />
                        </div>
                        <button id="goRight" class="off-sign-up">Sign Up</button>

                        <button type="submit" class="btn-login text-decoration-none" id="login" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="<?= base_url(); ?>assets/js/script-auth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>