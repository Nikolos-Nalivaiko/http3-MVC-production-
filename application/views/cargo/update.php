<main class="main">
    <section class="sign-up main__section-page __container">
        <h2 class="main__headline">Редагування вантажу</h2>
        <p class="main__subheadline">Вкажіть необхідні дані, визначте умови перевезення та отримайте доступ до
            широкого спектру транспортних рішень</p>

        <form class="sign-up__form" action="" onsubmit="event.preventDefault()" method="post"
            enctype="multipart/form-data">

            <div class="input__wrapper">
                <p class="input__icon __icon-cargo-name"></p>
                <div class="input__content">
                    <label for="cargo_name" class="input__label">Введіть назву товару</label>
                    <input type="text" name="cargo_name"
                        value="<?=isset($cargo['cargo_name']) ? $cargo['cargo_name'] : '';?>" id="cargo_name"
                        class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-weight"></p>
                <div class="input__content">
                    <label for="weight" class="input__label">Введіть вагу товару, кг</label>
                    <input type="number" name="weight" value="<?=isset($cargo['weight']) ? $cargo['weight'] : '';?>"
                        id="weight" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="load_region" class="input__label">Оберіть область завантаження</label>
                    <select name="load_region" id="load_region" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php
                            if (isset($cargo['load_region'])) {
                                $load_region = $cargo['load_region'];
                                $load_regions_selected = array($load_region => 'selected');
                            } 
                            
                            foreach ($load_regions as $region) {
                                echo "<option value='$region' class='filter__option' {$load_regions_selected[$region]}>$region</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="load_city" class="input__label">Оберіть місто завантаження</label>
                    <select name="load_city" id="load_city" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php
                            if (!empty($cargo['load_city'])) {
                                $load_city = $cargo['load_city'];
                                $load_city_selected = array($load_city => 'selected');
                                foreach ($cities_load as $city_load) {
                                    echo "<option value='$city_load' class='filter__option' {$load_city_selected[$city_load]}>$city_load</option>";
                                }
                            } 
                            ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="unload_region" class="input__label">Оберіть область розвантаження</label>
                    <select name="unload_region" id="unload_region" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php
                            if (isset($cargo['unload_region'])) {
                                $unload_region = $cargo['unload_region'];
                                $unload_regions_selected = array($unload_region => 'selected');
                            } 
                            
                            foreach ($unload_regions as $region) {
                                echo "<option value='$region' class='filter__option' {$unload_regions_selected[$region]}>$region</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="unload_city" class="input__label">Оберіть місто розвантаження</label>
                    <select name="unload_city" id="unload_city" class="input input__select">
                        <?php
                            if (!empty($cargo['unload_city'])) {
                                $unload_city = $cargo['unload_city'];
                                $unload_city_selected = array($unload_city => 'selected');
                                foreach ($cities_unload as $city_unload) {
                                    echo "<option value='$city_unload' class='filter__option' {$unload_city_selected[$city_unload]}>$city_unload</option>";
                                }
                            } 
                            ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-date"></p>
                <div class="input__content">
                    <label for="load_date" class="input__label">Оберіть дату завантаження</label>
                    <input type="date" name="load_date"
                        value="<?=isset($cargo['load_date']) ? $cargo['load_date'] : '';?>" id="load_date"
                        class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-date"></p>
                <div class="input__content">
                    <label for="unload_date" class="input__label">Оберіть дату розвантаження</label>
                    <input type="date" name="unload_date"
                        value="<?=isset($cargo['unload_date']) ? $cargo['unload_date'] : '';?>" id="unload_date"
                        class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-type-body"></p>
                <div class="input__content">
                    <label for="body" class="input__label">Оберіть тип кузову</label>
                    <select name="body" id="body" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php
                            if (isset($cargo['body'])) {
                                $body = $cargo['body'];
                                $body_selected = array($body => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            
                            foreach ($bodies as $body) {
                                echo "<option value='$body' class='filter__option' {$body_selected[$body]}>$body</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-price"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть ціну перевезення, грн</label>
                    <input type="number" name="price" value="<?=isset($cargo['price']) ? $cargo['price'] : '';?>"
                        id="price" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-type-pay"></p>
                <div class="input__content">
                    <label for="body_type" class="input__label">Оберіть тип оплати</label>
                    <select name="pay_method" id="body_type" class="input input__select">
                        <?php
                            if (isset($cargo['pay_method'])) {
                                $pay_method = $cargo['pay_method'];
                                $pay_method_selected = array($pay_method => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            
                            ?>
                        <option value="Р/Р" class="filter__option"
                            <?php echo isset($pay_method_selected['Р/Р']) ? $pay_method_selected['Р/Р'] : ''; ?>>Р/Р
                        </option>
                        <option value="Готівка" class="filter__option"
                            <?php echo isset($pay_method_selected['Готівка']) ? $pay_method_selected['Готівка'] : ''; ?>>
                            Готівка
                        </option>
                        <option value="Криптовалюта" class="filter__option"
                            <?php echo isset($pay_method_selected['Криптовалюта']) ? $pay_method_selected['Криптовалюта'] : ''; ?>>
                            Криптовалюта
                        </option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-distant"></p>
                <div class="input__content">
                    <label for="distance" class="input__label">Введіть відстань перевезення, км</label>
                    <input type="number" name="distance"
                        value="<?=isset($cargo['distance']) ? $cargo['distance'] : '';?>" id="distance" class="input">
                </div>
            </div>

            <div class="input__wrapper input__wrapper--full-field">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="description" class="input__label">Введіть опис товару</label>
                    <input type="text" name="description"
                        value="<?=isset($cargo['description']) ? $cargo['description'] : '';?>" id="description"
                        class="input">
                </div>
            </div>

            <div class="input__checkbox-wrapper">
                <input type="checkbox" name="urgent" id="checkbox" class="input__checkbox">
                <label for="checkbox" class="input__checkbox-label">Терміновий вантаж</label>
            </div>

            <button type="submit" class="input__btn">Редагувати вантаж</button>

        </form>
    </section>
</main>

<script>
$('#load_region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/cargo/update',
        dataType: 'json',
        data: {
            load_region: selectedValue
        },
        success: function(response) {

            $('#load_city').empty();

            $('#load_city').append(
                '<option disabled selected hidden class="input__option" value=""></option>'
            );

            $.each(response, function(index, city) {
                $('#load_city').append('<option class="input__option" value=' + city +
                    '>' +
                    city + '</option>');
            });

        },
    })
});

$('#unload_region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/cargo/update',
        dataType: 'json',
        data: {
            unload_region: selectedValue
        },
        success: function(response) {

            $('#unload_city').empty();

            $('#unload_city').append(
                '<option disabled selected hidden class="input__option" value=""></option>'
            );

            $.each(response, function(index, city) {
                $('#unload_city').append('<option class="input__option" value=' + city +
                    '>' +
                    city + '</option>');
            });

        },
    })
});

$(".input__btn").click(function() {

    var formData = new FormData($('.sign-up__form')[0]);

    var formDataObject = {};

    formData.forEach(function(value, key) {
        formDataObject[key] = value;
    });

    var formDataJson = JSON.stringify(formDataObject);

    $.ajax({
        type: "POST",
        url: '/cargo/update',
        data: {
            formData: formDataJson
        },
        dataType: 'json',
        beforeSend: function() {
            $('.load-page').show();
        },
        success: function(response) {
            $('.load-page').fadeOut();
            $('.overlay--success').fadeIn();
            if (response == null) {
                $('.overlay--success').fadeIn();
                $('.overlay__headline').text(
                    "Зміни додані");
                $('.overlay__description').text("Вантаж успішно редаговано");
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

})
</script>