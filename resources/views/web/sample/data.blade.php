<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <table datatable="ng" class="table table-bordered">
            <caption>Amostras</caption>
            <thead>
                <tr>
                    <th>Amostra</th>
                    <th>Usuário</th>
                    <th>Instituição</th>
                    <th>Res. (Pureza)</th>
                    <th>Data e Hora</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="sample in samples">
                    <td><a href="#/sample/{{sample.id}}">{{sample.station_name}}</a></td>
                    <td>{{sample.name}}</td>
                    <td>{{sample.institution}}</td>
                    <td>{{sample.sample_result}} %</td>
                    <td>{{sample.created_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>