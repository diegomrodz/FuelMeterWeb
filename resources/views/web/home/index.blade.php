<ng-map style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
        center="current-position"
        geo-fallback-center="[-23.6523747, -46.7664347]"
        map-type-control="true"
        map-type-control-options="{style:'HORIZONTAL_BAR', position:'TOP_CENTER'}"
        zoom-control="true"
        zoom-control-options="{ position:'LEFT_BOTTOM'}"
        street-view-control="true"
        street-view-control-options="{position:'LEFT_BOTTOM'}">

    <custom-marker ng-repeat="marker in markers"
        id="{{marker[0].id}}"
        position="[{{marker[0].station_lat}}, {{marker[0].station_lng}}]">

        <div class="custom-marker">
            <a href="#/sample/{{marker[0].id}}">{{marker[0].station_name}}</a>
        </div>

    </custom-marker>

</ng-map>
