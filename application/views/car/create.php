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
                    <label for="brand" class="input__label">Оберіть марку транспорту</label>
                    <select name="brand" id="brand" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php 
                        foreach($brands as $brand) {
                            echo "<option value='$brand' class='input__option'>$brand</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="model" class="input__label">Оберіть модель транспорту</label>
                    <select name="model" id="model" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-engine"></p>
                <div class="input__content">
                    <label for="engine_capacity" class="input__label">Введіть об’єм двигуна, л</label>
                    <input type="number" step="any" name="engine_capacity" id="engine_capacity" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-wheel-mode"></p>
                <div class="input__content">
                    <label for="wheel_mode" class="input__label">Оберіть привід транспорту</label>
                    <select name="wheel_mode" id="wheel_mode" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="Передній" class="input__option">Передній</option>
                        <option value="Задній" class="input__option">Задній</option>
                        <option value="Повний" class="input__option">Повний</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-power"></p>
                <div class="input__content">
                    <label for="power" class="input__label">Введіть потужність транспорту, к.с</label>
                    <input type="number" name="power" id="power" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-gearbox"></p>
                <div class="input__content">
                    <label for="gearbox" class="input__label">Оберіть тип КПП</label>
                    <select name="gearbox" id="gearbox" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="Автоматична" class="input__option">Автоматична</option>
                        <option value="Механічна" class="input__option">Механічна</option>
                        <option value="Варіатор" class="input__option">Варіатор</option>
                    </select>
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
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="engine_type" class="input__label">Оберіть тип двигуна</label>
                    <select name="engine_type" id="engine_type" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <option value="Бензин" class="input__option">Бензин</option>
                        <option value="Дизель" class="input__option">Дизель</option>
                        <option value="Газ/Бензин" class="input__option">Газ/Бензин</option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-weight"></p>
                <div class="input__content">
                    <label for="load_capacity" class="input__label">Введіть вантажопідйомність, т.</label>
                    <input type="number" id="load_capacity" name="load_capacity" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-price"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть ціну за добу, грн</label>
                    <input type="number" id="price" name="price" class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="region" class="input__label">Оберіть область знаходження транспорту</label>
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
                    <label for="city" class="input__label">Оберіть місто знаходження транспорту</label>
                    <select name="city" id="city" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-date"></p>
                <div class="input__content">
                    <label for="year" class="input__label">Оберіть рік випуску транспорту</label>
                    <select name="year" id="year" class="input input__select">
                        <option value="" disabled selected hidden class="input__option"></option>
                        <?php 
                        foreach($years as $year) {
                            echo "<option value='$year' class='input__option'>$year</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="mileage" class="input__label">Введіть пробіг транспорту, км</label>
                    <input type="number" id="mileage" name="mileage" class="input">
                </div>
            </div>

            <div class="input__wrapper input__wrapper--full-field">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="description" class="input__label">Введіть опис транспорту</label>
                    <input type="text" id="description" name="description" class="input">
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

<script>
$('#region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/car/create',
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

$('#brand').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/car/create',
        dataType: 'json',
        data: {
            brand: selectedValue
        },
        success: function(response) {
            $('#model').empty();

            $('#model').append(
                '<option disabled selected hidden class="input__option" value=""> </option>');

            $.each(response, function(index, model) {
                $('#model').append('<option class="input__option" value=' + model + '>' +
                    model + '</option>');
            });

        },
    })
});

var imagesArray = [];

$('.file').on('change', function(event) {
    var files = event.target.files;

    const processFiles = async (files) => {
        for (const file of files) {
            if (file && file.type.startsWith('image')) {
                var reader = new FileReader();

                file.preview = 'No';

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
                    <div class="preview-icon">
                    <p class="preview-icon__icon __icon-success"></p>
                    <p class="preview-icon__text">Головне фото</p>
                    </div>
                    </div>`;

                $('.input__images').append(image);

                imagesArray.push(file);
                imagesArray[0].preview = 'Yes';
                $('.preview-icon').first().css('display', 'flex');
            }
        }

    };

    $('.input__images').on('click', '.input__image-icon', function() {
        var clickedElement = $(this);
        var parentElements = clickedElement.closest('.input__image-wrapper');
        var index = $('.input__images .input__image-wrapper').index(parentElements);
        $('.preview-icon').css('display', 'none');

        imagesArray.splice(index, 1);
        parentElements.fadeOut('slow', function() {
            $(this).remove();
        });

        for (var i = 0; i < imagesArray.length; i++) {
            imagesArray[i].preview = 'No';
        }

        imagesArray[0].preview = 'Yes';
        $('.preview-icon').first().css('display', 'flex');
    })

    $('.input__images').on('click', '.input__image-wrapper', function() {

        $('.preview-icon').css('display', 'none');
        for (var i = 0; i < imagesArray.length; i++) {
            imagesArray[i].preview = 'No';
        }

        var clicked = $(this);
        var index = $('.input__images .input__image-wrapper').index(clicked);
        imagesArray[index].preview = 'Yes';
        $(this).find('.preview-icon').css('display', 'flex');
    })

    processFiles(files);
});


$(".input__btn").click(function() {

    var images = new FormData();
    for (var i = 0; i < imagesArray.length; i++) {
        var file = imagesArray[i];
        images.append('files[]', imagesArray[i]);
        images.append('preview[]', file.preview);
    }

    var formData = new FormData($('.sign-up__form')[0]);

    var formDataObject = {};

    formData.forEach(function(value, key) {
        formDataObject[key] = value;
    });

    var formDataJson = JSON.stringify(formDataObject);

    $.ajax({
        type: "POST",
        url: '/car/create',
        data: {
            formData: formDataJson
        },
        dataType: 'json',
        beforeSend: function() {
            $('.load-page').show();
        },
        success: function(response) {
            $('.load-page').fadeOut();

            if (response == null) {
                $.ajax({
                    type: "POST",
                    url: '/car/create',
                    contentType: false,
                    processData: false,
                    data: images,
                    success: function(response) {
                        $('.overlay--success').fadeIn();
                        $('.overlay__description').text(
                            "Транспорт успішно додано до біржі транспорту");

                        $(".sign-up__form :input").each(function() {
                            if ($(this).is("select")) {
                                $(this).find("option:first").prop("selected",
                                    true);
                            } else {
                                $(this).val("");
                            }
                        });
                        imagesArray = [];
                        $('.input__images').empty();
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