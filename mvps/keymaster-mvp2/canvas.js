console.log('Canvas playground')

//Canvas tutorial #1: 05.02.2025 @ https://www.youtube.com/watch?v=EO6OkltgudE&list=PLpPnRKq7eNW3We9VdCfx9fprhqXHwTPXL
//Canvas tutorial #2: 08.02.2025 @ https://www.youtube.com/watch?v=ncIZjf-uJKY
let canvas = document.querySelector('canvas');
canvas.width = 800;
canvas.height = 500;


//c = context
let c = canvas.getContext('2d');    

//c.fillRect(x, y, width, height);
c.fillStyle = 'white';
c.fillRect(400, 250, 20, 20);
c.fillStyle = 'blue';
c.fillRect(200, 50, 20, 210);
c.fillStyle = 'red';
c.fillRect(600, 50, 20, 210);




//Line
// c.moveTo(x, y)
c.beginPath();
c.moveTo(150, 340);
c.lineTo(550, 400);
c.lineTo(610, 350);
c.strokeStyle = 'White';
c.stroke();




//event listener

// document.addEventListener("keydown", event => {
//         console.log(`key down = ${event.key}`)
//         console.log(event)
// });

// document.addEventListener("keydown", event => {
//         console.log(`key up = ${event.key}`)
//         console.log(event)
// });

document.addEventListener("keydown", event => {
        if (event.key === "ArrowUp") {
            console.log("Tasten 'Pil Op' blev trykket ned");
        } else if (event.key === "ArrowLeft") {
            console.log("Tasten 'Pil til Venstre' blev trykket ned");
        } else if (event.key === "ArrowRight") {
            console.log("Tasten 'Pil til Højre' blev trykket ned");
        } else if (event.key === "ArrowDown") {
            console.log("Tasten 'Pil Ned' blev trykket ned");
        } else {
            console.log(`En anden tast blev trykket ned: ${event.key}`);
        }
    });





console.log(canvas);