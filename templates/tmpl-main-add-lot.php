<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Разное</a>
            </li>
        </ul>
    </nav>
    <form class="form form--add-lot container <?= $form_validate['form_valid'] ?>" action="add.php" method="post"> <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item  <?= $form_validate['lot-name']['error_class']?>"> <!-- form__item--invalid -->
                <label for="lot-name">Наименование</label>
                <input id="lot-name" type="text" name="lot-name"
                       placeholder="Введите наименование лота" value="<?= $form_validate['lot-name']['value']?>">
                <span class="form__error"><?= $form_validate['lot-name']['error_message'] ?></span>
            </div>
            <div class="form__item  <?= $form_validate['category']['error_class']?>">
                <label for="category">Категория</label>
                <select id="category" name="category" >
                    <option  <?php if ($form_validate['category']['value'] == 'Выберите категорию')
                    {print('selected');}?> >Выберите категорию</option>
                    <?php foreach($equipment_types as $item): ?>
                        <option <?php if ($form_validate['category']['value'] == $item)
                        {print('selected');}?> > <?= $item ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form__error"><?= $form_validate['category']['error_message'] ?></span>
            </div>
        </div>
        <div class="form__item form__item--wide  <?= $form_validate['message']['error_class']?>">
            <label for="message">Описание</label>
            <textarea id="message" name="message" placeholder="Напишите описание лота"><?= $form_validate['message']['value']?></textarea>
            <span class="form__error"><?= $form_validate['message']['error_message'] ?></span>
        </div>
        <div class="form__item form__item--file  <?= $form_validate['photo2']['error_class']?>"> <!-- form__item--uploaded -->
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" name="photo2"
                       value="<?= $form_validate['photo2']['value']?>">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small  <?= $form_validate['lot-rate']['error_class']?>">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="" name="lot-rate" placeholder="0"
                       value="<?= $form_validate['lot-rate']['value']?>">
                <span class="form__error"><?= $form_validate['lot-rate']['error_message'] ?></span>
            </div>
            <div class="form__item form__item--small  <?= $form_validate['lot-step']['error_class']?>">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="" name="lot-step" placeholder="0"
                       value="<?= $form_validate['lot-step']['value']?>">
                <span class="form__error"><?= $form_validate['lot-step']['error_message'] ?></span>
            </div>
            <div class="form__item  <?= $form_validate['lot-date']['error_class']?>">
                <label for="lot-date">Дата заверщения</label>
                <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="20.05.2017"
                       value="<?= $form_validate['lot-date']['value']?>">
                <span class="form__error"><?= $form_validate['lot-rate']['error_message'] ?></span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
<!--
<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Разное</a>
            </li>
        </ul>
    </nav>
    <form class="form form--add-lot container" action="http://epacave/add.php" method="post">
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item">
                <label for="lot-name">Наименование</label>
                <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required>
                <span class="form__error"></span>
            </div>
            <div class="form__item">
                <label for="category">Категория</label>
                <select id="category" name="category" required>
                    <option>Выберите категорию</option>
                    <option>Доски и лыжи</option>
                    <option>Крепления</option>
                    <option>Ботинки</option>
                    <option>Одежда</option>
                    <option>Инструменты</option>
                    <option>Разное</option>
                </select>
                <span class="form__error"></span>
            </div>
        </div>
        <div class="form__item form__item--wide">
            <label for="message">Описание</label>
            <textarea id="message" name="message" placeholder="Напишите описание лота" required></textarea>
            <span class="form__error"></span>
        </div>
        <div class="form__item form__item--file">
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
                <span class="form__error"></span>
            </div>
            <div class="form__item form__item--small">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
                <span class="form__error"></span>
            </div>
            <div class="form__item">
                <label for="lot-date">Дата заверщения</label>
                <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="20.05.2017" required>
                <span class="form__error"></span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
-->