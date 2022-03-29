<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>สวพส. สถาบันวิจัยและพัฒนาพื้นที่สูง (องค์การมหาชน)</title>


  <!-- Template CSS -->
  <?= link_tag('public/assets/css/style.css') ?>
  <?= link_tag('public/assets/css/components.css') ?>
  <?= link_tag('public/assets/css/custom.css') ?>


</head>

<body class="bg-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                              <br><br>
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?php echo base_url('/public/img/logohrdi.png')?>"><br>
                                        <h6 class="h6 text-gray-900 mb-2 mt-2" style="line-height: 0.7">สวพส. สถาบันวิจัยและพัฒนาพื้นที่สูง </h6>
                                        <h6 class="h6 text-gray-900 mb-2 mt-2" style="line-height: 0.7">(องค์การมหาชน)</h6>
                                    </div>
                                    <form class="user" action="<?php echo base_url('/login/auth'); ?>" method="post">
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control form-control-user <?php if (!empty(@$session->getFlashdata('error'))): ?>
                                              <?php echo 'border-danger'; ?>
                                            <?php endif; ?>" id="user_name" name="user_name" value="<?= old('user_name');?>"  aria-describedby="" placeholder="Username">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="password" id="password" name="password" value="<?= old('password');?>" class="form-control form-control-user <?php if (!empty(@$session->getFlashdata('error'))): ?>
                                              <?php echo 'border-danger'; ?>
                                            <?php endif; ?>" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-orange btn-block">
                                            เข้าสู่ระบบ
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <!-- JS Libraies -->
   

   <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <?= script_tag('public/assets/js/stisla.js') ?>
  <?= script_tag('public/assets/js/scripts.js') ?>
  <?= script_tag('public/assets/js/custom.js') ?>

</body>

</html>
