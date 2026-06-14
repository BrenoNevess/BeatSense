<?php
/**
 * BeatSense — Widget de Acessibilidade
 * Inclua este arquivo antes de </body> em qualquer página:
 *
 *   <?php include('../includes/accessibility-widget.php'); ?>   (nas Views)
 *   <?php include('includes/accessibility-widget.php'); ?>      (no index.php)
 */
?>

<!-- ╔══════════════════════════════════════════════════════╗
     ║          WIDGET DE ACESSIBILIDADE — BeatSense        ║
     ║  WCAG 2.2 | LocalStorage | Responsivo | ARIA Labels  ║
     ╚══════════════════════════════════════════════════════╝ -->

<style>
/* ── TOKENS ─────────────────────────────────────────────── */
:root {
  --acc-900:#07313a; --acc-800:#0d404b; --acc-700:#115060;
  --acc-600:#1a6b7e; --acc-500:#2589a0; --acc-400:#3baec9;
  --acc-100:#c8eef6; --acc-50:#eafafd;
  --acc-green:#27ae60; --acc-white:#fff;
  --panel-w:350px;
  --ease-panel:cubic-bezier(.16,1,.3,1);
}

/* ── BODY STATES ─────────────────────────────────────────── */
body.acc-contrast-light  { filter:brightness(1.14) contrast(.88) !important; }
body.acc-contrast-dark   { filter:brightness(.72) contrast(1.4)  !important; }
body.acc-contrast-invert { filter:invert(1) hue-rotate(180deg)   !important; }
body.acc-sat-high        { filter:saturate(2.4)  !important; }
body.acc-sat-low         { filter:saturate(.2)   !important; }
body.acc-sat-mono        { filter:grayscale(1)   !important; }
body.acc-zoom            { font-size:118%        !important; }
body.acc-dyslexia *      { font-family:Arial,Verdana,sans-serif !important; letter-spacing:.1em !important; word-spacing:.22em !important; }
body.acc-dyslexia-sp *   { letter-spacing:.18em !important; word-spacing:.3em !important; line-height:2.1 !important; }
body.acc-spacing *       { letter-spacing:.1em !important; }
body.acc-line-height *   { line-height:2.1 !important; }
body.acc-text-left *     { text-align:left !important; }
body.acc-pause-anim *    { animation-play-state:paused !important; transition:none !important; }
body.acc-reading-mode    { background:#fdf6e3 !important; color:#3b2a2a !important; }
body.acc-big-cursor *    {
  cursor:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40'%3E%3Cpolygon points='5,3 5,30 12,23 16,34 20,32 16,21 26,21' fill='%2307313a' stroke='%23fff' stroke-width='2'/%3E%3C/svg%3E") 5 3,auto !important;
}
body.acc-links-highlight a   { background:#ffe400 !important; color:#000 !important; padding:0 3px !important; border-radius:3px !important; outline:2px solid #c8a800 !important; }
body.acc-titles-highlight h1,
body.acc-titles-highlight h2,
body.acc-titles-highlight h3,
body.acc-titles-highlight h4,
body.acc-titles-highlight h5,
body.acc-titles-highlight h6 { background:#cef0fb !important; outline:2px solid #2589a0 !important; border-radius:4px !important; padding:2px 6px !important; }
body.acc-img-caption img[alt]::after { content:attr(alt) !important; display:block !important; font-size:.78rem !important; color:#555 !important; }
body.acc-btn-size button,
body.acc-btn-size .btn,
body.acc-btn-size a.btn { min-height:48px !important; font-size:1.05rem !important; padding:.6rem 1.2rem !important; }
body.acc-reading-guide::before {
  content:'';
  position:fixed; inset:0;
  background:linear-gradient(to bottom,
    rgba(0,0,0,.48) var(--rg-top,0%),
    transparent var(--rg-top,0%),
    transparent var(--rg-bot,100%),
    rgba(0,0,0,.48) var(--rg-bot,100%));
  pointer-events:none;
  z-index:99990;
}

/* ── FAB ─────────────────────────────────────────────────── */
#bs-acc-fab {
  position:fixed; bottom:26px; right:26px; z-index:99998;
  width:58px; height:58px; border-radius:50%; border:none;
  background:linear-gradient(135deg,#1a6b7e,#07313a);
  color:#fff; cursor:pointer;
  display:flex; align-items:center; justify-content:center;
  box-shadow:0 4px 20px rgba(7,49,58,.55), 0 0 0 3px rgba(59,174,201,.3);
  transition:transform .2s, box-shadow .2s;
  outline:none;
}
#bs-acc-fab:hover { transform:scale(1.1); box-shadow:0 6px 28px rgba(7,49,58,.65),0 0 0 4px rgba(59,174,201,.45); }
#bs-acc-fab:focus-visible { outline:3px solid var(--acc-400); outline-offset:3px; }
#bs-acc-fab svg { width:27px; height:27px; }
#bs-acc-fab::after {
  content:'Acessibilidade';
  position:absolute; right:66px;
  background:#07313a; color:#fff;
  font-size:.73rem; white-space:nowrap;
  padding:5px 10px; border-radius:6px;
  opacity:0; pointer-events:none;
  transition:opacity .2s;
  font-family:'Segoe UI',system-ui,sans-serif;
}
#bs-acc-fab:hover::after { opacity:1; }

/* ── OVERLAY ─────────────────────────────────────────────── */
#bs-acc-overlay {
  display:none; position:fixed; inset:0;
  background:rgba(0,0,0,.45); z-index:99996;
  backdrop-filter:blur(2px);
}
#bs-acc-overlay.is-vis { display:block; }

/* ── PAINEL ──────────────────────────────────────────────── */
#bs-acc-panel {
  position:fixed; bottom:0; right:0; z-index:99997;
  width:var(--panel-w); max-height:90vh;
  background:var(--acc-800);
  border-radius:18px 18px 0 0;
  box-shadow:-4px 0 40px rgba(0,0,0,.45);
  display:flex; flex-direction:column; overflow:hidden;
  transform:translateY(calc(100% + 20px));
  opacity:0; pointer-events:none;
  transition:transform .44s var(--ease-panel), opacity .28s ease;
}
#bs-acc-panel.is-open { transform:translateY(0); opacity:1; pointer-events:all; }

#bs-acc-body {
  overflow-y:auto; flex:1;
  scrollbar-width:thin; scrollbar-color:var(--acc-600) transparent;
}
#bs-acc-body::-webkit-scrollbar { width:5px; }
#bs-acc-body::-webkit-scrollbar-thumb { background:var(--acc-600); border-radius:10px; }

