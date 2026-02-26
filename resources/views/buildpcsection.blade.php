<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Build My PC</title>
</head>
<body style="margin:0;padding:0;background:#fff;">

<section style="background:#fff;padding:60px 0 80px;font-family:system-ui,sans-serif;overflow:hidden;">

  <!-- Heading -->
  <div style="text-align:center;margin-bottom:40px;">
    <h2 style="color:#000;font-size:1.9rem;font-weight:700;margin:0 0 10px;">Build My PC</h2>
    <span style="display:block;width:55px;height:3px;background:#00b4d8;margin:0 auto;border-radius:2px;"></span>
  </div>

  <!-- Stage: full width, items centered via JS -->
  <div style="width:100%;overflow:hidden;">
    <div id="stage" style="position:relative;width:1200px;height:460px;margin:0 auto;">

      <!-- HEADSET -->
      <div id="w-headset" style="position:absolute;display:flex;flex-direction:column;align-items:center;bottom:40px;transition:left 0.75s cubic-bezier(0.65,0,0.35,1),bottom 0.75s cubic-bezier(0.65,0,0.35,1);">
        <svg id="v-headset" width="175" height="210" viewBox="0 0 175 215" style="overflow:visible;transition:width 0.75s cubic-bezier(0.65,0,0.35,1),height 0.75s cubic-bezier(0.65,0,0.35,1);filter:drop-shadow(0 8px 24px rgba(80,40,180,0.18));">
          <defs>
            <radialGradient id="hBG" cx="50%" cy="42%" r="60%"><stop offset="0%" stop-color="#22214a"/><stop offset="100%" stop-color="#0a0919"/></radialGradient>
            <linearGradient id="hRGB" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#00c8e8"/><stop offset="50%" stop-color="#cc30ff"/><stop offset="100%" stop-color="#4433ee"/></linearGradient>
          </defs>
          <!-- Headband outer -->
          <path d="M30,128 Q30,16 88,16 Q146,16 146,128" fill="none" stroke="#14132e" stroke-width="20" stroke-linecap="round"/>
          <!-- Headband inner highlight -->
          <path d="M30,128 Q30,16 88,16 Q146,16 146,128" fill="none" stroke="#22214a" stroke-width="13" stroke-linecap="round"/>
          <!-- Cushion -->
          <path d="M56,42 Q88,28 120,42" fill="none" stroke="#2a2848" stroke-width="11" stroke-linecap="round"/>
          <!-- Left cup outer -->
          <ellipse cx="22" cy="132" rx="28" ry="34" fill="url(#hBG)" stroke="#14132e" stroke-width="2"/>
          <!-- Left cup RGB ring -->
          <ellipse cx="22" cy="132" rx="25" ry="31" fill="none" stroke="url(#hRGB)" stroke-width="4" opacity="0.95"/>
          <!-- Left cup inner -->
          <ellipse cx="22" cy="132" rx="16" ry="20" fill="#080815"/>
          <circle cx="22" cy="132" r="8" fill="#12113a"/>
          <circle cx="22" cy="132" r="4" fill="#1a1858"/>
          <!-- Right cup outer -->
          <ellipse cx="154" cy="132" rx="28" ry="34" fill="url(#hBG)" stroke="#14132e" stroke-width="2"/>
          <!-- Right cup RGB ring -->
          <ellipse cx="154" cy="132" rx="25" ry="31" fill="none" stroke="url(#hRGB)" stroke-width="4" opacity="0.95"/>
          <!-- Right cup inner -->
          <ellipse cx="154" cy="132" rx="16" ry="20" fill="#080815"/>
          <circle cx="154" cy="132" r="8" fill="#12113a"/>
          <circle cx="154" cy="132" r="4" fill="#1a1858"/>
          <!-- Mic boom arm -->
          <path d="M22,160 Q8,188 16,200" fill="none" stroke="#14132e" stroke-width="5.5" stroke-linecap="round"/>
          <rect x="9" y="193" width="16" height="12" rx="6" fill="#0a0919" stroke="#22214a" stroke-width="1"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,0.35);font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:10px;transition:opacity 0.3s ease;white-space:nowrap;">Headset</span>
      </div>

      <!-- MIC -->
      <div id="w-mic" style="position:absolute;display:flex;flex-direction:column;align-items:center;bottom:0px;transition:left 0.75s cubic-bezier(0.65,0,0.35,1),bottom 0.75s cubic-bezier(0.65,0,0.35,1);">
        <svg id="v-mic" width="90" height="200" viewBox="0 0 90 205" style="overflow:visible;transition:width 0.75s cubic-bezier(0.65,0,0.35,1),height 0.75s cubic-bezier(0.65,0,0.35,1);filter:drop-shadow(0 8px 24px rgba(80,40,180,0.15));">
          <defs>
            <radialGradient id="mBG" cx="42%" cy="38%" r="62%"><stop offset="0%" stop-color="#22214a"/><stop offset="100%" stop-color="#0a0919"/></radialGradient>
          </defs>
          <!-- Base plate -->
          <ellipse cx="45" cy="198" rx="34" ry="7" fill="#12112a"/>
          <!-- Stand -->
          <rect x="36" y="168" width="18" height="32" rx="5" fill="#0e0d24"/>
          <!-- Pole -->
          <rect x="42" y="125" width="6" height="47" fill="#16153a"/>
          <!-- RGB accent on pole -->
          <rect x="42" y="145" width="6" height="8" rx="1.5" fill="#00c8e8" opacity="0.85"/>
          <!-- Body capsule -->
          <rect x="15" y="38" width="60" height="90" rx="30" fill="url(#mBG)" stroke="#00c8e8" stroke-width="1.8"/>
          <!-- Top dome -->
          <ellipse cx="45" cy="40" rx="30" ry="10" fill="#12112a"/>
          <!-- Grille lines -->
          <g stroke="#2a2848" stroke-width="1.8" stroke-linecap="round">
            <line x1="20" y1="56" x2="70" y2="56"/>
            <line x1="18" y1="68" x2="72" y2="68"/>
            <line x1="17" y1="80" x2="73" y2="80"/>
            <line x1="17" y1="92" x2="73" y2="92"/>
            <line x1="18" y1="104" x2="72" y2="104"/>
            <line x1="20" y1="116" x2="70" y2="116"/>
          </g>
          <!-- RGB ring on body -->
          <rect x="15" y="38" width="60" height="90" rx="30" fill="none" stroke="#cc30ff" stroke-width="2" stroke-dasharray="10 6" opacity="0.6"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,0.35);font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:10px;transition:opacity 0.3s ease;white-space:nowrap;">Microphone</span>
      </div>

      <!-- KEYBOARD (rendered behind monitor via z-index) -->
      <div id="w-keyboard" style="position:absolute;display:flex;flex-direction:column;align-items:center;bottom:0px;z-index:2;transition:left 0.75s cubic-bezier(0.65,0,0.35,1),bottom 0.75s cubic-bezier(0.65,0,0.35,1);">
        <svg id="v-keyboard" width="280" height="120" viewBox="0 0 280 120" style="overflow:visible;transition:width 0.75s cubic-bezier(0.65,0,0.35,1),height 0.75s cubic-bezier(0.65,0,0.35,1);filter:drop-shadow(0 6px 20px rgba(0,0,0,0.22));">
          <defs>
            <linearGradient id="kBG" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#1c1b30"/><stop offset="100%" stop-color="#0c0b1a"/></linearGradient>
            <linearGradient id="kRGB" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#00c8e8"/><stop offset="45%" stop-color="#7c3aed"/><stop offset="100%" stop-color="#00c8e8"/></linearGradient>
          </defs>
          <!-- Body -->
          <rect x="1" y="6" width="278" height="107" rx="11" fill="url(#kBG)" stroke="#20203a" stroke-width="1.5"/>
          <!-- RGB underglow strip -->
          <rect x="1" y="106" width="278" height="7" rx="4" fill="url(#kRGB)" opacity="0.8"/>
          <!-- Keys -->
          <g fill="#14132e" stroke="#22214a" stroke-width="0.9">
            <!-- Row 1 -->
            <rect x="8"  y="13" width="17" height="15" rx="3.5"/><rect x="28" y="13" width="17" height="15" rx="3.5"/><rect x="48" y="13" width="17" height="15" rx="3.5"/><rect x="68" y="13" width="17" height="15" rx="3.5"/><rect x="88" y="13" width="17" height="15" rx="3.5"/><rect x="108" y="13" width="17" height="15" rx="3.5"/><rect x="128" y="13" width="17" height="15" rx="3.5"/><rect x="148" y="13" width="17" height="15" rx="3.5"/><rect x="168" y="13" width="17" height="15" rx="3.5"/><rect x="188" y="13" width="17" height="15" rx="3.5"/><rect x="208" y="13" width="17" height="15" rx="3.5"/><rect x="228" y="13" width="17" height="15" rx="3.5"/><rect x="248" y="13" width="30" height="15" rx="3.5"/>
            <!-- Row 2 -->
            <rect x="8"  y="31" width="25" height="15" rx="3.5"/><rect x="36" y="31" width="17" height="15" rx="3.5"/><rect x="56" y="31" width="17" height="15" rx="3.5"/><rect x="76" y="31" width="17" height="15" rx="3.5"/><rect x="96" y="31" width="17" height="15" rx="3.5"/><rect x="116" y="31" width="17" height="15" rx="3.5"/><rect x="136" y="31" width="17" height="15" rx="3.5"/><rect x="156" y="31" width="17" height="15" rx="3.5"/><rect x="176" y="31" width="17" height="15" rx="3.5"/><rect x="196" y="31" width="17" height="15" rx="3.5"/><rect x="216" y="31" width="17" height="15" rx="3.5"/><rect x="236" y="31" width="42" height="15" rx="3.5"/>
            <!-- Row 3 -->
            <rect x="8"  y="49" width="32" height="15" rx="3.5"/><rect x="43" y="49" width="17" height="15" rx="3.5"/><rect x="63" y="49" width="17" height="15" rx="3.5"/><rect x="83" y="49" width="17" height="15" rx="3.5"/><rect x="103" y="49" width="17" height="15" rx="3.5"/><rect x="123" y="49" width="17" height="15" rx="3.5"/><rect x="143" y="49" width="17" height="15" rx="3.5"/><rect x="163" y="49" width="17" height="15" rx="3.5"/><rect x="183" y="49" width="17" height="15" rx="3.5"/><rect x="203" y="49" width="17" height="15" rx="3.5"/><rect x="223" y="49" width="55" height="15" rx="3.5"/>
            <!-- Row 4 spacebar -->
            <rect x="8"  y="67" width="25" height="15" rx="3.5"/><rect x="36" y="67" width="17" height="15" rx="3.5"/><rect x="56" y="67" width="17" height="15" rx="3.5"/><rect x="76" y="67" width="122" height="15" rx="3.5"/><rect x="201" y="67" width="17" height="15" rx="3.5"/><rect x="221" y="67" width="17" height="15" rx="3.5"/><rect x="241" y="67" width="17" height="15" rx="3.5"/><rect x="261" y="67" width="17" height="15" rx="3.5"/>
            <!-- Row 5 -->
            <rect x="8"  y="85" width="25" height="13" rx="3.5"/><rect x="36" y="85" width="25" height="13" rx="3.5"/><rect x="64" y="85" width="25" height="13" rx="3.5"/>
            <rect x="241" y="85" width="17" height="13" rx="3.5"/><rect x="261" y="85" width="17" height="13" rx="3.5"/>
          </g>
          <!-- A few RGB key highlights -->
          <g fill="none" stroke="#00c8e8" stroke-width="1" opacity="0.55">
            <rect x="36" y="31" width="17" height="15" rx="3.5"/>
            <rect x="96" y="49" width="17" height="15" rx="3.5"/>
            <rect x="76" y="67" width="122" height="15" rx="3.5"/>
          </g>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,0.35);font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:10px;transition:opacity 0.3s ease;white-space:nowrap;">Keyboard</span>
      </div>

      <!-- MONITOR (higher z-index so it overlaps keyboard) -->
      <div id="w-monitor" style="position:absolute;display:flex;flex-direction:column;align-items:center;bottom:0px;z-index:3;transition:left 0.75s cubic-bezier(0.65,0,0.35,1),bottom 0.75s cubic-bezier(0.65,0,0.35,1);">
        <svg id="v-monitor" width="300" height="290" viewBox="0 0 300 295" style="overflow:visible;transition:width 0.75s cubic-bezier(0.65,0,0.35,1),height 0.75s cubic-bezier(0.65,0,0.35,1);filter:drop-shadow(0 10px 30px rgba(60,30,160,0.22));">
          <defs>
            <radialGradient id="scrG2" cx="50%" cy="56%" r="68%">
              <stop offset="0%" stop-color="#b83800" stop-opacity="0.75"/>
              <stop offset="20%" stop-color="#7c22cc" stop-opacity="0.88"/>
              <stop offset="52%" stop-color="#1840c8" stop-opacity="0.95"/>
              <stop offset="100%" stop-color="#010110"/>
            </radialGradient>
            <radialGradient id="scrH2" cx="50%" cy="60%" r="28%">
              <stop offset="0%" stop-color="#ff7020" stop-opacity="0.95"/>
              <stop offset="100%" stop-color="transparent"/>
            </radialGradient>
          </defs>
          <!-- Stand base -->
          <ellipse cx="150" cy="287" rx="54" ry="7" fill="#c0c0c0"/>
          <!-- Neck -->
          <rect x="132" y="240" width="36" height="50" rx="6" fill="#b8b8b8"/>
          <rect x="138" y="224" width="24" height="22" rx="4" fill="#a8a8a8"/>
          <!-- Frame -->
          <rect x="2" y="2" width="296" height="222" rx="14" fill="#0e0d22" stroke="#18173a" stroke-width="2"/>
          <!-- Screen -->
          <rect x="9" y="9" width="282" height="208" rx="10" fill="#010110"/>
          <rect x="9" y="9" width="282" height="208" rx="10" fill="url(#scrG2)"/>
          <rect x="9" y="9" width="282" height="208" rx="10" fill="url(#scrH2)"/>
          <!-- Stars -->
          <g fill="white" opacity="0.8">
            <circle cx="38" cy="32" r="1.4"/><circle cx="90" cy="55" r="1.1"/><circle cx="145" cy="24" r="1.6"/>
            <circle cx="210" cy="42" r="1.2"/><circle cx="272" cy="30" r="1.3"/><circle cx="278" cy="72" r="1"/>
            <circle cx="24" cy="98" r="1.1"/><circle cx="278" cy="118" r="1.4"/><circle cx="235" cy="162" r="1.1"/>
            <circle cx="60" cy="172" r="1.2"/><circle cx="162" cy="195" r="1"/><circle cx="110" cy="185" r="1.3"/>
            <circle cx="195" cy="82" r="1"/><circle cx="75" cy="88" r="1.2"/><circle cx="258" cy="170" r="1"/>
            <circle cx="135" cy="145" r="0.9"/><circle cx="52" cy="128" r="1"/>
          </g>
          <!-- Power LED -->
          <circle cx="150" cy="234" r="3.5" fill="#00c8e8" opacity="0.9"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,0.35);font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:10px;transition:opacity 0.3s ease;white-space:nowrap;">Monitor</span>
      </div>

      <!-- MOUSE -->
      <div id="w-mouse" style="position:absolute;display:flex;flex-direction:column;align-items:center;bottom:0px;z-index:2;transition:left 0.75s cubic-bezier(0.65,0,0.35,1),bottom 0.75s cubic-bezier(0.65,0,0.35,1);">
        <svg id="v-mouse" width="125" height="158" viewBox="0 0 115 158" style="overflow:visible;transition:width 0.75s cubic-bezier(0.65,0,0.35,1),height 0.75s cubic-bezier(0.65,0,0.35,1);filter:drop-shadow(0 8px 24px rgba(80,40,180,0.18));">
          <defs>
            <radialGradient id="mseBG" cx="38%" cy="28%" r="70%"><stop offset="0%" stop-color="#1e1d3a"/><stop offset="100%" stop-color="#070612"/></radialGradient>
            <linearGradient id="mseRGB" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#00c8e8"/><stop offset="100%" stop-color="#7c3aed"/></linearGradient>
          </defs>
          <!-- Shadow -->
          <ellipse cx="57" cy="152" rx="30" ry="5" fill="rgba(0,0,0,0.09)"/>
          <!-- Body -->
          <path d="M20,128 Q4,110 4,74 Q4,20 40,12 Q64,8 82,30 Q100,52 96,94 Q91,124 66,136 Q42,142 20,128Z" fill="url(#mseBG)" stroke="#1e1d3a" stroke-width="1.5"/>
          <!-- Center split -->
          <path d="M50,13 L50,96" stroke="#04040e" stroke-width="2.8"/>
          <!-- Left button area -->
          <path d="M50,13 Q28,16 12,42 Q6,62 8,80 L50,80Z" fill="#161530" opacity="0.55"/>
          <!-- Scroll wheel -->
          <rect x="42" y="36" width="16" height="34" rx="8" fill="#12112e" stroke="#00c8e8" stroke-width="1.8"/>
          <rect x="45" y="40" width="10" height="5" rx="2.5" fill="#1e1d3a"/>
          <rect x="45" y="48" width="10" height="5" rx="2.5" fill="#1e1d3a"/>
          <rect x="45" y="56" width="10" height="5" rx="2.5" fill="#1e1d3a"/>
          <!-- RGB underglow -->
          <path d="M20,128 Q42,142 66,136 Q91,124 96,94" stroke="url(#mseRGB)" stroke-width="5" fill="none" opacity="0.92"/>
          <!-- Side button -->
          <rect x="5" y="74" width="5" height="22" rx="2.5" fill="#161530"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,0.35);font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:10px;transition:opacity 0.3s ease;white-space:nowrap;">Mouse</span>
      </div>

      <!-- TOWER -->
      <div id="w-tower" style="position:absolute;display:flex;flex-direction:column;align-items:center;bottom:0px;z-index:2;transition:left 0.75s cubic-bezier(0.65,0,0.35,1),bottom 0.75s cubic-bezier(0.65,0,0.35,1);">
        <svg id="v-tower" width="190" height="340" viewBox="0 0 190 345" style="overflow:visible;transition:width 0.75s cubic-bezier(0.65,0,0.35,1),height 0.75s cubic-bezier(0.65,0,0.35,1);filter:drop-shadow(0 10px 30px rgba(60,30,160,0.22));">
          <defs>
            <linearGradient id="tBG2" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#080814"/><stop offset="100%" stop-color="#12112a"/></linearGradient>
            <linearGradient id="tSideRGB" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#00c8e8"/><stop offset="38%" stop-color="#7c3aed"/><stop offset="100%" stop-color="#00c8e8"/></linearGradient>
            <linearGradient id="tFanRGB" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#00c8e8"/><stop offset="100%" stop-color="#4433ee"/></linearGradient>
          </defs>
          <!-- Main chassis -->
          <rect x="5" y="4" width="155" height="337" rx="10" fill="url(#tBG2)" stroke="#18173a" stroke-width="2"/>
          <!-- Glass panel -->
          <rect x="14" y="15" width="112" height="315" rx="7" fill="#040410" stroke="#141330" stroke-width="1"/>
          <!-- RGB left edge strip -->
          <rect x="5" y="4" width="7" height="337" rx="3.5" fill="url(#tSideRGB)"/>

          <!-- Fan 1 -->
          <circle cx="70" cy="83"  r="40" fill="#080814" stroke="#14132e" stroke-width="1.5"/>
          <circle cx="70" cy="83"  r="35" fill="none" stroke="url(#tFanRGB)" stroke-width="4" opacity="0.92"/>
          <circle cx="70" cy="83"  r="24" fill="#040410"/>
          <circle cx="70" cy="83"  r="8"  fill="#0c1830"/>
          <circle cx="70" cy="83"  r="4"  fill="#00c8e8" opacity="0.8"/>
          <g transform="translate(70,83)" fill="#0a1220" stroke="#141e30" stroke-width="0.6">
            <path d="M0,-27 Q13,-14 0,-8 Q-13,-14 0,-27"/>
            <path d="M27,0 Q14,13 8,0 Q14,-13 27,0"/>
            <path d="M0,27 Q-13,14 0,8 Q13,14 0,27"/>
            <path d="M-27,0 Q-14,-13 -8,0 Q-14,13 -27,0"/>
          </g>

          <!-- Fan 2 -->
          <circle cx="70" cy="190" r="40" fill="#080814" stroke="#14132e" stroke-width="1.5"/>
          <circle cx="70" cy="190" r="35" fill="none" stroke="url(#tFanRGB)" stroke-width="4" opacity="0.92"/>
          <circle cx="70" cy="190" r="24" fill="#040410"/>
          <circle cx="70" cy="190" r="8"  fill="#0c1830"/>
          <circle cx="70" cy="190" r="4"  fill="#00c8e8" opacity="0.8"/>
          <g transform="translate(70,190)" fill="#0a1220" stroke="#141e30" stroke-width="0.6">
            <path d="M0,-27 Q13,-14 0,-8 Q-13,-14 0,-27"/>
            <path d="M27,0 Q14,13 8,0 Q14,-13 27,0"/>
            <path d="M0,27 Q-13,14 0,8 Q13,14 0,27"/>
            <path d="M-27,0 Q-14,-13 -8,0 Q-14,13 -27,0"/>
          </g>

          <!-- Fan 3 -->
          <circle cx="70" cy="295" r="36" fill="#080814" stroke="#14132e" stroke-width="1.5"/>
          <circle cx="70" cy="295" r="31" fill="none" stroke="url(#tFanRGB)" stroke-width="3.5" opacity="0.92"/>
          <circle cx="70" cy="295" r="21" fill="#040410"/>
          <circle cx="70" cy="295" r="7"  fill="#0c1830"/>
          <circle cx="70" cy="295" r="3.5" fill="#00c8e8" opacity="0.75"/>
          <g transform="translate(70,295)" fill="#0a1220" stroke="#141e30" stroke-width="0.6">
            <path d="M0,-23 Q11,-12 0,-7 Q-11,-12 0,-23"/>
            <path d="M23,0 Q12,11 7,0 Q12,-11 23,0"/>
            <path d="M0,23 Q-11,12 0,7 Q11,12 0,23"/>
            <path d="M-23,0 Q-12,-11 -7,0 Q-12,11 -23,0"/>
          </g>

          <!-- Right IO panel -->
          <rect x="132" y="15" width="28" height="315" rx="5" fill="#080814"/>
          <!-- Power button -->
          <circle cx="146" cy="38" r="9" fill="#0e0d22" stroke="#00c8e8" stroke-width="2"/>
          <circle cx="146" cy="38" r="4" fill="#00c8e8" opacity="0.7"/>
          <!-- Ports -->
          <rect x="136" y="56" width="18" height="10" rx="2.5" fill="#04040e" stroke="#141330" stroke-width="0.8"/>
          <rect x="136" y="72" width="18" height="10" rx="2.5" fill="#04040e" stroke="#141330" stroke-width="0.8"/>
          <rect x="136" y="92" width="18" height="12" rx="2.5" fill="#04040e" stroke="#141330" stroke-width="0.8"/>
          <rect x="136" y="110" width="18" height="12" rx="2.5" fill="#04040e" stroke="#141330" stroke-width="0.8"/>
          <rect x="136" y="132" width="18" height="45" rx="3" fill="#04040e" stroke="#141330" stroke-width="0.8"/>
          <rect x="136" y="186" width="18" height="10" rx="2.5" fill="#0e0d22"/>
          <rect x="136" y="202" width="18" height="10" rx="2.5" fill="#0e0d22"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,0.35);font-size:10px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:10px;transition:opacity 0.3s ease;white-space:nowrap;">PC Tower</span>
      </div>

      <!-- Glow (hover only) -->
      <div id="bmp-glow" style="position:absolute;inset:0;pointer-events:none;opacity:0;transition:opacity 0.7s;background:radial-gradient(ellipse at 50% 70%, rgba(0,180,216,0.1) 0%, rgba(100,40,220,0.07) 45%, transparent 72%);border-radius:20px;z-index:1;"></div>

    </div>
  </div>

  <!-- CTA -->
  <div style="text-align:center;margin-top:50px;">
    <a href="#"
       onmouseover="this.style.background='#00b4d8';this.style.color='#fff';this.style.boxShadow='0 0 28px rgba(0,180,216,0.38)';"
       onmouseout="this.style.background='transparent';this.style.color='#00b4d8';this.style.boxShadow='none';"
       style="display:inline-block;color:#00b4d8;background:transparent;border:1.5px solid #00b4d8;padding:14px 52px;border-radius:4px;font-size:11px;font-weight:700;letter-spacing:3px;text-transform:uppercase;text-decoration:none;transition:all 0.25s;">
      START BUILDING →
    </a>
  </div>

