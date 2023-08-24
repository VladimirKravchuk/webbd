<?php
    $userModel = new \models\Users();
    $name = $userModel->GetCurrentUser();
?>

<!-- Navigation for all pages -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Магазин одягу.">
    <meta name="author" content="Kulik Igor">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title><?=$MainTitle ?> | TAILOR</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="/assets/css/swiper.css" rel="stylesheet">
	<link href="/assets/css/magnific-popup.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/styles.css">
	
	<!-- Favicon  -->
    <link rel="icon" href="/assets/images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top flex-column">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="http://tailor/"><img src="/assets/images/logo.png" alt="alternative"></a> 
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://tailor/#header">Головна</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://tailor/#features">Фішки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://tailor/#details">Деталі</a>
                    </li>

                    <!-- Dropdown Menu -->          
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Товари</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="http://tailor/tovars"><span class="item-text">Переглянути всі товари</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="http://tailor/tovars/add"><span class="item-text">Додати товар</span></a>
                        </div>
                    </li>
                    <!-- end of dropdown menu -->

                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://tailor/chat">Чат</a>
                    </li>
                </ul>
                <span class="nav-item">
					<? if (!$userModel->IsAuth()) : ?>
                    	<a class="btn-outline-sm" href="/users/login">Увійти</a>
						<? else : ?>
							<!-- Dropdown Menu --> 
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle page-scroll" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$name['firstname']?> <?=$name['lastname']?><? if ($name['access']==1) : ?> ★ <? endif; ?></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/users/logout"><span class="item-text">Вийти</span></a>
                                    </div>
                                </li>
                            </ul>
                    		<!-- end of dropdown menu -->
						<? endif;?>
                </span>
            </div>
        </div> <!-- end of container -->
        <div class="container justify-content-center">
            <? if(!empty($MessageText)) :?>
                <div class="p-3 mb-2 bg-light text-dark rounded"><?=$MessageText?></div>
            <? endif; ?>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
	<?=$PageContent ?>

    <!-- Scripts -->
    <script src="/assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="https://kit.fontawesome.com/21755eb32c.js" crossorigin="anonymous"></script>
    <script src="/assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="/assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="/assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="/assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="/assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="/assets/js/scripts.js"></script> <!-- Custom scripts -->
	<script src="/alien/ckeditor/ckeditor.js"></script>
		<script>
			CKEDITOR.replace('text');
		</script>
</body>
</html>