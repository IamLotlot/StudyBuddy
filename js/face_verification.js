//// Function for setting up the web cam/camera
const video =  document.getElementById("video");
const canvas =  document.getElementById("canvas");
const snap =  document.getElementById("snap");
const errorMsgElement =  document.getElementById("span#ErrorMsg");

const constraints = {
    audio: false,
    video: {
        width: 320, height: 240
    }
};

async function init(){
    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream);
    } catch(e) {
        errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
    }
}

function handleSuccess(stream) {
    window.stream = stream;
    video.srcObject = stream;
}

init();

var context = canvas.getContext("2d");
snap.addEventListener("click", function(){
    video.style.display = "none";
    canvas.style.display = "block";
    context.drawImage(video, 0, 0, 320, 240);
});

// Function to download canvas content as an image
function downloadCanvasAsImage() {
    const dataURL = canvas.toDataURL("image/png");

    const a = $("<a>")
        .attr("href", dataURL)
        .attr("download", "canvas_image.png");

    a[0].click();
}