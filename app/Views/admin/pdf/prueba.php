<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Formulario de seguridad 2
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Reporte de Seguridad - Campus: <?= esc($datos['campus']) ?></h3>
                    <p class="mb-0">Fecha: <?= date('d/m/Y', strtotime($datos['fecha'])) ?></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-center">Promedios de Seguridad</h4>
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">Resumen General</h4>
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Tipo de Seguridad</th>
                                        <th>Promedio</th>
                                        <th>Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Seguridad Estructural</td>
                                        <td><?= number_format($datos['promedios']['estructural'], 2) ?></td>
                                        <td><?= getNivelSeguridad($datos['promedios']['estructural']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Seguridad No Estructural</td>
                                        <td><?= number_format($datos['promedios']['no_estructural'], 2) ?></td>
                                        <td><?= getNivelSeguridad($datos['promedios']['no_estructural']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Seguridad Funcional</td>
                                        <td><?= number_format($datos['promedios']['funcional'], 2) ?></td>
                                        <td><?= getNivelSeguridad($datos['promedios']['funcional']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Seguridad Administrativa</td>
                                        <td><?= number_format($datos['promedios']['administrativa'], 2) ?></td>
                                        <td><?= getNivelSeguridad($datos['promedios']['administrativa']) ?></td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td><strong>Promedio General</strong></td>
                                        <td><strong><?= number_format($datos['promedio_general'], 2) ?></strong></td>
                                        <td><strong><?= getNivelSeguridad($datos['promedio_general']) ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detalles de subsecciones -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h4>Detalle por Subsecciones</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="estructural-tab" data-toggle="tab" href="#estructural"
                                role="tab">Estructural</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="no-estructural-tab" data-toggle="tab" href="#no-estructural"
                                role="tab">No Estructural</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="funcional-tab" data-toggle="tab" href="#funcional"
                                role="tab">Funcional</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="administrativa-tab" data-toggle="tab" href="#administrativa"
                                role="tab">Administrativa</a>
                        </li>
                    </ul>
                    <div class="tab-content p-3" id="myTabContent">
                        <!-- Tab Estructural -->
                        <div class="tab-pane fade show active" id="estructural" role="tabpanel">
                            <h5>Seguridad Estructural</h5>
                            <div class="alert alert-info">
                                <strong>Promedio: </strong> <?= number_format($datos['promedios']['estructural'], 2) ?>
                                -
                                <strong>Nivel: </strong> <?= getNivelSeguridad($datos['promedios']['estructural']) ?>
                            </div>
                        </div>

                        <!-- Tab No Estructural -->
                        <div class="tab-pane fade" id="no-estructural" role="tabpanel">
                            <h5>Seguridad No Estructural</h5>
                            <div class="alert alert-info mb-3">
                                <strong>Promedio General: </strong>
                                <?= number_format($datos['promedios']['no_estructural'], 2) ?> -
                                <strong>Nivel: </strong> <?= getNivelSeguridad($datos['promedios']['no_estructural']) ?>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-sm table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Subsección</th>
                                                <th>Promedio</th>
                                                <th>Nivel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datos['subsecciones']['no_estructural'] as $key => $value): ?>
                                                <tr>
                                                    <td><?= formatearNombreSubseccion($key) ?></td>
                                                    <td><?= number_format($value, 2) ?></td>
                                                    <td><?= getNivelSeguridad($value) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <canvas id="chartNoEstructural" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Funcional -->
                        <div class="tab-pane fade" id="funcional" role="tabpanel">
                            <h5>Seguridad Funcional</h5>
                            <div class="alert alert-info mb-3">
                                <strong>Promedio General: </strong>
                                <?= number_format($datos['promedios']['funcional'], 2) ?> -
                                <strong>Nivel: </strong> <?= getNivelSeguridad($datos['promedios']['funcional']) ?>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-sm table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Subsección</th>
                                                <th>Promedio</th>
                                                <th>Nivel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datos['subsecciones']['funcional'] as $key => $value): ?>
                                                <tr>
                                                    <td><?= formatearNombreSubseccion($key) ?></td>
                                                    <td><?= number_format($value, 2) ?></td>
                                                    <td><?= getNivelSeguridad($value) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <canvas id="chartFuncional" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Administrativa -->
                        <div class="tab-pane fade" id="administrativa" role="tabpanel">
                            <h5>Seguridad Administrativa</h5>
                            <div class="alert alert-info mb-3">
                                <strong>Promedio General: </strong>
                                <?= number_format($datos['promedios']['administrativa'], 2) ?> -
                                <strong>Nivel: </strong> <?= getNivelSeguridad($datos['promedios']['administrativa']) ?>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-sm table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Subsección</th>
                                                <th>Promedio</th>
                                                <th>Nivel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datos['subsecciones']['administrativa'] as $key => $value): ?>
                                                <tr>
                                                    <td><?= formatearNombreSubseccion($key) ?></td>
                                                    <td><?= number_format($value, 2) ?></td>
                                                    <td><?= getNivelSeguridad($value) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <canvas id="chartAdministrativa" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Gráfico principal
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Seguridad Estructural', 'Seguridad No Estructural', 'Seguridad Funcional', 'Seguridad Administrativa'],
                datasets: [{
                    data: [
                        <?= $datos['promedios']['estructural'] ?>,
                        <?= $datos['promedios']['no_estructural'] ?>,
                        <?= $datos['promedios']['funcional'] ?>,
                        <?= $datos['promedios']['administrativa'] ?>
                    ],
                    backgroundColor: ['#2f5597', '#c55a11', '#a6a6a6', '#ffd966'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        color: 'white',
                        font: {
                            weight: 'bold',
                            size: 15,
                        },
                        formatter: (value, context) => {
                            return Math.round(value * 100) / 100;
                        },
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Gráfico No Estructural
        if (document.getElementById('chartNoEstructural')) {
            const ctxNoEstructural = document.getElementById('chartNoEstructural').getContext('2d');
            const labels = [];
            const values = [];

            <?php foreach ($datos['subsecciones']['no_estructural'] as $key => $value): ?>
                labels.push('<?= formatearNombreSubseccion($key, true) ?>');
                values.push(<?= $value ?>);
            <?php endforeach; ?>

            new Chart(ctxNoEstructural, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: '#c55a11',
                        borderWidth: 0
                    }]
                },
                options: {
                    indexAxis: 'y',
                    plugins: {
                        legend: {
                            display: false
                        },
                        datalabels: {
                            color: 'white',
                            anchor: 'end',
                            align: 'start',
                            formatter: (value) => Math.round(value * 100) / 100
                        }
                    },
                    scales: {
                        x: {
                            max: 4
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        }

        // Gráfico Funcional
        if (document.getElementById('chartFuncional')) {
            const ctxFuncional = document.getElementById('chartFuncional').getContext('2d');
            const labelsFuncional = [];
            const valuesFuncional = [];

            <?php foreach ($datos['subsecciones']['funcional'] as $key => $value): ?>
                labelsFuncional.push('<?= formatearNombreSubseccion($key, true) ?>');
                valuesFuncional.push(<?= $value ?>);
            <?php endforeach; ?>

            new Chart(ctxFuncional, {
                type: 'bar',
                data: {
                    labels: labelsFuncional,
                    datasets: [{
                        data: valuesFuncional,
                        backgroundColor: '#a6a6a6',
                        borderWidth: 0
                    }]
                },
                options: {
                    indexAxis: 'y',
                    plugins: {
                        legend: {
                            display: false
                        },
                        datalabels: {
                            color: 'white',
                            anchor: 'end',
                            align: 'start',
                            formatter: (value) => Math.round(value * 100) / 100
                        }
                    },
                    scales: {
                        x: {
                            max: 4
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        }

        // Gráfico Administrativa
        if (document.getElementById('chartAdministrativa')) {
            const ctxAdministrativa = document.getElementById('chartAdministrativa').getContext('2d');
            const labelsAdministrativa = [];
            const valuesAdministrativa = [];

            <?php foreach ($datos['subsecciones']['administrativa'] as $key => $value): ?>
                labelsAdministrativa.push('<?= formatearNombreSubseccion($key, true) ?>');
                valuesAdministrativa.push(<?= $value ?>);
            <?php endforeach; ?>

            new Chart(ctxAdministrativa, {
                type: 'bar',
                data: {
                    labels: labelsAdministrativa,
                    datasets: [{
                        data: valuesAdministrativa,
                        backgroundColor: '#ffd966',
                        borderWidth: 0
                    }]
                },
                options: {
                    indexAxis: 'y',
                    plugins: {
                        legend: {
                            display: false
                        },
                        datalabels: {
                            color: 'black',
                            anchor: 'end',
                            align: 'start',
                            formatter: (value) => Math.round(value * 100) / 100
                        }
                    },
                    scales: {
                        x: {
                            max: 4
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        }
    });
</script>
<?= $this->endSection() ?>

<?php
// Función para determinar el nivel de seguridad según el promedio
function getNivelSeguridad($promedio)
{
    if ($promedio >= 3.5) {
        return '<span class="badge badge-success">Excelente</span>';
    } elseif ($promedio >= 2.5) {
        return '<span class="badge badge-info">Bueno</span>';
    } elseif ($promedio >= 1.5) {
        return '<span class="badge badge-warning">Regular</span>';
    } else {
        return '<span class="badge badge-danger">Deficiente</span>';
    }
}

// Función para formatear los nombres de las subsecciones
function formatearNombreSubseccion($key, $abreviado = false)
{
    $nombres = [
        'sistema_electrico' => ['Sistema Eléctrico', 'S. Eléctrico'],
        'telecomunicaciones' => ['Telecomunicaciones', 'Telecom.'],
        'sistema_de_provision_de_agua' => ['Sistema de Provisión de Agua', 'S. Agua'],
        'sistema_de_combustibles' => ['Sistema de Combustibles', 'S. Comb.'],
        'gases_de_laboratorios' => ['Gases de Laboratorios', 'Gases Lab.'],
        'laboratorio_q_b_t_alimentaria' => ['Lab. Química/Biología/Tecnología Alimentaria', 'Lab. Q/B/T'],
        'laboratorio_e_e_mecanica' => ['Lab. Eléctrica/Electrónica/Mecánica', 'Lab. E/E/M'],
        'elementos_arquitectonicos' => ['Elementos Arquitectónicos', 'Arq.'],
        'organizacion_comite' => ['Organización del Comité', 'Org. Comité'],
        'procedimientos_operativos' => ['Procedimientos Operativos', 'Proced. Op.'],
        'disponibilidad_logistica' => ['Disponibilidad Logística', 'Disp. Log.'],
        'invertir_reduccion' => ['Inversión en Reducción', 'Inv. Reduc.'],
        'trabajo_comunidad' => ['Trabajo con la Comunidad', 'Trab. Com.'],
        'trabajo_multidisciplinario' => ['Trabajo Multidisciplinario', 'Trab. Multi.'],
        'capacita_personal' => ['Capacitación del Personal', 'Cap. Personal'],
        'efectos_negativos' => ['Prevención Efectos Negativos', 'Prev. Neg.'],
        'bienestar_comunidad' => ['Bienestar de la Comunidad', 'Bien. Com.'],
        'mejoras_continuas' => ['Mejoras Continuas', 'Mejoras']
    ];

    if (isset($nombres[$key])) {
        return $abreviado ? $nombres[$key][1] : $nombres[$key][0];
    }

    // Si no está en el arreglo, formatea el string quitando guiones bajos y capitalizando
    return ucwords(str_replace('_', ' ', $key));
}
?>