<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <fieldset>
            <legend>Amostra #{{sensor.id}}</legend>

            <table class="table">
                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Nome:</strong></td>
                    <td>{{sensor.name}}</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Instituição:</strong></td>
                    <td>{{sensor.institution}}</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Posto:</strong></td>
                    <td>{{sensor.email}}</td>
                </tr>

            </table>

            <hr>

            <table class="table">

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Posto:</strong></td>
                    <td>{{sensor.station_name}}</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Bandeira:</strong></td>
                    <td>{{sensor.station_flag}}</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Funcionário:</strong></td>
                    <td>{{sensor.attendant_name}}</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">CEP:</strong></td>
                    <td>{{sensor.station_cep}}</td>
                    <td><strong style="font-weight: bold;">Bairro:</strong></td>
                    <td>{{sensor.station_district}}</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Estado:</strong></td>
                    <td>{{sensor.station_state}}</td>
                    <td><strong style="font-weight: bold;">Cidade:</strong></td>
                    <td>{{sensor.station_city}}</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Endereço:</strong></td>
                    <td>{{sensor.station_address}}</td>
                </tr>

            </table>

            <hr>

            <table>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Medida:</strong></td>
                    <td>{{sensor.sample_volume}} ml</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Resultado:</strong></td>
                    <td>{{sensor.sample_result}} %</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Procedimento:</strong></td>
                    <td>{{sensor.proceedings}}</td>
                </tr>

                <tr>
                    <td style="width: 30%;"><strong style="font-weight: bold;">Observação:</strong></td>
                    <td>{{sensor.observation}}</td>
                </tr>

            </table>

        </fieldset>

    </div>
</div>