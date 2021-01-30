document.querySelectorAll(".drop-zone__input").forEach(inputElement =>{
    const dropZoneElement=inputElemet.closest(".drop-zone");

    dropZoneElement.addEventListener("dragover",e=>{
        e.preventDEfault();
        dropZoneElement.classList.add("drop-zone--over");
    });

    ("dragleave","dragend").forEach(type=>{
        dropZoneElement.addEventListener(type,e=>{
            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    dropZoneElement.addEventListener("drop",e=>{
        e.preventDEfault();
        console.log(e.dataTransfer.files);
    });

} );

// $("#file-1").fileinput({
//     theme: 'fa',
//     uploadUrl: '#',
//     allowedFileExtensions: ['jpg', 'png', 'gif'],
//     overwriteInitial: false,
//     maxFileSize:2000,
//     maxFilesNum: 10,
//     slugCallback: function (filename) {
//         return filename.replace('(', '_').replace(']', '_');
//     }
// });