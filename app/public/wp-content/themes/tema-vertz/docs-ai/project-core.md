Local development: LocalWP
Version control: GitHub (doutorferr0/site_wp_vertziluminacao); classic PAT (ghp_dCRO...) with repo scope
GitHub API pattern: GET /repos/{owner}/{repo}/contents/{path} to read; PUT same endpoint with {"message":"update","content":"{base64}","sha":"{sha}"} to push; base64 -w 0 flag required on Linux to prevent line wrapping
Fonts: Google Fonts — Inter and Playfair Display (SIL OFL licensed)
Reference: vertziluminacao.com (scraped for real contact data)

Claude reads and pushes all file changes directly via the GitHub Contents API (GET to read + decode base64 content; PUT with current file SHA to update), so Henrique only needs to run git pull origin main locally to receive changes
Commit messages are always just "update" with no description
Minimal git workflow: git pull origin main before editing; gup alias (git add -A && git commit -m "update" && git push origin main) after editing; git stash && git pull origin main && git stash pop for conflict resolution
Templates use WordPress Template Name headers and are assigned via the WP admin page attributes panel
Code standards: esc_url() / esc_html() / esc_attr() escaping throughout; $theme_uri cached outside loops

Real client data in use throughout the theme:

WhatsApp: (19) 9 9977-8710 | Landline: (19) 3251-0501
Email: contato@vertziluminacao.com.br | Instagram: @vertziluminacao
Campinas address: R. Antônio Lapa, 328 | São Paulo address: Alameda Casa Branca, 806
CNPJ: 07.002.210/0001-68