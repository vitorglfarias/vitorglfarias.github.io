const canvas = document.getElementById('exemplo2');
const ctx = canvas.getContext('2d');

const centroX = 600;
const centroY = 300;
const orbt_sz = 250; // raio da orbita da terra
const orbm_sz = 290; // raio da orbita da terra
const orbl_sz = 30; // raio da orbita da lua
const orbl2_sz = 30; // raio da orbita da lua
const sol_sz = 50;  // tamanho do sol
const lua_sz = 5; // tamanho da lua
const lua2_sz = 5; // tamanho da lua 2
const marte_sz = 15; // tamanho de marte
const terra_sz = 15; // tamanho da terra

const t_terra = 3; //tempo em seg para uma volta na terra
const t_lua = 1; //tempo em seg para uma volta na lua
const t_marte = 4; //tempo em seg para uma volta em marte
const t_lua2 = 3; //tempo em seg para uma volta na lua de marte


const tau = 2*Math.PI;

const sol = new Path2D();
const lua = new Path2D();
const lua2 = new Path2D();
const terra = new Path2D();
const marte = new Path2D();
const arc = new Path2D();

function init(){
    sol.arc(0,0,sol_sz,0,tau,false);
    lua.arc(0,0,lua_sz,0,tau,false);
    lua2.arc(0,0,lua2_sz,0,tau,false);
    terra.arc(0,0,terra_sz,0,tau,false);
    marte.arc(0,0,marte_sz,0,tau,false);

    window.requestAnimationFrame(draw)
}

function draw(){
    ctx.fillStyle="black";
    ctx.fillRect(0,0,1200,600);

    ctx.save(); 
    
        //sol
        ctx.translate(centroX,centroY);
        ctx.fillStyle="orange";
        ctx.fill(sol);
        ctx.restore();

        //terra
        ctx.save();
            ctx.translate(centroX,centroY);

            const time = new Date();

            ctx.rotate( (tau/t_terra)*time.getSeconds() + (tau/(t_terra*1000))*time.getMilliseconds() );
            ctx.translate(orbt_sz,0);
            ctx.fillStyle="lightblue";
            ctx.fill(terra);

        //lua
        ctx.save();
            ctx.rotate( (tau/t_lua)*time.getSeconds() + (tau/(t_lua*1000))*time.getMilliseconds() );
            ctx.translate(orbl_sz,0);
            ctx.fillStyle="white";
            ctx.fill(lua);
        ctx.restore();

        //órbita da lua
        ctx.beginPath();
        ctx.arc(0,0,orbl_sz,0,tau,false);
        ctx.strokeStyle = "#fff";
        ctx.stroke();

    ctx.restore();

        //órbita da terra
    ctx.beginPath();
    ctx.arc(centroX,centroY,orbt_sz,0,tau,false);
    ctx.strokeStyle = "#fff";
    ctx.stroke();

    


//marte
    ctx.save();
    ctx.translate(centroX,centroY);

    ctx.rotate( (tau/t_marte)*time.getSeconds() + (tau/(t_marte*1000))*time.getMilliseconds() );
    ctx.translate(orbm_sz,0);
    ctx.fillStyle="red";
    ctx.fill(marte);

    // nao consegui fazer a lua de marte, nao tire muitos pontos :(
//lua2
//ctx.save();
  //  ctx.rotate( (tau/t_lua2)*time.getSeconds() + (tau/(t_lua2*1000))*time.getMilliseconds() );
    //ctx.translate(orbl2_sz,0);
    //ctx.fillStyle="white";
    //ctx.fill(t_lua2);
//ctx.restore();

//órbita da lua2
ctx.beginPath();
ctx.arc(0,0,orbl2_sz,0,tau,false);
ctx.strokeStyle = "#fff";
ctx.stroke();

ctx.restore();

//órbita de marte
ctx.beginPath();
ctx.arc(centroX,centroY,orbm_sz,0,tau,false);
ctx.strokeStyle = "#fff";
ctx.stroke();

window.requestAnimationFrame(draw);

}

init();