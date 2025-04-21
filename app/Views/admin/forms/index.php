<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Formulario de seguridad
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="analista-section">
    <style>
        .btn:disabled {
            opacity: 1 !important;
        }
    </style>
    <div class="row mb-3">
        <div class="text-left col">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-danger" id="iconoAnterior" disabled><i
                        class="fa-solid fa-arrow-left"></i></button>
                <button class="btn btn-outline-danger" id="anteriorBtn">Anterior</button>
            </div>
        </div>
        <div class="text-right col">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-outline-success" id="siguienteBtn">Siguiente</button>
                <button type="button" class="btn btn-success" id="iconoSiguiente" disabled><i
                        class="fa-solid fa-arrow-right"></i></button>
            </div>

            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-outline-success" id="imprimirBtn">Guardar los datos</button>
                <button type="button" class="btn btn-success" id="iconoGuardar" disabled><i
                        class="fa-solid fa-floppy-disk"></i></button>
            </div>
        </div>
    </div>
    <form class="form-seccion" id="formSeccion1">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad estructural de la IES</h3>
        <h5 class="text-center rounded form-title d-none">Seguridad estructural de la IES</h5>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item1">
                        <span class="question-number">1.</span> LA IES HA SUFRIDO DAÑOS POR EVENTOS PELIGROSOS
                        ANTERIORES
                    </label>
                    <select id="item1" name="item1" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Daños nulos o edificio reparado completamente (1)</option>
                        <option value="2" class="item2">Daños menores (2)</option>
                        <option value="3" class="item3">Daños moderados y reparación parcial del edificio; (3)
                        </option>
                        <option value="4" class="item4">Daños mayores que no se han reparado; (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item2">
                        <span class="question-number">2.</span> LA IES HA SUFRIDO DAÑOS POR EVENTOS PELIGROSOS
                        ANTERIORES
                    </label>
                    <select id="item2" name="item2" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">La Norma Ecuatoriana de Construcción se aplicó cabalmente
                            (1)
                        </option>
                        <option value="2" class="item2">La Norma Ecuatoriana de Construcción se aplicó de manera
                            incipiente; (2)</option>
                        <!-- <option value="3" class="item3">(3)</option> -->
                        <option value="4" class="item4">No se aplicó La Norma Ecuatoriana de Construcción (4)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item3">
                        <span class="question-number">3.</span> LA IES HA SIDO REMODELADA, REPARADA, ADAPTADA BAJO
                        CONDICIONES ESTÁNDAR
                    </label>
                    <select id="item3" name="item3" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">No se ha efectuado modificaciones (1)</option>
                        <option value="2" class="item2">Se ha hecho remodelaciones o modificaciones moderadas (2)
                        </option>
                        <option value="3" class="item3"></option>
                        <option value="4" class="item4">Se ha hecho remodelaciones o modificaciones que ejercen un
                            efecto mayor sobre la estructura (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item4">
                        <span class="question-number">4.</span> DISEÑO ESTRUCTURAL DE LA IES
                    </label>
                    <select id="item4" name="item4" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Adecuado diseño estrutural (1)</option>
                        <option value="2" class="item2">Diseño regular del sistema estructural (2)</option>
                        <option value="3" class="item3">Diseño deficiente del sistema estructural (3)</option>
                        <option value="4" class="item4">Muy mal diseño del sistema estructural (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item5">
                        <span class="question-number">5.</span> CONDICIÓN ACTUAL DE LA ESTRUCTURA
                    </label>
                    <select id="item5" name="item5" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">No se observó deterioro ni grietas (1)</option>
                        <option value="2" class="item2">Pequeñas señales de deterioro causado por el clima o
                            envejecimiento normal (2)</option>
                        <option value="3" class="item3">Deterioro causado por el clima o el envejecimiento normal,
                            sin
                            presencia de grietas (3)</option>
                        <option value="4" class="item4">Deterioro causado por el clima o el envejecimiento normal;
                            grietas en la planta baja y el primer piso (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item6">
                        <span class="question-number">6.</span> CONDICIÓN ACTUAL DE LOS MATERIALES DE CONSTRUCCIÓN
                    </label>
                    <select id="item6" name="item6" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sin grietas en hormigón ni deformaciones en madera o acero,
                            sin
                            herrumbre o descascaramiento (1)</option>
                        <option value="2" class="item2">Grietas menores de 1 mm en hormigón, pequeñas deformaciones
                            visibles en acero o madera, herrumbre sin descascaramiento (2)</option>
                        <option value="3" class="item3">Grietas entre 1 y 3 mm en hormigón, deformaciones moderadas
                            y
                            visibles en acero o madera, herrumbre sin descascaramiento (3)</option>
                        <option value="4" class="item4">Grietas mayores a 3 mm en hotmigón, deformaciones ecesivas
                            en
                            acero o madera, herrumbre y descascaramiento (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item7">
                        <span class="question-number">7.</span> INTERACCIÓN NO ESTRUCTURAL-ESTRUCTURAL
                    </label>
                    <select id="item7" name="item7" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Ningún elemento no estructural afecta a la estructura. (1)
                        </option>
                        <option value="2" class="item2">Tabiques unidos parcialmente a la estructura. (2)</option>
                        <option value="3" class="item3">Tabiques unidos rígidamente a la estructura, los cielos
                            rasos
                            suspendidos interactúan parcialmente con la estructura. (3)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item8">
                        <span class="question-number">8.</span> LA IES TIENE UNA SEPARACIÓN ENTRE EDIFICIOS BAJO
                        NORMA
                        DE LA NEC
                    </label>
                    <select id="item8" name="item8" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Separación superior al 1,5% de la altura del más bajo de los
                            dos
                            edificios adyacentes (1)</option>
                        <option value="2" class="item2">Separación entre el 0,5 y el 1,5% de la altura del más bajo
                            de
                            los edificios adyacentes (2)</option>
                        <option value="3" class="item3">Separación inferior al 0,5% de la altura del más bajo de los
                            edificios adyacentes (3)</option>
                        <option value="4" class="item4">No existe separación entre edificios adyacentes (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item9">
                        <span class="question-number">9.</span> REDUNDANCIA ESTRUCTURAL
                    </label>
                    <select id="item9" name="item9" class="form-control">
                        <option value="1" class="bg-dark">Mas de tres líneas de resistncia en cada dirección (0)
                        </option>
                        <option value="2" class="bg-dark">Tres líneas de resistencia en cada dirección (0)</option>
                        <option value="3" class="bg-dark">Menos de tres líneas de resistencia en cada direcciòn (0)
                        </option>
                        <option value="4" class="bg-dark">Sin líneas de resistencia (0)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item10">
                        <span class="question-number">10.</span> RELACIÓN DE RESISTENCIA ENTRE COLUMNAS Y VIGAS
                    </label>
                    <select id="item10" name="item10" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">La resistencia de las columnas es mayor que la de las vigas
                            (1)
                        </option>
                        <option value="2" class="item2">La resistencia de las vigas es semejante a la de las
                            columnas
                            (2)</option>
                        <option value="3" class="item3">La resistencia de las vigas es apenas mayor que las columnas
                            (3)
                        </option>
                        <option value="4" class="item4">La resistencia de las vigas es obviamente mayor que la de
                            las
                            columnas (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item11">
                        <span class="question-number">11.</span> DETALLES ESTRUCTURALES
                    </label>
                    <select id="item11" name="item11" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Construido según las normas vigentes (1)</option>
                        <option value="2" class="item2">Se construyó con normas de diseño anterior, no se han
                            realizado
                            obras para adaptar la estructura a la normativa actual (2)</option>
                        <option value="3" class="item3">Se construyó con normas de diseño anterior. Se han realizado
                            obras para adaptar la estructura a la normativa vigente (3)</option>
                        <option value="4" class="item4">No existen registros de resistencia de las columnas y de las
                            vigas, no se siguen normas de diseño actuales (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item12">
                        <span class="question-number">12.</span> SEGURIDAD DE LOS CIMIENTOS
                    </label>
                    <select id="item12" name="item12" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Datos firmes de que los cimientos se diseñaron según las
                            normas
                            y de que no hay daños. (1)</option>
                        <option value="2" class="item2">Datos escasos, planos sin estándar. (2)</option>
                        <option value="3" class="item3">Datos escasos, planos desactualizados y sin certificación,
                            sin
                            evidencia de diseño de cimientos según normas (3)</option>
                        <option value="4" class="item4">Sin datos de diseño según norma, se encuentran indicios de
                            daños, no existen planos (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item13">
                        <span class="question-number">13.</span> PATOLOGÍA DE LA ESTRUCTURA
                    </label>
                    <select id="item13" name="item13" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sin patología (1)</option>
                        <option value="2" class="item2">Patología pequeña (2)</option>
                        <option value="3" class="item3">Patología grave (3)</option>
                        <option value="4" class="item4">Patología extensiva (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item14">
                        <span class="question-number">14.</span> MATERIAL ESTRUCTURAL A LA VISTA
                    </label>
                    <select id="item14" name="item14" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sin material estructural a la vista (1)</option>
                        <option value="2" class="item2">Poco material estructural a la vista (2)</option>
                        <option value="3" class="item3">Gran material estructural a la vista (3)</option>
                        <option value="4" class="item4">Material estructural completamente a la vista (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item15">
                        <span class="question-number">15.</span> GRIETAS Y FISURAS EN MAMPOSTERÍA
                    </label>
                    <select id="item15" name="item15" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sin grietas (1)</option>
                        <option value="2" class="item2">Micro fisuras (2)</option>
                        <option value="3" class="item3">Fisuras (3)</option>
                        <option value="4" class="item4">Grietas (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item16">
                        <span class="question-number">16.</span> SIMETRÍA EN PLANTA
                    </label>
                    <select id="item16" name="item16" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Las formas de planta regulares, estructura tiene un plano
                            uniforme, sin elementos de torción (1)</option>
                        <option value="2" class="item2">Las forma de planta presentan irregularidades pequeñas (2)
                        </option>
                        <option value="3" class="item3">Las formas en planta son irregulares aunque la estructura es
                            uniforme (3)</option>
                        <option value="4" class="item4">Formas de planta de la estructura de edificio (rigidéz,
                            masa,
                            resistencia) con graves irregularidades. Estructura no uniforme (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item17">
                        <span class="question-number">17.</span> SIMETRÍA EN ALTURA
                    </label>
                    <select id="item17" name="item17" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sin elementos discontinuos o irregulares, la variación en
                            elevación del edificio es muy notoria (1)</option>
                        <option value="2" class="item2">Algunos elementos irregulares (2)</option>
                        <option value="3" class="item3">Muchos elementos discontinuos o irregulares sin mayor
                            importancia, cierta variación en la elevación de los edificios (3)</option>
                        <option value="4" class="item4">Elementos discontinuos o irregulares importantes, la
                            variación
                            en elevación del edificio es muy notoria (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item18">
                        <span class="question-number">18.</span> IRREGULARIDAD EN ALTURA DE PISOS
                    </label>
                    <select id="item18" name="item18" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los pisos tiene altura semejante, con diferencia menor del
                            5%
                            (1)</option>
                        <option value="2" class="item2">Los pisos tienen una altura semejante, la diferencia es
                            menor
                            del 10% y mayor que el 5% (2)</option>
                        <option value="3" class="item3">Los pisos tienen alturas semejantes (la diferencia es menor
                            del
                            20% aunque mayor del 10%); (3)</option>
                        <option value="4" class="item4">La altura de los pisos difiere en más del 20%; (4)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item19">
                        <span class="question-number">19.</span> MATERIAL DE CONSTRUCCIÓN
                    </label>
                    <select id="item19" name="item19" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Acero (1)</option>
                        <option value="2" class="item2">Piedra (2)</option>
                        <option value="2" class="item2">Hormigón (2)</option>
                        <option value="3" class="item3">Ladrillo (3)</option>
                        <option value="4" class="item4">Bloque (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item20">
                        <span class="question-number">20.</span> CONCENTRACIONES DE MASA EN TECHOS O CUBIERTAS
                    </label>
                    <select id="item20" name="item20" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Antenas (1)</option>
                        <option value="2" class="item2">Tanques de agua (2)</option>
                        <option value="3" class="item3">Tanques de agua y antenas (3)</option>
                        <option value="4" class="item4">tanques de agua y antenas sin soporte (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item21">
                        <span class="question-number">21.</span> VIGAS ADECUADAS A LAS COLUMNAS
                    </label>
                    <select id="item21" name="item21" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">La resistencia de las columnas es mayor que la de las vigas
                            (1)
                        </option>
                        <option value="2" class="item2">La resistencia de las vigas es semejante a la de las
                            columnas
                            (2)</option>
                        <option value="3" class="item3">La resistencia de las vigas es aoenas mayor que las columnas
                            (3)
                        </option>
                        <option value="4" class="item4">La resistencia de las vigas es obviamente mayor que la de
                            las
                            columnas (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item22">
                        <span class="question-number">22.</span> VIGAS DE LA ESTRUCTURA LINEADAS CON LAS DEL
                        EDIFICIO
                        CONTIGUO
                    </label>
                    <select id="item22" name="item22" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Vigas alineadas (1)</option>
                        <option value="2" class="item2">10% de vigas desalineadas (2)</option>
                        <option value="3" class="item3">10 a 20% vigas desalineadas (3)</option>
                        <option value="4" class="item4">Más del 20% de vigas desalineadas (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item23">
                        <span class="question-number">23.</span> ESPACIOS DE DILATACIÓN ENTRE EDIFICIOS CONTIGUOS
                    </label>
                    <select id="item23" name="item23" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">5 cm (1)</option>
                        <option value="2" class="item2">4 cm (2)</option>
                        <option value="3" class="item3">3 cm (3)</option>
                        <option value="4" class="item4">2 cm o menos (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item24">
                        <span class="question-number">24.</span> VOLADOS DEL EDIFICIO
                    </label>
                    <select id="item24" name="item24" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sin volados (1)</option>
                        <option value="2" class="item2">50 cm (2)</option>
                        <option value="3" class="item3">80 cm (3)</option>
                        <option value="4" class="item4">mas de 80 cm (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="item25">
                        <span class="question-number">25.</span> ACELERACIÓN EN ROCA
                    </label>
                    <select id="item25" name="item25" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">035 - 038 (1)</option>
                        <option value="2" class="item2">039-04 (2)</option>
                        <option value="3" class="item3">04 - 045 (3)</option>
                        <option value="4" class="item4">046 - 05 (4)</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion2">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad no estructural de las IES</h3>
        <h5 class="text-center rounded form-title">Sistema Eléctrico</h5>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item26">
                        <span class="question-number">26.</span> La IES cuenta con generador adecuado para el 100% de la
                        demanda
                    </label>
                    <select id="item26" name="item26" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Las fuentes alternativas arrancan automáticamente en menos de 10
                            segundos y satisfacen mas del 70% de las áreas críticas (1)</option>
                        <option value="2" class="item2">Existen fuentes alternativas de electricidad que no satisfacen
                            menos del 30% la totalidad de las áreas críticas o necesitan iniciarse manualmente (2)
                        </option>
                        <option value="3" class="item3">Existen fuentes alternativas de electricidad que no satisfacen a
                            la totalidad de las áreas críticas (3)</option>
                        <option value="4" class="item4">No hay fuentes alternativas de electricidad (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item27">
                        <span class="question-number">27.</span> La IES cuenta con un programa de prueba de
                        funcionamiento del generador
                    </label>
                    <select id="item27" name="item27" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se somete a prueba a toda carga cada 1 a 3 meses; se cuenta con
                            planes de mantenimiento(1)</option>
                        <!-- <option value="2" class="item2">(2)</option> -->
                        <option value="3" class="item3">Se somete a prueba a toda carga cada 6 meses o más. No se cuenta
                            con planes de mantenimiento(3)</option>
                        <option value="4" class="item4">No se someten a pruebas periódicas ni se tienen planes de
                            mantenimiento(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item28">
                        <span class="question-number">28.</span> El generador está protegido ante eventos peligrosos
                    </label>
                    <select id="item28" name="item28" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">los generadores se hallan en buen estado, están bien asegurados
                            y bien preprados para emergencias(1)</option>
                        <!-- <option value="2" class="item2">(2)</option> -->
                        <option value="3" class="item3">No existen fuentes redundantes internos de electricidad, los
                            generadores están en condiciones regulares, no tienen medidas de protección(3)</option>
                        <option value="4" class="item4">No existen fuentes redundantes internos de electricidad, los
                            generadores están en malas condiciones, no tienen medidas de protección(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item29">
                        <span class="question-number">29.</span> Seguridad de canales eléctricos, ductos y cables
                    </label>
                    <select id="item29" name="item29" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El equipo, los cables y los conductos eléctricos se hallan en
                            buenas condiciones, están bien asegurados y funcionan correctamente(1)</option>
                        <option value="2" class="item2">El equipo eléctrico y canalizaciones están en condiciones
                            regulares. Existen medidas protectoras parciales(2)</option>
                        <option value="3" class="item3">El equipo eléctrico, los conductores y canalizaciones están en
                            malas condiciones, no existen medidas protectoras que proporcionan seguridad parcial(3)
                        </option>
                        <option value="4" class="item4">El equipo eléctrico, los conductores y canalizaciones están en
                            muy malas condiciones, no existen medidas protectoras(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item30">
                        <span class="question-number">30.</span> La IES cuenta con un sistema de iluminación redundante
                    </label>
                    <select id="item30" name="item30" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Existen mas de tres entradas de suministro eléctrico local(1)
                        </option>
                        <option value="2" class="item2">Existen tres entradas de suministro local(2)</option>
                        <option value="3" class="item3">Existen solamente dos entradas del suministro eléctrico local(3)
                        </option>
                        <option value="4" class="item4">Hay una sola entrada del suministro eléctrico local(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item31">
                        <span class="question-number">31.</span> la IES cuenta con un tablero de control e interruptor
                        de sobrecarga debidamente protegido
                    </label>
                    <select id="item31" name="item31" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los paneles de control u otros elementos se encuentran en buen
                            estado, están protegidos y funcionan correctamente(1)</option>
                        <option value="2" class="item2">Los paneles de control u otros elementos se encuentran en
                            regular estado. Las medidas proporcionan protección mínima(2)</option>
                        <option value="3" class="item3">Los paneles de control u otros elementos se encuentran en mal
                            estado. Las medidas proporcionan protección parcial(3)</option>
                        <option value="4" class="item4">Los tableros de control u otros elementos se encuentran en muy
                            mal estado sin medidas protectoras(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item32">
                        <span class="question-number">32.</span> Existen sistemas eléctricos externos instalados dentro
                        del perímetro de la IES
                    </label>
                    <select id="item32" name="item32" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se ha instalado subestaciones eléctricas, que están bien
                            protegidas y proporcionan electricidad suficiente a la IES , en caso de emergencia o
                            desastre(1)</option>
                        <option value="2" class="item2">Se han instalado sub estaciones que brindan energía para gran
                            parte de la IES, pero son vulnerables(2)</option>
                        <option value="3" class="item3">Se ha instalado subestaciones; algunas medidas bridan protección
                            parcial pero son vulnerables y no proporcionan enrgìa a toda la IES (3)</option>
                        <option value="4" class="item4">No se ha instalado subestaciones eléctricas para atender la
                            demanda de la IES (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item33">
                        <span class="question-number">33.</span> La IES cuenta con sistemas de iluminación en sitios
                        clave
                    </label>
                    <select id="item33" name="item33" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Buena iluminación y medidas de protección implementadas(1)
                        </option>
                        <option value="2" class="item2">Iluminación satisfactoria de las áreas críticas; algunas medidas
                            proporcionan protección parcial(2)</option>
                        <!-- <option value="3" class="item3">(3)</option> -->
                        <option value="4" class="item4">Iluminación deficiente; no hay medidas protectoras;(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item34">
                        <span class="question-number">34.</span> Seguridad de los sistemas de iluminación interno y
                        externo
                    </label>
                    <select id="item34" name="item34" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los sistemas de alumbrado interno y externo se encuantran en
                            buen estado, están bien protegidos y funcionan correctamente(1)</option>
                        <option value="2" class="item2">Los sistemas de alumbrado interno y externo se hallan en regular
                            estado, protección parcial con las medidas(2)</option>
                        <option value="3" class="item3">los sistemas de alumbrado interno y externo se hallan en mal
                            estado, algunas medidas protectoras(3)</option>
                        <option value="4" class="item4">Los sistemas de alumbrado interno y externo se hallan en muy mal
                            estado, no existen medidas protectoras(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item35">
                        <span class="question-number">35.</span> Restablecimiento de emergencias en sistemas de
                        iluminación de la IES
                    </label>
                    <select id="item35" name="item35" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Existen procedimientos documentados, los registros de
                            mantenimiento e inspeccion son actales, hay personal y recursos para ejecutar mantenimiento
                            y restablecer la energía en caso de emergencia(1)</option>
                        <option value="2" class="item2">Existen registros parciales de mantenimieno e inspeccion, se
                            cuenta con personal capacitado(2)</option>
                        <option value="3" class="item3">Existen registros parciales de mantenimiento e inspección(3)
                        </option>
                        <option value="4" class="item4">No hay registros de procedimientos de mantenimiento e
                            inspección(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion3">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad no estructural de las IES</h3>
        <h5 class="text-center rounded form-title">TELECOMUNICACIONES</h5>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item34">
                        <span class="question-number">34.</span> ESTADO TÉCNICO DE ANTENAS Y SOPORTES
                    </label>
                    <select id="item34" name="item34" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">Sin antenas (0)</option>
                        <option value="1" class="item1">Antenas y medios de sujeción en buen estado, bien asegurados y
                            con medidas de protección(1)</option>
                        <option value="2" class="item2">Antenas y medios de sujecion en condiciones regulares.(2)
                        </option>
                        <option value="3" class="item3">Antenas y medios de sujeción en malas condiciones. Medidas de
                            protección parcial(3)</option>
                        <option value="4" class="item4">Antenas y medios de sujeción en muy mal estado. No se tiene
                            medidas protectoras(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item35">
                        <span class="question-number">35.</span> ESTADO TÉCNICO DE SISTEMAS DE BAJA TENSIÓN (telefonía,
                        internet)
                    </label>
                    <select id="item35" name="item35" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los sistemas de bajo voltaje están en buen estado, bien
                            asegurados y con medidas de protección(1)</option>
                        <!-- <option value="2" class="item2">(2)</option> -->
                        <option value="3" class="item3">Los sistemas de bajo voltaje están en mal estado, medidas
                            protectoras parciales(3)</option>
                        <option value="4" class="item4">Los sistemas de bajo voltaje se hallan en muy mal estado, no hay
                            medidas protectoras(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item36">
                        <span class="question-number">36.</span> ESTADO TÉCNICO DE SISTEMAS DE COMUNICACIÓN ALTERNA
                    </label>
                    <select id="item36" name="item36" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los sistemas de comunicación alterna de la IES, está en buenas
                            condiciones y se someten a prueba al menos una vez al año(1)</option>
                        <!-- <option value="2" class="item2">(2)</option> -->
                        <option value="3" class="item3">Los sistemas de comunicación alternativos no existen, están en
                            mal estado aunque funcionan(3)</option>
                        <option value="4" class="item4">Los sistemas de comunicación alternativos no existen, están en
                            muy mal estado o no funcionan(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item37">
                        <span class="question-number">37.</span> ESTADO TÉCNICO DE ANCLAJES DE LOS EQUIPOS Y SOPORTE DE
                        CABLES
                    </label>
                    <select id="item37" name="item37" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El equipo y los cables de telecomunicación están en buenas
                            condiciones, con medidas de protección completas(1)</option>
                        <option value="2" class="item2">El equipo y los cables de telecomunicación se hallan en regular
                            estado, las medidas de protección son parciales(2)</option>
                        <option value="3" class="item3">El equipo y los cables de telecomunicación se hallan en mal
                            estado, las medidas de protección son insuficientes(3)</option>
                        <option value="4" class="item4">El equipo y los cables de telecomunicación se hallan en muy mal
                            estado, no hay medidas de protección(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item38">
                        <span class="question-number">38.</span> ESTADO TÉCNICO DE SISTEMAS DE TELECOMUNICACIONES
                        EXTERNAS DENTRO DE LA IES
                    </label>
                    <select id="item38" name="item38" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los sistemas de comunicación externos no causan interferencia en
                            las comunicaciones de la IES (1)</option>
                        <option value="2" class="item2">Los sistemas de telecomunicación externos causa interferencia
                            moderada en las comunicaciones de la IES (2)</option>
                        <option value="3" class="item3">Los sistemas de telecomunicación externos causan interferencia
                            en las comunicaciones de la IES.(3)</option>
                        <option value="4" class="item4">Los sistemas de telecomunicación externos causan gran
                            interferencia en las comunicaciones de la IES.(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item39">
                        <span class="question-number">39.</span> LOCAL DE ADMINISTRACIÓN APROPIADO DEL SISTEMA DE
                        TELECOMUNICACIONES
                    </label>
                    <select id="item39" name="item39" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los lugares donde se alojan los sistemas de telecomunicaciones
                            se hallan en buenas condiciones, cuenta con medidas de protección (1)</option>
                        <option value="2" class="item2">Los lugares donde se alojan los sistemas de telecomunicaciones
                            se hallan en condiciones regulares, algunas medidas brindan protección parcial(2)</option>
                        <option value="3" class="item3">Los lugares donde se aloja los sistemas de telecomunicaciones
                            están en mal estado, podrían fallar por efecto de una emergencia(3)</option>
                        <option value="4" class="item4">No existen sistemas de comunicación interna.(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item40">
                        <span class="question-number">40.</span> ESTADO TÉCNICO DEL SISTEMA INTERNO DE COMUNICACIÓN
                    </label>
                    <select id="item40" name="item40" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los sistemas de comunicación interna y los respaldos necesarios
                            se hallan en buen estado y funcionan bien(1)</option>
                        <option value="2" class="item2">Los sistemas de comunicación interna se hallan en condiciones
                            regulares, no existen sistemas alternativos(2)</option>
                        <!-- <option value="3" class="item3">(3)</option> -->
                        <option value="4" class="item4">No existen sistemas de comunicación interna.(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item41">
                        <span class="question-number">41.</span> SEGURIDAD DEL SISTEMA INTERNO DE COMUNICACIONES
                    </label>
                    <select id="item41" name="item41" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1"> Existen procedimientos documentados, todos los registros están
                            al día, se ha capacitado al personal y hay suficientes recursos(1)</option>
                        <option value="2" class="item2">Hay registros parciales de procedimientos de mantenimiento e
                            inspección, cuenta con personal capacitado y hay recursos limitados(2)</option>
                        <option value="3" class="item3">No hay registros de procedimientos de mantenimiento e
                            inspección, sin embargo, el personal está capacitado, pero no hay recursos(3)</option>
                        <option value="4" class="item4">No hay registros de procedimientos de mantenimiento e
                            inspección(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion4">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad no estructural de las IES</h3>
        <h5 class="text-center rounded form-title">SISTEMA DE PROVISIÓN DE AGUA</h5>


        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item42">
                        <span class="question-number">42.</span> AUTONOMÍA
                    </label>
                    <select id="item42" name="item42" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con un depósito de agua para mas de 72 horas(1)
                        </option>
                        <option value="2" class="item2">Se cuenta con un depósito de agua para 72 horas(2)</option>
                        <option value="3" class="item3">Se cuenta con un depósito de agua para 24 horas o menos(3)
                        </option>
                        <option value="4" class="item4">No se cuenta con depósito de agua(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item43">
                        <span class="question-number">43.</span> UBICACIÓN DE LOS DEPÓSITOS DE AGUA
                    </label>
                    <select id="item43" name="item43" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">La IES cuenta con ubicaciòn de los depósitos de agua con bajo
                            riesgo de falla(1)</option>
                        <option value="2" class="item2">La IES es vunerable con riesgos de falla(2)</option>
                        <!-- <option value="3" class="item3">(3)</option> -->
                        <option value="4" class="item4">La IES es vulnerable y tiene un riesgo elevado de falla
                            (elementos estructurales, arquitectónicos o sistémicos vulnerables)(4)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item44">
                        <span class="question-number">44.</span> SEGURIDAD DEL SISTEMA DE DISTRIBUCIÓN DE AGUA
                    </label>
                    <select id="item44" name="item44" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El sistema de distribución de agua esta en bunas condiciones y
                            produce mas del 80% de funcionamiento(1)</option>
                        <option value="2" class="item2">El sistema de distribución de agua tiene entre el 60 y 80% en
                            buenas condiciones de funcionamiento(2)</option>
                        <!-- <option value="3" class="item3">(3)</option> -->
                        <option value="4" class="item4">El sistema de distribución de agua tiene menos del 40% está en
                            buenas condiciones de funcionamiento(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item45">
                        <span class="question-number">45.</span> CISTERNA REDUNDANTE PARA DISTRIBUCIÓN DE AGUA
                    </label>
                    <select id="item45" name="item45" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Aporta mas del 80% de la demanda diaria en caso de
                            emergencias(1)</option>
                        <option value="2" class="item2">Aporta entre el 50% y 80% de la demanda en caso de
                            emergencias(2)</option>
                        <option value="3" class="item3">Aporta entre el 30% y 50% de la demanda diaria en caso de
                            emergencias(3)</option>
                        <option value="4" class="item4">Aporta menos del 30% de la demanda diaria en caso de emergencias
                            (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item46">
                        <span class="question-number">46.</span> SISTEMA DE BOMBEO (SUPLEMENTARIO)
                    </label>
                    <select id="item46" name="item46" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Todas las bombas suplementarias y los sistemas y los sisteas de
                            respaldo funcionan y satisfacen la demanda diaria mínima(1)</option>
                        <option value="2" class="item2">La capacidad operativa de la bomba satisface la demanda diaria
                            de agua en gran parte de la IES, existe bomba de respaldo(2)</option>
                        <option value="3" class="item3">La capacidad operativa de la bomba satisface la demanda diaria
                            de agua en gran parte de la IES, no existe bomba de respaldo(3)</option>
                        <option value="4" class="item4">La capacidad operativa no satisface la demanda diaria de agua,
                            no existe bomba de respaldo(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item47">
                        <span class="question-number">47.</span> RESTABLECIMIENTO DE EMERGENCIA DEL SISTEMA DE AGUA
                    </label>
                    <select id="item47" name="item47" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Todas las bombas suplementarias y los sistemas y los sisteas de
                            respaldo funcionan y satisfacen la demanda diaria mínima(1)</option>
                        <option value="2" class="item2">La capacidad operativa de la bomba satisface la demanda diaria
                            de agua en gran parte de la IES, existe bomba de respaldo(2)</option>
                        <option value="3" class="item3">La capacidad operativa de la bomba satisface la demanda diaria
                            de agua en gran parte de la IES, no existe bomba de respaldo(3)</option>
                        <option value="4" class="item4">La capacidad operativa no satisface la demanda diaria de agua,
                            no existe bomba de respaldo(4)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="item48">
                        <span class="question-number">48.</span> SEGURIDAD DEL RECINTO DE DISTRIBUCIÓN DE AGUA
                    </label>
                    <select id="item48" name="item48" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los elementos tienen una mínima posibilidad de dños que pudieran
                            impedir la función de estos y otros elementos, sistemas o actividades(1)</option>
                        <option value="2" class="item2">Los elementos están sujetos a daños, aunque los mismos no
                            impedirían la función de estos ni otros elementos, sistemas o actividades(2)</option>
                        <option value="3" class="item3">Los elementos están sujetos a daños que impedirían parcialmente
                            la función de éstos y otros elementos, sistemas o actividades(3)</option>
                        <option value="4" class="item4">Los elementos están sujetos a daños que impedirían la función de
                            éstos y otros elementos, sistemas o actividades(4)</option>
                    </select>
                </div>
            </div>

        </div>


        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion5">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad no estructural de las IES</h3>
        <h5 class="text-center rounded form-title">SISTEMA DE COMBUSTIBLES</h5>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item49">
                        <span class="question-number">49.</span> Tanques para combustibles con capacidad suficiente
                    </label>
                    <select id="item49" name="item49" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">La IES no cuenta con combustible de reserva(0)</option>
                        <option value="1" class="item1">Combustible suficiente para mas de 72 horas(1)</option>
                        <option value="2" class="item2">Combustible suficiente para 72 horas o menos(2)</option>
                        <option value="3" class="item3">Combustible suficiente para 24 horas o menos (3)</option>
                        <option value="4" class="item4">Combustible para menos de 12 horas(4)</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item50">
                        <span class="question-number">50.</span> Tanques para combustibles con anclaje y buena
                        protección
                    </label>
                    <select id="item50" name="item50" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los depósitos se hallan en buenas condiciones, los anclajes y
                            abrazaderas están buenas condiciones. La IES es segura y está protegida(1)</option>
                        <option value="2" class="item2">Los depósitos se hallan en condiciones regulares, los anclajes y
                            abrazaderas no son apropiados para resistir. La IES cuenta con algunas medidas de seguridad
                            y protección(2)</option>
                        <option value="3" class="item3">Los depósitos de combustible no están emplazados en lugar
                            seguro.(3)</option>
                        <option value="4" class="item4">No existen depósitos de combustible(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item51">
                        <span class="question-number">51.</span> Ubicación y seguridad apropiada en tanques y/o
                        cilindros
                    </label>
                    <select id="item51" name="item51" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El lugar en donde se almacena combustible está bien asegurado,
                            con buenas medidas de protección y de acceso fácil y seguro(1)</option>
                        <option value="2" class="item2">El lugar donde se almacena el combustible proporciona acceso y
                            protección parcial(2)</option>
                        <option value="3" class="item3">El lugar donde se almacena el combustible no tiene fácil acceso
                            y está en una localidad parcialmente segura(3)</option>
                        <option value="4" class="item4">El lugar donde se almacena el combustible no tiene fácil acceso
                            ni está en una localidad segura(4)</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item52">
                        <span class="question-number">52.</span> Seguridad del sistema de distribución (válvula,
                        tuberías y uniones)
                    </label>
                    <select id="item52" name="item52" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El sistema de combustible funciona con una seguridad de mas del
                            80%(1)</option>
                        <option value="2" class="item2">El sistema de combustible funciona con una seguridad del 60% al
                            80%(2)</option>
                        <option value="3" class="item3">El sistema de combustible sólo funciona al 60% con seguridad(3)
                        </option>
                        <option value="4" class="item4">No se cuenta con sistemas de distribución de combustible(4)
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item53">
                        <span class="question-number">53.</span> Mantenimiento y restablecimiento de emergencia de las
                        reservas de combustible
                    </label>
                    <select id="item53" name="item53" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <!-- <option value="1" class="item1">(1)</option> -->
                        <option value="2" class="item2">Existen registros documentados, personal capacitado, pero no hay
                            recursos(2)</option>
                        <option value="3" class="item3">No hay procedimientos documentados, pero el personal ha sido
                            capacitado, pero no hay recursos(3)</option>
                        <option value="4" class="item4">No hay procedimientos documentados ni registros de mantenimiento
                            e inspección(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item54">
                        <span class="question-number">54.</span> Tanques de combustible están conectados a tierra
                    </label>
                    <select id="item54" name="item54" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Todos los tanques de combustible están conectados a tierra(1)
                        </option>
                        <option value="2" class="item2">Algunos tanques de combustible están conectados a tierra(2)
                        </option>
                        <option value="3" class="item3">Algunos tanques de combustible están conectados a tierra y no se
                            usan procedimientos de seguridad(3)</option>
                        <option value="4" class="item4">No se cuenta con sistemas de tierra en los tanques de
                            combustible(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion6">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad no estructural de las IES</h3>
        <h5 class="text-center rounded form-title">GASES DE LABORATORIOS</h5>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item55">
                        <span class="question-number">55.</span> Almacenaje de gases de laboratorio
                    </label>
                    <select id="item55" name="item55" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">La IES no cuenta con gases de laboratorio(0)</option>
                        <option value="1" class="item1">Combustible suficiente para mas de 72 horas(1)</option>
                        <option value="2" class="item2">Combustible suficiente para 72 horas o menos(2)</option>
                        <option value="3" class="item3">Combustible suficiente para 24 horas o menos (3)</option>
                        <option value="4" class="item4">Combustible para menos de 12 horas(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item56">
                        <span class="question-number">56.</span> Fuente de gases y/o centralinas
                    </label>
                    <select id="item56" name="item56" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los depósitos se hallan en buenas condiciones, los anclajes y
                            abrazaderas están buenas condiciones. La IES es segura y está protegida(1)</option>
                        <option value="2" class="item2">Los depósitos se hallan en condiciones regulares, los anclajes y
                            abrazaderas no son apropiados para resistir. La IES cuenta con algunas medidas de seguridad
                            y protección(2)</option>
                        <option value="3" class="item3">Los depósitos de combustible no están emplazados en lugar
                            seguro.(3)</option>
                        <option value="4" class="item4">No existen depósitos de combustible(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item57">
                        <span class="question-number">57.</span> Ubicación apropiada de las bodegas de gas
                    </label>
                    <select id="item57" name="item57" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El lugar en donde se almacenan gases está bien asegurado, con
                            buenas medidas de protección y de acceso fácil y seguro(1)</option>
                        <option value="2" class="item2">El lugar donde se almacenan gases proporciona acceso y
                            protección parcial (2)</option>
                        <option value="3" class="item3">El lugar donde se almacenan gases no tiene fácil acceso y está
                            en una localidad parcialmente segura(3)</option>
                        <option value="4" class="item4">El lugar donde se almacenan gases no tiene fácil acceso ni está
                            en una localidad segura(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item58">
                        <span class="question-number">58.</span> Protección de tanques, cilindros y equipos
                        complementarios
                    </label>
                    <select id="item58" name="item58" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los depósitos se hallan en buenas condiciones, los anclajes y
                            abrazaderas están buenas condiciones. La IES es segura y está protegida(1)</option>
                        <option value="2" class="item2">Los depósitos se hallan en condiciones regulares, los anclajes y
                            abrazaderas no son apropiados para resistir. La IES cuenta con algunas medidas de seguridad
                            y protección(2)</option>
                        <option value="3" class="item3">Los depósitos de combustible no están emplazados en lugar
                            seguro.(3)</option>
                        <option value="4" class="item4">No existen depósitos de combustible(4)</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item59">
                        <span class="question-number">59.</span> Seguridad del sistema de distribución de gases
                    </label>
                    <select id="item59" name="item59" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con sistema de gases de laboratorio(0)</option>
                        <option value="1" class="item1">Anclajes suficientes y en buen estado(1)</option>
                        <option value="2" class="item2">Anclajes de buen calibre(2)</option>
                        <option value="3" class="item3">Anclajes de no buen calibre(3)</option>
                        <option value="4" class="item4">Sin anclaje(4)</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item60">
                        <span class="question-number">60.</span> Sistema de protección de incendios en bodegas de gas
                    </label>
                    <select id="item60" name="item60" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuentan con un sistema de gases de laboratorio(0)</option>
                        <option value="1" class="item1">Las bodegas de gas de laboratorio cuentan con un sistema
                            completo de extincion de incendios (1)</option>
                        <option value="2" class="item2">Las bodegas de gas de laboratorio cuentan con un sistema parcial
                            de extincion de incendios (2)</option>
                        <option value="3" class="item3">Las bodegas de gas de laboratorio solo cuentan con un sistema
                            básico de extinción de incendios(3)</option>
                        <option value="4" class="item4">Las bodegas de gas de laboratorio no cuentan con un sistema
                            básico de extinción de incendios(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion7">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad no estructural de las IES</h3>
        <h5 class="text-center rounded form-title">LABORATORIO DE QUÍMICA, BIOLOGÍA O TECNOLOGÍA ALIMENTARIA</h5>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item61">
                        <span class="question-number">61.</span> Anclajes de la estantería y seguridad de contenidos de
                        laboratorio
                    </label>
                    <select id="item61" name="item61" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Estanterías y contenido asegurado</option>
                        <option value="2" class="item2">Estantería asegurada</option>
                        <option value="3" class="item3">Estantería no asegurada</option>
                        <option value="4" class="item4">Estantría sin seguro y contenido peligroso</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item62">
                        <span class="question-number">62.</span> Condición y seguridad de los equipos de laboratorio
                    </label>
                    <select id="item62" name="item62" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Excelente, no necesitamos anclaje</option>
                        <option value="2" class="item2">Bueno , necesita anclaje Bueno</option>
                        <option value="3" class="item3">Regular</option>
                        <option value="4" class="item4">Malo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item63">
                        <span class="question-number">63.</span> Etiquetado de reactivos
                    </label>
                    <select id="item63" name="item63" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Etiquetado completo, sistema HMIS III</option>
                        <option value="2" class="item2">Etiquetado original, que incluya SGA (desde los fabricntes)
                        </option>
                        <option value="4" class="item4">Sin etiquetas</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item64">
                        <span class="question-number">64.</span> Almacenamiento lógico
                    </label>
                    <select id="item64" name="item64" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Bodegas seguras y con almacenamiento lógico</option>
                        <option value="2" class="item2">Bodegas seguras pero sin almacenamiento lógico</option>
                        <option value="3" class="item3">Bodegas inadecuadas</option>
                        <option value="4" class="item4">Bodegas inadecuadas y sin manejo lógico</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item65">
                        <span class="question-number">65.</span> Sistemas de protección de gases y sorbonas
                    </label>
                    <select id="item65" name="item65" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Centralina con buen acceso y seguridad </option>
                        <option value="2" class="item2">Centralina con seguridad Parcial</option>
                        <option value="3" class="item3">Centralina sin buen acceso y seguridad parcial</option>
                        <option value="4" class="item4">Centralina sin seguridad</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item66">
                        <span class="question-number">66.</span> Kits de atención de derrames
                    </label>
                    <select id="item66" name="item66" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Sistema completo de limpieza de derrames</option>
                        <option value="2" class="item2">Sistema de derrames para casi todos los químicos</option>
                        <option value="3" class="item3">Sistema básico de derrames</option>
                        <option value="4" class="item4">Sin sistema de derrame </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item67">
                        <span class="question-number">67.</span> MSDS´s
                    </label>
                    <select id="item67" name="item67" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Sistema completo de limpieza de derrames</option>
                        <option value="2" class="item2">Sistema de derrames para casi todos los químicos</option>
                        <option value="3" class="item3">Sistema basico de derrames</option>
                        <option value="4" class="item4">Sin sistema de derrame </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item68">
                        <span class="question-number">68.</span> Cubetos y sistemas de conducción
                    </label>
                    <select id="item68" name="item68" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Laboratorio con cubetos y conductos bien diseñados</option>
                        <option value="2" class="item2">Lab con cubetos o conductos</option>
                        <option value="3" class="item3">Lab con cubetos o conductos en malas condiciones</option>
                        <option value="4" class="item4">Lab sin cubetos o conductos</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item69">
                        <span class="question-number">69.</span> Bioprotección
                    </label>
                    <select id="item69" name="item69" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">EPI completo y especifico </option>
                        <option value="2" class="item2">EPI no especifico</option>
                        <option value="3" class="item3">EPI básico</option>
                        <option value="4" class="item4">Sin EPI</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item70">
                        <span class="question-number">70.</span> Sistemas de extinción de incendios
                    </label>
                    <select id="item70" name="item70" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Sistema completo</option>
                        <option value="2" class="item2">Sistema sin rociadores </option>
                        <option value="3" class="item3">Sistema en gabinetes</option>
                        <option value="4" class="item4">Sistema manual</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item71">
                        <span class="question-number">71.</span> Infraestructura de proteccion de explosiones
                    </label>
                    <select id="item71" name="item71" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Sistema antiexplosion</option>
                        <option value="2" class="item2">Sistema antiexplosion básico</option>
                        <option value="3" class="item3">Sistema de muros fuertes</option>
                        <option value="4" class="item4">Sistema de muros débiles</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item72">
                        <span class="question-number">72.</span> Manual de Procedimiento de emergencias
                    </label>
                    <select id="item72" name="item72" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Manual de procedimientos completo</option>
                        <option value="2" class="item2">Manual solo de químicos</option>
                        <option value="3" class="item3">Manual básico </option>
                        <option value="4" class="item4">Sin manual</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion8">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad no estructural de las IES</h3>
        <h5 class="text-center rounded form-title">LABORATORIO DE ELECTRICIDAD, ELECTRÓNICA O MECÁNICA</h5>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item73">
                        <span class="question-number">73.</span> ANCLAJES Y SEGURIDAD DE LOS CONTENIDOS DEL LABORATORIO
                    </label>
                    <select id="item73" name="item73" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Estantería y contenido asegurado(1)</option>
                        <option value="2" class="item2">Estantería asegurada(2)</option>
                        <option value="3" class="item3">Estantería no asegurada(3)</option>
                        <option value="4" class="item4">Estantería sin seguro y contenido peligroso(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item74">
                        <span class="question-number">74.</span> CUBETOS Y SISTEMAS DE CONDUCCIÓN
                    </label>
                    <select id="item74" name="item74" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <!-- <option value="1" class="item1">(1)</option> -->
                        <option value="2" class="item2">Laboratorios con cubetos o con conductos(2)</option>
                        <option value="3" class="item3">Laboratorio con cubetos o conductos en malas condiciones(3)
                        </option>
                        <option value="4" class="item4">Laboratorio sin cubetos no conductos(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item75">
                        <span class="question-number">75.</span> EQUIPOS DE PROTECCIÓN INDIVIDUAL
                    </label>
                    <select id="item75" name="item75" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <!-- <option value="1" class="item1">(1)</option> -->
                        <option value="2" class="item2">EPI no específico(2)</option>
                        <option value="3" class="item3">EPI básico(3)</option>
                        <option value="4" class="item4">sin EPI(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item76">
                        <span class="question-number">76.</span> SISTEMAS DE PROTECCIÓN DE MÁQUINAS
                    </label>
                    <select id="item76" name="item76" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Elementos de protección manuales y automáticos completos(1)
                        </option>
                        <option value="2" class="item2">Elementos de protección manuales y automáticos parciales(2)
                        </option>
                        <option value="3" class="item3">Elementos de protección manuales o automáticos (3)</option>
                        <option value="4" class="item4">Sin elementos de protección(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item77">
                        <span class="question-number">77.</span> SISTEMAS DE PROTECCIÓN DE INCENDIOS
                    </label>
                    <select id="item77" name="item77" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sistema completo(1)</option>
                        <option value="2" class="item2">Sistema sin rociadores(2)</option>
                        <option value="3" class="item3">Sistema solo en gabinete(3)</option>
                        <option value="4" class="item4">Sistema manual(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item78">
                        <span class="question-number">78.</span> SISTEMAS DE CORTE DE ENERGÍA DE EMERGENCIAS
                    </label>
                    <select id="item78" name="item78" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">El laboratorio cuenta con sistema automático de corte de energia
                            emergente(1)</option>
                        <option value="2" class="item2">El laboratorio cuenta con sistemas parciales de corte de energía
                            de emergenciq(2)</option>
                        <option value="3" class="item3">El laboratorio cuenta con sistemas manuales de corte de energía
                            en emergencias(3)</option>
                        <option value="4" class="item4">No existen en el laboratorio sistemas de corte de energía(4)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item79">
                        <span class="question-number">79.</span> SISTEMA DE PRIMEROS AUXILIOS
                    </label>
                    <select id="item79" name="item79" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">El laboratorio cuenta con sistemas específicos de primeros
                            auxilios(1)</option>
                        <option value="2" class="item2">El laboratorio cuenta con sistemas estándar de primeros
                            auxilios(2)</option>
                        <option value="3" class="item3">El laboratorio cuenta con sistemas básicos de primeros
                            auxilios(3)</option>
                        <option value="4" class="item4">El laboratorio no cuenta con sistemas de primeros auxilios(4)
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item80">
                        <span class="question-number">80.</span> Texto del ítem 80
                    </label>
                    <select id="item80" name="item80" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">No se cuenta con este tipo de laboratorio(0)</option>
                        <option value="1" class="item1">Manual de procedimiento completo(1)</option>
                        <option value="2" class="item2">Manual de procedimiento parcial(2)</option>
                        <option value="3" class="item3">Manual básico(3)</option>
                        <option value="4" class="item4">No existe manual(4)</option>
                    </select>
                </div>
            </div>
        </div>



        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion9">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">Seguridad no estructural de las IES</h3>
        <h5 class="text-center rounded form-title">ELEMENTOS ARQUITECTÓNICOS</h5>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item81">
                        <span class="question-number">81.</span> Equipos de Oficina
                    </label>
                    <select id="item81" name="item81" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los equipos de oficina están con una sujeción del mas del 80%
                        </option>
                        <option value="2" class="item2">Los equipos de oficina están sujetas de 20 a 80% de su totalidad
                        </option>
                        <option value="3" class="item3">Los equipos de oficina están sujetas en el 20% de su totalidad
                        </option>
                        <option value="4" class="item4">Los equipos de oficina no están sujetas ni fijas a la pared
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item82">
                        <span class="question-number">82.</span> Sistemas de ingreso y egreso
                    </label>
                    <select id="item82" name="item82" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Puertas, entradas y salidas en buen estado, con batiente externa
                            y miden mas de 115 cm de amplitud.</option>
                        <option value="2" class="item2">Puertas, entradas y salidas en regular estado, puertas de
                            batiente interna que miden menos de 115 cm de amplitud</option>
                        <option value="4" class="item4">Puertas, entradas y salidas en mal estado, sujetas a daños que
                            impiden su funciòn, puertas de batiente interna que miden menos de 115 cm de amplitud
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item83">
                        <span class="question-number">83.</span> Sistema de ventanas y persianas
                    </label>
                    <select id="item83" name="item83" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Ventanas y persianas en buen estado, con protecciones frente a
                            roturas</option>
                        <option value="2" class="item2">Ventanas y persianas en regular estado, </option>
                        <option value="3" class="item3">Ventanas y persianas en mal estado, </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item84">
                        <span class="question-number">84.</span> Elementos de cierra de la estructura
                    </label>
                    <select id="item84" name="item84" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Parte exterior de la estructura en buen estado(1)</option>
                        <option value="2" class="item2">Parte exterior de la estructura en regular estado(2)</option>
                        <option value="3" class="item3">Parte exterior de la estructura en regular estado. Con baja
                            probabilidad de daños que impedirían su función(3)</option>
                        <option value="4" class="item4">Parte exterior de la estructura en mal estado, con daños que
                            impedirìan su función(4)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item85">
                        <span class="question-number">85.</span> Techos y cuebiertas
                    </label>
                    <select id="item85" name="item85" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Techos y cubiertas en buen estado(1)</option>
                        <option value="2" class="item2">Techos y cubiertas en regular estado.(2)</option>
                        <option value="3" class="item3">Techos y cubiertas en regular estado, no fijos su daño no impide
                            su función(3)</option>
                        <option value="4" class="item4">Techos y cubiertas en mal estado, sujetos a daños que impedirían
                            su función. (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item86">
                        <span class="question-number">86.</span> Barandillas y pretiles
                    </label>
                    <select id="item86" name="item86" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Barandillas y pretiles en buen estado(1)</option>
                        <option value="2" class="item2">Barandillas y pretiles en regular estado(2)</option>
                        <option value="3" class="item3">Barandillas y pretiles en mal estado, sujeto apocos daños que
                            impedirían su función(3)</option>
                        <option value="4" class="item4">Barandillas y pretiles en mal estado, sujeto a daños que
                            impedirían su función(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item87">
                        <span class="question-number">87.</span> Muros y vallas perimetrales
                    </label>
                    <select id="item87" name="item87" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Muros y vallas perimetrales en buen estado(1)</option>
                        <option value="2" class="item2">Muros y vallas perimetrales en regular estado, sin estar sujeto
                            a daños que impedirían su función(2)</option>
                        <option value="3" class="item3">Muros y vallas perimetrales en mal estado, sujeto a daños que
                            impedirían su función(3)</option>
                        <option value="4" class="item4">Muros y vallas perimetrales en muy mal estado, sujeto a daños
                            que impedirían su función(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item88">
                        <span class="question-number">88.</span> Elementos arquitectónicos (cornisas, chimeneas,
                        letreros)
                    </label>
                    <select id="item88" name="item88" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <!-- <option value="1" class="item1">(1)</option> -->
                        <option value="2" class="item2">Estado regular, con pocas probabilidades de producir daños en su
                            función(2)</option>
                        <option value="3" class="item3">Estado malo, en caso de daños produciría algunos problemas con
                            su función(3)</option>
                        <option value="4" class="item4">Mal estado, podrían producir daños que impedirían su función(4)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item89">
                        <span class="question-number">89.</span> áreas y circulación externa
                    </label>
                    <select id="item89" name="item89" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los obstáculos o daños en las áreas de circulación no impiden el
                            paso de vehículos ni de peatones(1)</option>
                        <option value="2" class="item2">Los obstáculos o daños en las áreas de circulación impiden el
                            paso de vehículos, pero si de peatones(2)</option>
                        <option value="3" class="item3">Los obstáculos o daños en las áreas de circulación impiden el
                            paso de vehículos, y dificulta el paso de peatones(3)</option>
                        <option value="4" class="item4">Los obstáculos o daños estructurales o áreas de circulación
                            impedirían el acceso de vehículos o peatones o los pondrían en peligro(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item90">
                        <span class="question-number">90.</span> Condiciones y seguridad de paredes internas, muros y
                        tabiques divisorios
                    </label>
                    <select id="item90" name="item90" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los obstáculos y daños en paredes internas, muros y tabiques
                            internos en buen estado. (1)</option>
                        <option value="2" class="item2">Los obstáculos y daños en paredes internas, muros y tabiques
                            internos en regular estado. (2)</option>
                        <option value="3" class="item3">Los obstáculos y daños en paredes internas, muros y tabiques
                            internos en mal estado. Su daño impide parcialmente su función(3)</option>
                        <option value="4" class="item4">Los obstáculos y daños en paredes internas, muros y tabiques
                            internos en mal estado. Su daño impide función(4)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item91">
                        <span class="question-number">91.</span> Falsos techos y cielos rasos
                    </label>
                    <select id="item91" name="item91" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Falsos techos o cielos rasos en buen estado(1)</option>
                        <option value="2" class="item2">Falsos techos o cielos rasos en estado regular, sujetos a daños,
                            aunque no impedirían su función(2)</option>
                        <option value="3" class="item3">Falsos techos o cielos rasos en mal estado, sujetos a daños que
                            impedirían parcielmente la función de estos y otros elementos, sistemas o actividades(3)
                        </option>
                        <option value="4" class="item4">Falsos techos o cielos rasos en muy mal estado, sujetos a daños
                            que impedirían la función de estos y otros elementos, sistemas o actividades(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item92">
                        <span class="question-number">92.</span> Ascensores
                    </label>
                    <select id="item92" name="item92" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="0" class="item0">La IES no cuenta con elevadores(0)</option>
                        <option value="1" class="item1">Sistema de elevadores en buen estado(1)</option>
                        <option value="2" class="item2">Sistema de elevadores en regular estado. Sus daños no impiden su
                            función(2)</option>
                        <option value="3" class="item3">Sistema de elevadores en mal estado. Sus daños impiden
                            parcialmente su función(3)</option>
                        <option value="4" class="item4">Sistema de elevadores en muy mal estado, sujeto a daños que
                            impedirían su función(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item93">
                        <span class="question-number">93.</span> Escaleras y rampas
                    </label>
                    <select id="item93" name="item93" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Escaleras y rampas en buen estado. Rampas con pendiente menor de
                            10 grados(1)</option>
                        <option value="2" class="item2">Escaleras y rampas en regular estado. Rampas con pendiente de 10
                            a 15 grados(2)</option>
                        <option value="3" class="item3">Escaleras y rampas en mal estado, sujetas a daños o presencias
                            de obstáculos que impedirían parcialmente su función. Rampas con pendientes mayores a 15
                            grados(3)</option>
                        <option value="4" class="item4">Escaleras y rampas en muy mal estado, sujetas a daños o
                            presencias de obstáculos que impedirían su función. Rampas con penientes mayores a 15 grados
                            y mas de seis metros de longitud(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item94">
                        <span class="question-number">94.</span> Recubrimiento de pisos
                    </label>
                    <select id="item94" name="item94" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Recubrimiento de pisos en buen estdo(1)</option>
                        <option value="2" class="item2">Recubrimiento de pisos en regular estado aunque su daño no
                            impediría su función(2)</option>
                        <option value="3" class="item3">Recubrimiento de pisos en mal estado, su daño impediría
                            parcialmente su función(3)</option>
                        <option value="4" class="item4">Recubrimientos de los pisos en muy mal estado, sujetos a daños
                            que impedirían su función(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item95">
                        <span class="question-number">95.</span> Accesos a la IES
                    </label>
                    <select id="item95" name="item95" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Las vías de acceso no se dañaràn ni obstaculizarán el acceso a
                            la IES.(1)</option>
                        <option value="2" class="item2">Las vías de acceso están sujetas a daños que sólo permiten el
                            acceso peatonal a las IES (2)</option>
                        <option value="3" class="item3">Las vías de acceso están sujetas a daños que impidirían
                            parcialmente el acceso a la IES en caso de emergencia o desastre(3)</option>
                        <option value="4" class="item4">Las vías de acceso a la IES está sujeta a aparición de
                            obstáculos y daños que impidirían el acceso a la IES(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item96">
                        <span class="question-number">96.</span> Salidas de emergencia y evacuación
                    </label>
                    <select id="item96" name="item96" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Todas las salidas y rutas de evacuación están claramente
                            señalizadas y sin obstáculos(1)</option>
                        <option value="2" class="item2">Algunas salidas y rutas de evacuación están señalizadas y la
                            mayoría no presentan mayores obstáculos(2)</option>
                        <option value="3" class="item3">Las salidas y rutas de evacuación no están claramente
                            señalizadas y muchas están bloqueadas(3)</option>
                        <option value="4" class="item4">Las salidas y rutas de evacuación no están señalizadas y están
                            bloquedas(4)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">

            <div class="col">
                <div class="form-group">
                    <label for="item97">
                        <span class="question-number">97.</span> Seguridad física de personas e instalaciones
                    </label>
                    <select id="item97" name="item97" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se ha implementado una amplia gama de medidas de control de
                            acceso y egreso de la comunidad universitaria(1)</option>
                        <option value="2" class="item2">Se han implementado medidas mínimas e control de egreso, ingreso
                            de la comunidad universitaria(2)</option>
                        <option value="3" class="item3">Se han implementado medidas parciales de control de acceso y
                            egreso de la comunidad universitaria(3)</option>
                        <option value="4" class="item4">No se ha implementado medidas de control de acceso y egreso de
                            la comunidad universitaria(4)</option>
                    </select>
                </div>
            </div>
        </div>


        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion10">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD FUNCIONAL EN REDUCCIÓN DE RIESGOS</h3>
        <h5 class="text-center rounded form-title">Organización del Comité de Gestión de Riesgos</h5>


        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item98">
                        <span class="question-number">98.</span> Comité formalmente establecido para gestionar las
                        emergencias o desastres
                    </label>
                    <select id="item98" name="item98" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Comité formalizado y operando (1)</option>
                        <option value="2" class="item2">Comité operando (2)</option>
                        <option value="3" class="item3">Comité Débilmente organizado (3)</option>
                        <option value="4" class="item4">Sin comité (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item99">
                        <span class="question-number">99.</span> Los miembros del Comité tienen responsabilidades
                        específicas
                    </label>
                    <select id="item99" name="item99" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Comité con personal multidisciplinario (1)</option>
                        <!-- <option value="2" class="item2">(2)</option> -->
                        <option value="3" class="item3">Comité con poco personal (3)</option>
                        <option value="4" class="item4">Comité operando pero sin personal (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item100">
                        <span class="question-number">100.</span> La IES cuenta con un Centro de Reducción de
                        Riesgo/Operaciones de Emergencia
                    </label>
                    <select id="item100" name="item100" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con un centro específico y seguro (1)</option>
                        <option value="2" class="item2">Cuenta con un centro específico (2)</option>
                        <option value="3" class="item3">No tiene un sitio específico , usa varios (3)</option>
                        <option value="4" class="item4">No tiene un sitio de reunión (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item101">
                        <span class="question-number">101.</span> El CRRD cuenta con equipos informáticos
                    </label>
                    <select id="item101" name="item101" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con todo un sistema informático (1)</option>
                        <option value="2" class="item2">Parcialmente tiene un sistema informático (2)</option>
                        <option value="3" class="item3">Cuenta con un sistema informático básico (3)</option>
                        <option value="4" class="item4">No cuenta con un sistema informático (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item102">
                        <span class="question-number">102.</span> El sistema de comunicaciones interna y externa
                        funciona adecuadamente
                    </label>
                    <select id="item102" name="item102" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sistema interno y externo funcional (1)</option>
                        <option value="2" class="item2">Sistema interno y externo funciona parcialmente (2)</option>
                        <option value="3" class="item3">Sólo se cuenta con un sistema (3)</option>
                        <option value="4" class="item4">No se tiene sistema de comunicaciones(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item103">
                        <span class="question-number">103.</span> El CRRD cuenta con mobiliario adecuado
                    </label>
                    <select id="item103" name="item103" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con equipo y mobiliario apropiado (1)</option>
                        <option value="2" class="item2">Cuenta con equipo inmobiliario no apropiado (2)</option>
                        <option value="3" class="item3">Equipo parcial (3)</option>
                        <option value="4" class="item4">Sin equipo (4)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item104">
                        <span class="question-number">104.</span> El CRRD cuenta con directorio telefónico actualizado y
                        disponible
                    </label>
                    <select id="item104" name="item104" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con directorio completo y actualizado (1)</option>
                        <option value="2" class="item2">Cuenta con directorio completo, pero no actualizado (2)</option>
                        <option value="3" class="item3">Directorio parcial (3)</option>
                        <option value="4" class="item4">Sin Directorio (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item105">
                        <span class="question-number">105.</span> Se cuenta con TARJETAS DE ACCIÓN para todo el personal
                    </label>
                    <select id="item105" name="item105" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Todo el personal cuenta con tarjetas de acción (1)</option>
                        <option value="2" class="item2">Parcialmente el personal cuenta con tarjetas de acción (2)
                        </option>
                        <option value="3" class="item3">Sólo el personal del COE cuenta con tarjeta dirección (3)
                        </option>
                        <option value="4" class="item4">Nadie tiene tarjeta de acción (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion11">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD FUNCIONAL EN REDUCCIÓN DE RIESGOS</h3>
        <h5 class="text-center rounded form-title">Procedimientos Operativos Estándar de Reducción de Riesgos</h5>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item106">
                        <span class="question-number">106.</span> Refuerzo de los servicios esenciales de la IES
                    </label>
                    <select id="item106" name="item106" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Los servicios esenciales cuentan con refuerzos (1)</option>
                        <option value="2" class="item2">Los servicios esenciales , cuentan parcialmente con refuerzos
                            (2)</option>
                        <option value="3" class="item3">Los servicios esenciales cuentan con refuerzos mínimos (3)
                        </option>
                        <option value="4" class="item4">Los servicios esenciales no tienen refuerzos (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item107">
                        <span class="question-number">107.</span> Procedimientos para la activación y desactivación del
                        plan.
                    </label>
                    <select id="item107" name="item107" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El plan cuenta con un procedimiento probado de activación y
                            desactivación (1)</option>
                        <option value="2" class="item2">El plan cuenta con procedimientos parciales de activación y
                            desactivación (2)</option>
                        <option value="3" class="item3">El plan cuenta con uno solo de los procedimientos (3)</option>
                        <option value="4" class="item4">El plan no provee procedimientos de activación y desactivación
                            (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item108">
                        <span class="question-number">108.</span> Previsiones administrativas especiales para desastres
                    </label>
                    <select id="item108" name="item108" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con todas las previsiones administrativas (1)</option>
                        <option value="2" class="item2">Se cuenta con las previsiones administrativas esenciales (2)
                        </option>
                        <option value="3" class="item3">Se cuenta con muy pocas previsiones administrativas (3)</option>
                        <option value="4" class="item4">No se cuenta con provisiones administrativas (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item109">
                        <span class="question-number">109.</span> Recursos financieros para emergencias presupuestado y
                        garantizado.
                    </label>
                    <select id="item109" name="item109" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con recursos financieros garantizados para la emergencia
                            (1)</option>
                        <option value="2" class="item2">Cuenta con algunos recursos financieros para la emergencia(2)
                        </option>
                        <option value="3" class="item3">Cuenta con pocos recursos financieros (3)</option>
                        <option value="4" class="item4">No cuenta con recursos financieros (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item110">
                        <span class="question-number">110.</span> Procedimientos para habilitación de espacios para
                        impartir clases en caso de necesidad
                    </label>
                    <select id="item110" name="item110" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con espacios de emergencia suficiente para impartir
                            clases (1)</option>
                        <option value="2" class="item2">Cuenta con espacios de emergencia para impartir clases (2)
                        </option>
                        <option value="3" class="item3">Cuenta con pocos espacios de emergencia para impartir clases (3)
                        </option>
                        <option value="4" class="item4">No cuenta con espacios de emergencia para impartir clases (4)
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item111">
                        <span class="question-number">111.</span> Procedimiento para alertas de desastres y emergencias
                    </label>
                    <select id="item111" name="item111" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con un procedimiento total para alertar emergencias (1)
                        </option>
                        <option value="2" class="item2">Cuenta con un procedimiento general para alertar emergencias(2)
                        </option>
                        <option value="3" class="item3">Cuenta con un procedimiento parcial de alerta de emergencias(3)
                        </option>
                        <option value="4" class="item4">No cuenta con un procedimiento de alerta de emergencias(4)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item112">
                        <span class="question-number">112.</span> procedimientos de reforzamiento de seguridad
                    </label>
                    <select id="item112" name="item112" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El sistema de seguridad cuenta con plan de reforzamiento (1)
                        </option>
                        <option value="2" class="item2">El sistema de seguridad sólo puede reforzar áreas sensibles (2)
                        </option>
                        <option value="3" class="item3">El sistema es de seguridad tiene un Sistema parcial de refuerzo
                            (3)</option>
                        <option value="4" class="item4">El sistema de seguridad no tiene plan de refuerzo (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item113">
                        <span class="question-number">113.</span> Procedimientos para protección de expedientes y
                        documentos sensibles de la IES
                    </label>
                    <select id="item113" name="item113" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con procedimiento de protección de información (1)
                        </option>
                        <option value="2" class="item2">Cuenta con un procedimiento de protección básica de información
                            (2)</option>
                        <option value="3" class="item3">Cuenta con un procedimiento de protección parcial de información
                            (3)</option>
                        <option value="4" class="item4">No cuenta con procedimiento de protección de información (4)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item114">
                        <span class="question-number">114.</span> Inspección regular de seguridad por la Unidad de
                        Gestión de Riesgos
                    </label>
                    <select id="item114" name="item114" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Plan completo de inspección de seguridad (1)</option>
                        <option value="2" class="item2">Plan general de Inspección de seguridad (2)</option>
                        <option value="3" class="item3">Parcialmente se hacen inspecciones de seguridad (3)</option>
                        <option value="4" class="item4">No se hacen inspecciones de seguridad (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item115">
                        <span class="question-number">115.</span> Procedimientos para respuesta inclusiva de desastres
                    </label>
                    <select id="item115" name="item115" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con procedimiento inclusivo de desastres completo (1)
                        </option>
                        <option value="2" class="item2">Cuenta con procedimiento general inclusivo de desastres(2)
                        </option>
                        <option value="3" class="item3">Cuenta con plan para una discapacidad (3)</option>
                        <option value="4" class="item4">No cuenta con plan inclusivo de desastres (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item116">
                        <span class="question-number">116.</span> Procedimientos para triage, reanimación,
                        estabilización y tratamiento
                    </label>
                    <select id="item116" name="item116" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con sistemas integrados de triage(1)</option>
                        <option value="2" class="item2">Se cuenta con sistemas generales de triage(2)</option>
                        <option value="3" class="item3">Se cuenta con sistemas parciales de triage(3)</option>
                        <option value="4" class="item4">No se cuenta con un sistema de triage (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item117">
                        <span class="question-number">117.</span> Transporte y soporte logístico.
                    </label>
                    <select id="item117" name="item117" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con sistema de transporte y logística preparado (1)
                        </option>
                        <option value="2" class="item2">Se cuenta con sistema de transporte y logística NO preparado (2)
                        </option>
                        <option value="3" class="item3">Se cuenta con poco transporte y logístico (3)</option>
                        <option value="4" class="item4">No se cuenta con transporte y logística (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item118">
                        <span class="question-number">118.</span> Raciones alimenticias para el personal del CRRD
                        durante la emergencia.
                    </label>
                    <select id="item118" name="item118" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se tiene un plan de logística alimentaria completa y segura (1)
                        </option>
                        <option value="2" class="item2">Se tiene un plan de logística alimentaria no seguro (2)</option>
                        <option value="3" class="item3">Se tiene un plan de logística alimentaria parcial (3)</option>
                        <option value="4" class="item4">No se tiene un plan de logística alimentaria (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item119">
                        <span class="question-number">119.</span> Asignación de funciones para el personal movilizado
                        durante la emergencia.
                    </label>
                    <select id="item119" name="item119" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El personal movilizado sabe sus funciones y tiene todo el equipo
                            para ello (1)</option>
                        <option value="2" class="item2">El personal movilizado sabe sus funciones y tiene todo el equipo
                            para ello (2)</option>
                        <option value="3" class="item3">El personal movilizado tiene equipo pero no sabe sus funciones
                            (3)</option>
                        <option value="4" class="item4">El personal movilizado no sabe sus funciones ahora (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item120">
                        <span class="question-number">120.</span> Medidas para garantizar el bienestar del personal
                        adicional de emergencia.
                    </label>
                    <select id="item120" name="item120" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Sistema de bienestar garantizado (1)</option>
                        <option value="2" class="item2">Sistema general de bienestar garantizado (2)</option>
                        <option value="3" class="item3">Sistema parcial de bienestar (3)</option>
                        <option value="4" class="item4">Sin sistema de bienestar (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item121">
                        <span class="question-number">121.</span> Mecanismos para elaborar el censo de estudiantes,
                        profesores y funcionarios en cada estructura
                    </label>
                    <select id="item121" name="item121" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Mecanismos certificados para censos de personal (1)</option>
                        <option value="2" class="item2">Mecanismo descenso de personas(2)</option>
                        <option value="3" class="item3">Parcialmente se hace censos de personas (3)</option>
                        <option value="4" class="item4">No se tiene mecanismos para censo de personas (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item122">
                        <span class="question-number">122.</span> Sistema de manejo de victimas en masa
                    </label>
                    <select id="item122" name="item122" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El sistema de MV cuenta con todas sus fases (1)</option>
                        <option value="2" class="item2">El sistema de MV cuenta con algunas de sus fases(2)</option>
                        <option value="3" class="item3">El sistema de MV es general (3)</option>
                        <option value="4" class="item4">No se cuenta con sistemas de MV (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item123">
                        <span class="question-number">123.</span> Procedimientos de información al público y la prensa
                    </label>
                    <select id="item123" name="item123" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con procedimientos totales de información pública (1)
                        </option>
                        <option value="2" class="item2">Se cuenta con procedimientos parciales de información pública
                            (2)</option>
                        <option value="3" class="item3">Se cuenta con sistema de información pública, pero sin
                            procedimiento (3)</option>
                        <option value="4" class="item4">No se cuenta con un sistema de información pública (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item124">
                        <span class="question-number">124.</span> Procedimientos operativos para respuesta en turnos de
                        noche, fines de semana y feriados.
                    </label>
                    <select id="item124" name="item124" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con procedimientos formales de turnos extra (1)
                        </option>
                        <option value="2" class="item2">Se cuenta con procedimiento de turno extra coma sin formalizado
                            de formalidad (2)</option>
                        <option value="3" class="item3">Sólo los miembros del COE tienen procedimiento de turno extra
                            (3)</option>
                        <option value="4" class="item4">No se cuenta compro seguimiento de turno extra (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item125">
                        <span class="question-number">125.</span> Ejercicios de simulación o simulacros
                    </label>
                    <select id="item125" name="item125" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se tiene procedimiento de simulaciones y simulacros (1)</option>
                        <option value="2" class="item2">Se cuenta con procedimientos de simulaciones (2)</option>
                        <option value="3" class="item3">No se cuentan con procedimientos de simulaciones (3)</option>
                        <option value="4" class="item4">No se cuenta con procedimientos de simulaciones y simulacros (4)
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item126">
                        <span class="question-number">126.</span> Procedimientos para atención de desastres
                    </label>
                    <select id="item126" name="item126" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con procedimientos para desastres naturales y
                            antrópicos priorizados (1)</option>
                        <option value="2" class="item2">Se cuenta comprocedimiento para desastres tecnológicos y
                            antrópicos sin priorizados (2)</option>
                        <option value="3" class="item3">Se cuenta comprocedimiento para uno de los dos tipos de
                            desastres (3)</option>
                        <option value="4" class="item4">No se cuenta compro seguimientos para responder a desastres (4)
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item127">
                        <span class="question-number">127.</span> Plan de mantenimiento preventivo para servicios
                        vitales
                    </label>
                    <select id="item127" name="item127" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con plan de mantenimiento preventivo total (1)
                        </option>
                        <option value="2" class="item2">Se cuenta con plan de mantenimiento preventivo de servicio
                            vitales (2)</option>
                        <option value="3" class="item3">Se cuenta con plan de mantenimiento preventivo parcial (3)
                        </option>
                        <option value="4" class="item4">No se cuenta con plan de mantenimientos preventivo (4)</option>
                    </select>
                </div>
            </div>
        </div>


        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion12">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD FUNCIONAL EN REDUCCIÓN DE RIESGOS</h3>
        <h5 class="text-center rounded form-title">Disponibilidad de logística, insumos y equipos para afrontar
            desastres</h5>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item128">
                        <span class="question-number">128.</span> Medicamentos básicos
                    </label>
                    <select id="item128" name="item128" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con lista y medicamentos para emergencia (1)</option>
                        <option value="2" class="item2">Cuenta con medicamentos para emergencia (2)</option>
                        <option value="3" class="item3">Cuenta con pocos medicamentos para emergencia (3)</option>
                        <option value="4" class="item4">No cuenta con medicamentos (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item129">
                        <span class="question-number">129.</span> Material de curación y primeros auxilios
                    </label>
                    <select id="item129" name="item129" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con suficiente material de primeros auxilios y
                            curación (1)</option>
                        <option value="2" class="item2">Se cuenta con material de curación ,pero no es suficiente (2)
                        </option>
                        <option value="3" class="item3">Se cuenta con poco material de curación (3)</option>
                        <option value="4" class="item4">No se cuenta con material de curación (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item130">
                        <span class="question-number">130.</span> Instrumental
                    </label>
                    <select id="item130" name="item130" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con suficiente material instrumental (1)</option>
                        <option value="2" class="item2">Se cuenta con material instrumental pero no es suficiente (2)
                        </option>
                        <option value="3" class="item3">Se cuenta con poco material instrumental (3)</option>
                        <option value="4" class="item4">No se cuenta con material instrumental (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item131">
                        <span class="question-number">131.</span> Gases medicinales.
                    </label>
                    <select id="item131" name="item131" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con suficiente gas medicinal (1)</option>
                        <option value="2" class="item2">Se cuenta con gas medicinal pero no es suficiente (2)</option>
                        <option value="3" class="item3">Se cuenta con poco gas medicinal (3)</option>
                        <option value="4" class="item4">No se cuenta con gas medicinal (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item132">
                        <span class="question-number">132.</span> Equipos para soporte de vida.
                    </label>
                    <select id="item132" name="item132" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con equipo de SVB (1)</option>
                        <option value="2" class="item2">Se cuenta con equipo de SVB pero no es suficiente (2)</option>
                        <option value="3" class="item3">Se cuenta con un equipo de SVB (3)</option>
                        <option value="4" class="item4">No se cuenta con equipo de SVB(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item133">
                        <span class="question-number">133.</span> Equipos de protección personal
                    </label>
                    <select id="item133" name="item133" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Se cuenta con EPI completo (1)</option>
                        <option value="2" class="item2">Se cuenta con EPI completo, pero no es suficiente (2)</option>
                        <option value="3" class="item3">Se cuenta con poco EPI completo (3)</option>
                        <option value="4" class="item4">No se cuenta con EPI completo (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion13">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD ADMINISTRATIVA</h3>
        <h5 class="text-center rounded form-title">Invertir en Reducción de Riesgos de Desastres</h5>


        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item134">
                        <span class="question-number">134.</span> Los líderes de la IES invierten en actividades para la
                        preparación para emergencias y desastres.
                    </label>
                    <select id="item134" name="item134" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con POA y partida completa para destares (1)</option>
                        <option value="2" class="item2">Cuenta con POA y partida parcial para destares (2)</option>
                        <option value="3" class="item3">Existen pocos fondos para desastres (3)</option>
                        <option value="4" class="item4">No existe fondos para destares (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item135">
                        <span class="question-number">135.</span> La IES tiene políticas y procedimientos para la
                        preparación para las emergencias y los desastres.
                    </label>
                    <select id="item135" name="item135" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuenta con políticas y procedimiento aprobados (1)</option>
                        <option value="2" class="item2">Cuenta con políticas y procedimiento NO aprobados (2)</option>
                        <!-- <option value="3" class="item3">(3)</option> -->
                        <option value="4" class="item4">No cuenta con políticas ni procedimientos (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item136">
                        <span class="question-number">136.</span> Las políticas y procedimientos de la IES para RRD
                        cumplen con las leyes y reglamentos vigentes.
                    </label>
                    <select id="item136" name="item136" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Cuentas con politicas y procedimientos aprobados y con normativa
                            local(1)</option>
                        <option value="2" class="item2">Cuenta con politicas y procedimientos NO aprobados, pero con
                            normativa local (2)</option>
                        <!-- <option value="3" class="item3">(3)</option> -->
                        <option value="4" class="item4">No cuenta conppooliticas ni prosedimientos (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item137">
                        <span class="question-number">137.</span> La IES revisa y actualiza regularmente sus políticas y
                        procedimientos para la RRD
                    </label>
                    <select id="item137" name="item137" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">La IES Cuenta con sistemas de monitoreo continuo de cumplimiento
                            de políticas(1)</option>
                        <option value="2" class="item2">La IES Cuenta con sistemas de generales de monitoreo de
                            cumplimiento de políticas(2)</option>
                        <option value="3" class="item3">La IES Cuenta con sistemas parciales de monitoreo de
                            cumplimiento de políticas(3)</option>
                        <option value="4" class="item4">La IES No cuenta con sistemas de monitoreo (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="item138">
                        <span class="question-number">138.</span> La IES incluye las actividades de preparación para RRD
                        en su presupuesto anual de operación.
                    </label>
                    <select id="item138" name="item138" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">La IES cuenta con con partidas formales para emergencias y
                            desastres (1)</option>
                        <option value="2" class="item2">La IES Cuenta con sistemas financieros para emergencias y
                            desastres (2)</option>
                        <option value="3" class="item3">La IES Cuenta con financiamiento parcial para emergencias y
                            desastres (3)</option>
                        <option value="4" class="item4">La IES No cuenta con sistemas de financiamiento para emergencias
                            y desastres (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion14">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD ADMINISTRATIVA</h3>
        <h5 class="text-center rounded form-title">Trabajo con la comunidad en RRD</h5>


        <div class="row mb-3">

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item139">
                        <span class="question-number">139.</span> La IES tiene procesos para responder advertencias de
                        las organizaciones de Gestión de Riesgos sobre emergencias y desastres
                    </label>
                    <select id="item139" name="item139" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">La IES Cuenta con procesos de opcionización y respuesta de
                            seguridad (1)</option>
                        <option value="2" class="item2">La IES Tiene un proceso de respuesta (2)</option>
                        <option value="3" class="item3">La IES Responde pero sin procesos (3)</option>
                        <option value="4" class="item4">La IES Punto no cuenta con procesos de respuesta ni priorización
                            (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item140">
                        <span class="question-number">140.</span> La IES trabaja con la comunidad para desarrollar
                        planes, políticas y procedimientos que integren la RRD
                    </label>
                    <select id="item140" name="item140" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <!-- <option value="1" class="item1">(1)</option> -->
                        <option value="2" class="item2">La IES Con socios externos, de forma precial (2)</option>
                        <option value="3" class="item3">La IES Trabaja con socios externos, de forma parcial (3)
                        </option>
                        <option value="4" class="item4">La IES No trabaja con socios externos (4)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item141">
                        <span class="question-number">141.</span> La IES participa con la comunidad en la planificación
                        de ejercicios contra los desastres.
                    </label>
                    <select id="item141" name="item141" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Conoce su rol y participa activamente en RRD(1)</option>
                        <option value="2" class="item2">IES Conoce su rol, pero participa parcialmente en desastres (2)
                        </option>
                        <option value="3" class="item3">La IES No conoce su rol pero participa parcialmente en reunión
                            de RRD (3)</option>
                        <option value="4" class="item4">IES Ni conoce su rol, ni participan reuniones de RRD(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item142">
                        <span class="question-number">142.</span> La IES tiene políticas y acuerdos de ayuda mutua con
                        comunidad para enfrentar una emergencia o desastre.
                    </label>
                    <select id="item142" name="item142" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Tiene acuerdos de cooperación mutua en todas las normas de
                            RRD(1)</option>
                        <option value="2" class="item2">IES Tiene acuerdos de cooperación mutua en temas generales de
                            RRD(2)</option>
                        <option value="3" class="item3">IES Tiene pocos acuerdos de cooperación mutua en RRD(3)</option>
                        <option value="4" class="item4">IES No tiene acuerdos de cooperación mutua en RRD(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion15">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD ADMINISTRATIVA</h3>
        <h5 class="text-center rounded form-title">La IES cuenta con un equipo multidisciplinario, avalado por la
            Dirección de Talento Humano</h5>

        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="item143">
                        <span class="question-number">143.</span> La IES tiene un comité multidisciplinario para
                        coordinar las actividades de preparación para emergencias y desastres.
                    </label>
                    <select id="item143" name="item143" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Cuenta con comité formal y multidisciplinario de GRD(1)
                        </option>
                        <option value="2" class="item2">IES Cuenta con comité multidisciplinario de GRD(2)</option>
                        <option value="3" class="item3">IES Cuenta parcialmente con comité GRD(3)</option>
                        <option value="4" class="item4">IES No cuenta con un comité multidisciplinario de GRD(4)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item144">
                        <span class="question-number">144.</span> La UGR es liderado por un individuo con formación
                        académica en gestión de riesgo de desastres
                    </label>
                    <select id="item144" name="item144" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">El comité esta liderado por un profesional en GDR(1)</option>
                        <option value="2" class="item2">El comité esta liderado por un individuo preparado en GDR(2)
                        </option>
                        <option value="3" class="item3">El comité esta liderado por un profesionales otra area a fin (3)
                        </option>
                        <option value="4" class="item4">El comité esta liderado por un profesional en otras areas (4)
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item145">
                        <span class="question-number">145.</span> La UGR en conjunto con Talento Humano han definido
                        claramente los roles, responsabilidades
                    </label>
                    <select id="item145" name="item145" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Formalmente ha designado roles y formas de reportes (1)
                        </option>
                        <option value="2" class="item2">IES Ha designado roles formas de reportes (2)</option>
                        <option value="3" class="item3">IES Ha designado parcialmente roles y formas de reportes (3)
                        </option>
                        <option value="4" class="item4">IES No ha designado. Roles ni reportes (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion16">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD ADMINISTRATIVA</h3>
        <h5 class="text-center rounded form-title">La IES CAPACITA CONTINUAMENTE EN RRD A SU COMUNIDAD </h5>


        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item146">
                        <span class="question-number">146.</span> La IES entrena y capacita a todo el personal, interno
                        y externo parte de la comunidad académica
                    </label>
                    <select id="item146" name="item146" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Cuenta con planes formales de capacidad (1)</option>
                        <option value="2" class="item2">IES Cuenta con planes informales de capacitación (2)</option>
                        <option value="3" class="item3">IES Capacita de vez en cuando en RRD (3)</option>
                        <option value="4" class="item4">IES No capacita en RRD(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item147">
                        <span class="question-number">147.</span> La IES mantiene en sus archivos los registros de los
                        entrenamientos de preparación para RRD
                    </label>
                    <select id="item147" name="item147" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Mantiene sus archivos toda la capacitación de RRD(1)
                        </option>
                        <option value="2" class="item2">IES Mantiene generalmente los archivos de capacitación RRD(2)
                        </option>
                        <option value="3" class="item3">IES Tiene archivos solo para ciertas capacitaciones(3)</option>
                        <option value="4" class="item4">IES No mantiene récord de las capacitaciones (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item148">
                        <span class="question-number">148.</span> La IES cuenta con un manual actualizado del manejo de
                        emergencias.
                    </label>
                    <select id="item148" name="item148" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Cuenta con manual certificado de emergencia y desastres (1)
                        </option>
                        <option value="2" class="item2">IES Cuenta con manual No certificado de emergencia y desastres
                            (2)</option>
                        <option value="3" class="item3">IES Cuenta con manual parcial y No certificado de emergencias y
                            desastres (3)</option>
                        <option value="4" class="item4">IES No cuenta con manual de emergencias y desastres sale
                            conectada (4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item149">
                        <span class="question-number">149.</span> La IES comparte el manual de manejo de emergencia
                    </label>
                    <select id="item149" name="item149" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">Manual ha sido distribuido entre personal y proveedores (1)
                        </option>
                        <option value="2" class="item2">Manual ha sido distribuido entre personal(2)</option>
                        <option value="3" class="item3">Manual ha sido distribuido entre personal del COE exclusivamente
                            (3)</option>
                        <option value="4" class="item4">Manual no ha sido distribuido (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion17">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD ADMINISTRATIVA</h3>
        <h5 class="text-center rounded form-title">LA IES SE RECUPERA DE LOS EFECTOS NEGATIVOS DE DESASTRES </h5>
        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="item150">
                        <span class="question-number">150.</span> La IES tiene sistemas de respaldo para los sistemas y
                        servicios.
                    </label>
                    <select id="item150" name="item150" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Tiene un procedimiento formal con terceros para manejo de
                            equipo y materiales(1)</option>
                        <option value="2" class="item2">IES Tiene procedimientos generales para maneho de equipos y
                            materiales(2)</option>
                        <option value="3" class="item3">IES Tiene procedimientos parciales para manejo de equipos y
                            materiales(3)</option>
                        <option value="4" class="item4">IES No tiene procedimientos para manejo de equipos y
                            materiales(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item151">
                        <span class="question-number">151.</span> La IES desarrolla políticas y procedimientos para la
                        recuperación temprana luego de un desastre
                    </label>
                    <select id="item151" name="item151" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Tiene un procedimiento formal de regreso a situacion
                            normal(1)</option>
                        <option value="2" class="item2">IES Tiene procedimientos generales de vuelta a la normalidad(2)
                        </option>
                        <option value="3" class="item3">IES Tienen procedimientos parciales de vuelta a la
                            normalidaad(3)</option>
                        <option value="4" class="item4">IES No tiene procedimientos de vuelta a la normalidad(4)
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item152">
                        <span class="question-number">152.</span> La IES cuenta con procedimientos para el
                        reabastecimiento de materiales de manejo de desastres
                    </label>
                    <select id="item152" name="item152" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Tiene un procedimiento formal de rebastecimiento de
                            medicinas e insumos(1)</option>
                        <option value="2" class="item2">IES Tiene procedimiento generales de rebastecimiento de
                            medicinas e insumos(2)</option>
                        <option value="3" class="item3">IES Tiene procedimientos parciales de rebastecimiento de
                            medicinas e insumos(3)</option>
                        <option value="4" class="item4">IES Tiene procedimeinto de rebastecimiento de medicinas e
                            insumos(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item153">
                        <span class="question-number">153.</span> La IES mantiene una lista de las compañías de
                        restauración de equipos y de sistemas esenciales.
                    </label>
                    <select id="item153" name="item153" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Tiene un procedimiento formal de rebastecimiento de
                            medicinas e insumos(1)</option>
                        <option value="2" class="item2">IES Tiene procedimiento generales de rebastecimiento de
                            medicinas e insumos(2)</option>
                        <option value="3" class="item3">IES Tiene procedimientos parciales de rebastecimiento de
                            medicinas e insumos(3)</option>
                        <option value="4" class="item4">IES Tiene procedimeinto de rebastecimiento de medicinas e
                            insumos(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item154">
                        <span class="question-number">154.</span> La IES desarrolla procedimientos para reconstruir la
                        información perdida por efectos de un desastre
                    </label>
                    <select id="item154" name="item154" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Tiene un procedimiento formal para recuperar informacion (1)
                        </option>
                        <option value="2" class="item2">IES Tiene procedimiento para recuperar informacion (2)</option>
                        <option value="3" class="item3">IES Tiene procedimeinto parciales para recuperar informacion (3)
                        </option>
                        <option value="4" class="item4">IES No tienen procedimientos para recuprar informacion (4)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion18">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD ADMINISTRATIVA</h3>
        <h5 class="text-center rounded form-title">LA IES TOMA EN CUENTA EL BIENESTAR DE SU COMUNIDAD </h5>


        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item155">
                        <span class="question-number">155.</span> La IES provee servicios inmediatos de soporte al
                        personal y a los proveedores de servicio
                    </label>
                    <select id="item155" name="item155" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Cuenta con plan formal de ayuda a terceros y bienestar(1)
                        </option>
                        <option value="2" class="item2">IES Cuenta con plan de ayuda a terceros y bienestar(2)</option>
                        <option value="3" class="item3">IES Cuenta con sistemas parciales de ayuda a terceros y
                            bienestar(3)</option>
                        <option value="4" class="item4">IES No cuenta con plan de ayuda a terceros y bienestar(4)
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item156">
                        <span class="question-number">156.</span> La IES tiene un proceso para evaluar y reinsertar a la
                        comunidad académica luego del EA
                    </label>
                    <select id="item156" name="item156" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Cuenta con plan formal de reinsercion a la comunidad(1)
                        </option>
                        <option value="2" class="item2">IES Cuenta con planes de reinsercion a la comunidad(2)</option>
                        <option value="3" class="item3">IES Parcialmente reintegra a sus funcionarios a la comunidad(3)
                        </option>
                        <option value="4" class="item4">IES No cuenta con planes de reinsercion de funcionarios a la
                            comunidad (4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="item157">
                        <span class="question-number">157.</span> La IES provee al personal y a los proveedores de
                        servicio con acceso a un soporte emocional y consejería continuos.
                    </label>
                    <select id="item157" name="item157" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Cuenta con plan formal de consejeria y apoyo postdesastre(1)
                        </option>
                        <option value="2" class="item2">IES Cuenta con planes de consejeria y apoyo postdesastre(2)
                        </option>
                        <option value="3" class="item3">IES Parcialmente consejeria y apoyo postdesastre(3)</option>
                        <option value="4" class="item4">IES No cuenta con planes de consejeria y apoyo postdesastre(4)
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>

    <form class="form-seccion" id="formSeccion19">
        <input type="hidden" value="<?= $id_analista ?>" name="id_analista">
        <input type="hidden" name="id_campus" value="<?= $id_campus ?>">

        <h3 class="text-center rounded form-title">SEGURIDAD ADMINISTRATIVA</h3>
        <h5 class="text-center rounded form-title">LA IES HACE MEJORAS CONTINUAS PARA LA RRD </h5>


        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item158">
                        <span class="question-number">158.</span> La IES evalúa cada actividad de RRD para identificar
                        los éxitos y las oportunidades de mejora.
                    </label>
                    <select id="item158" name="item158" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Evalua formalmente cada ejercicio del manejo de la
                            emergencia, rutina(1)</option>
                        <option value="2" class="item2">IES Evalua cada ejercicio de emergencia e identifica oportunidad
                            de éxito(2)</option>
                        <option value="3" class="item3">IES Evalua parcialmente oportunidades de éxito(3)</option>
                        <option value="4" class="item4">IES No evalua oportunidades de éxito(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item159">
                        <span class="question-number">159.</span> La IES comparte los resultados de la evaluación con el
                        personal, proveedores de servicio y con los clientes.
                    </label>
                    <select id="item159" name="item159" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Comparte resultados de forma formal(1)</option>
                        <option value="3" class="item3">IES Comparte parcialmente resultados(3)</option>
                        <option value="4" class="item4">IES No comparte resultados(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item160">
                        <span class="question-number">160.</span> La IES utiliza los resultados de la evaluación para
                        realizar mejoras a sus actividades de RRD
                    </label>
                    <select id="item160" name="item160" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Usa resultados para mejoras continuas de manera formal(1)
                        </option>
                        <!-- <option value="2" class="item2">(2)</option> -->
                        <option value="3" class="item3">IES Usa resultados parcialmente (3)</option>
                        <option value="4" class="item4">IES No usa resultados para mejora continua(4)</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="item161">
                        <span class="question-number">161.</span> La IES compara los resultados de la evaluación con
                        otras organizaciones y agencias similares.
                    </label>
                    <select id="item161" name="item161" class="form-control">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="1" class="item1">IES Compara resultados en su area formal con otras
                            organizaciones(1)</option>
                        <option value="2" class="item2">IES Compara generalmente resultados con otras organizaciones(2)
                        </option>
                        <option value="3" class="item3">IES Compara parcialmente resultados con otras organizaciones(3)
                        </option>
                        <option value="4" class="item4">IES No compara resultados con otras organizaciones(4)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <button class="btn btn-outline-success" type="submit">Enviar formulario</button> -->
    </form>
</div>
<script>
    const id_analista = "<?= $id_analista ?>";
</script>
<style>
    .question-number {
        font-weight: bold;
        margin-right: 5px;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url("assets/js/admin/forms/forms.js") ?>"></script>
<?= $this->endSection() ?>