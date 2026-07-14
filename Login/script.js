/* ═══════════════════════════════════════════════════════
   NEXUS Login — script.js
   1. Star-field cosmos (canvas)
   2. Shooting-star effect
   3. Password toggle
   4. Form validation & submit
   ═══════════════════════════════════════════════════════ */

/* ── 1. STAR FIELD ──────────────────────────────────── */
(function initCosmos() {
  const canvas = document.getElementById('cosmos');
  const ctx    = canvas.getContext('2d');

  let W, H, stars, shooters;

  function resize() {
    W = canvas.width  = window.innerWidth;
    H = canvas.height = window.innerHeight;
  }

  function Star() {
    this.reset = function () {
      this.x  = Math.random() * W;
      this.y  = Math.random() * H;
      this.r  = Math.random() * 1.2 + 0.2;
      this.a  = Math.random();
      this.da = (Math.random() * 0.004 + 0.001) * (Math.random() < .5 ? 1 : -1);
    };
    this.reset();
    this.a = Math.random(); // stagger initial phase
  }

  Star.prototype.draw = function () {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
    ctx.fillStyle = `rgba(200,212,240,${Math.max(0, this.a)})`;
    ctx.fill();
    this.a += this.da;
    if (this.a > 1 || this.a < 0) this.da *= -1;
  };

  /* Shooting star */
  function Shooter() {
    this.reset = function () {
      this.x    = Math.random() * W * 0.7;
      this.y    = Math.random() * H * 0.4;
      this.len  = Math.random() * 180 + 80;
      this.spd  = Math.random() * 10 + 6;
      this.t    = 0;
      this.life = Math.floor((this.len / this.spd) * 1.6);
      this.a    = 0;
    };
    this.reset();
    this.t = this.life + 1; // start as inactive
  }

  Shooter.prototype.update = function () {
    if (this.t > this.life) return;
    this.t++;
    const progress = this.t / this.life;
    const x1 = this.x + this.t * this.spd;
    const y1 = this.y + this.t * this.spd * 0.45;
    const x0 = x1 - this.len * Math.min(progress * 2, 1);
    const y0 = y1 - this.len * 0.45 * Math.min(progress * 2, 1);

    const grad = ctx.createLinearGradient(x0, y0, x1, y1);
    const alpha = progress < .5 ? progress * 2 : 2 - progress * 2;
    grad.addColorStop(0, `rgba(67,97,238,0)`);
    grad.addColorStop(0.5, `rgba(160,180,255,${alpha * 0.7})`);
    grad.addColorStop(1, `rgba(255,255,255,${alpha})`);

    ctx.beginPath();
    ctx.moveTo(x0, y0);
    ctx.lineTo(x1, y1);
    ctx.strokeStyle = grad;
    ctx.lineWidth   = 1.5;
    ctx.stroke();
  };

  function buildScene() {
    const count = Math.floor((W * H) / 3200);
    stars    = Array.from({ length: count }, () => new Star());
    shooters = [new Shooter(), new Shooter()];
  }

  let lastShoot = 0;
  function loop(ts) {
    ctx.clearRect(0, 0, W, H);

    /* Deep space gradient */
    const bg = ctx.createRadialGradient(W * .5, H * .4, 0, W * .5, H * .4, Math.max(W, H) * .8);
    bg.addColorStop(0,   'rgba(13,28,55,.45)');
    bg.addColorStop(0.5, 'rgba(5,10,24,.25)');
    bg.addColorStop(1,   'rgba(5,10,24,0)');
    ctx.fillStyle = bg;
    ctx.fillRect(0, 0, W, H);

    stars.forEach(s => s.draw());

    /* Trigger shooters periodically */
    if (ts - lastShoot > (Math.random() * 5000 + 3000)) {
      const idle = shooters.find(s => s.t > s.life);
      if (idle) { idle.reset(); }
      lastShoot = ts;
    }
    shooters.forEach(s => s.update());

    requestAnimationFrame(loop);
  }

  window.addEventListener('resize', () => { resize(); buildScene(); });
  resize();
  buildScene();
  requestAnimationFrame(loop);
})();