/* ── HEADER ──────────────────────────────────────────────── */
.bs-ph {
  display:flex; align-items:center; justify-content:space-between;
  padding:16px 16px 12px;
  border-bottom:1px solid rgba(255,255,255,.1);
  flex-shrink:0;
}
.bs-brand {
  display:flex; align-items:center; gap:9px;
  color:#fff; font-weight:700; font-size:.95rem;
  font-family:'Segoe UI',system-ui,sans-serif;
}
.bs-brand svg { width:22px; height:22px; }
.bs-brand span { opacity:.5; font-weight:400; font-size:.75rem; }
.bs-hactions { display:flex; gap:6px; }
.bs-ibtn {
  background:rgba(255,255,255,.1); border:none;
  width:32px; height:32px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  color:#fff; cursor:pointer; transition:background .15s; outline:none;
}
.bs-ibtn:hover { background:rgba(255,255,255,.22); }
.bs-ibtn:focus-visible { outline:2px solid var(--acc-400); }
.bs-ibtn svg { width:15px; height:15px; }

/* ── SEÇÃO ───────────────────────────────────────────────── */
.bs-sec { padding:12px 13px 2px; }
.bs-sec-lbl {
  font-size:.64rem; font-weight:700;
  letter-spacing:.1em; text-transform:uppercase;
  color:var(--acc-400); margin-bottom:7px; padding-left:2px;
  font-family:'Segoe UI',system-ui,sans-serif;
}

/* ── GRIDS ───────────────────────────────────────────────── */
.bs-g { display:grid; gap:7px; padding:0 13px 11px; }
.bs-g2 { grid-template-columns:repeat(2,1fr); }
.bs-g3 { grid-template-columns:repeat(3,1fr); }
.bs-g4 { grid-template-columns:repeat(4,1fr); }

/* ── CARD ────────────────────────────────────────────────── */
.bs-card {
  position:relative;
  background:#1a6b7e;
  border:1.5px solid transparent;
  border-radius:11px;
  padding:10px 7px 9px;
  cursor:pointer; color:#fff;
  display:flex; flex-direction:column;
  align-items:center; gap:5px;
  font-size:.67rem; font-weight:500;
  text-align:center; line-height:1.3;
  min-height:70px;
  transition:background .15s, border-color .15s, transform .12s;
  outline:none;
  font-family:'Segoe UI',system-ui,sans-serif;
}
.bs-card svg { width:20px; height:20px; flex-shrink:0; }
.bs-card:hover { background:var(--acc-500); transform:translateY(-1px); }
.bs-card:focus-visible { outline:2px solid var(--acc-400); outline-offset:2px; }
.bs-card.is-on { background:var(--acc-900); border-color:var(--acc-400); }
.bs-card.is-on::after {
  content:''; position:absolute; top:6px; right:6px;
  width:7px; height:7px; background:var(--acc-green);
  border-radius:50%; box-shadow:0 0 5px var(--acc-green);
}
.bs-ia {
  position:absolute; top:5px; right:5px;
  background:#5c6bc0; color:#fff;
  font-size:.48rem; font-weight:800;
  padding:1px 4px; border-radius:3px; letter-spacing:.04em;
}

/* ── DIVIDER ─────────────────────────────────────────────── */
.bs-div { height:1px; background:rgba(255,255,255,.09); margin:2px 13px; }

/* ── HELP BAR ────────────────────────────────────────────── */
.bs-help {
  margin:9px 13px 3px;
  background:rgba(0,0,0,.2); border-radius:9px;
  padding:9px 13px; color:var(--acc-100);
  font-size:.76rem; display:flex; align-items:center; gap:7px;
  cursor:pointer; transition:background .15s;
  font-family:'Segoe UI',system-ui,sans-serif;
}
.bs-help:hover { background:rgba(0,0,0,.3); }
.bs-help svg { width:15px; height:15px; flex-shrink:0; opacity:.8; }

