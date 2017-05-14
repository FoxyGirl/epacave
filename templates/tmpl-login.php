<main>
    <!-- Navigation -->
    <?= includeTemplate('tmpl-nav.php', ['categories' => $categories]); ?>
    <!--  -->
    <form class="form container <?= $form_validate['form_valid'] ?>"
          action="login.php" method="post" name="login_form"> <!-- form--invalid -->
        <h2>Вход</h2>
        <div class="form__item <?= $form_validate['email']['error_class']?>"> <!-- form__item--invalid -->
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail"
                   value="<?= $form_validate['email']['value']?>">
            <span class="form__error"><?= $form_validate['email']['error_message'] ?></span>
        </div>
        <div class="form__item form__item--last  <?= $form_validate['password']['error_class']?>">
            <label for="password">Пароль*</label>
            <input id="password" type="password" name="password" placeholder="Введите пароль"
                   value="<?= $form_validate['password']['value']?>">
            <span class="form__error"><?= $form_validate['password']['error_message'] ?></span>
        </div>
        <button type="submit" class="button">Войти</button>
    </form>
</main>