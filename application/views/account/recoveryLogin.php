<main class="main">
    <section class="main__section-page __container">
        <h2>Відновлення логіну</h2>
        <p class="main__subheadline">Довірте нам ваші цінні інформаційні ресурси, і ми зробимо все можливе
            для їх успішного відновлення</p>

        <form action="" method="post" onsubmit="event.preventDefault()" class="sign-up__form">

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="password" class="input__label">Введіть ваш пароль</label>
                    <input type="password" id="password" name="password" class="input input__sign-in input--password">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-mail"></p>
                <div class="input__content">
                    <label for="email" class="input__label">Введіть ваш e-mail</label>
                    <input type="text" id="email" name="email" class="input">
                </div>
            </div>

            <button type="submit" class="input__btn">Відновити</button>

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

    var formDataJson = JSON.stringify(formDataObject);

    $.ajax({
        type: "POST",
        url: '/account/recovery/login',
        data: {
            formData: formDataJson,
        },
        dataType: 'json',
        beforeSend: function() {
            $('.load-page').show();
        },
        success: function(response) {
            $('.load-page').fadeOut();
            console.log(response)

            if (response.status == true) {
                $('.overlay--success').fadeIn();
                $('.overlay__headline').text(
                    "Логін відновлено");
                $('.overlay__description').text(
                    "Ваш логін: " + response.login);
                $(".overlay__close").click(function() {
                    window.location.href = '/account/sign-in';
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