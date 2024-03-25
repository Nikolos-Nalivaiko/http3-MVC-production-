<div class="overlay-review">
    <div class="overlay-review__body">
        <div class="overlay-review__header">
            <p class="overlay-review__headline">Відгук про користувача</p>
            <p class="overlay-review__close overlay__close __icon-close"></p>
        </div>

        <form action="" method="post" class="overlay-review__form" onsubmit="event.preventDefault()">
            <textarea name="review"
                class="overlay-review__input-text"><?=!empty($user_info['current_reviews']) ? $user_info['current_reviews'][0]['description'] : '';?></textarea>

            <p class="overlay-review__star-label">Наскільки ви оцінюєте користувача ?</p>

            <div class="reviews__stars overlay-review__stars"
                data-value-total="<?=!empty($user_info['current_reviews']) ? $user_info['current_reviews'][0]['rating'] : '1';?>">
                <p class="reviews__star reviews__star__overlay reviews__star--active __icon-star" data-item-value="1">
                </p>
                <p class="reviews__star reviews__star__overlay __icon-star" data-item-value="2"></p>
                <p class="reviews__star reviews__star__overlay __icon-star" data-item-value="3"></p>
                <p class="reviews__star reviews__star__overlay __icon-star" data-item-value="4"></p>
                <p class="reviews__star reviews__star__overlay __icon-star" data-item-value="5"></p>
            </div>

            <?php
                if(!empty($user_info['current_reviews'])) {
                    echo "<button class='overlay-review__btn' type='submit'>Редагувати відгук</button>";
                } else {
                    echo "<button class='overlay-review__btn' type='submit'>Додати відгук</button>";
                }
                ?>

        </form>

    </div>
</div>

