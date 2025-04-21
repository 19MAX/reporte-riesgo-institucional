document.addEventListener("DOMContentLoaded", async function () {
    const ctx = document.getElementById('myChart').getContext('2d');
    const barCtx = document.getElementById('barChart').getContext('2d');

    let myChart, barChart;

    // Inicializar los gráficos con datos estáticos
    inicializarGraficos();

    function inicializarGraficos() {
        myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Seguridad Estructural', 'Seguridad No Estructural', 'Seguridad Funcional', 'Seguridad Administrativa'],
                datasets: [{
                    label: '# of Votes',
                    data: [22, 21, 30, 27],
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

        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['PELIGRO CANTÓN', 'CONSECUENCIAS', 'RIESGO'],
                datasets: [
                    {
                        type: 'bar',
                        label: '',
                        data: [1, 3, 2],
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
                            return value;
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
        const fichaId = id_ficha;

        if (!fichaId) {
            alert('No se ha especificado un ID de ficha');
            return;
        }

        try {
            const response = await fetch(`../../controllers/router.php?op=getFichaDetalle&id=${fichaId}`);

            if (!response.ok) {
                throw new Error('Error al obtener los datos');
            }

            const data = await response.json();

            // Generar el PDF con los datos obtenidos
            generarPDF(data);
        } catch (error) {
            console.error('Error:', error);
            alert('Hubo un error al generar el PDF');
        }
    });

    async function generarPDF(data) {
        const chartImage = myChart.toBase64Image();
        const barChartImage = barChart.toBase64Image();
        const logoInstituto = dataLogo;
        const logoSenescyt = '../../public/img/logos/logo_sncyt.png';

        // Convertir las imágenes a base64
        const logoIes = await convertImageToBase64(logoInstituto);
        const logoSnsyt = await convertImageToBase64(logoSenescyt);

        const docDefinition = {
            content: [
                {
                    columns: [
                        {
                            width: '50%',
                            image: logoSnsyt,
                            fit: [150, 100],
                            alignment: 'left'
                        },
                        {
                            width: '50%',
                            image: logoIes,
                            fit: [50, 150],
                            alignment: 'right'
                        }
                    ]
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
                                { text: data.nombreIes, alignment: 'center', colSpan: 3 },
                                {}, {},
                            ],
                            [
                                { text: 'Provincia', style: 'tableHeader', alignment: 'left' },
                                { text: data.provincia, alignment: 'center', colSpan: 2 },
                                {},
                                { text: 'Cantón', style: 'tableHeader', alignment: 'left' },
                                { text: data.canton, alignment: 'center', colSpan: 2 },
                                {},
                            ],
                            [
                                { text: 'Dirección', style: 'tableHeader', alignment: 'left' },
                                { text: data.direccion, alignment: 'left', colSpan: 5 },
                                {}, {}, {}, {},
                            ],
                            [
                                { text: 'Código', style: 'tableHeader', alignment: 'left' },
                                { text: data.codigo, alignment: 'center' },
                                { text: 'Fecha', style: 'tableHeader', alignment: 'center' },
                                { text: data.fecha, alignment: 'center' },
                                { text: 'Analista', style: 'tableHeader', alignment: 'center' },
                                { text: data.analista, alignment: 'center' },
                            ],
                        ]
                    }
                },
                {
                    table: {
                        widths: ['*'],
                        body: [
                            [{ text: '', style: 'space' }],
                        ],
                    },
                },
                { text: 'Indice De Seguridad Universitaria', style: 'titleCenter', alignment: 'center', margin: [0, 20, 0, 20] },
                {
                    columns: [
                        {
                            width: '50%',
                            table: {
                                widths: [150, 30],
                                body: [
                                    [
                                        { text: 'Indice de seguridad', style: 'tableHeader' },
                                        { text: data.indiceSeguridad.toFixed(2) }
                                    ],
                                    [
                                        { text: 'Seguridad Estructural', style: 'sE' },
                                        { text: data.seguridadEstructural.toFixed(2) }
                                    ],
                                    [
                                        { text: 'Seguridad No Estructural', style: 'sNe' },
                                        { text: data.seguridadNoEstructural.toFixed(2) }
                                    ],
                                    [
                                        { text: 'Seguridad Funcional', style: 'sF' },
                                        { text: data.seguridadFuncional.toFixed(2) }
                                    ],
                                    [
                                        { text: 'Seguridad Administrativa', style: 'sA' },
                                        { text: data.seguridadAdministrativa.toFixed(2) }
                                    ],
                                ]
                            }
                        },
                        {
                            width: '50%',
                            image: chartImage,
                            fit: [150, 150],
                            alignment: 'right',
                            margin: [20, 0, 0, 20]
                        }
                    ]
                },
                {
                    table: {
                        widths: ['*'],
                        body: [
                            [{ text: '', style: 'space' }],
                        ],
                    },
                },
                { text: 'RIESGO DE LA IES', style: 'titleCenter', alignment: 'center', margin: [0, 20, 0, 20] },
                {
                    columns: [
                        {
                            width: '50%',
                            table: {
                                widths: [130, '*', 25],
                                body: [
                                    [
                                        { text: 'PELIGRO CANTÓN', style: 'fontB' },
                                        { text: data.canton },
                                        { text: '2' }, // Este valor debería venir de data si está disponible
                                    ],
                                    [
                                        { text: 'CONSECUENCIAS', style: 'fontB', colSpan: 2 },
                                        {},
                                        { text: '3.0' }, // Este valor debería venir de data si está disponible
                                    ],
                                    [
                                        { text: 'INDICE DE SEGURIDAD', style: 'fontB', colSpan: 2 },
                                        {},
                                        { text: data.indiceSeguridad.toFixed(2) },
                                    ],
                                ]
                            }
                        },
                        {
                            width: '100%',
                            margin: [100, 0, 0, 0],
                            table: {
                                widths: [150, 30],
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
                    width: '100%',
                    fit: [300, 500],
                    alignment: 'center',
                    margin: [0, 20, 0, 20]
                },
                {
                    margin: [200, 10, 0, 0],
                    columns: [
                        {
                            width: '*',
                            text: ''
                        },
                        {
                            width: 'auto',
                            text: 'Firma del analista: '
                        },
                        {
                            width: '*',
                            table: {
                                headerRows: 1,
                                body: [
                                    [{ text: ' ' }, { text: '' }, { text: ' ' }],
                                    ['', data.analista, ''],
                                ]
                            },
                            layout: 'headerLineOnly'
                        },
                    ]
                },
            ],
            styles: {
                tableHeader: {
                    bold: true,
                    fontSize: 13,
                    color: 'black',
                    fillColor: '#fbe5d6'
                },
                sE: {
                    fillColor: '#2f5597',
                    color: 'yellow'
                },
                sNe: {
                    fillColor: '#c55a11',
                    color: 'yellow'
                },
                sF: {
                    fillColor: '#a6a6a6',
                    color: 'black'
                },
                sA: {
                    fillColor: '#ffd966',
                    color: 'black'
                },
                titleCenter: {
                    bold: true,
                    fontSize: 16,
                    color: '#c00000'
                },
                space: {
                    fillColor: '#fbe5d6'
                },
                intolerable: {
                    fillColor: '#FF0000',
                    fillOpacity: 0.2
                },
                muyAlto: {
                    fillColor: '#FFFF00',
                    fillOpacity: 0.4
                },
                nivelCritico: {
                    fillColor: '#ca0000',
                    color: '#fff'
                },
                fontB: {
                    bold: true,
                    fontSize: 13,
                    color: 'black',
                },
                tableExample: {
                    margin: [0, 5, 0, 15]
                }
            }
        };

        pdfMake.createPdf(docDefinition).open();
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