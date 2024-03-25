<main class="main">
    <section class="main__section-page __container">
        <h2>Зміна паролю</h2>
        <p class="main__subheadline">Процедура зміни паролю є ключовим елементом в забезпеченні безпеки та захисту
            особистої інформації</p>

        <form action="" method="post" class="sign-up__form" onsubmit="event.preventDefault()"
            enctype="multipart/form-data">

            <div class="input__wrapper">
                <p class="input__icon __icon-login"></p>
                <div class="input__content">
                    <label for="old_login" class="input__label">Введіть старий логін</label>
                    <input type="text" name="old_login" id="old_login" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-login"></p>
                <div class="input__content">
                    <label for="new_login" class="input__label">Введіть новий логін</label>
                    <input type="text" name="new_login" id="new_login" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-login"></p>
                <div class="input__content">
                    <label for="confirm_login" class="input__label">Повторіть новий логін</label>
                    <input type="text" name="confirm_login" id="confirm_login" class="input input--password">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="password" class="input__label">Введіть ваш пароль</label>
                    <input type="password" name="password" id="password" class="input input--password">
                </div>
            </div>

            <button type="submit" class="input__btn">Редагувати</button>

        </form>
    </section>
</main>
<script>
$(".input__btn").click(function() {

    var formData = new FormData($('.sign-up__form')[0]);

    var formDataObject = {};

    formData.forEach(function(value, key) {
        formDataObject[key] = value;
    });

    formDataObject.file = [];

    var formDataJson = JSON.stringify(formDataObject);

    $.ajax({
        type: "POST",
        url: '/account/change/login',
        data: {
            formData: formDataJson
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response == null) {
                $('.overlay--success').fadeIn();
                $('.overlay__headline').text(
                    "Логін успішно змінено");
                $('.overlay__description').text(
                    "Ваш логін було успішно змінено");
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