/* ── COLOR PICKER ────────────────────────────────────────── */
.bs-cpick {
  margin:0 13px 13px;
  background:rgba(0,0,0,.22); border-radius:13px; padding:13px;
}
.bs-ctabs { display:flex; gap:5px; margin-bottom:11px; }
.bs-ctab {
  flex:1; padding:6px 4px; border-radius:20px; border:none;
  background:transparent; color:rgba(255,255,255,.45);
  font-size:.73rem; font-weight:600; cursor:pointer;
  transition:background .15s,color .15s; outline:none;
  font-family:'Segoe UI',system-ui,sans-serif;
}
.bs-ctab.is-on { background:rgba(255,255,255,.2); color:#fff; }
.bs-ctab:focus-visible { outline:2px solid var(--acc-400); }
.bs-htrack {
  height:24px; border-radius:12px;
  background:linear-gradient(to right,
    hsl(0,78%,54%),hsl(36,78%,54%),hsl(72,78%,48%),
    hsl(120,70%,44%),hsl(180,72%,44%),hsl(216,72%,54%),
    hsl(252,70%,60%),hsl(300,68%,56%),hsl(336,72%,54%),hsl(360,78%,54%));
  margin-bottom:9px;
}
.bs-hslider {
  -webkit-appearance:none; appearance:none;
  width:100%; height:24px; background:transparent;
  border-radius:12px; cursor:pointer; outline:none;
}
.bs-hslider::-webkit-slider-thumb {
  -webkit-appearance:none;
  width:28px; height:28px; border-radius:50%;
  background:#fff; border:3px solid rgba(0,0,0,.28);
  box-shadow:0 2px 8px rgba(0,0,0,.4); cursor:pointer;
}
.bs-hslider::-moz-range-thumb {
  width:26px; height:26px; border-radius:50%;
  background:#fff; border:3px solid rgba(0,0,0,.28); cursor:pointer;
}
.bs-cfoot {
  display:flex; justify-content:space-between; align-items:center;
}
.bs-clabel {
  font-size:.7rem; color:rgba(255,255,255,.5);
  display:flex; align-items:center; gap:6px;
  font-family:'Segoe UI',system-ui,sans-serif;
}
#bs-cprev {
  width:15px; height:15px; border-radius:4px;
  border:2px solid rgba(255,255,255,.28);
  background:hsl(190,72%,44%);
}
.bs-creset {
  background:none; border:none; color:rgba(255,255,255,.5);
  font-size:.7rem; cursor:pointer; display:flex; align-items:center; gap:4px;
  transition:color .15s; outline:none;
  font-family:'Segoe UI',system-ui,sans-serif;
}
.bs-creset:hover { color:#fff; }
.bs-creset:focus-visible { outline:2px solid var(--acc-400); }
.bs-creset svg { width:12px; height:12px; }

/* ── FOOTER ──────────────────────────────────────────────── */
.bs-pfoot {
  padding:9px 13px 13px;
  border-top:1px solid rgba(255,255,255,.09);
  flex-shrink:0;
}
.bs-restore {
  width:100%; background:rgba(255,255,255,.08);
  border:1.5px solid rgba(255,255,255,.14);
  border-radius:9px; padding:9px; color:#fff;
  font-size:.78rem; font-weight:600; cursor:pointer;
  display:flex; align-items:center; justify-content:center; gap:7px;
  transition:background .15s; outline:none;
  font-family:'Segoe UI',system-ui,sans-serif;
}
.bs-restore:hover { background:rgba(255,255,255,.15); }
.bs-restore:focus-visible { outline:2px solid var(--acc-400); }
.bs-restore svg { width:14px; height:14px; }

/* ── TOAST ───────────────────────────────────────────────── */
#bs-acc-toast {
  position:fixed; bottom:98px; right:26px; z-index:99999;
  background:var(--acc-900); color:#fff;
  padding:9px 16px; border-radius:9px;
  font-size:.8rem; font-weight:500;
  box-shadow:0 4px 18px rgba(0,0,0,.35);
  display:flex; align-items:center; gap:8px;
  opacity:0; transform:translateY(8px);
  pointer-events:none;
  transition:opacity .24s,transform .24s;
  font-family:'Segoe UI',system-ui,sans-serif;
}
#bs-acc-toast.show { opacity:1; transform:translateY(0); }
#bs-acc-toast svg { width:15px; height:15px; color:var(--acc-green); flex-shrink:0; }

/* ── RESPONSIVE ──────────────────────────────────────────── */
@media(max-width:480px){
  :root { --panel-w:100vw; }
  #bs-acc-panel { border-radius:18px 18px 0 0; right:0; left:0; }
  #bs-acc-fab { bottom:18px; right:18px; }
  #bs-acc-toast { right:14px; left:14px; }
}
@media(prefers-reduced-motion:reduce){
  #bs-acc-panel,#bs-acc-fab,#bs-acc-toast,.bs-card { transition:none !important; }
}
</style>

