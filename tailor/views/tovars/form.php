
</div>
    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <h1>Заповнення товару</h1>
                   <p>Додай інформацію щодо свого товару</p> 
                    <!-- Form -->
                    <div class="form-container" style="max-width: 52rem;">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label" for="title">Заголовок:</label>
                                <input type="text" name="title" value="<?=$model['title']?>" class="form-control-input" id="title" required/>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Короткий опис:</label>
                                <textarea type="text" name="description" class="form-control-textarea" id="description" required /><?=$model['description']?></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="price">Ціна:</label>
                                <input type="number" name="price" value="<?=$model['price']?>" class="form-control-input" id="price" required/>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="file">Фотографія:</label>
                                <input type="file" name="file" id="file" class="form-control" accept="image/jpeg, image/png">
                            </div>
                            <div class="form-group">
                                <? if (is_file('files/tovar/'.$model['photo'].'_s.jpg')) : ?>
                                <label for="text" class="form-label">Поточна фотографія:</label>
                                <div><img src="/files/tovar/<?=$model['photo'] ?>_s.jpg" /></div>
                                <? endif; ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">ЗБЕРЕГТИ</button>
                            </div>
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        <div style="height: 30px;"></div>
    </header> <!-- end of ex-header -->

    <!-- end of header -->