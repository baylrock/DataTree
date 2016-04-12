/**
 * Created by baylrock on 08.03.2016.
 */
$(document).ready( function() {

    $('#ier').fileTree({ script: 'exe.php' }, function(file) {
        //$.fileDownload(file)
        //    .done(function () { alert('File download a success!'); })
        //    .fail(function () { alert('File download failed!'); });
        alert(file);
        downloadURI(file)
    });



});

function downloadURI(uri) {
    var link = document.createElement("a");
    //link.download = name;
    link.target="_blank";
    link.href = "/untitled/test2/tree" + uri;
    link.click();
}