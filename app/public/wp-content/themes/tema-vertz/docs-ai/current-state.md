The theme structure is well established. Completed work includes:

Page templates: front-page.php, page-sobre.php, page-servicos.php, page-contato.php, page-politica-de-privacidade.php
UI components: Scroll-direction-aware sticky header (transparent at top, hides on scroll down, reappears with white background on scroll up); FAB stack with WhatsApp deep link and click-to-call; LGPD-compliant cookie consent banner (localStorage persistence, accept/reject); lead capture slide-in panel (triggered at 60% scroll depth or exit intent, suppressed on contact page and within same session)
Mobile optimizations: 16px minimum input font size (prevents iOS zoom), full-width submit buttons, 44px touch targets in nav
Form handling: vertz_handle_contato() in functions.php — nonce validation, field sanitization, wp_mail dispatch, redirect on success
Media: All placeholder divs replaced with proper <video>/<img> tags; loading="lazy" and decoding="async" on below-fold images; image paths follow assets/images/ convention inside theme directory
Legal/licensing: dist/ folder (contained third-party paid font and compiled CSS) deleted cleanly with no visual impact; theme uses only Google Fonts (Inter and Playfair Display, both SIL OFL licensed)
Git hygiene: app/sql/ added to .gitignore