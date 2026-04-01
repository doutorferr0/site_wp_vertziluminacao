@echo off
REM Script para fazer upload do repositório para GitHub
REM GitHub: https://github.com/doutorferr0/site_wp_vertziluminacao

REM Variáveis
set REPO_NAME=site_wp_vertziluminacao
set GITHUB_USER=doutorferr0
set LOCAL_PATH=c:\Users\henri\Local Sites\vertziluminacaocombr
set REPO_URL=https://github.com/%GITHUB_USER%/%REPO_NAME%.git

echo.
echo ========================================
echo GitHub Upload Script
echo ========================================
echo.
echo Local Path: %LOCAL_PATH%
echo Repository: %REPO_URL%
echo.

REM Navegar para diretório
cd /d "%LOCAL_PATH%"
if errorlevel 1 (
    echo ERROR: Nao consegui entrar no diretorio %LOCAL_PATH%
    pause
    exit /b 1
)

echo [1/7] Inicializando git...
git init
if errorlevel 1 (
    echo ERROR: Git nao esta instalado ou nao reconhecido
    echo Instale Git for Windows: https://git-scm.com/download/win
    pause
    exit /b 1
)

echo [2/7] Configurando usuario git...
git config user.name "Henri Ferro"
git config user.email "henri@example.com"

echo [3/7] Adicionando arquivos...
git add .

echo [4/7] Verificando status...
git status

echo.
echo [5/7] Criando primeiro commit...
git commit -m "Initial commit: WordPress theme for Vertz Iluminacao

- tema-vertz theme with 10 homepage sections
- Complete CSS system (1400+ lines)
- JavaScript modules (400+ lines)
- Cards slider with 15 items (PHP dynamic)
- Mobile-first responsive design (3 breakpoints)
- Comprehensive documentation

Co-authored-by: Copilot <223556219+Copilot@users.noreply.github.com>"

if errorlevel 1 (
    echo ERROR: Falha ao fazer commit
    pause
    exit /b 1
)

echo [6/7] Renomeando branch para main...
git branch -M main

echo [7/7] Fazendo push para GitHub...
git remote add origin %REPO_URL%
git push -u origin main

if errorlevel 1 (
    echo ERROR: Falha ao fazer push
    echo.
    echo Possíveis motivos:
    echo - Token expirado ou inválido
    echo - Repositório não existe no GitHub
    echo - Sem acesso ao repositório
    echo.
    pause
    exit /b 1
)

echo.
echo ========================================
echo SUCCESS! Repositorio enviado com sucesso
echo ========================================
echo.
echo Link: %REPO_URL%
echo GitHub: https://github.com/%GITHUB_USER%/%REPO_NAME%
echo.
pause
