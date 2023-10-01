<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:guest-login.php");
} else {
    if ($_SESSION['admin'] == 0) {
        header("Location:guest-login.php");
    }

    require_once '../../admin/include/autoloadAdmin.php';

    $id = $_SESSION['id'];



?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <style>
        .foo {
            display: flex;
            justify-content: end;
            margin-top: 50px;
        }
    </style>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>affectStudent</title>

        <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
        <meta name="robots" content="noindex">

        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&display=swap" rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css" href="assets/css/material-icons.css" rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css" href="assets/css/fontawesome.css" rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css" href="assets/vendor/spinkit.css" rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css" href="assets/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Boxiocns CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>


    <body>

        <?php include("sidebar.php"); ?>
        <section class="home-section" style="overflow: auto; padding-bottom: 150px;">
            <div class="home-content" style="overflow: auto;">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">Edit Account</li>
                    </ol>
                    <form id="profil-form" class="form-horizontal">

                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <h1 class="h2">Edit Account</h1>

                                <div class="card">
                                    <ul class="nav nav-tabs nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#first" data-toggle="tab">Account</a>
                                        </li>

                                    </ul>
                                    <?php $admin =  new Admin();
                                    $ad = $admin->getAdmin($_SESSION['id']); ?>
                                    <div class="tab-content card-body">
                                        <div class="tab-pane active" id="first">
                                            <div class="form-group row">
                                                <label for="avatar" class="col-sm-3 col-form-label form-label">Avatar</label>
                                                <div class="col-sm-9">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <!-- <div class="icon-block rounded">
                                                                <i class="material-icons text-muted-light md-36">photo</i>
                                                            </div> -->
                                                            <img class="icon-block rounded" src="<?php
                                                                                                    if (file_exists("../../admin/include/upload/" . $id . ".png")) {
                                                                                                        echo "../../admin/include/upload/" . $id . ".png";
                                                                                                    } else if (file_exists("../../admin/include/upload/" . $id . ".jpeg")) {
                                                                                                        echo "../../admin/include/upload/" . $id . ".jpeg";
                                                                                                    } else if (file_exists("../../admin/include/upload/" . $id . ".jpg")) {
                                                                                                        echo "../../admin/include/upload/" . $id . ".jpg";
                                                                                                    } else {
                                                                                                        echo "../../admin/include/upload/template.png";
                                                                                                    }

                                                                                                    ?>">
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="custom-file" style="width: auto;">
                                                                <input type="file" name="avatar" id="photo" class="custom-file-input">
                                                                <label for="photo" class="custom-file-label">Choose file</label>
                                                            </div>
                                                            <p class="error" id="photoError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label form-label">Full Name</label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input name="prenom" id="name" type="text" class="form-control" placeholder="First Name" value="<?php echo $ad['prenom']; ?>">
                                                            <p class="error" id="prenomError"></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="nom" type="text" class="form-control" placeholder="Last Name" value="<?php echo $ad['nom']; ?>">
                                                            <p class="error" id="nomError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="material-icons md-18 text-muted">mail</i>
                                                            </div>
                                                        </div>
                                                        <input name="email" type="email" id="email" class="form-control" placeholder="Email Address" value="<?php echo $ad['email']; ?>">
                                                    </div>
                                                    <p class="error" id="emailError"></p>

                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-3 col-form-label form-label">Phone number</label>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="material-icons md-18 text-muted">phone</i>
                                                            </div>
                                                        </div>
                                                        <input name="tel" type="text" id="phone" class="form-control" placeholder="phone number" value="<?php echo $ad['telephone'];  ?>">
                                                    </div>
                                                    <p class="error" id="telError"></p>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cin" class="col-sm-3 col-form-label form-label">CIN</label>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="material-icons md-18 text-muted">assignment</i>
                                                            </div>
                                                        </div>
                                                        <input name="cin" type="text" id="cin" class="form-control" placeholder="cin" value="<?php echo $ad['cin'];  ?>">
                                                    </div>
                                                    <p class="error" id="cinError"></p>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label form-label">Change Password</label>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="material-icons md-18 text-muted">lock</i>
                                                            </div>
                                                        </div>
                                                        <input name="pw" type="password" id="password" class="form-control" placeholder="Enter password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label form-label"></label>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="material-icons md-18 text-muted">lock</i>
                                                            </div>
                                                        </div>
                                                        <input name="pwVerif" type="password" id="password" class="form-control" placeholder="Confirmation password">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group row" style="margin-top: 20px;">
                                            <div class="col-sm-8 offset-sm-3">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <input id="save" type="submit" value="Save Changes" class="btn btn-success">
                                                    </div>
                                                    <!-- <div class="media-body pl-1">
                                              <div class="custom-control custom-checkbox">
                                                <input id="subscribe"
                                                       type="checkbox"
                                                       class="custom-control-input"
                                                       checked>
                                                <label for="subscribe"
                                                       class="custom-control-label">Subscribe to Newsletter</label>
                                              </div>
                                              </div> -->
                                                </div>
                                            </div>

                                        </div>
                                        <p id="success" class="error"></p>

                                    </div>


                                </div>
                        </section>
                    </form>

                </div>

            </div>
        </section>

        <script src="assets/js/script.js"></script>
        <script src="assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/vendor/popper.min.js"></script>
        <script src="assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- MDK -->
        <script src="assets/vendor/dom-factory.js"></script>
        <script src="assets/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="assets/js/app.js"></script>

        <!-- Highlight.js -->
        <script src="assets/js/hljs.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="assets/js/app-settings.js"></script>
        <script src="assets/js/profil.js"></script>

    </body>

    </html>
<?php } ?>