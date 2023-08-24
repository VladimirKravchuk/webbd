<?php
  $connection = mysqli_connect('127.0.0.1:3306','root','','tailor');

  $userModel = new \models\Users();
  $user  = $userModel->GetCurrentUser();
  $all_messages = mysqli_query($connection, "SELECT * FROM comments");

	function actionAdd($post_id, $connection)
	{
    //Создаем переменные со значениями, которые были получены с $_POST
    $message = $_POST['message'];
    $datetime = date('Y-m-d H:i:s');
    $userModel = new \models\Users();
    $user  = $userModel->GetCurrentUser();
    $post_id;
    $user_id = $user['id'];

    //Делаем запрос на добавление новой строки в таблицу
    mysqli_query($connection, "INSERT INTO `comments` (`id`, `message`, `datetime`, `post_id`, `user_id`) VALUES (NULL, '$message', '$datetime', '$post_id', '$user_id')");

    //Переадресация на страницу
    @header("Location: ". $_SERVER["REQUEST_URI"]); // редирект
    exit(); // если нужно прервать скрипт
  }
?>

<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $model['title'] ?></h1>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->

<div id="features" class="tabs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabs Content -->
                <div class="tab-content" id="argoTabsContent">

                    <!-- Tab -->
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="image-container">
                                  <img class="image" src="/files/tovar/<?= $model['photo'] ?>_b.jpg" />
                                </div> <!-- end of image-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="text-container">
                                    <h3><?= $model['title'] ?></h3>
                                    <p>Опис товару: <?= $model['description'] ?></p>
                                    <p><?=$model['text']?></p>
                                    <a class="btn-solid-reg page-scroll" href="/tovars/">Назад</a>
                                    <script src="https://pay.fondy.eu/static_common/v1/checkout/ipsp.js"></script>
                                    <script>
                                        var button = $ipsp.get('button');
                                        button.setMerchantId( 1396424);
                                        button.setAmount(<?= $model['price'] ?>, 'UAH', true);
                                        button.setHost('pay.fondy.eu');
                                    </script>
                                    <button class="btn-solid-reg popup-with-move-anim" onclick="location.href=button.getUrl()">Придбати</button>                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->
                </div> <!-- end of tab content -->
                <!-- end of tabs content -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of tabs -->
<!-- end of features -->

<div style="background-color: #f2f2f2; min-height: 600px;" class="d-flex flex-column">
  <div class="container" data-aos="fade-up">
  <section class="mt-5 pt-5">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">

        <section style="background-color: #f2f2f2;">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-12">
            <div class="card text-black">
            <div class="card-body">
                <div class="col-md-12 divScroll">

                    <nav id="navbar3" class="navbar3">
                    <h5>Відгуки про товар:</h5>
                    <form method="post" action="">
                        <?php 
                        $all_messages;
                        $count = 0;
                        while ($message = mysqli_fetch_assoc($all_messages)){
                            if($model['id'] == $message['post_id']){
                                $count += 1;
                                $id_user  = $userModel->GetUserById($message['user_id']);?>
                            
                        <div class="d-flex flex-row align-items-center">
                            <ul style="list-style: none">
                                <li><b><?=$id_user['firstname'];?> <?=$id_user['lastname']?>: </b><span><?=$message['message']?></span></a></li>   
                            <ul>
                        </div>

                        <?
                            };
                          };

                        if($count==0) :
                        ?>
                        <div class="d-flex flex-row align-items-center">
                            <ul style="list-style: none">
                                <li>Відгуків немає</li>   
                            <ul>
                        </div>
                        <?
                        endif;
                        ?>
                  </form>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

      <?
      if ($userModel->IsAuth()){ ?>
      <!-- ======= Comments Form ======= -->
      <div class="row justify-content-center">
        <div class="col-lg-12 mt-5">
          <div class="row">
            <div class="card-body">
              <h5 class="comment-title">Залишити відгук:</h5>
              <form method="post" action="">
                <div class="col-12 mb-3">
                  <textarea type="text" name="message" value="Напишіть відгук" id="message" class="form-control" id="comment-message" placeholder="Введіть ваш коментар" required></textarea>
                </div>
                <div class="col-12 text-center col-lg-12"> 
                    <input type="submit" name="submitt" class="form-control-submit-button" value="Викласти">
                </div>
                <?php
                $post_id = $model['id'];
                if($_POST['submitt'] == true){
                  actionAdd($post_id, $connection);
                }
                ?>
              </form>
            </div>
          </div>
          <!-- </div> -->
        </div><!-- End Comments Form -->

      <? } else {?>
        <div class="row justify-content-center mt-2">
          <div class="col-lg-12">
            <h5 class="comment-title">Щоб залишити відгук, авторизуйтесь...</h5>
          </div>
        </div>
      <? }?>
    </div>
  </section>
  </div>
  </div>