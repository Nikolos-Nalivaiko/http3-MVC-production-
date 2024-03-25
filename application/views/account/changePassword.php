<main class="main">
    <section class="main__section-page __container">
        <h2>Зміна паролю</h2>
        <p class="main__subheadline">Процедура зміни паролю є ключовим елементом в забезпеченні безпеки та захисту
            особистої інформації</p>

        <form action="" method="post" class="sign-up__form" onsubmit="event.preventDefault()"
                enctype="multipart/form-data">

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="old_password" class="input__label">Введіть старий пароль</label>
                    <input type="password" name="old_password" id="old_password" class="input input--password">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="new_password" class="input__label">Введіть новий пароль</label>
                    <input type="password" name="new_password" id="new_password" class="input input--password">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="confirm_password" class="input__label">Повторіть новий пароль</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="input input--password">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-login"></p>
                <div class="input__content">
                    <label for="login" class="input__label">Введіть ваш логін</label>
                    <input type="text" name="login" id="login" class="input">
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
        url: '/account/change/password',
        data: {
            formData: formDataJson
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response == null) {
                $('.overlay--success').fadeIn();
                $('.overlay__headline').text(
                    "Пароль успішно змінено");
                $('.overlay__description').text(
                    "Ваш пароль було успішно змінено");
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