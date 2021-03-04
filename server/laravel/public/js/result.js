let map
    
  function initMap(){
    geocoder = new google.maps.Geocoder()
  
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 35.6661309, lng:139.7844453},
      zoom: 15,
    });
  
    marker = new google.maps.Marker({
      position:  {lat: 35.6661309, lng:139.7844453},
      map: map
    });
  }
let geocoder

  function codeAddress(){
  let inputAddress = document.getElementById('address').value;

  geocoder.geocode( { 'address': inputAddress}, function(results, status) {
  if (status == 'OK') {
  map.setCenter(results[0].geometry.location);
  var marker = new google.maps.Marker({
  map: map,
  position: results[0].geometry.location
  });
  display.textContent = "検索結果：" + results[ 0 ].geometry.location
  } else {
  alert('該当する結果がありませんでした：' + status);
  }
  });
  }