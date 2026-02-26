<div style="margin:0;padding:0;background:#f8f9fb;">

<section style="background:#f8f9fb;padding:70px 0 90px;font-family:system-ui,sans-serif;overflow:hidden;">

  <div style="text-align:center;margin-bottom:50px;">
    <h2 style="color:#111;font-size:2rem;font-weight:700;margin:0 0 12px;">Build My PC</h2>
    <span style="display:block;width:52px;height:3px;background:#00b4d8;margin:0 auto;border-radius:2px;"></span>
  </div>

  <p id="hint" style="text-align:center;color:rgba(0,0,0,.28);font-size:10.5px;letter-spacing:3px;text-transform:uppercase;margin:0 0 0;transition:opacity .4s;">HOVER TO ASSEMBLE YOUR SETUP</p>

  <div style="width:100%;overflow:visible;">
    <div id="stage" style="position:relative;width:1260px;height:500px;margin:0 auto;">

      <!-- HEADSET -->
      <div id="w-headset" style="position:absolute;display:flex;flex-direction:column;align-items:center;transition:left .75s cubic-bezier(.65,0,.35,1),bottom .75s cubic-bezier(.65,0,.35,1);">
        <svg id="v-headset" width="185" height="220" viewBox="0 0 180 225" style="transition:width .75s cubic-bezier(.65,0,.35,1),height .75s cubic-bezier(.65,0,.35,1);overflow:visible;filter:drop-shadow(0 12px 28px rgba(80,40,200,.22))">
          <defs>
            <radialGradient id="hcup" cx="42%" cy="38%" r="62%"><stop offset="0%" stop-color="#28265a"/><stop offset="100%" stop-color="#0d0b1e"/></radialGradient>
            <linearGradient id="hring" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#00d0f0"/><stop offset="48%" stop-color="#c830ff"/><stop offset="100%" stop-color="#4420ee"/></linearGradient>
            <linearGradient id="hband" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#1c1a40"/><stop offset="100%" stop-color="#28265a"/></linearGradient>
          </defs>
          <path d="M28,135 Q28,14 90,14 Q152,14 152,135" fill="none" stroke="#09081a" stroke-width="26" stroke-linecap="round"/>
          <path d="M28,135 Q28,14 90,14 Q152,14 152,135" fill="none" stroke="url(#hband)" stroke-width="18" stroke-linecap="round"/>
          <path d="M28,135 Q28,14 90,14 Q152,14 152,135" fill="none" stroke="#30305a" stroke-width="8" stroke-linecap="round"/>
          <path d="M62,38 Q90,24 118,38" fill="none" stroke="#32305e" stroke-width="13" stroke-linecap="round"/>
          <!-- Left cup -->
          <ellipse cx="20" cy="142" rx="30" ry="37" fill="#09081a"/>
          <ellipse cx="20" cy="142" rx="27" ry="34" fill="url(#hcup)"/>
          <ellipse cx="20" cy="142" rx="27" ry="34" fill="none" stroke="url(#hring)" stroke-width="4.5" opacity=".98"/>
          <ellipse cx="20" cy="142" rx="16" ry="20" fill="#060513"/>
          <circle  cx="20" cy="142" r="9"  fill="#14124a"/>
          <circle  cx="20" cy="142" r="5"  fill="#1e1c62"/>
          <!-- Right cup -->
          <ellipse cx="160" cy="142" rx="30" ry="37" fill="#09081a"/>
          <ellipse cx="160" cy="142" rx="27" ry="34" fill="url(#hcup)"/>
          <ellipse cx="160" cy="142" rx="27" ry="34" fill="none" stroke="url(#hring)" stroke-width="4.5" opacity=".98"/>
          <ellipse cx="160" cy="142" rx="16" ry="20" fill="#060513"/>
          <circle  cx="160" cy="142" r="9"  fill="#14124a"/>
          <circle  cx="160" cy="142" r="5"  fill="#1e1c62"/>
          <!-- Mic boom -->
          <path d="M20,172 Q6,202 14,215" fill="none" stroke="#12103a" stroke-width="6" stroke-linecap="round"/>
          <rect x="7" y="208" width="16" height="13" rx="6.5" fill="#0a0918"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,.32);font-size:9.5px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:12px;transition:opacity .35s;white-space:nowrap;">HEADSET</span>
      </div>

      <!-- MIC -->
      <div id="w-mic" style="position:absolute;display:flex;flex-direction:column;align-items:center;transition:left .75s cubic-bezier(.65,0,.35,1),bottom .75s cubic-bezier(.65,0,.35,1);">
        <svg id="v-mic" width="95" height="215" viewBox="0 0 95 218" style="transition:width .75s cubic-bezier(.65,0,.35,1),height .75s cubic-bezier(.65,0,.35,1);overflow:visible;filter:drop-shadow(0 12px 28px rgba(80,40,200,.18))">
          <defs>
            <radialGradient id="mbody" cx="40%" cy="35%" r="64%"><stop offset="0%" stop-color="#28265a"/><stop offset="100%" stop-color="#0d0b1e"/></radialGradient>
            <linearGradient id="mbase" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#1c1a40"/><stop offset="100%" stop-color="#0d0b1e"/></linearGradient>
          </defs>
          <ellipse cx="47" cy="210" rx="36" ry="8" fill="#0d0b1e"/>
          <rect x="38" y="178" width="19" height="35" rx="5" fill="url(#mbase)"/>
          <ellipse cx="47" cy="178" rx="20" ry="6" fill="#1c1a40"/>
          <rect x="44" y="133" width="7" height="48" fill="#1c1a40"/>
          <rect x="44" y="151" width="7" height="9" rx="2" fill="#00d0f0" opacity=".9"/>
          <rect x="14" y="35" width="67" height="100" rx="33" fill="url(#mbody)" stroke="#00d0f0" stroke-width="2"/>
          <ellipse cx="47" cy="37" rx="33" ry="11" fill="#14123a"/>
          <g stroke="#28265a" stroke-width="2" stroke-linecap="round">
            <line x1="19" y1="55" x2="75" y2="55"/>
            <line x1="16" y1="67" x2="78" y2="67"/>
            <line x1="15" y1="79" x2="79" y2="79"/>
            <line x1="15" y1="91" x2="79" y2="91"/>
            <line x1="16" y1="103" x2="78" y2="103"/>
            <line x1="19" y1="115" x2="75" y2="115"/>
            <line x1="22" y1="126" x2="72" y2="126"/>
          </g>
          <rect x="14" y="35" width="67" height="100" rx="33" fill="none" stroke="#c830ff" stroke-width="2.5" stroke-dasharray="11 6" opacity=".65"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,.32);font-size:9.5px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:12px;transition:opacity .35s;white-space:nowrap;">MICROPHONE</span>
      </div>

      <!-- KEYBOARD -->
      <div id="w-keyboard" style="position:absolute;display:flex;flex-direction:column;align-items:center;z-index:2;transition:left .75s cubic-bezier(.65,0,.35,1),bottom .75s cubic-bezier(.65,0,.35,1);">
        <svg id="v-keyboard" width="300" height="130" viewBox="0 0 300 130" style="transition:width .75s cubic-bezier(.65,0,.35,1),height .75s cubic-bezier(.65,0,.35,1);overflow:visible;filter:drop-shadow(0 12px 28px rgba(0,0,0,.28))">
          <defs>
            <linearGradient id="kbbg" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#1c1a30"/><stop offset="100%" stop-color="#0a0916"/></linearGradient>
            <linearGradient id="kbrgb" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#00d0f0"/><stop offset="48%" stop-color="#7c3aed"/><stop offset="100%" stop-color="#00d0f0"/></linearGradient>
          </defs>
          <rect x="1" y="5" width="298" height="117" rx="12" fill="url(#kbbg)" stroke="#1e1c38" stroke-width="1.5"/>
          <rect x="1" y="115" width="298" height="7" rx="4" fill="url(#kbrgb)" opacity=".85"/>
          <g fill="#14122e" stroke="#222048" stroke-width="1">
            <rect x="9" y="13" width="18" height="16" rx="4"/><rect x="30" y="13" width="18" height="16" rx="4"/><rect x="51" y="13" width="18" height="16" rx="4"/><rect x="72" y="13" width="18" height="16" rx="4"/><rect x="93" y="13" width="18" height="16" rx="4"/><rect x="114" y="13" width="18" height="16" rx="4"/><rect x="135" y="13" width="18" height="16" rx="4"/><rect x="156" y="13" width="18" height="16" rx="4"/><rect x="177" y="13" width="18" height="16" rx="4"/><rect x="198" y="13" width="18" height="16" rx="4"/><rect x="219" y="13" width="18" height="16" rx="4"/><rect x="240" y="13" width="18" height="16" rx="4"/><rect x="261" y="13" width="29" height="16" rx="4"/>
            <rect x="9" y="33" width="27" height="16" rx="4"/><rect x="39" y="33" width="18" height="16" rx="4"/><rect x="60" y="33" width="18" height="16" rx="4"/><rect x="81" y="33" width="18" height="16" rx="4"/><rect x="102" y="33" width="18" height="16" rx="4"/><rect x="123" y="33" width="18" height="16" rx="4"/><rect x="144" y="33" width="18" height="16" rx="4"/><rect x="165" y="33" width="18" height="16" rx="4"/><rect x="186" y="33" width="18" height="16" rx="4"/><rect x="207" y="33" width="18" height="16" rx="4"/><rect x="228" y="33" width="18" height="16" rx="4"/><rect x="249" y="33" width="41" height="16" rx="4"/>
            <rect x="9" y="53" width="34" height="16" rx="4"/><rect x="46" y="53" width="18" height="16" rx="4"/><rect x="67" y="53" width="18" height="16" rx="4"/><rect x="88" y="53" width="18" height="16" rx="4"/><rect x="109" y="53" width="18" height="16" rx="4"/><rect x="130" y="53" width="18" height="16" rx="4"/><rect x="151" y="53" width="18" height="16" rx="4"/><rect x="172" y="53" width="18" height="16" rx="4"/><rect x="193" y="53" width="18" height="16" rx="4"/><rect x="214" y="53" width="18" height="16" rx="4"/><rect x="235" y="53" width="55" height="16" rx="4"/>
            <rect x="9" y="73" width="27" height="16" rx="4"/><rect x="39" y="73" width="18" height="16" rx="4"/><rect x="60" y="73" width="18" height="16" rx="4"/><rect x="81" y="73" width="130" height="16" rx="4"/><rect x="214" y="73" width="18" height="16" rx="4"/><rect x="235" y="73" width="18" height="16" rx="4"/><rect x="256" y="73" width="18" height="16" rx="4"/><rect x="277" y="73" width="14" height="16" rx="4"/>
            <rect x="9" y="93" width="27" height="14" rx="4"/><rect x="39" y="93" width="27" height="14" rx="4"/><rect x="69" y="93" width="27" height="14" rx="4"/><rect x="256" y="93" width="18" height="14" rx="4"/><rect x="277" y="93" width="14" height="14" rx="4"/>
          </g>
          <g fill="none" stroke="#00d0f0" stroke-width="1.2" opacity=".6">
            <rect x="39" y="33" width="18" height="16" rx="4"/>
            <rect x="109" y="53" width="18" height="16" rx="4"/>
            <rect x="81" y="73" width="130" height="16" rx="4"/>
          </g>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,.32);font-size:9.5px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:12px;transition:opacity .35s;white-space:nowrap;">KEYBOARD</span>
      </div>

      <!-- MONITOR -->
      <div id="w-monitor" style="position:absolute;display:flex;flex-direction:column;align-items:center;z-index:3;transition:left .75s cubic-bezier(.65,0,.35,1),bottom .75s cubic-bezier(.65,0,.35,1);">
        <svg id="v-monitor" width="320" height="318" viewBox="0 0 320 318" style="transition:width .75s cubic-bezier(.65,0,.35,1),height .75s cubic-bezier(.65,0,.35,1);overflow:visible;filter:drop-shadow(0 14px 36px rgba(60,20,180,.25))">
          <defs>
            <radialGradient id="scr" cx="50%" cy="56%" r="68%">
              <stop offset="0%" stop-color="#b83000" stop-opacity=".78"/>
              <stop offset="18%" stop-color="#8020cc" stop-opacity=".9"/>
              <stop offset="50%" stop-color="#1438c8" stop-opacity=".96"/>
              <stop offset="100%" stop-color="#01010e"/>
            </radialGradient>
            <radialGradient id="scrHot" cx="50%" cy="58%" r="26%">
              <stop offset="0%" stop-color="#ff6010" stop-opacity=".98"/>
              <stop offset="100%" stop-color="transparent"/>
            </radialGradient>
          </defs>
          <ellipse cx="160" cy="310" rx="58" ry="8" fill="#c8c8c8"/>
          <rect x="140" y="258" width="40" height="56" rx="7" fill="#c0c0c0"/>
          <rect x="148" y="242" width="24" height="22" rx="5" fill="#b0b0b0"/>
          <rect x="2" y="2" width="316" height="240" rx="15" fill="#0c0b20" stroke="#16153a" stroke-width="2"/>
          <rect x="10" y="10" width="300" height="224" rx="10" fill="#01010e"/>
          <rect x="10" y="10" width="300" height="224" rx="10" fill="url(#scr)"/>
          <rect x="10" y="10" width="300" height="224" rx="10" fill="url(#scrHot)"/>
          <g fill="white" opacity=".82">
            <circle cx="42" cy="35" r="1.5"/><circle cx="98" cy="58" r="1.2"/><circle cx="158" cy="26" r="1.7"/>
            <circle cx="222" cy="44" r="1.3"/><circle cx="288" cy="32" r="1.4"/><circle cx="296" cy="80" r="1.1"/>
            <circle cx="26" cy="108" r="1.2"/><circle cx="298" cy="128" r="1.5"/><circle cx="252" cy="176" r="1.2"/>
            <circle cx="65" cy="185" r="1.3"/><circle cx="172" cy="212" r="1.1"/><circle cx="116" cy="200" r="1.4"/>
            <circle cx="205" cy="90" r="1.1"/><circle cx="78" cy="95" r="1.3"/>
          </g>
          <circle cx="160" cy="250" r="4" fill="#00d0f0" opacity=".9"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,.32);font-size:9.5px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:12px;transition:opacity .35s;white-space:nowrap;">MONITOR</span>
      </div>

      <!-- MOUSE -->
      <div id="w-mouse" style="position:absolute;display:flex;flex-direction:column;align-items:center;z-index:2;transition:left .75s cubic-bezier(.65,0,.35,1),bottom .75s cubic-bezier(.65,0,.35,1);">
        <svg id="v-mouse" width="130" height="165" viewBox="0 0 120 165" style="transition:width .75s cubic-bezier(.65,0,.35,1),height .75s cubic-bezier(.65,0,.35,1);overflow:visible;filter:drop-shadow(0 12px 28px rgba(80,40,200,.2))">
          <defs>
            <radialGradient id="msebg" cx="36%" cy="26%" r="72%"><stop offset="0%" stop-color="#1e1c3a"/><stop offset="100%" stop-color="#07060f"/></radialGradient>
            <linearGradient id="msergb" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#00d0f0"/><stop offset="100%" stop-color="#7c3aed"/></linearGradient>
          </defs>
          <ellipse cx="60" cy="158" rx="32" ry="6" fill="rgba(0,0,0,.1)"/>
          <path d="M18,132 Q2,114 2,76 Q2,18 38,10 Q64,6 84,30 Q104,54 100,98 Q95,128 68,140 Q42,148 18,132Z" fill="url(#msebg)" stroke="#1a1838" stroke-width="1.5"/>
          <path d="M48,11 L48,100" stroke="#030308" stroke-width="3"/>
          <path d="M48,11 Q26,15 10,44 Q4,64 6,84 L48,84Z" fill="#161432" opacity=".55"/>
          <rect x="40" y="36" width="16" height="36" rx="8" fill="#0e0c28" stroke="#00d0f0" stroke-width="2"/>
          <rect x="43" y="41" width="10" height="5" rx="2.5" fill="#1e1c3a"/>
          <rect x="43" y="50" width="10" height="5" rx="2.5" fill="#1e1c3a"/>
          <rect x="43" y="59" width="10" height="5" rx="2.5" fill="#1e1c3a"/>
          <path d="M18,132 Q42,148 68,140 Q95,128 100,98" stroke="url(#msergb)" stroke-width="5.5" fill="none" opacity=".94"/>
          <rect x="3" y="78" width="5" height="24" rx="2.5" fill="#141232"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,.32);font-size:9.5px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:12px;transition:opacity .35s;white-space:nowrap;">MOUSE</span>
      </div>

      <!-- TOWER -->
      <div id="w-tower" style="position:absolute;display:flex;flex-direction:column;align-items:center;z-index:2;transition:left .75s cubic-bezier(.65,0,.35,1),bottom .75s cubic-bezier(.65,0,.35,1);">
        <svg id="v-tower" width="200" height="370" viewBox="0 0 200 375" style="transition:width .75s cubic-bezier(.65,0,.35,1),height .75s cubic-bezier(.65,0,.35,1);overflow:visible;filter:drop-shadow(0 14px 36px rgba(60,20,180,.25))">
          <defs>
            <linearGradient id="twrbg" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#07060f"/><stop offset="100%" stop-color="#10102a"/></linearGradient>
            <linearGradient id="twrside" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#00d0f0"/><stop offset="35%" stop-color="#7c3aed"/><stop offset="100%" stop-color="#00d0f0"/></linearGradient>
            <linearGradient id="fanring" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#00d0f0"/><stop offset="100%" stop-color="#4422ee"/></linearGradient>
          </defs>
          <rect x="5" y="4" width="162" height="367" rx="11" fill="url(#twrbg)" stroke="#14122e" stroke-width="2"/>
          <rect x="14" y="16" width="118" height="343" rx="8" fill="#030309" stroke="#10102a" stroke-width="1"/>
          <rect x="5" y="4" width="8" height="367" rx="4" fill="url(#twrside)"/>
          <!-- Fan 1 -->
          <circle cx="73" cy="90"  r="43" fill="#060614" stroke="#10102a" stroke-width="1.5"/>
          <circle cx="73" cy="90"  r="38" fill="none" stroke="url(#fanring)" stroke-width="4.5" opacity=".95"/>
          <circle cx="73" cy="90"  r="26" fill="#030309"/>
          <circle cx="73" cy="90"  r="9"  fill="#0c1630"/>
          <circle cx="73" cy="90"  r="4.5" fill="#00d0f0" opacity=".85"/>
          <g transform="translate(73,90)" fill="#090e1e" stroke="#121e30" stroke-width=".7">
            <path d="M0,-29 Q14,-15 0,-9 Q-14,-15 0,-29"/><path d="M29,0 Q15,14 9,0 Q15,-14 29,0"/>
            <path d="M0,29 Q-14,15 0,9 Q14,15 0,29"/><path d="M-29,0 Q-15,-14 -9,0 Q-15,14 -29,0"/>
          </g>
          <!-- Fan 2 -->
          <circle cx="73" cy="205" r="43" fill="#060614" stroke="#10102a" stroke-width="1.5"/>
          <circle cx="73" cy="205" r="38" fill="none" stroke="url(#fanring)" stroke-width="4.5" opacity=".95"/>
          <circle cx="73" cy="205" r="26" fill="#030309"/>
          <circle cx="73" cy="205" r="9"  fill="#0c1630"/>
          <circle cx="73" cy="205" r="4.5" fill="#00d0f0" opacity=".85"/>
          <g transform="translate(73,205)" fill="#090e1e" stroke="#121e30" stroke-width=".7">
            <path d="M0,-29 Q14,-15 0,-9 Q-14,-15 0,-29"/><path d="M29,0 Q15,14 9,0 Q15,-14 29,0"/>
            <path d="M0,29 Q-14,15 0,9 Q14,15 0,29"/><path d="M-29,0 Q-15,-14 -9,0 Q-15,14 -29,0"/>
          </g>
          <!-- Fan 3 -->
          <circle cx="73" cy="318" r="38" fill="#060614" stroke="#10102a" stroke-width="1.5"/>
          <circle cx="73" cy="318" r="33" fill="none" stroke="url(#fanring)" stroke-width="4" opacity=".95"/>
          <circle cx="73" cy="318" r="22" fill="#030309"/>
          <circle cx="73" cy="318" r="8"  fill="#0c1630"/>
          <circle cx="73" cy="318" r="4"  fill="#00d0f0" opacity=".8"/>
          <g transform="translate(73,318)" fill="#090e1e" stroke="#121e30" stroke-width=".7">
            <path d="M0,-24 Q12,-13 0,-8 Q-12,-13 0,-24"/><path d="M24,0 Q13,12 8,0 Q13,-12 24,0"/>
            <path d="M0,24 Q-12,13 0,8 Q12,13 0,24"/><path d="M-24,0 Q-13,-12 -8,0 Q-13,12 -24,0"/>
          </g>
          <!-- IO panel -->
          <rect x="140" y="16" width="27" height="343" rx="5" fill="#07060f"/>
          <circle cx="153" cy="40" r="10" fill="#0d0c22" stroke="#00d0f0" stroke-width="2.2"/>
          <circle cx="153" cy="40" r="5" fill="#00d0f0" opacity=".72"/>
          <rect x="144" y="60" width="18" height="11" rx="3" fill="#030309" stroke="#10102a" stroke-width=".8"/>
          <rect x="144" y="77" width="18" height="11" rx="3" fill="#030309" stroke="#10102a" stroke-width=".8"/>
          <rect x="144" y="98" width="18" height="14" rx="3" fill="#030309" stroke="#10102a" stroke-width=".8"/>
          <rect x="144" y="118" width="18" height="14" rx="3" fill="#030309" stroke="#10102a" stroke-width=".8"/>
          <rect x="144" y="142" width="18" height="50" rx="3" fill="#030309" stroke="#10102a" stroke-width=".8"/>
          <rect x="144" y="200" width="18" height="11" rx="3" fill="#0d0c22"/>
          <rect x="144" y="218" width="18" height="11" rx="3" fill="#0d0c22"/>
        </svg>
        <span class="lbl" style="color:rgba(0,0,0,.32);font-size:9.5px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;margin-top:12px;transition:opacity .35s;white-space:nowrap;">PC TOWER</span>
      </div>

      <div id="glow" style="position:absolute;inset:0;z-index:1;pointer-events:none;opacity:0;transition:opacity .7s;background:radial-gradient(ellipse at 52% 72%, rgba(0,180,216,.12) 0%, rgba(100,40,220,.08) 42%, transparent 70%);border-radius:24px;"></div>

    </div>
  </div>

  <div style="text-align:center;margin-top:54px;">
    <a href="#"
       onmouseover="this.style.background='#00b4d8';this.style.color='#fff';this.style.boxShadow='0 0 30px rgba(0,180,216,.4)';"
       onmouseout="this.style.background='transparent';this.style.color='#00b4d8';this.style.boxShadow='none';"
       style="display:inline-block;color:#00b4d8;background:transparent;border:1.5px solid #00b4d8;padding:14px 54px;border-radius:4px;font-size:11px;font-weight:700;letter-spacing:3.5px;text-transform:uppercase;text-decoration:none;transition:all .25s;">
      START BUILDING →
    </a>
  </div>

