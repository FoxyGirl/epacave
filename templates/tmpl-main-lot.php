<main>
    <!-- Navigation -->
    <?= includeTemplate('tmpl-nav.php', ['categories' => $categories]); ?>
    <!--  -->
    <section class="lot-item container">
        <h2><?= $lots[$id_lot]['name'] ?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?= $lots[$id_lot]['url_img'] ?>" width="730" height="548" alt="<?= $lots[$id_lot]['name'] ?>">
                </div>
                <p class="lot-item__category">Категория: <span><?= $lots[$id_lot]['category'] ?></span></p>
                <p class="lot-item__description">Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
                    снег
                    мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
                    снаряд
                    отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
                    кэмбер
                    позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
                    просто
                    посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
                    равнодушным.</p>
            </div>
            <div class="lot-item__right">
                <?php if ($_SESSION['user'] && !check_lot($id_lot)): ?>
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        10:54:12
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost">11 500</span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span>12 000 р</span>
                        </div>
                    </div>
                    <form class="lot-item__form <?= $form_validate['form_valid'] ?>" action="lot.php?id=<?= $id_lot?>" method="post">
                        <p class="lot-item__form-item  <?= $form_validate['cost']['error_class'] ?>">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="cost"
                                   placeholder="<?= ($form_validate['cost']['value']) ? $form_validate['cost']['value'] : '12000' ?>">
                            <span class="form__error"><?= $form_validate['cost']['error_message'] ?></span>
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
                <?php endif; ?>
                <div class="history">
                    <h3>История ставок (<span>4</span>)</h3>
                    <!-- заполните эту таблицу данными из массива $bets-->
                    <table class="history__list">
                        <?php foreach($bets as $bet) : ?>
                            <tr class="history__item">
                                <td class="history__name"><?= $bet['name']?></td>
                                <td class="history__price"><?= $bet['price']?> р</td>
                                <td class="history__time"><?= time_format($bet['ts'])?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>