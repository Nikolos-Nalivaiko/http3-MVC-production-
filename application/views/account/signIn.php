<main class="main">
    <section class="sign-in main__section-page __left-container">
        <div class="sign-in__wrapper">
            <h2>Ласкаво просимо</h2>
            <p class="main__subheadline">Ласкаво просимо в наш віртуальний світ, де
                можливості не мають меж, а
                співпраця – легка та захоплива</p>

            <form action="" onsubmit="event.preventDefault()" name="signIn" method="post" class="sign-in__form" enctype="multipart/form-data">

                <div class="input__wrapper input__wrapper-sign-in">
                    <p class="input__icon __icon-pass"></p>
                    <p class="input__icon-visible __icon-visible_pass"></p>
                    <div class="input__content">
                        <label for="pass" class="input__label">Введіть ваш пароль</label>
                        <input type="password" name="password" id="pass" class="input input__sign-in input--password">
                    </div>
                </div>

                <div class="input__wrapper">
                    <p class="input__icon __icon-login"></p>
                    <div class="input__content">
                        <label for="login" class="input__label">Введіть ваш логін</label>
                        <input type="text" id="login" name="login" class="input input__sign-in">
                    </div>
                </div>

                <div class="input__checkbox-wrapper input__checkbox-wrapper--sign-in">
                    <input type="checkbox" name="checkbox" id="checkbox" class="input__checkbox">
                    <label for="checkbox" class="input__checkbox-label">Запам’ятати мене</label>
                </div>

                <button type="submit" id="btn-form" class="input__btn">Увійти</button>
                <a href="/account/recovery/select" class="input__btn input__btn-recover">Відновити дані</a>

                <p class="input__descrition-sign-in">Не маєте акаунту ?<a href="/account/select"> Створіть його</a></p>

            </form>
        </div>
        <div class="sign-in__image"></div>
    </section>
</main>

<script>
$("#btn-form").click(function() {

var formData = new FormData($('.sign-in__form')[0]);

var formDataObject = {};

formData.forEach(function(value, key) {
    formDataObject[key] = value;
});

var formDataJson = JSON.stringify(formDataObject);

$.ajax({
    type: "POST",
    url: '/account/sign-in',
    data: {
        formData: formDataJson
    },
    dataType: 'json',
    success: function(response) {
        console.log(response);
        if (response == null) {
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

})
</script>