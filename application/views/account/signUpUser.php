<main class="main">
    <section class="sign-up main__section-page __container">
        <h2 class="main__headline">Реєстрація профілю</h2>
        <p class="main__subheadline">Зареєструйтеся, щоб отримати доступ до безмежних можливостей у світі
            перевезень та оренди транспорту</p>

        <form class="sign-up__form" action="" onsubmit="event.preventDefault()" name="signUpUser" method="post"
            enctype="multipart/form-data">

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="pass" class="input__label">Введіть ваш пароль</label>
                    <input type="password" name="password" id="pass" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="confirm" class="input__label">Повторіть ваш пароль</label>
                    <input type="password" name="confirm" id="confirm" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-login"></p>
                <div class="input__content">
                    <label for="login" class="input__label">Введіть ваш логін</label>
                    <input type="text" name="login" id="login" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-user-edit"></p>
                <div class="input__content">
                    <label for="user_name" class="input__label">Введіть ваше ім’я</label>
                    <input type="text" name="user_name" id="user_name" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-user-edit"></p>
                <div class="input__content">
                    <label for="middle_name" class="input__label">По-батькові</label>
                    <input type="text" name="middle_name" id="middle_name" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-user-edit"></p>
                <div class="input__content">
                    <label for="last_name" class="input__label">Введіть ваше прізвище</label>
                    <input type="text" name="last_name" id="last_name" class="input">
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
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-phone"></p>
                <div class="input__content">
                    <label for="phone" class="input__label">Введіть ваш номер телефону</label>
                    <input type="text" name="phone" id="phone" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-mail"></p>
                <div class="input__content">
                    <label for="email" class="input__label">Введіть ваш e-mail</label>
                    <input type="email" name="email" id="email" class="input">
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

            <button type="submit" class="input__btn overlay--open">Зареєструватись</button>

        </form>

    </section>
</main>

<script>
$('#region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/account/sign-up/user',
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

    var formData = new FormData($('.sign-up__form')[0]);

    var formDataObject = {};

    formData.forEach(function(value, key) {
        formDataObject[key] = value;
    });

    formDataObject.file = [];
    $('input[type="file"]').each(function(index, element) {
        var files = element.files;
        $.each(files, function(i, file) {
            formDataObject.file.push({
                name: file.name,
                size: file.size,
                type: file.type,
                lastModifiedDate: file.lastModifiedDate
            });
        });
    });

    var formDataJson = JSON.stringify(formDataObject);

    $.ajax({
        type: "POST",
        url: '/account/sign-up/user',
        data: {
            formData: formDataJson
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response == null) {
                // $('.overlay--success').fadeIn();

                // $(".sign-up__form :input").each(function() {
                //     if ($(this).is("select")) {
                //         $(this).find("option:first").prop("selected", true);
                //     } else {
                //         $(this).val("");
                //     }
                // });
                window.location.href = '/';
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

    $.ajax({
        type: "POST",
        url: '/account/sign-up/user',
        contentType: false,
        processData: false,
        data: formData
    });
})
</script>