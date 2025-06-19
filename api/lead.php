<?php

// Criar endpoint para receber dados do formulário de contato
header('Content-Type: application/json');

// obter do content
// Verificar se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Método não permitido
    echo json_encode(['error' => 'Método não permitido. Use POST.']);
    exit;
}

// Obter dados do formulário
// Usar htmlspecialchars para evitar XSS

$body = file_get_contents('php://input');    // tudo que veio no corpo
$body = json_decode($body, true); // decodificar JSON para array associativo

$nome = $body['nome'] ?? '';
$empresa = $body['empresa'] ?? '';
$cargo = $body['cargo'] ?? '';
$email = $body['email'] ?? '';
$celular = $body['celular'] ?? '';
$ip = $_SERVER['REMOTE_ADDR'] ?? '';

// nome de outro local
// não é em POST[]
// Validar se os campos obrigatórios foram preenchidos

// Validar negativamente se algum campo obrigatório estiver vazio
if (empty($nome) || empty($empresa) || empty($cargo) || empty($email) || empty($celular)) {
    http_response_code(400);
    echo json_encode(['error' => 'Todos os campos são obrigatórios.']);
    exit;
}

// Fazer envio ao webhook do Discord.
$webhook_url = 'https://discord.com/api/webhooks/1385334443165745152/W65ZpOjcaGq3z2IWteSh_pBdBhrpaECzCWwjNbslmKBmmAV_UCp5IJDYhIaK8gAMf1ho';

// definir timezone.
date_default_timezone_set('America/Sao_Paulo'); // Definir timezone para São Paulo

// Montar payload (aqui uso um embed para ficar organizado no Discord)
$payload = [
    'embeds' => [[
        'title'  => '📥 Novo lead recebido pelo formulário',
        'color'  => 0xf1c40f,                           // amarelo
        'fields' => [
            ['name' => 'Nome',     'value' => $nome,     'inline' => true],
            ['name' => 'Empresa',  'value' => $empresa,  'inline' => true],
            ['name' => 'Cargo',    'value' => $cargo,    'inline' => true],
            ['name' => 'E‑mail',   'value' => $email,    'inline' => true],
            ['name' => 'Celular',  'value' => $celular,  'inline' => true],
            ['name' => 'IP',       'value' => $ip,       'inline' => true],
            ['name' => 'Recebido', 'value' => date('d/m/Y H:i:s'), 'inline' => true],
        ],
    ]],
];

// Enviar via cURL
$ch = curl_init($webhook_url);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
    CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_UNICODE),
    CURLOPT_RETURNTRANSFER => true,
]);

$response  = curl_exec($ch);
$httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$errorCurl = curl_error($ch);
curl_close($ch);

// Verificar resultado (204 = sucesso no Discord)
if ($errorCurl || $httpCode !== 204) {
    http_response_code(500);
    echo json_encode([
        'error'   => 'Falha ao enviar para o Discord.',
        'status'  => $httpCode,
        'details' => $errorCurl ?: $response,
    ]);
    exit;
}

// Enviar email para contato@needyou.com.br
$to = 'contato@needyou.com.br';
$subject = '📥 Novo contato recebido pelo site - ' . $nome;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: LEAD EMPRESA - NeedYou <no-reply@needyou.com.br>" . "\r\n";

// Estilo básico do e-mail
$htmlMessage = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; color: #333; }
            h2 { color: #f1c40f; }
            table { border-collapse: collapse; width: 100%; max-width: 600px; margin: 20px 0; }
            td { padding: 8px 12px; border: 1px solid #ddd; }
            tr:nth-child(even) { background-color: #f9f9f9; }
        </style>
    </head>
    <body>
        <h2>📥 Novo lead recebido</h2>
        <table>
            <tr><td><strong>Nome:</strong></td><td>{$nome}</td></tr>
            <tr><td><strong>Empresa:</strong></td><td>{$empresa}</td></tr>
            <tr><td><strong>Cargo:</strong></td><td>{$cargo}</td></tr>
            <tr><td><strong>E-mail:</strong></td><td>{$email}</td></tr>
            <tr><td><strong>Celular:</strong></td><td>{$celular}</td></tr>
            <tr><td><strong>IP:</strong></td><td>{$ip}</td></tr>
            <tr><td><strong>Recebido em:</strong></td><td>" . date('d/m/Y H:i:s') . "</td></tr>
        </table>
    </body>
    </html>
";

// Enviar o e-mail
if (!mail($to, $subject, $htmlMessage, $headers)) {
    http_response_code(500);
    echo json_encode(['error' => 'Falha ao enviar e-mail.']);
    exit;
}

// Sucesso!
echo json_encode(['success' => true, 'message' => 'Dados enviados com sucesso.']);
