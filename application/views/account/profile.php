<div class="overlay-review">
    <div class="overlay-review__body">
        <div class="overlay-review__header">
            <p class="overlay-review__headline">Відгук про користувача</p>
            <p class="overlay-review__close overlay__close __icon-close"></p>
        </div>

        <form action="" method="post" class="overlay-review__form" onsubmit="event.preventDefault()">
            <textarea name="review"
                class="overlay-review__input-text"><?=isset($profile['comment']) ? $profile['comment']['description'] : '';?></textarea>

            <p class="overlay-review__star-label">Наскільки ви оцінюєте користувача ?</p>
            <div class="reviews__stars overlay-review__stars"
                data-value-total="<?=isset($profile['comment']) ? $profile['comment']['rating'] : '1';?>">
                <p class="reviews__star reviews__star__overlay reviews__star--active __icon-star" data-item-value="1">
                </p>
                <p class="reviews__star reviews__star__overlay __icon-star" data-item-value="2"></p>
                <p class="reviews__star reviews__star__overlay __icon-star" data-item-value="3"></p>
                <p class="reviews__star reviews__star__overlay __icon-star" data-item-value="4"></p>
                <p class="reviews__star reviews__star__overlay __icon-star" data-item-value="5"></p>
            </div>

            <?php
                if(!empty($profile['comment'])) {
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
                <img src="/public/user_image/<?=$profile['image']?>" class="user__about-image">
                <div class="user__about-text">
                    <p class="user__about-title"><?=$profile['last_name']?> <?=$profile['user_name']?>
                        <?=$profile['middle_name']?></p>
                    <p class="user__about-subtitle"><?=$profile['type']?></p>
                </div>
            </div>

            <p class="user__about-exit">Вийти</p>
        </div>

        <div class="user__contacts">
            <div class="user__contact">
                <p class="user__contact-icon __icon-phone"></p>
                <div class="user__contact-text">
                    <a href="" class="user__contact-title"><?=$profile['phone']?></a>
                    <p class="user__contact-subtitle">Контактний номер</p>
                </div>
            </div>

            <div class="user__contact">
                <p class="user__contact-icon __icon-average-star"></p>
                <div class="user__contact-text">
                    <p class="user__contact-title"><?=$profile['average_rating']?></p>
                    <p class="user__contact-subtitle">Рейтинг користувача</p>
                </div>
            </div>
        </div>

        <div class="user__panel">
            <div class="user__panel-head">
                <p class="user__panel-headline">Панель керування</p>

                <div class="reviews__arrows">
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

                    <div class="user__tab" id="reviewAddTab">
                        <p class="user__tab-icon __icon-review-add"></p>
                        <p class="user__tab-title">Оцініть сервіс</p>
                        <p class="user__tab-subtitle">Ваші оцінки допоможуть нам надавати вам лише кращий сервіс</p>
                    </div>

                    <div class="user__tab" id="settingTab">
                        <p class="user__tab-icon __icon-setting"></p>
                        <p class="user__tab-title">Налаштування</p>
                        <p class="user__tab-subtitle">Тут ви зможете налаштувати свій профіль за вашими потребами</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="user__content" id="cargosContent">
            <p class="user__content-headline">Ваші вантажі</p>
            <?php
            if(!empty($profile['cargos'])) {
            ?>

            <div class="cargos__content">
                <?php
                    foreach($profile['cargos'] as $cargo) {
                        ?>

                <div class="cargos__block">
                    <div class="cargos__block-head">
                        <a href="/cargo/info/<?=$cargo['cargo_id']?>"
                            class="cargos__block-headline"><?=$cargo['cargo_name']?></a>

                        <div class="cargos__block-head-marks">
                            <?php
                        if($cargo['urgent'] == 'Yes') {
                            echo '<p title="Терміновий вантаж" class="cargos__block-head-icon __icon-urgent-cargo"></p>';
                        }
                        if($profile['premium_status'] == 'Premium') {
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
                                <p class="cargos__block-text-title"><?=date('m.d.Y', strtotime($cargo['load_date']))?>
                                </p>
                                <p class="cargos__block-text-subtitle">Дата завантаження</p>
                            </div>

                            <div class="cargos__block-text">
                                <p class="cargos__block-text-title"><?=date('m.d.Y', strtotime($cargo['unload_date']))?>
                                </p>
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
                                /
                                км.</p>
                        </div>
                    </div>

                    <div class="cargos__block-control">
                        <div class="cargos__block-control-wrap">
                            <a class="cargos__block-control-btn cargos__update">Редагувати</a>
                            <p class="cargos__block-control-btn cargos__delete">Видалити</p>
                        </div>
                    </div>

                </div>

                <?php
                    }
                ?>
            </div>
            <?php
            } else {
                ?>
            <div class="content-empty">
                <p class="content-empty__headline">Вантажі відсутні</p>
                <p class="content-empty__description">Ваші вантажі не знайдено</p>
            </div>
            <?php
            }
        ?>

        </div>

        <div class="user__content" id="carsContent">
            <p class="user__content-headline">Ваш транспорт</p>

            <?php
                if(!empty($profile['cars'])) {
            ?>

            <div class="cars__content">

                <?php
            foreach($profile['cars'] as $car) {
            ?>

                <div class="cars__block">
                    <img src="/public/car_images/<?=$car['image_name']?>" class="cars__block-image">

                    <a href="/car/info/<?=$car['car_id']?>" class="cars__block-name"><?=$car['brand']?>
                        <?=$car['model']?> <?=$car['year']?></a>
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

                    <div class="cars__block-control">
                        <div class="cars__block-control-wrap">
                            <p class="cargos__block-control-btn car__update">Редагувати</p>
                            <p class="cargos__block-control-btn car__delete">Видалити</p>
                        </div>
                    </div>

                </div>

                <?php
            }
            ?>

            </div>

            <?php
                } else {
                    ?>
            <div class="content-empty">
                <p class="content-empty__headline">Транспорт відсутній</p>
                <p class="content-empty__description">Ваш транспорт не знайдено</p>
            </div>
            <?php
                }
            ?>
        </div>

        <div class="reviews user__content" id="reviewsContent">
            <div class="reviews__head">
                <p class="user__content-headline">Відгуки користувачів про Вас</p>

                <?php
                if(!empty($profile['reviews'])) {
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
            if(!empty($profile['reviews'])) {
                ?>

            <div class="reviews__slider user__reviews-slider">
                <div class="reviews__track">

                    <?php
                foreach($profile['reviews'] as $review) {
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
                ?>

                </div>
            </div>

            <?php
            } else {
                ?>
            <div class="content-empty">
                <p class="content-empty__headline">Відгуки про Вас відсутні</p>
                <p class="content-empty__description">Користувачі ще не додали відгуки про Вас</p>
            </div>
            <?php
            }
            ?>

        </div>

        <div class="user__content" id="reviewAddContent">
            <div class="user__content-header">
                <p class="user__content-headline">Ваш відгук про платформу</p>

                <?php
                if(!empty($profile['comment'])) {
                    echo "<p class='user__content-header-btn  overlay-review--open'>Редагувати відгук</p>";
                }
                ?>
            </div>

            <?php
            if(!empty($profile['comment'])) {
                $comment = $profile['comment'];
            ?>

            <div class="user__current-review">
                <div class="user__current-review-header">
                    <img src="/public//user_image/<?=$comment['image']?>" class="user__current-review-image">
                    <div class="user__current-review-text">
                        <p class="user__current-review-title"><?=$comment['last_name']?> <?=$comment['user_name']?>
                            <?=$comment['middle_name']?></p>
                        <p class="user__current-review-subtitle"><?=$comment['type']?></p>
                    </div>
                    <p class="user__current-review-line"></p>

                    <div class="reviews__stars">
                        <?php
                            for($i = 0; $i < 5; $i++) {
                                $class = ($i < $comment['rating']) ? 'reviews__star reviews__star--active __icon-star' : 'reviews__star __icon-star';
                                echo "<p class='$class'></p>";
                            }
                        ?>
                    </div>
                </div>

                <p class="user__current-review-descript"><?=$comment['description']?></p>
            </div>

            <?php
            } else {
            ?>

            <div class="user__current-review user__empty-review">
                <p class="user__empty-review-headline">Відгук про платформу відстуній</p>
                <p class="user__empty-review-subtitle">Розкажіть нам, що вам сподобалося найбільше, як ми вам
                    допомогли або як ми можемо вдосконалити наші сервіси</p>
                <p class="user__empty-review-btn overlay-review--open">Додати відгук</p>
            </div>

            <?php
            }
            ?>

        </div>

        <div class="user__content" id="settingContent">
            <p class="user__content-headline">Налаштування профілю</p>

            <div class="reviews__arrows user__setting-arrows">
                <p class="reviews__arrow __icon-left_arr __prevSetting"></p>
                <p class="reviews__arrow __icon-right_arr __nextSetting"></p>
            </div>

            <div class="user__setting-slider">
                <div class="user__setting-track">

                    <a href="/account/change/password" class="user__setting-nav-block">
                        <p class="user__setting-nav-block-icon __icon-pass"></p>
                        <p class="user__setting-nav-block-title">Змінити пароль</p>
                    </a>

                    <a href="/account/change/login" class="user__setting-nav-block">
                        <p class="user__setting-nav-block-icon __icon-login"></p>
                        <p class="user__setting-nav-block-title">Змінити логін</p>
                    </a>

                    <div class="user__setting-nav-block user__delete-user">
                        <p class="user__setting-nav-block-icon __icon-user-delete"></p>
                        <p class="user__setting-nav-block-title">Видалити профіль</p>
                    </div>

                </div>
            </div>

            <form class="sign-up__form user__setting-form" action="" method="post" onsubmit="event.preventDefault()"
                enctype="multipart/form-data">

                <?php
            if($profile['type'] == "Фізична особа") {
            ?>

                <div class="input__wrapper">
                    <p class="input__icon __icon-user-edit"></p>
                    <div class="input__content">
                        <label for="user_name" class="input__label">Введіть ваше ім’я</label>
                        <input type="text" id="user_name" name="user_name" value="<?=$profile['user_name']?>"
                            class="input">
                    </div>
                </div>

                <div class="input__wrapper">
                    <p class="input__icon __icon-user-edit"></p>
                    <div class="input__content">
                        <label for="middle_name" class="input__label">По-батькові</label>
                        <input type="text" id="middle_name" name="middle_name" value="<?=$profile['middle_name']?>"
                            class="input">
                    </div>
                </div>

                <div class="input__wrapper">
                    <p class="input__icon __icon-user-edit"></p>
                    <div class="input__content">
                        <label for="last_name" class="input__label">Введіть ваше прізвище</label>
                        <input type="text" id="last_name" name="last_name" value="<?=$profile['last_name']?>"
                            class="input">
                    </div>
                </div>

                <?php
            } else {
                ?>

                <div class="input__wrapper">
                    <p class="input__icon __icon-user-edit"></p>
                    <div class="input__content">
                        <label for="user_name" class="input__label">Введіть назву підприємства</label>
                        <input type="text" id="user_name" name="user_name" value="<?=$profile['user_name']?>"
                            class="input">
                    </div>
                </div>

                <?php
            }
            ?>

                <div class="input__wrapper">
                    <p class="input__icon __icon-map"></p>
                    <div class="input__content">
                        <label for="region" class="input__label">Оберіть вашу область</label>
                        <select name="region" id="region" class="input input__select">
                            <?php
                            if (isset($profile['region'])) {
                                $region = $profile['region'];
                                $regions_selected = array($region => 'selected');
                            } 
                            
                            foreach ($regions as $region) {
                                echo "<option value='$region' class='filter__option' {$regions_selected[$region]}>$region</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="input__wrapper">
                    <p class="input__icon __icon-map"></p>
                    <div class="input__content">
                        <label for="city" class="input__label">Оберіть ваше місто</label>
                        <select name="city" id="city" class="input input__select">
                            <?php
                            if (!empty($profile['city'])) {
                                $city = $profile['city'];
                                $city_selected = array($city => 'selected');
                                foreach ($cities as $city) {
                                    echo "<option value='$city' class='filter__option' {$city_selected[$city]}>$city</option>";
                                }
                            } elseif(!empty($profile['region'])) {
                                foreach ($cities as $city) {
                                    echo "<option value='$city' class='filter__option'>$city</option>";
                                }
                            } 
                            ?>
                        </select>
                    </div>
                </div>

                <div class="input__wrapper">
                    <p class="input__icon __icon-phone"></p>
                    <div class="input__content">
                        <label for="phone" class="input__label">Введіть ваш номер телефону</label>
                        <input type="text" name="phone" id="phone" value="<?=$profile['phone']?>" class="input">
                    </div>
                </div>

                <div class="input__wrapper">
                    <p class="input__icon __icon-mail"></p>
                    <div class="input__content">
                        <label for="email" class="input__label">Введіть ваш e-mail</label>
                        <input type="text" id="email" name="email" value="<?=$profile['email']?>" class="input">
                    </div>
                </div>

                <div class="file__wrapper">
                    <label for="file" class="file__label">
                        <p class="file__icon __icon-upload"></p>
                        Завантажте фото профілю
                    </label>
                    <input type="file" id="file" name="file" class="file" accept="image/png, image/jpeg, image/webp">
                </div>

                <div class="input__images">
                    <?php
                    if(!empty($profile['image']) AND $profile['image'] != 'default.jpg') {
                        ?>
                    <div class="input__image-wrapper">
                        <p class="input__image-icon __icon-close"></p>
                        <img src="/public/user_image/<?=$profile['image']?>" class="input__image">
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <button type="submit" class="input__btn">Редагувати</button>

            </form>

        </div>

    </section>
</main>
<script>
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
            url: '/account/profile',
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
                        window.location.href = '/account/profile';
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

$('#region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/account/profile',
        dataType: 'json',
        data: {
            region: selectedValue
        },
        success: function(response) {

            $('#city').empty();

            $.each(response, function(index, city) {
                $('#city').append('<option class="input__option" value=' + city + '>' +
                    city + '</option>');
            });

        },
        error: function(error) {
            console.log(error.responseText);
            console.log('error');
        }
    })
});

var imagesArray = [];
var imageDelete = false;

$('.input__images').on('click', '.input__image-icon', function() {
    var clickedElement = $(this);
    var parentElements = clickedElement.closest('.input__image-wrapper');

    parentElements.fadeOut('slow', function() {
        $(this).remove();
    });

    imageDelete = true;

})

$('.cargos__block').on('click', '.cargos__delete', function() {
    var cargosBlock = $(this).closest('.cargos__block');
    var cargoLink = cargosBlock.find('.cargos__block-headline').attr('href');
    var cargoId = cargoLink.match(/\d+/)[0];

    $('.overlay--warning').fadeIn();
    $('.overlay__delete').on('click', function() {
        $('.overlay--warning').fadeOut();

        $.ajax({
            type: "POST",
            url: '/account/profile',
            data: {
                cargoId: cargoId,
            },
            dataType: 'json',
            beforeSend: function() {
                $('.load-page').show();
            },
            success: function(response) {
                $('.load-page').fadeOut();
                $('.overlay--success').fadeIn();
                $('.overlay__headline').text(
                    "Вантаж видалено");
                $('.overlay__description').text(
                    "Вантаж успішно видалено");
                $(".overlay__close").click(function() {
                    window.location.href = '/account/profile';
                })
            },
            error: function(error) {
                console.log(error.responseText);
                console.log('error');
            }
        });
    })
})

$('.cars__block').on('click', '.car__delete', function() {
    var carBlock = $(this).closest('.cars__block');
    var carLink = carBlock.find('.cars__block-name').attr('href');
    var carId = carLink.match(/\d+/)[0];

    $('.overlay--warning').fadeIn();
    $('.overlay__delete').on('click', function() {
        $('.overlay--warning').fadeOut();

        $.ajax({
            type: "POST",
            url: '/account/profile',
            data: {
                carId: carId,
            },
            dataType: 'json',
            beforeSend: function() {
                $('.load-page').show();
            },
            success: function(response) {
                $('.load-page').fadeOut();
                $('.overlay--success').fadeIn();
                $('.overlay__headline').text(
                    "Транспорт видалено");
                $('.overlay__description').text(
                    "Транспорт успішно видалено");
                $(".overlay__close").click(function() {
                    window.location.href = '/account/profile';
                })
            },
            error: function(error) {
                console.log(error.responseText);
                console.log('error');
            }
        });
    })
})

$('.cargos__block').on('click', '.cargos__update', function() {
    var cargosBlock = $(this).closest('.cargos__block');
    var cargoLink = cargosBlock.find('.cargos__block-headline').attr('href');
    var cargoId = cargoLink.match(/\d+/)[0];

    $.ajax({
        type: "POST",
        url: '/account/profile',
        data: {
            updateCargoId: cargoId,
        },
        dataType: 'json',
        beforeSend: function() {
            $('.load-page').show();
        },
        success: function(response) {
            $('.load-page').fadeOut();
            window.location.href = '/cargo/update';
        },
        error: function(error) {
            console.log(error.responseText);
            console.log('error');
        }
    });

})

$('.cars__block').on('click', '.car__update', function() {
    var carBlock = $(this).closest('.cars__block');
    var carLink = carBlock.find('.cars__block-name').attr('href');
    var carId = carLink.match(/\d+/)[0];

    $.ajax({
        type: "POST",
        url: '/account/profile',
        data: {
            updateCarId: carId,
        },
        dataType: 'json',
        beforeSend: function() {
            $('.load-page').show();
        },
        success: function(response) {
            $('.load-page').fadeOut();
            window.location.href = '/car/update';
        },
        error: function(error) {
            console.log(error.responseText);
            console.log('error');
        }
    });

})

$('.file').on('change', function(event) {
    var files = event.target.files;
    imagesArray = [];

    const processFiles = async (files) => {
        for (const file of files) {
            if (file && file.type.startsWith('image')) {
                var reader = new FileReader();

                reader.onloadstart = function() {
                    var load = `<div class="loader"></div>`;
                    $('.input__images').append(load);
                };

                const imageLoaded = new Promise(resolve => {
                    reader.onload = function(e) {
                        resolve(e.target.result);
                        $('.input__images').find('.loader').remove();
                    };
                });

                reader.readAsDataURL(file);

                const imageUrl = await imageLoaded;

                var image = `<div class="input__image-wrapper">
                    <p class="input__image-icon __icon-close"></p>
                    <img src="${imageUrl}" class="input__image">
                    </div>`;

                $('.input__images').empty();
                $('.input__images').append(image);

                imagesArray.push(file);
            }
        }

    };

    $('.input__images').on('click', '.input__image-icon', function() {
        var clickedElement = $(this);
        var parentElements = clickedElement.closest('.input__image-wrapper');
        var index = $('.input__images .input__image-wrapper').index(parentElements);

        imagesArray.splice(index, 1);
        parentElements.fadeOut('slow', function() {
            $(this).remove();
        });

    })

    processFiles(files);
});

$(".input__btn").click(function() {

    var images = new FormData();
    for (var i = 0; i < imagesArray.length; i++) {
        var file = imagesArray[i];
        images.append('files[]', imagesArray[i]);
    }

    images.append('imageDelete', imageDelete);

    var updateUser = new FormData($('.user__setting-form')[0]);

    var updateUserObject = {};

    updateUser.forEach(function(value, key) {
        updateUserObject[key] = value;
    });

    var updateUserJson = JSON.stringify(updateUserObject);

    $.ajax({
        type: "POST",
        url: '/account/profile',
        data: {
            updateUser: updateUserJson,
        },
        dataType: 'json',
        beforeSend: function() {
            $('.load-page').show();
        },
        success: function(response) {
            $('.load-page').fadeOut();
            console.log(response);

            if (response == null) {
                $.ajax({
                    type: "POST",
                    url: '/account/profile',
                    contentType: false,
                    processData: false,
                    data: images,
                    success: function(response) {
                        $('.overlay--success').fadeIn();
                        $('.overlay__headline').text(
                            "Зміни додані");
                        $('.overlay__description').text(
                            "Зміни успішно додані");
                        $(".overlay__close").click(function() {
                            window.location.href = '/account/profile';
                        })
                    }
                });

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
})

$('.user__about-exit').on('click', function() {

    $('.overlay--warning').fadeIn();
    $('.overlay__headline').text(
        "Вийти з профілю ?");
    $('.overlay__description').text(
        "Процес, який призведе до виходу з профілю");
    $('.overlay__delete').text(
        "Вийти");
    $('.overlay__delete').on('click', function() {
        $('.overlay--warning').fadeOut();

        $.ajax({
            type: "POST",
            url: '/account/profile',
            data: {
                logOut: true,
            },
            dataType: 'json',
            beforeSend: function() {
                $('.load-page').show();
            },
            success: function(response) {
                $('.load-page').fadeOut();
                window.location.href = '/';
            },
            error: function(error) {
                console.log(error.responseText);
                console.log('error');
            }
        });
    })
})

$('.user__delete-user').on('click', function() {

    $('.overlay--warning').fadeIn();
    $('.overlay__headline').text(
        "Видалити профіль ?");
    $('.overlay__description').text(
        "Процес, який призведе до видалення профілю");
    $('.overlay__delete').on('click', function() {
        $('.overlay--warning').fadeOut();

        $.ajax({
            type: "POST",
            url: '/account/profile',
            data: {
                deleteUser: true,
            },
            dataType: 'json',
            beforeSend: function() {
                $('.load-page').show();
            },
            success: function(response) {
                $('.load-page').fadeOut();
                window.location.href = '/';
            },
            error: function(error) {
                console.log(error.responseText);
                console.log('error');
            }
        });
    })
})
</script>