<main class="main">
    <section class="offer main__section-page __left-container">
        <div class="offer__text">
            <h1>Відправляйся в подорож з нами</h1>
            <p class="offer__description">З нашою платформою кожен маршрут – пригода</p>
            <div class="offer__btns">
                <a href="" class="offer__btn">Для фізичних осіб</a>
                <a href="" class="offer__btn">Для підприємців</a>
            </div>
        </div>
        <div class="offer__image"></div>
    </section>

    <section class="service __container main__section">
        <h3>Наші послуги</h3>
        <p class="main__subheadline">Ми пропонуємо вам не просто послуги, а найвищий ступінь задоволення ваших
            очікувань</p>

        <div class="service__content">
            <div class="service__block">
                <p class="service__icon __icon-cargo_add"></p>
                <p class="service__headline">Новий вантаж</p>
                <p class="service__description">Маєте власний вантаж але не знаете чим його перевезти? Просто
                    додайте вантаж та очікуйте на відповід</p>
                <a href="/cargo/create" class="service__btn">Додати вантаж</a>
            </div>

            <div class="service__block">
                <p class="service__icon __icon-cargos"></p>
                <p class="service__headline">Біржа вантажів</p>
                <p class="service__description">Маєте власний транспорт але не знаете де знайти вантаж? Наша
                    біржа допоможе вам з цим питанням</p>
                <a href="/cargos" class="service__btn">Біржа вантажів</a>
            </div>

            <div class="service__block">
                <p class="service__icon __icon-car_add"></p>
                <p class="service__headline">Новий транспорт</p>
                <p class="service__description">Хочете здавати транспорт в аренду? Просто додайте його на нашу
                    платформу та очікуйте клієнтів</p>
                <a href="/car/create" class="service__btn">Додати транспорт</a>
            </div>

            <div class="service__block">
                <p class="service__icon __icon-cars"></p>
                <p class="service__headline">Біржа транспорту</p>
                <p class="service__description">Хочете знайти транспорт в аренду? Наша транспортна біржа
                    допоможе з цим питанням</p>
                <a href="/cars" class="service__btn">Біржа транспорту</a>
            </div>

        </div>


    </section>

    <section class="main__section __container">
        <h3>Для кого підходить</h3>
        <p class="main__subheadline">Наша платформа - це універсальний інструмент для всіх, хто цінує зручність
            та ефективність</p>

        <div class="about">
            <div class="about__block">
                <div class="about__block-text">
                    <p class="about__headline">Водіям</p>
                    <p class="about__description">Забезпечує швидкий пошук та додаткові можливості для водіїв у
                        логістичній сфері перевезень</p>
                </div>
            </div>

            <div class="about__block">
                <div class="about__block-text">
                    <p class="about__headline">Фізичним особам</p>
                    <p class="about__description">Спрощує організацію перевезень, дозволяючи швидко знаходити
                        вантаж або транспорт</p>
                </div>
            </div>

            <div class="about__block">
                <div class="about__block-text">
                    <p class="about__headline">Підприємствам</p>
                    <p class="about__description">Сприяє ефективному управлінню логістикою, знаходить швидкі та
                        вигідні перевезення або транспорт</p>
                </div>
            </div>
        </div>
    </section>

    <section class="main__section __container reviews">
        <div class="reviews__head">
            <div class="reviews__head-text">
                <h3>Відгуки про платформу</h3>
                <p class="main__subheadline">Відгуки про користувача – це не просто слова, а реальні враження та
                    досвід
                </p>
            </div>

            <div class="reviews__arrows">
                <p class="reviews__arrow __icon-left_arr __prev"></p>
                <p class="reviews__arrow __icon-right_arr __next"></p>
            </div>
        </div>

        <div class="reviews__slider">
            <div class="reviews__track">

                <?php
                    foreach($comments as $comment) {
                ?>

                <div class="reviews__block">
                    <div class="reviews__block-head">
                        <img src="/public/user_image/<?=$comment['image']?>" class="reviews__image">
                        <div class="reviews__stars">
                            <?php
                            for($i = 0; $i < 5; $i++) {
                                $class = ($i < $comment['rating']) ? 'reviews__star reviews__star--active __icon-star' : 'reviews__star __icon-star';
                                echo "<p class='$class'></p>";
                            }
                        ?>
                        </div>
                    </div>
                    <p class="reviews__headline"><?=$comment['last_name']?> <?=$comment['user_name']?>
                        <?=$comment['middle_name']?></p>
                    <p class="reviews__description"><?=$comment['type']?></p>
                    <p class="reviews__review"><?=$comment['description']?></p>
                </div>

                <?php
                    }
                ?>

            </div>
        </div>
    </section>
</main>