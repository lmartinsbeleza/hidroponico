<x-layout>
    <div class="container mt-4">
        <div class="row w-100">
            <div class="col-md-6">
                <div id="temperatureGraphic"></div>
            </div>
            <div class="col-md-6">
                <div id="humidadeGraphic"></div>
            </div>
            <div class="col-12">
                <div id="condictivityGraphic"></div>
            </div>
            <div class="col-12">
                <div id="evolutivGraphic"></div>
            </div>
            <div class="col-12">
                Pagina ainda em construção...
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