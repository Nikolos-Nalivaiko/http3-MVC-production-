<main class="main">
    <section class="sign-up main__section-page __container">
        <h2 class="main__headline">Реєстрація профілю</h2>
        <p class="main__subheadline">Зареєструйтеся, щоб отримати доступ до безмежних можливостей у світі
            перевезень та оренди транспорту</p>

        <form class="sign-up__form" action="" method="post" enctype="multipart/form-data">

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="pass" class="input__label">Введіть ваш пароль</label>
                    <input type="password" id="pass" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-pass"></p>
                <p class="input__icon-visible __icon-visible_pass"></p>
                <div class="input__content">
                    <label for="confirm" class="input__label">Повторіть ваш пароль</label>
                    <input type="password" id="confirm" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-login"></p>
                <div class="input__content">
                    <label for="login" class="input__label">Введіть ваш логін</label>
                    <input type="text" id="login" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-company-name"></p>
                <div class="input__content">
                    <label for="username" class="input__label">Введіть назву підприємства</label>
                    <input type="text" id="username" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="region" class="input__label">Оберіть вашу область</label>
                    <select name="" id="region" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">Полтавська область</option>
                        <option value="" class="input__option">Дніпропетровська область</option>
                        <option value="" class="input__option">Харківська область</option>
                        <option value="" class="input__option">Київська область</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="city" class="input__label">Оберіть ваше місто</label>
                    <select name="" id="city" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">Полтава</option>
                        <option value="" class="input__option">Дніпро</option>
                        <option value="" class="input__option">Харків</option>
                        <option value="" class="input__option">Київ</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-phone"></p>
                <div class="input__content">
                    <label for="phone" class="input__label">Введіть ваш номер телефону</label>
                    <input type="text" id="phone" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-mail"></p>
                <div class="input__content">
                    <label for="mail" class="input__label">Введіть ваш e-mail</label>
                    <input type="text" id="mail" class="input">
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