<!-- OVERLAY -->
<div id="bs-acc-overlay" aria-hidden="true"></div>

<!-- TOAST -->
<div id="bs-acc-toast" role="status" aria-live="polite" aria-atomic="true">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
  <span id="bs-toast-txt"></span>
</div>

<!-- BOTÃO FLUTUANTE -->
<button id="bs-acc-fab" aria-label="Abrir painel de acessibilidade" aria-expanded="false" aria-controls="bs-acc-panel">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <circle cx="12" cy="4.5" r="1.8" fill="currentColor" stroke="none"/>
    <path d="M5.5 8.5h13M10 22l1.5-6.5-3.5-2M14 22l-1.5-6.5 3.5-2M7.5 11.5l2 2.5M16.5 11.5l-2 2.5"/>
  </svg>
</button>

<!-- PAINEL -->
<div id="bs-acc-panel" role="dialog" aria-modal="true" aria-label="Painel de acessibilidade BeatSense" tabindex="-1">

  <!-- Header -->
  <div class="bs-ph">
    <div class="bs-brand">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <circle cx="12" cy="4.5" r="1.8" fill="currentColor" stroke="none"/>
        <path d="M5.5 8.5h13M10 22l1.5-6.5-3.5-2M14 22l-1.5-6.5 3.5-2"/>
      </svg>
      Acessibilidade <span>WCAG 2.2</span>
    </div>
    <div class="bs-hactions">
      <button class="bs-ibtn" id="bs-theme-btn" aria-label="Alternar tema claro/escuro" title="Tema">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
      </button>
      <button class="bs-ibtn" id="bs-close-btn" aria-label="Fechar painel" title="Fechar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
  </div>

  <div id="bs-acc-body">

    <!-- Help -->
    <div class="bs-help" tabindex="0" role="note" aria-label="Preciso de ajuda. Como usar?">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17" stroke-width="3"/></svg>
      Preciso de ajuda. Como usar?
    </div>

    <!-- IA -->
    <div class="bs-sec"><p class="bs-sec-lbl">IA e Assistência</p></div>
    <div class="bs-g bs-g3" role="group" aria-label="Funcionalidades com IA">
      <button class="bs-card" data-action="ia-image" aria-pressed="false" aria-label="Descrever imagem com IA">
        <span class="bs-ia">IA</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        Descrever imagem
      </button>
      <button class="bs-card" data-action="ia-simplify" aria-pressed="false" aria-label="Simplificar texto com IA">
        <span class="bs-ia">IA</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="13" y1="17" x2="8" y2="17"/></svg>
        Simplificar texto
      </button>
      <button class="bs-card" data-action="ia-word" aria-pressed="false" aria-label="Significado da palavra com IA">
        <span class="bs-ia">IA</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><line x1="9" y1="10" x2="15" y2="10"/><line x1="12" y1="7" x2="12" y2="13"/></svg>
        Significado da palavra
      </button>
    </div>

    <div class="bs-div"></div>

    <!-- Navegação -->
    <div class="bs-sec"><p class="bs-sec-lbl">Navegação</p></div>
    <div class="bs-g bs-g2" role="group" aria-label="Modos de navegação">
      <button class="bs-card" data-action="keyboard-nav" aria-pressed="false" aria-label="Ativar navegação por teclado">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><rect x="2" y="6" width="20" height="12" rx="2"/><line x1="6" y1="10" x2="6.01" y2="10" stroke-width="3"/><line x1="10" y1="10" x2="10.01" y2="10" stroke-width="3"/><line x1="14" y1="10" x2="14.01" y2="10" stroke-width="3"/><line x1="18" y1="10" x2="18.01" y2="10" stroke-width="3"/><line x1="8" y1="14" x2="16" y2="14" stroke-width="2"/></svg>
        Navegação por teclado
      </button>
      <button class="bs-card" data-action="page-structure" aria-pressed="false" aria-label="Ver estrutura da página">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
        Estrutura da página
      </button>
      <button class="bs-card" data-action="facial-nav" aria-pressed="false" aria-label="Ativar navegação facial">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="9" cy="10.5" r="1" fill="currentColor" stroke="none"/><circle cx="15" cy="10.5" r="1" fill="currentColor" stroke="none"/><path d="M9 15.5s1.5 1.5 3 1.5 3-1.5 3-1.5"/></svg>
        Navegação facial
      </button>
      <button class="bs-card" data-action="voice-cmd" aria-pressed="false" aria-label="Ativar comando de voz">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
        Comando de voz
      </button>
    </div>

    <div class="bs-div"></div>

    <!-- Contraste -->
    <div class="bs-sec"><p class="bs-sec-lbl">Contraste</p></div>
    <div class="bs-g bs-g3" role="group" aria-label="Opções de contraste">
      <button class="bs-card" data-action="contrast-light" data-group="contrast" aria-pressed="false" aria-label="Contraste claro">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        Claro
      </button>
      <button class="bs-card" data-action="contrast-dark" data-group="contrast" aria-pressed="false" aria-label="Contraste escuro">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
        Escuro
      </button>
      <button class="bs-card" data-action="contrast-invert" data-group="contrast" aria-pressed="false" aria-label="Contraste invertido">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 2v20" opacity=".3"/><path d="M12 2a10 10 0 0 1 0 20z" fill="currentColor"/></svg>
        Invertido
      </button>
    </div>

    <!-- Saturação -->
    <div class="bs-sec"><p class="bs-sec-lbl">Saturação</p></div>
    <div class="bs-g bs-g3" role="group" aria-label="Opções de saturação">
      <button class="bs-card" data-action="sat-high" data-group="saturation" aria-pressed="false" aria-label="Saturação alta">
        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10" fill="#2589a0" stroke="currentColor" stroke-width="1.5"/></svg>
        Alta
      </button>
      <button class="bs-card" data-action="sat-low" data-group="saturation" aria-pressed="false" aria-label="Saturação baixa">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="10" stroke-dasharray="5 2"/></svg>
        Baixa
      </button>
      <button class="bs-card" data-action="sat-mono" data-group="saturation" aria-pressed="false" aria-label="Monocromático">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07" stroke-width="1.5"/></svg>
        Monocromático
      </button>
    </div>

    <div class="bs-div"></div>

    <!-- Leitura -->
    <div class="bs-sec"><p class="bs-sec-lbl">Leitura</p></div>
    <div class="bs-g bs-g4" role="group" aria-label="Ferramentas de leitura">
      <button class="bs-card" data-action="reading-mask" aria-pressed="false" aria-label="Máscara de leitura">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><rect x="3" y="9" width="18" height="6" rx="1" fill="rgba(255,255,255,.12)"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        Máscara
      </button>
      <button class="bs-card" data-action="reading-guide" aria-pressed="false" aria-label="Guia de leitura">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><line x1="3" y1="12" x2="21" y2="12" stroke-width="2.5"/><line x1="3" y1="8" x2="21" y2="8" opacity=".4"/><line x1="3" y1="16" x2="21" y2="16" opacity=".4"/></svg>
        Guia
      </button>
      <button class="bs-card" data-action="reading-mode" aria-pressed="false" aria-label="Modo leitura">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
        Modo leitura
      </button>
      <button class="bs-card" data-action="big-cursor" aria-pressed="false" aria-label="Cursor grande">
        <svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="5,2 5,18 9,14 12,20 14.5,19 11.5,13 17,13" fill="currentColor"/></svg>
        Cursor grande
      </button>
    </div>

    <div class="bs-div"></div>

    <!-- Tipografia -->
    <div class="bs-sec"><p class="bs-sec-lbl">Tipografia</p></div>
    <div class="bs-g bs-g4" role="group" aria-label="Opções de tipografia">
      <button class="bs-card" data-action="spacing" aria-pressed="false" aria-label="Aumentar espaçamento entre letras">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M9 7l-6 5 6 5M15 7l6 5-6 5"/></svg>
        Espaçamento
      </button>
      <button class="bs-card" data-action="line-height" aria-pressed="false" aria-label="Aumentar altura de linha">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="6" x2="17" y2="6"/><line x1="7" y1="12" x2="17" y2="12"/><line x1="7" y1="18" x2="17" y2="18"/><path d="M3 4v16M3 4l-1.5 2M3 4l1.5 2M3 20l-1.5-2M3 20l1.5-2" stroke-width="1.5"/></svg>
        Altura linha
      </button>
      <button class="bs-card" data-action="text-left" aria-pressed="false" aria-label="Alinhar texto à esquerda">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="15" y2="12"/><line x1="3" y1="18" x2="18" y2="18"/></svg>
        Alinhamento
      </button>
      <button class="bs-card" data-action="zoom" aria-pressed="false" aria-label="Ativar zoom">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
        Zoom
      </button>
      <button class="bs-card" data-action="links-highlight" aria-pressed="false" aria-label="Destacar links">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
        Links
      </button>
      <button class="bs-card" data-action="titles-highlight" aria-pressed="false" aria-label="Destacar títulos">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
        Títulos
      </button>
      <button class="bs-card" data-action="img-caption" aria-pressed="false" aria-label="Legendas de imagens">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><rect x="2" y="2" width="20" height="14" rx="2"/><path d="M2 18h20M7 22h10"/></svg>
        Legendas
      </button>
      <button class="bs-card" data-action="pause-anim" aria-pressed="false" aria-label="Pausar animações">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><rect x="6" y="4" width="4" height="16" fill="currentColor" stroke="none"/><rect x="14" y="4" width="4" height="16" fill="currentColor" stroke="none"/></svg>
        Pausar animações
      </button>
    </div>

    <div class="bs-div"></div>

    <!-- Dislexia -->
    <div class="bs-sec"><p class="bs-sec-lbl">Recursos para Dislexia</p></div>
    <div class="bs-g bs-g2" role="group" aria-label="Recursos para dislexia">
      <button class="bs-card" data-action="dyslexia" aria-pressed="false" aria-label="Fonte amigável para dislexia">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 7c0-1.1.9-2 2-2h3l2 4-2 4H6a2 2 0 0 1-2-2V7z"/><path d="M14 7c0-1.1.9-2 2-2h3v8h-3a2 2 0 0 1-2-2V7z" opacity=".5"/><line x1="4" y1="17" x2="20" y2="17" stroke-dasharray="3 2"/></svg>
        Fonte dislexia
      </button>
      <button class="bs-card" data-action="dyslexia-spacing" aria-pressed="false" aria-label="Espaçamento para dislexia">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M9 7H5l-3 5 3 5h4M15 7h4l3 5-3 5h-4"/><line x1="9" y1="12" x2="15" y2="12"/></svg>
        Espaçamento dislexia
      </button>
    </div>

    <div class="bs-div"></div>

    <!-- Ferramentas -->
    <div class="bs-sec"><p class="bs-sec-lbl">Ferramentas</p></div>
    <div class="bs-g bs-g2" role="group" aria-label="Outras ferramentas">
      <button class="bs-card" data-action="dictionary" aria-pressed="false" aria-label="Abrir dicionário">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="9" y1="12" x2="13" y2="12"/></svg>
        Dicionário
      </button>
      <button class="bs-card" data-action="btn-size" aria-pressed="false" aria-label="Aumentar tamanho dos botões">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><rect x="3" y="8" width="18" height="9" rx="2"/><path d="M9 8V6M15 8V6M12 8V5"/></svg>
        Tamanho botões
      </button>
    </div>

    <div class="bs-div"></div>

    <!-- Cores -->
    <div class="bs-sec"><p class="bs-sec-lbl">Personalização de Cores</p></div>
    <div class="bs-cpick" role="group" aria-label="Seletor de cores personalizadas">
      <div class="bs-ctabs" role="tablist">
        <button class="bs-ctab is-on" data-tab="text" role="tab" aria-selected="true">Texto</button>
        <button class="bs-ctab" data-tab="bg" role="tab" aria-selected="false">Fundo</button>
        <button class="bs-ctab" data-tab="title" role="tab" aria-selected="false">Títulos</button>
      </div>
      <div class="bs-htrack" aria-hidden="true">
        <input type="range" class="bs-hslider" id="bs-hue" min="0" max="360" value="190"
          aria-label="Matiz da cor (0 a 360)" aria-valuemin="0" aria-valuemax="360" aria-valuenow="190"/>
      </div>
      <div class="bs-cfoot">
        <span class="bs-clabel"><span id="bs-cprev"></span>Selecionar cor</span>
        <button class="bs-creset" id="bs-creset" aria-label="Redefinir todas as cores">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
          Redefinir cores
        </button>
      </div>
    </div>

  </div><!-- /bs-acc-body -->

  <!-- Footer -->
  <div class="bs-pfoot">
    <button class="bs-restore" id="bs-restore-all" aria-label="Restaurar todas as configurações para o padrão">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
      Restaurar padrão
    </button>
  </div>
