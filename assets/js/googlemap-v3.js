/*
* Google Map Js File for Fixmykasi 
* @ Author Tsotetsi Thapelo 
* Vesion: 1.0
*/



function makeRequest(url, callback) {
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
    }
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            callback(request);
        }
    }
    request.open("GET", url, true);
    request.send();
}


function initialize3() {
  var myLatlng = new google.maps.LatLng(-25.73134, 28.21837);
  var mapOptions = {
    zoom: 13,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    disableDefaultUI: false,
    disableDoubleClickZoom: true,
    navigationControl: true,
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.ZOOM_PAN
    }
  }

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


  var places = [];
  var contentInfo = [];
  var infowindow;

  makeRequest('report_data.php', function(data){
    var data = JSON.parse(data.responseText);
      for(var i =0; i < data.length; i++){
        //var dataId = data[i].report_id;
        places.push(new google.maps.LatLng(data[i].latitude, data[i].longitude));
        contentInfo.push(data[i].subject+" "+"<a href='details.php?id="+data[i].report_id+"'>Read More</a");
      }

//<a href='http://localhost:8095/../details.php?id='"+data[i].report_id=+
    for (var i = 0; i < places.length; i++){
    //adding markers as usual.
    var marker = new google.maps.Marker({
      position: places[i],
      map: map
    });



    (function(i, marker){
      google.maps.event.addListener(marker, 'click', function(){
        if(!infowindow){
          infowindow = new google.maps.InfoWindow();
        }
        infowindow.setContent(contentInfo[i]);
        infowindow.open(map, marker)
      });
    })(i, marker);
  }
  });
google.maps.event.addDomListener(window, 'load', initialize3);
}


function initialize() {
  var myLatlng = new google.maps.LatLng(-25.73134, 28.21837);
  var mapOptions = {
    zoom: 13,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    disableDefaultUI: false,
    disableDoubleClickZoom: true,
    navigationControl: true,
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.ZOOM_PAN
    }
  }

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Pretoria (Tshwane)'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

  google.maps.event.addListener(map, "rightclick", function(event){
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();


    if(marker){
      marker.setMap(null)}
    marker = new google.maps.Marker({position:event.latLng, map:map});

    //call function to create marker
    $("#lat").val(event.latLng.lat());
    $("#lon").val(event.latLng.lng());
    //$("#latitude").select();
    //alert("Lat=" + lat +"; Lng=" +lng);

  });


  var places = [];
  var infowindow;

  makeRequest('report_data.php', function(data){
    var data = JSON.parse(data.responseText);
      for(var i =0; i < data.length; i++){
        places.push(new google.maps.LatLng(data.latitude, data.longitude))
      }
  });

  //adding a latlng object for each city
  //places.push(new google.maps.LatLng(-25.75137, 28.17306));
  //places.push(new google.maps.LatLng(-25.78105, 28.21838));
  //places.push(new google.maps.LatLng(-25.71549, 28.29528));

  for (var i = 0; i < places.length; i++){
    //adding markers as usual.
    var marker = new google.maps.Marker({
      position: places[i],
      map: map
    });


    (function(i, marker){
      google.maps.event.addListener(marker, 'click', function(){
        if(!infowindow){
          infowindow = new google.maps.InfoWindow();
        }
        infowindow.setContent('Place number' + i);
        infowindow.open(map, marker)
      });
    })(i, marker);
  }


}





function initialize2() {

  var url = window.location.href;
  var hash = url.substring(url.indexOf("=")+1)

  //alert(url+""+hash);

  makeRequest('report_data_detail.php?id='+hash, function(data){
    var data = JSON.parse(data.responseText);

    myLatlng = new google.maps.LatLng(data.latitude, data.longitude);


  var mapOptions = {
    zoom: 17,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    disableDefaultUI: false,
    disableDoubleClickZoom: true,
    navigationControl: true,
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.ZOOM_PAN
    }
  }    

   var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

   var imgname = data.imagename;

   var contentString = '<div id="content">'+
      '<img src="http://localhost:8095/bootstraplive/docs/finalfixmkasi/fixmykasi/uploadajax/uploads/'+imgname+'" alt="Test"'+
      '<h1 id="firstHeading" class="firstHeading">Subject</h1>'+
        '<p>'+data.subject+'</p>'+
      '<div id="bodyContent">'+
      '<p><b>Awaiting comments and updates.</b>' +
      '</p>'+
     
      '</div>'+
      '</div>';

   var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Pretoria2 (Tshwane2)'
  });

 infowindow.open(map, marker);


  });


}


//google.maps.event.addDomListener(window, 'load', initialize);

