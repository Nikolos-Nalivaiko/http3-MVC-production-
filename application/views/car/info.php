<main class="main">
    <section class="car main__section-page __container">
        <div class="info__header">
            <div class="info__name-wrap">
                <h2 class="info__name"><?=$car['brand']?> <?=$car['model']?> <?=$car['year']?></h2>
                <div class="info__descript-wrap">
                    <p class="info__price"><?=$car['price']?>₴</p>
                    <p class="info__subprice">Ціна за добу</p>
                </div>
            </div>

            <div class="info__marks">
                <?php
                    if($car['premium_status'] == 'Premium') {
                        echo '<p class="info__mark-icon __icon-license-car" title="Преміум транспорт"></p>';
                    }
                ?>
            </div>
        </div>

        <div class="car__slider">
            <div class="car__slider-track">
                <?php
                    foreach($car['images'] as $image) {
                        echo "<img src='/public/car_images/$image' class='car__slider-item'>";
                    }
                ?>
            </div>
        </div>

        <div class="car__subslider">
            <div class="car__subslider-point">
                <p class="car__subslider-icon __icon-map"></p>
                <div class="car__subslider-text">
                    <p class="car__subslider-title"><?=$car['city']?></p>
                    <p class="car__subslider-subtitle"><?=$car['region']?></p>
                </div>
            </div>

            <div class="car__control">
                <p class="car__control-text"><span id="car__slider-counter"></span></p>
                <div class="car__control-arrows">
                    <p class="car__control-icon __icon-left_arr __prev"></p>
                    <p class="car__control-icon __icon-right_arr __next"></p>
                </div>
            </div>
        </div>

        <div class="car__info">
            <p class="car__info-headline">Технічні характеристики</p>
            <div class="car__info-list">
                <div class="car__info-item">
                    <p class="car__info-icon __icon-wheel-mode"></p>
                    <div class="car__info-text">
                        <p class="car__info-title"><?=$car['wheel_mode']?></p>
                        <p class="car__info-subtitle">Привід</p>
                    </div>
                </div>

                <div class="car__info-item">
                    <p class="car__info-icon __icon-type-body"></p>
                    <div class="car__info-text">
                        <p class="car__info-title"><?=$car['body']?></p>
                        <p class="car__info-subtitle">Тип кузову</p>
                    </div>
                </div>

                <div class="car__info-item">
                    <p class="car__info-icon __icon-engine"></p>
                    <div class="car__info-text">
                        <p class="car__info-title"><?=$car['engine_capacity']?> л.</p>
                        <p class="car__info-subtitle">Об’єм двигуна</p>
                    </div>
                </div>

                <div class="car__info-item">
                    <p class="car__info-icon __icon-power"></p>
                    <div class="car__info-text">
                        <p class="car__info-title"><?=$car['power']?> к.с</p>
                        <p class="car__info-subtitle">Потужність</p>
                    </div>
                </div>

                <div class="car__info-item">
                    <p class="car__info-icon __icon-gearbox"></p>
                    <div class="car__info-text">
                        <p class="car__info-title"><?=$car['gearbox']?></p>
                        <p class="car__info-subtitle">Тип КПП</p>
                    </div>
                </div>

                <div class="car__info-item">
                    <p class="car__info-icon __icon-info-edit"></p>
                    <div class="car__info-text">
                        <p class="car__info-title"><?=$car['mileage']?> км.</p>
                        <p class="car__info-subtitle">Пробіг</p>
                    </div>
                </div>

                <div class="car__info-item">
                    <p class="car__info-icon __icon-info-edit"></p>
                    <div class="car__info-text">
                        <p class="car__info-title"><?=$car['engine_type']?></p>
                        <p class="car__info-subtitle">Тип двигуна</p>
                    </div>
                </div>

                <div class="car__info-item">
                    <p class="car__info-icon __icon-weight"></p>
                    <div class="car__info-text">
                        <p class="car__info-title"><?=$car['load_capacity']?> т.</p>
                        <p class="car__info-subtitle">Тонажність</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="cargo__block car__description">
            <p class="cargo__block-headline">Опис транспорту</p>
            <?php
            if(!empty($car['description'])) {
                $descript = $car['description'];
                echo "<p class='cargo__block-description'>$descript</p>";
            } else {
                echo "<p class='cargo__block-description'>Опис не додано</p>";
            }
            ?>
        </div>

        <div class="user__block">
            <a href="/user/info/<?=$car['user_id']?>" class="user__block-item user__block-item--mobile">
                <img src="/public/user_image/<?=$car['image']?>" alt="" class="user__block-image">
                <div class="user__block-text user__block-text--mobile">
                    <p class="user__block-name"><?=$car['last_name']?> <?=$car['user_name']?>
                        <?=$car['middle_name']?></p>
                    <p class="user__block-subtitle"><?=$car['type']?></p>
                </div>
            </a>

            <div class="user__block-contacts">

                <div class="user__block-item">
                    <p class="user__block-icon __icon-phone"></p>
                    <div class="user__block-text">
                        <a href="tel:<?=$car['phone']?>" class="user__block-title"><?=$car['phone']?></a>
                        <p class="user__block-subtitle">Контактний номер</p>
                    </div>
                </div>

                <div class="user__block-item">
                    <p class="user__block-icon __icon-average-star"></p>
                    <div class="user__block-text">
                        <p class="user__block-title"><?=$car['average_rating']?></p>
                        <p class="user__block-subtitle">Рейтинг користувача</p>
                    </div>
                </div>

            </div>

        </div>

        <section class="main__section reviews">
            <div class="reviews__head">
                <div class="reviews__head-text">
                    <h3>Відгуки про користувача</h3>
                    <p class="main__subheadline">Відгуки про користувача – це не просто слова, а реальні
                        враження та
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
                foreach($car['reviews'] as $review) {
                ?>
                    <div class="reviews__block">
                        <div class="reviews__block-head">
                            <img src="/public/user_image/<?= $review['image'] ?>" class="reviews__image">
                            <div class="reviews__stars">
                                <?php
                                    for($i = 0; $i < 5; $i++) {
                                        $class = ($i < $review['rating']) ? 'reviews__star reviews__star--active __icon-star' : 'reviews__star __icon-star';
                                        echo "<p class='$class'></p>";
                                    }
                                ?>
                            </div>
                        </div>
                        <p class="reviews__headline"><?= $review['last_name'] ?> <?= $review['user_name'] ?>
                            <?= $review['middle_name'] ?></p>
                        <p class="reviews__description"><?= $review['type'] ?></p>
                        <p class="reviews__review"><?= $review['description'] ?></p>
                    </div>
                    <?php
                }
                ?>

                </div>
            </div>
        </section>

        <section class="main__section qr-code">
            <div class="qr-code__header">
                <h3>Діліться транспортом з легкістю та QR-магією</h3>
                <p class="qr-code__subtitle">Діліться транспортом з легкістю, створюючи QR-коди, які надають
                    миттєвий доступ до необхідної інформації</p>
            </div>

            <img src="/public/qr_car/<?=$car['qr_car']?>" class="qr-code__image">
        </section>

    </section>
</main>