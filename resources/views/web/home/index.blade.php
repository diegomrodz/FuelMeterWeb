<ng-map style="position: absolute; top: 0; left: 0; width: 100%; height: 94%;"
        center="current-position"
        geo-fallback-center="[-23.6523747, -46.7664347]"
        map-type-control="true"
        map-type-control-options="{style:'HORIZONTAL_BAR', position:'TOP_CENTER'}"
        zoom-control="true"
        zoom-control-options="{ position:'LEFT_BOTTOM'}"
        street-view-control="true"
        street-view-control-options="{position:'LEFT_BOTTOM'}">

    <custom-marker ng-repeat="marker in markers"
        id="{{marker.id}}"
        position="[{{marker.station_lat}}, {{marker.station_lng}}]">

        <div class="custom-marker">
            <a href="#/sample/{{marker.id}}">{{marker.station_name}}</a>
        </div>

    </custom-marker>

</ng-map>
