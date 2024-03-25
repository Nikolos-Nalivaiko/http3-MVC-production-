<main class="main">
    <section class="cargo main__section-page __container">

        <div class="info__header">
            <div class="info__name-wrap">
                <h2 class="info__name"><?=$cargo['cargo_name']?></h2>
                <div class="info__descript-wrap">
                    <p class="info__price"><?=$cargo['price']?>₴</p>
                    <p class="info__subprice"><?= round($cargo['price'] / $cargo['distance'], 1); ?>₴ / км.</p>
                </div>
            </div>

            <div class="info__marks">
                <?php
                if($cargo['urgent'] == 'Yes') {
                    echo '<p class="info__mark-icon __icon-urgent-cargo" title="Терміновий вантаж"></p>';
                }   

                if($cargo['premium_status'] == 'Premium') {
                    echo '<p class="info__mark-icon __icon-license-cargo" title="Преміум вантаж"></p>';
                }   
                ?>
            </div>
        </div>

        <div class="cargo__content">
            <div class="cargo__block cargo__doubleblock">
                <p class="cargo__block-headline">Інформація про завантаження</p>

                <div class="cargo__block-wrap">
                    <div class="cargo__block-text-wrap">
                        <p class="cargo__block-icon __icon-map"></p>
                        <div class="cargo__block-text">
                            <p class="cargo__block-text-title"><?=$cargo['load_city']?></p>
                            <p class="cargo__block-text-subtitle"><?=$cargo['load_region']?></p>
                        </div>
                    </div>

                    <p class="cargo__block-line"></p>

                    <div class="cargo__block-text-wrap">
                        <p class="cargo__block-icon __icon-date-info"></p>
                        <div class="cargo__block-text">
                            <p class="cargo__block-text-title"><?=date('m.d.Y', strtotime($cargo['load_date']))?></p>
                            <p class="cargo__block-text-subtitle">Дата завантаження</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cargo__block cargo__doubleblock">
                <p class="cargo__block-headline">Інформація про розвантаження</p>

                <div class="cargo__block-wrap">
                    <div class="cargo__block-text-wrap">
                        <p class="cargo__block-icon __icon-map"></p>
                        <div class="cargo__block-text">
                            <p class="cargo__block-text-title"><?=$cargo['unload_city']?></p>
                            <p class="cargo__block-text-subtitle"><?=$cargo['unload_region']?></p>
                        </div>
                    </div>

                    <p class="cargo__block-line"></p>

                    <div class="cargo__block-text-wrap">
                        <p class="cargo__block-icon __icon-date-info"></p>
                        <div class="cargo__block-text">
                            <p class="cargo__block-text-title"><?=date('m.d.Y', strtotime($cargo['unload_date']))?></p>
                            <p class="cargo__block-text-subtitle">Дата завантаження</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cargo__block">
                <p class="cargo__block-headline">Загальна інформація</p>

                <div class="cargo__block-info">
                    <div class="cargo__block-info-item">
                        <p class="cargo__block-info-icon __icon-weight"></p>
                        <div class="cargo__block-info-text">
                            <p class="cargo__block-info-title"><?=$cargo['weight']?></p>
                            <p class="cargo__block-info-subtitle">Вага товару, т.</p>
                        </div>
                    </div>

                    <p class="cargo__block-info-line"></p>

                    <div class="cargo__block-info-item">
                        <p class="cargo__block-info-icon __icon-type-pay"></p>
                        <div class="cargo__block-info-text">
                            <p class="cargo__block-info-title"><?=$cargo['pay_method']?></p>
                            <p class="cargo__block-info-subtitle">Тип оплати</p>
                        </div>
                    </div>

                    <p class="cargo__block-info-line"></p>

                    <div class="cargo__block-info-item">
                        <p class="cargo__block-info-icon __icon-type-body"></p>
                        <div class="cargo__block-info-text">
                            <p class="cargo__block-info-title"><?=$cargo['body']?></p>
                            <p class="cargo__block-info-subtitle">Тип кузову</p>
                        </div>
                    </div>

                    <p class="cargo__block-info-line"></p>

                    <div class="cargo__block-info-item">
                        <p class="cargo__block-info-icon __icon-distant"></p>
                        <div class="cargo__block-info-text">
                            <p class="cargo__block-info-title">≈<?=$cargo['distance']?></p>
                            <p class="cargo__block-info-subtitle">Відстань , км</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cargo__block">
                <p class="cargo__block-headline">Опис вантажу</p>
                <?php
            if(!empty($cargo['description'])) {
                $descript = $cargo['description'];
                echo "<p class='cargo__block-description'>$descript</p>";
            } else {
                echo "<p class='cargo__block-description'>Опис не додано</p>";
            }
            ?>
            </div>

            <div class="user__block">
                <a href="/user/info/<?=$cargo['user_id']?>" class="user__block-item user__block-item--mobile">
                    <img src="/public/user_image/<?=$cargo['image']?>" alt="" class="user__block-image">
                    <div class="user__block-text user__block-text--mobile">
                        <p class="user__block-name"><?=$cargo['last_name']?> <?=$cargo['user_name']?>
                            <?=$cargo['middle_name']?></p>
                        <p class="user__block-subtitle"><?=$cargo['type']?></p>
                    </div>
                </a>

                <div class="user__block-contacts">

                    <div class="user__block-item">
                        <p class="user__block-icon __icon-phone"></p>
                        <div class="user__block-text">
                            <a href="tel:" class="user__block-title"><?=$cargo['phone']?></a>
                            <p class="user__block-subtitle">Контактний номер</p>
                        </div>
                    </div>

                    <div class="user__block-item">
                        <p class="user__block-icon __icon-average-star"></p>
                        <div class="user__block-text">
                            <p class="user__block-title"><?=$cargo['average_rating']?></p>
                            <p class="user__block-subtitle">Рейтинг користувача</p>
                        </div>
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

                <?php
                if(!empty($cargo['reviews'])) {
                    ?>
                <div class="reviews__arrows">
                    <p class="reviews__arrow __icon-left_arr __prev"></p>
                    <p class="reviews__arrow __icon-right_arr __next"></p>
                </div>
                <?php
                }
                ?>
            </div>

            <?php
            if(!empty($cargo['reviews'])) {
            ?>
            <div class="reviews__slider">
                <div class="reviews__track">

                    <?php
                foreach($cargo['reviews'] as $review) {
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
            <?php
            } else {
                ?>
            <div class="content-empty">
                <p class="content-empty__headline">Відгуки про користувача відсутні</p>
                <p class="content-empty__description">Користувачі ще не додали відгуки</p>
            </div>
            <?php
            }
            ?>
        </section>

        <section class="main__section qr-code">
            <div class="qr-code__header">
                <h3>Діліться вантажем з легкістю та QR-магією</h3>
                <p class="qr-code__subtitle">Діліться вантажем з легкістю, створюючи QR-коди, які надають
                    миттєвий
                    доступ до необхідної інформації</p>
            </div>

            <img src="/public/qr_cargos/<?=$cargo['qr_cargo']?>" class="qr-code__image">
        </section>

    </section>
</main>