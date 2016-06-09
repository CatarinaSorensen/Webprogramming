<!doctype html>
<html lang="en">
<head>
  <title>Test</title>
  <script>
    $(function() {
      function log( message ) {
        $( "<div>" ).text( message ).prependTo( "#log" );
        $( "#log" ).scrollTop( 0 );
      }

      $( "#city" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: "http://gd.geobytes.com/AutoCompleteCity",
            dataType: "jsonp",
            data: {
              q: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        minLength: 3,
        select: function( event, ui ) {
          log( ui.item ?
            "Selected: " + ui.item.label :
            "Nothing selected, input was " + this.value);
        },
        open: function() {
          $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
        },
        close: function() {
          $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
        }
      });
    });
  </script>
</head>
<body>

  <div class="ui-widget">
    <label for="city">Your city: </label>
    <input id="city">
    Powered by <a href="http://geonames.org">geonames.org</a>
  </div>

  <div class="ui-widget" style="margin-top:2em; font-family:Arial">
    Result:
    <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
  </div>


</body>
</html>