/* ── 2. PASSWORD TOGGLE ─────────────────────────────── */
(function initToggle() {
  const btn   = document.getElementById('togglePwd');
  const input = document.getElementById('password');
  const icon  = document.getElementById('eyeIcon');

  const eyeOpen = `<path d="M1 10s3-6 9-6 9 6 9 6-3 6-9 6-9-6-9-6z" stroke="currentColor" stroke-width="1.4"/>
                   <circle cx="10" cy="10" r="2.5" stroke="currentColor" stroke-width="1.4"/>`;
  const eyeOff  = `<path d="M1 10s3-6 9-6 9 6 9 6-3 6-9 6-9-6-9-6z" stroke="currentColor" stroke-width="1.4"/>
                   <line x1="3" y1="3" x2="17" y2="17" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>`;

  btn.addEventListener('click', () => {
    const show = input.type === 'password';
    input.type      = show ? 'text' : 'password';
    icon.innerHTML  = show ? eyeOff : eyeOpen;
    btn.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
  });
})();


/* ── 4. HAMBURGER MENU ──────────────────────────────── */
(function initNav() {
  const btn   = document.getElementById('hamburger');
  const links = document.getElementById('navLinks');

  btn.addEventListener('click', () => {
    btn.classList.toggle('open');
    links.classList.toggle('open');
  });

  /* Close on link click */
  links.querySelectorAll('.nav-link').forEach(a => {
    a.addEventListener('click', () => {
      btn.classList.remove('open');
      links.classList.remove('open');
    });
  });
})();

(function initForm() {
  const form      = document.getElementById('loginForm');
  const email     = document.getElementById('email');
  const password  = document.getElementById('password');
  const emailErr  = document.getElementById('emailErr');
  const pwdErr    = document.getElementById('pwdErr');
  const submitBtn = document.getElementById('submitBtn');
  const overlay   = document.getElementById('successOverlay');

  function setError(field, errEl, msg) {
    field.parentElement.parentElement.classList.toggle('has-error', !!msg);
    errEl.textContent = msg;
  }

  function validateEmail(v) {
    if (!v.trim()) return 'Email is required.';
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) return 'Enter a valid email address.';
    return '';
  }

  function validatePwd(v) {
    if (!v) return 'Password is required.';
    if (v.length < 6) return 'Password must be at least 6 characters.';
    return '';
  }

  /* Live validation on blur */
  email.addEventListener('blur', () => setError(email, emailErr, validateEmail(email.value)));
  password.addEventListener('blur', () => setError(password, pwdErr, validatePwd(password.value)));

  /* Clear error on input */
  email.addEventListener('input', () => { if (emailErr.textContent) setError(email, emailErr, ''); });
  password.addEventListener('input', () => { if (pwdErr.textContent) setError(password, pwdErr, ''); });

  /* Submit */
  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const eErr = validateEmail(email.value);
    const pErr = validatePwd(password.value);
    setError(email, emailErr, eErr);
    setError(password, pwdErr, pErr);

    if (eErr || pErr) {
      /* Shake the card */
      const card = document.getElementById('loginCard');
      card.style.transition = 'transform .08s ease';
      const shakes = [6, -5, 4, -3, 2, 0];
      let i = 0;
      const tick = () => {
        card.style.transform = `translateX(${shakes[i]}px)`;
        i++;
        if (i < shakes.length) setTimeout(tick, 60);
        else card.style.transform = '';
      };
      tick();
      return;
    }

    /* Loading state */
    submitBtn.disabled = true;
    submitBtn.classList.add('loading');

    /* Simulate async auth */
    setTimeout(() => {
      submitBtn.disabled = false;
      submitBtn.classList.remove('loading');

      /* Show success */
      overlay.classList.add('visible');

      /* Auto-dismiss after 2.4s */
      setTimeout(() => {
        overlay.classList.remove('visible');
        form.reset();
      }, 2400);
    }, 1800);
  });
})();