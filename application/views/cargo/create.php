<main class="main">
    <section class="sign-up main__section-page __container">
        <h2 class="main__headline">Новий вантаж</h2>
        <p class="main__subheadline">Вкажіть необхідні дані, визначте умови перевезення та отримайте доступ до
            широкого спектру транспортних рішень</p>

        <form class="sign-up__form" action="" onsubmit="event.preventDefault()" method="post"
            enctype="multipart/form-data">

            <div class="input__wrapper">
                <p class="input__icon __icon-cargo-name"></p>
                <div class="input__content">
                    <label for="cargo_name" class="input__label">Введіть назву товару</label>
                    <input type="text" name="cargo_name" id="cargo_name" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-weight"></p>
                <div class="input__content">
                    <label for="weight" class="input__label">Введіть вагу товару, кг</label>
                    <input type="number" name="weight" id="weight" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="load_region" class="input__label">Оберіть область завантаження</label>
                    <select name="load_region" id="load_region" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php 
                        foreach($load_regions as $load_region) {
                            echo "<option value='$load_region' class='input__option'>$load_region</option>";
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
                        foreach($unload_regions as $unload_region) {
                            echo "<option value='$unload_region' class='input__option'>$unload_region</option>";
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
                        <option value="" disabled selected hidden class="input__option"></option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-date"></p>
                <div class="input__content">
                    <label for="load_date" class="input__label">Оберіть дату завантаження</label>
                    <input type="date" name="load_date" id="load_date" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-date"></p>
                <div class="input__content">
                    <label for="unload_date" class="input__label">Оберіть дату розвантаження</label>
                    <input type="date" name="unload_date" id="unload_date" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-type-body"></p>
                <div class="input__content">
                    <label for="body" class="input__label">Оберіть тип кузову</label>
                    <select name="body" id="body" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php 
                        foreach($bodies as $body) {
                            echo "<option value='$body' class='input__option'>$body</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-price"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть ціну перевезення, грн</label>
                    <input type="number" name="price" id="price" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-type-pay"></p>
                <div class="input__content">
                    <label for="body_type" class="input__label">Оберіть тип оплати</label>
                    <select name="pay_method" id="body_type" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="Б/Р" class="input__option">Б/Р</option>
                        <option value="Готівка" class="input__option">Готівка</option>
                        <option value="Криптовалюта" class="input__option">Криптовалюта</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-distant"></p>
                <div class="input__content">
                    <label for="distance" class="input__label">Введіть відстань перевезення, км</label>
                    <input type="number" name="distance" id="distance" class="input">
                </div>
            </div>

            <div class="input__wrapper input__wrapper--full-field">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="description" class="input__label">Введіть опис товару</label>
                    <input type="text" name="description" id="description" class="input">
                </div>
            </div>

            <div class="input__checkbox-wrapper">
                <input type="checkbox" name="urgent" id="checkbox" class="input__checkbox">
                <label for="checkbox" class="input__checkbox-label">Терміновий вантаж</label>
            </div>

            <button type="submit" class="input__btn">Додати вантаж</button>

        </form>
    </section>
</main>

<script>
$('#load_region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/cargo/create',
        dataType: 'json',
        data: {
            load_region: selectedValue
        },
        success: function(response) {

            $('#load_city').empty();

            $('#load_city').append(
                '<option disabled selected hidden class="input__option" value=""> </option>');

            $.each(response, function(index, city) {
                $('#load_city').append('<option class="input__option" value=' + city + '>' +
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
        url: '/cargo/create',
        dataType: 'json',
        data: {
            unload_region: selectedValue
        },
        success: function(response) {

            $('#unload_city').empty();

            $('#unload_city').append(
                '<option disabled selected hidden class="input__option" value=""> </option>');

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
        url: '/cargo/create',
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
                    "Вантаж додано");
                $('.overlay__description').text("Вантаж успішно додано до біржі вантажів");

                $(".sign-up__form :input").each(function() {
                    if ($(this).is("select")) {
                        $(this).find("option:first").prop("selected", true);
                    } else {
                        $(this).val("");
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
</script>