</section>

<script>
(function(){
  var stage = document.getElementById('stage');
  var glow  = document.getElementById('bmp-glow');

  /* ─── SPREAD: evenly spaced, all at bottom:0 ─── */
  /* Stage width = 1200. Parts total ~1050, padding ~75 each side */
  var SP = {
    headset:  { l:  30, b: 40 },   /* slightly elevated (no stand) */
    mic:      { l: 235, b:  0 },
    keyboard: { l: 365, b:  0 },
    monitor:  { l: 490, b:  0 },
    mouse:    { l: 820, b:  0 },
    tower:    { l: 990, b:  0 },
  };

  /* ─── ASSEMBLED: tight, centered, matching screenshot ─── */
  /* Total assembled group width ≈ 1000px, centered in 1200px → start ~100 */
  var AS = {
    headset:  { l:  40, b: 150 },  /* elevated far left                    */
    mic:      { l: 195, b:   5 },  /* desk level right of headset          */
    monitor:  { l: 310, b: 128 },  /* raised on stand above keyboard       */
    keyboard: { l: 285, b:   5 },  /* desk level below monitor             */
    mouse:    { l: 585, b:   8 },  /* right of keyboard, tight             */
    tower:    { l: 725, b:   5 },  /* right, tall                          */
  };

  /* SVG sizes [w, h] */
  var SZ_SP = {
    headset:  [175,210], mic:[90,200], keyboard:[280,120],
    monitor:  [300,290], mouse:[125,158], tower:[190,340],
  };
  var SZ_AS = {
    headset:  [200,240], mic:[82,185], keyboard:[305,130],
    monitor:  [340,328], mouse:[118,148], tower:[205,368],
  };

  var parts = ['headset','mic','keyboard','monitor','mouse','tower'];

  function apply(hover){
    parts.forEach(function(n){
      var pos = hover ? AS[n]    : SP[n];
      var sz  = hover ? SZ_AS[n] : SZ_SP[n];
      var w   = document.getElementById('w-'+n);
      var v   = document.getElementById('v-'+n);
      w.style.left   = pos.l + 'px';
      w.style.bottom = pos.b + 'px';
      v.setAttribute('width',  sz[0]);
      v.setAttribute('height', sz[1]);
      w.querySelector('.lbl').style.opacity = hover ? '0' : '1';
    });
    glow.style.opacity = hover ? '1' : '0';
  }

  /* Set initial spread positions */
  apply(false);

  stage.addEventListener('mouseenter', function(){ apply(true);  });
  stage.addEventListener('mouseleave', function(){ apply(false); });
})();
</script>

</body>
</html>