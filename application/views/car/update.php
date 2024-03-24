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
                        <?php
                            if (isset($car['brand'])) {
                                $brand = $car['brand'];
                                $brands_selected = array($brand => 'selected');
                            } 
                            
                            foreach ($brands as $brand) {
                                echo "<option value='$brand' class='filter__option' {$brands_selected[$brand]}>$brand</option>";
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
                        <?php
                            if (!empty($car['model'])) {
                                $model = $car['model'];
                                $model_selected = array($model => 'selected');
                                foreach ($models as $model) {
                                    echo "<option value='$model' class='filter__option' {$model_selected[$model]}>$model</option>";
                                }
                            } elseif(!empty($car['brand'])) {
                                foreach ($models as $model) {
                                    echo "<option value='$model' class='filter__option'>$model</option>";
                                }
                            } 
                            ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-engine"></p>
                <div class="input__content">
                    <label for="engine_capacity" class="input__label">Введіть об’єм двигуна, л</label>
                    <input type="number" step="any" name="engine_capacity"
                        value="<?=isset($car['engine_capacity']) ? $car['engine_capacity'] : '';?>" id="engine_capacity"
                        class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-wheel-mode"></p>
                <div class="input__content">
                    <label for="wheel_mode" class="input__label">Оберіть привід транспорту</label>
                    <select name="wheel_mode" id="wheel_mode" class="input input__select">
                        <?php
                            if (isset($car['wheel_mode'])) {
                                $wheel_mode = $car['wheel_mode'];
                                $wheel_mode_selected = array($wheel_mode => 'selected');
                            } 
                            
                            ?>
                        <option value="Передній" class="filter__option"
                            <?php echo isset($wheel_mode_selected['Передній']) ? $wheel_mode_selected['Передній'] : ''; ?>>
                            Передній
                        </option>
                        <option value="Задній" class="filter__option"
                            <?php echo isset($wheel_mode_selected['Задній']) ? $wheel_mode_selected['Задній'] : ''; ?>>
                            Задній
                        </option>
                        <option value="Повний" class="filter__option"
                            <?php echo isset($wheel_mode_selected['Повний']) ? $wheel_mode_selected['Повний'] : ''; ?>>
                            Повний
                        </option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-power"></p>
                <div class="input__content">
                    <label for="power" class="input__label">Введіть потужність транспорту, к.с</label>
                    <input type="number" name="power" value="<?=isset($car['power']) ? $car['power'] : '';?>" id="power"
                        class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-gearbox"></p>
                <div class="input__content">
                    <label for="gearbox" class="input__label">Оберіть тип КПП</label>
                    <select name="gearbox" id="gearbox" class="input input__select">
                        <?php
                            if (isset($car['gearbox'])) {
                                $gearbox = $car['gearbox'];
                                $gearbox_selected = array($gearbox => 'selected');
                            } 
                            
                            ?>
                        <option value="Автоматична" class="filter__option"
                            <?php echo isset($gearbox_selected['Автоматична']) ? $gearbox_selected['Автоматична'] : ''; ?>>
                            Автоматична
                        </option>
                        <option value="Механічна" class="filter__option"
                            <?php echo isset($gearbox_selected['Механічна']) ? $gearbox_selected['Механічна'] : ''; ?>>
                            Механічна
                        </option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-type-body"></p>
                <div class="input__content">
                    <label for="body" class="input__label">Оберіть тип кузову</label>
                    <select name="body" id="body" class="input input__select">
                        <?php
                            if (isset($car['body'])) {
                                $body = $car['body'];
                                $body_selected = array($body => 'selected');
                            }
                            
                            foreach ($bodies as $body) {
                                echo "<option value='$body' class='filter__option' {$body_selected[$body]}>$body</option>";
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
                        <?php
                            if (isset($car['engine_type'])) {
                                $engine_type = $car['engine_type'];
                                $engine_type_selected = array($engine_type => 'selected');
                            } 
                            
                            ?>
                        <option value="Бензин" class="filter__option"
                            <?php echo isset($engine_type_selected['Бензин']) ? $engine_type_selected['Бензин'] : ''; ?>>
                            Бензин
                        </option>
                        <option value="Дизель" class="filter__option"
                            <?php echo isset($engine_type_selected['Дизель']) ? $engine_type_selected['Дизель'] : ''; ?>>
                            Дизель
                        </option>
                        <option value="Газ/Бензин" class="filter__option"
                            <?php echo isset($engine_type_selected['Газ/Бензин']) ? $engine_type_selected['Газ/Бензин'] : ''; ?>>
                            Газ/Бензин
                        </option>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-weight"></p>
                <div class="input__content">
                    <label for="load_capacity" class="input__label">Введіть вантажопідйомність, т.</label>
                    <input type="number" id="load_capacity"
                        value="<?=isset($car['load_capacity']) ? $car['load_capacity'] : '';?>" name="load_capacity"
                        class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-price"></p>
                <div class="input__content">
                    <label for="price" class="input__label">Введіть ціну за добу, грн</label>
                    <input type="number" value="<?=isset($car['price']) ? $car['price'] : '';?>" id="price" name="price"
                        class="input">
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-map"></p>
                <div class="input__content">
                    <label for="region" class="input__label">Оберіть область знаходження транспорту</label>
                    <select name="region" id="region" class="input input__select">
                        <?php
                            if (isset($car['region'])) {
                                $region = $car['region'];
                                $regions_selected = array($region => 'selected');
                            } 
                            
                            foreach ($regions as $region) {
                                echo "<option value='$region' class='filter__option' {$regions_selected[$region]}>$region</option>";
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
                        <?php
                            if (!empty($car['city'])) {
                                $city = $car['city'];
                                $city_selected = array($city => 'selected');
                                foreach ($cities as $city) {
                                    echo "<option value='$city' class='filter__option' {$city_selected[$city]}>$city</option>";
                                }
                            } elseif(!empty($car['region'])) {
                                foreach ($cities as $city) {
                                    echo "<option value='$city' class='filter__option'>$city</option>";
                                }
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-date"></p>
                <div class="input__content">
                    <label for="year" class="input__label">Оберіть рік випуску транспорту</label>
                    <select name="year" id="year" class="input input__select">
                        <?php
                            if (isset($car['year'])) {
                                $year = $car['year'];
                                $years_selected = array($year => 'selected');
                            } 
                            
                            foreach ($years as $year) {
                                echo "<option value='$year' class='filter__option' {$years_selected[$year]}>$year</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>

            <div class="input__wrapper">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="mileage" class="input__label">Введіть пробіг транспорту, км</label>
                    <input type="number" id="mileage" value="<?=isset($car['mileage']) ? $car['mileage'] : '';?>"
                        name="mileage" class="input">
                </div>
            </div>

            <div class="input__wrapper input__wrapper--full-field">
                <p class="input__icon __icon-info-edit"></p>
                <div class="input__content">
                    <label for="description" class="input__label">Введіть опис транспорту</label>
                    <input type="text" id="description"
                        value="<?=isset($car['description']) ? $car['description'] : '';?>" name="description"
                        class="input">
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
                <?php
                if(!empty($car['images'])) {
                    foreach($car['images'] as $image) {
                        ?>
                <div class="input__image-wrapper">
                    <p class="input__image-icon __icon-close"></p>
                    <img src="/public/car_images/<?=$image?>" class="input__image">
                    <div class="preview-icon">
                        <p class="preview-icon__icon __icon-success"></p>
                        <p class="preview-icon__text">Головне фото</p>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>

            <button type="submit" class="input__btn overlay--open">Редагувати</button>

        </form>
    </section>
</main>
<script>
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
                '<option disabled selected hidden class="input__option" value=""></option>');

            $.each(response, function(index, city) {
                $('#city').append('<option class="input__option" value=' + city + '>' +
                    city + '</option>');
            });

        },
    })
});

var imagesArray = [];
var imagesDeleteArray = [];

var imageUrlsWithPreview = $('.input__image-wrapper .input__image').map(function() {
    var src = $(this).attr('src');
    var imageUrl = src.substring(src.indexOf('/public/car_images/') + '/public/car_images/'.length);
    return {
        url: imageUrl,
        preview: 'No'
    };
}).get();

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
                imageUrlsWithPreview.push({
                    url: file.name,
                    preview: 'No'
                });
                $('.preview-icon').css('display', 'none');

                for (var i = 0; i < imageUrlsWithPreview.length; i++) {
                    imageUrlsWithPreview[i].preview = 'No';
                }

                imageUrlsWithPreview[0].preview = 'Yes';
                $('.preview-icon').first().css('display', 'flex');
            }
        }

    };

    $('.input__images').on('click', '.input__image-icon', function() {
        var clickedElement = $(this);
        var parentElements = clickedElement.closest('.input__image-wrapper');
        var index = $('.input__images .input__image-wrapper').index(parentElements);

        imagesArray.splice(index, 1);
        imageUrlsWithPreview.splice(index, 1);
        parentElements.fadeOut('slow', function() {
            $(this).remove();
        });
    })

    processFiles(files);
});

