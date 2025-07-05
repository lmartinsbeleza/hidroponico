let dados = [];
window.getDataFromPage = function (data){
    dados = data;
}

window.onload = function() {
    //Variaveis do Ambiente
    let chartTempAmb = null;
    let chartTempAgua = null;

    //Variaveis da Agua
    let optionsEvolutivPh = null;
    let optionsCondutivityTempAgua = null;
    var data = [];

    const optionsTemperatureAmbiente = {
        series: [0.0],
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
                            return val.toFixed(2) + " °C";
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
        labels: ['Temperatura \n Ambiente'],
    };

    const optionsTemperatureAgua = {
        series: [0.0],
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
                            return val.toFixed(2) + " °C";
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
        labels: ["Temperatura D'Água"],
    };

    optionsEvolutivPh = {
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
            }
        },
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: 'Ph',
            align: 'center'
        },
        markers: {
            size: 0
        }
    };

    optionsCondutivityTempAgua = {
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
            }
        },
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: 'Condutividade e Temperatura',
            align: 'center'
        },
        markers: {
            size: 0
        }
    };

    chartTempAmb = new ApexCharts(document.querySelector("#temperatureAmbienteGraphic"), optionsTemperatureAmbiente);
    chartTempAgua = new ApexCharts(document.querySelector("#temperatureAguaGraphic"), optionsTemperatureAgua);

    chartPh = new ApexCharts(document.querySelector("#phGraphic"), optionsEvolutivPh);
    chartCondTemp = new ApexCharts(document.querySelector("#condutivityGraphic"), optionsCondutivityTempAgua);
    
    chartTempAmb.render();
    chartTempAgua.render();
    chartPh.render();
    chartCondTemp.render();

    function insertDataInGraphics(dados){
        const nivelAlto = $("#nivelAlto");
        const nivelBaixo = $("#nivelBaixo");

        let cond = [];
        let temp = [];
        let ph = [];
        let tempAgua = 0.0;
        let tempAmibente = 0.0;
        let lum = [];
        let horario = [];
        
        for(const data of dados){
            const dataHor = new Date(data.created_at);

            //Atualiza dados de porcentagem
            tempAgua = (data.temperatura_agua);
            tempAmibente = (data.temperatura_ambiente);

            //Atualiza Sensores de Nível
            nivelAlto.addClass(data.nivel_alto ? "red" : "green").removeClass(data.nivel_alto ? "green" : "red");
            nivelBaixo.addClass(data.nivel_baixo ? "green" : "red").removeClass(data.nivel_baixo ? "red" : "green");

            //Atualiza dados de linha
            cond.push(data.condutividade);
            temp.push(data.temperatura_agua);
            ph.push(data.ph);
            lum.push(data.luminosididade);
            horario.push(`${dataHor.getDate()}/${dataHor.getMonth() + 1} - ${dataHor.getHours()}:${dataHor.getMinutes()}`);
        }
        //Atualiza graficos de porcentagem
        chartTempAmb.updateSeries([ tempAmibente ]);
        chartTempAgua.updateSeries([ tempAgua ]);

        //Atualiza gráficos de linha
        chartCondTemp.updateSeries([{
            name: "Condutividade",
            data: cond
        }, {
            name: "Temperatura",
            data: temp
        }]);
        chartCondTemp.updateOptions({
            xaxis: {
                categories: horario
            }
        });

        chartPh.updateSeries([{data: ph}]);
        chartPh.updateOptions({
            xaxis: {
                categories: horario
            }
        });
    }

    insertDataInGraphics(dados);

    setInterval(function(){
        console.log(dados)

        $.ajax({
            url: window.location.origin+"/api/getData",
            success: function(result){
                dados.push(result)
                
                insertDataInGraphics(result);
            },
            error: function(result){
                console.log(result, "error")
            }
        });
    }, 3000);
};