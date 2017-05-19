<main>
    <!-- Navigation -->
    <?= includeTemplate('tmpl-nav.php', ['categories' => $categories]); ?>
    <!--  -->
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">
            <?php foreach ($my_bets as $lot_id => $my_bet): ?>
            <tr class="rates__item">
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="../<?= $lots[$lot_id]['url_img'] ?>" width="54" height="40" alt="Сноуборд">
                    </div>
                    <h3 class="rates__title"><a href="<?= 'lot.php?id=' . $lot_id ?>"><?= $lots[$lot_id]['name'] ?></a></h3>
                </td>
                <td class="rates__category">
                    <?= $lots[$lot_id]['category'] ?>
                </td>
                <td class="rates__timer">
                    <div class="timer timer--finishing">07:13:34</div>
                </td>
                <td class="rates__price">
                    <?= $my_bet['bet'] ?> р
                </td>
                <td class="rates__time">
                    <?= time_format($my_bet['time']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>