$('.input__images').on('click', '.input__image-wrapper', function() {
    var clicked = $(this);
    var index = $('.input__images .input__image-wrapper').index(clicked);
    $('.preview-icon').css('display', 'none');

    for (var i = 0; i < imageUrlsWithPreview.length; i++) {
        imageUrlsWithPreview[i].preview = 'No';
    }

    var clicked = $(this);
    var index = $('.input__images .input__image-wrapper').index(clicked);
    imageUrlsWithPreview[index].preview = 'Yes';
    $(this).find('.preview-icon').css('display', 'flex');
})

$('.input__images').on('click', '.input__image-icon', function() {
    var clickedElement = $(this);
    var parentElements = clickedElement.closest('.input__image-wrapper');

    var index = $('.input__images .input__image-wrapper').index(parentElements);

    var image = parentElements.find('.input__image');
    var filename = image.attr('src');
    var parts = filename.split('car_images/');

    var image_name = parts[1];

    imagesDeleteArray.push(image_name);

    imagesArray.splice(index, 1);
    imageUrlsWithPreview.splice(index, 1);
    parentElements.fadeOut('slow', function() {
        $(this).remove();
    });

})

$(".input__btn").click(function() {

    var images = new FormData();
    for (var i = 0; i < imagesArray.length; i++) {
        var file = imagesArray[i];
        images.append('files[]', imagesArray[i]);
        images.append('preview[]', file.preview);
    }

    for (var j = 0; j < imageUrlsWithPreview.length; j++) {
        images.append('allImages[' + j + '][url]', imageUrlsWithPreview[j].url);
        images.append('allImages[' + j + '][preview]', imageUrlsWithPreview[j].preview);
    }

    var formData = new FormData($('.sign-up__form')[0]);

    var formDataObject = {};

    formData.forEach(function(value, key) {
        formDataObject[key] = value;
    });

    formDataObject.imagesDelete = imagesDeleteArray;

    var formDataJson = JSON.stringify(formDataObject);

    $.ajax({
        type: "POST",
        url: '/car/update',
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
                    url: '/car/update',
                    contentType: false,
                    processData: false,
                    data: images,
                    success: function(response) {
                        $('.overlay--success').fadeIn();
                        $('.overlay__description').text(
                            "Транспорт успішно редаговано");
                        $(".overlay__close").click(function() {
                            window.location.href = '/account/profile';
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