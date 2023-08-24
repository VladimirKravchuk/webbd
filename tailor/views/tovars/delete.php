<header id="header" class="ex-2-header">
    <div id="pricing" class="cards-2" style="padding-top:0rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading text-white">Підтвердження</div>
                    <h2 class="h2-heading text-white">Ви дійсно бажаєте видалити <b><?=$model['title'] ?></b>?</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="/tovars/delete?id=<?=$model['id']?>&confirm=yes">ВИДАЛИТИ</a>
                                <div class="divider"></div>
                                <a class="btn-solid-reg page-scroll" href="/tovars/">ВІДМІНИТИ</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
</header>
<!-- end of pricing -->