</section>

<script>
(function(){
  var stage = document.getElementById('stage');
  var glow  = document.getElementById('glow');
  var hint  = document.getElementById('hint');

  // SPREAD: evenly spaced with clear gaps. Stage=1260px
  // widths: headset=185, mic=95, keyboard=300, monitor=320, mouse=130, tower=200 → total=1230
  // gaps of ~40px between each → offsets below
  var SP = {
    headset:  { l:  15, b: 50 },
    mic:      { l: 238, b:  0 },
    keyboard: { l: 371, b:  0 },
    monitor:  { l: 709, b:  0 },
    mouse:    { l:1067, b:  0 },
    tower:    { l: 980, b:  0 }, // temporarily will be fixed in apply
  };

  // Recalculate spread so tower fits - total parts width ~1230, stage 1260
  // headset(185)+gap40+mic(95)+gap40+keyboard(300)+gap40+monitor(320)+gap40+mouse(130)+gap40+tower(200)=1390
  // Adjust: reduce gaps to 20px
  // 15 | 220 | 335 | 655 | 995 | 1145
  SP = {
    headset:  { l:  15, b: 50 },
    mic:      { l: 218, b:  0 },
    keyboard: { l: 328, b:  0 },
    monitor:  { l: 642, b:  0 },
    mouse:    { l: 978, b:  0 },
    tower:    { l:1122, b:  0 },
  };

  // ASSEMBLED: tight centered group
  var AS = {
    headset:  { l:  58, b: 162 },
    mic:      { l: 222, b:   8 },
    keyboard: { l: 302, b:   8 },
    monitor:  { l: 270, b: 142 },
    mouse:    { l: 622, b:  10 },
    tower:    { l: 768, b:   5 },
  };

  var SZ_SP = {
    headset: [185,220], mic:[95,215], keyboard:[300,130],
    monitor: [320,318], mouse:[130,165], tower:[200,370],
  };
  var SZ_AS = {
    headset: [215,255], mic:[84,195], keyboard:[322,138],
    monitor: [364,354], mouse:[120,152], tower:[218,395],
  };

  var PARTS = ['headset','mic','keyboard','monitor','mouse','tower'];

  function apply(hover){
    PARTS.forEach(function(n){
      var p = hover ? AS[n]    : SP[n];
      var s = hover ? SZ_AS[n] : SZ_SP[n];
      var w = document.getElementById('w-'+n);
      var v = document.getElementById('v-'+n);
      w.style.left   = p.l+'px';
      w.style.bottom = p.b+'px';
      v.setAttribute('width',  s[0]);
      v.setAttribute('height', s[1]);
      w.querySelector('.lbl').style.opacity = hover ? '0' : '1';
    });
    glow.style.opacity = hover ? '1' : '0';
    hint.style.opacity = hover ? '0' : '1';
  }

  apply(false);
  stage.addEventListener('mouseenter', function(){ apply(true);  });
  stage.addEventListener('mouseleave', function(){ apply(false); });
})();
</script>
</div>
