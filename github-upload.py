#!/usr/bin/env python3
"""
Upload WordPress Theme to GitHub
=================================
Script para fazer upload do tema Vertz Iluminação para GitHub

Uso: python3 github-upload.py
"""

import os
import sys
import subprocess
from pathlib import Path

# Configurações
REPO_NAME = "site_wp_vertziluminacao"
GITHUB_USER = "doutorferr0"
LOCAL_PATH = r"c:\Users\henri\Local Sites\vertziluminacaocombr"
REPO_URL = f"https://github.com/{GITHUB_USER}/{REPO_NAME}.git"

# Token (use variável de ambiente em produção!)
GITHUB_TOKEN = "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"

def run_command(cmd, description=""):
    """Executa comando e retorna sucesso/falha"""
    if description:
        print(f"\n📝 {description}")
        print(f"   $ {cmd}")
    
    try:
        result = subprocess.run(
            cmd,
            shell=True,
            cwd=LOCAL_PATH,
            capture_output=True,
            text=True,
            timeout=30
        )
        
        if result.returncode != 0:
            print(f"   ❌ Erro: {result.stderr}")
            return False
        
        if result.stdout.strip():
            print(f"   ✅ {result.stdout.strip()[:100]}")
        else:
            print(f"   ✅ Done")
        
        return True
    
    except Exception as e:
        print(f"   ❌ Exceção: {e}")
        return False

def main():
    print("=" * 60)
    print("🚀 GitHub Upload Script - Vertz Iluminação")
    print("=" * 60)
    print(f"\nRepo: {REPO_NAME}")
    print(f"URL: {REPO_URL}")
    print(f"Path: {LOCAL_PATH}")
    print(f"User: {GITHUB_USER}")
    
    # Verificar se diretório existe
    if not os.path.isdir(LOCAL_PATH):
        print(f"\n❌ Erro: Diretório não encontrado: {LOCAL_PATH}")
        return False
    
    print(f"\n✅ Diretório encontrado")
    
    # Passo 1: Verificar se git está instalado
    print("\n" + "="*60)
    print("PASSO 1: Verificar Git")
    print("="*60)
    
    result = subprocess.run(
        "git --version",
        shell=True,
        capture_output=True,
        text=True
    )
    
    if result.returncode != 0:
        print("❌ Git não está instalado!")
        print("Instale em: https://git-scm.com/download/win")
        return False
    
    print(f"✅ {result.stdout.strip()}")
    
    # Passo 2: Inicializar git
    print("\n" + "="*60)
    print("PASSO 2: Inicializar Git Local")
    print("="*60)
    
    if not run_command("git init", "Inicializando repositório"):
        return False
    
    # Passo 3: Configurar usuário
    print("\n" + "="*60)
    print("PASSO 3: Configurar Usuário")
    print("="*60)
    
    run_command('git config user.name "Henri Ferro"', "Configurar nome")
    run_command('git config user.email "henri@example.com"', "Configurar email")
    
    # Passo 4: Adicionar arquivos
    print("\n" + "="*60)
    print("PASSO 4: Adicionar Arquivos")
    print("="*60)
    
    if not run_command("git add .", "Adicionando todos os arquivos"):
        return False
    
    # Passo 5: Verificar status
    print("\n" + "="*60)
    print("PASSO 5: Status")
    print("="*60)
    
    run_command("git status", "Verificando status")
    
    # Passo 6: Fazer commit
    print("\n" + "="*60)
    print("PASSO 6: Criar Commit")
    print("="*60)
    
    commit_msg = """Initial commit: WordPress theme for Vertz Iluminacao

- tema-vertz theme with 10 homepage sections
- Complete CSS system (1400+ lines)
- JavaScript modules (400+ lines)
- Cards slider with 15 items (PHP dynamic)
- Mobile-first responsive design (3 breakpoints)
- Comprehensive documentation

Co-authored-by: Copilot <223556219+Copilot@users.noreply.github.com>"""
    
    cmd = f'git commit -m "{commit_msg}"'
    if not run_command(cmd, "Criando primeiro commit"):
        print("⚠️  Aviso: Pode não haver mudanças para commitar")
    
    # Passo 7: Renomear branch
    print("\n" + "="*60)
    print("PASSO 7: Configurar Branch")
    print("="*60)
    
    run_command("git branch -M main", "Renomeando para 'main'")
    
    # Passo 8: Adicionar remote
    print("\n" + "="*60)
    print("PASSO 8: Adicionar Remote")
    print("="*60)
    
    # Criar URL com token
    remote_url = f"https://{GITHUB_USER}:{GITHUB_TOKEN}@github.com/{GITHUB_USER}/{REPO_NAME}.git"
    
    cmd = f'git remote add origin {remote_url}'
    if not run_command(cmd, "Adicionando repositório remoto"):
        print("⚠️  Remote pode já existir")
    
    # Passo 9: Fazer push
    print("\n" + "="*60)
    print("PASSO 9: Fazer Push para GitHub")
    print("="*60)
    
    if not run_command("git push -u origin main", "Enviando para GitHub"):
        print("\n❌ Falha ao fazer push!")
        print("\nPossíveis motivos:")
        print("  - Token expirado ou inválido")
        print("  - Repositório não existe")
        print("  - Sem acesso")
        return False
    
    # Sucesso!
    print("\n" + "="*60)
    print("✅ SUCESSO!")
    print("="*60)
    print(f"\n🎉 Repositório enviado com sucesso para GitHub!")
    print(f"\nVisite: https://github.com/{GITHUB_USER}/{REPO_NAME}")
    print(f"\nComandos úteis:")
    print(f"  git clone {REPO_URL}")
    print(f"  git log --oneline")
    print(f"  git status")
    
    return True

if __name__ == "__main__":
    success = main()
    sys.exit(0 if success else 1)
