<?php
    $userModel = new \models\Users();
    $user  = $userModel->GetCurrentUser();
?>

<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Товари</h1>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
    <!-- end of header -->

<!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                <?php foreach($lastTovar as $tovar) : ?>
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                        
                            <? if (is_file('files/tovar/'.$tovar['photo'].'_m.jpg')) : ?>
                                <img src="/files/tovar/<?=$tovar['photo'] ?>_m.jpg" class="d-block mx-lg-auto img-fluid" loading="lazy"/>
                            <? else: ?>
                                <svg class="bd-placeholder-img figure-img img-fluid rounded float-start"  width="200" height="300" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="lightgray"></rect></svg>
                            <? endif; ?>
                            <div class="card-title"><?=$tovar['title'] ?></div>
                            <div class="frequency"><?=$tovar['description'] ?></div>
                            <div class="price"><span class="currency">₴</span><span class="value"><?=$tovar['price'] ?></span></div>
                            <div class="divider"></div>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="/tovars/view?id=<?=$tovar['id'] ?>">Переглянути</a>
                                <? if($tovar['user_id'] == $user['id'] || $user['access'] == 1):?>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <a href="/tovars/edit?id=<?=$tovar['id'] ?>" class="text-decoration-none">
                                            <div class="media-body"><i class="fas fa-edit"></i> Редагувати</div>
                                        </a>
                                        <a href="/tovars/delete?id=<?=$tovar['id'] ?>" class="text-decoration-none">
                                            <div class="media-body"><i class="fas fa-times"></i> Видалити</div>
                                        </a>
                                    </li>
                                </ul>
                            <? endif; ?>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <?php endforeach; ?>
                    <!-- end of card -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->