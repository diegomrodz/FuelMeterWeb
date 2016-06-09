<script type="text/ng-template" id="whyUndergroundTanks.html">
    <h5>Por que perguntar o Número de Tanques Subterrâneos?</h5>
    <p>
        No Brasil existem aproximadamente 35 mil postos de combustíveis, sendo que a maioria foi construída na década de 70. Com uma média de vida útil de 25 anos
        para tanques subterrâneos, supõe-se que eles já estejam comprometidos. No ano de 2007 o consumo de álcool, gasolina e diesel foi de 9, 24 e 41 milhões de m3,
        respectivamente. De acordo com a CETESB, os postos respondem por 63% das áreas contaminadas em São Paulo. (<a href="http://www.cenedcursos.com.br/meio-ambiente/postos-de-combustiveis-contaminacao-de-aquiferos/">Fonte</a>)
    </p>
    <p>
        Para que depois possa realizado um estudo comparativos entre os dados de poluição e a localização dos postos, pedimos que você pergunte o número de 
        tanques subterrâneos. Caso o posto negue essa informação, procure pelos tupos de escape dos gases. Estes normalmente estão enfileirados em sequência e 
        possuem uma altura considerável.
    </p>
</script>

<script type="text/ng-template" id="howToKnowTheVolume.html">
    <h5>Como saber o volume após mistura?</h5>
    <p>
        Basta inserir o valor da camada aquosa formada após a mistura da água e da gasolina que o resutado do AEAC é calculado automaticamente.
    </p>
</script>

<script type="text/ng-template" id="correctProceedings.html">
    <h5>Procedimento Correto</h5>
    <p>
    A realização do "Teste da Proveta" é bastante simples, e qualquer um pode pedir para que seu posto de confiança faça o teste (Conforme a Resolução ANP nº 9, de 7 de março de 2007).
    Para isso siga os sehuintes passos:
    </p>

    <br>

    <div style="margin-left: 20px;">
        <p>Obtenha de uma proveta milimetrada de 100ml;</p>
        <p>Adicione 50ml da Gasolina retirada direto do tanque;</p>
        <p>Depois adicione 50ml de água;</p>
        <p>Vire a proveta pelo menos 3 vezes;</p>
        <p>Espere as duas camadas se separarem;</p>
        <p>Agora anote o volume da camada aquosa;</p>
    </div>
</script>

<div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12">

        <fieldset style="margin-bottom: 20px;" class="col-sm-12 col-md-12 col-lg-12">
            <legend>Você</legend>

            <div class="form-group col-md-12">
                <label for="name">Nome</label>
                <input ng-model="sample.name" type="text" class="form-control" id="name" placeholder="Ex.: Fulano de Tal">
            </div>

            <div class="form-group col-md-12">
                <label for="institution">Instituição</label><a class="pull-right">Por que?</a>
                <input ng-model="sample.institution" type="text" class="form-control" id="email" placeholder="Ex.: Faculdade Bolinha">
            </div>

            <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input ng-model="sample.email" type="text" class="form-control" id="email" placeholder="Ex.: fulano.tal@email.com">
            </div>

        </fieldset>

        <fieldset style="margin-bottom: 20px;"  class="col-sm-12 col-md-12 col-lg-12">
            <legend>Posto</legend>

            <div class="form-group col-md-12">
                <label for="station_name">Nome</label>
                <input ng-model="sample.stationName" type="text" class="form-control" id="station_name" placeholder="Ex.: Posto do José">
            </div>

            <div class="form-group col-md-12">
                <label for="station_flag">Bandeira</label>
                <input ng-model="sample.stationFlag" type="text" class="form-control" id="station_name" placeholder="Ex.: Shell">
            </div>

            <div class="form-group col-md-12">
                <label for="attendant_name">Funcionário</label>
                <input ng-model="sample.attendantName" type="text" class="form-control" id="attendant_name" placeholder="Ex.: José, dono do posto">
            </div>
            
            <div class="form-group col-md-12">
                <label for="underground_tanks_number">(Opcional) Número de Tanques Subterrâneos</label><a class="pull-right" ng-click="whyUndergroundTanks()">Por que?</a>
                <input ng-model="sample.undergroundTanksNumber" type="number" class="form-control" id="underground_tanks_number" placeholder="Ex.: 5">
            </div>
            

            <div class="form-group col-sm-12 col-md-8 col-lg-8">
                <label for="attendant_name">CEP</label>
                <input ng-model="sample.stationCep" type="text" class="form-control" id="station_cep" placeholder="Ex.: 08912311">
            </div>

            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <div class="hidden-xs" style="height: 30px;"></div>
                <button type="button" ng-click="searchCep()" class="btn blue btn-primary btn-lg">Pesquisar CEP</button>
            </div>

            <div class="form-group col-md-12 col-md-6 col-lg-6">
                <label for="attendant_name">Estado</label>
                <input ng-model="sample.stationState" readonly type="text" class="form-control" id="station_state" placeholder="Ex.: São Paulo">
            </div>

            <div class="form-group col-md-12 col-md-6 col-lg-6">
                <label for="station_city">Cidade</label>
                <input ng-model="sample.stationCity" readonly type="text" class="form-control" id="station_city" placeholder="Ex.: São Paulo">
            </div>

            <div class="form-group col-md-12">
                <label for="station_district">Bairro</label>
                <input ng-model="sample.stationDistrict" readonly type="text" class="form-control" id="station_district" placeholder="Ex.: Santo Amaro">
            </div>

            <div class="form-group col-md-12">
                <label for="station_address">Endereço</label>
                <input ng-model="sample.stationAddress" readonly type="text" class="form-control" id="station_address" placeholder="Ex.: Av. João Dias, 901">
            </div>

        </fieldset>

        <fieldset style="margin-bottom: 20px;" class="col-sm-12 col-md-12 col-lg-12">
            <legend>Amostra</legend>

            <div class="form-group col-md-12">
                <label for="sample_volume">Volume em milímetros</label> <a class="pull-right" ng-click="howToKnowTheVolume()">Como saber?</a>
                <input ng-model="sample.sampleVolume" type="number" class="form-control" id="sample_volume" placeholder="Ex.: 80">
            </div>

            <div class="form-group col-md-12">
                <label for="sample_volume">Teor Alcoólico</label>
                <input ng-model="sample.sampleResult" ng-value="calcAEAC(sampleVolume)" readonly type="number" class="form-control" id="sample_result" placeholder="Ex.: 61%">
            </div>
            
            <!--<div class="form-group col-md-12">
                <label for="sample_photo">Foto da Amostra:</label>
                <input type="file" file-model="sample.samplePhoto" accept="image/*">
            </div>-->

            <div class="form-group col-md-12">
                <label for="proceedings">Procedimento</label> <a class="pull-right" ng-click="correctProceedings()">Procedimento Correto</a>
                <textarea rows="5" ng-model="sample.proceedings" class="form-control" id="proceedings" placeholder="Ex.: Descreva o procedimento de coleta da amostra."></textarea>
            </div>

            <div class="form-group col-md-12">
                <label for="observation">Observações</label>
                <textarea rows="5" ng-model="sample.observation" class="form-control" id="observation" placeholder="Ex.: Observações adicionais"></textarea>
            </div>

        </fieldset>


        <div class="form-group col-md-12">
            <button type="button" ng-click="postSample()" class="btn btn-primary green btn-lg pull-right">Enviar</button>
        </div>

    </div>

</div>