const mic_btn = document.querySelector("#mic")
const playback = document.querySelector(".playback")
const input = document.querySelector("#aud")
mic_btn.addEventListener('click', ToggleMic)
let can_record = false
let is_recording = false
let recorder = null
let chunks = []

function setupAudion() {
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices
            .getUserMedia({
                audio: true
            })
            .then(SetupStream)
            .catch(err => {
                console.error(err)
            })
    }
}
setupAudion()

function SetupStream(stream) {
    recorder = new MediaRecorder(stream)
    recorder.ondataavailable = e => {
        chunks.push(e.data)
    }
    recorder.onstop = e => {

        const blob = new Blob(chunks, { type: "audio/ogg; codecs=opus" })
        chunks = []
        const audioUrl = window.URL.createObjectURL(blob)
        playback.src = audioUrl
        input.value = audioUrl
            // get audio stream
        const reader = new FileReader()
        reader.readAsDataURL(blob)
        reader.onloadend = function() {
            // get base64
            let base64 = reader.result

            // get only base64 data
            base64 = base64.split(',')[1]
            input.value = base64
                // alert(base64)

        }

    }
    can_record = true
}

function ToggleMic() {
    if (!can_record) return
    is_recording = !is_recording
    if (is_recording) {
        recorder.start()
        mic_btn.classList.add('is_recording')
    } else {
        recorder.stop()
        mic_btn.classList.remove('is_recording')
            // alert(input.value)
    }
}