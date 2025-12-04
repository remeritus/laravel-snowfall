@php
    $config = config('snowfall');

    // Master switch
    if (! $config['enabled']) {
        return;
    }

    // Determine if snow should show
    $shouldSnow = false;

    if ($config['mode'] === 'always') {
        $shouldSnow = true;
    } elseif ($config['mode'] === 'seasonal') {
        $start = $config['start_date'] ? \Carbon\Carbon::parse($config['start_date']) : null;
        $end   = $config['end_date'] ? \Carbon\Carbon::parse($config['end_date']) : null;
        $now   = \Carbon\Carbon::now();

        if ($start && $end) {
            $shouldSnow = $now->between($start, $end);
        }
    }

    if (! $shouldSnow) {
        return;
    }
@endphp

<canvas id="snowfall-canvas"></canvas>
<script>
(function(){
    const config = @json(config('snowfall'));

    // Respect OS-level reduced-motion preference
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return; // disables snow animation automatically
    }

    const canvas = document.getElementById('snowfall-canvas');
    const ctx = canvas.getContext('2d');

    let width = window.innerWidth;
    let height = window.innerHeight;
    canvas.width = width;
    canvas.height = height;
    canvas.style.position = 'absolute';
    canvas.style.top = 0;
    canvas.style.left = 0;
    canvas.style.pointerEvents = 'none';
    canvas.style.zIndex = config.canvas_z_index;

    function random(min, max) { return Math.random() * (max - min) + min; }

    class Flake {
        constructor(layer){
            this.layer = layer;
            this.reset();
        }
        reset(){
            this.x = random(0, width);
            this.y = random(-height, 0);
            this.size = random(1, this.layer.max_size);
            this.speed = random(0.3, this.layer.max_speed);
            this.angle = random(0, Math.PI*2);
            this.swing = random(this.layer.swing_min, this.layer.swing_max);
        }
        update(){
            this.y += this.speed;
            this.x += Math.sin(this.angle) * this.swing;
            this.angle += 0.01;
            if(this.y > height) this.reset(), this.y = -this.size;
        }
        draw(){
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI*2);
            ctx.fillStyle = `rgba(${config.color},${config.opacity})`;
            ctx.fill();
        }
    }

    const flakes = [];

    function init(){
        flakes.length = 0;
        config.layers.forEach(layer => {
            for(let i=0; i<layer.flake_count; i++){
                flakes.push(new Flake(layer));
            }
        });
    }

    function animate(){
        ctx.clearRect(0,0,width,height);
        flakes.forEach(flake => { flake.update(); flake.draw(); });
        requestAnimationFrame(animate);
    }

    window.addEventListener('resize', ()=>{
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width;
        canvas.height = height;
        init();
    });

    init();
    animate();
})();
</script>