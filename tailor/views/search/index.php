<?php
  $connection = mysqli_connect('127.0.0.1:3306','root','','tailor');

  $userModel = new \models\Users();
  $user  = $userModel->GetCurrentUser();

  $all_tovars = mysqli_query($connection, "SELECT * FROM tovars");


  if(isset($_POST['search_btn'])) {
      $search = $_POST['search'];
      $query_tovars = mysqli_query($connection, "SELECT * FROM tovars  WHERE title LIKE '%$search%'");
    } else {
      $query_tovars = mysqli_query($connection, "SELECT * FROM tovars");
    }
?>


<!--feature start -->
<section id="feature" class="feature">
    <div class="container">
        <div class="section-header">
            <h2>Результат пошуку</h2>
        </div>
        <!--/.section-header-->
        <div class="feature-content">
            <div class="row">

            <?php
              $query_tovars;
              while ($tovar = mysqli_fetch_assoc($query_tovars)){ ?>

                    <div class="col-sm-3">
                        <div class="single-feature">
                            <? if (is_file('files/tovar/' . $tovar['photo'] . '_m.jpg')) : ?>
                                <a href="/tovars/view?id=<?= $tovar['id'] ?>"><img src="/files/tovar/<?= $tovar['photo'] ?>_m.jpg" alt="feature image"></a>
                            <? else : ?>
                                <a href="/tovars/view?id=<?= $tovar['id'] ?>"><svg class="bd-placeholder-img figure-img img-fluid rounded float-start  width=" 200" height="300" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="lightgray"></rect>
                                </svg></a>
                            <? endif; ?>
                            <div class="single-feature-txt text-center">
                                <a href="/tovars/view?id=<?= $tovar['id'] ?>"><h2><?= $tovar['title'] ?></h2>
                                <h4>₴ <?= $tovar['price'] ?></h4></a>
                                <div class="button-wrapper">
                                    <? if ($tovar['user_id'] == $user['id'] || $user['access'] == 1) : ?>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <a href="/tovars/edit?id=<?= $tovar['id'] ?>" class="text-decoration-none">
                                                    <div class="media-body"><i class="fa-solid fa-pen-to-square"></i> Редагувати</div>
                                                </a>
                                                <a href="/tovars/delete?id=<?= $tovar['id'] ?>" class="text-decoration-none">
                                                    <div class="media-body"><i class="fa-solid fa-trash"></i> Видалити</div>
                                                </a>
                                            </li>
                                        </ul>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                
                    <?php }; ?>
            </div>
        </div>
        <!--/.container-->

</section>
<!--/.feature-->
<!--feature end -->