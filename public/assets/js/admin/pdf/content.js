document.addEventListener("DOMContentLoaded", async function () {
    const ctx = document.getElementById('myChart').getContext('2d');
    const barCtx = document.getElementById('barChart').getContext('2d');

    let myChart, barChart;
    let fichaData = null;
    let fichaDetalle = null;

    // Cargar datos dinámicamente
    await cargarDatos();

    async function cargarDatos() {
        if (!id_ficha) {
            console.error("No se ha especificado un ID de ficha");
            inicializarGraficosPorDefecto();
            return;
        }

        try {
            // Obtener los promedios
            const responsePromedios = await fetch(base_url + "admin/fichas/obtenerPromediosPorIdFicha/" + id_ficha);
            if (!responsePromedios.ok) {
                throw new Error('Error al obtener los promedios');
            }
            const dataPromedios = await responsePromedios.json();
            fichaData = dataPromedios.promedios;

            // Obtener los datos detallados de la ficha
            const responseDetalle = await fetch(base_url + "admin/fichas/getFichaDetalle/" + id_ficha);
            if (!responseDetalle.ok) {
                throw new Error('Error al obtener los detalles de la ficha');
            }
            fichaDetalle = await responseDetalle.json();

            // Inicializar los gráficos con datos dinámicos
            inicializarGraficos(fichaData);
        } catch (error) {
            console.error('Error al cargar datos:', error);
            inicializarGraficosPorDefecto();
        }
    }

    function inicializarGraficosPorDefecto() {
        // Inicializar con datos estáticos en caso de error
        inicializarGraficos({
            promedios: {
                estructural: 0,
                no_estructural: 0,
                funcional: 0,
                administrativa: 0
            },
            promedio_general: 0
        });
    }

    function inicializarGraficos(data) {
        // Normalizar valores para el gráfico de donut (de 0-2 a 0-100)
        const estructural = data.promedios.estructural * 50;
        const noEstructural = data.promedios.no_estructural * 50;
        const funcional = data.promedios.funcional * 50;
        const administrativa = data.promedios.administrativa * 50;

        // Gráfico de donut
        myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Seguridad Estructural', 'Seguridad No Estructural', 'Seguridad Funcional', 'Seguridad Administrativa'],
                datasets: [{
                    label: 'Índice de Seguridad',
                    data: [estructural, noEstructural, funcional, administrativa],
                    borderWidth: 0,
                    backgroundColor: ['#2f5597', '#c55a11', '#a6a6a6', '#ffd966'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        color: 'white',
                        font: {
                            weight: 'bold',
                            size: 50,
                        },
                        formatter: (value, context) => {
                            const total = context.dataset.data.reduce((sum, val) => sum + val, 0);
                            const percentage = Math.round((value / total) * 100) + '%';
                            return percentage;
                        },
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Calcular el riesgo basado en el índice de seguridad general
        // Suponiendo que un mayor índice de seguridad (2) significa menor riesgo (1)
        // y un menor índice de seguridad (0) significa mayor riesgo (4)
        const riesgoCalculado = 5 - (data.promedio_general * 2);

        // Valores para el gráfico de barras
        // Estos valores podrían necesitar ajustes según tu lógica de negocio
        const peligroCanton = 2; // Valor estático o podría venir de data
        const consecuencias = 3; // Valor estático o podría venir de data
        const riesgo = Math.min(Math.max(riesgoCalculado, 1), 4); // Limitar entre 1 y 4

        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['PELIGRO CANTÓN', 'CONSECUENCIAS', 'RIESGO'],
                datasets: [
                    {
                        type: 'bar',
                        label: '',
                        data: [peligroCanton, consecuencias, riesgo],
                        backgroundColor: 'blue'
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        min: 0,
                        max: 4,
                        ticks: {
                            stepSize: 1
                        }
                    },
                },
                plugins: {
                    datalabels: {
                        display: true,
                        align: 'top',
                        color: 'white',
                        font: {
                            size: 25,
                            weight: 'bold'
                        },
                        formatter: function (value, context) {
                            return value.toFixed(1);
                        }
                    },
                    annotation: {
                        annotations: {
                            highRiskZone: {
                                type: 'box',
                                yMin: 3,
                                yMax: 4,
                                xMin: -0.5,
                                xMax: 2.5,
                                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                                borderColor: 'rgba(255, 0, 0, 0.6)',
                                borderWidth: 1,
                                label: {
                                    content: 'ALTO RIESGO',
                                    enabled: true,
                                    position: 'center',
                                    color: 'black',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                }
                            },
                            inicio: {
                                type: 'box',
                                yMin: 2,
                                yMax: 2,
                                xMin: 3,
                                xMax: -0.5,
                                backgroundColor: '#ca0000',
                                borderColor: '#ca0000',
                                borderWidth: 5,
                            },
                            mediumRiskZone: {
                                type: 'box',
                                yMin: 2,
                                yMax: 3,
                                xMin: -0.5,
                                xMax: 2.5,
                                backgroundColor: 'rgba(255, 255, 0, 0.4)',
                                borderColor: 'rgba(255, 255, 0, 0.6)',
                                borderWidth: 1,
                                label: {
                                    content: 'RIESGO MEDIO',
                                    enabled: true,
                                    position: 'center',
                                    color: 'black',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                }
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    }

    document.getElementById('generatePDF').addEventListener('click', async () => {
        if (!fichaData || !fichaDetalle) {
            alert('No se han cargado los datos completos para generar el PDF');
            return;
        }

        // Generar el PDF con los datos obtenidos
        generarPDF(fichaData);
    });

    async function generarPDF(data) {
        const chartImage = myChart.toBase64Image();
        const barChartImage = barChart.toBase64Image();
        const logoInstituto = dataLogo;
        const logoSenescyt = base_url + 'assets/img/senecyt.png';

        // Convertir las imágenes a base64
        try {
            const logoIes = await convertImageToBase64(logoInstituto);
            const logoSnsyt = await convertImageToBase64(logoSenescyt);

            // Usar los datos del endpoint getFichaDetalle
            const docDefinition = {
                pageSize: 'A4',
                pageMargins: [20, 20, 20, 20], // Reducir márgenes para aprovechar espacio
                content: [
                    {
                        columns: [
                            {
                                width: '50%',
                                image: logoSnsyt,
                                fit: [150, 80],
                                alignment: 'left'
                            },
                            {
                                width: '50%',
                                image: logoIes,
                                fit: [150, 80],
                                alignment: 'right'
                            }
                        ],
                        margin: [0, 0, 0, 10]
                    },
                    {
                        style: 'tableExample',
                        color: '#444',
                        table: {
                            widths: [100, '*', '*', '*', '*', '*'],
                            headerRows: 2,
                            body: [
                                [
                                    { text: 'Reporte de la seguridad de la Ies', style: 'tableHeader', colSpan: 3, alignment: 'left' },
                                    {}, {},
                                    { text: fichaDetalle.nombreIes || 'N/A', alignment: 'center', colSpan: 3 },
                                    {}, {},
                                ],
                                [
                                    { text: 'Provincia', style: 'tableHeader', alignment: 'left' },
                                    { text: fichaDetalle.provincia || 'N/A', alignment: 'center', colSpan: 2 },
                                    {},
                                    { text: 'Cantón', style: 'tableHeader', alignment: 'left' },
                                    { text: fichaDetalle.canton || 'N/A', alignment: 'center', colSpan: 2 },
                                    {},
                                ],
                                [
                                    { text: 'Dirección', style: 'tableHeader', alignment: 'left' },
                                    { text: fichaDetalle.direccion || 'N/A', alignment: 'left', colSpan: 5 },
                                    {}, {}, {}, {},
                                ],
                                [
                                    { text: 'Código', style: 'tableHeader', alignment: 'left' },
                                    { text: fichaDetalle.codigo || 'N/A', alignment: 'center' },
                                    { text: 'Fecha', style: 'tableHeader', alignment: 'center' },
                                    { text: fichaDetalle.fecha || 'N/A', alignment: 'center' },
                                    { text: 'Analista', style: 'tableHeader', alignment: 'center' },
                                    { text: fichaDetalle.analista || 'N/A', alignment: 'center' },
                                ],
                            ]
                        },
                        margin: [0, 0, 0, 10]
                    },
                    {
                        text: 'Indice De Seguridad Universitaria',
                        style: 'titleCenter',
                        alignment: 'center',
                        margin: [0, 10, 0, 5]
                    },
                    {
                        columns: [
                            {
                                width: '50%',
                                table: {
                                    widths: [150, 30],
                                    body: [
                                        [
                                            { text: 'Indice de seguridad', style: 'tableHeader' },
                                            { text: fichaDetalle.indiceSeguridad ? parseFloat(fichaDetalle.indiceSeguridad).toFixed(2) : '0.00' }
                                        ],
                                        [
                                            { text: 'Seguridad Estructural', style: 'sE' },
                                            { text: fichaDetalle.seguridadEstructural ? parseFloat(fichaDetalle.seguridadEstructural).toFixed(2) : '0.00' }
                                        ],
                                        [
                                            { text: 'Seguridad No Estructural', style: 'sNe' },
                                            { text: fichaDetalle.seguridadNoEstructural ? parseFloat(fichaDetalle.seguridadNoEstructural).toFixed(2) : '0.00' }
                                        ],
                                        [
                                            { text: 'Seguridad Funcional', style: 'sF' },
                                            { text: fichaDetalle.seguridadFuncional ? parseFloat(fichaDetalle.seguridadFuncional).toFixed(2) : '0.00' }
                                        ],
                                        [
                                            { text: 'Seguridad Administrativa', style: 'sA' },
                                            { text: fichaDetalle.seguridadAdministrativa ? parseFloat(fichaDetalle.seguridadAdministrativa).toFixed(2) : '0.00' }
                                        ],
                                    ]
                                },
                                margin: [0, 0, 0, 0]
                            },
                            {
                                width: '50%',
                                image: chartImage,
                                fit: [150, 150],
                                alignment: 'right',
                                margin: [10, 0, 0, 0]
                            }
                        ]
                    },
                    {
                        text: 'RIESGO DE LA IES',
                        style: 'titleCenter',
                        alignment: 'center',
                        margin: [0, 10, 0, 5]
                    },
                    {
                        columns: [
                            {
                                width: '50%',
                                table: {
                                    widths: [130, '*', 25],
                                    body: [
                                        [
                                            { text: 'PELIGRO CANTÓN', style: 'fontB' },
                                            { text: fichaDetalle.canton || 'N/A' },
                                            { text: '2' },
                                        ],
                                        [
                                            { text: 'CONSECUENCIAS', style: 'fontB', colSpan: 2 },
                                            {},
                                            { text: '3.0' },
                                        ],
                                        [
                                            { text: 'INDICE DE SEGURIDAD', style: 'fontB', colSpan: 2 },
                                            {},
                                            { text: fichaDetalle.indiceSeguridad ? parseFloat(fichaDetalle.indiceSeguridad).toFixed(2) : '0.00' },
                                        ],
                                    ]
                                }
                            },
                            {
                                width: '50%',
                                margin: [10, 0, 0, 0],
                                table: {
                                    widths: [150],
                                    body: [
                                        [{ text: 'INTOLERABLE', style: 'intolerable' }],
                                        [{ text: 'MUY ALTO', style: 'muyAlto' }],
                                        [{ text: 'Nivel critico de seguridad', style: 'nivelCritico' }],
                                    ]
                                }
                            },
                        ]
                    },
                    {
                        image: barChartImage,
                        width: 400,
                        alignment: 'center',
                        margin: [0, 10, 0, 10]
                    },
                    {
                        columns: [
                            {
                                width: '60%',
                                text: ''
                            },
                            {
                                width: '40%',
                                stack: [
                                    {
                                        text: 'Firma del analista:',
                                        alignment: 'center',
                                        margin: [0, 0, 0, 20]
                                    },
                                    {
                                        canvas: [
                                            {
                                                type: 'line',
                                                x1: 0,
                                                y1: 0,
                                                x2: 150,
                                                y2: 0,
                                                lineWidth: 1
                                            }
                                        ],
                                        alignment: 'center'
                                    },
                                    {
                                        text: fichaDetalle.analista || 'N/A',
                                        alignment: 'center',
                                        margin: [0, 5, 0, 0]
                                    }
                                ]
                            }
                        ]
                    }
                ],
                styles: {
                    tableHeader: {
                        bold: true,
                        fontSize: 11,
                        color: 'black',
                        fillColor: '#fbe5d6'
                    },
                    sE: {
                        fillColor: '#2f5597',
                        color: 'yellow',
                        fontSize: 11
                    },
                    sNe: {
                        fillColor: '#c55a11',
                        color: 'yellow',
                        fontSize: 11
                    },
                    sF: {
                        fillColor: '#a6a6a6',
                        color: 'black',
                        fontSize: 11
                    },
                    sA: {
                        fillColor: '#ffd966',
                        color: 'black',
                        fontSize: 11
                    },
                    titleCenter: {
                        bold: true,
                        fontSize: 14,
                        color: '#c00000'
                    },
                    space: {
                        fillColor: '#fbe5d6'
                    },
                    intolerable: {
                        fillColor: '#FF0000',
                        fillOpacity: 0.2,
                        fontSize: 11
                    },
                    muyAlto: {
                        fillColor: '#FFFF00',
                        fillOpacity: 0.4,
                        fontSize: 11
                    },
                    nivelCritico: {
                        fillColor: '#ca0000',
                        color: '#fff',
                        fontSize: 11
                    },
                    fontB: {
                        bold: true,
                        fontSize: 11,
                        color: 'black',
                    },
                    tableExample: {
                        margin: [0, 5, 0, 5]
                    }
                }
            };

            pdfMake.createPdf(docDefinition).open();
        } catch (error) {
            console.error('Error al generar el PDF:', error);
            alert('Error al generar el PDF: ' + error.message);
        }
    }

    // Función para convertir una imagen a base64
    function convertImageToBase64(imagePath) {
        return fetch(imagePath)
            .then(response => response.blob())
            .then(blob => {
                return new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = () => resolve(reader.result);
                    reader.onerror = reject;
                    reader.readAsDataURL(blob);
                });
            });
    }
});