<?php
function show_value($v)
{
    return htmlspecialchars($v ?? '', ENT_QUOTES);
}

$code = '';
$hash = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = trim($_POST['code'] ?? '');
    $hash = trim($_POST['hash'] ?? '');
    if ($code === '' || $hash === '') {
        $error = 'Preencha ambos os campos para gerar sua URL personalizada.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Gerador de URL NeedYou</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #f9f9f6;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .container {
            max-width: 480px;
            margin: 4rem auto;
            background: #fff;
            border-radius: 1.2rem;
            box-shadow: 0 4px 24px 0 #0001;
            padding: 2.5rem 2rem 2rem 2rem;
        }

        h1 {
            text-align: center;
            color: #d6ae29;
            margin-bottom: 1.7rem;
            font-size: 2.1rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        label {
            font-weight: 600;
            color: #232323;
            margin-bottom: 0.3rem;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 6px 0px 30px;
            border: 1.5px solid #feca17;
            border-radius: 0.6rem;
            font-size: 1.09rem;
            background: #fffdf5;
            margin-bottom: 0.2rem;
        }

        textarea {
            resize: vertical;
            min-height: 52px;
        }

        .result {
            background: #f8fbe6;
            border: 1.5px solid #feca17;
            border-radius: 0.7rem;
            margin-top: 2rem;
            padding: 1.2rem 1rem;
            font-size: 1.07rem;
        }

        .result label {
            font-size: 0.97rem;
            color: #555;
            margin-bottom: 0.2rem;
        }

        .result textarea {
            background: #fff;
            border: 1.5px solid #e8d67a;
            font-size: 1.01rem;
            padding: 0.45rem;
            width: 100%;
            min-height: 2.1em;
            margin-bottom: 0.7em;
        }

        .result .copy-btn {
            font-size: 0.98rem;
            background: #ffe67c;
            padding: 0.5em 1.2em;
            border-radius: 0.5em;
            border: none;
            cursor: pointer;
        }

        .copy-success {
            color: #228c43;
            margin-left: 1rem;
            font-size: 0.95rem;
            font-weight: 600;
            display: none;
        }

        .error-msg {
            color: #e74c3c;
            background: #fff2f2;
            border: 1.5px solid #ffbdbd;
            border-radius: 0.5em;
            padding: 0.7em 1em;
            margin-bottom: 1.2em;
            font-size: 1.04em;
            text-align: center;
        }

        .info {
            color: #888;
            font-size: 0.97rem;
            text-align: center;
            margin-top: 2.2rem;
        }

        @media (max-width: 600px) {
            .container {
                padding: 1.2rem 0.4rem;
            }

            h1 {
                font-size: 1.35em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Gerador de URL Personalizada NeedYou</h1>
        <?php if ($error): ?>
            <div class="error-msg"><?= $error ?></div>
        <?php endif; ?>
        <form autocomplete="off" id="urlForm" onsubmit="return false;">
            <div>
                <label for="code">Código identificador <span style="color:#d6ae29;font-weight:400;">(ex: EMPRESASRH)</span>:</label>
                <input type="text" name="code" id="code" required maxlength="40"
                    placeholder="EMPRESASRH, CDKAN, etc." autocomplete="off">
                <small style="color:#888;">Use um nome curto, identificador de campanha/parceria.</small>
            </div>
            <div>
                <label for="hash">Mensagem personalizada <span style="color:#d6ae29;font-weight:400;">(aparece na barra superior)</span>:</label>
                <textarea name="hash" id="hash" required maxlength="120"
                    placeholder="Ex: Você veio da página X, estávamos te esperando!"></textarea>
                <small style="color:#888;">Você pode usar acentos, emojis e pontuação.</small>
            </div>
        </form>
        <div class="result" id="result-bloco" style="display: none;">
            <label>URL personalizada (atualize os campos acima):</label>
            <textarea id="out-url" readonly></textarea>
            <button class="copy-btn" data-copy="#out-url">Copiar</button>
            <span class="copy-success" id="copy-success">Copiado!</span>
        </div>
        <div class="info">
            Use a URL gerada para ativar a barra personalizada no seu site!<br>
            O texto da barra será exatamente o que você escreveu.<br>
            Exemplo: <code>https://needyou.com.br?code=EMPRESASRH&amp;hash=Vm9jw6kgdm...</code>
        </div>
    </div>
    <script>
        // Handler para mostrar a URL em tempo real (hash em base64)
        const codeInput = document.getElementById('code');
        const hashInput = document.getElementById('hash');
        const resultBloco = document.getElementById('result-bloco');
        const outUrl = document.getElementById('out-url');

        function toBase64(str) {
            // Suporte para UTF-8/base64 seguro
            return btoa(unescape(encodeURIComponent(str)));
        }

        function updateResultUrl() {
            const cod = codeInput.value.trim();
            const hash = hashInput.value.trim();
            if (cod && hash) {
                const hashBase64 = toBase64(hash);
                const url = `https://needyou.com.br?code=${encodeURIComponent(cod)}&hash=${hashBase64}`;
                outUrl.value = url;
                resultBloco.style.display = '';
            } else {
                outUrl.value = '';
                resultBloco.style.display = 'none';
            }
        }
        codeInput.addEventListener('input', updateResultUrl);
        hashInput.addEventListener('input', updateResultUrl);

        // Copia automático com feedback
        document.querySelectorAll('.copy-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var target = document.querySelector(btn.getAttribute('data-copy'));
                if (target) {
                    target.select ? target.select() : target.setSelectionRange(0, 9999);
                    navigator.clipboard.writeText(target.value || target.textContent);
                    var msg = btn.parentNode.querySelector('.copy-success');
                    if (msg) {
                        msg.style.display = '';
                        setTimeout(function() {
                            msg.style.display = 'none';
                        }, 1600);
                    }
                }
            });
        });
    </script>
</body>

</html>