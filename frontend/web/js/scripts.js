$(document).ready(function () {

    $('.active-edit-block .edit-action-icon').fancybox({
        //maxWidth	: 800,
        //maxHeight	: 600,
        type: 'iframe',
        fitToView: false ,
        width: '80%',
        height: '70%',
        autoSize: true,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose : function() {
            location.reload();
            return;
        },
        padding     : 0,
        margin      : [20, 60, 20, 60]

        //helpers : {
        //    overlay: {
        //        opacity: 0.8, // or the opacity you want
        //        css: {'background-color': '#ff0000'} // or your preferred hex color value
        //    } // overlay
        //} // helpers
    });
});


function UploadFileByAjax() {
    $('#mf').fileupload({
        dataType: 'json',
//        acceptFileTypes: /^application\/(msword|vnd.openxmlformats|vnd.openxmlformats-officedocument.spreadsheetml.sheet|vnd.ms-excel|zip|x-rar-compressed|pdf)$/i,
        add: function (e, data) {
            console.log('ADD: ' + data.result + ' ' + data.textStatus + ' ' + data.jqXHR);

            var uploadErrors = [];
            var acceptFileTypes = /^application\/(msword|vnd.openxmlformats|vnd.openxmlformats-officedocument.spreadsheetml.sheet|vnd.ms-excel|zip|x-rar-compressed|pdf)$/i;
            if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                uploadErrors.push('Разрешенный к добавлению файлы с расширением: .doc, .docx, .xls, .xlsx, .pdf, .zip, .rar');
            }
//            if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 5000000) {
//                uploadErrors.push('Filesize is too big');
//            }
            if (uploadErrors.length > 0) {
                alert(uploadErrors.join("\n"));
            } else {

                $('#form_mf').html('<div class="MultiFile-label"><a class="MultiFile-remove" href="#mf_wrap"><img src="img/delete.png"></a> <span class="MultiFile-title" title="File selected: ' + data.originalFiles[0]['name'] + '">' + data.originalFiles[0]['name'] + '</span></div>');

                data.submit();
            }
        },
        done: function (e, data) {
            console.log('done: ' + data.result.attach + ' ' + data.textStatus + ' ' + data.jqXHR + ' ');
            $('#attached_file').val('');
            $('#attached_file').val(data.result.attach);
        },
        fail: function (e, data) {
            console.log('FAIL: ' + data.errorThrown + ' ' + data.textStatus + ' ' + data.jqXHR.abort() + ' ');
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10) / 100;
            if (progress > 0.3) {
                $('#form_mf .MultiFile-label').css(
                    'opacity',
                    progress
                );
            }

        }
    });
}