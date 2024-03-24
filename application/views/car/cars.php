<main class="main">
    <section class="cargos main__section-page __container">
        <div class="exchange__header">
            <h2>Біржа транспорту</h2>
            <div class="exchange__header-btns">
                <a href="" class="exchange__btn">Додати транспорт</a>
                <p class="filter__btn-setting __icon-filter"></p>
            </div>
        </div>

        <form action="" method="post" class="filter__form">

            <div class="filter__header">
                <div class="filter__header-form">

                    <div class="filter__header-selects">
                        <select name="model" id="model" class="filter__header-select">
                            <?php
                            if (!empty($params['model'])) {
                                $model = $params['model'];
                                $model_selected = array($model => 'selected');
                                foreach ($models as $model) {
                                    echo "<option value='$model' class='filter__option' {$model_selected[$model]}>$model</option>";
                                }
                            } elseif(!empty($params['brand'])) {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                                foreach ($models as $model) {
                                    echo "<option value='$model' class='filter__option'>$model</option>";
                                }
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            ?>
                        </select>

                        <select name="brand" id="brand" class="filter__header-select">
                            <?php
                            if (isset($params['brand'])) {
                                $brand = $params['brand'];
                                $brands_selected = array($brand => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Марка не обрана</option>";
                            }
                            
                            foreach ($brands as $brand) {
                                echo "<option value='$brand' class='filter__option' {$brands_selected[$brand]}>$brand</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <p class="filter__icon __icon-filter-arrow"></p>

                    <div class="filter__header-selects">
                        <select name="city" id="city" class="filter__header-select">
                            <?php
                            if (!empty($params['city'])) {
                                $city = $params['city'];
                                $city_selected = array($city => 'selected');
                                foreach ($cities as $city) {
                                    echo "<option value='$city' class='filter__option' {$city_selected[$city]}>$city</option>";
                                }
                            } elseif(!empty($params['region'])) {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                                foreach ($cities as $city) {
                                    echo "<option value='$city' class='filter__option'>$city</option>";
                                }
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            ?>
                        </select>

                        <select name="region" id="region" class="filter__header-select">
                            <?php
                            if (isset($params['region'])) {
                                $region = $params['region'];
                                $regions_selected = array($region => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Область не обрана</option>";
                            }
                            
                            foreach ($regions as $region) {
                                echo "<option value='$region' class='filter__option' {$regions_selected[$region]}>$region</option>";
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="filter__header-btns">
                    <p class="filter__header-btn __icon-clear"></p>
                    <p class="filter__header-btn __icon-loop"></p>
                </div>
            </div>

            <div class="filter__extra-inputs">

                <div class="filter__input-wrapper">
                    <label for="body" class="filter__label">Тип кузову</label>
                    <select name="body" id="body" class="filter__select">
                        <?php
                            if (isset($params['body'])) {
                                $body = $params['body'];
                                $body_selected = array($body => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            
                            foreach ($bodies as $body) {
                                echo "<option value='$body' class='filter__option' {$body_selected[$body]}>$body</option>";
                            }
                            ?>
                    </select>
                </div>

                <div class="filter__input-wrapper">
                    <label for="load_capacity_from" class="filter__label">Підйомність від, т.</label>
                    <input type="number"
                        value="<?=isset($params['load_capacity_from']) ? $params['load_capacity_from'] : '';?>"
                        name="load_capacity_from" id="load_capacity_from" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="load_capacity_to" class="filter__label">Підйомність до, т.</label>
                    <input type="number"
                        value="<?=isset($params['load_capacity_to']) ? $params['load_capacity_to'] : '';?>"
                        name="load_capacity_to" id="load_capacity_to" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="wheel_mode" class="filter__label">Привід транспорту</label>
                    <select name="wheel_mode" id="wheel_mode" class="filter__select">
                        <?php
                            if (isset($params['wheel_mode'])) {
                                $wheel_mode = $params['wheel_mode'];
                                $wheel_mode_selected = array($wheel_mode => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
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

                <div class="filter__input-wrapper">
                    <label for="engine_capacity_from" class="filter__label">Обєм двигуна від, л.</label>
                    <input type="number"
                        value="<?=isset($params['engine_capacity_from']) ? $params['engine_capacity_from'] : '';?>"
                        name="engine_capacity_from" id="engine_capacity_from" class="filter__input"
                        placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="engine_capacity_to" class="filter__label">Обєм двигуна до, л.</label>
                    <input type="number"
                        value="<?=isset($params['engine_capacity_to']) ? $params['engine_capacity_to'] : '';?>"
                        name="engine_capacity_to" id="engine_capacity_to" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="power_from" class="filter__label">Потужність від, к.с</label>
                    <input type="number" value="<?=isset($params['power_from']) ? $params['power_from'] : '';?>"
                        name="power_from" id="power_from" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="power_to" class="filter__label">Потужність до, к.с</label>
                    <input type="number" value="<?=isset($params['power_to']) ? $params['power_to'] : '';?>"
                        name="power_to" id="power_to" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="engine_type" class="filter__label">Тип двигуна</label>
                    <select name="engine_type" id="engine_type" class="filter__select">
                        <?php
                            if (isset($params['engine_type'])) {
                                $engine_type = $params['engine_type'];
                                $engine_type_selected = array($engine_type => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
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

                <div class="filter__input-wrapper">
                    <label for="gearbox" class="filter__label">Тип КПП</label>
                    <select name="gearbox" id="gearbox" class="filter__select">
                        <?php
                            if (isset($params['gearbox'])) {
                                $gearbox = $params['gearbox'];
                                $gearbox_selected = array($gearbox => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
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

                <div class="filter__input-wrapper">
                    <label for="year_from" class="filter__label">Рік випуску, від</label>
                    <select name="year_from" id="year_from" class="filter__select">
                        <?php
                            if (isset($params['year_from'])) {
                                $year_from = $params['year_from'];
                                $years_from_selected = array($year_from => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            
                            foreach ($years_from as $year_from) {
                                echo "<option value='$year_from' class='filter__option' {$years_from_selected[$year_from]}>$year_from</option>";
                            }
                            ?>
                    </select>
                </div>

                <div class="filter__input-wrapper">
                    <label for="year_to" class="filter__label">Рік випуску, до</label>
                    <select name="year_to" id="year_to" class="filter__select">
                        <?php
                            if (isset($params['year_to'])) {
                                $year_to = $params['year_to'];
                                $years_to_selected = array($year_to => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            
                            foreach ($years_to as $year_to) {
                                echo "<option value='$year_to' class='filter__option' {$year_to_selected[$year_to]}>$year_to</option>";
                            }
                            ?>
                    </select>
                </div>

                <div class="filter__input-wrapper">
                    <label for="mileage_from" class="filter__label">Пробіг від, км.</label>
                    <input type="number" value="<?=isset($params['mileage_from']) ? $params['mileage_from'] : '';?>"
                        name="mileage_from" id="mileage_from" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="mileage_to" class="filter__label">Пробіг до, км.</label>
                    <input type="number" value="<?=isset($params['mileage_to']) ? $params['mileage_to'] : '';?>"
                        name="mileage_to" id="mileage_to" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="price_from" class="filter__label">Ціна за добу від, грн.</label>
                    <input type="number" value="<?=isset($params['price_from']) ? $params['price_from'] : '';?>"
                        name="price_from" id="price_from" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="price_to" class="filter__label">Ціна за добу до, грн.</label>
                    <input type="number" value="<?=isset($params['price_to']) ? $params['price_to'] : '';?>"
                        name="price_to" id="price_to" class="filter__input" placeholder="Не обрано">
                </div>

            </div>

        </form>

        <?php
            if(!empty($cars)) {
        ?>
        <div class="cars__content">
            <?php
                foreach($cars as $car) { ?>

            <a href="/car/info/<?=$car['car_id']?>" class="cars__block">
                <img src="/public/car_images/<?=$car['image_name']?>" class="cars__block-image">

                <p class="cars__block-name"><?= $car['brand'].' '.$car['model'].' '.$car['year'] ?></p>
                <div class="cars__block-middle">
                    <p class="cars__block-city"><?=$car['city']?></p>
                    <p class="cars__block-region"><?=$car['region']?></p>

                    <ul class="cars__block-info">
                        <li class="cars__block-info-item"><?=$car['load_capacity']?> т.</li>
                        <li class="cars__block-info-item"><?=$car['body']?></li>
                        <li class="cars__block-info-item"><?=$car['engine_capacity']?> л. <?=$car['engine_type']?></li>
                    </ul>

                </div>

                <div class="cars__block-footer">
                    <div class="cars__block-price">
                        <p class="cars__block-price-title"><?=$car['price']?>₴</p>
                        <p class="cars__block-price-subtitle">Ціна за добу</p>
                    </div>
                    <?php
                    if($car['status'] == 'Premium') {
                        echo '<p title="Преміум транспорт" class="cars__block-icon __icon-license-car"></p>';
                    }
                    ?>
                </div>
            </a>
            <?php
                }
            ?>
        </div>

        <?php
            } else {?>
        <div class="content-empty">
            <p class="content-empty__headline">Транспорт не знайдено</p>
            <p class="content-empty__description">Транспорт за вашим запитом не знайдено</p>
        </div>
        <?php
            }
            
            $startPage = max(1, $currentPage - floor($visiblePages / 2));
            $endPage = min($pages, $startPage + $visiblePages - 1);

            echo '<div class="pagination">';
            
            if ($startPage > 1) {
                echo '<a class="pagination__link" href="/cars/1">1</a>';
                if ($startPage > 2) {
                    echo '<p class="pagination__separation">.....</p>';
                }
            }

            for ($i = $startPage; $i <= $endPage; $i++) {
                echo '<a class="' . (($i == $currentPage) ? 'pagination__link pagination__link-active' : 'pagination__link') . '" href="/cars/' . $i . '">' . $i . '</a>';
            }

            if ($endPage < $pages) {
                if ($endPage < $pages - 1) {
                    echo '<p class="pagination__separation">.....</p>';
                }
                echo '<a class="pagination__link" href="/cars/'.$pages.'">'.$pages.'</a>';
            }

            echo '</div>';
        ?>

    </section>
</main>

<script>
var url = window.location.href;
var match = url.match(/\/cars\/(\d+)/);

if (match) {
    var urlNumber = match[1];
}

$('#region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/cars/' + urlNumber,
        dataType: 'json',
        data: {
            region: selectedValue
        },
        success: function(response) {

            $('#city').empty();

            $('#city').append(
                '<option disabled selected hidden class="input__option" value="">Не обрано</option>'
            );

            $.each(response, function(index, city) {
                $('#city').append('<option class="input__option" value=' + city + '>' +
                    city + '</option>');
            });

        },
        error: function(error) {
            console.log(error.responseText);
            console.log('error');
        }
    })
});

$('#brand').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/cars/' + urlNumber,
        dataType: 'json',
        data: {
            brand: selectedValue
        },
        success: function(response) {
            console.log(response);
            $('#model').empty();

            $('#model').append(
                '<option disabled selected hidden class="input__option" value="">Не обрано</option>'
            );

            $.each(response, function(index, model) {
                $('#model').append('<option class="input__option" value=' + model + '>' +
                    model + '</option>');
            });

        },
        error: function(error) {
            console.log(error.responseText);
            console.log('error');
        }
    })
});

$(".__icon-loop").click(function() {

    var formData = new FormData($('.filter__form')[0]);

    var formDataObject = {};

    formData.forEach(function(value, key) {
        formDataObject[key] = value;
    });

    var formDataJson = JSON.stringify(formDataObject);

    $.ajax({
        type: "POST",
        url: '/cars/' + urlNumber,
        data: {
            formData: formDataJson,
            page: urlNumber
        },
        dataType: 'json',
        success: function(response) {
            window.location.href = '/cars/1';
        },
        error: function(error) {
            console.log(error.responseText);
            console.log('error');
        }
    });

})

$(".__icon-clear").click(function() {

    $.ajax({
        type: "POST",
        url: '/cars/' + urlNumber,
        data: {
            clearForm: true,
        },
        dataType: 'json',
        success: function(response) {
            window.location.href = '/cars/1';
        },
        error: function(error) {
            console.log(error.responseText);
            console.log('error');
        }
    });

})
</script>