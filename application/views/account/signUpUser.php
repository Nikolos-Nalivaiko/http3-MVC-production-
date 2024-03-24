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