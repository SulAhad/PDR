<div class="row card shadow-sm blur">
            <div class="col-md-12">
                <?php require('../notification/notification.php') ?>
                <div class="row">
                    <div class="col-md-2">
                        <button id="seam_distortion" value="seam_distortion" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Перекос шва (боковая часть пакета на линии сгиба)</button>
                    </div>
                    <div class="col-md-2">
                        <button id="valve" value="valve" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Клапана (не более 3 мм, при эстетичном товарном виде)</button>
                    </div>
                    <div class="col-md-2">
                        <button id="burn_through" value="burn_through" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Прожоги (продукт не высыпается), складки (не более 10 мм)</button>
                    </div>
                    <div class="col-md-2">
                        <button id="report_offset" value="report_offset" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Смещение рапорта(менее 10мм)</button>
                    </div>
                    <div class="col-md-2">
                        <button id="pen_hole" value="pen_hole" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Отверстие для ручки(непроруб 10-20мм)</button>
                    </div>
                    <div class="col-md-2">
                        <button id="appearance_of_the_powder" value="appearance_of_the_powder" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Внешний вид порошка</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <button id="marking" value="marking" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Маркировка(нечеткая,некорректная или смещение)</button>
                    </div>
                    <div class="col-md-2">
                        <button id="correspondence" value="correspondence" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Соответствие IDN упаковки IDN ГП</button>
                    </div>
                    <div class="col-md-2">
                        <button id="packaging_defects" value="packaging_defects" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Дефекты упаковки после проведения дроп-теста</button>
                    </div>
                    <div class="col-md-2">
                        <button id="sealing_the_valves" value="sealing_the_valves" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Заклейка клапанов гофроящика</button>
                    </div>
                    <div class="col-md-2">
                        <button id="valve_tear" value="valve_tear" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Надрыв клапанов (до 10мм)</button>
                    </div>
                     <div class="col-md-2">
                        <button id="valve_misalignment" value="valve_misalignment" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Перекос клапанов (от 3-5мм)</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <button id="corner_label" value="corner_label" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Угловая этикетка (соответствие ассортимента, слабая проклейка, складки)</button>
                    </div>
                    <div class="col-md-2">
                        <button id="corrugated_box_marking" value="corrugated_box_marking" class="btn_nums btn_quality_innotech1 btn btn-primary btn-block">Маркировка гофроящика (нечеткая, некорректная или смещение)</button>
                    </div>
                    <div class="col-md-6">
                        <textarea id="notes" value="notes" type="text" class="form-control" placeholder="Примечание"></textarea>
                    </div>
                    <div class="col-md-2">
                        <button id="save_comment" value="save_comment" class="btn_quality_palletizer_save_comment btn btn-success btn-block">Сохранить примечание</button>
                    </div>
                </div>
            </div>
        </div>