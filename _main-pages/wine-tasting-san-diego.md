---
layout: default
title: Wine Tasting San Diego | Granite Lion Cellars
description: The best san diego wine tasting. 
permalink: /wine-tasting-san-diego/
navclass: tasting
navtitle: tasting
pageclass: wine-tasting
navorder: 2
---
<div class="section-header" style="background-image: url('/images/banners/wine-pour.jpg');">
	<h1>Wine Tasting San Diego</h1>
</div>

<section id="tasting-room" class="tasting-room">
	<h2  class="editable">Wine Tasting in San Diego</h2>
	<div class="hours">
		<h3  class="editable">We Are Open</h3>
		<h4  class="editable">Saturday and Sunday</h4>
		<h4  class="editable">11:00 AM to Sundown (5:00 PM)</h4>
		<h4  class="editable">or by appointment. <strong style="font-weight: 300;">619-433-9896</strong></h4>
	</div>
	<br />
	<br />
	<p  class="editable">We can’t wait any longer! Grant and Sarah, our winemakers, have agreed to leave us some fine American Oak for a table and a corkscrew at our disposal. Tastings are available at the production facility. Come enjoy our award winning red and white wines, and get a taste from the barrel of what is coming.
	 <br /><br />
	Tastings are complimentary for wine club members, and we will apply the fee to the purchase of your first bottle for all visitors. We will be open Saturday and Sunday from 11 a.m. to dusk or call us for an appointment and we will meet you there.
	 <br /><br />
	You can find us <strong>Just 100 yards south of 2824 Jamul Highlands Road</strong>.
	 <br /><br />
	We look forward to seeing you at the vineyard!</p>
</section>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCL__svPmfgDVeRkW6w5m7m-TBXV-ECVZ0&sensor=false&extension=.js'></script> 
 
<script> 
    google.maps.event.addDomListener(window, 'load', init);
    var map;
    function init() {
        var mapOptions = {
            center: new google.maps.LatLng(32.668401,-117.005975),
            zoom: 10,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
            },
            disableDoubleClickZoom: true,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            },
            scaleControl: false,
            scrollwheel: false,
            panControl: false,
            streetViewControl: true,
            draggable : true,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
  {
    "featureType": "road",
    "elementType": "labels",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "poi",
    "elementType": "labels",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "transit",
    "elementType": "labels.text",
    "stylers": [
      { "visibility": "off" }
    ]
  }
],
        }
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var locations = [
['Granite Lion Cellars Vineyard', '100 yards south of 2824 Jamul Highlands Road Jamul, Cal 91935', '(619) 433-9896', 'service@granitelioncellars.com', '', 32.71231985937441, -116.84713026850892, 'https://mapbuildr.com/assets/img/markers/default.png']
        ];
        for (i = 0; i < locations.length; i++) {
			if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
			if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
			if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
           if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
           if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
            marker = new google.maps.Marker({
                icon: markericon,
                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                map: map,
                title: locations[i][0],
                desc: description,
                tel: telephone,
                email: email,
                web: web
            });
if (web.substring(0, 7) != "http://") {
link = "http://" + web;
} else {
link = web;
}
            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
     }
 function bindInfoWindow(marker, map, title, desc, telephone, email, web, link) {
      var infoWindowVisible = (function () {
              var currentlyVisible = false;
              return function (visible) {
                  if (visible !== undefined) {
                      currentlyVisible = visible;
                  }
                  return currentlyVisible;
               };
           }());
           iw = new google.maps.InfoWindow();
           google.maps.event.addListener(marker, 'click', function() {
               if (infoWindowVisible()) {
                   iw.close();
                   infoWindowVisible(false);
               } else {
                   var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><p>"+telephone+"<p><a href='mailto:"+email+"' >"+email+"<a><a href='"+link+"'' >"+web+"<a></div>";
                   iw = new google.maps.InfoWindow({content:html});
                   iw.open(map,marker);
                   infoWindowVisible(true);
               }
        });
        google.maps.event.addListener(iw, 'closeclick', function () {
            infoWindowVisible(false);
        });
 }
}
</script>

<div id='map'></div>

