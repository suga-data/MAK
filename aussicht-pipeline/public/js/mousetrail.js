// var canvas = document.getElementById("#myCanvas");
// var context = canvas.getContext("2d");

// var xPos = -100;
// var yPos = 170;


// function resizeCanvas() {
//   canvas.style.width = window.innerWidth + "px";
//   setTimeout(function() {
//     canvas.style.height = window.innerHeight + "px";
//   }, 0);
// };

// // Webkit/Blink will fire this on load, but Gecko doesn't.
// window.onresize = resizeCanvas;

// // So we fire it manually...
// resizeCanvas();


// function update() {

//   context.clearRect(0, 0, canvas.width, canvas.height);

//   context.beginPath();
//   context. arc(xPos, yPos, 50, 0, 2 * Math.PI, true);
//   context.fillStyle = "#FF6A6A";
//   context.fill();

//   // update position
//   if (xPos > 600) {
//     xPos = -100;
//   }
//   xPos += 3;

//   requestAnimationFrame(update);
// }
// update();