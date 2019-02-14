document.addEventListener('DOMContentLoaded', function() {

    var uploadFormArtist = document.getElementById("artist");
    var uploadFormAlbum = document.getElementById("album");

    uploadFormArtist.addEventListener('change', function() {
        while (uploadFormAlbum.options.length > 0) {
            uploadFormAlbum.options[0].remove();
        }
        uploadFormAlbum.options.add(createOptionObject("none", "Keinem Album zugeordnet"));


        var selectedArtistId = uploadFormArtist.options[uploadFormArtist.selectedIndex].value;

        fetch('http://localhost/musicstreaming/public/?p=api_albums&artistid=' + selectedArtistId).then(function(rawResponse) {
            rawResponse.json().then(function(json){
                if (json != null){
                    for(var i = 0; i < json.length; i++) {
                        uploadFormAlbum.options.add(createOptionObject(json[i]["id"],json[i]["name"]));
                    }
                }
            })
        })
        uploadFormAlbum.disabled = false;
    });


    function createOptionObject(value, text) {
        var option = document.createElement("option");
        option.value = value;
        option.text = text;
        return option;
    }
});