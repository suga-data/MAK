var canvas = document.querySelector("#myCanvas");
var context = canvas.getContext("2d");
 
var canvasPos = getPosition(canvas);
var mouseX = 0;
var mouseY = 0;
var sqSize = 100;
var xPos = 0;
var yPos = 0;
var dX = 0;
var dY = 0;
 
canvas.addEventListener("mousemove", setMousePosition, false);
 
function setMousePosition(e) {
  mouseX = e.clientX - canvasPos.x;
  mouseY = e.clientY - canvasPos.y;
}
 
function animate() {
  dX = mouseX - xPos;
  dY = mouseY - yPos;
 
  xPos += (dX / 10);
  yPos += (dY / 10);
 
  context.clearRect(0, 0, canvas.width, canvas.height);
 
  context.fillStyle = "#00CCFF";
  context.fillRect(xPos - sqSize / 2,
                   yPos - sqSize / 2,
                   sqSize,
                   sqSize);
 
  requestAnimationFrame(animate);
}
animate();
 
// deal with the page getting resized or scrolled
window.addEventListener("scroll", updatePosition, false);
window.addEventListener("resize", updatePosition, false);
 
function updatePosition() {
  canvasPos = getPosition(canvas);
}
 
// Helper function to get an element's exact position
function getPosition(el) {
  var xPos = 0;
  var yPos = 0;
 
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
      var yScroll = el.scrollTop || document.documentElement.scrollTop;
 
      xPos += (el.offsetLeft - xScroll + el.clientLeft);
      yPos += (el.offsetTop - yScroll + el.clientTop);
    } else {
      // for all other non-BODY elements
      xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
      yPos += (el.offsetTop - el.scrollTop + el.clientTop);
    }
 
    el = el.offsetParent;
  }
  return {
    x: xPos,
    y: yPos
  };
}   