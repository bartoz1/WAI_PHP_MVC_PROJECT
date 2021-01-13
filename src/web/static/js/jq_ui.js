$('#przedzial_cenowy').css("display", "block")
$( function() {
    var tooltips = $( "[title]" ).tooltip({
      position: {
        my: "left top",
        at: "left-20 bottom+5",
        collision: "none"
      }
})});

$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 100,
      values: [ 15, 40 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "zl" + ui.values[ 0 ] + " - zl" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "zł" + $( "#slider-range" ).slider( "values", 0 ) +
      " - zł" + $( "#slider-range" ).slider( "values", 1 ) );
  } );

  