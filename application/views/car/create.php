<main class="main">
    <section class="new-car main__section-page __container">
        <h2 class="main__headline">Новий транспорт</h2>
        <p class="main__subheadline">Вкажіть необхідні дані, визначте умови перевезення та отримайте доступ до
            широкого спектру транспортних рішень</p>

        <form class="sign-up__form" action="" method="post" onsubmit="event.preventDefault()"
            enctype="multipart/form-data">

            <div class="input__wrapper">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="body_type" class="input__label">Оберіть марку транспорту</label>
                    <select name="body_type" id="body_type" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">Volvo</option>
                        <option value="" class="input__option">DAF</option>
                        <option value="" class="input__option">Mercedes-Benz</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="body_type" class="input__label">Оберіть модель транспорту</label>
                    <select name="body_type" id="body_type" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">FH13</option>
                        <option value="" class="input__option">XF105</option>
                        <option value="" class="input__option">Actros</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-engine"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть об’єм двигуна, л</label>
                    <input type="number" step="any" id="price" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-wheel-mode"></p>
                <div class="input__content">
                    <label for="body_type" class="input__label">Оберіть привід транспорту</label>
                    <select name="body_type" id="body_type" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">Передній</option>
                        <option value="" class="input__option">Задній</option>
                        <option value="" class="input__option">Повний</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-power"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть потужність транспорту, к.с</label>
                    <input type="number" id="price" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-gearbox"></p>
                <div class="input__content">
                    <label for="body_type" class="input__label">Оберіть тип КПП</label>
                    <select name="body_type" id="body_type" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">Автоматична</option>
                        <option value="" class="input__option">Механічна</option>
                        <option value="" class="input__option">Варіатор</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-type-body"></p>
                <div class="input__content">
                    <label for="body_type" class="input__label">Оберіть тип кузову</label>
                    <select name="body_type" id="body_type" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">Тентований</option>
                        <option value="" class="input__option">Рефрижератор</option>
                        <option value="" class="input__option">Тягач</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="body_type" class="input__label">Оберіть тип двигуна</label>
                    <select name="body_type" id="body_type" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">Бензин</option>
                        <option value="" class="input__option">Дизель</option>
                        <option value="" class="input__option">Газ/Бензин</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-weight"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть вантажопідйомність, кг</label>
                    <input type="number" id="price" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-price"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть ціну за добу, грн</label>
                    <input type="number" id="price" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="region" class="input__label">Оберіть область знаходження транспорту</label>
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
                    <label for="region" class="input__label">Оберіть місто знаходження транспорту</label>
                    <select name="" id="region" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">Полтава</option>
                        <option value="" class="input__option">Дніпро</option>
                        <option value="" class="input__option">Харків</option>
                        <option value="" class="input__option">Київ</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-date"></p>
                <div class="input__content">
                    <label for="region" class="input__label">Оберіть місто знаходження транспорту</label>
                    <select name="" id="region" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="" class="input__option">2024</option>
                        <option value="" class="input__option">2023</option>
                        <option value="" class="input__option">2022</option>
                        <option value="" class="input__option">2021</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть пробіг транспорту, км</label>
                    <input type="number" id="price" class="input">
                </div>
            </div>

            <div class="input__wrapper input__wrapper--full-field">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть опис транспорту</label>
                    <input type="text" id="price" class="input">
                </div>
            </div>

            <div class="file__wrapper">
                <label for="file" class="file__label">
                    <p class="file__icon __icon-upload"></p>
                    Завантажте фото транспорту
                </label>
                <input type="file" multiple id="file" name="file" class="file"
                    accept="image/png, image/jpeg, image/webp">
            </div>

            <div class="input__images">
            </div>

            <button type="submit" class="input__btn overlay--open">Додати транспорт</button>

        </form>
    </section>
</main>