</div><!-- /bs-acc-panel -->

<script>
(function(){
  'use strict';

  /* ── ESTADO & PERSISTÊNCIA ──────────────────────────────── */
  var KEY = 'bs_acc_v1';
  var def = { active:[], colorText:null, colorBg:null, colorTitle:null, theme:'light' };
  var S = Object.assign({}, def);
  try{ var raw=localStorage.getItem(KEY); if(raw) S=Object.assign({},def,JSON.parse(raw)); }catch(e){}
  function save(){ try{ localStorage.setItem(KEY,JSON.stringify(S)); }catch(e){} }

  /* ── MAPA DE AÇÕES ─────────────────────────────────────── */
  var A = {
    'contrast-light':   { cls:'acc-contrast-light',   group:'contrast',   lbl:'Contraste claro ativado'        },
    'contrast-dark':    { cls:'acc-contrast-dark',    group:'contrast',   lbl:'Contraste escuro ativado'       },
    'contrast-invert':  { cls:'acc-contrast-invert',  group:'contrast',   lbl:'Contraste invertido ativado'    },
    'sat-high':         { cls:'acc-sat-high',          group:'saturation', lbl:'Saturação alta ativada'         },
    'sat-low':          { cls:'acc-sat-low',           group:'saturation', lbl:'Saturação baixa ativada'        },
    'sat-mono':         { cls:'acc-sat-mono',          group:'saturation', lbl:'Monocromático ativado'          },
    'reading-mask':     { cls:'acc-reading-mask',                          lbl:'Máscara de leitura ativada'     },
    'reading-guide':    { cls:'acc-reading-guide',                         lbl:'Guia de leitura ativado'        },
    'reading-mode':     { cls:'acc-reading-mode',                          lbl:'Modo leitura ativado'           },
    'big-cursor':       { cls:'acc-big-cursor',                            lbl:'Cursor grande ativado'          },
    'spacing':          { cls:'acc-spacing',                               lbl:'Espaçamento aumentado'          },
    'line-height':      { cls:'acc-line-height',                           lbl:'Altura de linha aumentada'      },
    'text-left':        { cls:'acc-text-left',                             lbl:'Texto alinhado à esquerda'      },
    'zoom':             { cls:'acc-zoom',                                  lbl:'Zoom ativado'                   },
    'links-highlight':  { cls:'acc-links-highlight',                       lbl:'Links destacados'               },
    'titles-highlight': { cls:'acc-titles-highlight',                      lbl:'Títulos destacados'             },
    'img-caption':      { cls:'acc-img-caption',                           lbl:'Legendas ativadas'              },
    'pause-anim':       { cls:'acc-pause-anim',                            lbl:'Animações pausadas'             },
    'dyslexia':         { cls:'acc-dyslexia',                              lbl:'Fonte dislexia ativada'         },
    'dyslexia-spacing': { cls:'acc-dyslexia-sp',                           lbl:'Espaçamento dislexia ativado'   },
    'keyboard-nav':     { cls:'acc-keyboard-nav',                          lbl:'Navegação por teclado ativada'  },
    'btn-size':         { cls:'acc-btn-size',                              lbl:'Botões maiores ativados'        },
    /* Hooks IA — integrar APIs conforme necessidade */
    'ia-image':    { lbl:'Descrever imagem (IA)',      fn: function(){ console.log('[IA] descrever imagem'); } },
    'ia-simplify': { lbl:'Simplificar texto (IA)',     fn: function(){ console.log('[IA] simplificar texto'); } },
    'ia-word':     { lbl:'Significado da palavra (IA)',fn: function(){ console.log('[IA] significado'); } },
    'facial-nav':  { lbl:'Navegação facial — SDK necessário' },
    'voice-cmd':   { lbl:'Comando de voz — SDK necessário'   },
    'page-structure':{ lbl:'Estrutura da página'             },
    'dictionary':  { lbl:'Dicionário — integração pendente'  },
  };

  var groups = {
    contrast:   ['acc-contrast-light','acc-contrast-dark','acc-contrast-invert'],
    saturation: ['acc-sat-high','acc-sat-low','acc-sat-mono'],
  };

  /* ── ELEMENTOS ────────────────────────────────────────── */
  var fab    = document.getElementById('bs-acc-fab');
  var panel  = document.getElementById('bs-acc-panel');
  var over   = document.getElementById('bs-acc-overlay');
  var closeB = document.getElementById('bs-close-btn');
  var themeB = document.getElementById('bs-theme-btn');
  var restB  = document.getElementById('bs-restore-all');
  var hue    = document.getElementById('bs-hue');
  var cprev  = document.getElementById('bs-cprev');
  var creset = document.getElementById('bs-creset');
  var toast  = document.getElementById('bs-acc-toast');
  var toastT = document.getElementById('bs-toast-txt');
  var cards  = document.querySelectorAll('.bs-card[data-action]');
  var ctabs  = document.querySelectorAll('.bs-ctab');
  var activeTab = 'text';
  var toastTmr;

  /* ── TOAST ────────────────────────────────────────────── */
  function showToast(msg){
    toastT.textContent = msg;
    toast.classList.add('show');
    clearTimeout(toastTmr);
    toastTmr = setTimeout(function(){ toast.classList.remove('show'); }, 2200);
  }

  /* ── PAINEL ───────────────────────────────────────────── */
  function openPanel(){
    panel.classList.add('is-open');
    over.classList.add('is-vis');
    fab.setAttribute('aria-expanded','true');
    setTimeout(function(){
      var f = panel.querySelector('button,[tabindex="0"]');
      if(f) f.focus();
    }, 460);
    document.addEventListener('keydown', trapFocus);
  }
  function closePanel(){
    panel.classList.remove('is-open');
    over.classList.remove('is-vis');
    fab.setAttribute('aria-expanded','false');
    fab.focus();
    document.removeEventListener('keydown', trapFocus);
  }
  function trapFocus(e){
    if(e.key!=='Tab') return;
    var els = panel.querySelectorAll('button:not([disabled]),[tabindex="0"],input[type="range"]');
    var first=els[0], last=els[els.length-1];
    if(e.shiftKey){ if(document.activeElement===first){ e.preventDefault(); last.focus(); } }
    else          { if(document.activeElement===last) { e.preventDefault(); first.focus(); } }
  }

  fab.addEventListener('click', function(){
    panel.classList.contains('is-open') ? closePanel() : openPanel();
  });
  closeB.addEventListener('click', closePanel);
  over.addEventListener('click', closePanel);
  document.addEventListener('keydown', function(e){ if(e.key==='Escape' && panel.classList.contains('is-open')) closePanel(); });

  /* ── ATIVAR / DESATIVAR AÇÃO ──────────────────────────── */
  function activate(action){
    var d = A[action]; if(!d) return;
    if(d.group && groups[d.group]){
      var wasOn = S.active.indexOf(action) > -1;
      S.active = S.active.filter(function(a){
        var da=A[a];
        if(da && da.group===d.group && a!==action){ if(da.cls) document.body.classList.remove(da.cls); return false; }
        return true;
      });
      document.querySelectorAll('.bs-card[data-group="'+d.group+'"]').forEach(function(c){
        c.classList.remove('is-on'); c.setAttribute('aria-pressed','false');
      });
    }
    if(d.cls) document.body.classList.add(d.cls);
    if(S.active.indexOf(action)<0) S.active.push(action);
    if(d.fn) d.fn();
  }
  function deactivate(action){
    var d=A[action]; if(!d) return;
    if(d.cls) document.body.classList.remove(d.cls);
    S.active = S.active.filter(function(a){ return a!==action; });
  }

  /* ── CARDS ────────────────────────────────────────────── */
  cards.forEach(function(card){
    card.addEventListener('click', function(){
      var action = card.dataset.action;
      var on = card.classList.contains('is-on');
      if(on){
        deactivate(action);
        card.classList.remove('is-on');
        card.setAttribute('aria-pressed','false');
        showToast((A[action]&&A[action].lbl ? A[action].lbl : action) + ' desativado');
      } else {
        activate(action);
        card.classList.add('is-on');
        card.setAttribute('aria-pressed','true');
        showToast(A[action]&&A[action].lbl ? A[action].lbl : action);
      }
      save();
    });
    card.addEventListener('keydown', function(e){
      if(e.key==='Enter'||e.key===' '){ e.preventDefault(); card.click(); }
    });
  });

  /* ── GUIA DE LEITURA ──────────────────────────────────── */
  document.addEventListener('mousemove', function(e){
    if(!document.body.classList.contains('acc-reading-guide')) return;
    var h=50, p=function(y){ return Math.min(100,Math.max(0,y/window.innerHeight*100)); };
    document.documentElement.style.setProperty('--rg-top', p(e.clientY-h)+'%');
    document.documentElement.style.setProperty('--rg-bot', p(e.clientY+h)+'%');
  });

  /* ── TEMA ─────────────────────────────────────────────── */
  themeB.addEventListener('click', function(){
    S.theme = S.theme==='light' ? 'dark' : 'light';
    document.documentElement.setAttribute('data-theme', S.theme);
    showToast(S.theme==='dark' ? 'Tema escuro ativado' : 'Tema claro ativado');
    save();
  });

  /* ── ABAS DE COR ──────────────────────────────────────── */
  function cap(s){ return s.charAt(0).toUpperCase()+s.slice(1); }
  function hsl(h){ return 'hsl('+h+',72%,46%)'; }
  function updatePreview(h){ cprev.style.background=hsl(h); }

  ctabs.forEach(function(tab){
    tab.addEventListener('click', function(){
      ctabs.forEach(function(t){ t.classList.remove('is-on'); t.setAttribute('aria-selected','false'); });
      tab.classList.add('is-on'); tab.setAttribute('aria-selected','true');
      activeTab = tab.dataset.tab;
      var saved = S['color'+cap(activeTab)];
      if(saved){ var m=saved.match(/hsl\((\d+)/); if(m){ hue.value=m[1]; updatePreview(m[1]); } }
      else { hue.value=190; updatePreview(190); }
    });
  });

  hue.addEventListener('input', function(){
    var h=hue.value, color=hsl(h);
    hue.setAttribute('aria-valuenow',h);
    updatePreview(h);
    if(activeTab==='text') { document.body.style.color=color; S.colorText=color; }
    else if(activeTab==='bg') { document.body.style.background=color; S.colorBg=color; }
    else if(activeTab==='title') { document.querySelectorAll('h1,h2,h3,h4,h5,h6').forEach(function(el){ el.style.color=color; }); S.colorTitle=color; }
    save();
  });

  creset.addEventListener('click', function(){
    document.body.style.color=''; document.body.style.background='';
    document.querySelectorAll('h1,h2,h3,h4,h5,h6').forEach(function(el){ el.style.color=''; });
    S.colorText=null; S.colorBg=null; S.colorTitle=null;
    hue.value=190; updatePreview(190); save();
    showToast('Cores redefinidas');
  });

  /* ── RESTAURAR TUDO ───────────────────────────────────── */
  restB.addEventListener('click', function(){
    Object.values(A).forEach(function(d){ if(d.cls) document.body.classList.remove(d.cls); });
    document.body.style.color=''; document.body.style.background='';
    document.querySelectorAll('h1,h2,h3,h4,h5,h6').forEach(function(el){ el.style.color=''; });
    cards.forEach(function(c){ c.classList.remove('is-on'); c.setAttribute('aria-pressed','false'); });
    S=Object.assign({},def);
    document.documentElement.setAttribute('data-theme','light');
    hue.value=190; updatePreview(190); save();
    showToast('Configurações restauradas ao padrão');
  });

  /* ── RESTAURAR ESTADO AO CARREGAR ────────────────────── */
  (function applyState(){
    document.documentElement.setAttribute('data-theme', S.theme||'light');
    S.active.forEach(function(action){
      var d=A[action];
      var card=document.querySelector('.bs-card[data-action="'+action+'"]');
      if(d&&d.cls) document.body.classList.add(d.cls);
      if(card){ card.classList.add('is-on'); card.setAttribute('aria-pressed','true'); }
    });
    if(S.colorText)  document.body.style.color=S.colorText;
    if(S.colorBg)    document.body.style.background=S.colorBg;
    if(S.colorTitle) document.querySelectorAll('h1,h2,h3,h4,h5,h6').forEach(function(el){ el.style.color=S.colorTitle; });
    updatePreview(190);
  })();

})();
</script>
