(function() {

  var ajaxLikes = document.getElementsByClassName('js-like');

  if (ajaxLikes.length > 0) {
    toggleLike(ajaxLikes);
  }

  if (document.querySelector('#video'))
    loadPhotobooth();


  function loadPhotobooth() {
    var streaming = false,
    video        = document.querySelector('#video'),
    cover        = document.querySelector('#cover'),
    canvas       = document.querySelector('#canvas'),
    photo        = document.querySelector('#photo'),
    filters      = document.querySelector('#filters'),
    filter       = document.querySelector('#filter'),
    preview      = document.querySelector('#preview'),
    take         = document.querySelector('#take'),
    undo         = document.querySelector('#undo'),
    send         = document.querySelector('#send'),
    imageOutput  = document.querySelector('#output'),
    width = 640,
    height = 0;

    navigator.webcam = ( navigator.getUserMedia ||
      navigator.webkitGetUserMedia ||
      navigator.mozGetUserMedia ||
      navigator.msGetUserMedia);

    navigator.webcam(
      {
        video: true,
        audio: false
      },
      function(stream) {
        if (navigator.mozGetUserMedia) {
          video.mozSrcObject = stream;
        } else {
          var vendorURL = window.URL || window.webkitURL;
          video.src = vendorURL.createObjectURL(stream);
        }
        video.play();
      },
      function(err) {
        console.log("An error occured! " + err);
      }
    );

    video.addEventListener('canplay', function(event){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    function takepicture() {
      canvas.width = width;
      canvas.height = height;
      canvas.getContext('2d').drawImage(video, 0, 0, width, height);
      canvas.getContext('2d').drawImage(filter, 0, 0, width, height);
      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);
      imageOutput.value = data;
      photo.setAttribute('class', 'taken');
      undo.disabled = false;
      send.disabled = false;
      take.disabled = true;
    }

    filters.addEventListener('click', function(event){
      var src = event.target.src;
      filter.src = src;
    }, false);

    undo.addEventListener('click', function(event) {
      photo.classList.remove('taken');
      take.disabled = false;
      send.disabled = true;
      undo.disabled = true;
    }, false);

    take.addEventListener('click', function(event){
      preview.setAttribute('class', 'taken');
      setTimeout(function(){
        preview.classList.remove('taken');
        takepicture();
      }, 3000);
      event.preventDefault();
    }, false);
  }

  function toggleLike(likes) {
    var body = document.body;
    body.addEventListener('click', function(event) {
      if (event.target.getAttribute('data-snap') !== null) {
        var snap = event.target.getAttribute('data-snap');
        var user = event.target.getAttribute('data-user');
        console.log(snap, user);
      }
    }, false);
  }

})();