<main class="main">
    <section class="user main__section-page __container">
        <div class="user__header">
            <div class="user__about">
                <img src="/public/user_image/<?=$user_info['image']?>" class="user__about-image">
                <div class="user__about-text">
                    <p class="user__about-title"><?=$user_info['last_name']?> <?=$user_info['user_name']?>
                        <?=$user_info['middle_name']?></p>
                    <p class="user__about-subtitle"><?=$user_info['type']?></p>
                </div>
            </div>

        </div>

        <div class="user__contacts">
            <div class="user__contact">
                <p class="user__contact-icon __icon-phone"></p>
                <div class="user__contact-text">
                    <a href="" class="user__contact-title"><?=$user_info['phone']?></a>
                    <p class="user__contact-subtitle">Контактний номер</p>
                </div>
            </div>

            <div class="user__contact">
                <p class="user__contact-icon __icon-average-star"></p>
                <div class="user__contact-text">
                    <p class="user__contact-title"><?=$user_info['average_rating']?></p>
                    <p class="user__contact-subtitle">Рейтинг користувача</p>
                </div>
            </div>
        </div>

        <div class="user__panel">
            <div class="user__panel-head">
                <p class="user__panel-headline">Панель керування</p>

                <div class="reviews__arrows user__panel-arrows">
                    <p class="reviews__arrow __icon-left_arr __prevTab"></p>
                    <p class="reviews__arrow __icon-right_arr __nextTab"></p>
                </div>
            </div>

            <div class="user__tabs">
                <div class="user__tabs-track">
                    <div class="user__tab" id="cargosTab">
                        <p class="user__tab-icon __icon-cargos-tab"></p>
                        <p class="user__tab-title">Вантажі</p>
                        <p class="user__tab-subtitle">Запрошуємо в захоплюючий світ вантажів цього користувача</p>
                    </div>

                    <div class="user__tab" id="carsTab">
                        <p class="user__tab-icon __icon-cars-tab"></p>
                        <p class="user__tab-title">Транспорт</p>
                        <p class="user__tab-subtitle">Запрошуємо в захоплюючий світ транспорту цього користувача</p>
                    </div>

                    <div class="user__tab" id="reviewsTab">
                        <p class="user__tab-icon __icon-reviews-tab"></p>
                        <p class="user__tab-title">Відгуки</p>
                        <p class="user__tab-subtitle">Діліться враженнями та думками для поліпшення сервісу</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="user__content" id="cargosContent">
            <p class="user__content-headline">Вантажі користувача</p>

            <div class="cargos__content">
                <?php if(!empty($user_info['cargos'])) 
                    foreach($user_info['cargos'] as $cargo) {
                ?>

                <a href="/cargo/info/<?=$cargo['cargo_id']?>" class="cargos__block">
                    <div class="cargos__block-head">
                        <p class="cargos__block-headline"><?=$cargo['cargo_name']?></p>

                        <div class="cargos__block-head-marks">
                            <?php
                        if($cargo['urgent'] == 'Yes') {
                            echo '<p title="Терміновий вантаж" class="cargos__block-head-icon __icon-urgent-cargo"></p>';
                        }
                        if($user_info['premium_status'] == 'Premium') {
                            echo '<p title="Преміум вантаж" class="cargos__block-head-icon __icon-license-cargo">';
                        }
                        ?>
                        </div>
                    </div>
                    <div class="cargos__block-middle">

                        <div class="cargos__block-middle-wrap">

                            <div class="cargos__decor">
                                <div class="cargos__decor-circle"></div>
                                <div class="cargos__decor-line"></div>
                                <div class="cargos__decor-circle"></div>
                            </div>

                            <div class="cargos__block-text">
                                <p class="cargos__block-text-title"><?=$cargo['load_city']?></p>
                                <p class="cargos__block-text-subtitle"><?=$cargo['load_region']?></p>
                            </div>

                            <div class="cargos__block-text">
                                <p class="cargos__block-text-title"><?=$cargo['unload_city']?></p>
                                <p class="cargos__block-text-subtitle"><?=$cargo['unload_region']?></p>
                            </div>
                        </div>

                        <div class="cargos__block-middle-wrap">
                            <div class="cargos__block-text">
                                <p class="cargos__block-text-title"><?=$cargo['load_date']?></p>
                                <p class="cargos__block-text-subtitle">Дата завантаження</p>
                            </div>

                            <div class="cargos__block-text">
                                <p class="cargos__block-text-title"><?=$cargo['unload_date']?></p>
                                <p class="cargos__block-text-subtitle">Дата розвантаження</p>
                            </div>
                        </div>

                    </div>

                    <div class="cargos__block-footer">
                        <ul class="cargos__block-info">
                            <li class="cargos__block-info-item"><?=$cargo['weight']?> т.</li>
                            <li class="cargos__block-info-item"><?=$cargo['body']?></li>
                            <li class="cargos__block-info-item"><?=$cargo['pay_method']?></li>
                        </ul>
                        <div class="cargos__block-price">
                            <p class="cargos__block-price-title"><?=$cargo['price']?>₴</p>
                            <p class="cargos__block-price-subtitle"><?=round($cargo['price'] / $cargo['distance'], 1)?>₴
                                / км.</p>
                        </div>
                    </div>
                </a>

                <?php
                }
                ?>

            </div>
        </div>

        <div class="user__content" id="carsContent">
            <p class="user__content-headline">Транспорт користувача</p>

            <div class="cars__content">
                <?php if(!empty($user_info['cars'])) {
                    foreach($user_info['cars'] as $car) { 
                ?>

                <a href="/car/info/<?=$car['car_id']?>" class="cars__block">
                    <img src="/public/car_images/<?=$car['image_name']?>" class="cars__block-image">

                    <p class="cars__block-name"><?=$car['brand']?> <?=$car['model']?> <?=$car['year']?></p>
                    <div class="cars__block-middle">
                        <p class="cars__block-city"><?=$car['city']?></p>
                        <p class="cars__block-region"><?=$car['region']?></p>

                        <ul class="cars__block-info">
                            <li class="cars__block-info-item"><?=$car['load_capacity']?> т.</li>
                            <li class="cars__block-info-item"><?=$car['body']?></li>
                            <li class="cars__block-info-item"><?=$car['engine_capacity']?> <?=$car['engine_type']?></li>
                        </ul>

                    </div>

                    <div class="cars__block-footer">
                        <div class="cars__block-price">
                            <p class="cars__block-price-title"><?=$car['price']?>₴</p>
                            <p class="cars__block-price-subtitle">Ціна за добу</p>
                        </div>
                        <p title="Преміум транспорт" class="cars__block-icon __icon-license-car"></p>
                    </div>
                </a>

                <?php
                    }
                } ?>

            </div>
        </div>

        <div class="reviews user__content" id="reviewsContent">
            <div class="reviews__head">
                <p class="user__content-headline">Відгуки про користувача</p>

                <div class="reviews__arrows">
                    <p class="reviews__arrow __icon-left_arr __prev"></p>
                    <p class="reviews__arrow __icon-right_arr __next"></p>
                </div>
            </div>

            <div class="reviews__slider user__reviews-slider">
                <div class="reviews__track">

                    <?php if(!empty($car['reviews'])){
                    foreach($car['reviews'] as $review) {
                ?>

                    <div class="reviews__block">
                        <div class="reviews__block-head">
                            <img src="/public/user_image/<?=$review['image']?>" class="reviews__image">
                            <div class="reviews__stars">
                                <?php
                                    for($i = 0; $i < 5; $i++) {
                                        $class = ($i < $review['rating']) ? 'reviews__star reviews__star--active __icon-star' : 'reviews__star __icon-star';
                                        echo "<p class='$class'></p>";
                                    }
                                ?>
                            </div>
                        </div>
                        <p class="reviews__headline"><?=$review['last_name']?> <?=$review['user_name']?>
                            <?=$review['middle_name']?></p>
                        <p class="reviews__description"><?=$review['type']?></p>
                        <p class="reviews__review"><?=$review['description']?></p>
                    </div>

                    <?php
                    }
                } ?>

                </div>
            </div>

            <div class="user__content-header">
                <p class="user__content-headline">Ваш відгук про користувача</p>

                <?php
                if(!empty($user_info['current_reviews'])) {
                    echo "<p class='user__content-header-btn  overlay-review--open'>Редагувати відгук</p>";
                }
                ?>
            </div>

            <?php
            if(!empty($user_info['current_reviews'])) {
                foreach($user_info['current_reviews'] as $current_review) {
            ?>

            <div class="user__current-review">
                <div class="user__current-review-header">
                    <img src="/public/user_image/<?=$current_review['image']?>" class="user__current-review-image">
                    <div class="user__current-review-text">
                        <p class="user__current-review-title"><?=$current_review['last_name']?>
                            <?=$current_review['user_name']?>
                            <?=$current_review['middle_name']?></p>
                        <p class="user__current-review-subtitle"><?=$current_review['type']?></p>
                    </div>
                    <p class="user__current-review-line"></p>

                    <div class="reviews__stars">
                        <?php
                        for($i = 0; $i < 5; $i++) {
                            $class = ($i < $current_review['rating']) ? 'reviews__star reviews__star--active __icon-star' : 'reviews__star __icon-star';
                            echo "<p class='$class'></p>";
                        }
                        ?>
                    </div>
                </div>

                <p class="user__current-review-descript"><?=$current_review['description']?></p>
            </div>

            <?php
                }
            } else {
                ?>

            <div class="user__current-review user__empty-review">
                <p class="user__empty-review-headline">Ваш відгук про користувача відсутній</p>
                <p class="user__empty-review-subtitle">Розкажіть нам, що вам сподобалося найбільше, як вам
                    допомогли та наскільки приємно було працювати з цим користувачем</p>
                <p class="user__empty-review-btn overlay-review--open">Додати відгук</p>
            </div>

            <?php
            }
            ?>

        </div>

    </section>
