<main class="main">
    <section class="cargos main__section-page __container">
        <div class="exchange__header">
            <h2>Біржа вантажів</h2>
            <div class="exchange__header-btns">
                <a href="/cargo/create" class="exchange__btn">Додати вантаж</a>
                <p class="filter__btn-setting __icon-filter"></p>
            </div>
        </div>

        <form action="" method="post" class="filter__form">

            <div class="filter__header">
                <div class="filter__header-form">

                    <div class="filter__header-selects">
                        <select name="load_city" id="load_city" class="filter__header-select">
                            <?php
                            if (!empty($params['load_city'])) {
                                $load_city = $params['load_city'];
                                $load_city_selected = array($load_city => 'selected');
                                foreach ($cities_load as $city_load) {
                                    echo "<option value='$city_load' class='filter__option' {$load_city_selected[$city_load]}>$city_load</option>";
                                }
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            ?>
                        </select>

                        <select name="load_region" id="load_region" class="filter__header-select">
                            <?php
                            if (isset($params['load_region'])) {
                                $load_region = $params['load_region'];
                                $load_regions_selected = array($load_region => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Область не обрана</option>";
                            }
                            
                            foreach ($load_regions as $region) {
                                echo "<option value='$region' class='filter__option' {$load_regions_selected[$region]}>$region</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <p class="filter__icon __icon-filter-arrow"></p>

                    <div class="filter__header-selects">
                        <select name="unload_city" id="unload_city" class="filter__header-select">
                            <?php
                            if (!empty($params['unload_city'])) {
                                $unload_city = $params['unload_city'];
                                $unload_city_selected = array($unload_city => 'selected');
                                foreach ($cities_unload as $city_unload) {
                                    echo "<option value='$city_unload' class='filter__option' {$unload_city_selected[$city_unload]}>$city_unload</option>";
                                }
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            
                            ?>
                        </select>

                        <select name="unload_region" id="unload_region" class="filter__header-select">
                            <?php
                            if (isset($params['unload_region'])) {
                                $unload_region = $params['unload_region'];
                                $unload_regions_selected = array($unload_region => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Область не обрана</option>";
                            }
                            
                            foreach ($unload_regions as $region) {
                                echo "<option value='$region' class='filter__option' {$unload_regions_selected[$region]}>$region</option>";
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
                    <label for="pay_method" class="filter__label">Тип олати</label>
                    <select name="pay_method" id="pay_method" class="filter__select">
                        <?php
                            if (isset($params['pay_method'])) {
                                $pay_method = $params['pay_method'];
                                $pay_method_selected = array($pay_method => 'selected');
                            } else {
                                echo "<option disabled selected hidden class='filter__option' value=''>Не обрано</option>";
                            }
                            
                            ?>
                        <option value="Р/Р" class="filter__option"
                            <?php echo isset($pay_method_selected['Р/Р']) ? $pay_method_selected['Р/Р'] : ''; ?>>Р/Р
                        </option>
                        <option value="Готівка" class="filter__option"
                            <?php echo isset($pay_method_selected['Готівка']) ? $pay_method_selected['Готівка'] : ''; ?>>
                            Готівка
                        </option>
                        <option value="Криптовалюта" class="filter__option"
                            <?php echo isset($pay_method_selected['Криптовалюта']) ? $pay_method_selected['Криптовалюта'] : ''; ?>>
                            Криптовалюта
                        </option>
                    </select>
                </div>

                <div class="filter__input-wrapper">
                    <label for="distance_from" class="filter__label">Відстань від, км.</label>
                    <input type="number" value="<?=isset($params['distance_from']) ? $params['distance_from'] : '';?>"
                        name="distance_from" id="distance_from" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="distance_to" class="filter__label">Відстань до, км.</label>
                    <input type="number" value="<?=isset($params['distance_to']) ? $params['distance_to'] : '';?>"
                        name="distance_to" id="distance_to" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="load_date" class="filter__label">Дата завантаження</label>
                    <input type="date" value="<?=isset($params['load_date']) ? $params['load_date'] : '';?>"
                        id="load_date" name="load_date" class="filter__input" placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="unload_date" class="filter__label">Дата розвантаження</label>
                    <input type="date" id="unload_date" name="unload_date" class="filter__input"
                        placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="weight_from" class="filter__label">Вага від, км.</label>
                    <input type="number" id="weight_from" name="weight_from" class="filter__input"
                        placeholder="Не обрано">
                </div>

                <div class="filter__input-wrapper">
                    <label for="weight_to" class="filter__label">Вага до, км.</label>
                    <input type="number" name="weight_to" id="weight_to" class="filter__input" placeholder="Не обрано">
                </div>

            </div>

        </form>

        <?php
        if(!empty($cargos)) {
        ?>
        <div class="cargos__content">

            <?php
                foreach($cargos as $cargo) {
                    $average_distance = round($cargo['price'] / $cargo['distance'], 1);
            ?>
            <a href="/cargo/info/<?=$cargo['cargo_id']?>" class="cargos__block">
                <div class="cargos__block-head">
                    <p class="cargos__block-headline"><?=$cargo['cargo_name']?></p>

                    <div class="cargos__block-head-marks">
                        <?php
                        if($cargo['urgent'] == 'Yes') {
                            echo '<p title="Терміновий вантаж" class="cargos__block-head-icon __icon-urgent-cargo"></p>';
                        }
                        if($cargo['status'] == 'Premium') {
                            echo '<p title="Преміум вантаж" class="cargos__block-head-icon __icon-license-cargo">';
                        }
                        ?>
                    </div>
                </div>
                <div class="cargos__block-middle">

                    <div class="cargos__block-middle-wrap">

                        <div class="cargos__decor">
                            <div class="cargos__decor-circle"></div>
                            <div class="cargos__decor-line"></div>
                            <div class="cargos__decor-circle"></div>
                        </div>

                        <div class="cargos__block-text">
                            <p class="cargos__block-text-title"><?=$cargo['load_city']?></p>
                            <p class="cargos__block-text-subtitle"><?=$cargo['load_region']?></p>
                        </div>

                        <div class="cargos__block-text">
                            <p class="cargos__block-text-title"><?=$cargo['unload_city']?></p>
                            <p class="cargos__block-text-subtitle"><?=$cargo['unload_region']?></p>
                        </div>
                    </div>

                    <div class="cargos__block-middle-wrap">
                        <div class="cargos__block-text">
                            <p class="cargos__block-text-title"><?=date('m.d.Y', strtotime($cargo['load_date']))?></p>
                            <p class="cargos__block-text-subtitle">Дата завантаження</p>
                        </div>

                        <div class="cargos__block-text">
                            <p class="cargos__block-text-title"><?=date('m.d.Y', strtotime($cargo['unload_date']))?></p>
                            <p class="cargos__block-text-subtitle">Дата розвантаження</p>
                        </div>
                    </div>

                </div>

                <div class="cargos__block-footer">
                    <ul class="cargos__block-info">
                        <li class="cargos__block-info-item"><?=$cargo['weight']?> т.</li>
                        <li class="cargos__block-info-item"><?=$cargo['body']?></li>
                        <li class="cargos__block-info-item"><?=$cargo['pay_method']?></li>
                    </ul>
                    <div class="cargos__block-price">
                        <p class="cargos__block-price-title"><?=$cargo['price']?>₴</p>
                        <p class="cargos__block-price-subtitle"><?=$average_distance?> ₴ / км.</p>
                    </div>
                </div>
            </a>
            <?php
            }
        ?>

        </div>

        <?php
        } else { ?>
        <div class="content-empty">
            <p class="content-empty__headline">Вантажі не знайдено</p>
            <p class="content-empty__description">Вантажі за вашим запитом не знайдено</p>
        </div>
        <?php
        }

            $startPage = max(1, $currentPage - floor($visiblePages / 2));
            $endPage = min($pages, $startPage + $visiblePages - 1);

            echo '<div class="pagination">';
            
            if ($startPage > 1) {
                echo '<a class="pagination__link" href="/cargos/1">1</a>';
                if ($startPage > 2) {
                    echo '<p class="pagination__separation">.....</p>';
                }
            }

            for ($i = $startPage; $i <= $endPage; $i++) {
                echo '<a class="' . (($i == $currentPage) ? 'pagination__link pagination__link-active' : 'pagination__link') . '" href="/cargos/' . $i . '">' . $i . '</a>';
            }

            if ($endPage < $pages) {
                if ($endPage < $pages - 1) {
                    echo '<p class="pagination__separation">.....</p>';
                }
                echo '<a class="pagination__link" href="/cargos/'.$pages.'">'.$pages.'</a>';
            }

            echo '</div>';
        ?>

    </section>
</main>

<script>
var url = window.location.href;
var match = url.match(/\/cargos\/(\d+)/);

if (match) {
    var urlNumber = match[1];
}

$('#load_region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/cargos/' + urlNumber,
        dataType: 'json',
        data: {
            load_region: selectedValue
        },
        success: function(response) {

            $('#load_city').empty();

            $('#load_city').append(
                '<option disabled selected hidden class="input__option" value="">Не обрано</option>'
            );

            $.each(response, function(index, city) {
                $('#load_city').append('<option class="input__option" value=' + city +
                    '>' +
                    city + '</option>');
            });

        },
    })
});

$('#unload_region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/cargos/' + urlNumber,
        dataType: 'json',
        data: {
            unload_region: selectedValue
        },
        success: function(response) {

            $('#unload_city').empty();

            $('#unload_city').append(
                '<option disabled selected hidden class="input__option" value="">Не обрано</option>'
            );

            $.each(response, function(index, city) {
                $('#unload_city').append('<option class="input__option" value=' + city +
                    '>' +
                    city + '</option>');
            });

        },
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
        url: '/cargos/' + urlNumber,
        data: {
            formData: formDataJson,
            page: urlNumber
        },
        dataType: 'json',
        success: function(response) {
            window.location.href = '/cargos/1';
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
        url: '/cargos/' + urlNumber,
        data: {
            clearForm: true,
        },
        dataType: 'json',
        success: function(response) {
            window.location.href = '/cargos/1';
        },
        error: function(error) {
            console.log(error.responseText);
            console.log('error');
        }
    });

})
</script>