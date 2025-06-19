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
$codigo = $body['codigo'] ?? 'Não Informado'; // código opcional, se não tiver, informar 'Não Informado'
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
            ['name' => 'Codigo',   'value' => $codigo,   'inline' => true],
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
$subject = '📥 Novo contato de Empresa - ' . $nome;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: LEAD EMPRESA - NeedYou <no-reply@needyou.com.br>" . "\r\n";
$logoURL  = 'https://needyou.com.br/assets/needyou-mail.png';
$siteURL  = 'https://needyou.com.br';
$corMain  = '#feca17';      // amarelo NeedYou
$corDark  = '#1a1a1a';

// Estilo básico do e-mail
$htmlMessage = "
<!DOCTYPE html>
<html lang=\"pt-br\">
<head>
<meta charset=\"UTF-8\">
<title>NeedYou – Novo Contato</title>
<style>
    body   { margin:0; padding:0; background:#f5f5f5; font-family:'Poppins', Arial, sans-serif; color:#333; }
    h2     { margin:0 0 12px 0; font-size:22px; color:{$corDark}; }
    table  { border-collapse:collapse; width:100%; max-width:600px; margin:20px auto; }
    td     { padding:8px 12px; border:1px solid #ddd; }
    tr:nth-child(even) { background-color:#f9f9f9; }
    .wrapper { background:#ffffff; border-radius:8px; overflow:hidden; }
    .header  { background:{$corMain}; padding:24px; text-align:center; }
</style>
</head>
<body>
  <table class=\"wrapper\" role=\"presentation\">
    <!-- Cabeçalho -->
    <tr>
      <td class=\"header\">
        <img src=\"{$logoURL}\" alt=\"NeedYou\" width=\"140\" style=\"display:block;border:0;\">
      </td>
    </tr>

    <!-- Conteúdo -->
    <tr>
      <td style=\"padding:32px 40px;\">
        <h2>📥 Novo lead de Empresa</h2>
        <p style=\"margin:0 0 24px 0;font-size:16px;line-height:1.5;\">
          Você recebeu um novo contato via formulário do site.<br>
          <strong>Confira os detalhes abaixo:</strong>
        </p>

        <table role=\"presentation\">
          <tr><td><strong>Nome:</strong></td><td>{$nome}</td></tr>
            <tr><td><strong>Empresa:</strong></td><td>{$empresa}</td></tr>
            <tr><td><strong>Cargo:</strong></td><td>{$cargo}</td></tr>
            <tr><td><strong>E-mail:</strong></td><td>{$email}</td></tr>
            <tr><td><strong>Celular:</strong></td><td>{$celular}</td></tr>
            <tr><td><strong>IP:</strong></td><td>{$ip}</td></tr>
            <tr><td><strong>Código:</strong></td><td>{$codigo}</td></tr>
            <tr><td><strong>Recebido em:</strong></td><td>" . date('d/m/Y H:i:s') . "</td></tr>
        </table>
      </td>
    </tr>
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
