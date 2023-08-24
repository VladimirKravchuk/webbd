<!-- Register page -->

    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Реєстрація</h1>
                    <p>Заповни форму, щоб зареєструватись на tailor. Вже є аккаунт? Тоді ти можеш просто <a class="white" href="http://tailor/users/login">Увійти</a></p> 
                    <!-- Sign Up Form -->
                    <div class="form-container">
                        <form method="post" action="">
                            <div class="form-group">
                                <input class="form-control-input" type="text" name="firstname" id="firstname" required />
                                <label class="label-control" for="firstname">Ім'я</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control-input" type="text" name="lastname" id="lastname" required />
                                <label class="label-control" for="lastname">Фамілія</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control-input" type="adress" name="adress" id="adress" required />
                                <label class="label-control" for="adress">Адреса</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control-input" type="email" name="login" id="exampleInputEmail1" required />
                                <label class="label-control" for="exampleInputEmail1">Пошта</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control-input" id="password1" required />
                                <label class="label-control" for="password1">Пароль</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password2" class="form-control-input" id="password2" required />
                                <label class="label-control" for="password2">Повторіть пароль</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" id="sterms" value="Agreed-to-Terms" required>Я згодний/на з tailor's <a href="privacy-policy.html">Політика конфеденційності</a> й <a href="terms-conditions.html">Умови</a>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">ЗАРЕЄСТРУВАТИСЬ</button>
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