</main>
<script>
var url = window.location.href;
var match = url.match(/\/user\/info\/(\d+)/);

if (match) {
    var urlNumber = match[1];
}

$(this).parent().attr('data-value-total', $(this).data('item-value'));

let valueTotal = parseInt($('.reviews__stars').attr('data-value-total'));

$('.reviews__star__overlay').each(function() {
    var itemValue = parseInt($(this).attr(
        'data-item-value'));
    if (itemValue <=
        valueTotal) {
        $(this).addClass('reviews__star--active');
    } else {
        $(this).removeClass(
            'reviews__star--active');
    }
});

$(".overlay-review--open").click(function() {
    $(".overlay-review").fadeIn();

    $('.reviews__stars .reviews__star__overlay').click(function() {
        $(this).parent().attr('data-value-total', $(this).data('item-value'));

        valueTotal = parseInt($('.reviews__stars').attr('data-value-total'));

        $('.reviews__star__overlay').each(function() {
            itemValue = parseInt($(this).attr(
                'data-item-value'));
            if (itemValue <=
                valueTotal) {
                $(this).addClass('reviews__star--active');
            } else {
                $(this).removeClass(
                    'reviews__star--active');
            }
        });

    });

    $(".overlay-review__close").click(function() {
        $(".overlay-review").fadeOut();
    })

    $(".overlay-review__btn").click(function() {

        var formData = new FormData($('.overlay-review__form')[0]);

        var formDataObject = {};

        formData.forEach(function(value, key) {
            formDataObject[key] = value;
        });

        formDataObject['rating'] = valueTotal;
        var formDataJson = JSON.stringify(formDataObject);

        $.ajax({
            type: "POST",
            url: '/user/info/' + urlNumber,
            data: {
                formData: formDataJson
            },
            dataType: 'json',
            beforeSend: function() {
                $('.load-page').show();
            },
            success: function(response) {
                $(".overlay-review").fadeOut();
                $('.load-page').fadeOut();
                $('.overlay--success').fadeIn();
                if (response == null) {
                    $('.overlay--success').fadeIn();
                    $('.overlay__headline').text(
                        "Відгук додано");
                    $('.overlay__description').text(
                        "Відгук успішно додано");
                    $(".overlay__close").click(function() {
                        window.location.href = '/user/info/' + urlNumber;
                    })
                } else {
                    $('.overlay--error').fadeIn();
                    $('.overlay__description').text(response);
                }
            },
            error: function(error) {
                console.log(error.responseText);
                console.log('error');
            }
        });


    });

})
</script>