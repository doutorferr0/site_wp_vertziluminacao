' GitHub Upload Script - VBScript
' Executa git commands para fazer upload para GitHub

Option Explicit

Dim objShell, objFSO
Dim strPath, strCommand, intReturn
Dim token, username, repoName, repoURL

' Inicializar objetos
Set objShell = CreateObject("WScript.Shell")
Set objFSO = CreateObject("Scripting.FileSystemObject")

' Configurações
strPath = "c:\Users\henri\Local Sites\vertziluminacaocombr"
token = "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"
username = "doutorferr0"
repoName = "site_wp_vertziluminacao"
repoURL = "https://" & username & ":" & token & "@github.com/" & username & "/" & repoName & ".git"

WScript.Echo "=========================================="
WScript.Echo "GitHub Upload Script"
WScript.Echo "=========================================="
WScript.Echo ""
WScript.Echo "Path: " & strPath
WScript.Echo "Repo: " & repoName
WScript.Echo ""

' Verificar se diretório existe
If Not objFSO.FolderExists(strPath) Then
    WScript.Echo "ERROR: Diretório não encontrado: " & strPath
    WScript.Quit(1)
End If

WScript.Echo "✓ Diretório encontrado"
WScript.Echo ""

' Função para executar comando
Function ExecuteCommand(command, description)
    On Error Resume Next
    
    WScript.Echo "[*] " & description
    WScript.Echo "    $ " & command
    
    Dim objExec
    Set objExec = objShell.Exec("cmd /c cd /d """ & strPath & """ && " & command)
    
    Dim output
    output = objExec.StdOut.ReadAll()
    
    If objExec.Status <> 0 Then
        Dim errMsg
        errMsg = objExec.StdErr.ReadAll()
        WScript.Echo "    ✗ Error: " & errMsg
        ExecuteCommand = False
    Else
        If Len(output) > 0 Then
            WScript.Echo "    ✓ " & Left(output, 100)
        Else
            WScript.Echo "    ✓ Done"
        End If
        ExecuteCommand = True
    End If
End Function

' Passos de upload
WScript.Echo "STEP 1: Initialize Git"
ExecuteCommand "git init", "Inicializando repositório"

WScript.Echo ""
WScript.Echo "STEP 2: Configure User"
ExecuteCommand "git config user.name ""Henri Ferro""", "Nome"
ExecuteCommand "git config user.email ""henri@example.com""", "Email"

WScript.Echo ""
WScript.Echo "STEP 3: Add Files"
ExecuteCommand "git add .", "Adicionando arquivos"

WScript.Echo ""
WScript.Echo "STEP 4: Check Status"
ExecuteCommand "git status", "Status"

WScript.Echo ""
WScript.Echo "STEP 5: Create Commit"
Dim commitMsg
commitMsg = "Initial commit: WordPress theme for Vertz Iluminacao\n\n"
commitMsg = commitMsg & "- tema-vertz theme with 10 homepage sections\n"
commitMsg = commitMsg & "- Complete CSS system (1400+ lines)\n"
commitMsg = commitMsg & "- JavaScript modules (400+ lines)\n"
commitMsg = commitMsg & "- Cards slider with 15 items\n"
commitMsg = commitMsg & "- Mobile-first responsive design\n\n"
commitMsg = commitMsg & "Co-authored-by: Copilot <223556219+Copilot@users.noreply.github.com>"

ExecuteCommand "git commit -m """ & commitMsg & """", "Commit"

WScript.Echo ""
WScript.Echo "STEP 6: Rename Branch"
ExecuteCommand "git branch -M main", "Renaming to main"

WScript.Echo ""
WScript.Echo "STEP 7: Add Remote"
ExecuteCommand "git remote add origin " & repoURL, "Adicionando remote"

WScript.Echo ""
WScript.Echo "STEP 8: Push to GitHub"
If ExecuteCommand("git push -u origin main", "Enviando para GitHub") Then
    WScript.Echo ""
    WScript.Echo "=========================================="
    WScript.Echo "✓ SUCCESS! Repositório enviado!"
    WScript.Echo "=========================================="
    WScript.Echo ""
    WScript.Echo "GitHub: https://github.com/" & username & "/" & repoName
    WScript.Echo ""
Else
    WScript.Echo ""
    WScript.Echo "✗ FALHA ao fazer push"
    WScript.Echo ""
    WScript.Echo "Possíveis motivos:"
    WScript.Echo "  - Token expirado"
    WScript.Echo "  - Repositório não existe"
    WScript.Echo "  - Sem permissão"
    WScript.Echo ""
End If

WScript.Quit(0)
