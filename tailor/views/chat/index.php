<?php
$connection = mysqli_connect('127.0.0.1:3306','root','','tailor');

$userModel = new \models\Users();
$user  = $userModel->GetCurrentUser();
  
$all_messages = mysqli_query($connection, "SELECT * FROM chat");
  
function actionAdd($connection) {
    //Создаем переменные со значениями, которые были получены с $_POST
    $message = $_POST['message'];
    $datetime = date('Y-m-d H:i:s');
    $userModel = new \models\Users();
    $user  = $userModel->GetCurrentUser();
    $user_id = $user['id'];

    //Делаем запрос на добавление новой строки в таблицу
    mysqli_query($connection, "INSERT INTO `chat` (`id`, `message`, `datetime`, `user_id`) VALUES (NULL, '$message', '$datetime', '$user_id')");
    //Переадресация на страницу чата
    header('Location: /chat');
  }

?>
  <!-- Template Main CSS Files -->
  <link href="/assets/css/main.css" rel="stylesheet">

  
<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Чат</h1>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->

<div style="background-color: #f2f2f2; min-height: 1100px;" class="d-flex flex-column">
  <div class="container" data-aos="fade-up">
  <section class="mt-5 pt-2">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">

        <section style="background-color: #f2f2f2;">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-12">
            <div class="card text-black">
            <div class="card-body">
                <div class="col-md-12 divScroll">

                    <nav id="navbar3" class="navbar3">
                    <form method="post" action="">
                      <?php 
                        $all_messages;
                        while ($message = mysqli_fetch_assoc($all_messages)){
                            $id_user  = $userModel->GetUserById($message['user_id']);?>
                            
                              <div class="d-flex flex-row align-items-center">
                                <ul style="list-style: none">
                                    <li><b><?=$id_user['firstname'];?> <?=$id_user['lastname']?>: </b><span><?=$message['message']?></span></a></li>   
                                <ul>
                              </div>
                        <? 
                          };
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
          <h5 class="comment-title">Залишити коментар:</h5>
          <div class="row">
            <div class="card-body">
              <form method="post" action="">
                <div class="col-12 mb-3">
                  <textarea type="text" name="message" value="Напишіть коментар" id="message" class="form-control" id="comment-message" placeholder="Введіть ваш коментар" required></textarea>
                </div>
                <div class="col-12 text-center col-lg-12"> 
                    <input type="submit" name="submitt" class="form-control-submit-button" value="Викласти коментар">
                </div>
                <?php
                if($_POST['submitt'] == true){
                  actionAdd($connection);
                }
                ?>
              </form>
            </div>
          </div>
          <!-- </div> -->
        </div><!-- End Comments Form -->

      <? } else {?>
        <div class="row justify-content-center mt-2">
          <div class="col-lg-12 mt-3">
            <h5 class="comment-title">Щоб залишити повідомлення, авторизуйтесь...</h5>
          </div>
        </div>
      <? }?>
    </div>
  </section>
  </div>
  </div>