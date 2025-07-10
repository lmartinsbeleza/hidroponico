<x-layout>
    <div class="m-4">
        <div class="row w-100">
            <div class="col-md-3">
                <div class="row mb-2">
                    <div class="col-md-6 d-flex flex-column align-center">
                        <h6 class="mt-2">Bombas dos Tanques:</h6>
                        <div class="h-75 d-flex flex-wrap align-center align-content-between gap-1 fs-5" style="flex-wrap: wrap">
                            <div class="form-check form-switch w-100">
                                <input class="form-check-input" type="checkbox" role="switch" id="principalButton" />
                                <label class="form-check-label" for="principalButton">Principal</label>
                            </div>
                            <div class="form-check form-switch w-100">
                                <input class="form-check-input" type="checkbox" role="switch" id="aguaButton" />
                                <label class="form-check-label" for="aguaButton">Água Limpa</label>
                            </div>
                            <div class="form-check form-switch w-100">
                                <input class="form-check-input" type="checkbox" role="switch" id="fertilizanteButton" />
                                <label class="form-check-label" for="fertilizanteButton">Fertilizante</label>
                            </div>
                            <div class="form-check form-switch w-100">
                                <input class="form-check-input" type="checkbox" role="switch" id="acidoButton" />
                                <label class="form-check-label" for="acidoButton">Ácido</label>
                            </div>
                            <div class="form-check form-switch w-100">
                                <input class="form-check-input" type="checkbox" role="switch" id="baseButton" />
                                <label class="form-check-label" for="baseButton">Base</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h6 class="mt-2">Sensores de Níveis:</h6>
                        <div class="d-flex flex-column align-items-center justify-content-center" style="flex-wrap: wrap">
                            <span class="legenda red fs-4" id="nivelAlto">Alto</span>
                            <span class="legenda red fs-4" id="nivelBaixo">Baixo</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="temperatureAmbienteGraphic"></div>
            </div>
            <div class="col-md-3">
                <div id="humidadeGraphic"></div>
            </div>
            <div class="col-md-3">
                <div id="temperatureAguaGraphic"></div>
            </div>

            <hr>
            
            <div class="col-12">
                <div id="phGraphic"></div>
            </div>

            <hr>
            
            <div class="col-12">
                <div id="condutivityGraphic"></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/home/graphic.js') }}"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            getDataFromPage(@json($data));
        });
    </script>
</x-layout>