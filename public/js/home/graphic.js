let dados = [];
window.getDataFromPage = function (data){
    dados = data
}

window.onload = function() {
    //Variaveis do Ambiente
    let chartTemp = null;
    let chartHumid = null;
    let chartLumin = null;

    //Variaveis da Agua
    let optionsEvolutiv = null;
    let optionsEvolutivPh = null;
    var data = [];

    const optionsTemperature = {
        series: [100],
        chart: {
            height: 350,
            type: 'radialBar',
            toolbar: {
                show: true
            }
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                hollow: {
                    margin: 0,
                    size: '70%',
                    background: '#fff',
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: 'front',
                    dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 0,
                    blur: 4,
                    opacity: 0.5
                    }
                },
                track: {
                    background: '#fff',
                    strokeWidth: '67%',
                    margin: 0, // margin is in pixels
                    dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.7
                    }
                },
                dataLabels: {
                    show: true,
                    name: {
                        offsetY: -10,
                        show: true,
                        color: '#888',
                        fontSize: '17px'
                    },
                    value: {
                        formatter: function(val) {
                            return parseInt(val);
                        },
                        color: '#111',
                        fontSize: '36px',
                        show: true,
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                shadeIntensity: 0.5,
                gradientFromColors: ['#0040FF'],
                gradientToColors: ['#dE0A26'],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        stroke: {
            lineCap: 'round'
        },
        labels: ['Percent'],
    };

    const optionsHumidit = {
        series: [100],
        chart: {
            height: 350,
            type: 'radialBar',
            toolbar: {
                show: true
            }
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                hollow: {
                    margin: 0,
                    size: '70%',
                    background: '#fff',
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: 'front',
                    dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 0,
                    blur: 4,
                    opacity: 0.5
                    }
                },
                track: {
                    background: '#fff',
                    strokeWidth: '67%',
                    margin: 0, // margin is in pixels
                    dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.7
                    }
                },
                dataLabels: {
                    show: true,
                    name: {
                        offsetY: -10,
                        show: true,
                        color: '#888',
                        fontSize: '17px'
                    },
                    value: {
                        formatter: function(val) {
                            return parseInt(val);
                        },
                        color: '#111',
                        fontSize: '36px',
                        show: true,
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                shadeIntensity: 0.5,
                gradientFromColors: ['#0040FF'],
                gradientToColors: ['#dE0A26'],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        stroke: {
            lineCap: 'round'
        },
        labels: ['Percent'],
    };

    optionsEvolutiv = {
        series: [{
            data: data.slice()
        }],
        chart: {
            id: 'realtime',
            height: 350,
            type: 'line',
            animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                    speed: 1000
                }
            },
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: 'Dynamic Updating Chart',
            align: 'left'
        },
        markers: {
            size: 0
        },
        legend: {
            show: false
        },
    };

    chartTemp = new ApexCharts(document.querySelector("#temperatureGraphic"), optionsTemperature);
    chartHumid = new ApexCharts(document.querySelector("#humidadeGraphic"), optionsHumidit);
    chartEvol = new ApexCharts(document.querySelector("#evolutivGraphic"), optionsEvolutiv);
    chartTemp.render();
    chartHumid.render();
    chartEvol.render();

    console.log(
        window.location,
        window.location.origin+"/api/getData"
    )
    setInterval(function(){
        console.log(dados)

        $.ajax({
            url: window.location.origin+"/api/getData",
            success: function(result){
                console.log(result);
                chartEvol.updateSeries([{
                    data: [result.ph]
                }]);
            },
            error: function(result){
                console.log(result, "error")
            }
        });
    }, 3000);
};