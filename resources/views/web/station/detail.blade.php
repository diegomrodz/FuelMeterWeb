<fieldset>
    <legend>Posto</legend>
    
    <table class="table">
        
        <tr>
            <td style="width: 15%;"><strong style="font-weight: bold;">Nome:</strong></td>
            <td>{{station.station_name}}</td>
        </tr>

        <tr>
            <td style="width: 15%;"><strong style="font-weight: bold;">Bandeira:</strong></td>
            <td>{{station.station_flag}}</td>
        </tr>
        
        <tr>
            <td style="width: 15%;"><strong style="font-weight: bold;">CEP:</strong></td>
            <td>{{station.station_cep}}</td>
            <td style="width: 5%;"><strong style="font-weight: bold;">UF:</strong></td>
            <td style="width: 5%">{{station.station_state}}</td>
            <td style="width: 10%;"><strong style="font-weight: bold;">Cidade:</strong></td>
            <td>{{station.station_city}}</td>
        </tr>

        <tr>
            <td style="width: 15%;"><strong style="font-weight: bold;">Endereço:</strong></td>
            <td>{{station.station_address}}</td>
        </tr>

    </table>
    
    <table>
        <caption>Amostras coletadas neste posto</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Usuário</th>
                <th>Instituição</th>
                <th>Teor Alcoólico</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="sample in samples">
                <td><a href="#/sample/{{sample.id}}">{{sample.id}}</a></td>
                <td>{{sample.name}}</td>
                <td>{{sample.institution}}</td>
                <td>{{sample.sample_result}}%</td>
            </tr>
        </tbody>
    </table>
    
</fieldset>