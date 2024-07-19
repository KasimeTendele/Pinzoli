<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Csrf_token" content="{{Csrf_token()}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Document</title>
</head>

<body>
  

    <i class="fa fa-microphone" id="icon-record-audio" onclick="recordAudio()" style="cursor: pointer;"></i>
    <form action="{{route('traitement')}}" enctype="multipart/form-data" method="post" >
        @csrf
        <input type="hidden" id="audios"  name="fichier" value="1">
        <button type="submit">envoyer</button>
    </form>

    <p onclick="sendVoiceNote()">send</p>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="Csrf_token"]').attr('content')
            }
          
        })
   

// function sendVoiceNote(base64) {
//     // create an instance for AJAX
//     // var ajax = new XMLHttpRequest()

//     const formData = new FormData()
//     formData.append("base64", base64)
//             // const formData=$(this).serializeArray();
//             $.ajax({
//                 type:'post',
//                 url:"{{ route('traitement')}}",
//                 data:formData,
//                 Cache:false,
//                 contentType:false,
//                 // dataType:'Json',
//                 processData:false,
//                 beforeSend: function(){
//                     $("#envoyer").text('chargement...');
//                 },
                
//                 success:(data)=>{
//                     console.log(data)
//                 },
//                 error:function(data){
//                     console.log(data);
//                 }
//                 })
   
// }


function doRecordAudio() {
    let audio=document.querySelector("#audios")
    return new Promise(function(resolve) {
        // get user audio media
        navigator.mediaDevices.getUserMedia({
                audio: true
            })
            .then(function(stream) {
                // create media recorder object
                const mediaRecorder = new MediaRecorder(stream)

                // save audio chunks in an array
                const audioChunks = []
                mediaRecorder.addEventListener("dataavailable", function(event) {
                    audioChunks.push(event.data)
                })

                // create a start function
                const start = function() {

                    // when recording starts, set the icon to stop
                    document.getElementById("icon-record-audio").className = "fa fa-stop-circle"

                    // on icon clicked
                    document.getElementById("icon-record-audio").onclick = async function() {
                        // stop the recorder
                        if (recorder != null) {
                            const audio = await recorder.stop()

                            // play the audio
                            audio.play()

                            // get audio stream
                            const reader = new FileReader()
                            reader.readAsDataURL(audio.audioBlob)
                            reader.onloadend = function() {
                                // get base64
                                let base64 = reader.result

                                // get only base64 data
                                base64 = base64.split(',')[1]
                                audios.value=base64


                                // send base64 to server to save
                                // sendVoiceNote(base64)
                            }
                        }
                    }

                    // start media recorder
                    mediaRecorder.start()
                }

                // create a stop function
                const stop = function() {
                    return new Promise(function(resolve) {

                        // on recording stop listener
                        mediaRecorder.addEventListener("stop", function() {

                            // change the icon back to microphone
                            document.getElementById("icon-record-audio").className = "fa fa-microphone"

                            // reset the onclick listener so when again clicked, it will record a new audio
                            document.getElementById("icon-record-audio").onclick = async function() {
                                recordAudio()
                            }

                            // convert the audio chunks array into blob
                            const audioBlob = new Blob(audioChunks)

                            // create URL object from URL
                            const audioUrl = URL.createObjectURL(audioBlob)

                            // create an audio object to play
                            const audio = new Audio(audioUrl)
                            const play = function() {
                                audio.play()
                            }

                            // send the values back to the promise
                            resolve({
                                audioBlob,
                                play
                            })
                        })

                        // stop the media recorder
                        mediaRecorder.stop()
                    })
                }

                // send the values back to promise
                resolve({
                    start,
                    stop
                })
            })
    })
}

// function to record audio
async function recordAudio() {
    // get permission to access microphone
    navigator.permissions.query({
            name: 'microphone'
        })
        .then(function(permissionObj) {
            console.log(permissionObj.state)
        })
        .catch(function(error) {
            console.log('Got error :', error);
        })

    // get recorder object
    recorder = await doRecordAudio()

    // start audio
    recorder.start()
}
    </script>


</body>

</html>