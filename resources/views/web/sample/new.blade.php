<div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12">

        <fieldset style="margin-bottom: 20px;" class="col-sm-12 col-md-12 col-lg-12">
            <legend>Você</legend>

            <div class="form-group col-md-12">
                <label for="name">Nome</label>
                <input ng-model="name" type="text" class="form-control" id="name" placeholder="Ex.: Fulano de Tal">
            </div>

            <div class="form-group col-md-12">
                <label for="institution">Instituição</label>
                <input ng-model="institution" type="text" class="form-control" id="email" placeholder="Ex.: Faculdade Bolinha">
            </div>

            <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input ng-model="email" type="text" class="form-control" id="email" placeholder="Ex.: fulano.tal@email.com">
            </div>

        </fieldset>

        <fieldset style="margin-bottom: 20px;"  class="col-sm-12 col-md-12 col-lg-12">
            <legend>Posto</legend>

            <div class="form-group col-md-12">
                <label for="station_name">Nome</label>
                <input ng-model="stationName" type="text" class="form-control" id="station_name" placeholder="Ex.: Posto do José">
            </div>

            <div class="form-group col-md-12">
                <label for="station_flag">Bandeira</label>
                <input ng-model="stationFlag" type="text" class="form-control" id="station_name" placeholder="Ex.: Shell">
            </div>

            <div class="form-group col-md-12">
                <label for="attendant_name">Funcionário</label>
                <input ng-model="attendantName" type="text" class="form-control" id="attendant_name" placeholder="Ex.: José, dono do posto">
            </div>

            <div class="form-group col-sm-12 col-md-8 col-lg-8">
                <label for="attendant_name">CEP</label>
                <input ng-model="stationCep" type="text" class="form-control" id="station_cep" placeholder="Ex.: 08912311">
            </div>

            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <div class="hidden-xs" style="height: 30px;"></div>
                <button type="button" ng-click="searchCep()" class="btn blue btn-primary btn-lg">Pesquisar CEP</button>
            </div>

            <div class="form-group col-md-12 col-md-6 col-lg-6">
                <label for="attendant_name">Estado</label>
                <input ng-model="stationState" readonly type="text" class="form-control" id="station_state" placeholder="Ex.: São Paulo">
            </div>

            <div class="form-group col-md-12 col-md-6 col-lg-6">
                <label for="station_city">Cidade</label>
                <input ng-model="stationCity" readonly type="text" class="form-control" id="station_city" placeholder="Ex.: São Paulo">
            </div>

            <div class="form-group col-md-12">
                <label for="station_district">Bairro</label>
                <input ng-model="stationDistrict" readonly type="text" class="form-control" id="station_district" placeholder="Ex.: Santo Amaro">
            </div>

            <div class="form-group col-md-12">
                <label for="station_address">Endereço</label>
                <input ng-model="stationAddress" readonly type="text" class="form-control" id="station_address" placeholder="Ex.: Av. João Dias, 901">
            </div>

        </fieldset>

        <fieldset style="margin-bottom: 20px;" class="col-sm-12 col-md-12 col-lg-12">
            <legend>Amostra</legend>

            <div class="form-group col-md-12">
                <label for="sample_volume">Volume em milímetros</label>
                <input ng-model="sampleVolume" type="number" class="form-control" id="sample_volume" placeholder="Ex.: 80">
            </div>

            <div class="form-group col-md-12">
                <label for="sample_volume">Pureza em %</label>
                <input ng-model="sampleResult" ng-value="calcAEAC(sampleVolume)" readonly type="number" class="form-control" id="sample_result" placeholder="Ex.: 61%">
            </div>

            <div class="form-group col-md-12">
                <label for="proceedings">Procedimento</label>
                <textarea rows="5" ng-model="proceedings" class="form-control" id="proceedings" placeholder="Ex.: Descreva o procedimento de coleta da amostra."></textarea>
            </div>

            <div class="form-group col-md-12">
                <label for="observation">Observações</label>
                <textarea rows="5" ng-model="observation" class="form-control" id="observation" placeholder="Ex.: Observações adicionais"></textarea>
            </div>

        </fieldset>


        <div class="form-group col-md-12">
            <button type="button" ng-click="postSample()" class="btn btn-primary green btn-lg pull-right">Enviar</button>
        </div>

    </div>

</div>