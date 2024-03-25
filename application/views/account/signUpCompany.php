<main class="main">
    <section class="sign-up main__section-page __container">
        <h2 class="main__headline">Реєстрація профілю</h2>
        <p class="main__subheadline">Зареєструйтеся, щоб отримати доступ до безмежних можливостей у світі
            перевезень та оренди транспорту</p>

        <form class="sign-up__form" action="" onsubmit="event.preventDefault()" method="post"
            enctype="multipart/form-data">

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="pass" class="input__label">Введіть ваш пароль</label>
                    <input type="password" id="pass" name="password" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="confirm" class="input__label">Повторіть ваш пароль</label>
                    <input type="password" id="confirm" name="confirm" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-login"></p>
                <div class="input__content">
                    <label for="login" class="input__label">Введіть ваш логін</label>
                    <input type="text" id="login" name="login" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-company-name"></p>
                <div class="input__content">
                    <label for="username" class="input__label">Введіть назву підприємства</label>
                    <input type="text" id="username" name="company_name" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="region" class="input__label">Оберіть вашу область</label>
                    <select name="region" id="region" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php 
                        foreach($regions as $region) {
                            echo "<option value='$region' class='input__option'>$region</option>";
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
                        <option value="" disabled selected hidden class="input__option"></option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-phone"></p>
                <div class="input__content">
                    <label for="phone" class="input__label">Введіть ваш номер телефону</label>
                    <input type="text" id="phone" name="phone" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-mail"></p>
                <div class="input__content">
                    <label for="mail" class="input__label">Введіть ваш e-mail</label>
                    <input type="text" id="mail" name="email" class="input">
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
            </div>

            <button type="submit" class="input__btn">Зареєструватись</button>

        </form>
    </section>
</main>

<script>
$('#region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/account/sign-up/company',
        dataType: 'json',
        data: {
            region: selectedValue
        },
        success: function(response) {

            $('#city').empty();

            $('#city').append(
                '<option disabled selected hidden class="input__option" value=""> </option>');

            $.each(response, function(index, city) {
                $('#city').append('<option class="input__option" value=' + city + '>' +
                    city + '</option>');
            });

        },
    })
});

$(".input__btn").click(function() {

    var images = new FormData();
    for (var i = 0; i < imagesArray.length; i++) {
        var file = imagesArray[i];
        images.append('files[]', imagesArray[i]);
    }

    var formData = new FormData($('.sign-up__form')[0]);

    var formDataObject = {};

    formData.forEach(function(value, key) {
        formDataObject[key] = value;
    });

    var formDataJson = JSON.stringify(formDataObject);

    $.ajax({
        type: "POST",
        url: '/account/sign-up/user',
        data: {
            formData: formDataJson,
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
                    url: '/account/sign-up/user',
                    contentType: false,
                    processData: false,
                    data: images,
                    success: function(response) {
                        $('.overlay--success').fadeIn();
                        $('.overlay__description').text(
                            "Зміни успішно додані");
                        $(".overlay__close").click(function() {
                            window.location.href = '/';
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
</script>